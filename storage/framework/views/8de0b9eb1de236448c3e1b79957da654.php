<div>
    <div class="flex flex-col">
        <div class="flex gap-4 mb-4">
            <img class="w-16 h-16 rounded-md  object-cover" src="<?php echo e($menuItem->item_photo_url); ?>" alt="<?php echo e($menuItem->item_name); ?>">
            <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                <div class="text-base font-semibold text-gray-900 dark:text-white inline-flex items-center">
                    <img src="<?php echo e(asset('img/'.$menuItem->type.'.svg')); ?>" class="h-4 mr-2"
                        title="<?php echo app('translator')->get('modules.menu.' . $menuItem->type); ?>" alt="" />
                    <?php echo e($menuItem->item_name); ?>

                </div>
                <div class="text-sm font-normal text-gray-500 dark:text-gray-400"><?php echo e($menuItem->description); ?></div>
            </div>
        </div>

        <div class="w-full space-y-4">
            <!-- Table Headers for desktop -->
            <div class="hidden md:grid grid-cols-3 gap-4 px-4 py-2 bg-gray-100 dark:bg-gray-800 text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase rounded-md">
                <div><?php echo app('translator')->get('modules.menu.itemName'); ?></div>
                <div class="text-center"><?php echo app('translator')->get('modules.menu.setPrice'); ?></div>
                <div class="text-right"><?php echo app('translator')->get('app.action'); ?></div>
            </div>

            <?php $__currentLoopData = $menuItem->variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div
                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl hover:shadow-sm p-3 transition"
                    wire:key="menu-item-variation-<?php echo e($loop->index); ?>-<?php echo e($item->id); ?>">

                    <div class="md:hidden mb-2 space-y-1 text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                        <div><?php echo app('translator')->get('modules.menu.itemName'); ?></div>
                    </div>

                    <!-- Content Grid -->
                    <div class="grid md:grid-cols-3 gap-4 items-center">
                        <div class="text-base font-semibold text-gray-900 dark:text-white">
                            <?php echo e($item->variation); ?>

                        </div>

                        <!-- Price + Button Row for Mobile -->
                        <div class="md:hidden flex items-center justify-between gap-4">
                            <div class="text-sm text-gray-800 dark:text-white">
                                <div class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase mb-1"><?php echo app('translator')->get('modules.menu.setPrice'); ?></div>
                                <?php echo e($item->price ? currency_format($item->price, $item->menuItem->branch->restaurant->currency_id) : '--'); ?>

                            </div>
                            <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'setItemVariation('.e($item->id).')','wire:key' => 'del-var-btn-'.e($item->id).'','class' => 'text-sm']); ?>
                                <?php echo app('translator')->get('modules.order.select'); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale67687e3e4e61f963b25a6bcf3983629)): ?>
<?php $attributes = $__attributesOriginale67687e3e4e61f963b25a6bcf3983629; ?>
<?php unset($__attributesOriginale67687e3e4e61f963b25a6bcf3983629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale67687e3e4e61f963b25a6bcf3983629)): ?>
<?php $component = $__componentOriginale67687e3e4e61f963b25a6bcf3983629; ?>
<?php unset($__componentOriginale67687e3e4e61f963b25a6bcf3983629); ?>
<?php endif; ?>
                        </div>

                        <!-- Desktop Only Price -->
                        <div class="hidden md:block text-center text-sm text-gray-900 dark:text-white">
                            <?php echo e($item->price ? currency_format($item->price, $item->menuItem->branch->restaurant->currency_id) : '--'); ?>

                        </div>

                        <!-- Desktop Only Button -->
                        <div class="hidden md:flex justify-end">
                            <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'setItemVariation('.e($item->id).')','wire:key' => 'del-var-btn-'.e($item->id).'','class' => 'text-sm w-full md:w-auto']); ?>
                                <?php echo app('translator')->get('modules.order.select'); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale67687e3e4e61f963b25a6bcf3983629)): ?>
<?php $attributes = $__attributesOriginale67687e3e4e61f963b25a6bcf3983629; ?>
<?php unset($__attributesOriginale67687e3e4e61f963b25a6bcf3983629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale67687e3e4e61f963b25a6bcf3983629)): ?>
<?php $component = $__componentOriginale67687e3e4e61f963b25a6bcf3983629; ?>
<?php unset($__componentOriginale67687e3e4e61f963b25a6bcf3983629); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>

</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\pos\item-variations.blade.php ENDPATH**/ ?>