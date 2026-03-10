<div class="relative">
    <a <?php if(pusherSettings()->is_enabled_pusher_broadcast): ?> wire:poll.15s.visible <?php else: ?> wire:poll.10s.visible <?php endif; ?>
    href="<?php echo e(route('waiter-requests.index')); ?>" wire:navigate
    class="hidden lg:inline-flex items-center px-2 py-1 text-sm font-medium text-center text-gray-600 bg-white border-skin-base border rounded-md focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-gray-800 dark:text-gray-300"
    data-tooltip-target="active-waiter-requests-tooltip-toggle"
    >
    <img src="<?php echo e(asset('img/waiter.svg')); ?>" alt="Active Waiter Requests" class="w-5 h-5">

    <span
        class="inline-flex items-center justify-center px-2 py-0.5 ms-2 text-xs font-semibold text-white bg-skin-base rounded-md" style="background-color: #011646; border-color: #011646;">
        <?php echo e($count); ?>

    </span>
</a>
<div id="active-waiter-requests-tooltip-toggle" role="tooltip"
    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
    <?php echo app('translator')->get('modules.waiterRequest.newWaiterRequests'); ?>
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>
</div>

<?php $__env->startPush('scripts'); ?>

    <!--[if BLOCK]><![endif]--><?php if(pusherSettings()->is_enabled_pusher_broadcast): ?>
            <?php
        $__scriptKey = '1203507189-0';
        ob_start();
    ?>
            <script>
                document.addEventListener('DOMContentLoaded', function () {

                const channel = PUSHER.subscribe('active-waiter-requests');
                channel.bind('active-waiter-requests.created', function(data) {
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').call('refreshActiveWaiterRequests');
                    console.log('✅ Pusher received data for active waiter requests!. Refreshing...');
                    });
                    PUSHER.connection.bind('connected', () => {
                    console.log('✅ Pusher connected for Active Waiter Requests!');
                    });
                    channel.bind('pusher:subscription_succeeded', () => {
                    console.log('✅ Subscribed to active-waiter-requests channel!');
                    });
                });
            </script>
            <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <script>
        // Listen for custom event to play sound - setup immediately
        document.addEventListener('livewire:init', () => {
            console.log('🔧 Setting up waiter request event listeners...');

            // Listen for the play-waiter-sound event
            window.addEventListener('play-waiter-sound', (event) => {
                console.log('🔔 Playing waiter request sound! (window event)', event);
                const audio = new Audio("<?php echo e(asset('sound/new_order.wav')); ?>");
                audio.play().then(() => {
                    console.log('✅ Sound played successfully!');
                }).catch(error => {
                    console.error('❌ Error playing sound:', error);
                });
            });

            // Also listen via Livewire events
            Livewire.on('play-waiter-sound', (event) => {
                console.log('🔔 Playing waiter request sound! (Livewire event)', event);
                const audio = new Audio("<?php echo e(asset('sound/new_order.wav')); ?>");
                audio.play().then(() => {
                    console.log('✅ Sound played successfully!');
                }).catch(error => {
                    console.error('❌ Error playing sound:', error);
                });
            });

            // Listen for waiterRequestCreated event
            Livewire.on('waiterRequestCreated', (data) => {
                console.log('✅ Livewire event received for waiter request!', data);
                // Refresh the component to show new count and popup
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').call('refreshActiveWaiterRequests');
            });

            console.log('🔧 Waiter request component event listeners ready!');
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH E:\nomu\testfood\POS\resources\views/livewire/dashboard/active-waiter-requests.blade.php ENDPATH**/ ?>