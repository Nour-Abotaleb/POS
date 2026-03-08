<div class="grid grid-cols-1 px-4">

    <form wire:submit="submitForm" class="space-y-6">
        <div
            class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800 xl:mb-0">
            <div class="flow-root">
                <h3 class="text-xl font-semibold dark:text-white"><?php echo app('translator')->get('modules.settings.notificationSettings'); ?></h3>

                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    <?php $__currentLoopData = $notificationSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- Item 1 -->
                    <div class="flex items-center justify-between py-4">
                        <div class="flex flex-col flex-grow">
                            <div class="text-lg font-semibold text-gray-900 dark:text-white">
                                <?php if(\Lang::has('multipos::app.notifications.' . $item->type)): ?>
                                    <?php echo app('translator')->get('multipos::app.notifications.' . $item->type); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('modules.notifications.' . $item->type); ?>
                                <?php endif; ?>
                            </div>
                            <div class="text-base font-normal text-gray-500 dark:text-gray-400">
                                <?php if(\Lang::has('multipos::app.notifications.' . $item->type . '_info')): ?>
                                    <?php echo app('translator')->get('multipos::app.notifications.' . $item->type . '_info'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('modules.notifications.' . $item->type.'_info'); ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <label for="checkbox_<?php echo e($item->type); ?>" class="relative flex items-center cursor-pointer"
                            wire:key='send_email_<?php echo e(microtime()); ?>'>
                            <input type="checkbox" id="checkbox_<?php echo e($item->type); ?>" <?php if($sendEmail[$key]): echo 'checked'; endif; ?>
                                wire:model.live='sendEmail.<?php echo e($key); ?>' class="sr-only">
                            <span
                                class="h-6 bg-gray-200 border border-gray-200 rounded-full w-11 toggle-bg dark:bg-gray-700 dark:border-gray-600"></span>
                        </label>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

                <div class="mt-6">
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
        </div>
    </form>
</div><?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\settings\notification-settings.blade.php ENDPATH**/ ?>