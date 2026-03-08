<div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <!-- Page Header -->
    <div class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white"><?php echo e(__('modules.menu.bulkUploadMenuItems')); ?></h1>
                        <p class="mt-2 text-gray-600 dark:text-gray-400"><?php echo e(__('modules.menu.bulkUpload')); ?> <?php echo e(__('modules.menu.allMenuItems')); ?> <?php echo e(__('app.from')); ?> CSV <?php echo e(__('app.or')); ?> Excel <?php echo e(__('app.files')); ?></p>
                    </div>
                    <div class="flex space-x-3">
                        <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => 'downloadSampleFile','class' => 'flex items-center space-x-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'downloadSampleFile','class' => 'flex items-center space-x-2']); ?>
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <span><?php echo e(__('modules.menu.downloadSampleFile')); ?></span>
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
                        <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => 'resetUploadState','class' => 'flex items-center space-x-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'resetUploadState','class' => 'flex items-center space-x-2']); ?>
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            <span><?php echo e(__('modules.menu.startNewUpload')); ?></span>
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
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="w-full px-4 sm:px-6 lg:px-8 py-2">

    <?php if($uploadStage === 'idle'): ?>
    <!-- Upload Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <!-- Left Column: Instructions -->
        <div class="space-y-4">
            <!-- Step 1: Instructions -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
                <div class="flex items-center space-x-2 mb-3">
                    <div class="flex-shrink-0 w-6 h-6 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                        <span class="text-blue-600 dark:text-blue-400 font-semibold text-xs">1</span>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white"><?php echo e(__('modules.menu.importInstructions')); ?></h3>
                </div>

                <div class="space-y-3">
                    <div>
                        <h4 class="text-xs font-medium text-gray-900 dark:text-white mb-1"><?php echo e(__('modules.menu.requiredColumns')); ?>:</h4>
                        <div class="grid grid-cols-1 gap-1">
                            <div class="flex items-center space-x-2 p-1.5 bg-green-50 dark:bg-green-900/20 rounded">
                                <code class="bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-200 px-1.5 py-0.5 rounded text-xs font-mono">item_name</code>
                                <span class="text-xs text-gray-600 dark:text-gray-400"><?php echo e(__('modules.menu.itemName')); ?></span>
                            </div>
                            <div class="flex items-center space-x-2 p-1.5 bg-green-50 dark:bg-green-900/20 rounded">
                                <code class="bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-200 px-1.5 py-0.5 rounded text-xs font-mono">category_name</code>
                                <span class="text-xs text-gray-600 dark:text-gray-400"><?php echo e(__('modules.menu.itemCategory')); ?> <span class="text-blue-600 dark:text-blue-400">(<?php echo e(__('app.autoCreated')); ?>)</span></span>
                            </div>
                            <div class="flex items-center space-x-2 p-1.5 bg-green-50 dark:bg-green-900/20 rounded">
                                <code class="bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-200 px-1.5 py-0.5 rounded text-xs font-mono">menu_name</code>
                                <span class="text-xs text-gray-600 dark:text-gray-400"><?php echo e(__('modules.menu.menuName')); ?> <span class="text-blue-600 dark:text-blue-400">(<?php echo e(__('app.autoCreated')); ?>)</span></span>
                            </div>
                            <div class="flex items-center space-x-2 p-1.5 bg-green-50 dark:bg-green-900/20 rounded">
                                <code class="bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-200 px-1.5 py-0.5 rounded text-xs font-mono">price</code>
                                <span class="text-xs text-gray-600 dark:text-gray-400"><?php echo e(__('modules.menu.setPrice')); ?></span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-xs font-medium text-gray-900 dark:text-white mb-1"><?php echo e(__('app.optional')); ?> <?php echo e(__('modules.menu.requiredColumns')); ?>:</h4>
                        <div class="grid grid-cols-1 gap-1">
                            <div class="flex items-center space-x-2 p-1.5 bg-gray-50 dark:bg-gray-700 rounded">
                                <code class="bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 px-1.5 py-0.5 rounded text-xs font-mono">description</code>
                                <span class="text-xs text-gray-600 dark:text-gray-400"><?php echo e(__('modules.menu.itemDescription')); ?></span>
                            </div>
                            <div class="flex items-center space-x-2 p-1.5 bg-gray-50 dark:bg-gray-700 rounded">
                                <code class="bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 px-1.5 py-0.5 rounded text-xs font-mono">type</code>
                                <span class="text-xs text-gray-600 dark:text-gray-400"><?php echo e(__('modules.menu.veg')); ?>/<?php echo e(__('modules.menu.non-veg')); ?>/<?php echo e(__('modules.menu.egg')); ?></span>
                            </div>
                            <div class="flex items-center space-x-2 p-1.5 bg-gray-50 dark:bg-gray-700 rounded">
                                <code class="bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 px-1.5 py-0.5 rounded text-xs font-mono">show_on_customer_site</code>
                                <span class="text-xs text-gray-600 dark:text-gray-400"><?php echo e(__('app.yes')); ?>/<?php echo e(__('app.no')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Available Data Reference -->
            <?php if(!empty($availableCategories) || !empty($availableMenus)): ?>
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
                <div class="flex items-center space-x-2 mb-3">
                    <div class="flex-shrink-0 w-6 h-6 bg-amber-100 dark:bg-amber-900/30 rounded-full flex items-center justify-center">
                        <svg class="h-3 w-3 text-amber-600 dark:text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white"><?php echo e(__('modules.menu.availableInSystem')); ?></h3>
                </div>

                <div class="space-y-3">
                    <?php if(!empty($availableCategories)): ?>
                    <div>
                        <h4 class="text-xs font-medium text-gray-900 dark:text-white mb-1"><?php echo e(__('modules.menu.categories')); ?> (<?php echo e(count($availableCategories)); ?>):</h4>
                        <div class="flex flex-wrap gap-1">
                            <?php $__currentLoopData = $availableCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="bg-amber-100 dark:bg-amber-800 text-amber-800 dark:text-amber-200 px-2 py-0.5 rounded-full text-xs"><?php echo e($category); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if(!empty($availableMenus)): ?>
                    <div>
                        <h4 class="text-xs font-medium text-gray-900 dark:text-white mb-1"><?php echo e(__('modules.menu.menus')); ?> (<?php echo e(count($availableMenus)); ?>):</h4>
                        <div class="flex flex-wrap gap-1">
                            <?php $__currentLoopData = $availableMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-200 px-2 py-0.5 rounded-full text-xs"><?php echo e($menu); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="mt-3 p-2 bg-blue-50 dark:bg-blue-900/20 rounded">
                    <p class="text-xs text-blue-800 dark:text-blue-200">
                        <svg class="inline w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <?php echo e(__('modules.menu.availableInSystemDescription')); ?>

                    </p>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- Right Column: Upload Form -->
        <div class="space-y-4">
            <!-- Step 2: File Upload -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
                <div class="flex items-center space-x-2 mb-3">
                    <div class="flex-shrink-0 w-6 h-6 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                        <span class="text-blue-600 dark:text-blue-400 font-semibold text-xs">2</span>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white"><?php echo e(__('modules.menu.uploadFile')); ?></h3>
                </div>

                <div class="upload-area border-2 border-dashed border-gray-300 dark:border-gray-600 rounded p-3 text-center hover:border-blue-400 dark:hover:border-blue-500 transition-colors duration-200 <?php echo e($uploadFile ? 'border-green-400 bg-green-50 dark:bg-green-900/20' : ''); ?>">
                    <div class="space-y-2">
                        <?php if($uploadFile): ?>
                        <div class="mx-auto w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-green-900 dark:text-green-100"><?php echo e(__('app.fileSelected')); ?></h4>
                            <p class="text-xs text-green-700 dark:text-green-300 truncate" title="<?php echo e($uploadFile->getClientOriginalName()); ?>"><?php echo e($uploadFile->getClientOriginalName()); ?></p>
                        </div>
                        <?php else: ?>
                        <div class="mx-auto w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-900 dark:text-white"><?php echo e(__('modules.menu.uploadFile')); ?></h4>
                            <p class="text-xs text-gray-600 dark:text-gray-400"><?php echo e(__('modules.menu.dragDropFile')); ?></p>
                        </div>
                        <?php endif; ?>

                        <div>
                            <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'uploadFile','type' => 'file','class' => 'block w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-blue-900/30 dark:file:text-blue-300','wire:model' => 'uploadFile','accept' => '.csv,.xlsx,.xls']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'uploadFile','type' => 'file','class' => 'block w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-blue-900/30 dark:file:text-blue-300','wire:model' => 'uploadFile','accept' => '.csv,.xlsx,.xls']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'uploadFile','class' => 'mt-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'uploadFile','class' => 'mt-1']); ?>
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
                </div>
            </div>

            <!-- Step 3: Kitchen Selection -->
            <?php if($availableKitchens->count() > 1): ?>
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
                <div class="flex items-center space-x-2 mb-3">
                    <div class="flex-shrink-0 w-6 h-6 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                        <span class="text-blue-600 dark:text-blue-400 font-semibold text-xs">3</span>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white"><?php echo e(__('modules.menu.selectKitchen')); ?></h3>
                </div>

                <p class="text-xs text-gray-600 dark:text-gray-400 mb-3"><?php echo e(__('modules.menu.selectKitchenDescription')); ?></p>

                <div class="space-y-2">
                    <?php $__currentLoopData = $availableKitchens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kitchen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label class="flex items-center space-x-2 p-2 border border-gray-200 dark:border-gray-700 rounded cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors <?php echo e($selectedKitchenId == $kitchen->id ? 'border-blue-400 bg-blue-50 dark:bg-blue-900/20' : ''); ?>">
                        <input type="radio" wire:model.live="selectedKitchenId" value="<?php echo e($kitchen->id); ?>" class="text-blue-600 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="text-sm font-medium text-gray-900 dark:text-white"><?php echo e($kitchen->name); ?></div>
                            <?php if($kitchen->type): ?>
                            <div class="text-xs text-gray-500 dark:text-gray-400"><?php echo e(ucfirst($kitchen->type)); ?></div>
                            <?php endif; ?>
                        </div>
                        <?php if($selectedKitchenId == $kitchen->id): ?>
                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <?php endif; ?>
                    </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'selectedKitchenId','class' => 'mt-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'selectedKitchenId','class' => 'mt-1']); ?>
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
            <?php elseif($availableKitchens->count() === 1): ?>
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
                <div class="flex items-center space-x-2 mb-3">
                    <div class="flex-shrink-0 w-6 h-6 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                        <svg class="h-3 w-3 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white"><?php echo e(__('modules.menu.kitchenSelected')); ?></h3>
                </div>

                <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded p-2">
                    <div class="flex items-center space-x-2">
                        <svg class="h-4 w-4 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <div>
                            <span class="text-xs font-medium text-green-800 dark:text-green-200"><?php echo e($availableKitchens->first()->name); ?></span>
                            <?php if($availableKitchens->first()->type): ?>
                            <span class="text-xs text-green-700 dark:text-green-300 ml-1">(<?php echo e(ucfirst($availableKitchens->first()->type)); ?>)</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Step 4: Start Import -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
                <div class="flex items-center space-x-2 mb-3">
                    <div class="flex-shrink-0 w-6 h-6 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                        <span class="text-blue-600 dark:text-blue-400 font-semibold text-xs">4</span>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white"><?php echo e(__('modules.menu.startImport')); ?></h3>
                </div>

                <!-- Validation Status -->
                <div class="space-y-2 mb-4">
                    <div class="flex items-center space-x-2 p-2 rounded <?php echo e($uploadFile ? 'bg-green-50 dark:bg-green-900/20' : 'bg-gray-50 dark:bg-gray-700'); ?>">
                        <div class="flex-shrink-0 w-5 h-5 rounded-full flex items-center justify-center <?php echo e($uploadFile ? 'bg-green-100 dark:bg-green-800' : 'bg-gray-200 dark:bg-gray-600'); ?>">
                            <?php if($uploadFile): ?>
                            <svg class="w-3 h-3 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <?php else: ?>
                            <svg class="w-3 h-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <?php endif; ?>
                        </div>
                        <span class="text-xs <?php echo e($uploadFile ? 'text-green-800 dark:text-green-200' : 'text-gray-600 dark:text-gray-400'); ?>">
                            <?php echo e($uploadFile ? __('app.fileSelected') : __('app.selectFile')); ?>

                        </span>
                    </div>

                    <div class="flex items-center space-x-2 p-2 rounded <?php echo e(($availableKitchens->count() === 1 || $selectedKitchenId) ? 'bg-green-50 dark:bg-green-900/20' : 'bg-gray-50 dark:bg-gray-700'); ?>">
                        <div class="flex-shrink-0 w-5 h-5 rounded-full flex items-center justify-center <?php echo e(($availableKitchens->count() === 1 || $selectedKitchenId) ? 'bg-green-100 dark:bg-green-800' : 'bg-gray-200 dark:bg-gray-600'); ?>">
                            <?php if($availableKitchens->count() === 1 || $selectedKitchenId): ?>
                            <svg class="w-3 h-3 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <?php else: ?>
                            <svg class="w-3 h-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <?php endif; ?>
                        </div>
                        <span class="text-xs <?php echo e(($availableKitchens->count() === 1 || $selectedKitchenId) ? 'text-green-800 dark:text-green-200' : 'text-gray-600 dark:text-gray-400'); ?>">
                            <?php echo e($availableKitchens->count() === 1 ? __('modules.menu.kitchenSelected') : ($selectedKitchenId ? __('modules.menu.kitchenSelected') : __('modules.menu.selectKitchen'))); ?>

                        </span>
                    </div>
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
<?php $component->withAttributes(['wire:click' => 'goToPreview','wire:loading.attr' => 'disabled','disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!$uploadFile || ($availableKitchens->count() > 1 && !$selectedKitchenId)),'class' => 'w-full flex items-center justify-center space-x-1 text-sm py-2 '.e((!$uploadFile || ($availableKitchens->count() > 1 && !$selectedKitchenId)) ? 'opacity-50 cursor-not-allowed' : '').'']); ?>
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                    <span><?php echo e(__('app.next')); ?></span>
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

                <?php if(!$uploadFile || ($availableKitchens->count() > 1 && !$selectedKitchenId)): ?>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 text-center">
                    <?php echo e(__('app.completeAllSteps')); ?> <?php echo e(__('app.to')); ?> <?php echo e(__('modules.menu.startImport')); ?>

                </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if($uploadStage === 'preview'): ?>
    <!-- Preview Section -->
    <div class="w-full">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-3 mb-3">
            <div class="flex items-center justify-between mb-3">
                <div>
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white"><?php echo e(__('modules.menu.csvPreview')); ?></h2>
                    <p class="text-xs text-gray-600 dark:text-gray-400 mt-1"><?php echo e(__('modules.menu.reviewAndMapColumns')); ?></p>
                </div>
                <div class="flex space-x-2">
                    <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => 'resetUploadState','class' => 'flex items-center space-x-1 text-xs px-2 py-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'resetUploadState','class' => 'flex items-center space-x-1 text-xs px-2 py-1']); ?>
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span><?php echo e(__('app.back')); ?></span>
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

            <!-- File Info -->
            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-2 mb-3">
                <div class="flex items-center space-x-2">
                    <div class="flex-shrink-0">
                        <svg class="h-4 w-4 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xs font-medium text-blue-900 dark:text-blue-100 truncate" title="<?php echo e($uploadFile->getClientOriginalName()); ?>"><?php echo e($uploadFile->getClientOriginalName()); ?></h3>
                        <p class="text-xs text-blue-700 dark:text-blue-300"><?php echo e($totalRows - 1); ?> <?php echo e(__('app.rows')); ?></p>
                    </div>
                </div>
            </div>

            <!-- Column Mapping -->
            <div class="mb-3">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-2"><?php echo e(__('modules.menu.columnMapping')); ?></h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-2">
                    <?php $__currentLoopData = $csvHeaders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center space-x-1 p-1.5 border border-gray-200 dark:border-gray-700 rounded">
                        <div class="flex-shrink-0 w-20">
                            <span class="text-xs font-medium text-gray-700 dark:text-gray-300 truncate" title="<?php echo e($header); ?>"><?php echo e($header); ?></span>
                        </div>
                        <div class="flex-1">
                            <select wire:model.live="columnMapping.<?php echo e($header); ?>" class="block w-full text-xs border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value=""><?php echo e(__('app.ignore')); ?></option>
                                <option value="item_name" <?php echo e($columnMapping[$header] === 'item_name' ? 'selected' : ''); ?>><?php echo e(__('modules.menu.itemName')); ?></option>
                                <option value="category_name" <?php echo e($columnMapping[$header] === 'category_name' ? 'selected' : ''); ?>><?php echo e(__('modules.menu.itemCategory')); ?></option>
                                <option value="menu_name" <?php echo e($columnMapping[$header] === 'menu_name' ? 'selected' : ''); ?>><?php echo e(__('modules.menu.menuName')); ?></option>
                                <option value="price" <?php echo e($columnMapping[$header] === 'price' ? 'selected' : ''); ?>><?php echo e(__('modules.menu.setPrice')); ?></option>
                                <option value="description" <?php echo e($columnMapping[$header] === 'description' ? 'selected' : ''); ?>><?php echo e(__('modules.menu.itemDescription')); ?></option>
                                <option value="type" <?php echo e($columnMapping[$header] === 'type' ? 'selected' : ''); ?>><?php echo e(__('modules.menu.type')); ?></option>
                                <option value="show_on_customer_site" <?php echo e($columnMapping[$header] === 'show_on_customer_site' ? 'selected' : ''); ?>><?php echo e(__('modules.menu.showOnCustomerSite')); ?></option>
                            </select>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <!-- Data Preview Table -->
            <div class="mb-3">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-2"><?php echo e(__('modules.menu.dataPreview')); ?></h3>
                <div class="border border-gray-200 dark:border-gray-700 rounded overflow-hidden">
                    <div class="overflow-x-auto max-h-80 overflow-y-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800 sticky top-0 z-10">
                                <tr>
                                    <?php $__currentLoopData = $csvHeaders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th class="px-2 py-1.5 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider whitespace-nowrap">
                                        <div class="flex flex-col">
                                            <span class="font-semibold"><?php echo e($header); ?></span>
                                            <?php if($columnMapping[$header]): ?>
                                            <span class="inline-flex items-center px-1 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100 mt-0.5">
                                                <?php echo e($columnMapping[$header]); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                                <?php $__currentLoopData = $previewRows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="<?php echo e($index % 2 === 0 ? 'bg-white dark:bg-gray-900' : 'bg-gray-50 dark:bg-gray-800'); ?>">
                                    <?php $__currentLoopData = $csvHeaders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $headerIndex => $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-2 py-1.5 text-xs text-gray-900 dark:text-gray-100 whitespace-nowrap max-w-xs truncate" title="<?php echo e($row[$headerIndex] ?? ''); ?>">
                                        <?php echo e($row[$headerIndex] ?? ''); ?>

                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Start Import Button -->
            <div class="flex justify-center pt-1">
                <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'startImport','wire:loading.attr' => 'disabled','wire:target' => 'startImport','class' => 'flex items-center space-x-1 px-4 py-1.5 text-sm']); ?>
                    <div wire:loading.remove wire:target="startImport">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <div wire:loading wire:target="startImport" class="animate-spin">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                    <span wire:loading.remove wire:target="startImport"><?php echo e(__('modules.menu.startImport')); ?></span>
                    <span wire:loading wire:target="startImport"><?php echo e(__('modules.menu.importInProgress')); ?>...</span>
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
    <?php endif; ?>

    <?php if($uploadStage === 'validating' || $uploadStage === 'processing'): ?>
    <!-- Processing Section -->
    <div class="w-full">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
            <div class="text-center space-y-8">
                <!-- Current Stage -->
                <div>
                    <div class="inline-flex items-center space-x-4 bg-blue-50 dark:bg-blue-900/20 px-8 py-4 rounded-full">
                        <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-blue-600"></div>
                        <span class="text-blue-800 dark:text-blue-200 font-medium text-lg"><?php echo e($currentStage); ?></span>
                    </div>
                </div>

                <!-- Main Progress Bar -->
                <div class="space-y-4">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600 dark:text-gray-400"><?php echo e(__('app.overallProgress')); ?></span>
                        <span class="text-gray-900 dark:text-white font-medium"><?php echo e($uploadProgress); ?>%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-4 dark:bg-gray-700 overflow-hidden">
                        <div class="progress-bar-animated h-4 rounded-full transition-all duration-500 ease-out relative <?php echo e($uploadProgress > 0 ? 'progress-glow' : ''); ?>" style="width: <?php echo e($uploadProgress); ?>%">
                            <div class="absolute inset-0 bg-white opacity-30 animate-pulse"></div>
                        </div>
                    </div>
                </div>

                <!-- Import Progress Details -->
                <?php if($uploadStage === 'processing' && $totalRowsToProcess > 0): ?>
                <div class="space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600 dark:text-gray-400"><?php echo e(__('modules.menu.totalRecords')); ?></span>
                        <span class="text-gray-900 dark:text-white font-medium"><?php echo e($totalRowsToProcess); ?> <?php echo e(__('app.rows')); ?></span>
                    </div>
                    <div class="text-center">
                        <span class="text-xs text-gray-500 dark:text-gray-400"><?php echo e(__('modules.menu.importingData')); ?>...</span>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Stage Progress -->
                <?php if($stageProgress > 0 && $stageProgress < 100): ?>
                <div class="space-y-2">
                    <div class="flex justify-between text-xs">
                        <span class="text-gray-500 dark:text-gray-400"><?php echo e(__('app.currentStage')); ?></span>
                        <span class="text-gray-600 dark:text-gray-300"><?php echo e($stageProgress); ?>%</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2 dark:bg-gray-800">
                        <div class="bg-blue-400 h-2 rounded-full transition-all duration-300" style="width: <?php echo e($stageProgress); ?>%"></div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Processing Animation -->
                <div class="flex justify-center">
                    <div class="flex space-x-2">
                        <div class="w-3 h-3 bg-blue-600 rounded-full bounce-dot-1"></div>
                        <div class="w-3 h-3 bg-blue-600 rounded-full bounce-dot-2"></div>
                        <div class="w-3 h-3 bg-blue-600 rounded-full bounce-dot-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if($uploadStage === 'completed'): ?>
    <!-- Success Section -->
    <div class="w-full">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
            <div class="text-center space-y-8 result-card">
            <!-- Success Icon -->
            <div class="mx-auto w-20 h-20 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                <svg class="w-10 h-10 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <!-- Success Message -->
            <div>
                <h3 class="text-2xl font-bold text-green-600 dark:text-green-400 mb-2"><?php echo e(__('modules.menu.importCompleted')); ?>!</h3>
                <p class="text-gray-600 dark:text-gray-400"><?php echo e(__('app.importSuccessful')); ?></p>
                <?php if($selectedKitchenId && $availableKitchens->where('id', $selectedKitchenId)->first()): ?>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    <?php echo e(__('modules.menu.kitchens')); ?>: <span class="font-medium"><?php echo e($availableKitchens->where('id', $selectedKitchenId)->first()->name); ?></span>
                </p>
                <?php endif; ?>
            </div>

            <!-- Results Summary -->
            <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl p-6">
                <h4 class="text-lg font-semibold text-green-800 dark:text-green-200 mb-4"><?php echo e(__('modules.menu.importSummary')); ?></h4>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-4">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-green-600 dark:text-green-400"><?php echo e($uploadResults['total']); ?></div>
                        <div class="text-sm text-green-700 dark:text-green-300"><?php echo e(__('modules.menu.totalRecords')); ?></div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-green-600 dark:text-green-400"><?php echo e($uploadResults['success']); ?></div>
                        <div class="text-sm text-green-700 dark:text-green-300"><?php echo e(__('modules.menu.successfulImports')); ?></div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-yellow-600 dark:text-yellow-400"><?php echo e($uploadResults['skipped']); ?></div>
                        <div class="text-sm text-yellow-700 dark:text-yellow-300"><?php echo e(__('app.skipped')); ?></div>
                    </div>
                </div>

                <?php if($uploadResults['categories_created'] > 0 || $uploadResults['menus_created'] > 0): ?>
                <div class="border-t border-green-200 dark:border-green-700 pt-4">
                    <h5 class="text-sm font-semibold text-green-800 dark:text-green-200 mb-2"><?php echo e(__('modules.menu.autoCreated')); ?></h5>
                    <div class="grid grid-cols-2 gap-4">
                        <?php if($uploadResults['categories_created'] > 0): ?>
                        <div class="text-center">
                            <div class="text-lg font-bold text-blue-600 dark:text-blue-400"><?php echo e($uploadResults['categories_created']); ?></div>
                            <div class="text-xs text-blue-700 dark:text-blue-300"><?php echo e(__('modules.menu.categoriesCreated')); ?></div>
                        </div>
                        <?php endif; ?>
                        <?php if($uploadResults['menus_created'] > 0): ?>
                        <div class="text-center">
                            <div class="text-lg font-bold text-purple-600 dark:text-purple-400"><?php echo e($uploadResults['menus_created']); ?></div>
                            <div class="text-xs text-purple-700 dark:text-purple-300"><?php echo e(__('modules.menu.menusCreated')); ?></div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if($uploadResults['failed'] > 0): ?>
                <div class="border-t border-green-200 dark:border-green-700 pt-4">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-red-600 dark:text-red-400"><?php echo e($uploadResults['failed']); ?></div>
                        <div class="text-sm text-red-700 dark:text-red-300"><?php echo e(__('modules.menu.failedImports')); ?></div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-center space-x-4 pt-4">
                <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => 'resetUploadState','class' => 'flex items-center space-x-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'resetUploadState','class' => 'flex items-center space-x-2']); ?>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                    <span><?php echo e(__('modules.menu.startNewUpload')); ?></span>
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
                <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('menu-items.index')).'','wire:navigate' => true,'class' => 'flex items-center space-x-2']); ?>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span><?php echo e(__('modules.menu.backToMenuItems')); ?></span>
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
    <?php endif; ?>

    <?php if($uploadStage === 'failed'): ?>
    <!-- Error Section -->
    <div class="w-full">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
            <div class="text-center space-y-8 result-card">
            <!-- Error Icon -->
            <div class="mx-auto w-20 h-20 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center">
                <svg class="w-10 h-10 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <!-- Error Message -->
            <div>
                <h3 class="text-2xl font-bold text-red-600 dark:text-red-400 mb-2"><?php echo e(__('modules.menu.importFailed')); ?></h3>
                <p class="text-gray-600 dark:text-gray-400"><?php echo e(__('app.importError')); ?></p>
            </div>

            <!-- Error Details -->
            <?php if(!empty($uploadErrors)): ?>
            <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl p-6 text-left">
                <h4 class="text-lg font-semibold text-red-800 dark:text-red-200 mb-4"><?php echo e(__('app.errorDetails')); ?></h4>
                <div class="space-y-2">
                    <?php $__currentLoopData = $uploadErrors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        <p class="text-sm text-red-700 dark:text-red-300"><?php echo e($error); ?></p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Action Buttons -->
            <div class="flex justify-center space-x-4 pt-4">
                <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'resetUploadState','class' => 'flex items-center space-x-2']); ?>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    <span><?php echo e(__('modules.menu.tryAgain')); ?></span>
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
    <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\menu\bulk-import-page.blade.php ENDPATH**/ ?>