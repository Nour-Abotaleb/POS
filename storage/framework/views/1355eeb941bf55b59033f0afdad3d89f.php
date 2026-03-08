<div class="grid grid-cols-1 gap-6 mx-4 p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">

    <div >
        <h3 class="mb-4 text-xl font-semibold dark:text-white"><?php echo app('translator')->get('modules.settings.kotSettings'); ?></h3>

        <form wire:submit="submitForm" class="grid gap-6 grid-cols-1 md:grid-cols-2">
            <div class="grid gap-6 border border-gray-200 dark:border-gray-700 p-4 rounded-lg">
                <div>
                    <div class="relative flex items-start p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors duration-200">
                        <div class="flex items-center h-5">
                            <input type="checkbox" id="enableItemLevelStatus" wire:model="enableItemLevelStatus" 
                                class="w-5 h-5 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                        </div>
                        <div class="ml-4">
                            <label for="enableItemLevelStatus" class="text-base font-medium text-gray-900 dark:text-white">
                                <?php echo app('translator')->get('modules.settings.enableItemLevelStatus'); ?>
                            </label>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                <?php echo app('translator')->get('modules.settings.enableItemLevelStatusDescription'); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div>
                    <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'defaultKotStatus','value' => __('modules.settings.defaultKotStatus')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'defaultKotStatus','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.settings.defaultKotStatus'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400"><?php echo app('translator')->get('modules.settings.defaultKotStatusDescription'); ?></p>
                    <div class="mt-4 grid gap-4">
                        <div class="relative flex items-start p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors duration-200">
                            <div class="flex items-center h-5">
                                <input id="statusPending" type="radio" wire:model="defaultKotStatus" value="pending" 
                                    class="w-5 h-5 border-gray-300 text-primary-600 focus:ring-primary-500">
                            </div>
                            <div class="ml-4">
                                <label for="statusPending" class="text-base font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.settings.kotStatusesPending'); ?></label>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400"><?php echo app('translator')->get('modules.settings.kotStatusesPendingDescription'); ?></p>
                            </div>
                        </div>

                        <div class="relative flex items-start p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors duration-200">
                            <div class="flex items-center h-5">
                                <input id="statusCooking" type="radio" wire:model="defaultKotStatus" value="cooking" 
                                    class="w-5 h-5 border-gray-300 text-primary-600 focus:ring-primary-500">
                            </div>
                            <div class="ml-4">
                                <label for="statusCooking" class="text-base font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.settings.kotStatusesCooking'); ?></label>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400"><?php echo app('translator')->get('modules.settings.kotStatusesCookingDescription'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>

            <div class="col-span-1 md:col-span-2">
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
        </form>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\settings\kot-settings.blade.php ENDPATH**/ ?>