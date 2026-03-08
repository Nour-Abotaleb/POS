<div>
    <div class=" bg-white block sm:flex items-center justify-between dark:bg-gray-800 dark:border-gray-700 mb-4">
        <div class="inline-flex gap-4 items-center">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"><?php echo e($customer->name); ?></h1>

            <span class='text-xs h-fit font-medium px-2 py-1 rounded uppercase tracking-wide whitespace-nowrap bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-400 border border-gray-400'>
                    <?php echo e($customer->orders->count()); ?> <?php echo app('translator')->get('menu.orders'); ?>
            </span>
        </div>

        <div class="text-lg font-medium text-gray-800">
           <?php echo app('translator')->get('modules.order.total'); ?>: <?php echo e(currency_format($customer->orders->sum('total'), restaurant()->currency_id)); ?>

        </div>

    </div>

    <div class="flex flex-col">

        <!-- Card Section -->
        <div class="space-y-4">
            <div class="grid sm:grid-cols-2 gap-3 sm:gap-4">
                <?php $__currentLoopData = $customer->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <!-- End Card Section -->


    </div>
</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\customer\customer-orders.blade.php ENDPATH**/ ?>