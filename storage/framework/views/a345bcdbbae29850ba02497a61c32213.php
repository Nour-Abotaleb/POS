<div class="h-screen w-screen overflow-hidden" <?php if(!pusherSettings()->is_enabled_pusher_broadcast): ?> wire:poll.2s <?php endif; ?>>
    <div class="grid grid-cols-2 h-full">
        <!-- Preparing (left) -->
        <div class="bg-gray-700 text-white h-full flex flex-col">
            <div class="px-8 pt-8 pb-4">
                <h3 class="text-3xl font-semibold tracking-wide">
                    <?php echo app('translator')->get('modules.order.preparing'); ?>
                </h3>
            </div>

            <div class="flex-1 px-8 pb-10">
                <div class="grid grid-cols-3 gap-5 place-content-start">
                    <?php $__empty_1 = true; $__currentLoopData = $preparingOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php ($num = $o['token'] ?? $o['display_number']); ?>
                        <div class="rounded-md bg-gray-800 shadow-md">
                            <div class="px-6 py-5 text-center">
                                <div class="text-4xl font-extrabold tracking-wide"><?php echo e($num); ?></div>
                                <?php if(isset($o['order_type'])): ?>
                                    <div class="text-sm text-gray-300 mt-2"><?php echo e($o['order_type']); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-span-3 text-center text-gray-300 text-xl mt-10"><?php echo app('translator')->get('modules.order.noOrders'); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Ready (right) -->
        <div class="bg-black text-white h-full flex flex-col">
            <div class="px-8 pt-8 pb-4">
                <h3 class="text-3xl font-semibold tracking-wide">
                    <?php echo app('translator')->get('modules.order.readyForPickup'); ?>
                </h3>
            </div>

            <div class="flex-1 px-8 pb-10">
                <div class="grid grid-cols-2 gap-6 place-content-start">
                    <?php $__empty_1 = true; $__currentLoopData = $readyOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php ($num = $o['token'] ?? $o['display_number']); ?>
                        <div class="rounded-md bg-green-600 shadow-md">
                            <div class="px-8 py-6 text-center">
                                <div class="text-4xl font-extrabold tracking-wide"><?php echo e($num); ?></div>
                                <?php if(isset($o['order_type'])): ?>
                                    <div class="text-sm text-green-100 mt-2"><?php echo e($o['order_type']); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-span-2 text-center text-gray-400 text-xl mt-10"><?php echo app('translator')->get('modules.order.noOrders'); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <?php if(pusherSettings()->is_enabled_pusher_broadcast): ?>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const channel = PUSHER.subscribe('orders');
                    channel.bind('order.updated', function() {
                        window.Livewire.find('<?php echo e($_instance->getId()); ?>').call('refreshBoard');
                    });
                });
            </script>
        <?php endif; ?>
    <?php $__env->stopPush(); ?>
</div>


<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\customer-order-board.blade.php ENDPATH**/ ?>