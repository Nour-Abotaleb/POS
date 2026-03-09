<div>
    <!-- Header Section -->
    <div class="p-4 bg-white dark:bg-gray-800">
        <div class="mb-4">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white"><?php echo app('translator')->get('menu.deliveryAppReport'); ?></h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                <?php echo app('translator')->get('modules.report.deliveryAppReportMessage'); ?>
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

        <!-- Stats Cards Grid -->
        <div class="grid grid-cols-1 gap-4 mb-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
            <!-- Total Orders -->
            <div class="p-4 bg-blue-50 rounded-xl shadow-sm dark:bg-blue-900/10 border border-blue-100 dark:border-blue-800">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-medium text-blue-600 dark:text-blue-400"><?php echo app('translator')->get('modules.report.totalOrders'); ?></h3>
                    <div class="p-2 bg-blue-100 rounded-lg dark:bg-blue-900/50">
                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-3xl break-words font-bold text-gray-800 dark:text-gray-100"><?php echo e($totalOrders); ?></p>
            </div>

            <!-- Total Revenue -->
            <div class="p-4 rounded-xl shadow-sm border" style="background-color: rgba(1, 22, 70, 0.05); border-color: rgba(1, 22, 70, 0.3);">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-medium" style="color: #011646;"><?php echo app('translator')->get('modules.report.totalRevenue'); ?></h3>
                    <div class="p-2 rounded-lg" style="background-color: rgba(1, 22, 70, 0.1);">
                        <svg class="w-4 h-4" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="color: #011646;"><g stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.5 13.75c0 .97.75 1.75 1.67 1.75h1.88c.8 0 1.45-.68 1.45-1.53 0-.91-.4-1.24-.99-1.45l-3.01-1.05c-.59-.21-.99-.53-.99-1.45 0-.84.65-1.53 1.45-1.53h1.88c.92 0 1.67.78 1.67 1.75M12 7.5v9"/><path d="M22 12c0 5.52-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2m10 4V2h-4m-1 5 5-5"/></g></svg>
                    </div>
                </div>
                <p class="text-3xl break-words font-bold" style="color: #011646;">
                    <?php echo e(currency_format($totalRevenue, restaurant()->currency_id)); ?>

                </p>
            </div>

            <!-- Total Commission -->
            <div class="p-4 bg-orange-50 rounded-xl shadow-sm dark:bg-orange-900/10 border border-orange-100 dark:border-orange-800">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-medium text-orange-600 dark:text-orange-400"><?php echo app('translator')->get('modules.report.totalCommission'); ?></h3>
                    <div class="p-2 bg-orange-100 rounded-lg dark:bg-orange-900/50">
                        <svg class="w-4 h-4 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-3xl break-words font-bold text-gray-800 dark:text-gray-100">
                    <?php echo e(currency_format($totalCommission, restaurant()->currency_id)); ?>

                </p>
            </div>

            <!-- Total Delivery Fees -->
            <div class="p-4 bg-purple-50 rounded-xl shadow-sm dark:bg-purple-900/10 border border-purple-100 dark:border-purple-800">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-medium text-purple-600 dark:text-purple-400"><?php echo app('translator')->get('modules.report.totalDeliveryFees'); ?></h3>
                    <div class="p-2 bg-purple-100 rounded-lg dark:bg-purple-900/50">
                        <svg class="w-4 h-4 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                </div>
                <p class="text-3xl break-words font-bold text-gray-800 dark:text-gray-100">
                    <?php echo e(currency_format($totalDeliveryFees, restaurant()->currency_id)); ?>

                </p>
            </div>

            <!-- Net Revenue -->
            <div class="p-4 bg-emerald-50 rounded-xl shadow-sm dark:bg-emerald-900/10 border border-emerald-100 dark:border-emerald-800">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-medium text-emerald-600 dark:text-emerald-400"><?php echo app('translator')->get('modules.report.netRevenue'); ?></h3>
                    <div class="p-2 bg-emerald-100 rounded-lg dark:bg-emerald-900/50">
                        <svg class="w-4 h-4 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-3xl break-words font-bold text-gray-800 dark:text-gray-100">
                    <?php echo e(currency_format($netRevenue, restaurant()->currency_id)); ?>

                </p>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="flex flex-wrap justify-between items-center gap-4 p-4 bg-gray-50 rounded-lg dark:bg-gray-700">
            <div class="lg:flex items-center mb-4 sm:mb-0">
                <form class="pe-3" action="#" method="GET">
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

                        <div class="lg:flex items-center justify-between gap-x-2 ms-2">
                            <div class="w-full max-w-[7rem]">
                                <label for="start-time" class="sr-only"><?php echo app('translator')->get('modules.reservation.timeStart'); ?>:</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 mr-3 top-0 flex items-center pointer-events-none">
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
                                    <div class="absolute inset-y-0 mr-3 top-0 flex items-center pointer-events-none">
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

            <div class="flex flex-col sm:flex-row gap-4 lg:items-center w-full lg:w-auto">
                <div class="relative w-full sm:w-auto">
                    <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['id' => 'deliveryAppFilter','class' => 'block w-full sm:w-fit','wire:model.live' => 'selectedDeliveryApp']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'deliveryAppFilter','class' => 'block w-full sm:w-fit','wire:model.live' => 'selectedDeliveryApp']); ?>
                        <option value="all"><?php echo app('translator')->get('modules.report.allDeliveryApps'); ?></option>
                        <option value="direct"><?php echo app('translator')->get('modules.report.directDelivery'); ?></option>
                        <?php $__currentLoopData = $deliveryApps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($app->id); ?>"><?php echo e($app->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                </div>
            </div>
        </div>
    </div>

    <!-- Delivery Apps Table -->
    <div class="overflow-x-auto bg-white dark:bg-gray-800 p-4 rounded-lg">
        <table class="min-w-full border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-3 text-xs font-medium tracking-wider ltr:text-left rtl:text-right text-gray-600 uppercase dark:text-gray-300">
                        <?php echo app('translator')->get('modules.report.deliveryApp'); ?>
                    </th>
                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-600 uppercase dark:text-gray-300">
                        <?php echo app('translator')->get('modules.report.totalOrders'); ?>
                    </th>
                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-600 uppercase dark:text-gray-300">
                        <?php echo app('translator')->get('modules.report.totalRevenue'); ?>
                    </th>
                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-600 uppercase dark:text-gray-300">
                        <?php echo app('translator')->get('modules.report.totalDeliveryFees'); ?>
                    </th>
                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-600 uppercase dark:text-gray-300">
                        <?php echo app('translator')->get('modules.report.avgOrderValue'); ?>
                    </th>
                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-600 uppercase dark:text-gray-300">
                        <?php echo app('translator')->get('modules.report.commissionRate'); ?>
                    </th>
                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-600 uppercase dark:text-gray-300">
                        <?php echo app('translator')->get('modules.report.totalCommission'); ?>
                    </th>
                    <th class="px-4 py-3 text-xs font-medium tracking-wider ltr:text-end rtl:text-right text-gray-600 uppercase dark:text-gray-300">
                        <?php echo app('translator')->get('modules.report.netRevenue'); ?>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800">
                <?php $__empty_1 = true; $__currentLoopData = $reportData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <?php if($data['delivery_app']->logo_url): ?>
                                    <img src="<?php echo e($data['delivery_app']->logo_url); ?>" alt="<?php echo e($data['delivery_app']->name); ?>" class="w-8 h-8 rounded object-cover">
                                <?php elseif($data['is_direct'] ?? false): ?>
                                    <div class="w-8 h-8 rounded bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                                <span class="text-sm font-medium text-gray-900 dark:text-white">
                                    <?php echo e($data['delivery_app']->name); ?>

                                </span>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="text-sm font-medium text-gray-900 dark:text-white text-center">
                                <?php echo e($data['total_orders']); ?>

                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="text-sm font-medium text-gray-900 dark:text-white text-center">
                                <?php echo e(currency_format($data['total_revenue'], restaurant()->currency_id)); ?>

                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="text-sm font-medium text-gray-900 dark:text-white text-center">
                                <?php echo e(currency_format($data['total_delivery_fees'], restaurant()->currency_id)); ?>

                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="text-sm font-medium text-gray-900 dark:text-white text-center">
                                <?php echo e(currency_format($data['avg_order_value'], restaurant()->currency_id)); ?>

                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="text-sm font-medium text-gray-900 dark:text-white text-center">
                                <?php if($data['delivery_app']->commission_type === 'percent'): ?>
                                    <?php echo e($data['delivery_app']->commission_value); ?>%
                                <?php else: ?>
                                    <?php echo e(currency_format($data['delivery_app']->commission_value, restaurant()->currency_id)); ?> <?php echo app('translator')->get('modules.report.perOrder'); ?>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="text-sm font-medium text-orange-600 dark:text-orange-400 text-center">
                                <?php echo e(currency_format($data['commission'], restaurant()->currency_id)); ?>

                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="text-sm font-bold text-emerald-600 dark:text-emerald-400 text-right">
                                <?php echo e(currency_format($data['net_revenue'], restaurant()->currency_id)); ?>

                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" class="px-4 py-4 text-sm text-center text-gray-500 dark:text-gray-400">
                            <?php echo app('translator')->get('modules.report.noDeliveryAppOrders'); ?>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <?php if($reportData->count() > 0): ?>
                <tfoot class="bg-gray-50 dark:bg-gray-700">
                    <tr class="font-bold">
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <?php echo app('translator')->get('modules.dashboard.total'); ?>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-white text-center">
                            <?php echo e($totalOrders); ?>

                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-white text-center">
                            <?php echo e(currency_format($totalRevenue, restaurant()->currency_id)); ?>

                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-white text-center">
                            <?php echo e(currency_format($totalDeliveryFees, restaurant()->currency_id)); ?>

                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-white text-center">
                            -
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-white text-center">
                            -
                        </td>
                        <td class="px-4 py-3 text-sm text-orange-600 dark:text-orange-400 text-center">
                            <?php echo e(currency_format($totalCommission, restaurant()->currency_id)); ?>

                        </td>
                        <td class="px-4 py-3 text-sm text-emerald-600 dark:text-emerald-400 text-right">
                            <?php echo e(currency_format($netRevenue, restaurant()->currency_id)); ?>

                        </td>
                    </tr>
                </tfoot>
            <?php endif; ?>
        </table>
    </div>

        <?php
        $__scriptKey = '2136845266-0';
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
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\reports\delivery-app-report.blade.php ENDPATH**/ ?>