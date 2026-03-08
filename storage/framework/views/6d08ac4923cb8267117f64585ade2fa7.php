<?php $__env->startSection('content'); ?>

<div class="p-4 bg-white block  dark:bg-gray-800 dark:border-gray-700">
    <?php echo $__env->make('dashboard.update-message-dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php if (isset($component)) { $__componentOriginale691f3c66b4e7efe99161ec4ba911fdc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale691f3c66b4e7efe99161ec4ba911fdc = $attributes; } ?>
<?php $component = App\View\Components\CronMessage::resolve(['showModal' => false,'modal' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cron-message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\CronMessage::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale691f3c66b4e7efe99161ec4ba911fdc)): ?>
<?php $attributes = $__attributesOriginale691f3c66b4e7efe99161ec4ba911fdc; ?>
<?php unset($__attributesOriginale691f3c66b4e7efe99161ec4ba911fdc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale691f3c66b4e7efe99161ec4ba911fdc)): ?>
<?php $component = $__componentOriginale691f3c66b4e7efe99161ec4ba911fdc; ?>
<?php unset($__componentOriginale691f3c66b4e7efe99161ec4ba911fdc); ?>
<?php endif; ?>

    <?php if(smtp_setting()->mail_driver == 'smtp' && !smtp_setting()->verified): ?>
        <?php if (isset($component)) { $__componentOriginalb5e767ad160784309dfcad41e788743b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb5e767ad160784309dfcad41e788743b = $attributes; } ?>
<?php $component = App\View\Components\Alert::resolve(['type' => 'danger'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'info-circle']); ?>
            <div class="flex items-center gap-2">
                <?php echo app('translator')->get('messages.smtpError'); ?>

                <?php if (isset($component)) { $__componentOriginala6c1b2378c7a756a2b58951b1494d68f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala6c1b2378c7a756a2b58951b1494d68f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-link','data' => ['href' => ''.e(route('superadmin.superadmin-settings.index').'?tab=email').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('superadmin.superadmin-settings.index').'?tab=email').'']); ?>
                    <?php echo app('translator')->get('modules.settings.emailSettings'); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala6c1b2378c7a756a2b58951b1494d68f)): ?>
<?php $attributes = $__attributesOriginala6c1b2378c7a756a2b58951b1494d68f; ?>
<?php unset($__attributesOriginala6c1b2378c7a756a2b58951b1494d68f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6c1b2378c7a756a2b58951b1494d68f)): ?>
<?php $component = $__componentOriginala6c1b2378c7a756a2b58951b1494d68f; ?>
<?php unset($__componentOriginala6c1b2378c7a756a2b58951b1494d68f); ?>
<?php endif; ?>
            </div>
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
    <?php endif; ?>

    <div class="flex justify-between">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"><?php echo app('translator')->get('menu.dashboard'); ?></h1>

        <div class="inline-flex items-center gap-1 dark:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
            </svg>

            <?php echo e(now()->timezone(timezone())->translatedFormat('l, d M, h:i A')); ?>

        </div>
    </div>
</div>

<!-- Legacy Restaurant Count Cards - Top Section -->
<div class="grid w-full grid-cols-1 gap-4 p-4 xl:grid-cols-2">
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.restaurantCount');

$__html = app('livewire')->mount($__name, $__params, 'lw-4184101223-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.totalRestaurantCount');

$__html = app('livewire')->mount($__name, $__params, 'lw-4184101223-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.totalFreeRestaurantCount');

$__html = app('livewire')->mount($__name, $__params, 'lw-4184101223-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.totalPaidRestaurantCount');

$__html = app('livewire')->mount($__name, $__params, 'lw-4184101223-3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>

<!-- Enhanced Dashboard Grid -->
<div class="grid grid-cols-1 gap-6 p-4">

    <!-- Platform Overview Stats -->
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.superadmin-system-stats');

$__html = app('livewire')->mount($__name, $__params, 'lw-4184101223-4', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <!-- Revenue Analytics & Top Restaurants -->
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.superadmin-revenue-chart');

$__html = app('livewire')->mount($__name, $__params, 'lw-4184101223-5', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <!-- Restaurant Growth & Recent Restaurants -->
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.superadmin-restaurant-growth');

$__html = app('livewire')->mount($__name, $__params, 'lw-4184101223-6', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <!-- Recent Activity Timeline -->
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.superadmin-recent-activity');

$__html = app('livewire')->mount($__name, $__params, 'lw-4184101223-7', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\script\resources\views\dashboard\superadmin.blade.php ENDPATH**/ ?>