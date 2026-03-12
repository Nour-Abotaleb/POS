<div>
    <h1 class="text-xl font-semibold text-gray-900 sm:text-xl dark:text-white my-2"><?php echo app('translator')->get('modules.order.todayOrder'); ?></h1>

    <div class="grid grid-cols-1 gap-3 sm:gap-4">
        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if (isset($component)) { $__componentOriginal2dbe8d657e3ba9219c30c398dcf419e3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2dbe8d657e3ba9219c30c398dcf419e3 = $attributes; } ?>
<?php $component = App\View\Components\Order\OrderCard::resolve(['order' => $item] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('order.order-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Order\OrderCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:key' => 'order-'.e($item->id . microtime()).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2dbe8d657e3ba9219c30c398dcf419e3)): ?>
<?php $attributes = $__attributesOriginal2dbe8d657e3ba9219c30c398dcf419e3; ?>
<?php unset($__attributesOriginal2dbe8d657e3ba9219c30c398dcf419e3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2dbe8d657e3ba9219c30c398dcf419e3)): ?>
<?php $component = $__componentOriginal2dbe8d657e3ba9219c30c398dcf419e3; ?>
<?php unset($__componentOriginal2dbe8d657e3ba9219c30c398dcf419e3); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="group flex justify-center gap-3 items-center border h-36 font-medium bg-white shadow-sm rounded-lg hover:shadow-md transition dark:bg-gray-700 dark:border-gray-600 p-3 dark:text-gray-400">
               <?php echo app('translator')->get('messages.waitingTodayOrder'); ?>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views/livewire/dashboard/today-order-list.blade.php ENDPATH**/ ?>