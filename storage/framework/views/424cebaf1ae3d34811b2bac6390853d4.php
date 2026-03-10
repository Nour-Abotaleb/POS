<div class="w-full py-5 dark:bg-gray-800">
    <?php
        $restaurantModules = restaurant_modules();
        $stats = getRestaurantStaffStats(user()->restaurant_id);
        $menuItemStats = getRestaurantMenuItemStats(user()->restaurant_id);
        $orderStats = getRestaurantOrderStats(branch()->id);
    ?>

    
    <!--[if BLOCK]><![endif]--><?php if(in_array('Staff', $restaurantModules) && $stats && !$stats['unlimited'] && $stats['current_count'] > $stats['staff_limit']): ?>
        <div class="flex items-center justify-between w-full mb-3">
            <div class="flex-1 mr-4">
                <?php if (isset($component)) { $__componentOriginalb5e767ad160784309dfcad41e788743b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb5e767ad160784309dfcad41e788743b = $attributes; } ?>
<?php $component = App\View\Components\Alert::resolve(['type' => 'danger'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full']); ?>
                    <?php echo e(__('messages.staffLimitExceeded')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb5e767ad160784309dfcad41e788743b)): ?>
<?php $attributes = $__attributesOriginalb5e767ad160784309dfcad41e788743b; ?>
<?php unset($__attributesOriginalb5e767ad160784309dfcad41e788743b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb5e767ad160784309dfcad41e788743b)): ?>
<?php $component = $__componentOriginalb5e767ad160784309dfcad41e788743b; ?>
<?php unset($__componentOriginalb5e767ad160784309dfcad41e788743b); ?>
<?php endif; ?>
            </div>

            <a href="<?php echo e(route('staff.index')); ?>">
                <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'inline-flex items-center shadow-md hover:origin-center group p-3 px-4 mb-4']); ?>

                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-pencil-square'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 me-1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                <?php echo e(__('modules.staff.manageStaff')); ?>

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
            </a>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    
    <!--[if BLOCK]><![endif]--><?php if(in_array('Menu Item', $restaurantModules) && $menuItemStats && !$menuItemStats['unlimited'] && $menuItemStats['current_count'] > $menuItemStats['menu_items_limit']): ?>
        <div class="flex items-center justify-between w-full mb-3">
            <div class="flex-1 mr-4">
                <?php if (isset($component)) { $__componentOriginalb5e767ad160784309dfcad41e788743b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb5e767ad160784309dfcad41e788743b = $attributes; } ?>
<?php $component = App\View\Components\Alert::resolve(['type' => 'danger'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full']); ?>
                    <?php echo e(__('messages.menuItemLimitExceeded')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb5e767ad160784309dfcad41e788743b)): ?>
<?php $attributes = $__attributesOriginalb5e767ad160784309dfcad41e788743b; ?>
<?php unset($__attributesOriginalb5e767ad160784309dfcad41e788743b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb5e767ad160784309dfcad41e788743b)): ?>
<?php $component = $__componentOriginalb5e767ad160784309dfcad41e788743b; ?>
<?php unset($__componentOriginalb5e767ad160784309dfcad41e788743b); ?>
<?php endif; ?>
            </div>

            <a href="<?php echo e(route('menu-items.index')); ?>">
                <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'inline-flex items-center shadow-md hover:origin-center group p-3 px-4 mb-4']); ?>
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-pencil-square'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 me-1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                    <?php echo e(__('modules.staff.manageMenuItems')); ?>

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
            </a>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    
    <!--[if BLOCK]><![endif]--><?php if(in_array('Order', $restaurantModules) && $orderStats && !$orderStats['unlimited'] && $orderStats['current_count'] > $orderStats['order_limit']): ?>
        <div class="flex items-center justify-between w-full mb-3">
            <div class="flex-1 mr-4">
                <?php if (isset($component)) { $__componentOriginalb5e767ad160784309dfcad41e788743b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb5e767ad160784309dfcad41e788743b = $attributes; } ?>
