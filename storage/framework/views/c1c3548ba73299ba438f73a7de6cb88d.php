<div>
    <div class="flex flex-col">
        <!-- Item Header -->
        <div class="flex gap-4 mb-4">
            <!--[if BLOCK]><![endif]--><?php if(restaurant() && !restaurant()->hide_menu_item_image_on_customer_site): ?>
                <img class="w-16 h-16 rounded-md object-cover" src="<?php echo e($selectedModifierItem->item_photo_url); ?>" alt="<?php echo e($selectedModifierItem->item_name); ?>">
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <div class="text-sm font-normal text-gray-500 dark:text-gray-400 space-y-1">
                <div class="text-base font-semibold text-gray-900 dark:text-white inline-flex items-center">
                    <img src="<?php echo e(asset('img/'.$selectedModifierItem->type.'.svg')); ?>" class="h-4 me-2"
                        title="<?php echo app('translator')->get('modules.menu.' . $selectedModifierItem->type); ?>" alt="" />
                    <?php echo e($selectedModifierItem->item_name); ?>

                    <!--[if BLOCK]><![endif]--><?php if($selectedVariationName): ?> <span class="text-sm font-normal text-gray-500 dark:text-gray-400 ms-1">(<?php echo e($selectedVariationName); ?>)</span> <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="text-sm text-gray-500 dark:text-gray-400"><?php echo e($selectedModifierItem->description); ?></div>
                <div class="text-sm text-gray-800 dark:text-gray-400 mt-1 sm:mt-0 font-medium">
                    <?php echo e($selectedModifierItem->price ? currency_format($selectedModifierItem->price, $selectedModifierItem->branch->restaurant->currency_id) : __('--')); ?>

                </div>
            </div>
        </div>

        <!-- Modifiers List -->
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $modifiers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div x-data="{ open: true }" class="flex flex-col items-start mb-4 border p-2 rounded-md bg-white dark:bg-gray-800 dark:border-gray-700">

            <!-- Modifier Header (Clickable) -->
            <div class="flex justify-between items-center w-full cursor-pointer select-none p-3 rounded-md bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition-all"
                 @click="open = !open">
                <div class="flex flex-col justify-between w-full">
                    <div class="text-base font-semibold text-gray-900 dark:text-white">
                        <?php echo e($modifier->name); ?>

                    </div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 mt-1 sm:mt-0">
                        <?php echo e($modifier->description); ?>

                    </div>
                </div>

            <!-- Expand/Collapse Icon -->
            <svg x-bind:class="{ 'rotate-180': open }" class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform duration-300 transform"
                fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>

            <!-- Options Table (Collapsible) -->
            <div x-show="open" x-collapse class="overflow-x-auto w-full transition-all duration-300 ease-in-out">
                <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600 mt-2">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <?php echo app('translator')->get('modules.modifier.optionName'); ?>
                            </th>
                            <th class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                <?php echo app('translator')->get('modules.menu.setPrice'); ?>
                            </th>
                            <th class="py-2.5 px-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-right">
                                <?php echo app('translator')->get('app.select'); ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $modifier->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="py-2.5 px-4 text-sm text-gray-900 dark:text-white">
                                    <?php echo e($option->name); ?>

                                </td>
                                <td class="py-2.5 px-4 text-sm text-gray-900 dark:text-white">
                                    <?php echo e($option->price ? currency_format($option->price, $selectedModifierItem->branch->restaurant->currency_id) : __('--')); ?>

                                </td>
                                <td class="py-2.5 px-4 text-right">
                                    <!--[if BLOCK]><![endif]--><?php if($option->is_available): ?>
                                    <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['wire:model' => 'selectedModifiers.'.e($option->id).'','wire:click' => 'toggleSelection('.e($modifier->id).', '.e($option->id).')','value' => ''.e($option->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'selectedModifiers.'.e($option->id).'','wire:click' => 'toggleSelection('.e($modifier->id).', '.e($option->id).')','value' => ''.e($option->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal74b62b190a03153f11871f645315f4de)): ?>
<?php $attributes = $__attributesOriginal74b62b190a03153f11871f645315f4de; ?>
<?php unset($__attributesOriginal74b62b190a03153f11871f645315f4de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal74b62b190a03153f11871f645315f4de)): ?>
<?php $component = $__componentOriginal74b62b190a03153f11871f645315f4de; ?>
<?php unset($__componentOriginal74b62b190a03153f11871f645315f4de); ?>
<?php endif; ?>
                                    <?php else: ?>
                                    <span class="text-xs font-medium px-2.5 py-0.5 rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                        <?php echo app('translator')->get('modules.menu.notAvailable'); ?>
                                    </span>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'requiredModifiers.'.e($modifier->id).'','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'requiredModifiers.'.e($modifier->id).'','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
            </div>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <!-- Save Button -->
    <div class="mt-4 text-right">
        <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'saveModifiers','class' => 'bg-blue-500 hover:bg-blue-600 text-white']); ?>
            <?php echo app('translator')->get('app.save'); ?>
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
        <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => '$dispatch(\'closeModifiersModal\')','class' => 'ml-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$dispatch(\'closeModifiersModal\')','class' => 'ml-3']); ?>
            <?php echo app('translator')->get('app.cancel'); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $attributes = $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $component = $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views/livewire/pos/item-modifiers.blade.php ENDPATH**/ ?>