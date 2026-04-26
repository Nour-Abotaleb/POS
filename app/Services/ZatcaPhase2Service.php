<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;

class ZatcaPhase2Service
{
    /**
     * Report a B2C Invoice or Credit/Debit Note to ZATCA via Proxy
     * 
     * @param Order $order
     * @return bool
     */
    public function reportB2CInvoice(Order $order): bool
    {
        try {
            $restaurant = $order->restaurant ?? restaurant(); 
            
            if (!$restaurant) {
                throw new Exception("Restaurant not found for invoice reporting.");
            }

            // Check if ZATCA credentials are set
            if (!$restaurant->zatca_certificate || !$restaurant->zatca_private_key) {
                Log::warning("ZATCA credentials missing for restaurant ID: " . $restaurant->id);
                return false;
            }

            // 1. Determine ICV and PIH locally since the proxy doesn't have our DB
            $lastReportedOrder = Order::where('restaurant_id', $restaurant->id)
                ->where('zatca_status', 'reported')
                ->where('id', '!=', $order->id)
                ->select('zatca_invoice_counter', 'zatca_hash')
                ->orderBy('zatca_invoice_counter', 'desc')
                ->first();

            $icv = $lastReportedOrder ? ($lastReportedOrder->zatca_invoice_counter + 1) : 1;
            $pih = $lastReportedOrder ? $lastReportedOrder->zatca_hash : "NWZlY2ViNjZmZmM4NmYzOGQ5NTI3ODZjNmQ2OTZjNzljMmRiYzIzOWRkNGU5MWI0NjcyOWQ3M2EyN2ZiNTdlOQ==";

            $uuid = $order->zatca_uuid ?? (string) Str::uuid();
            
            // Save initial values to prevent duplicates
            // Use saveQuietly() to prevent triggering Order::updated() observer
            // which would dispatch another ZATCA job (infinite loop)
            $order->zatca_uuid = $uuid;
            $order->zatca_invoice_counter = $icv;
            $order->zatca_status = 'pending';
            $order->saveQuietly();

            // Prepare Invoice Data
            $invoiceData = [
                'zatca_uuid' => $uuid,
                'zatca_invoice_counter' => $icv,
                'zatca_previous_hash' => $pih,
                'invoice_number' => $order->order_number,
                'created_at' => $order->created_at->toISOString(),
                'sub_total' => $order->sub_total,
                'total_tax_amount' => $order->total_tax_amount,
                'total' => $order->total,
                'invoice_type' => $order->invoice_type ?? '388',
                'parent_order_id' => $order->parent_order_id,
                'return_reason' => $order->return_reason,
                'items' => $order->items->map(function ($item) {
                    return [
                        'name' => $item->menuItemVariation ? $item->menuItemVariation->name : $item->menuItem->name,
                        'quantity' => $item->quantity,
                        'price' => $item->price,
                        'amount' => $item->amount,
                        'tax_amount' => $item->tax_amount ?? 0,
                        'tax_percentage' => $item->tax_percentage ?? 15,
                    ];
                })->toArray(),
            ];

            // If it's a credit/debit note, attach parent invoice info
            if (in_array($order->invoice_type, ['381', '383']) && $order->parentOrder) {
                $invoiceData['parent_invoice_number'] = $order->parentOrder->order_number;
            }

            // Prepare Company Data
            $companyData = [
                'company_name' => $restaurant->name,
                'vat_number' => $restaurant->tax_number ?? '300000000000003',
                'zatca_certificate' => $restaurant->zatca_certificate,
                'zatca_private_key' => $restaurant->zatca_private_key,
                'zatca_secret' => $restaurant->zatca_secret,
                'street' => $restaurant->address ?? 'Main Street',
                'city' => $restaurant->city ?? 'Riyadh',
                'postal_code' => $restaurant->postal_code ?? '12211',
                'district' => $restaurant->district ?? 'Al Murabba',
                'building_number' => $restaurant->building_number ?? '1234',
                'commercial_registration' => $restaurant->commercial_registration ?? '1010123457',
            ];

            $payload = [
                'invoice' => $invoiceData,
                'company' => $companyData,
                'environment' => $restaurant->zatca_api_environment ?? 'simulation'
            ];

            $proxyUrl = env('ZATCA_PROXY_URL', 'http://zatca-proxy.com'); // Live proxy URL

            Log::info("Sending ZATCA request to proxy: " . $proxyUrl . '/api/zatca/report');
            
            $response = Http::timeout(30)
                ->withHeaders(['X-Client-ID' => 'POS-' . $restaurant->id])
                ->post($proxyUrl . '/api/zatca/report', $payload);
            
            if ($response->successful() && $response->json('success')) {
                $data = $response->json('data');
                
                $order->zatca_uuid = $data['zatca_uuid'] ?? $uuid;
                $order->zatca_hash = $data['zatca_hash'] ?? null;
                $order->zatca_xml = $data['zatca_xml'] ?? null;
                $order->zatca_qr_code = $data['zatca_qr_code'] ?? null;
                $order->zatca_status = 'reported';
                $order->zatca_reported_at = Carbon::now();
                $order->zatca_errors = null;
                $order->saveQuietly();
                
                return true;
            } else {
                $order->zatca_status = 'failed';
                $errorMsg = $response->json('message') ?? $response->json('error') ?? 'Proxy API Error';
                $order->zatca_errors = is_array($errorMsg) ? json_encode($errorMsg) : $errorMsg;
                $order->saveQuietly();
                
                Log::error("ZATCA Proxy Response Error", [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                
                return false;
            }

        } catch (Exception $e) {
            Log::error("ZATCA Reporting Error: " . $e->getMessage(), ['order_id' => $order->id]);
            $order->zatca_status = 'failed';
            $order->zatca_errors = json_encode(['exception' => $e->getMessage()]);
            $order->saveQuietly();
            
            return false;
        }
    }
}
