<div class="px-4">

    <h2 class="text-2xl font-extrabold dark:text-white"><?php echo app('translator')->get('modules.order.myOrders'); ?></h2>

    <ul role="list" class=" space-y-2 dark:divide-gray-700 mt-4">
        <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <li class="p-3 border rounded-md">
            <a href="<?php echo e(route('order_success', $order->uuid)); ?>"  class="font-medium truncate dark:text-white" style="color: #011646;">
                <div class="flex w-full  space-y-4">

                    <div class="flex w-full items-center justify-between" >
                        <div class="flex items-center">
                            <div>
                                    <?php echo e($order->show_formatted_order_number); ?>


                                <div class="flex items-center flex-1 text-xs text-gray-500">
                                    <?php echo e($order->items->count()); ?> <?php echo app('translator')->get('modules.menu.item'); ?> | <?php echo e($order->date_time->timezone($restaurant->timezone)->translatedFormat('M d, Y h:i A')); ?>

                                </div>
                            </div>
                        </div>
                        <div class="inline-flex flex-col text-right text-base font-semibold text-gray-900 dark:text-white">
                            <div><?php echo e(currency_format($order->total, $restaurant->currency_id)); ?></div>
                            <div class="text-xs text-gray-500 font-light"><?php echo app('translator')->get('modules.order.includeTax'); ?></div>
                        </div>
                    </div>


                </div>
            </a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <li class="p-8 border rounded-md text-center">
            <div class="flex flex-col items-center justify-center space-y-3">
                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('messages.noItemAdded'); ?></h3>
                <p class="text-sm text-gray-500 dark:text-gray-400"><?php echo app('translator')->get('messages.startShoppingNow'); ?></p>
                <?php if (isset($component)) { $__componentOriginalecbfaf65020c31547e71f42b3a8afb5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-link','data' => ['wire:navigate' => true,'class' => 'inline-flex items-center','href' => ''.e(module_enabled('Subdomain')?url('/'):route('shop_restaurant',['hash' => $restaurant->hash])).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:navigate' => true,'class' => 'inline-flex items-center','href' => ''.e(module_enabled('Subdomain')?url('/'):route('shop_restaurant',['hash' => $restaurant->hash])).'']); ?>
                    <?php echo app('translator')->get('modules.menu.browseMenu'); ?>
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f)): ?>
<?php $attributes = $__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f; ?>
<?php unset($__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalecbfaf65020c31547e71f42b3a8afb5f)): ?>
<?php $component = $__componentOriginalecbfaf65020c31547e71f42b3a8afb5f; ?>
<?php unset($__componentOriginalecbfaf65020c31547e71f42b3a8afb5f); ?>
<?php endif; ?>
            </div>
        </li>
        <?php endif; ?>
    </ul>
</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\shop\orders.blade.php ENDPATH**/ ?>