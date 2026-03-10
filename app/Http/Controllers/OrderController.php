<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\ReceiptSetting;
use App\Models\RestaurantTax;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\OrderNumberSetting;
use App\Helper\Files;
use App\Helper\ZatcaHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class OrderController extends Controller
{
    /**
     * Generate ZATCA QR Code for an order
     */
    private function generateZatcaQrCode($order, $restaurant, $totalTaxAmount = 0)
    {
        $sellerName = $restaurant->restaurant_name ?? $restaurant->name ?? 'Demo Restaurant';
        $vatNumber = $restaurant->vat_number ?? '300000000000003';
        $timestamp = Carbon::parse($order->created_at)->toIso8601String();

        // Calculate VAT (15%)
        $vatAmount = 0;
        if ($order->orderTaxes && $order->orderTaxes->count() > 0) {
            foreach ($order->orderTaxes as $tax) {
                $vatAmount += $tax->tax_amount;
            }
        } else {
            // Calculate from total tax amount if available
            $vatAmount = $totalTaxAmount;
        }

        $totalWithVat = number_format($order->total, 2, '.', '');
        $vatAmountFormatted = number_format($vatAmount, 2, '.', '');

        // Ensure we have valid data for QR code
        if (empty($sellerName)) $sellerName = 'Demo Restaurant';
        if (empty($vatNumber)) $vatNumber = '300000000000003';

        try {
            return ZatcaHelper::generateQRCode(
                $sellerName,
                $vatNumber,
                $timestamp,
                $totalWithVat,
                $vatAmountFormatted
            );
        } catch (\Exception $e) {
            // Fallback QR code if generation fails
            return base64_encode("ZATCA:$sellerName:$vatNumber:$timestamp:$totalWithVat:$vatAmountFormatted");
        }
    }

    public function index()
    {
        abort_if(!in_array('Order', restaurant_modules()), 403);
        abort_if((!user_can('Show Order')), 403);
        return view('order.index');
    }

    public function show($id)
    {
        return view('order.show', compact('id'));
    }

    public function printOrder($id, $width = 80, $thermal = false, $generateImage = false)
    {
        $id = Order::where('id', $id)->orWhere('uuid', $id)->value('id') ?: $id;

        $payment = Payment::where('order_id', $id)->first();
        $restaurant = restaurant();
        $taxDetails = RestaurantTax::where('restaurant_id', $restaurant->id)->get();
        $order = Order::with(['items.menuItem', 'items.menuItemVariation', 'items.modifierOptions'])->find($id);
        $receiptSettings = $restaurant->receiptSetting;
        $taxMode = $order?->tax_mode ?? ($restaurant->tax_mode ?? 'order');
        $totalTaxAmount = 0;

        if ($taxMode === 'item') {
            $totalTaxAmount = $order->total_tax_amount ?? 0;
        }

        // Generate ZATCA QR Code
        $zatcaQrCode = $this->generateZatcaQrCode($order, $restaurant, $totalTaxAmount);

        $content = view('order.print', compact('order', 'receiptSettings', 'taxDetails', 'payment', 'taxMode', 'totalTaxAmount', 'width', 'thermal', 'zatcaQrCode'));

        return $content;
    }

    /**
     * Generate PDF for order print
     */
    public function generateOrderPdf($id)
    {
        $payment = Payment::where('order_id', $id)->first();
        $restaurant = restaurant();
        $taxDetails = RestaurantTax::where('restaurant_id', $restaurant->id)->get();
        $order = Order::with(['items.menuItem', 'items.menuItemVariation', 'items.modifierOptions'])->find($id);
        $receiptSettings = $restaurant->receiptSetting;
        $taxMode = $restaurant->tax_mode ?? 'order';
        $totalTaxAmount = 0;

        if ($taxMode === 'item') {
            $totalTaxAmount = $order->total_tax_amount ?? 0;
        }

        // Generate ZATCA QR Code
        $zatcaQrCode = $this->generateZatcaQrCode($order, $restaurant, $totalTaxAmount);

        // Generate PDF
        $pdf = Pdf::loadView('order.print-pdf', compact('order', 'receiptSettings', 'taxDetails', 'payment', 'taxMode', 'totalTaxAmount', 'zatcaQrCode'));

        // Set paper size to A4
        $pdf->setPaper('A4', 'portrait');

        return $pdf->download($order->show_formatted_order_number . '.pdf');
    }

    /**
     * Get PDF content as string for email attachment
     */
    public function getOrderPdfContent($id)
    {
        $payment = Payment::where('order_id', $id)->first();
        $restaurant = restaurant();
        $taxDetails = RestaurantTax::where('restaurant_id', $restaurant->id)->get();
        $order = Order::with(['items.menuItem', 'items.menuItemVariation', 'items.modifierOptions'])->find($id);
        $receiptSettings = $restaurant->receiptSetting;
        $taxMode = $restaurant->tax_mode ?? 'order';
        $totalTaxAmount = 0;

        if ($taxMode === 'item') {
            $totalTaxAmount = $order->total_tax_amount ?? 0;
        }

        // Generate ZATCA QR Code
        $zatcaQrCode = $this->generateZatcaQrCode($order, $restaurant, $totalTaxAmount);

        // Generate PDF
        $pdf = Pdf::loadView('order.print-pdf', compact('order', 'receiptSettings', 'taxDetails', 'payment', 'taxMode', 'totalTaxAmount', 'zatcaQrCode'));

        // Set paper size to A4
        $pdf->setPaper('A4', 'portrait');

        return $pdf->output();
    }
}