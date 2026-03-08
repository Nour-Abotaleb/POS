<div>
    <!-- Header Section -->
    <div class="p-4 bg-white dark:bg-gray-800">
        <div class="mb-4">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white"><?php echo app('translator')->get('menu.salesReport'); ?></h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                <?php echo app('translator')->get('modules.report.salesReportMessage'); ?>
                <?php
                    $formattedStartTime = \Carbon\Carbon::parse($startTime)->format('h:i A');
                    $formattedEndTime = \Carbon\Carbon::parse($endTime)->format('h:i A');
                ?>
                <strong>
                    (<?php echo e($startDate === $endDate
                        ? __('modules.report.salesDataFor') . " $startDate, " . __('modules.report.timePeriod') . " $formattedStartTime - $formattedEndTime"
                        : __('modules.report.salesDataFrom') . " $startDate " . __('app.to') . " $endDate, " . __('modules.report.timePeriodEachDay') . " $formattedStartTime - $formattedEndTime"); ?>)
                </strong>
            </p>
        </div>

        <div class="grid grid-cols-1 gap-3 mb-4 sm:grid-cols-2 lg:grid-cols-6">
            <!-- Total Sales Card -->
            <div class="p-3 rounded-xl shadow-sm border" style="background-color: rgba(1, 22, 70, 0.05); border-color: rgba(1, 22, 70, 0.3);">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-xs font-medium" style="color: #011646;"><?php echo app('translator')->get('modules.report.totalSales'); ?></h3>
                    <div class="p-1.5 rounded-lg" style="background-color: rgba(1, 22, 70, 0.1);">
                        <svg class="w-3.5 h-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="color: #011646;"><g stroke-width="0"/><g stroke-linecap="round" stroke-linejoin="round"/><g stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.5 13.75c0 .97.75 1.75 1.67 1.75h1.88c.8 0 1.45-.68 1.45-1.53 0-.91-.4-1.24-.99-1.45l-3.01-1.05c-.59-.21-.99-.53-.99-1.45 0-.84.65-1.53 1.45-1.53h1.88c.92 0 1.67.78 1.67 1.75M12 7.5v9"/><path d="M22 12c0 5.52-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2m10 4V2h-4m-1 5 5-5"/></g></svg>
                    </div>
                </div>
                <p class="text-xl break-words font-bold mb-2" style="color: #011646;">
                    <?php echo e(currency_format($menuItems->sum('total_amount'), $currencyId)); ?>

                </p>

                <div class="space-y-1.5">
                    <div class="flex items-center justify-between rounded-lg p-2" style="background-color: rgba(1, 22, 70, 0.1);">
                        <span class="text-xs font-medium" style="color: #011646;">
                            <?php echo app('translator')->get('modules.report.orders'); ?>
                        </span>
                        <span class="text-xs font-bold" style="color: #011646;">
                            <?php echo e($menuItems->sum('total_orders')); ?>

                        </span>
                    </div>
                </div>
            </div>

            <!-- Total Cash Card -->
            <div class="p-3 bg-emerald-50 rounded-xl shadow-sm dark:bg-emerald-900/10 border border-emerald-100 dark:border-emerald-800">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-xs font-medium text-gray-800 dark:text-gray-200"><?php echo app('translator')->get('modules.report.traditionalPayments'); ?></h3>
                        <div class="p-1.5 bg-emerald-100 text-emerald-600 rounded-lg dark:bg-emerald-900/20 dark:text-emerald-400">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2m7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                        <?php echo e(currency_format($menuItems->sum('cash_amount') + $menuItems->sum('card_amount') + $menuItems->sum('upi_amount') + $menuItems->sum('bank_transfer_amount'), $currencyId)); ?>

                    </p>
                    <div class="space-y-1.5">
                        <?php
                            $traditionalPayments = [
                                'cash' => $menuItems->sum('cash_amount'),
                                'card' => $menuItems->sum('card_amount'),
                                'upi' => $menuItems->sum('upi_amount'),
                                'bank_transfer' => $menuItems->sum('bank_transfer_amount')
                            ];
                        ?>

                        <?php $__currentLoopData = $traditionalPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method => $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center justify-between rounded-lg bg-emerald-100/50 p-2 dark:bg-emerald-900/20">
                                <span class="text-xs font-medium text-emerald-700 dark:text-emerald-100">
                                    <?php echo app('translator')->get("modules.order.{$method}"); ?>
                                </span>
                                <span class="text-xs font-bold text-emerald-700 dark:text-emerald-400">
                                    <?php echo e(currency_format($amount, $currencyId)); ?>

                                </span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
            </div>

            <!-- Online Payments Card -->
            <div class="p-3 bg-emerald-50 rounded-xl shadow-sm dark:bg-emerald-900/10 border border-emerald-100 dark:border-emerald-800">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-xs font-medium text-gray-800 dark:text-gray-200"><?php echo app('translator')->get('modules.report.paymentGateways'); ?></h3>
                        <div class="p-1.5 bg-emerald-100 text-emerald-600 rounded-lg dark:bg-emerald-900/20 dark:text-emerald-400">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                        <?php echo e(currency_format($menuItems->sum('razorpay_amount') + $menuItems->sum('stripe_amount') + $menuItems->sum('flutterwave_amount'), $currencyId)); ?>

                    </p>
                    <div class="space-y-1.5">
                        <?php
                            $paymentMethods = [
                                'razorpay' => [
                                    'status' => $paymentGateway->razorpay_status,
                                    'amount' => $menuItems->sum('razorpay_amount')
                                ],
                                'stripe' => [
                                    'status' => $paymentGateway->stripe_status,
                                    'amount' => $menuItems->sum('stripe_amount')
                                ],
                                'flutterwave' => [
                                    'status' => $paymentGateway->flutterwave_status,
                                    'amount' => $menuItems->sum('flutterwave_amount')
                                ]
                            ];
                        ?>

                        <?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($details['status']): ?>
                            <div class="flex items-center justify-between rounded-lg bg-emerald-100/50 p-2 dark:bg-emerald-900/20">
                                    <span class="text-xs font-medium text-emerald-700 dark:text-emerald-100">
                                        <?php echo app('translator')->get("modules.order.{$method}"); ?>
                                    </span>
                                    <span class="text-xs font-bold text-emerald-700 dark:text-emerald-400">
                                        <?php echo e(currency_format($details['amount'], $currencyId)); ?>

                                    </span>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
            </div>

            <!-- Additional Amounts Card -->
            <div class="p-3 bg-rose-50 rounded-xl shadow-sm dark:bg-rose-900/10 border border-rose-100 dark:border-rose-800">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-xs font-medium text-gray-800 dark:text-gray-200"><?php echo app('translator')->get('modules.report.additionalAmounts'); ?></h3>
                        <div class="p-1.5 bg-rose-100 rounded-lg dark:bg-rose-800/50">
                            <svg class="w-3.5 h-3.5 text-rose-500 dark:text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0"/></svg>
                        </div>
                    </div>
                    <div class="space-y-1.5">
                        <?php
                            $additionalAmounts = [
                                'totalCharges' => [
                                    'label' => 'modules.report.totalCharges',
                                    'amount' => $charges->sum(fn($charge) => $menuItems->sum(fn($item) => $item['charges'][$charge->charge_name] ?? 0))
                                ],
                                'totalTaxes' => [
                                    'label' => 'modules.report.totalTaxes',
                                    'amount' => $menuItems->sum('total_tax_amount')
                                ],
                                'discount' => [
                                    'label' => 'modules.order.discount',
                                    'amount' => $menuItems->sum('discount_amount')
                                ],
                                'tip' => [
                                    'label' => 'modules.order.tip',
                                    'amount' => $menuItems->sum('tip_amount')
                                ]
                            ];
                        ?>

                        <?php $__currentLoopData = $additionalAmounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center justify-between rounded-lg bg-rose-100/50 p-2 dark:bg-rose-900/20">
                                <span class="text-xs font-medium text-rose-700 dark:text-rose-200">
                                    <?php echo app('translator')->get($data['label']); ?>
                                </span>
                                <span class="text-xs font-bold text-rose-800 dark:text-rose-200">
                                    <?php echo e(currency_format($data['amount'], $currencyId)); ?>

                                </span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <!-- Tax Breakdown Card -->
            <div class="p-3 bg-purple-50 rounded-xl shadow-sm dark:bg-purple-900/10 border border-purple-100 dark:border-purple-800">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-xs font-medium text-gray-800 dark:text-gray-200"><?php echo app('translator')->get('modules.report.taxBreakdown'); ?></h3>
                    <div class="p-1.5 bg-purple-100 rounded-lg dark:bg-purple-800/50">
                        <svg class="w-3.5 h-3.5 text-purple-500 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
                <div class="space-y-1.5">
                    <div class="flex items-center justify-between rounded-lg bg-purple-100/50 p-2 dark:bg-purple-900/20">
                        <span class="text-xs font-medium text-purple-700 dark:text-purple-200">
                            <?php echo app('translator')->get('modules.report.taxMode'); ?>
                        </span>
                        <span class="text-xs font-bold text-purple-800 dark:text-purple-200 capitalize">
                            <?php echo e($taxMode); ?>

                        </span>
                    </div>
                    <div class="flex items-center justify-between rounded-lg bg-purple-100/50 p-2 dark:bg-purple-900/20">
                        <span class="text-xs font-medium text-purple-700 dark:text-purple-200">
                            <?php echo app('translator')->get('modules.report.totalTaxCollection'); ?>
                        </span>
                        <span class="text-xs font-bold text-purple-800 dark:text-purple-200">
                            <?php echo e(currency_format($menuItems->sum('total_tax_amount'), $currencyId)); ?>

                        </span>
                    </div>

                    <?php $__currentLoopData = $allTaxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxName => $taxData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center justify-between rounded-lg bg-purple-100/50 p-2 dark:bg-purple-900/20">
                            <span class="text-xs font-medium text-purple-700 dark:text-purple-200">
                                <?php echo e($taxName); ?> (<?php echo e(number_format($taxData['percent'], 2)); ?>%)
                            </span>
                            <span class="text-xs font-bold text-purple-800 dark:text-purple-200">
                                <?php echo e(currency_format($taxData['total_amount'], $currencyId)); ?>

                            </span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>

            <!-- Outstanding Payments Card -->
            <div class="p-3 bg-orange-50 rounded-xl shadow-sm dark:bg-orange-900/10 border border-orange-100 dark:border-orange-800">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-xs font-medium text-orange-700 dark:text-orange-200"><?php echo app('translator')->get('modules.report.outstandingPayments'); ?></h3>
                    <div class="p-1.5 bg-orange-100 rounded-lg dark:bg-orange-800/50">
                        <svg class="w-3.5 h-3.5 text-orange-500 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0"/>
                        </svg>
                    </div>
                </div>
                <p class="text-xl break-words font-bold text-orange-700 dark:text-orange-200 mb-2">
                    <?php echo e(currency_format($menuItems->sum('outstanding_amount'), $currencyId)); ?>

                </p>

                <div class="space-y-1.5">
                    <div class="flex items-center justify-between rounded-lg bg-orange-100 p-2 dark:bg-orange-100">
                        <span class="text-xs font-medium text-orange-800 dark:text-orange-300">
                            <?php echo app('translator')->get('modules.report.outstandingOrders'); ?>
                        </span>
                        <span class="text-xs font-bold text-orange-800 dark:text-orange-300">
                            <?php echo e($menuItems->sum('outstanding_orders')); ?>

                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="flex flex-wrap justify-between items-center gap-4 p-4 bg-gray-50 rounded-lg dark:bg-gray-700">
            <div class="lg:flex items-center mb-4 sm:mb-0">
                <form  action="#" method="GET">

                    <div class="lg:flex gap-2 items-center">
                        <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['id' => 'dateRangeType','class' => 'block w-full sm:w-fit mb-2 lg:mb-0','wire:model' => 'dateRangeType','wire:change' => 'setDateRange']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'dateRangeType','class' => 'block w-full sm:w-fit mb-2 lg:mb-0','wire:model' => 'dateRangeType','wire:change' => 'setDateRange']); ?>
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

                        <div id="date-range-picker" date-rangepicker class="flex items-center w-full">
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20zM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2"/></svg>
                                </div>
                                <input id="datepicker-range-start" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model.change='startDate' placeholder="<?php echo app('translator')->get('app.selectStartDate'); ?>">
                            </div>
                            <span class="mx-4 text-gray-500 dark:text-gray-100"><?php echo app('translator')->get('app.to'); ?></span>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20zM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2"/></svg>
                                </div>
                                <input id="datepicker-range-end" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model.live='endDate' placeholder="<?php echo app('translator')->get('app.selectEndDate'); ?>">
                            </div>
                        </div>

                        <div class="lg:flex items-center gap-2 ms-2">
                            <div class="w-full max-w-[7rem]">
                                <label for="start-time" class="sr-only"><?php echo app('translator')->get('modules.reservation.timeStart'); ?>:</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 end-0 top-0 flex items-center pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" width="24" height="24" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 7.5a7.5 7.5 0 1 1 15 0 7.5 7.5 0 0 1-15 0m7 0V3h1v4.293l2.854 2.853-.708.708-3-3A.5.5 0 0 1 7 7.5" fill="currentColor"/></svg>
                                    </div>
                                    <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'start-time','type' => 'time','wire:model.live.debounce.500ms' => 'startTime']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'start-time','type' => 'time','wire:model.live.debounce.500ms' => 'startTime']); ?>
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
                                </div>
                            </div>
                            <span class="mx-2 text-gray-500 dark:text-gray-100 w-10 text-center"><?php echo app('translator')->get('app.to'); ?></span>
                            <div class="w-full max-w-[7rem]">
                                <label for="end-time" class="sr-only"><?php echo app('translator')->get('modules.reservation.timeEnd'); ?>:</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 end-0 top-0 flex items-center pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" width="24" height="24" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 7.5a7.5 7.5 0 1 1 15 0 7.5 7.5 0 0 1-15 0m7 0V3h1v4.293l2.854 2.853-.708.708-3-3A.5.5 0 0 1 7 7.5" fill="currentColor"/></svg>
                                    </div>
                                    <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'end-time','type' => 'time','wire:model.live.debounce.500ms' => 'endTime']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'end-time','type' => 'time','wire:model.live.debounce.500ms' => 'endTime']); ?>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="inline-flex items-center gap-2 w-1/2 sm:w-auto ms-2">
                <a href="javascript:;" wire:click='exportReport'
                class="inline-flex items-center  w-1/2 px-3 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7.414A2 2 0 0 0 15.414 6L12 2.586A2 2 0 0 0 10.586 2zm5 6a1 1 0 1 0-2 0v3.586l-1.293-1.293a1 1 0 1 0-1.414 1.414l3 3a1 1 0 0 0 1.414 0l3-3a1 1 0 0 0-1.414-1.414L11 11.586z" clip-rule="evenodd"/></svg>
                    <?php echo app('translator')->get('app.export'); ?>
                </a>

                <select wire:model.live="selectedWaiter" wire:change="filterWaiter" class="px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-4 focus:ring-primary-300 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                    <option value=""><?php echo app('translator')->get('app.reportByWaiter'); ?></option>
                    <?php $__currentLoopData = $waiters ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $waiter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($waiter->id); ?>"><?php echo e($waiter->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

            </div>
        </div>
    </div>

    <!-- Sales Table -->
    <div class="overflow-x-auto bg-white dark:bg-gray-800 p-4">
        <table class="min-w-full border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-600 uppercase dark:text-gray-300">
                <?php echo app('translator')->get('app.date'); ?>
                </th>
                <th class="p-4 text-xs font-medium tracking-wider text-center text-gray-600 uppercase dark:text-gray-300">
                <?php echo app('translator')->get('modules.report.totalOrders'); ?>
                </th>

                <!-- Charges Column Group -->
                <?php if(count($charges) > 0): ?>
                <th colspan="<?php echo e(count($charges)); ?>" class="p-4 text-xs font-medium tracking-wider text-center text-gray-600 uppercase dark:text-gray-300 bg-blue-50 dark:bg-blue-900/20">
                    <?php echo app('translator')->get('modules.order.extraCharges'); ?>
                </th>
                <?php endif; ?>

                <!-- Taxes Column Group -->
                <?php if(count($taxes) > 0): ?>
                <th colspan="<?php echo e(count($taxes) + 1); ?>" class="p-4 text-xs font-medium tracking-wider text-center text-gray-600 uppercase dark:text-gray-300 bg-red-50 dark:bg-red-900/20">
                    <?php echo app('translator')->get('modules.order.taxes'); ?> (<?php echo app('translator')->get('modules.report.fromActualBreakdown'); ?>)
                </th>
                <?php endif; ?>

                <!-- Payment Methods Column Group -->
                <th colspan="<?php echo e(4 + collect(['stripe', 'razorpay', 'flutterwave'])->filter(fn($method) => isset($paymentGateway) && $paymentGateway->{"{$method}_status"})->count()); ?>" class="p-4 text-xs font-medium tracking-wider text-center text-gray-600 uppercase dark:text-gray-300 bg-green-50 dark:bg-green-900/20">
                    <?php echo app('translator')->get('modules.report.paymentMethods'); ?>
                </th>

                <!-- Due Payment Column -->
                <th class="p-4 text-xs font-medium tracking-wider text-right text-gray-600 uppercase dark:text-gray-300 bg-orange-50 dark:bg-orange-900/20">
                    <?php echo app('translator')->get('modules.order.due'); ?>
                </th>

                <th class="p-4 text-xs font-medium tracking-wider text-right text-gray-600 uppercase dark:text-gray-300">
                <?php echo app('translator')->get('modules.order.deliveryFee'); ?>
                </th>
                <th class="p-4 text-xs font-medium tracking-wider text-right text-gray-600 uppercase dark:text-gray-300">
                <?php echo app('translator')->get('modules.order.discount'); ?>
                </th>
                <th   class="p-4 text-xs font-medium tracking-wider text-right text-gray-600 uppercase dark:text-gray-300">
                <?php echo app('translator')->get('modules.order.tip'); ?>
                </th>
                <th class="p-4 text-xs font-bold tracking-wider text-right text-gray-600 uppercase dark:text-gray-300">
                <?php echo app('translator')->get('modules.order.total'); ?>
                </th>
                <th class="p-4 text-xs font-bold tracking-wider text-right text-gray-600 uppercase dark:text-gray-300">
                <?php echo app('translator')->get('modules.order.total'); ?>
                </th>
            </tr>
            <tr>
                <th></th>
                <th></th>

                <!-- Charges Subheaders -->
                <?php $__currentLoopData = $charges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $charge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th class="p-4 text-xs font-medium tracking-wider text-right text-gray-600 uppercase dark:text-gray-300 bg-blue-50 dark:bg-blue-900/20">
                    <?php echo e($charge->charge_name); ?>

                </th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- Taxes Subheaders -->
                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th class="p-4 text-xs font-medium tracking-wider text-right text-gray-600 uppercase dark:text-gray-300 bg-red-50 dark:bg-red-900/20">
                    <?php echo e($tax->tax_name); ?> (<?php echo e($tax->tax_percent); ?>%)
                </th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- Total Tax Amount Column -->
                <?php if(count($taxes) > 0): ?>
                <th class="p-4 text-xs font-medium tracking-wider text-right text-gray-600 uppercase dark:text-gray-300 bg-red-50 dark:bg-red-900/20">
                    <?php echo app('translator')->get('modules.report.totalTaxAmount'); ?>
                </th>
                <?php endif; ?>

                <!-- Payment Methods Subheaders -->
                <th class="p-4 text-xs font-medium tracking-wider text-right text-gray-600 uppercase dark:text-gray-300 bg-green-50 dark:bg-green-900/20">
                <?php echo app('translator')->get('modules.order.cash'); ?>
                </th>
                <th class="p-4 text-xs font-medium tracking-wider text-right text-gray-600 uppercase dark:text-gray-300 bg-green-50 dark:bg-green-900/20">
                <?php echo app('translator')->get('modules.order.upi'); ?>
                </th>
                <th class="p-4 text-xs font-medium tracking-wider text-right text-gray-600 uppercase dark:text-gray-300 bg-green-50 dark:bg-green-900/20">
                <?php echo app('translator')->get('modules.order.card'); ?>
                </th>
                <th class=" py-4 text-xs font-medium tracking-wider text-right text-gray-600 uppercase dark:text-gray-300 bg-green-50 dark:bg-green-900/20">
                <?php echo app('translator')->get('modules.order.bank_transfer'); ?>
                </th>
                <th class="p-4 text-xs font-medium tracking-wider text-right text-gray-600 uppercase dark:text-gray-300 bg-orange-50 dark:bg-orange-900/20">

                </th>
                <?php if($paymentGateway->razorpay_status): ?>
                <th class="p-4 text-xs font-medium tracking-wider text-right text-gray-600 uppercase dark:text-gray-300 bg-green-50 dark:bg-green-900/20">
                    <?php echo app('translator')->get('modules.order.razorpay'); ?>
                </th>
                <?php endif; ?>
                <?php if($paymentGateway->stripe_status): ?>
                <th class="p-4 text-xs font-medium tracking-wider text-right text-gray-600 uppercase dark:text-gray-300 bg-green-50 dark:bg-green-900/20">
                    <?php echo app('translator')->get('modules.order.stripe'); ?>
                </th>
                <?php endif; ?>
                <?php if($paymentGateway->flutterwave_status): ?>
                <th class="p-4 text-xs font-medium tracking-wider text-right text-gray-600 uppercase dark:text-gray-300 bg-green-50 dark:bg-green-900/20">
                    <?php echo app('translator')->get('modules.order.flutterwave'); ?>
                </th>
                <?php endif; ?>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th class="p-4 text-xs font-medium tracking-wider text-right text-gray-600 uppercase dark:text-gray-300">
                    <?php echo app('translator')->get('modules.order.totalExcludingTip'); ?>
                </th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800">
            <?php $__empty_1 = true; $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer" wire:click="openItemsModal('<?php echo e($item['date']); ?>')">
                <td class="p-4 text-sm font-medium text-gray-900 dark:text-white whitespace-nowrap">
                <?php echo e(\Carbon\Carbon::parse($item['date'])->format('M d, Y')); ?>

                </td>
                <td class="p-4 text-sm text-center text-gray-900 dark:text-white">
                <?php echo e($item['total_orders']); ?>

                </td>

                <?php $__currentLoopData = $charges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $charge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="p-4 text-sm font-normal text-right text-gray-900 dark:text-gray-100 bg-blue-50/50 dark:bg-blue-900/10">
                <?php echo e(currency_format($item['charges'][$charge->charge_name] ?? 0, $currencyId)); ?>

                </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="p-4 text-sm font-normal text-right text-gray-900 dark:text-gray-100 bg-red-50/50 dark:bg-red-900/10">
                    <?php echo e(currency_format($item['taxes'][$tax->tax_name] ?? 0, $currencyId)); ?>

                </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if(count($taxes) > 0): ?>
                <td class="p-4 text-sm font-normal text-right text-gray-900 dark:text-gray-100 bg-red-50/50 dark:bg-red-900/10">
                    <?php echo e(currency_format($item['total_tax_amount'], $currencyId)); ?>

                </td>
                <?php endif; ?>

                <td class="p-4 text-sm text-right text-gray-900 dark:text-white bg-green-50/50 dark:bg-green-900/10">
                <?php echo e(currency_format($item['cash_amount'], $currencyId)); ?>

                </td>
                <td class="p-4 text-sm text-right text-gray-900 dark:text-white bg-green-50/50 dark:bg-green-900/10">
                <?php echo e(currency_format($item['upi_amount'], $currencyId)); ?>

                </td>
                <td class="p-4 text-sm text-right text-gray-900 dark:text-white bg-green-50/50 dark:bg-green-900/10">
                <?php echo e(currency_format($item['card_amount'], $currencyId)); ?>

                </td>
                <td class="px-5 text-sm text-right text-gray-900 dark:text-white bg-green-50/50 dark:bg-green-900/10">
                <?php echo e(currency_format($item['bank_transfer_amount'], $currencyId)); ?>

                </td>
                <td class="p-4 text-sm text-right text-gray-900 dark:text-white bg-orange-50/50 dark:bg-orange-900/10">
                    <?php echo e(currency_format($item['outstanding_amount'], $currencyId)); ?>

                </td>
                <?php if($paymentGateway->razorpay_status): ?>
                <td class="p-4 text-sm text-right text-gray-900 dark:text-white bg-green-50/50 dark:bg-green-900/10">
                    <?php echo e(currency_format($item['razorpay_amount'], $currencyId)); ?>

                </td>
                <?php endif; ?>
                <?php if($paymentGateway->stripe_status): ?>
                <td class="p-4 text-sm text-right text-gray-900 dark:text-white bg-green-50/50 dark:bg-green-900/10">
                    <?php echo e(currency_format($item['stripe_amount'], $currencyId)); ?>

                </td>
                <?php endif; ?>
                <?php if($paymentGateway->flutterwave_status): ?>
                <td class="p-4 text-sm text-right text-gray-900 dark:text-white bg-green-50/50 dark:bg-green-900/10">
                    <?php echo e(currency_format($item['flutterwave_amount'], $currencyId)); ?>

                </td>
                <?php endif; ?>
                <td class="p-4 text-sm text-right text-gray-900 dark:text-white ">
                    <?php echo e(currency_format($item['delivery_fee'], $currencyId)); ?>

                </td>
                <td class="p-4 text-sm text-right text-gray-900 dark:text-white">
                    <?php echo e(currency_format($item['discount_amount'], $currencyId)); ?>

                </td>
                <td class="p-4 text-sm text-right text-gray-900 dark:text-white">
                <?php echo e(currency_format($item['tip_amount'], $currencyId)); ?>

                </td>
                <td class="p-4 text-sm font-bold text-right text-gray-900 dark:text-white">
                <?php echo e(currency_format($item['total_amount'], $currencyId)); ?>

                </td>
                <td class="p-4 text-sm font-bold text-right text-gray-900 dark:text-white">
                <?php echo e(currency_format($item['total_excluding_tip'], $currencyId)); ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="14" class="p-4 text-sm text-center text-gray-500 dark:text-gray-400">
                <?php echo app('translator')->get('messages.noItemAdded'); ?>
                </td>
            </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Items Modal -->
    <?php if (isset($component)) { $__componentOriginal9f64f32e90b9102968f2bc548315018c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f64f32e90b9102968f2bc548315018c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal','data' => ['wire:model' => 'showItemsModal','maxWidth' => '4xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'showItemsModal','maxWidth' => '4xl']); ?>
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                    <?php echo app('translator')->get('modules.report.imSales'); ?> - <?php echo e(\Carbon\Carbon::parse($selectedDate)->format('M d, Y')); ?>

                </h2>
                <button wire:click="closeItemsModal" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <?php if(count($dateItems) > 0): ?>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                <?php echo app('translator')->get('modules.menu.itemName'); ?>
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                <?php echo app('translator')->get('modules.order.quantity'); ?>
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                <?php echo app('translator')->get('modules.order.avgPrice'); ?>
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                <?php echo app('translator')->get('modules.report.tax'); ?>
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                <?php echo app('translator')->get('modules.order.total'); ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        <?php $__currentLoopData = $dateItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dateItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                <?php echo e($dateItem['item_name']); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-900 dark:text-white">
                                <?php echo e($dateItem['quantity']); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 dark:text-white">
                                <?php echo e(currency_format($dateItem['avg_price'], $currencyId)); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 dark:text-white">
                                <?php echo e(currency_format($dateItem['tax_amount'], $currencyId)); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-right text-gray-900 dark:text-white">
                                <?php echo e(currency_format($dateItem['total_with_tax'], $currencyId)); ?>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr class="bg-gray-100 dark:bg-gray-700 font-bold">
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">
                                <?php echo app('translator')->get('modules.order.total'); ?>
                            </td>
                            <td class="px-6 py-4 text-sm text-center text-gray-900 dark:text-white">
                                <?php echo e(array_sum(array_column($dateItems, 'quantity'))); ?>

                            </td>
                            <td class="px-6 py-4 text-sm text-right text-gray-900 dark:text-white">
                                <?php
                                    $totalQuantity = array_sum(array_column($dateItems, 'quantity'));
                                    $avgPrice = $totalQuantity > 0 ? array_sum(array_column($dateItems, 'total_amount')) / $totalQuantity : 0;
                                ?>
                                <?php echo e(currency_format($avgPrice, $currencyId)); ?>

                            </td>
                            <td class="px-6 py-4 text-sm text-right text-gray-900 dark:text-white">
                                <?php echo e(currency_format(array_sum(array_column($dateItems, 'tax_amount')), $currencyId)); ?>

                            </td>
                            <td class="px-6 py-4 text-sm text-right text-gray-900 dark:text-white">
                                <?php echo e(currency_format(array_sum(array_column($dateItems, 'total_with_tax')), $currencyId)); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <div class="text-center py-8">
                <p class="text-gray-500 dark:text-gray-400"><?php echo app('translator')->get('messages.noItemAdded'); ?></p>
            </div>
            <?php endif; ?>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f64f32e90b9102968f2bc548315018c)): ?>
<?php $attributes = $__attributesOriginal9f64f32e90b9102968f2bc548315018c; ?>
<?php unset($__attributesOriginal9f64f32e90b9102968f2bc548315018c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f64f32e90b9102968f2bc548315018c)): ?>
<?php $component = $__componentOriginal9f64f32e90b9102968f2bc548315018c; ?>
<?php unset($__componentOriginal9f64f32e90b9102968f2bc548315018c); ?>
<?php endif; ?>

        <?php
        $__scriptKey = '3598578097-0';
        ob_start();
    ?>
    <script>
        const datepickerEl1 = document.getElementById('datepicker-range-start');

        datepickerEl1.addEventListener('changeDate', (event) => {
            $wire.dispatch('setStartDate', { start: datepickerEl1.value });
        });

        const datepickerEl2 = document.getElementById('datepicker-range-end');

        datepickerEl2.addEventListener('changeDate', (event) => {
            $wire.dispatch('setEndDate', { end: datepickerEl2.value });
        });
    </script>
        <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\reports\sales-report.blade.php ENDPATH**/ ?>