<?php $component = App\View\Components\Alert::resolve(['type' => 'danger'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full']); ?>
                    <?php echo e(__('messages.orderLimitExceeded')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb5e767ad160784309dfcad41e788743b)): ?>
<?php $attributes = $__attributesOriginalb5e767ad160784309dfcad41e788743b; ?>
<?php unset($__attributesOriginalb5e767ad160784309dfcad41e788743b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb5e767ad160784309dfcad41e788743b)): ?>
<?php $component = $__componentOriginalb5e767ad160784309dfcad41e788743b; ?>
<?php unset($__componentOriginalb5e767ad160784309dfcad41e788743b); ?>
<?php endif; ?>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <div class="bg-white dark:bg-gray-700 shadow-md border dark:border-gray-600 rounded-lg">
        <!-- Header Section -->
        <div class="border-b border-gray-200 dark:border-gray-600 px-6 py-2.5 flex items-center justify-between">
            <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-200 flex items-center">
                <svg class="h-6 w-6 mr-2 text-skin-base" width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 13h16v7a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zM2 9h20v4H2zm10-4v17m0-16.5A3.5 3.5 0 1 0 8.5 9m7 0A3.5 3.5 0 1 0 12 5.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <?php echo app('translator')->get('modules.billing.planDetails'); ?>
            </h4>
            <!-- Dropdown Button -->
            <?php if (isset($component)) { $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown','data' => ['align' => 'right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'right']); ?>
                 <?php $__env->slot('trigger', null, []); ?> 
                    <button type="button" class="inline-flex items-center px-2 py-2 border border-transparent rounded-full hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none transition ease-in-out duration-150">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="3" d="M12 6h.01M12 12h.01M12 18h.01"/>
                        </svg>
                    </button>
                 <?php $__env->endSlot(); ?>

                 <?php $__env->slot('content', null, []); ?> 
                    <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['wire:click' => 'cancelSubscription(true)','class' => 'text-red-600 dark:text-red-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'cancelSubscription(true)','class' => 'text-red-600 dark:text-red-400']); ?>
                        <?php echo app('translator')->get('modules.billing.cancelImmediately'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['wire:click' => 'cancelSubscription','class' => 'text-yellow-500 dark:text-yellow-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'cancelSubscription','class' => 'text-yellow-500 dark:text-yellow-400']); ?>
                        <?php echo app('translator')->get('modules.billing.endOfBillingCycle'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                 <?php $__env->endSlot(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $attributes = $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $component = $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
        </div>

        <div class="p-6 space-y-6">
            <!-- Current Plan Name -->
            <div>
                <h5 class="text-gray-600 dark:text-gray-400 text-sm font-medium"><?php echo app('translator')->get('modules.billing.currentPlan'); ?></h5>
                <h3 class="text-xl font-bold text-skin-base mt-2"><?php echo e($currentPackageName ?? __('modules.billing.noPlanAssigned')); ?></h3>
            </div>

            <!-- Current Plan Type -->
            <div>
                <h5 class="text-gray-600 dark:text-gray-400 text-sm font-medium"><?php echo app('translator')->get('modules.billing.currentPlanType'); ?></h5>
                <h3 class="text-xl font-bold text-skin-base mt-2"><?php echo e($currentPackageType ?? __('modules.billing.noPlanAssigned')); ?></h3>
            </div>
            <!-- License Expire On Or Next Pay Date -->
            <div>
                <h5 class="text-gray-600 dark:text-gray-400 text-sm font-medium">
                    <!--[if BLOCK]><![endif]--><?php if($licenseExpireOn !== __('modules.package.lifetime') && !$licenseExpireOn && $nextPaymentDate): ?>
                        <?php echo app('translator')->get('modules.billing.nextPaymentDate'); ?>
                    <?php else: ?>
                        <?php echo app('translator')->get('modules.billing.licenseExpireOn'); ?>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </h5>

                <h3 class="text-lg text-skin-base mt-2">
                    <!--[if BLOCK]><![endif]--><?php if($licenseExpireOn === __('modules.package.lifetime')): ?>
                        <?php echo e(__('modules.package.lifetime')); ?>

                    <?php elseif(!$licenseExpireOn && $nextPaymentDate): ?>
                        <?php echo e(\Carbon\Carbon::parse($nextPaymentDate)->translatedFormat('d F, Y')); ?>

                    <?php elseif($licenseExpireOn): ?>
                        <?php
                            $expiryDate = \Carbon\Carbon::parse($licenseExpireOn);
                            $daysLeft = now()->startOfDay()->diffInDays($expiryDate->startOfDay(), false);

                            $status = $daysLeft > 0
                                ? trans_choice('modules.billing.daysLeft', $daysLeft, ['count' => $daysLeft])
                                : ($daysLeft === 0 ? __('modules.billing.expiringToday') : '');
                        ?>
                        <?php echo e($expiryDate->translatedFormat('d F, Y')); ?>

                        <!--[if BLOCK]><![endif]--><?php if($status): ?>
                            <span class="text-sm text-gray-500">(<?php echo e($status); ?>)</span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </h3>
            </div>

            <!-- Current Plan Additional Features -->
            <div>
                <h5 class="text-gray-600 dark:text-gray-400 text-sm font-medium"><?php echo app('translator')->get('modules.package.additionalFeatures'); ?></h5>
                <!--[if BLOCK]><![endif]--><?php if(!empty($currentPackageFeatures)): ?>
                    <ul class="mt-3 grid gap-4">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $currentPackageFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="flex items-center text-gray-600 dark:text-gray-300 text-sm font-semibold">
                                <svg class="w-4 h-4 text-emerald-500 me-2" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 13l4 4L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                                <?php echo e(__('permissions.modules.'.$feature)); ?>

                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </ul>
                <?php else: ?>
                    <p class="text-gray-600 dark:text-gray-300 mt-3 text-xs"><?php echo app('translator')->get('modules.package.noAdditionalFeatures'); ?></p>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <!-- Upgrade Button -->
            <div>
                <a href="<?php echo e(route('pricing.plan')); ?>" wire:navigate>
                    <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'inline-flex items-center shadow-md hover:origin-center group']); ?>
                        <svg class="w-5 h-5 text-current group-hover:scale-110 duration-500" width="24" height="24" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.73 1.73 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.73 1.73 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.73 1.73 0 0 0 3.407 2.31zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z"/>
                        </svg>
                        <?php echo app('translator')->get('modules.settings.upgradeLicense'); ?>
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
                </a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views/billing/billing-details/plan-details.blade.php ENDPATH**/ ?>