<div
    class="mx-4 p-6 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 dark:bg-gray-800">

    
    <div class="flex justify-between items-center mb-6">
        <div>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                <?php echo app('translator')->get('modules.settings.printerSetting'); ?>
            </h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                <?php echo app('translator')->get('modules.settings.printerSettingDescription'); ?>
            </p>
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
<?php $component->withAttributes(['type' => 'button','wire:click' => 'showAddPrinterModal']); ?>
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                <span class="text-sm"><?php echo app('translator')->get('modules.printerSetting.addPrinter'); ?></span>
            </div>
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



    
    <div class="mb-6 p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg">
        <div class="flex items-start">
            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 mt-0.5 me-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div>
                <h4 class="text-sm font-medium text-blue-800 dark:text-blue-200 mb-1">
                    <?php echo app('translator')->get('modules.printerSetting.desktopAppRequired'); ?>
                </h4>
                <p class="text-sm text-blue-700 dark:text-blue-300">
                    <?php echo app('translator')->get('modules.printerSetting.directPrintDesktopAppNote'); ?>
                </p>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $printers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $printer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow border p-5 flex flex-col justify-between relative group transition hover:shadow-xl">
                <div class="absolute -top-2 -left-2 w-8 h-8 bg-gray-300 text-white rounded-full flex items-center justify-center text-sm font-bold border-2 border-white dark:border-gray-800 shadow-sm">
                    <?php echo e($index + 1); ?>

                </div>
                <div class="flex items-center mb-2">
                    <h4 class="font-semibold text-lg truncate flex-1">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                        </svg>
                        <?php echo e($printer->name ?? '--'); ?></h4>
                    <!--[if BLOCK]><![endif]--><?php if($printer->is_default): ?>
                        <span class="ml-2 px-2 py-0.5 rounded text-xs bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200"><?php echo app('translator')->get('modules.printerSetting.default'); ?></span>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="flex items-center space-x-2 mb-2">
                    <span class="text-xs px-2 py-0.5 rounded <?php echo e($printer->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-200 text-gray-600'); ?>">
                        <?php echo e($printer->is_active ? __('app.active') : __('app.inactive')); ?>

                    </span>
                    
                </div>

                        <div class="text-sm text-gray-700 dark:text-gray-300 mb-4">
                        <div class="mb-1">
                            <strong><?php echo app('translator')->get('modules.printerSetting.kitchens'); ?> (<?php echo e(count($printer->kot_details)); ?>):</strong>
                            <ul class="mt-1 ml-2 list-disc text-xs">
                                <!--[if BLOCK]><![endif]--><?php $__empty_2 = true; $__currentLoopData = $printer->kot_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <li class="text-blue-700 dark:text-blue-200"><?php echo e($kot->name); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <li class="text-gray-400">--</li>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </ul>
                        </div>
                        <!--[if BLOCK]><![endif]--><?php if(count($printer->order_details) > 0): ?>
                        <div class="mb-1">
                            <strong><?php echo app('translator')->get('modules.printerSetting.orders'); ?> (<?php echo e(count($printer->order_details)); ?>):</strong>
                            <ul class="mt-1 ml-2 list-disc text-xs">
                                <!--[if BLOCK]><![endif]--><?php $__empty_2 = true; $__currentLoopData = $printer->order_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <li class="text-green-700 dark:text-green-200"><?php echo e($order->name); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <li class="text-gray-400">--</li>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </ul>
                        </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <div>
                        <strong><?php echo app('translator')->get('modules.printerSetting.printingChoice'); ?>:</strong>
                        <!--[if BLOCK]><![endif]--><?php if($printer->printing_choice === 'directPrint'): ?>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" clip-rule="evenodd"></path>
                                </svg>
                                <?php echo app('translator')->get('modules.printerSetting.directPrint'); ?>
                            </span>
                            <div class="mt-2 text-xs text-gray-600 dark:text-gray-300">
                                <strong><?php echo app('translator')->get('modules.printerSetting.details'); ?>:</strong>
                                <ul class="ml-2 mt-1 space-y-1">
                                    <li>
                                        <span class="font-semibold"><?php echo app('translator')->get('modules.printerSetting.printFormat'); ?>:</span>
                                        <?php echo e(__('modules.printerSetting.' . $printer->print_format) ?? '--'); ?>

                                    </li>
                                    <li>
                                        <span class="font-semibold"><?php echo app('translator')->get('modules.settings.printType'); ?>:</span>
                                        <!--[if BLOCK]><![endif]--><?php if($printer->print_type === 'pdf'): ?>
                                            <span class="inline-flex items-center px-1.5 py-0.5 rounded text-xs bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                                </svg>
                                                <?php echo e(strtoupper($printer->print_type)); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="inline-flex items-center px-1.5 py-0.5 rounded text-xs bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                <?php echo e(strtoupper($printer->print_type ?? 'IMAGE')); ?>

                                            </span>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </li>
                                </ul>
                            </div>
                        <?php elseif($printer->printing_choice === 'browserPopupPrint'): ?>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                <svg width="16px" height="16px" viewBox="0 0 192 192" xmlns="http://www.w3.org/2000/svg" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><circle cx="96" cy="96" r="74" stroke="#000000" stroke-width="12"></circle><ellipse cx="96" cy="96" stroke="#000000" stroke-width="12" rx="30" ry="74"></ellipse><path stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="12" d="M28 72h136M28 120h136"></path></g></svg>
                                <?php echo app('translator')->get('modules.printerSetting.browserPopupPrint'); ?>
                            </span>
                        <?php else: ?>
                            <span class="text-gray-500 dark:text-gray-400">--</span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                </div>
                <div class="flex space-x-2 mt-auto">
                    <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'editPrinter('.e($printer->id).')','size' => 'sm']); ?><?php echo app('translator')->get('app.edit'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale67687e3e4e61f963b25a6bcf3983629)): ?>
