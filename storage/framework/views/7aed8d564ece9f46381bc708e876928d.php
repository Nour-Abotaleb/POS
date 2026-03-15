<div>
    

    <div>
        <form wire:submit.prevent="save" class="space-y-4">
            <!-- Kitchen Name -->
            <div>
                <label for="kitchenName" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                    <?php echo app('translator')->get('kitchen::modules.menu.kitchenName'); ?> <span class="text-red-500">*</span>
                </label>
                <div class="mt-1">
                    <input type="text" wire:model="kitchenName" id="kitchenName"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white sm:text-sm"
                        placeholder="<?php echo e(__('kitchen::placeholders.enterKitchenName')); ?>">
                </div>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['kitchenName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                    <?php echo app('translator')->get('kitchen::modules.menu.description'); ?>
                </label>
                <div class="mt-1">
                    <textarea wire:model="description" id="description" rows="3"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white sm:text-sm"
                        placeholder="<?php echo e(__('kitchen::placeholders.enterKitchenDescription')); ?>"></textarea>
                </div>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <!-- Printer Name -->
            <div>
                <label for="printer_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                    <?php echo app('translator')->get('kitchen::modules.menu.selectPrinter'); ?> <span class="text-red-500">*</span>
                </label>
                <div class="mt-1">
                    <select wire:model="printer_name" id="printer_name"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white sm:text-sm">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $availablePrinters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $printer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($printer->id); ?>"><?php echo e($printer->name); ?> <?php echo e($printer->type == 'windows' ? '('.$printer->share_name.')' : ''); ?> - <?php echo e($printer->printing_choice); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </select>
                </div>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['printer_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <!-- Is Active -->


            <!-- Submit Button -->
            <div class="mt-4 flex justify-end space-x-2">
                <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','wire:loading.attr' => 'disabled']); ?>
                    <?php echo app('translator')->get('kitchen::modules.menu.save'); ?>
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
        </form>
    </div>


</div>
<?php /**PATH C:\xampp\htdocs\script\Modules/Kitchen\Resources/views/livewire/forms/add-kitchen.blade.php ENDPATH**/ ?>