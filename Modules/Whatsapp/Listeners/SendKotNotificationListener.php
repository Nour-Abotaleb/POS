<?php

namespace Modules\Whatsapp\Listeners;

use App\Events\KotUpdated;
use Illuminate\Support\Facades\Log;

class SendKotNotificationListener
{
    /**
     * Handle the event.
     */
    public function handle(KotUpdated $event): void
    {
        try {
            $kot = $event->kot;
            
            // Check if KOT has items - Skip if no items yet (KOT created but items not added yet)
            $totalItemsCount = $kot->items()->count();
            if ($totalItemsCount === 0) {
                return; // No items yet, skip silently
            }
            
            // Load order to check if it's from customer site
            $order = $kot->order;
            if (!$order) {
                return; // No order, skip
            }

            // Check if WhatsApp module is in restaurant's package
            $restaurantId = $order->branch->restaurant_id ?? null;
            if ($restaurantId && function_exists('restaurant_modules')) {
                $restaurant = $order->branch->restaurant ?? \App\Models\Restaurant::find($restaurantId);
                if ($restaurant) {
                    $restaurantModules = restaurant_modules($restaurant);
                    if (!in_array('Whatsapp', $restaurantModules)) {
                        return;
                    }
                }
            }
            
            // Determine if this is a NEW KOT (created, not just updated)
            $timeDiff = $kot->created_at->diffInSeconds($kot->updated_at);
            $isNewKot = $timeDiff <= 5; // New KOT if created and updated within 5 seconds
            
            // Check if order is from customer site
            $isCustomerSiteOrder = $order->placed_via === 'shop';
            
            // Check if KOT was recently updated (within last 3 seconds) - might be Print/KOT action
            $recentlyUpdated = $kot->updated_at->diffInSeconds(now()) <= 3;
            
            // Only send notification for:
            // 1. New KOTs (KOT/KOT action)
            // 2. Customer site orders (always notify for new KOTs from customer site)
            // 3. Recently updated KOTs (Print/KOT action - KOT regenerated/updated)
            // 4. Bill & Payment is handled separately via SendKitchenNotificationOnBillListener
            if (!$isNewKot && !$isCustomerSiteOrder && !$recentlyUpdated) {
                // This is an update to an existing KOT that's not new, not from customer site, and not recently updated
                // Skip notification
                return;
            }
            
            // CRITICAL FIX: Prevent multiple job dispatches for same ORDER (not just KOT)
            // When multiple KOTs are created for the same order, we only want ONE job to run
            // The job will collect items from ALL KOTs for that order
            $orderId = $order->id;
            $jobDispatchedKey = 'kot_notification_job_dispatched_order_' . $orderId;
            
            if (cache()->has($jobDispatchedKey)) {
                $lastDispatched = cache()->get($jobDispatchedKey . '_time');
                // Wait 5 seconds to allow all KOTs to be created, then dispatch
                if ($lastDispatched && now()->diffInSeconds($lastDispatched) < 5) {
                    Log::info("WhatsApp KOT Notification Listener: Job already dispatched for order, skipping", [
                        'order_id' => $orderId,
                        'kot_id' => $kot->id,
                        'seconds_since_last' => now()->diffInSeconds($lastDispatched),
                    ]);
                    return; // Too soon, skip silently - job already running for this order
                }
            }
            
            // Mark job as dispatched for this ORDER (not just this KOT)
            cache()->put($jobDispatchedKey, true, 300);
            cache()->put($jobDispatchedKey . '_time', now(), 300);
            
            // Dispatch a job synchronously - pass the FIRST KOT ID, but job will collect from ALL KOTs
            // The job queries all KOTs for the order, so it doesn't matter which KOT ID we pass
            \Modules\Whatsapp\Jobs\SendKotNotificationJob::dispatchSync($kot->id);
            
            Log::info("WhatsApp KOT #{$kot->kot_number}: Notification processed synchronously", [
                'is_new_kot' => $isNewKot,
                'is_customer_site' => $isCustomerSiteOrder,
            ]);

        } catch (\Exception $e) {
            Log::error('WhatsApp KOT Notification Listener Error: ' . $e->getMessage(), [
                'kot_id' => $event->kot->id ?? null,
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }
}