<?php $attributes = $__attributesOriginale67687e3e4e61f963b25a6bcf3983629; ?>
<?php unset($__attributesOriginale67687e3e4e61f963b25a6bcf3983629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale67687e3e4e61f963b25a6bcf3983629)): ?>
<?php $component = $__componentOriginale67687e3e4e61f963b25a6bcf3983629; ?>
<?php unset($__componentOriginale67687e3e4e61f963b25a6bcf3983629); ?>
<?php endif; ?>
                    <!--[if BLOCK]><![endif]--><?php if(!$printer->is_default): ?>
                        <?php if (isset($component)) { $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-button','data' => ['wire:click' => 'showDeletePrinter('.e($printer->id).')','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('danger-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'showDeletePrinter('.e($printer->id).')','size' => 'sm']); ?><?php echo app('translator')->get('app.delete'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11)): ?>
<?php $attributes = $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11; ?>
<?php unset($__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11)): ?>
<?php $component = $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11; ?>
<?php unset($__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11); ?>
<?php endif; ?>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => 'togglePrinterStatus('.e($printer->id).')','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'togglePrinterStatus('.e($printer->id).')','size' => 'sm']); ?>
                        <?php echo e($printer->is_active ? __('app.deactivate') : __('app.activate')); ?>

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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full text-center text-gray-400 py-12">
                <svg class="mx-auto mb-2 w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 4h6a2 2 0 002-2v-6a2 2 0 00-2-2h-6a2 2 0 00-2 2v6a2 2 0 002 2z" /></svg>
                <div><?php echo app('translator')->get('messages.noPrinterAdded'); ?></div>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <!--[if BLOCK]><![endif]--><?php if($desktopApp && $desktopApp->is_active): ?>
        
        <div class="md:col-span-2 mt-6 p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg mb-8">
            <h4 class="text-lg font-semibold text-blue-900 dark:text-blue-100 mb-3">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <?php echo app('translator')->get('modules.printerSetting.desktopAppConnection'); ?>
            </h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-blue-800 dark:text-blue-200 mb-2">
                        <?php echo app('translator')->get('modules.printerSetting.domainUrl'); ?>
                    </label>
                    <div class="flex">
                        <input type="text"
                            id="domainUrl"
                            value="<?php echo e(request()->getSchemeAndHttpHost()); ?>"
                            readonly
                            class="flex-1 px-3 py-2 bg-white dark:bg-gray-800 border border-blue-300 dark:border-blue-600 rounded-l-md text-sm text-gray-700 dark:text-gray-300 focus:outline-none">
                        <button type="button"
                            onclick="copyToClipboard('domainUrl', '<?php echo e(request()->getSchemeAndHttpHost()); ?>')"
                            class="px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-r-md text-sm transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-blue-800 dark:text-blue-200 mb-2">
                        <?php echo app('translator')->get('modules.printerSetting.branchKey'); ?>
                    </label>
                    <div class="flex">
                        <input type="password"
                            id="branchKey"
                            value="<?php echo e(branch()->unique_hash ?? 'No branch found'); ?>"
                            readonly
                            class="flex-1 px-3 py-2 bg-white dark:bg-gray-800 border border-blue-300 dark:border-blue-600 rounded-l-md text-sm text-gray-700 dark:text-gray-300 focus:outline-none">
                        <button type="button"
                            onclick="copyToClipboard('branchKey', '<?php echo e(branch()->unique_hash ?? ''); ?>')"
                            class="px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </button>
                        <button type="button" onclick="toggleBranchKeyVisibility()" class="px-3 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 dark:bg-gray-700 dark:text-gray-200 rounded-r-md text-sm transition-colors ml-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                        <button type="button" onclick="showResetBranchKeyModal()" class="px-3 flex items-center gap-2 py-2 bg-red-600 hover:bg-red-700 text-white text-sm rounded ml-1 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>

                            <?php echo app('translator')->get('modules.printerSetting.resetBranchKey'); ?>

                        </button>
                    </div>
                </div>
            </div>

            <div class="mt-3 text-sm text-blue-700 dark:text-blue-300">

                <p class="mb-2">
                    <strong><?php echo app('translator')->get('modules.printerSetting.instructions'); ?>:</strong>
                </p>

                <ol class="list-decimal list-inside space-y-1 ml-2">
                    <li><?php echo app('translator')->get('modules.printerSetting.instruction1'); ?></li>
                    <li><?php echo app('translator')->get('modules.printerSetting.instruction2'); ?></li>
                    <li><?php echo app('translator')->get('modules.printerSetting.instruction3'); ?></li>
                    <li><?php echo app('translator')->get('modules.printerSetting.instruction4'); ?></li>
                </ol>
            </div>
        </div>

    

        <div class="md:col-span-2 mt-6 p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg mb-8">
            <h4 class="text-lg font-semibold text-green-900 dark:text-green-100 mb-4">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <?php echo app('translator')->get('modules.printerSetting.downloadDesktopApp'); ?>
            </h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Windows -->
                <!--[if BLOCK]><![endif]--><?php if(!empty($desktopApp->windows_file_path)): ?>
                <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6 text-center hover:shadow-md transition-shadow <?php echo e(request()->header('User-Agent') && str_contains(strtolower(request()->header('User-Agent')), 'windows') ? 'ring-2 ring-blue-500 ring-offset-2 bg-blue-50 dark:bg-blue-900/20' : ''); ?>">
                    <div class="flex items-center justify-center mb-4">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-6 h-6"><rect x="3" y="3" width="7" height="7" rx="1" fill="#2563eb"></rect><rect x="14" y="3" width="7" height="7" rx="1" fill="#2563eb"></rect><rect x="3" y="14" width="7" height="7" rx="1" fill="#2563eb"></rect><rect x="14" y="14" width="7" height="7" rx="1" fill="#2563eb"></rect></svg>
                        <h5 class="ml-2 text-lg font-semibold text-gray-900 dark:text-white">Windows</h5>
                        <!--[if BLOCK]><![endif]--><?php if(request()->header('User-Agent') && str_contains(strtolower(request()->header('User-Agent')), 'windows')): ?>
                            <span class="ml-2 inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <?php echo app('translator')->get('modules.printerSetting.yourDevice'); ?>
                            </span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-4"><?php echo app('translator')->get('modules.printerSetting.downloadDesktopAppWindows'); ?></p>
                    <a href="<?php echo e($desktopApp->windows_file_path); ?>" target="_blank"
                       class="inline-flex items-center px-6 py-3 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                        <?php echo app('translator')->get('modules.printerSetting.downloadForWindows'); ?>
                    </a>
                </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!-- Mac -->
                <!--[if BLOCK]><![endif]--><?php if(!empty($desktopApp->mac_file_path)): ?>
                <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6 text-center hover:shadow-md transition-shadow <?php echo e(request()->header('User-Agent') && (str_contains(strtolower(request()->header('User-Agent')), 'mac') || str_contains(strtolower(request()->header('User-Agent')), 'darwin')) ? 'ring-2 ring-green-500 ring-offset-2 bg-green-50 dark:bg-green-900/20' : ''); ?>">
                    <div class="flex items-center justify-center mb-4">
                        <svg fill="currentColor" viewBox="0 0 24 24" class="w-8 h-8"><path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"></path></svg>
                        <h5 class="ml-2 text-lg font-semibold text-gray-900 dark:text-white">macOS</h5>
                        <?php if(request()->header('User-Agent') && (str_contains(strtolower(request()->header('User-Agent')), 'mac') || str_contains(strtolower(request()->header('User-Agent')), 'darwin'))): ?>
                            <span class="ml-2 inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <?php echo app('translator')->get('modules.printerSetting.yourDevice'); ?>
                            </span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-4"><?php echo app('translator')->get('modules.printerSetting.downloadDesktopAppMac'); ?></p>
                    <a href="<?php echo e($desktopApp->mac_file_path); ?>" target="_blank"
                       class="inline-flex items-center px-6 py-3 text-sm font-medium text-white bg-gray-800 border border-transparent rounded-lg hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                        <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                        <?php echo app('translator')->get('modules.printerSetting.downloadForMac'); ?>
                    </a>
                </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    
    <!--[if BLOCK]><![endif]--><?php if($showModal): ?>
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 pt-12">
            <div class="relative w-full max-w-4xl mx-4 mt-2 bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 animate-fade-in">
                <!-- Close Button -->
                <button wire:click="closeModal"
                    class="absolute top-3 right-3 text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 text-2xl font-bold focus:outline-none"
                    aria-label="Close">
                    &times;
                </button>
                <!-- Modal Title -->
                <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">
                    <?php echo e($id ? __('modules.settings.editPrinter') : __('modules.settings.addPrinter')); ?>

                </h2>
                <!-- Form -->
                <form wire:submit.prevent="<?php echo e($id ? 'update' : 'submitForm'); ?>" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div>
                                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'title','value' => __('modules.printerSetting.title')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'title','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.printerSetting.title'))]); ?>
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
                                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'title','type' => 'text','wire:model' => 'title','class' => 'mt-1 block w-full','placeholder' => ''.e(__('placeholders.addPrinterName')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'title','type' => 'text','wire:model' => 'title','class' => 'mt-1 block w-full','placeholder' => ''.e(__('placeholders.addPrinterName')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>

                                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'title','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'title','class' => 'mt-2']); ?>
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
                                                        <!-- KOT Multi-Select -->
                            <div>
                                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['value' => ''.e(__('modules.printerSetting.kotSelection')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => ''.e(__('modules.printerSetting.kotSelection')).'']); ?>
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
                                <!--[if BLOCK]><![endif]--><?php if(!$id): ?>
                                    <div class="mb-2 text-xs text-gray-500 dark:text-gray-400">
                                        <?php echo app('translator')->get('modules.printerSetting.selectIdleKitchens'); ?>
                                    </div>
                                <?php else: ?>
                                    <div class="mb-2 text-xs text-gray-500 dark:text-gray-400">
                                        <?php echo app('translator')->get('modules.printerSetting.selectKitchensForPrinter'); ?>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <div class="grid grid-cols-1 gap-2 mt-2">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $kots->where('is_active', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php

                                            $isCurrentlyAssigned = $kot->assignment_status === 'assigned';
                                            $isAssignedToThisPrinter = $id && is_array($selectedKots) && in_array($kot->id, $selectedKots);
                                            $canSelect = !$isCurrentlyAssigned || $isAssignedToThisPrinter;
                                        ?>
                                        <div class="flex items-center justify-between p-2 rounded border <?php echo e($isCurrentlyAssigned ? 'bg-gray-50 dark:bg-gray-700 border-gray-200 dark:border-gray-600' : 'bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-600'); ?>">
                                            <label class="flex items-center space-x-2 flex-1">
                                                <input type="checkbox"
                                                    wire:model="selectedKots"
                                                    value="<?php echo e($kot->id); ?>"
                                                    class="form-checkbox text-blue-600 rounded-md"
                                                    <?php echo e(!$canSelect ? 'disabled' : ''); ?>>
                                                <span class="text-sm <?php echo e($isCurrentlyAssigned ? 'text-gray-500 dark:text-gray-400' : 'text-gray-700 dark:text-gray-200'); ?>">
                                                    <?php echo e($kot->name); ?>

                                                </span>
                                            </label>
                                            <div class="flex items-center space-x-2">
                                                <!--[if BLOCK]><![endif]--><?php if($isCurrentlyAssigned): ?>
                                                    <!--[if BLOCK]><![endif]--><?php if($isAssignedToThisPrinter): ?>
                                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            <?php echo app('translator')->get('modules.printerSetting.currentlyAssigned'); ?>
                                                        </span>
                                                    <?php else: ?>
                                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200">
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            <?php echo app('translator')->get('modules.printerSetting.assigned'); ?>
                                                        </span>
                                                        <span class="text-xs text-gray-500 dark:text-gray-400">
                                                            <?php echo e($kot->assigned_printer_name); ?>

                                                        </span>
                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                <?php else: ?>
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        <?php echo app('translator')->get('modules.printerSetting.idle'); ?>
                                                    </span>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'selectedKots','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'selectedKots','class' => 'mt-2']); ?>
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
                                <!--[if BLOCK]><![endif]--><?php if(!empty($selectedKots)): ?>
                                    <div class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                        <strong><?php echo app('translator')->get('modules.printerSetting.selectedKitchens'); ?>:</strong>
                                        <span class="text-gray-700 dark:text-gray-300">
                                            <?php echo e(implode(', ', $kots->whereIn('id', $selectedKots)->pluck('name')->toArray())); ?>

                                        </span>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                                                        <!-- Order Multi-Select -->
                            <div>
                                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['value' => ''.e(__('modules.printerSetting.orderSelection')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => ''.e(__('modules.printerSetting.orderSelection')).'']); ?>
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
                                <!--[if BLOCK]><![endif]--><?php if(!$id): ?>
                                    <div class="mb-2 text-xs text-gray-500 dark:text-gray-400">
                                        <?php echo app('translator')->get('modules.printerSetting.selectIdlePosTerminals'); ?>
                                    </div>
                                <?php else: ?>
                                    <div class="mb-2 text-xs text-gray-500 dark:text-gray-400">
                                        <?php echo app('translator')->get('modules.printerSetting.selectPosTerminalsForPrinter'); ?>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <div class="grid grid-cols-1 gap-2 mt-2">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $isCurrentlyAssigned = $order->assignment_status === 'assigned';
                                            $isAssignedToThisPrinter = $id && in_array($order->id, $selectedOrders ?? []);
                                            $canSelect = !$isCurrentlyAssigned || $isAssignedToThisPrinter;
                                        ?>
                                        <div class="flex items-center justify-between p-2 rounded border <?php echo e($isCurrentlyAssigned ? 'bg-gray-50 dark:bg-gray-700 border-gray-200 dark:border-gray-600' : 'bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-600'); ?>">
                                            <label class="flex items-center space-x-2 flex-1">
                                                <input type="checkbox"
                                                    wire:model="selectedOrders"
                                                    value="<?php echo e($order->id); ?>"
                                                    class="form-checkbox text-blue-600 rounded-md"
                                                    <?php echo e(!$canSelect ? 'disabled' : ''); ?>>
                                                <span class="text-sm <?php echo e($isCurrentlyAssigned ? 'text-gray-500 dark:text-gray-400' : 'text-gray-700 dark:text-gray-200'); ?>">
                                                    <?php echo e($order->name); ?>

                                                </span>
                                            </label>
                                            <div class="flex items-center space-x-2">
                                                <!--[if BLOCK]><![endif]--><?php if($isCurrentlyAssigned): ?>
                                                    <!--[if BLOCK]><![endif]--><?php if($isAssignedToThisPrinter): ?>
                                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            <?php echo app('translator')->get('modules.printerSetting.currentlyAssigned'); ?>
                                                        </span>
                                                    <?php else: ?>
                                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200">
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            <?php echo app('translator')->get('modules.printerSetting.assigned'); ?>
                                                        </span>
                                                        <span class="text-xs text-gray-500 dark:text-gray-400">
                                                            <?php echo e($order->assigned_printer_name); ?>

                                                        </span>
                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                <?php else: ?>
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        <?php echo app('translator')->get('modules.printerSetting.idle'); ?>
                                                    </span>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'selectedOrders','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'selectedOrders','class' => 'mt-2']); ?>
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
                                <!--[if BLOCK]><![endif]--><?php if(!empty($selectedOrders)): ?>
                                    <div class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                        <strong><?php echo app('translator')->get('modules.printerSetting.selectedPosTerminal'); ?>:</strong>
                                        <span class="text-gray-700 dark:text-gray-300">
                                            <?php echo e(implode(', ', $orders->whereIn('id', $selectedOrders)->pluck('name')->toArray())); ?>

                                        </span>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                            <!-- Is Default Checkbox -->
                            <div>
                                <label class="flex items-center">
                                    <input type="checkbox" wire:model="isDefault" class="form-checkbox text-blue-600 rounded-md" />
                                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300"><?php echo app('translator')->get('modules.printerSetting.isDefault'); ?></span>
                                </label>
                                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'isDefault','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'isDefault','class' => 'mt-2']); ?>
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
                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div>
                                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'printChoice','value' => __('modules.printerSetting.printChoice')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'printChoice','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.printerSetting.printChoice'))]); ?>
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
                                <select id="printChoice" wire:model.live="printChoice" class="mt-1 block w-full border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white rounded-md shadow-sm">
                                    <option value="browserPopupPrint"><?php echo app('translator')->get('modules.printerSetting.browserPopupPrint'); ?></option>
                                    <option value="directPrint"><?php echo app('translator')->get('modules.printerSetting.directPrint'); ?></option>
                                </select>
                                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'printChoice','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'printChoice','class' => 'mt-2']); ?>
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

                            <!--[if BLOCK]><![endif]--><?php if($printChoice == 'directPrint'): ?>
                                <div>
                                    <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'selectprintFormat','value' => ''.e(__('modules.printerSetting.printFormat')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'selectprintFormat','value' => ''.e(__('modules.printerSetting.printFormat')).'']); ?>
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
                                    <select id="selectprintFormat" wire:model.defer="selectprintFormat" class="mt-1 block w-full border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white rounded-md shadow-sm">
                                        <option value=""><?php echo e(__('app.select')); ?></option>
                                        <option value="thermal56mm"><?php echo app('translator')->get('modules.printerSetting.thermal56mm'); ?></option>
                                        <option value="thermal80mm"><?php echo app('translator')->get('modules.printerSetting.thermal80mm'); ?></option>
                                        <option value="thermal112mm"><?php echo app('translator')->get('modules.printerSetting.thermal112mm'); ?></option>
                                    </select>
                                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'selectprintFormat','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'selectprintFormat','class' => 'mt-2']); ?>
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

                                <!-- Print Type Selection -->
                                <div>
                                    <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['value' => ''.e(__('modules.settings.printType')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => ''.e(__('modules.settings.printType')).'']); ?>
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
                                    <div class="mt-2 space-y-2">
                                        <label class="flex items-center">
                                            <input type="radio" wire:model="printType" value="image" class="form-radio text-blue-600" checked />
                                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                <?php echo app('translator')->get('modules.settings.image'); ?>
                                            </span>
                                            <span class="ml-2 text-xs text-gray-500 dark:text-gray-400">(<?php echo app('translator')->get('modules.settings.default'); ?>)</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="radio" wire:model="printType" value="pdf" class="form-radio text-blue-600" />
                                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                                </svg>
                                                <?php echo app('translator')->get('modules.settings.pdf'); ?>
                                            </span>
                                        </label>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                        <?php echo app('translator')->get('modules.settings.printTypeDescription'); ?>
                                    </p>
                                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'printType','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'printType','class' => 'mt-2']); ?>
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


                                <!-- Desktop App Requirement Notice -->
                                <div class="mt-4 p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 mt-0.5 me-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <div>
                                            <h4 class="text-sm font-medium text-blue-800 dark:text-blue-200 mb-1">
                                                <?php echo app('translator')->get('modules.printerSetting.desktopAppRequired'); ?>
                                            </h4>
                                            <p class="text-sm text-blue-700 dark:text-blue-300">
                                                <?php echo app('translator')->get('modules.printerSetting.directPrintDesktopAppNote'); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                    <div class="flex justify-end pt-6 space-x-3">
                        <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','wire:loading.attr' => 'disabled']); ?><?php echo e($id ? __('app.update') : __('app.save')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale67687e3e4e61f963b25a6bcf3983629)): ?>
