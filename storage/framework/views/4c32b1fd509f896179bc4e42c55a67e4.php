<div >
    <div class="p-4 bg-white block  dark:bg-gray-800 dark:border-gray-700">
        <div class="flex mb-4">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"><?php echo app('translator')->get('menu.orders'); ?> (<?php echo e($orders->count()); ?>)</h1>
            <div class="ml-auto flex items-center gap-4">
                <div class="flex items-center gap-2">
                    <?php if(pusherSettings()->is_enabled_pusher_broadcast): ?>
                        <div class="flex items-center gap-2 px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                            <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                            <?php echo app('translator')->get('app.realTime'); ?>
                        </div>
                    <?php else: ?>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" wire:model.live="pollingEnabled">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo app('translator')->get('app.autoRefresh'); ?></span>
                        </label>
                        <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['class' => 'w-32 text-sm','wire:model.live' => 'pollingInterval','disabled' => !$pollingEnabled]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-32 text-sm','wire:model.live' => 'pollingInterval','disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!$pollingEnabled)]); ?>
                            <option value="5">5 <?php echo app('translator')->get('app.seconds'); ?></option>
                            <option value="10">10 <?php echo app('translator')->get('app.seconds'); ?></option>
                            <option value="15">15 <?php echo app('translator')->get('app.seconds'); ?></option>
                            <option value="30">30 <?php echo app('translator')->get('app.seconds'); ?></option>
                            <option value="60">1 <?php echo app('translator')->get('app.minute'); ?></option>
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
                    <?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['class' => 'w-32 text-sm','wire:model.live.debounce.250ms' => 'filterOrderType']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-32 text-sm','wire:model.live.debounce.250ms' => 'filterOrderType']); ?>
                        <option value=""><?php echo app('translator')->get('modules.order.all'); ?></option>
                        <option value="dine_in"><?php echo app('translator')->get('modules.order.dine_in'); ?></option>
                        <option value="delivery"><?php echo app('translator')->get('modules.order.delivery'); ?></option>
                        <option value="pickup"><?php echo app('translator')->get('modules.order.pickup'); ?></option>
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

                    <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['class' => 'w-40 text-sm','wire:model.live.debounce.250ms' => 'filterDeliveryApp']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-40 text-sm','wire:model.live.debounce.250ms' => 'filterDeliveryApp']); ?>
                        <option value=""><?php echo app('translator')->get('modules.report.allDeliveryApps'); ?></option>
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

        <div class="items-center justify-between block sm:flex ">
            <div class="lg:flex items-center mb-4 sm:mb-0">
                <form class="ltr:sm:pr-3 rtl:sm:pl-3" action="#" method="GET">

                    <div class="lg:flex gap-2 items-center">
                        <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['id' => 'dateRangeType','class' => 'block w-fit','wire:model' => 'dateRangeType','wire:change' => 'setDateRange']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'dateRangeType','class' => 'block w-fit','wire:model' => 'dateRangeType','wire:change' => 'setDateRange']); ?>
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
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input id="datepicker-range-start" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model.change='startDate' placeholder="<?php echo app('translator')->get('app.selectStartDate'); ?>">
                                </div>
                                <span class="mx-4 text-gray-500"><?php echo app('translator')->get('app.to'); ?></span>
                                <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input id="datepicker-range-end" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model.live='endDate' placeholder="<?php echo app('translator')->get('app.selectEndDate'); ?>">
                            </div>
                        </div>
                    </div>
                </form>


                <div class="inline-flex gap-2">
                    <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['class' => 'text-sm w-full','wire:model.live.debounce.250ms' => 'filterOrders']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-sm w-full','wire:model.live.debounce.250ms' => 'filterOrders']); ?>
                        <option value=""><?php echo app('translator')->get('app.showAll'); ?> <?php echo app('translator')->get('menu.orders'); ?></option>
                        <option value="draft"><?php echo app('translator')->get('modules.order.draft'); ?> (<?php echo e($draftOrdersCount); ?>)</option>
                        <option value="kot"><?php echo app('translator')->get('modules.order.kot'); ?> (<?php echo e($kotCount); ?>)</option>
                        <option value="billed"><?php echo app('translator')->get('modules.order.billed'); ?> (<?php echo e($billedCount); ?>)</option>
                        <option value="paid"><?php echo app('translator')->get('modules.order.paid'); ?> (<?php echo e($paidOrdersCount); ?>)</option>
                        <option value="canceled"><?php echo app('translator')->get('modules.order.canceled'); ?> (<?php echo e($canceledOrdersCount); ?>)</option>
                        <option value="out_for_delivery"><?php echo app('translator')->get('modules.order.out_for_delivery'); ?> (<?php echo e($outDeliveryOrdersCount); ?>)</option>
                        <option value="payment_due"><?php echo app('translator')->get('modules.order.payment_due'); ?> (<?php echo e($paymentDueCount); ?>)</option>
                        <option value="delivered"><?php echo app('translator')->get('modules.order.delivered'); ?> (<?php echo e($deliveredOrdersCount); ?>)</option>
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

                    <?php if(!user()->hasRole('Waiter_' . user()->restaurant_id)): ?>
                    <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['class' => 'text-sm w-full','wire:model.live.debounce.250ms' => 'filterWaiter']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-sm w-full','wire:model.live.debounce.250ms' => 'filterWaiter']); ?>
                        <option value=""><?php echo app('translator')->get('app.showAll'); ?> <?php echo app('translator')->get('modules.order.waiter'); ?></option>
                        <?php $__currentLoopData = $waiters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $waiter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($waiter->id); ?>"><?php echo e($waiter->name); ?></option>
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
                    <?php endif; ?>

                </div>

            </div>

            <?php
                $orderStats = getRestaurantOrderStats(branch()->id);
                $canCreateOrder = user_can('Create Order');
                $orderLimitExceeded = $canCreateOrder && $orderStats && !$orderStats['unlimited'] && $orderStats['current_count'] >= $orderStats['order_limit'];
            ?>
            <?php if($canCreateOrder && $orderStats && ($orderStats['unlimited'] || $orderStats['current_count'] < $orderStats['order_limit'])): ?>
                <?php if (isset($component)) { $__componentOriginalecbfaf65020c31547e71f42b3a8afb5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-link','data' => ['wire:navigate' => true,'href' => ''.e(route('pos.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:navigate' => true,'href' => ''.e(route('pos.index')).'']); ?><?php echo app('translator')->get('modules.order.newOrder'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f)): ?>
<?php $attributes = $__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f; ?>
<?php unset($__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalecbfaf65020c31547e71f42b3a8afb5f)): ?>
<?php $component = $__componentOriginalecbfaf65020c31547e71f42b3a8afb5f; ?>
<?php unset($__componentOriginalecbfaf65020c31547e71f42b3a8afb5f); ?>
<?php endif; ?>
            <?php endif; ?>

           

        </div>
        <?php if($orderLimitExceeded): ?>
            <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-lg dark:bg-red-900/20 dark:border-red-800">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-red-600 dark:text-red-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-red-800 dark:text-red-300">
                            <?php echo app('translator')->get('modules.order.orderLimitExceeded'); ?>
                        </h3>
                        <p class="mt-1 text-sm text-red-700 dark:text-red-400">
                            <?php echo app('translator')->get('modules.order.orderLimitExceededMessage', [
                                'current' => number_format($orderStats['current_count']),
                                'limit' => number_format($orderStats['order_limit'])
                            ]); ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="flex flex-col my-4 px-4">

        <!-- Card Section -->
        <div class="space-y-4">


            <div class="grid sm:grid-cols-3 2xl:grid-cols-4 gap-3 sm:gap-4" wire:key="orders-grid" wire:loading.class.delay="opacity-50">
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginal2dbe8d657e3ba9219c30c398dcf419e3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2dbe8d657e3ba9219c30c398dcf419e3 = $attributes; } ?>
<?php $component = App\View\Components\Order\OrderCard::resolve(['order' => $item] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('order.order-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Order\OrderCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:key' => 'order-'.e($item->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2dbe8d657e3ba9219c30c398dcf419e3)): ?>
<?php $attributes = $__attributesOriginal2dbe8d657e3ba9219c30c398dcf419e3; ?>
<?php unset($__attributesOriginal2dbe8d657e3ba9219c30c398dcf419e3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2dbe8d657e3ba9219c30c398dcf419e3)): ?>
<?php $component = $__componentOriginal2dbe8d657e3ba9219c30c398dcf419e3; ?>
<?php unset($__componentOriginal2dbe8d657e3ba9219c30c398dcf419e3); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php if($hasMore): ?>
                <div
                    class="py-6 text-center text-gray-500 dark:text-gray-400"
                    x-data
                    x-intersect="$wire.call('loadMore')"
                    wire:key="orders-load-more"
                >
                    <div wire:loading wire:target="loadMore" class="flex items-center justify-center gap-2 text-sm">
                        <svg class="w-4 h-4 animate-spin text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4l3.5-3.5L12 0v4a8 8 0 100 16v-4l-3.5 3.5L12 24v-4a8 8 0 01-8-8z"></path>
                        </svg>
                    </div>
                    <div wire:loading.remove wire:target="loadMore" class="text-sm text-gray-400 dark:text-gray-500">
                        <?php echo app('translator')->get('app.loadMore'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <!-- End Card Section -->


    </div>

    
    <?php if($playSound): ?>
    <script>    
        new Audio("<?php echo e(asset('sound/new_order.wav')); ?>").play();
    </script>
    <?php endif; ?>

        <?php
        $__scriptKey = '4086838232-0';
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

        // Handle polling
        let pollingInterval = null;
        let pusherChannel = null;

        function startPolling() {
            console.log('🔄 Starting polling for orders...');
            if (pollingInterval) {
                console.log('🔄 Clearing existing polling interval');
                clearInterval(pollingInterval);
            }
            const interval = $wire.get('pollingInterval') * 1000;
            console.log('📊 Orders polling settings:', {
                interval: interval,
                intervalSeconds: $wire.get('pollingInterval'),
                pollingEnabled: $wire.get('pollingEnabled')
            });
            pollingInterval = setInterval(() => {
                if ($wire.get('pollingEnabled')) {
                    console.log('🔄 Orders polling: Refreshing data...');
                    $wire.$refresh();
                } else {
                    console.log('⏸️ Orders polling: Disabled, stopping...');
                    stopPolling();
                }
            }, interval);
            console.log('✅ Orders polling started');
        }

        function stopPolling() {
            console.log('🛑 Stopping polling for orders...');
            if (pollingInterval) {
                clearInterval(pollingInterval);
                pollingInterval = null;
                console.log('✅ Orders polling stopped');
            } else {
                console.log('⚠️ Orders polling was already stopped');
            }
        }

        function initializePusher() {
            try {
                console.log('🚀 Initializing Pusher for orders...');

                if (typeof window.PUSHER === 'undefined') {
                    console.error('❌ PUSHER is not defined for orders');
                    return;
                }

                console.log('📊 Pusher orders connection state:', window.PUSHER.connection.state);
                console.log('🔗 Pusher orders connection options:', {
                    encrypted: window.PUSHER.connection.options.encrypted,
                    cluster: window.PUSHER.connection.options.cluster,
                    key: window.PUSHER.connection.options.key ? '***' + window.PUSHER.connection.options.key.slice(-4) : 'undefined'
                });

                // Add comprehensive connection event listeners
                window.PUSHER.connection.bind('connected', () => {
                    console.log('✅ Pusher orders connected successfully!');
                    console.log('📊 Pusher orders connection ID:', window.PUSHER.connection.connection_id);
                    console.log('🔗 Pusher orders socket ID:', window.PUSHER.connection.socket_id);
                });

                window.PUSHER.connection.bind('disconnected', () => {
                    console.log('❌ Pusher orders disconnected!');
                });



                window.PUSHER.connection.bind('connecting', () => {
                    console.log('🔄 Pusher orders connecting...');
                });

                window.PUSHER.connection.bind('reconnecting', () => {
                    console.log('🔄 Pusher orders reconnecting...');
                });

                // Listen for Livewire events for new orders (works even without Pusher)
                Livewire.on('newOrderCreated', (data) => {
                    console.log('✅ Livewire event received for new order!', data);
                    // Play sound immediately for new order
                    new Audio("<?php echo e(asset('sound/new_order.wav')); ?>").play();
                    // Refresh the component to show new order
                    $wire.call('refreshNewOrders');
                });

                window.PUSHER.connection.bind('reconnected', () => {
                    console.log('✅ Pusher orders reconnected!');
                    console.log('📊 Pusher orders reconnection details:', {
                        socketId: window.PUSHER.connection.socket_id,
                        connectionId: window.PUSHER.connection.connection_id,
                        state: window.PUSHER.connection.state
                    });
                });

                // Add connection retry logic
                let connectionRetryCount = 0;
                const maxRetries = 3;

                    window.PUSHER.connection.bind('error', (error) => {
                    connectionRetryCount++;
                    console.error(`❌ Pusher orders connection error (attempt ${connectionRetryCount}/${maxRetries}):`, error);
                    console.error('❌ Pusher orders error details:', {
                        type: error.type,
                        error: error.error,
                        data: error.data,
                        message: error.message,
                        code: error.code
                    });

                    // Log additional debugging info
                    console.error('🔍 Pusher orders debugging info:', {
                        connectionState: window.PUSHER.connection.state,
                        socketId: window.PUSHER.connection.socket_id,
                        connectionId: window.PUSHER.connection.connection_id,
                        options: window.PUSHER.connection.options,
                        url: window.PUSHER.connection.options.wsHost || 'default',
                        encrypted: window.PUSHER.connection.options.encrypted,
                        cluster: window.PUSHER.connection.options.cluster
                    });

                    // Check if it's a WebSocket error
                    if (error.type === 'WebSocketError') {
                        console.error('🌐 WebSocket specific error:', {
                            wsError: error.error,
                            wsErrorType: error.error?.type,
                            wsErrorData: error.error?.data
                        });

                        // Check for quota exceeded error
                        if (error.error?.data?.code === 4004) {
                            console.error('❌ PUSHER QUOTA EXCEEDED: Account has exceeded its usage limits');
                            console.error('💡 Solutions:');
                            console.error('   1. Upgrade your Pusher plan');
                            console.error('   2. Reduce connection count');
                            console.error('   3. Switch to polling mode temporarily');

                            // Automatically fall back to polling after quota error
                            if (connectionRetryCount >= 2) {
                                console.error('🔄 Falling back to polling due to quota exceeded');
                                stopPusher();
                                if ($wire.get('pollingEnabled')) {
                                    startPolling();
                                }
                            }
                        }
                    }

                    if (connectionRetryCount >= maxRetries) {
                        console.error('❌ Pusher orders: Max retry attempts reached, falling back to polling');
                        // Fall back to polling
                        stopPusher();
                        if ($wire.get('pollingEnabled')) {
                            startPolling();
                        }
                    }
                });

                window.PUSHER.connection.bind('connected', () => {
                    connectionRetryCount = 0; // Reset retry count on successful connection
                    console.log('✅ Pusher orders connected successfully!');
                    console.log('📊 Pusher orders connection ID:', window.PUSHER.connection.connection_id);
                    console.log('🔗 Pusher orders socket ID:', window.PUSHER.connection.socket_id);

                    // Log connection for monitoring (optional - remove if not needed)
                    try {
                        fetch('/api/log-pusher-connection', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                socket_id: window.PUSHER.connection.socket_id,
                                connection_id: window.PUSHER.connection.connection_id,
                                component: 'orders',
                                timestamp: new Date().toISOString()
                            })
                        }).catch(err => console.log('📊 Connection logging failed (optional):', err));
                    } catch (err) {
                        console.log('📊 Connection logging not available');
                    }
                });

                // Subscribe to orders channel
                console.log('📡 Subscribing to orders channel...');
                pusherChannel = window.PUSHER.subscribe('orders');

                // Add comprehensive subscription event listeners
                pusherChannel.bind('pusher:subscription_succeeded', () => {
                    console.log('✅ Pusher orders: Successfully subscribed to orders channel!');
                    console.log('📊 Pusher orders channel state:', {
                        subscribed: pusherChannel.subscribed,
                        subscriptionPending: pusherChannel.subscriptionPending,
                        name: pusherChannel.name
                    });
                });

                pusherChannel.bind('pusher:subscription_error', (error) => {
                    console.error('❌ Pusher orders subscription error:', error);
                    console.error('❌ Pusher orders subscription error details:', {
                        error: error.error,
                        type: error.type,
                        data: error.data
                    });
                });

                // Bind to order events
                pusherChannel.bind('order.updated', function(data) {
                    console.log('🎉 Pusher orders: Order updated via Pusher:', data);
                    console.log('📊 Pusher orders: Order update details:', {
                        order_id: data.order_id,
                        timestamp: new Date().toISOString(),
                        event_type: 'order.updated'
                    });
                    $wire.$refresh();
                });

                pusherChannel.bind('order.created', function(data) {
                    console.log('🎉 Pusher orders: New order created via Pusher:', data);
                    console.log('📊 Pusher orders: Order creation details:', {
                        order_id: data.order_id,
                        order_number: data.order_number,
                        timestamp: new Date().toISOString(),
                        event_type: 'order.created'
                    });
                    // Play sound for new order
                    new Audio("<?php echo e(asset('sound/new_order.wav')); ?>").play();
                    // Trigger handleNewOrder to show popup
                    $wire.call('handleNewOrder', data);
                });

                // Debug: show all event bindings on the channel
                if (pusherChannel && typeof pusherChannel.eventNames === 'function') {
                    console.log('📋 Pusher orders channel event bindings:', pusherChannel.eventNames());
                }

                // Check if the channel is actually subscribed
                if (pusherChannel && typeof pusherChannel.subscriptionPending !== 'undefined') {
                    if (pusherChannel.subscriptionPending) {
                        console.log('⏳ Pusher orders subscription is pending...');
                    } else if (pusherChannel.subscribed) {
                        console.log('✅ Pusher orders channel is subscribed.');
                    } else {
                        console.log('❌ Pusher orders channel is not subscribed yet.');
                    }
                }

                // Log channel properties
                console.log('📊 Pusher orders channel properties:', {
                    name: pusherChannel.name,
                    subscribed: pusherChannel.subscribed,
                    subscriptionPending: pusherChannel.subscriptionPending,
                    eventNames: typeof pusherChannel.eventNames === 'function' ? pusherChannel.eventNames() : 'N/A'
                });

                // Log connection details
                console.log('📊 Pusher orders connection details:', {
                    state: window.PUSHER.connection.state,
                    socket_id: window.PUSHER.connection.socket_id,
                    connection_id: window.PUSHER.connection.connection_id,
                    options: {
                        encrypted: window.PUSHER.connection.options.encrypted,
                        cluster: window.PUSHER.connection.options.cluster,
                        key: window.PUSHER.connection.options.key ? '***' + window.PUSHER.connection.options.key.slice(-4) : 'undefined'
                    }
                });

                console.log('✅ Pusher orders initialized successfully');

            } catch (error) {
                console.error('❌ Pusher orders initialization failed:', error);
                console.error('❌ Pusher orders error stack:', error.stack);
            }
        }

        function stopPusher() {
            console.log('🛑 Stopping Pusher for orders...');
            if (pusherChannel) {
                console.log('📊 Pusher orders channel state before unsubscribe:', {
                    name: pusherChannel.name,
                    subscribed: pusherChannel.subscribed,
                    subscriptionPending: pusherChannel.subscriptionPending
                });
                pusherChannel.unsubscribe();
                console.log('✅ Pusher orders channel unsubscribed');
                pusherChannel = null;
            } else {
                console.log('⚠️ Pusher orders channel was already null');
            }

            // Clean up any event listeners
            if (window.PUSHER && window.PUSHER.connection) {
                try {
                    window.PUSHER.connection.unbind('connected');
                    window.PUSHER.connection.unbind('disconnected');
                    window.PUSHER.connection.unbind('error');
                    window.PUSHER.connection.unbind('connecting');
                    window.PUSHER.connection.unbind('reconnecting');
                    window.PUSHER.connection.unbind('reconnected');
                    console.log('🧹 Pusher orders connection event listeners cleaned up');
                } catch (err) {
                    console.log('⚠️ Error cleaning up Pusher event listeners:', err);
                }
            }
        }

                function testPusherConnection() {
            console.log('🧪 Testing Pusher connection...');
            console.log('📊 Pusher settings:', {
                defined: typeof window.PUSHER !== 'undefined',
                settingsDefined: typeof window.PUSHER_SETTINGS !== 'undefined',
                broadcastEnabled: typeof window.PUSHER_SETTINGS !== 'undefined' ? window.PUSHER_SETTINGS.is_enabled_pusher_broadcast : 'undefined'
            });

            if (typeof window.PUSHER_SETTINGS !== 'undefined') {
                console.log('📊 PUSHER_SETTINGS details:', {
                    pusher_key: window.PUSHER_SETTINGS.pusher_key,
                    pusher_cluster: window.PUSHER_SETTINGS.pusher_cluster,
                    pusher_app_id: window.PUSHER_SETTINGS.pusher_app_id,
                    is_enabled_pusher_broadcast: window.PUSHER_SETTINGS.is_enabled_pusher_broadcast
                });
            }

            if (typeof window.PUSHER !== 'undefined') {
                console.log('📊 Pusher connection state:', window.PUSHER.connection.state);
                console.log('📊 Pusher connection options:', window.PUSHER.connection.options);
            }
        }

        function refreshPusherSettings() {
            console.log('🔄 Refreshing Pusher settings...');
            // Clear any cached settings and reload
            if (typeof window.PUSHER_SETTINGS !== 'undefined') {
                delete window.PUSHER_SETTINGS;
            }
            if (typeof window.PUSHER !== 'undefined') {
                delete window.PUSHER;
            }
            console.log('✅ Pusher settings cleared, reload page to refresh');
        }

                function disablePusherTemporarily() {
            console.log('🛑 Temporarily disabling Pusher due to quota issues...');
            // Send request to disable Pusher temporarily
            fetch('/api/disable-pusher-temporarily', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then(() => {
                console.log('✅ Pusher disabled, switching to polling...');
                stopPusher();
                if ($wire.get('pollingEnabled')) {
                    startPolling();
                }
            }).catch(err => {
                console.log('❌ Failed to disable Pusher:', err);
            });
        }

        function forceDisconnectAllConnections() {
            console.log('🛑 Force disconnecting all Pusher connections...');

            // Disconnect global Pusher
            if (window.GLOBAL_PUSHER) {
                window.GLOBAL_PUSHER.disconnect();
                console.log('✅ Global Pusher disconnected');
            }

            // Disconnect local Pusher
            if (window.PUSHER) {
                window.PUSHER.disconnect();
                console.log('✅ Local Pusher disconnected');
            }

            // Clear all references
            window.GLOBAL_PUSHER = null;
            window.PUSHER = null;
            pusherChannel = null;

            console.log('🧹 All Pusher connections cleared');
            console.log('💡 Reload the page to reconnect with fresh connections');
        }

                // Listen for Livewire events on document level for new order notifications
                document.addEventListener('livewire:init', () => {
                    console.log('🔧 Setting up new order event listeners...');

                    Livewire.on('newOrderCreated', (data) => {
                        console.log('✅ Livewire event received for new order!', data);
                        // Play sound immediately for new order
                        new Audio("<?php echo e(asset('sound/new_order.wav')); ?>").play();
                        // This ensures the event is caught even if the component listener fails
                    });

                    console.log('🔧 Order component event listeners ready!');
                });

                // Initialize real-time updates
                document.addEventListener('livewire:initialized', () => {
            console.log('🚀 Livewire orders component initialized');
            console.log('📊 Pusher settings check:', {
                pusherSettingsDefined: typeof window.PUSHER_SETTINGS !== 'undefined',
                pusherBroadcastEnabled: typeof window.PUSHER_SETTINGS !== 'undefined' ? window.PUSHER_SETTINGS.is_enabled_pusher_broadcast : 'undefined'
            });

            // Test Pusher connection for debugging
            testPusherConnection();

            // Add manual refresh option for debugging
            window.refreshPusherSettings = refreshPusherSettings;
            window.disablePusherTemporarily = disablePusherTemporarily;
            window.forceDisconnectAllConnections = forceDisconnectAllConnections;
            console.log('🛠️ Debug: Use refreshPusherSettings() in console to clear cached settings');
            console.log('🛠️ Debug: Use disablePusherTemporarily() in console to disable Pusher due to quota issues');
            console.log('🛠️ Debug: Use forceDisconnectAllConnections() in console to force disconnect all connections');

            if (typeof window.PUSHER_SETTINGS !== 'undefined' && window.PUSHER_SETTINGS.is_enabled_pusher_broadcast) {
                console.log('✅ Pusher orders: Using Pusher for real-time updates');
                initializePusher();
            } else {
                console.log('📡 Pusher orders: Using polling for real-time updates');
                console.log('📊 Pusher orders polling settings:', {
                    pollingEnabled: $wire.get('pollingEnabled'),
                    pollingInterval: $wire.get('pollingInterval')
                });
                if ($wire.get('pollingEnabled')) {
                    startPolling();
                }
            }
        });

        // Watch for changes
        $wire.watch('pollingEnabled', (value) => {
            console.log('👀 Orders pollingEnabled changed:', value);
            if (typeof window.PUSHER_SETTINGS !== 'undefined' && !window.PUSHER_SETTINGS.is_enabled_pusher_broadcast) {
                if (value) {
                    console.log('🔄 Orders: Starting polling due to pollingEnabled change');
                    startPolling();
                } else {
                    console.log('🛑 Orders: Stopping polling due to pollingEnabled change');
                    stopPolling();
                }
            } else {
                console.log('📡 Orders: Pusher is enabled, ignoring polling changes');
            }
        });

        $wire.watch('pollingInterval', (value) => {
            console.log('👀 Orders pollingInterval changed:', value);
            if (typeof window.PUSHER_SETTINGS !== 'undefined' && !window.PUSHER_SETTINGS.is_enabled_pusher_broadcast && $wire.get('pollingEnabled')) {
                console.log('🔄 Orders: Restarting polling due to interval change');
                startPolling();
            } else {
                console.log('📡 Orders: Pusher is enabled or polling disabled, ignoring interval change');
            }
        });

        // Cleanup on component destroy
        document.addEventListener('livewire:initialized', () => {
            return () => {
                stopPolling();
                stopPusher();
            };
        });
    </script>
        <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>

</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\order\orders.blade.php ENDPATH**/ ?>