<div>
    <div
        class="mx-4 p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">

        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
                <h3 class="text-xl font-semibold dark:text-white"><?php echo app('translator')->get('modules.settings.receiptSetting'); ?></h3>
            </div>

        </div>

        <form wire:submit="submitForm">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div class="space-y-6">
                    
                    <div
                        class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-base font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.settings.customerInformation'); ?></h4>

                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['name' => 'customerName','id' => 'customerName','wire:model' => 'customerName']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'customerName','id' => 'customerName','wire:model' => 'customerName']); ?>
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
                                <label for="customerName" class="ms-3 flex items-center">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 me-2" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.settings.customerName'); ?></span>
                                </label>
                            </div>

                            <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['name' => 'customerAddress','id' => 'customerAddress','wire:model' => 'customerAddress']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'customerAddress','id' => 'customerAddress','wire:model' => 'customerAddress']); ?>
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
                                <label for="customerAddress" class="ms-3 flex items-center">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 me-2" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.settings.customerAddress'); ?></span>
                                </label>
                            </div>

                            <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['name' => 'customerPhone','id' => 'customerPhone','wire:model' => 'customerPhone']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'customerPhone','id' => 'customerPhone','wire:model' => 'customerPhone']); ?>
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
                                <label for="customerPhone" class="ms-3 flex items-center">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 me-2" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <span class="font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.settings.customerPhone'); ?></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    
                    <div
                        class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-base font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.settings.orderDetails'); ?></h4>

                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['name' => 'tableNumber','id' => 'tableNumber','wire:model' => 'tableNumber']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'tableNumber','id' => 'tableNumber','wire:model' => 'tableNumber']); ?>
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
                                <label for="tableNumber" class="ms-3 flex items-center">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 me-2" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                    <span class="font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.settings.tableNumber'); ?></span>
                                </label>
                            </div>

                            <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['name' => 'waiter','id' => 'waiter','wire:model' => 'waiter']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'waiter','id' => 'waiter','wire:model' => 'waiter']); ?>
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
                                <label for="waiter" class="ms-3 flex items-center">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 me-2" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.settings.waiter'); ?></span>
                                </label>
                            </div>

                            <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['name' => 'totalGuest','id' => 'totalGuest','wire:model' => 'totalGuest']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'totalGuest','id' => 'totalGuest','wire:model' => 'totalGuest']); ?>
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
                                <label for="totalGuest" class="ms-3 flex items-center">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 me-2" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span class="font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.settings.totalGuest'); ?></span>
                                </label>
                            </div>
                            <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['name' => 'showOrderType','id' => 'showOrderType','wire:model' => 'showOrderType']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'showOrderType','id' => 'showOrderType','wire:model' => 'showOrderType']); ?>
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
                                <label for="showOrderType" class="ms-3 flex items-center">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 me-2" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                    </svg>
                                    <span class="font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.settings.showOrderType'); ?></span>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>

                
                <div class="space-y-6">
                    
                    <div
                        class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-base font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.settings.restaurantInformation'); ?></h4>

                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['name' => 'restaurantLogo','id' => 'restaurantLogo','wire:model' => 'restaurantLogo']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'restaurantLogo','id' => 'restaurantLogo','wire:model' => 'restaurantLogo']); ?>
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
                                <label for="restaurantLogo" class="ms-3 flex items-center">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 me-2" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.settings.restaurantLogo'); ?></span>
                                </label>
                            </div>

                            <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['name' => 'restaurantTax','id' => 'restaurantTax','wire:model' => 'restaurantTax']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'restaurantTax','id' => 'restaurantTax','wire:model' => 'restaurantTax']); ?>
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
                                <label for="restaurantTax" class="ms-3 flex items-center">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 me-2" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
                                    </svg>
                                    <span class="font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.settings.restaurantTax'); ?></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    
                    <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700" x-data="{ qrCodePreview: <?php if ((object) ('paymentQrCode') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('paymentQrCode'->value()); ?>')<?php echo e('paymentQrCode'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('paymentQrCode'); ?>')<?php endif; ?>.defer }">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-base font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.settings.paymentDetails'); ?></h4>
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-center gap-6">
                                
                                <div class="flex-shrink-0">
                                    <div class="relative h-24 w-24">
                                        
                                        <div x-show="!qrCodePreview"
                                            class="h-24 w-24 rounded-lg bg-gray-50 dark:bg-gray-700 flex items-center justify-center overflow-hidden">
                                            <?php if($paymentQrCode): ?>
                                                <img src="<?php echo e($paymentQrCode); ?>" alt="QR Code"
                                                    class="h-24 w-24 object-contain">
                                            <?php else: ?>
                                                <span class="text-gray-500 dark:text-gray-400">
                                                    <?php echo app('translator')->get('modules.settings.noQrCode'); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        
                                        <div x-show="qrCodePreview" style="display: none;">
                                            <span class="block h-24 w-24 rounded-lg bg-cover bg-center bg-no-repeat"
                                                x-bind:style="'background-image: url(' + qrCodePreview + ');'"></span>
                                        </div>

                                        
                                        <div wire:loading wire:target="paymentQrCode"
                                            class="absolute inset-0 bg-gray-900/60 rounded-lg flex items-center justify-center">
                                            <svg class="animate-spin h-6 w-6 text-white"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                                    stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="flex-grow space-y-3">
                                    <input type="file" id="paymentQrCode" class="hidden" accept="image/*" wire:model="paymentQrCode" x-ref="paymentQrCode"
                                        x-on:change="qrCodeName = $refs.paymentQrCode.files[0].name; const reader = new FileReader(); reader.onload = (e) => { qrCodePreview = e.target.result; };reader.readAsDataURL($refs.paymentQrCode.files[0]);" />

                                    <div class="flex flex-wrap gap-3">
                                        <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['type' => 'button','xOn:click.prevent' => '$refs.paymentQrCode.click()','class' => 'flex items-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','x-on:click.prevent' => '$refs.paymentQrCode.click()','class' => 'flex items-center']); ?>
                                            <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                            </svg>
                                            <?php echo e(__('modules.settings.uploadPaymentQrCode')); ?>

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

                                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'paymentQrCode','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'paymentQrCode','class' => 'mt-2']); ?>
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

                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                        <?php echo app('translator')->get('modules.settings.paymentQrCodeUploadHelp'); ?>
                                    </p>
                                </div>
                            </div>

                            
                            <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['name' => 'showPaymentQrCode','id' => 'showPaymentQrCode','wire:model' => 'showPaymentQrCode']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'showPaymentQrCode','id' => 'showPaymentQrCode','wire:model' => 'showPaymentQrCode']); ?>
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
                                <label for="showPaymentQrCode" class="ms-3 flex items-center">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M4 4h6v6H4zm10 10h6v6h-6zm0-10h6v6h-6zm-4 10h.01v.01H10zm0 4h.01v.01H10zm-3 2h.01v.01H7zm0-4h.01v.01H7zm-3 2h.01v.01H4zm0-4h.01v.01H4z"/><path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M7 7h.01v.01H7zm10 10h.01v.01H17z"/></svg>
                                    <span class="font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.settings.showPaymetQrCode'); ?></span>
                                </label>
                            </div>

                            <!-- Show/Hide Payment Details -->
                            <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['name' => 'showPaymentDetails','id' => 'showPaymentDetails','wire:model' => 'showPaymentDetails']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'showPaymentDetails','id' => 'showPaymentDetails','wire:model' => 'showPaymentDetails']); ?>
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
                                <label for="showPaymentDetails" class="ms-3 flex items-center">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 me-2" width="24" height="24" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M448 128v320H128V128zm-42.667 42.667H170.667v234.666h234.666zM384 64v42.667l-277.334-.001V384H64V64zm-21.333 234.667v42.666H213.333v-42.666zm0-85.334V256H213.333v-42.667z" fill-rule="evenodd" fill="currentColor"/></svg>
                                    <span class="font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.settings.showPaymentDetails'); ?></span>
                                </label>
                            </div>

                            <!-- Show/Hide Payment Status -->
                            <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['name' => 'showPaymentStatus','id' => 'showPaymentStatus','wire:model' => 'showPaymentStatus']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'showPaymentStatus','id' => 'showPaymentStatus','wire:model' => 'showPaymentStatus']); ?>
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
                                <label for="showPaymentStatus" class="ms-3 flex items-center">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.settings.showPaymentStatus'); ?></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    
                    <div class="flex justify-end gap-2 ">
                        <div x-data="{ showPreview: false }">
                            <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['class' => 'inline-flex items-center','@click' => 'showPreview = true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'inline-flex items-center','@click' => 'showPreview = true']); ?>
                                <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <?php echo app('translator')->get('modules.settings.previewReceipt'); ?>
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

                            
                            <div x-show="showPreview" class="fixed inset-0 z-50 overflow-y-auto" role="dialog"
                                aria-modal="true" x-cloak>
                                <div
                                    class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                    <div x-show="showPreview"
                                        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                        @click="showPreview = false">
                                    </div>

                                    <div x-show="showPreview"
                                        class="relative inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                        <div class="p-6">
                                            <div class="flex items-center justify-between mb-4">
                                                <h3 class="text-lg font-medium"><?php echo app('translator')->get('modules.settings.receiptPreview'); ?></h3>
                                                <button type="button" @click="showPreview = false"
                                                    class="text-gray-400 hover:text-gray-500">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>

                                            
                                            <div class="receipt" style="width: 80mm; margin: 0 auto;">
                                                <div class="header">
                                                    <div class="restaurant-name">
                                                        <?php if($restaurantLogo): ?>
                                                            <span>
                                                                <img src="<?php echo e(restaurant()->logo_url); ?>"
                                                                    alt="<?php echo e(restaurant()->name); ?>"
                                                                    class="restaurant-logo"
                                                                    style="width: 20px; height: 20px; margin-top: 3px;">
                                                            </span>
                                                        <?php endif; ?>
                                                        <span><?php echo e(restaurant()->name); ?></span>
                                                    </div>
                                                    <div class="restaurant-info"><?php echo e(restaurant()->address); ?></div>
                                                    <div class="restaurant-info"><?php echo app('translator')->get('modules.customer.phone'); ?>:
                                                        <?php echo e(restaurant()->phone_number); ?></div>
                                                    <?php if($restaurantTax): ?>
                                                        <div class="restaurant-info">Tax ID: SAMPLE-TAX-ID</div>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="order-info">
                                                    <div class="summary-row">
                                                        <span>
                                                            <?php if(!isOrderPrefixEnabled()): ?>
                                                                <?php echo app('translator')->get('modules.order.orderNumber'); ?> #<span
                                                            <?php else: ?>
                                                                <span
                                                            <?php endif; ?>
                                                                class="order-number">SAMPLE-001</span></span>
                                                        <span><?php echo e(now()->format('d M Y, h:i A')); ?></span>
                                                    </div>

                                                    <div class="summary-grid">
                                                        <?php if($tableNumber): ?>
                                                            <span><?php echo app('translator')->get('modules.settings.tableNumber'); ?>: 01</span>
                                                        <?php endif; ?>
                                                        <?php if($totalGuest): ?>
                                                            <span><?php echo app('translator')->get('modules.order.noOfPax'); ?>: 2</span>
                                                        <?php endif; ?>
                                                    </div>

                                                    <?php if($waiter): ?>
                                                        <div class="summary-row">
                                                            <span><?php echo app('translator')->get('modules.order.waiter'); ?>: John Smith</span>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if($customerName): ?>
                                                        <div class="summary-row">
                                                            <span><?php echo app('translator')->get('modules.customer.customer'); ?>: Jane Doe</span>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if($customerAddress): ?>
                                                        <div class="summary-row">
                                                            <span><?php echo app('translator')->get('modules.customer.customerAddress'); ?>: 123 Sample Street</span>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if($customerPhone): ?>
                                                        <div class="summary-row">
                                                            <span><?php echo app('translator')->get('modules.customer.phone'); ?>: +1 234 567 8900</span>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>

                                                <table class="items-table">
                                                    <thead>
                                                        <tr>
                                                            <th class="qty"><?php echo app('translator')->get('modules.order.qty'); ?></th>
                                                            <th class="description"><?php echo app('translator')->get('modules.menu.itemName'); ?></th>
                                                            <th class="price"><?php echo app('translator')->get('modules.order.price'); ?></th>
                                                            <th class="amount"><?php echo app('translator')->get('modules.order.amount'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="qty">2</td>
                                                            <td class="description">Sample Item 1</td>
                                                            <td class="price"><?php echo e(currency_format(10, restaurant()->currency_id)); ?></td>
                                                            <td class="amount"><?php echo e(currency_format(20, restaurant()->currency_id)); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="qty">1</td>
                                                            <td class="description">Sample Item 2</td>
                                                            <td class="price"><?php echo e(currency_format(15, restaurant()->currency_id)); ?></td>
                                                            <td class="amount"><?php echo e(currency_format(15, restaurant()->currency_id)); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <div class="summary">
                                                    <div class="summary-row">
                                                        <span><?php echo app('translator')->get('modules.order.subTotal'); ?>:</span>
                                                        <span><?php echo e(currency_format(35, restaurant()->currency_id)); ?></span>
                                                    </div>

                                                    <?php if($restaurantTax): ?>
                                                        <div class="summary-row">
                                                            <span>Tax (10%):</span>
                                                            <span><?php echo e(currency_format(3.5, restaurant()->currency_id)); ?></span>
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="summary-row total">
                                                        <span><?php echo app('translator')->get('modules.order.total'); ?>:</span>
                                                        <span><?php echo e(currency_format(38.5, restaurant()->currency_id)); ?></span>
                                                    </div>

                                                    <?php if($showPaymentStatus): ?>
                                                        <div class="summary-row" style="margin-top: 10px; padding-top: 10px; border-top: 1px dashed #000;">
                                                            <span style="font-weight: bold;"><?php echo app('translator')->get('modules.order.paymentStatus'); ?>:</span>
                                                            <span style="font-weight: bold; color: #10b981;"><?php echo app('translator')->get('modules.order.paid'); ?></span>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="footer">
                                                    <p><?php echo app('translator')->get('messages.thankYouVisit'); ?></p>

                                                        <?php if($showPaymentQrCode): ?>
                                                            <p class="mt-4" ><?php echo app('translator')->get('modules.settings.payFromYourPhone'); ?></p>

                                                            <img class="qr_code" src="<?php echo e($paymentQrCode); ?>"
                                                                alt="QR Code">
                                                            <p class=""><?php echo app('translator')->get('modules.settings.scanQrCode'); ?></p>
                                                        <?php endif; ?>

                                                        <?php if($showPaymentDetails): ?>
                                                            <div class="summary">
                                                                <table class="items-table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="qty"><?php echo app('translator')->get('modules.order.amount'); ?></th>
                                                                            <th class="payment-method"><?php echo app('translator')->get('modules.order.paymentMethod'); ?></th>
                                                                            <th class="price"><?php echo app('translator')->get('app.dateTime'); ?></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="qty"><?php echo e(currency_format(20, restaurant()->currency_id)); ?></td>
                                                                            <td class="payment-method">cash</td>
                                                                            <td class="price"><?php echo e(now()->subMinutes(10)->format('d M, Y h:i A')); ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="qty"><?php echo e(currency_format(18.5, restaurant()->currency_id)); ?></td>
                                                                            <td class="payment-method">upi</td>
                                                                            <td class="price"><?php echo e(now()->subMinutes(5)->format('d M, Y h:i A')); ?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-end">
                            <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <style>
        .receipt {
            padding: 6.35mm;
            page-break-after: always;
        }

        .header {
            text-align: center;
            margin-bottom: 3mm;
        }

        .restaurant-name {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            font-size: 14pt;
            font-weight: bold;
            margin-bottom: 1mm;
        }

        .restaurant-info {
            font-size: 9pt;
            margin-bottom: 1mm;
        }

        .order-info {
            border-top: 1px dashed #000;
            border-bottom: 1px dashed #000;
            padding: 2mm 0;
            margin-bottom: 3mm;
            font-size: 9pt;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 3mm;
            font-size: 9pt;
        }

        .items-table th {
            text-align: left;
            padding: 1mm;
            border-bottom: 1px solid #000;
        }

        .items-table td {
            padding: 1mm 0;
            vertical-align: top;
        }

        .qty {
            width: 10%;
            text-align: center;
        }

        .description {
            width: 50%;
        }

        .payment-method {
            width: 28%;
        }

        .price {
            width: 20%;
            text-align: right;
        }

        .amount {
            width: 20%;
            text-align: right;
        }

        .summary {
            font-size: 9pt;
            margin-top: 2mm;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1mm;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            justify-content: space-between;
            gap: 5px 55px;
            margin-bottom: 1mm;
        }

        .total {
            font-weight: bold;
            font-size: 11pt;
            border-top: 1px solid #000;
            padding-top: 1mm;
            margin-top: 1mm;
        }

        .footer {
            text-align: center;
            margin-top: 3mm;
            font-size: 9pt;
            padding-top: 2mm;
            border-top: 1px dashed #000;
        }

        .qr_code {
            margin-top: 5mm;
            margin-bottom: 3mm;
            margin-left: 13mm;
        }
    </style>
</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\settings\receipt-setting.blade.php ENDPATH**/ ?>