<?php $attributes = $__attributesOriginale67687e3e4e61f963b25a6bcf3983629; ?>
<?php unset($__attributesOriginale67687e3e4e61f963b25a6bcf3983629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale67687e3e4e61f963b25a6bcf3983629)): ?>
<?php $component = $__componentOriginale67687e3e4e61f963b25a6bcf3983629; ?>
<?php unset($__componentOriginale67687e3e4e61f963b25a6bcf3983629); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginala6eb8d48d97827815852966e89cf193a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala6eb8d48d97827815852966e89cf193a = $attributes; } ?>
<?php $component = App\View\Components\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ButtonCancel::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'closeModal']); ?><?php echo app('translator')->get('app.cancel'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala6eb8d48d97827815852966e89cf193a)): ?>
<?php $attributes = $__attributesOriginala6eb8d48d97827815852966e89cf193a; ?>
<?php unset($__attributesOriginala6eb8d48d97827815852966e89cf193a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6eb8d48d97827815852966e89cf193a)): ?>
<?php $component = $__componentOriginala6eb8d48d97827815852966e89cf193a; ?>
<?php unset($__componentOriginala6eb8d48d97827815852966e89cf193a); ?>
<?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    
    <?php if (isset($component)) { $__componentOriginal5b8b2d0f151a30be878e1a760ec3900c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.confirmation-modal','data' => ['wire:model.live' => 'confrimDeletePrinter']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('confirmation-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'confrimDeletePrinter']); ?>
         <?php $__env->slot('title', null, []); ?> <?php echo app('translator')->get('modules.printerSetting.deletePrinter'); ?>? <?php $__env->endSlot(); ?>
         <?php $__env->slot('content', null, []); ?> <?php echo app('translator')->get('modules.printerSetting.deletePritnerConfirm'); ?> <?php $__env->endSlot(); ?>
         <?php $__env->slot('footer', null, []); ?> 
            <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => '$toggle(\'confrimDeletePrinter\')','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$toggle(\'confrimDeletePrinter\')','wire:loading.attr' => 'disabled']); ?><?php echo e(__('app.cancel')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $attributes = $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $component = $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
            <!--[if BLOCK]><![endif]--><?php if($printer): ?>
                <?php if (isset($component)) { $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-button','data' => ['class' => 'ml-3','wire:click' => 'confirmdeletePrinter','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('danger-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-3','wire:click' => 'confirmdeletePrinter','wire:loading.attr' => 'disabled']); ?><?php echo e(__('app.delete')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11)): ?>
