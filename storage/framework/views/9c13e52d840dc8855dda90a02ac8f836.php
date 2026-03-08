<div>
    <div
        class="mx-4 p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">

        <h3 class="mb-4 text-xl font-semibold dark:text-white inline-flex gap-4 items-center"><?php echo app('translator')->get('modules.settings.restaurantSettings'); ?></h3>

        <form wire:submit="submitForm">
            <div class="grid gap-6">

                <div class="flex items-center justify-between py-4">
                    <div class="flex flex-col flex-grow">
                        <div class="text-base font-semibold text-gray-900 dark:text-white">
                            <?php echo app('translator')->get('modules.settings.restaurantRequiresApproval'); ?>
                        </div>
                        <div class="text-base font-normal text-gray-500 dark:text-gray-400">
                            <?php echo app('translator')->get('modules.settings.restaurantRequiresApprovalInfo'); ?>
                        </div>
                    </div>

                    <label for="requiresApproval" class="relative flex items-center cursor-pointer">
                        <input type="checkbox" id="requiresApproval" wire:model='requiresApproval' class="sr-only">
                        <span class="h-6 bg-gray-200 rounded-full w-11 toggle-bg dark:bg-gray-700 dark:border-gray-600"></span>
                    </label>
                </div>

                <div>
                    <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo app('translator')->get('app.save'); ?> <?php echo $__env->renderComponent(); ?>
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
        </form>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\settings\restaurant-settings.blade.php ENDPATH**/ ?>