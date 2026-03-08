<div>
    <!-- Header Section -->
    <div class="p-4 bg-white dark:bg-gray-800">
        <div class="mb-4">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white"><?php echo app('translator')->get('menu.removedKotItemReport'); ?></h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                <?php echo app('translator')->get('modules.report.removedKotItemReportDescription'); ?>
            </p>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 gap-4 mb-4 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Total Removed Items Card -->
            <div class="p-4 bg-red-50 rounded-xl shadow-sm dark:bg-red-900/10 border border-red-100 dark:border-red-800">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-medium text-gray-800 dark:text-gray-200"><?php echo app('translator')->get('modules.report.totalRemovedItems'); ?></h3>
                    <div class="p-2 bg-red-100 text-red-600 rounded-lg dark:bg-red-900/20 dark:text-red-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">
                    <?php echo e($totalRemovedItems); ?>

                </p>
            </div>

            <!-- Total Removed Amount Card -->
            <div class="p-4 bg-orange-50 rounded-xl shadow-sm dark:bg-orange-900/10 border border-orange-100 dark:border-orange-800">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-medium text-gray-800 dark:text-gray-200"><?php echo app('translator')->get('modules.report.totalRemovedAmount'); ?></h3>
                    <div class="p-2 bg-orange-100 text-orange-600 rounded-lg dark:bg-orange-900/20 dark:text-orange-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">
                    <?php echo e(currency_format($totalRemovedAmount, $currencyId)); ?>

                </p>
            </div>

            <!-- Top Cancelled Reasons Card -->
            <div class="p-4 bg-yellow-50 rounded-xl shadow-sm dark:bg-yellow-900/10 border border-yellow-100 dark:border-yellow-800">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-sm font-medium text-gray-800 dark:text-gray-200"><?php echo app('translator')->get('modules.report.topCancellationReasons'); ?></h3>
                    <div class="p-2 bg-yellow-100 text-yellow-600 rounded-lg dark:bg-yellow-900/20 dark:text-yellow-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                </div>
                <!--[if BLOCK]><![endif]--><?php if(!empty($topCancelledReasons)): ?>
                    <div class="space-y-2">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $topCancelledReasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center justify-between p-2 rounded-lg bg-yellow-100/50 dark:bg-yellow-900/20">
                                <div class="flex items-center gap-2 flex-1 min-w-0">
                                    <span class="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-yellow-200 dark:bg-yellow-800 text-yellow-800 dark:text-yellow-200 text-xs font-bold">
                                        <?php echo e($index + 1); ?>

                                    </span>
                                    <span class="text-sm font-medium text-gray-900 dark:text-white truncate">
                                        <?php echo e($reason['name']); ?>

                                    </span>
                                </div>
                                <span class="flex-shrink-0 ml-2 text-sm font-bold text-gray-700 dark:text-gray-300">
                                    <?php echo e($reason['count']); ?>

                                </span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                <?php else: ?>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <?php echo app('translator')->get('modules.report.noDataAvailable'); ?>
                    </p>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <!-- Top Waiters Card -->
            <div class="p-4 bg-blue-50 rounded-xl shadow-sm dark:bg-blue-900/10 border border-blue-100 dark:border-blue-800">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-sm font-medium text-gray-800 dark:text-gray-200"><?php echo app('translator')->get('modules.report.topWaiters'); ?></h3>
                    <div class="p-2 bg-blue-100 text-blue-600 rounded-lg dark:bg-blue-900/20 dark:text-blue-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                </div>
                <!--[if BLOCK]><![endif]--><?php if(!empty($topWaiters)): ?>
                    <div class="space-y-2">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $topWaiters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $waiter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="p-2 rounded-lg bg-blue-100/50 dark:bg-blue-900/20">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-blue-200 dark:bg-blue-800 text-blue-800 dark:text-blue-200 text-xs font-bold">
                                        <?php echo e($index + 1); ?>

                                    </span>
                                    <span class="text-sm font-medium text-gray-900 dark:text-white truncate">
                                        <?php echo e($waiter['name']); ?>

                                    </span>
                                </div>
                                <div class="text-xs text-gray-600 dark:text-gray-400 ml-8">
                                    <?php echo e($waiter['count']); ?> <?php echo app('translator')->get('modules.report.items'); ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                <?php else: ?>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <?php echo app('translator')->get('modules.report.noDataAvailable'); ?>
                    </p>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>

        <!-- Filter Section -->
        <div class="flex flex-wrap justify-between items-center gap-4 p-4 bg-gray-50 rounded-lg dark:bg-gray-700">
            <div class="lg:flex items-center mb-4 sm:mb-0 w-full">
                <form action="#" method="GET" class="w-full">
                    <div class="lg:flex gap-2 items-center flex-wrap">
                        <!-- Date Range Type -->
                        <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['id' => 'dateRangeType','class' => 'block w-full sm:w-fit mb-2 lg:mb-0','wire:model.live' => 'dateRangeType','wire:change' => 'setDateRange']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'dateRangeType','class' => 'block w-full sm:w-fit mb-2 lg:mb-0','wire:model.live' => 'dateRangeType','wire:change' => 'setDateRange']); ?>
                            <option value="today"><?php echo app('translator')->get('app.today'); ?></option>
                            <option value="currentWeek"><?php echo app('translator')->get('app.currentWeek'); ?></option>
                            <option value="lastWeek"><?php echo app('translator')->get('app.lastWeek'); ?></option>
                            <option value="last7Days"><?php echo app('translator')->get('app.last7Days'); ?></option>
                            <option value="currentMonth"><?php echo app('translator')->get('app.currentMonth'); ?></option>
                            <option value="lastMonth"><?php echo app('translator')->get('app.lastMonth'); ?></option>
                            <option value="currentYear"><?php echo app('translator')->get('app.currentYear'); ?></option>
                            <option value="lastYear"><?php echo app('translator')->get('app.lastYear'); ?></option>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $attributes = $__attributesOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__attributesOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $component = $__componentOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__componentOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>

                        <!-- Date Range Picker -->
                        <div id="date-range-picker" date-rangepicker class="flex items-center w-full sm:w-auto">
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input id="datepicker-range-start" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model.change='startDate' placeholder="<?php echo app('translator')->get('app.selectStartDate'); ?>">
                            </div>
                            <span class="mx-4 text-gray-500 dark:text-gray-100"><?php echo app('translator')->get('app.to'); ?></span>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input id="datepicker-range-end" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model.live='endDate' placeholder="<?php echo app('translator')->get('app.selectEndDate'); ?>">
                            </div>
                        </div>

                        <!-- Removed By Filter -->
                        <select wire:model.live="selectedWaiter" class="px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-4 focus:ring-primary-300 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                            <option value=""><?php echo app('translator')->get('modules.report.allUsers'); ?></option>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $users ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </select>

                        <!-- Cancellation Reason Filter -->
                        <select wire:model.live="selectedCancelReason" class="px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-4 focus:ring-primary-300 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                            <option value=""><?php echo app('translator')->get('modules.report.allCancellationReasons'); ?></option>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $cancelReasons ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($reason->id); ?>"><?php echo e($reason->reason); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </select>
                    </div>
                </form>

            <div class="inline-flex items-center gap-2 w-full sm:w-auto">
                <a href="javascript:;" wire:click='exportReport'
                class="inline-flex items-center w-full px-3 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7.414A2 2 0 0 0 15.414 6L12 2.586A2 2 0 0 0 10.586 2zm5 6a1 1 0 1 0-2 0v3.586l-1.293-1.293a1 1 0 1 0-1.414 1.414l3 3a1 1 0 0 0 1.414 0l3-3a1 1 0 0 0-1.414-1.414L11 11.586z" clip-rule="evenodd"/></svg>
                    <?php echo app('translator')->get('app.export'); ?>
                </a>
            </div>
            </div>

        </div>
    </div>

    <!-- Removed KOT Items Table -->
    <div class="overflow-x-auto bg-white dark:bg-gray-800 p-4">
        <table class="min-w-full border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-600 uppercase dark:text-gray-300"><?php echo app('translator')->get('modules.report.kotNumber'); ?></th>
                    <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-600 uppercase dark:text-gray-300"><?php echo app('translator')->get('modules.report.orderNumber'); ?></th>
                    <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-600 uppercase dark:text-gray-300"><?php echo app('translator')->get('modules.report.removedBy'); ?></th>
                    <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-600 uppercase dark:text-gray-300"><?php echo app('translator')->get('modules.report.itemName'); ?></th>
                    <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-600 uppercase dark:text-gray-300"><?php echo app('translator')->get('modules.report.quantity'); ?></th>
                    <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-600 uppercase dark:text-gray-300"><?php echo app('translator')->get('modules.report.table'); ?></th>
                    <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-600 uppercase dark:text-gray-300"><?php echo app('translator')->get('modules.report.cancellationReason'); ?></th>
                    <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-600 uppercase dark:text-gray-300"><?php echo app('translator')->get('modules.report.removedDate'); ?></th>
                    <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-600 uppercase dark:text-gray-300"><?php echo app('translator')->get('modules.report.totalPrice'); ?></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800">
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $removedKotItems ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="p-4 text-sm font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            #<?php echo e($item->kot->kot_number ?? __('modules.report.notAvailable')); ?>

                        </td>
                        <td class="p-4 text-sm font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            <!--[if BLOCK]><![endif]--><?php if($item->kot && $item->kot->order): ?>
                                <?php echo e($item->kot->order->show_formatted_order_number ?? '#' . $item->kot->order->order_number); ?>

                            <?php else: ?>
                                <?php echo app('translator')->get('modules.report.notAvailable'); ?>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="p-4 text-sm text-gray-900 dark:text-white">
                            <!--[if BLOCK]><![endif]--><?php if($item->cancelledBy): ?>
                                <div class="flex items-center">
                                    <div>
                                        <div class="font-medium"><?php echo e($item->cancelledBy->name); ?></div>
                                        <!--[if BLOCK]><![endif]--><?php if($item->cancelledBy->email): ?>
                                            <div class="text-xs text-gray-500"><?php echo e($item->cancelledBy->email); ?></div>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>
                            <?php elseif($item->kot && $item->kot->order && $item->kot->order->waiter): ?>
                                
                                <div class="flex items-center">
                                    <div>
                                        <div class="font-medium"><?php echo e($item->kot->order->waiter->name); ?></div>
                                        <!--[if BLOCK]><![endif]--><?php if($item->kot->order->waiter->email): ?>
                                            <div class="text-xs text-gray-500"><?php echo e($item->kot->order->waiter->email); ?></div>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>
                            <?php else: ?>
                                <span class="text-gray-400"><?php echo app('translator')->get('modules.report.notAvailable'); ?></span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="p-4 text-sm text-gray-900 dark:text-white">
                            <?php
                                // Try to get item name from menuItem, then orderItem, then direct query
                                $itemName = __('modules.report.notAvailable');

                                // First try: menuItem relationship
                                if ($item->menuItem) {
                                    $itemName = $item->menuItem->item_name ?? __('modules.report.notAvailable');
                                }
                                // Second try: orderItem relationship
                                elseif ($item->orderItem && $item->orderItem->menuItem) {
                                    $itemName = $item->orderItem->menuItem->item_name ?? __('modules.report.notAvailable');
                                }
                                // Third try: direct query if menu_item_id exists
                                elseif (isset($item->menu_item_id) && $item->menu_item_id) {
                                    try {
                                        $menuItem = \App\Models\MenuItem::withoutGlobalScopes()->find($item->menu_item_id);
                                        if ($menuItem) {
                                            $itemName = $menuItem->item_name ?? __('modules.report.notAvailable');
                                        }
                                    } catch (\Exception $e) {
                                        // If query fails, keep N/A
                                    }
                                }
                            ?>
                            <?php echo e($itemName); ?>

                        </td>
                        <td class="p-4 text-sm text-gray-900 dark:text-white whitespace-nowrap">
                            <?php echo e($item->quantity); ?>

                        </td>
                        <td class="p-4 text-sm text-gray-900 dark:text-white">
                            <?php
                                $notAvailableText = __('modules.report.notAvailable');
                                $tableName = $notAvailableText;
                                if ($item->kot && $item->kot->order && $item->kot->order->table) {
                                    // Table uses table_code field
                                    $tableName = $item->kot->order->table->table_code ?? $notAvailableText;
                                } elseif ($item->kot && $item->kot->table) {
                                    // Fallback: try kot->table relationship
                                    $tableName = $item->kot->table->table_code ?? $notAvailableText;
                                }
                            ?>
                            <!--[if BLOCK]><![endif]--><?php if($tableName !== $notAvailableText): ?>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                    <?php echo e($tableName); ?>

                                </span>
                            <?php else: ?>
                                <span class="text-gray-400"><?php echo app('translator')->get('modules.report.notAvailable'); ?></span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="p-4 text-sm text-gray-900 dark:text-white">
                            <!--[if BLOCK]><![endif]--><?php if($item->cancelReason): ?>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                    <?php echo e($item->cancelReason->reason); ?>

                                </span>
                            <?php elseif($item->cancel_reason_text): ?>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200">
                                    <?php echo e($item->cancel_reason_text); ?>

                                </span>
                            <?php else: ?>
                                <span class="text-gray-400"><?php echo app('translator')->get('modules.report.notAvailable'); ?></span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="p-4 text-sm text-gray-900 dark:text-white whitespace-nowrap">
                            <?php echo e($item->updated_at ? \Carbon\Carbon::parse($item->updated_at)->format('M d, Y h:i A') : __('modules.report.notAvailable')); ?>

                        </td>
                        <td class="p-4 text-sm font-bold text-gray-900 dark:text-white whitespace-nowrap">
                            <?php
                                // Try to get price from menuItemVariation, then menuItem, then orderItem
                                $unitPrice = 0;
                                if ($item->menuItemVariation) {
                                    $unitPrice = $item->menuItemVariation->price ?? 0;
                                } elseif ($item->menuItem) {
                                    $unitPrice = $item->menuItem->price ?? 0;
                                } elseif ($item->orderItem && $item->orderItem->menuItem) {
                                    $unitPrice = $item->orderItem->menuItem->price ?? 0;
                                }
                                $totalPrice = $unitPrice * $item->quantity;
                            ?>
                            <?php echo e(currency_format($totalPrice, $currencyId)); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="9" class="p-4 text-sm text-center text-gray-500 dark:text-gray-400">
                            <?php echo app('translator')->get('modules.report.noRemovedKotItemsFound'); ?>
                        </td>
                    </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
            <!--[if BLOCK]><![endif]--><?php if(count($removedKotItems ?? []) > 0): ?>
                <tfoot class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-700 border-t-2 border-gray-300 dark:border-gray-600">
                    <tr>
                        <td colspan="8" class="p-4 text-sm font-bold text-right text-gray-900 dark:text-white uppercase tracking-wide">
                            <div class="flex items-center justify-end gap-2">
                                <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <?php echo app('translator')->get('modules.report.total'); ?>:
                            </div>
                        </td>
                        <td class="p-4 text-lg font-bold text-right text-gray-900 dark:text-white bg-orange-50 dark:bg-orange-900/20 border-l-2 border-orange-200 dark:border-orange-800">
                            <span class="inline-flex items-center px-3 py-1 rounded-lg bg-orange-100 dark:bg-orange-900/30 text-orange-800 dark:text-orange-200">
                                <?php echo e(currency_format($totalRemovedAmount, $currencyId)); ?>

                            </span>
                        </td>
                    </tr>
                </tfoot>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </table>
    </div>

        <?php
        $__scriptKey = '3375595411-0';
        ob_start();
    ?>
    <script>
        const datepickerEl1 = document.getElementById('datepicker-range-start');
        if (datepickerEl1) {
            datepickerEl1.addEventListener('changeDate', (event) => {
                $wire.dispatch('setStartDate', { start: datepickerEl1.value });
            });
        }

        const datepickerEl2 = document.getElementById('datepicker-range-end');
        if (datepickerEl2) {
            datepickerEl2.addEventListener('changeDate', (event) => {
                $wire.dispatch('setEndDate', { end: datepickerEl2.value });
            });
        }
    </script>
        <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
</div>

<?php /**PATH C:\xampp\htdocs\script\resources\views/livewire/reports/removed-kot-item-report.blade.php ENDPATH**/ ?>