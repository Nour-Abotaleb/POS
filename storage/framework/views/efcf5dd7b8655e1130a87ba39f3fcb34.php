<div>
    <!-- Header Section -->
    <div class="p-4 bg-white dark:bg-gray-800">
        <div class="mb-4">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white"><?php echo app('translator')->get('menu.itemReport'); ?></h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                <?php echo app('translator')->get('modules.report.itemReportMessage'); ?>
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
        <div class="grid grid-cols-1 gap-4 mb-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <!-- Sum Of Total Revenue -->
            <div class="p-4 rounded-xl shadow-sm border" style="background-color: rgba(1, 22, 70, 0.05); border-color: rgba(1, 22, 70, 0.3);">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium" style="color: #011646;"><?php echo app('translator')->get('modules.report.sumOfTotalRevenue'); ?></h3>
                <div class="p-2 rounded-lg" style="background-color: rgba(1, 22, 70, 0.1);">
                <svg class="w-4 h-4" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="color: #011646;"><g stroke-width="0"/><g stroke-linecap="round" stroke-linejoin="round"/><g stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.5 13.75c0 .97.75 1.75 1.67 1.75h1.88c.8 0 1.45-.68 1.45-1.53 0-.91-.4-1.24-.99-1.45l-3.01-1.05c-.59-.21-.99-.53-.99-1.45 0-.84.65-1.53 1.45-1.53h1.88c.92 0 1.67.78 1.67 1.75M12 7.5v9"/><path d="M22 12c0 5.52-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2m10 4V2h-4m-1 5 5-5"/></g></svg>
                </div>
            </div>
            <p class="text-3xl break-words font-bold" style="color: #011646;">
                <?php echo e(currency_format($this->totalRevenue, restaurant()->currency_id)); ?>

            </p>
            </div>

            <!-- Total Quantity Sold Card -->
            <div class="p-4 bg-emerald-50 rounded-xl shadow-sm dark:bg-emerald-900/10 border border-emerald-100 dark:border-emerald-800">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-emerald-600 dark:text-emerald-400"><?php echo app('translator')->get('modules.report.totalQuantitySold'); ?></h3>
                <div class="p-2 bg-emerald-100 rounded-lg dark:bg-emerald-900/50">
                <svg class="w-4 h-4 text-emerald-600 dark:text-emerald-400" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon glyph"><path d="M18.22 17H9.8a2 2 0 0 1-2-1.55L5.2 4H3a1 1 0 0 1 0-2h2.2a2 2 0 0 1 2 1.55L9.8 15h8.42L20 7.76a1 1 0 0 1 2 .48l-1.81 7.25A2 2 0 0 1 18.22 17m-1.72 2a1.5 1.5 0 1 0 1.5 1.5 1.5 1.5 0 0 0-1.5-1.5m-5 0a1.5 1.5 0 1 0 1.5 1.5 1.5 1.5 0 0 0-1.5-1.5m3.21-9.29 4-4a1 1 0 1 0-1.42-1.42L14 7.59l-1.29-1.3a1 1 0 0 0-1.42 1.42l2 2a1 1 0 0 0 1.42 0" fill="currentColor"/></svg>
                </div>
            </div>
            <p class="text-3xl break-words font-bold text-gray-800 dark:text-gray-100">
                <?php echo e($this->totalQuantitySold); ?>

            </p>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="flex flex-wrap justify-between items-center gap-4 p-4 bg-gray-50 rounded-lg dark:bg-gray-700">
            <div class="lg:flex items-center mb-4 sm:mb-0">
                <form class="sm:pr-3" action="#" method="GET">
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
                                    <div class="absolute inset-y-0 end-0 top-0 pe-4.5 ps-3.5 flex items-center pointer-events-none">
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
                                    <div class="absolute inset-y-0 end-0 top-0 pe-3.5 flex items-center pointer-events-none">
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
                    <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'menu_name','class' => 'block w-full pr-10','type' => 'text','placeholder' => ''.e(__('placeholders.searchMenuItems')).'','wire:model.live.debounce.500ms' => 'searchTerm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'menu_name','class' => 'block w-full pr-10','type' => 'text','placeholder' => ''.e(__('placeholders.searchMenuItems')).'','wire:model.live.debounce.500ms' => 'searchTerm']); ?>
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
                    <!--[if BLOCK]><![endif]--><?php if($searchTerm): ?>
                        <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3" wire:click="$set('searchTerm', '')">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <a href="javascript:;" wire:click='exportReport'
                    class="inline-flex items-center  w-1/2 px-3 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7.414A2 2 0 0 0 15.414 6L12 2.586A2 2 0 0 0 10.586 2zm5 6a1 1 0 1 0-2 0v3.586l-1.293-1.293a1 1 0 1 0-1.414 1.414l3 3a1 1 0 0 0 1.414 0l3-3a1 1 0 0 0-1.414-1.414L11 11.586z" clip-rule="evenodd"/></svg>
                    <?php echo app('translator')->get('app.export'); ?>
                </a>
            </div>
        </div>
    </div>

    <!-- Sales Table -->
    <div class="overflow-x-auto bg-white dark:bg-gray-800 p-4 rounded-lg">
        <table class="min-w-full border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-3 text-xs font-medium tracking-wider ltr:text-left rtl:text-right text-gray-600 uppercase dark:text-gray-300">
                        <button wire:click="sortByToggle('item_name')" class="flex items-center gap-1 hover:text-gray-900 dark:hover:text-white transition-colors <?php echo e($sortBy === 'item_name' ? 'font-bold text-gray-900 dark:text-white' : ''); ?>">
                            <?php echo app('translator')->get('modules.menu.itemName'); ?>
                            <svg width="24" height="24" class="w-4 h-4" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path class="<?php echo \Illuminate\Support\Arr::toCssClasses(['opacity-100' => $sortBy === 'item_name' && $sortDirection === 'asc', 'opacity-30' => !($sortBy === 'item_name' && $sortDirection === 'asc')]); ?>" fill="currentColor" d="M11 7h-6l3-4z"></path>
                                <path class="<?php echo \Illuminate\Support\Arr::toCssClasses(['opacity-100' => $sortBy === 'item_name' && $sortDirection === 'desc', 'opacity-30' => !($sortBy === 'item_name' && $sortDirection === 'desc')]); ?>" fill="currentColor" d="M5 9h6l-3 4z"></path>
                            </svg>
                        </button>
                    </th>
                    <th class="px-4 py-3 text-xs font-medium tracking-wider ltr:text-left rtl:text-right text-gray-600 uppercase dark:text-gray-300">
                        <button wire:click="sortByToggle('category_name')" class="flex items-center gap-1 hover:text-gray-900 dark:hover:text-white transition-colors <?php echo e($sortBy === 'category_name' ? 'font-bold text-gray-900 dark:text-white' : ''); ?>">
                            <?php echo app('translator')->get('modules.menu.categoryName'); ?>
                            <svg width="24" height="24" class="w-4 h-4" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path class="<?php echo \Illuminate\Support\Arr::toCssClasses(['opacity-100' => $sortBy === 'category_name' && $sortDirection === 'asc', 'opacity-30' => !($sortBy === 'category_name' && $sortDirection === 'asc')]); ?>" fill="currentColor" d="M11 7h-6l3-4z"></path>
                                <path class="<?php echo \Illuminate\Support\Arr::toCssClasses(['opacity-100' => $sortBy === 'category_name' && $sortDirection === 'desc', 'opacity-30' => !($sortBy === 'category_name' && $sortDirection === 'desc')]); ?>" fill="currentColor" d="M5 9h6l-3 4z"></path>
                            </svg>
                        </button>
                    </th>
                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-600 uppercase dark:text-gray-300">
                        <button wire:click="sortByToggle('quantity_sold')" class="flex items-center gap-1 hover:text-gray-900 dark:hover:text-white transition-colors mx-auto <?php echo e($sortBy === 'quantity_sold' ? 'font-bold text-gray-900 dark:text-white' : ''); ?>">
                            <?php echo app('translator')->get('modules.report.quantitySold'); ?>
                            <svg width="24" height="24" class="w-4 h-4" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path class="<?php echo \Illuminate\Support\Arr::toCssClasses(['opacity-100' => $sortBy === 'quantity_sold' && $sortDirection === 'asc', 'opacity-30' => !($sortBy === 'quantity_sold' && $sortDirection === 'asc')]); ?>" fill="currentColor" d="M11 7h-6l3-4z"></path>
                                <path class="<?php echo \Illuminate\Support\Arr::toCssClasses(['opacity-100' => $sortBy === 'quantity_sold' && $sortDirection === 'desc', 'opacity-30' => !($sortBy === 'quantity_sold' && $sortDirection === 'desc')]); ?>" fill="currentColor" d="M5 9h6l-3 4z"></path>
                            </svg>
                        </button>
                    </th>
                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-600 uppercase dark:text-gray-300">
                        <button wire:click="sortByToggle('price')" class="flex items-center gap-1 hover:text-gray-900 dark:hover:text-white transition-colors mx-auto <?php echo e($sortBy === 'price' ? 'font-bold text-gray-900 dark:text-white' : ''); ?>">
                            <?php echo app('translator')->get('modules.report.sellingPrice'); ?>
                            <svg width="24" height="24" class="w-4 h-4" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path class="<?php echo \Illuminate\Support\Arr::toCssClasses(['opacity-100' => $sortBy === 'price' && $sortDirection === 'asc', 'opacity-30' => !($sortBy === 'price' && $sortDirection === 'asc')]); ?>" fill="currentColor" d="M11 7h-6l3-4z"></path>
                                <path class="<?php echo \Illuminate\Support\Arr::toCssClasses(['opacity-100' => $sortBy === 'price' && $sortDirection === 'desc', 'opacity-30' => !($sortBy === 'price' && $sortDirection === 'desc')]); ?>" fill="currentColor" d="M5 9h6l-3 4z"></path>
                            </svg>
                        </button>
                    </th>
                    <th class="px-4 py-3 text-xs font-medium tracking-wider ltr:text-end rtl:text-right text-gray-600 uppercase dark:text-gray-300">
                        <button wire:click="sortByToggle('total_revenue')" class="flex items-center gap-1 hover:text-gray-900 dark:hover:text-white transition-colors ltr:ml-auto rtl:mr-auto <?php echo e($sortBy === 'total_revenue' ? 'font-bold text-gray-900 dark:text-white' : ''); ?>">
                            <?php echo app('translator')->get('modules.report.totalRevenue'); ?>
                            <svg width="24" height="24" class="w-4 h-4" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path class="<?php echo \Illuminate\Support\Arr::toCssClasses(['opacity-100' => $sortBy === 'total_revenue' && $sortDirection === 'asc', 'opacity-30' => !($sortBy === 'total_revenue' && $sortDirection === 'asc')]); ?>" fill="currentColor" d="M11 7h-6l3-4z"></path>
                                <path class="<?php echo \Illuminate\Support\Arr::toCssClasses(['opacity-100' => $sortBy === 'total_revenue' && $sortDirection === 'desc', 'opacity-30' => !($sortBy === 'total_revenue' && $sortDirection === 'desc')]); ?>" fill="currentColor" d="M5 9h6l-3 4z"></path>
                            </svg>
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800">
                <?php $__empty_1 = true; $__currentLoopData = $this->menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <!--[if BLOCK]><![endif]--><?php if($item->variations_count > 0): ?>
                        <!-- For items with variations, show each variation as a separate row -->
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $item->variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-4 py-3">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        <?php echo e($item->item_name); ?> <span class="text-gray-500 dark:text-gray-400">(<?php echo e($variation->variation); ?>)</span>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-900 dark:text-white">
                                    <?php echo e($item->category->category_name ?? ''); ?>

                                </td>
                                <td class="px-4 py-3">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white text-center">
                                        <?php echo e($variation->quantity_sold); ?>

                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white text-center">
                                        <?php echo e(currency_format($variation->price, restaurant()->currency_id)); ?>

                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white text-right">
                                        <?php echo e(currency_format($variation->total_revenue, restaurant()->currency_id)); ?>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    <?php else: ?>
                        <!-- For items without variations, show a single row -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-4 py-3">
                                <div class="text-sm font-medium text-gray-900 dark:text-white">
                                    <?php echo e($item->item_name); ?>

                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm font-medium text-gray-900 dark:text-white">
                                <?php echo e($item->category->category_name ?? ''); ?>

                            </td>
                            <td class="px-4 py-3">
                                <div class="text-sm font-medium text-gray-900 dark:text-white text-center">
                                    <?php echo e($item->quantity_sold); ?>

                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="text-sm font-medium text-gray-900 dark:text-white text-center">
                                    <?php echo e(currency_format($item->price, restaurant()->currency_id)); ?>

                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="text-sm font-medium text-gray-900 dark:text-white text-right">
                                    <?php echo e(currency_format($item->total_revenue, restaurant()->currency_id)); ?>

                                </div>
                            </td>
                        </tr>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-sm text-center text-gray-500 dark:text-gray-400">
                            <?php echo app('translator')->get('messages.noItemAdded'); ?>
                        </td>
                    </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>
        <?php
        $__scriptKey = '3615696496-0';
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
<?php /**PATH C:\xampp\htdocs\script\resources\views/livewire/reports/item-report.blade.php ENDPATH**/ ?>