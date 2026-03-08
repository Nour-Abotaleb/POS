<div class="min-h-screen bg-gray-50 flex flex-col items-center justify-center p-0 " <?php if(!pusherSettings()->is_enabled_pusher_broadcast): ?> wire:poll.500ms <?php endif; ?>>

    <?php if($status == 'billed'): ?>
        <div class="min-h-screen bg-gray-50 flex flex-col items-center justify-center p-0 sm:p-8">
            <div class="w-full max-w-2xl flex flex-col items-center justify-center py-24">
                <div class="text-4xl font-bold text-skin-base mb-4"><?php echo app('translator')->get('modules.order.thankYouMessage', ['restaurant' => restaurant()->name]); ?></div>
                <div class="text-xl text-gray-700 mb-4"><?php echo app('translator')->get('modules.order.pleaseProceedToPayment'); ?></div>
                <?php if($cashDue): ?>
                    <div class="text-2xl font-semibold text-gray-800 mb-2"><?php echo app('translator')->get('modules.order.amountDue'); ?>: <?php echo e(currency_format($cashDue, restaurant()->currency_id)); ?></div>
                <?php endif; ?>
                <?php if($qrCodeImageUrl): ?>
                    <div class="flex flex-col items-center mt-6">
                        <img src="<?php echo e($qrCodeImageUrl); ?>" alt="QR Code" class="h-40 w-40 object-contain rounded shadow border border-gray-200 bg-white">
                        <div class="text-sm text-gray-500 mt-2"><?php echo app('translator')->get('modules.billing.paybyQr'); ?></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <!-- Header -->
        <div class="w-full max-w-2xl flex flex-col items-center pt-2 pb-2 relative">
            <?php if(restaurant()->logo_url): ?>
                <img src="<?php echo e(restaurant()->logo_url); ?>" alt="Logo" class="h-14 mb-2">
            <?php endif; ?>
            <div class="text-xl font-bold text-gray-800 tracking-wide mb-1"><?php echo e(restaurant()->name); ?></div>
            <div class="flex flex-row items-center gap-2 mb-1">

                    <span class="text-base text-gray-500 font-medium"><span class="font-bold text-gray-800">
                        <?php echo e((isOrderPrefixEnabled()) ? $formattedOrderNumber : __('modules.order.orderNumber') . ' #' . $orderNumber); ?>

                    </span></span>

                <?php if($orderType): ?>
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wide ml-2"
                        style="background-color: #e0e7ff; color: #3730a3;">
                        <?php echo e(ucwords(str_replace('_', ' ', __("modules.order.$orderType")))); ?>

                    </span>
                <?php endif; ?>
            </div>
        </div>
        <?php if(pusherSettings()->is_enabled_pusher_broadcast): ?>
            <div class="fixed top-4 right-4 z-50 flex items-center gap-2 px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium shadow-md">
                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                <span> <?php echo app('translator')->get('app.realTime'); ?></span>
            </div>
        <?php endif; ?>
        <!-- Item List -->
        <div class="w-full max-w-2xl flex flex-col gap-0 mt-2">
            <!-- Heading Row -->
            <div class="hidden sm:flex items-center px-4 py-2 bg-gray-50 border-b border-gray-200 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                <div class="w-16 text-center"><?php echo app('translator')->get('modules.order.qty'); ?></div>
                <div class="flex-1 pl-4"><?php echo app('translator')->get('modules.menu.itemName'); ?></div>
                <div class="w-32 text-right"><?php echo app('translator')->get('modules.order.amount'); ?></div>
            </div>
            <?php if(count($orderItems) > 0): ?>
                <div class="divide-y divide-gray-100">
                    <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center px-4 py-2 bg-white">
                            <div class="w-16 flex-shrink-0 flex justify-center">
                                <span class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-skin-base text-white text-lg font-bold"><?php echo e($item['qty']); ?></span>
                            </div>
                            <div class="flex-1 min-w-0 ml-4">
                                <div class="flex items-center gap-2">
                                    <span class="text-lg font-semibold text-gray-900"><?php echo e($item['name']); ?></span>
                                    <?php if($item['variation'] && $item['variation']['name']): ?>
                                        <span class="ml-2 text-xs text-blue-700 font-semibold bg-blue-50 px-2 py-0.5 rounded"><?php echo e($item['variation']['name']); ?></span>
                                    <?php endif; ?>
                                </div>
                                <?php if(!empty($item['modifiers'])): ?>
                                    <div class="flex flex-wrap gap-1 mt-1">
                                        <?php $__currentLoopData = $item['modifiers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="inline-block bg-green-50 text-green-700 text-xs px-2 py-0.5 rounded-full"><?php echo e($mod['name']); ?><?php if(isset($mod['price'])): ?> (<?php echo e(currency_format($mod['price'], restaurant()->currency_id)); ?>)<?php endif; ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if($item['notes']): ?>
                                    <div class="text-xs text-gray-400 italic mt-1"><?php echo app('translator')->get('modules.order.note'); ?>: <?php echo e($item['notes']); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="w-32 flex flex-col items-end min-w-[100px]">
                                <span class="text-lg font-bold text-gray-800"><?php echo e(currency_format($item['qty'] * ($item['total_unit_price'] ?? $item['price']), restaurant()->currency_id)); ?></span>
                                <span class="text-xs text-gray-400 mt-1"><?php echo app('translator')->get('modules.order.price'); ?>: <?php echo e(currency_format($item['total_unit_price'] ?? $item['price'], restaurant()->currency_id)); ?></span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="flex flex-col items-center justify-center py-16 bg-white rounded-lg">
                    <svg class="w-14 h-14 text-gray-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <div class="text-gray-300 text-lg"><?php echo app('translator')->get('messages.noItemAdded'); ?></div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Summary -->
        <div class="w-full max-w-2xl mt-4">
            <div class="bg-white rounded-lg px-6 py-6 flex flex-col gap-2 text-lg shadow-sm">
                <div class="flex justify-between">
                    <span class="text-gray-500"><?php echo app('translator')->get('modules.order.subTotal'); ?></span>
                    <span class="font-semibold text-gray-700"><?php echo e(currency_format($subTotal, restaurant()->currency_id)); ?></span>
                </div>
                <?php if($discount > 0): ?>
                <div class="flex justify-between">
                    <span class="text-gray-500"><?php echo app('translator')->get('modules.order.discount'); ?></span>
                    <span class="text-green-600">-<?php echo e(currency_format($discount, restaurant()->currency_id)); ?></span>
                </div>
                <?php endif; ?>
                <?php if(!empty($taxes)): ?>
                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex justify-between text-base">
                            <span class="text-gray-500"><?php echo app('translator')->get('modules.order.tax'); ?>: <?php echo e($tax['name']); ?> (<?php echo e($tax['percent']); ?>%)</span>
                            <span class="text-blue-600">+<?php echo e(isset($tax['amount']) ? currency_format($tax['amount'], restaurant()->currency_id) : ''); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if(!empty($extraCharges)): ?>
                    <?php $__currentLoopData = $extraCharges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $charge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex justify-between text-base">
                            <span class="text-gray-500"><?php echo app('translator')->get('modules.order.charge'); ?>: <?php echo e($charge['name']); ?></span>
                            <span class="text-orange-600">+<?php echo e(currency_format($charge['amount'], restaurant()->currency_id)); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if($tip > 0): ?>
                <div class="flex justify-between text-base">
                    <span class="text-gray-500"><?php echo app('translator')->get('modules.order.tip'); ?></span>
                    <span class="text-blue-600">+<?php echo e(currency_format($tip, restaurant()->currency_id)); ?></span>
                </div>
                <?php endif; ?>
                <?php if($deliveryFee > 0): ?>
                <div class="flex justify-between text-base">
                    <span class="text-gray-500"><?php echo app('translator')->get('modules.order.deliveryFee'); ?></span>
                    <span class="text-blue-600">+<?php echo e(currency_format($deliveryFee, restaurant()->currency_id)); ?></span>
                </div>
                <?php endif; ?>
                <div class="border-t border-dashed border-gray-200 my-2"></div>
                <div class="flex justify-between items-center">
                    <span class="font-bold text-2xl text-gray-900"><?php echo app('translator')->get('modules.order.total'); ?></span>
                    <span class="font-bold text-3xl text-skin-base"><?php echo e(currency_format($total, restaurant()->currency_id)); ?></span>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="w-full max-w-2xl text-center py-3">
            <div class="text-lg text-gray-400 font-medium"><?php echo app('translator')->get('modules.order.thankYouMessage', ['restaurant' => restaurant()->name]); ?></div>
            <div class="text-sm text-gray-300 mt-1"><?php echo app('translator')->get('modules.order.pleaseReviewOrder'); ?></div>
        </div>
    <?php endif; ?>
</div>

<?php $__env->startPush('scripts'); ?>
    <?php if(pusherSettings()->is_enabled_pusher_broadcast): ?>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const userId = <?php echo e(auth()->id()); ?>;
                    const channelName = 'customer-display-user-' + userId;
                    const channel = PUSHER.subscribe(channelName);
                    channel.bind('customer-display.updated', function(data) {
                        window.Livewire.find('<?php echo e($_instance->getId()); ?>').call('refreshCustomerDisplay');
                        console.log('✅ Pusher received data for customer display user ' + userId + '!. Refreshing...');
                    });
                    PUSHER.connection.bind('connected', () => {
                        console.log('✅ Pusher connected for Customer Display!');
                    });
                    channel.bind('pusher:subscription_succeeded', () => {
                        console.log('✅ Subscribed to ' + channelName + ' channel!');
                    });
                });
            </script>

    <?php endif; ?>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\customer-display.blade.php ENDPATH**/ ?>