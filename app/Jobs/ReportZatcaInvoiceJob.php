<?php

namespace App\Jobs;

use App\Models\Order;
use App\Services\ZatcaPhase2Service;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReportZatcaInvoiceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $orderId;

    /**
     * Create a new job instance.
     */
    public function __construct(int $orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * Execute the job.
     */
    public function handle(ZatcaPhase2Service $zatcaService): void
    {
        $order = Order::find($this->orderId);
        
        if ($order && in_array($order->status, ['paid', 'billed'])) {
            // Only report if not already reported
            if ($order->zatca_status !== 'reported') {
                $zatcaService->reportB2CInvoice($order);
            }
        }
    }
}
