<div class="relative">
<a href="<?php echo e(route('orders.index')); ?>" wire:navigate wire:key="today-orders-link"
    class="hidden lg:inline-flex items-center px-1 py-1 text-sm font-medium text-center text-gray-600 bg-white border-skin-base border rounded-md focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-gray-800 dark:text-gray-300"
    data-tooltip-target="today-orders-tooltip-toggle"
    >
    <img src="<?php echo e(asset('img/checkout.svg')); ?>" alt="Today Orders" class="w-5 h-5">
    <span <?php if(!pusherSettings()->is_enabled_pusher_broadcast): ?> wire:poll.15s.visible.keep-alive="refreshOrders" wire:key="today-orders-count" <?php endif; ?>
        class="inline-flex items-center justify-center px-2 py-0.5 ms-2 text-xs font-semibold text-white bg-skin-base rounded-md" style="background-color: var(--brand-primary); border-color: var(--brand-primary);">
        <?php echo e($count); ?>

    </span>

</a>
<div id="today-orders-tooltip-toggle" role="tooltip"
    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
    <?php echo app('translator')->get('modules.order.todayOrder'); ?>
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>
</div>
<?php $__env->startPush('scripts'); ?>

    <!--[if BLOCK]><![endif]--><?php if(pusherSettings()->is_enabled_pusher_broadcast): ?>
            <?php
        $__scriptKey = '2220033376-0';
        ob_start();
    ?>
            <script>
                document.addEventListener('DOMContentLoaded', function () {

                    const channel = PUSHER.subscribe('today-orders');
                    channel.bind('today-orders.updated', function(data) {
                        window.Livewire.find('<?php echo e($_instance->getId()); ?>').call('refreshOrders');
                        new Audio("<?php echo e(asset('sound/new_order.wav')); ?>").play();
                        console.log('✅ Pusher received data for today orders!. Refreshing...');
                    });
                    PUSHER.connection.bind('connected', () => {
                        console.log('✅ Pusher connected for Today Orders!');
                    });
                    channel.bind('pusher:subscription_succeeded', () => {
                        console.log('✅ Subscribed to today-orders channel!');
                    });
                });
            </script>
            <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
    <?php elseif($playSound): ?>
            <?php
        $__scriptKey = '2220033376-1';
        ob_start();
    ?>
            <script>
                console.log('✅ Playing sound for today orders!', "<?php echo e(asset('sound/new_order.wav')); ?>");
                new Audio("<?php echo e(asset('sound/new_order.wav')); ?>").play();
            </script>
            <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\script\resources\views/livewire/dashboard/today-orders.blade.php ENDPATH**/ ?>