<?php $attributes = $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11; ?>
<?php unset($__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11)): ?>
<?php $component = $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11; ?>
<?php unset($__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11); ?>
<?php endif; ?>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c)): ?>
<?php $attributes = $__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c; ?>
<?php unset($__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b8b2d0f151a30be878e1a760ec3900c)): ?>
<?php $component = $__componentOriginal5b8b2d0f151a30be878e1a760ec3900c; ?>
<?php unset($__componentOriginal5b8b2d0f151a30be878e1a760ec3900c); ?>
<?php endif; ?>

    <!-- Modal for Reset Branch Key Confirmation -->
<div id="resetBranchKeyModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 max-w-md w-full">
        <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.printerSetting.confirmResetBranchKey'); ?></h3>
        <p class="mb-6 text-gray-700 dark:text-gray-300"><?php echo app('translator')->get('modules.printerSetting.confirmResetBranchKeyDescription'); ?></p>
        <div class="flex justify-end gap-2">
            <button type="button" onclick="closeResetBranchKeyModal()" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 dark:bg-gray-700 dark:text-gray-200 rounded">Cancel</button>
            <button type="button" wire:click="resetBranchKey" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded">Reset</button>
        </div>
    </div>
</div>

</div>

<script>
    function copyToClipboard(elementId, text) {
        const element = document.getElementById(elementId);
        const button = element.nextElementSibling;
        const originalText = button.innerHTML;
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(text).then(function() {
                showCopySuccess(button, originalText);
            }).catch(function(err) {
                fallbackCopy(element, button, originalText);
            });
        } else {
            fallbackCopy(element, button, originalText);
        }
    }
    function fallbackCopy(element, button, originalText) {
        element.select();
        element.setSelectionRange(0, 99999);
        try {
            document.execCommand('copy');
            showCopySuccess(button, originalText);
        } catch (err) {
            showCopyError(button, originalText);
        }
    }
    function showCopySuccess(button, originalText) {
        button.innerHTML = `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>`;
        button.classList.remove('bg-blue-600', 'hover:bg-blue-700');
        button.classList.add('bg-green-600');
        const toast = document.createElement('div');
        toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
        toast.textContent = 'Copied to clipboard!';
        document.body.appendChild(toast);
        setTimeout(() => {
            button.innerHTML = originalText;
            button.classList.remove('bg-green-600');
            button.classList.add('bg-blue-600', 'hover:bg-blue-700');
            document.body.removeChild(toast);
        }, 2000);
    }
    function showCopyError(button, originalText) {
        button.innerHTML = `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>`;
        button.classList.remove('bg-blue-600', 'hover:bg-blue-700');
        button.classList.add('bg-red-600');
        const toast = document.createElement('div');
        toast.className = 'fixed top-4 right-4 bg-red-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
        toast.textContent = 'Failed to copy. Please select and copy manually.';
        document.body.appendChild(toast);
        setTimeout(() => {
            button.innerHTML = originalText;
            button.classList.remove('bg-red-600');
            button.classList.add('bg-blue-600', 'hover:bg-blue-700');
            document.body.removeChild(toast);
        }, 3000);
    }

    function toggleBranchKeyVisibility() {
        const input = document.getElementById('branchKey');
        if (input.type === 'password') {
            input.type = 'text';
        } else {
            input.type = 'password';
        }
    }

    function showResetBranchKeyModal() {
        document.getElementById('resetBranchKeyModal').classList.remove('hidden');
    }
    function closeResetBranchKeyModal() {
        document.getElementById('resetBranchKeyModal').classList.add('hidden');
    }
</script>



<?php /**PATH C:\xampp\htdocs\script\resources\views/livewire/settings/printer-setting.blade.php ENDPATH**/ ?>