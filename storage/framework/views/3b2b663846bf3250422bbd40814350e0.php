<!--[if BLOCK]><![endif]--><?php if(in_array('Cash Register', restaurant_modules()) && in_array('cashregister', custom_module_plugins()) &&
        (user_can('View Cash Register Reports') || user_can('Manage Cash Register Settings') || user_can('Open Cash Register') ||
        user_can('Approve Cash Register') || user_can('Manage Cash Denominations'))): ?>
    <?php if (isset($component)) { $__componentOriginaleeb5c1102f81a48057b5d734c9cff39b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleeb5c1102f81a48057b5d734c9cff39b = $attributes; } ?>
<?php $component = App\View\Components\SidebarDropdownMenu::resolve(['name' => __('cashregister::app.cashRegister'),'isAddon' => 'true','icon' => 'cash','customIcon' => '<svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"><path d="M21 18L20.1703 11.7771C20.0391 10.7932 19.9735 10.3012 19.7392 9.93082C19.5327 9.60444 19.2362 9.34481 18.8854 9.1833C18.4873 9 17.991 9 16.9983 9H7.00165C6.00904 9 5.51274 9 5.11461 9.1833C4.76381 9.34481 4.46727 9.60444 4.26081 9.93082C4.0265 10.3012 3.96091 10.7932 3.82972 11.7771L3 18M21 18H3M21 18V19.4C21 19.9601 21 20.2401 20.891 20.454C20.7951 20.6422 20.6422 20.7951 20.454 20.891C20.2401 21 19.9601 21 19.4 21H4.6C4.03995 21 3.75992 21 3.54601 20.891C3.35785 20.7951 3.20487 20.6422 3.10899 20.454C3 20.2401 3 19.9601 3 19.4V18M7.5 12V12.01M10.5 12V12.01M9 15V15.01M12 15V15.01M15 15V15.01M13.5 12V12.01M16.5 12V12.01M9 9V6M5.8 6H12.2C12.48 6 12.62 6 12.727 5.9455C12.8211 5.89757 12.8976 5.82108 12.9455 5.727C13 5.62004 13 5.48003 13 5.2V3.8C13 3.51997 13 3.37996 12.9455 3.273C12.8976 3.17892 12.8211 3.10243 12.727 3.0545C12.62 3 12.48 3 12.2 3H5.8C5.51997 3 5.37996 3 5.273 3.0545C5.17892 3.10243 5.10243 3.17892 5.0545 3.273C5 3.37996 5 3.51997 5 3.8V5.2C5 5.48003 5 5.62004 5.0545 5.727C5.10243 5.82108 5.17892 5.89757 5.273 5.9455C5.37996 6 5.51997 6 5.8 6Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>','active' => request()->routeIs(['cashregister.*'])] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar-dropdown-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SidebarDropdownMenu::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('View Cash Register Reports')): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', [
                'name' => __('cashregister::app.registerDashboard'),
                'link' => route('cashregister.dashboard'),
                'active' => request()->routeIs('cashregister.dashboard'),
            ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2009579222-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['Manage Cash Register Settings','Open Cash Register'])): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', [
                'name' => __('cashregister::app.cashRegister'),
                'link' => route('cashregister.cashier'),
                'active' => request()->routeIs('cashregister.cashier'),
            ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2009579222-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?>

        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', [
            'name' => __('menu.reports'),
            'link' => route('cashregister.reports'),
            'active' => request()->routeIs('cashregister.reports'),
        ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2009579222-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Approve Cash Register')): ?>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', [
            'name' => __('cashregister::app.approvals'),
            'link' => route('cashregister.approvals'),
            'active' => request()->routeIs('cashregister.approvals'),
        ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2009579222-3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Cash Denominations')): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', [
                'name' => __('cashregister::app.denominations'),
                'link' => route('cashregister.denominations.index'),
                'active' => request()->routeIs('cashregister.denominations.*'),
            ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2009579222-4', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Cash Register Settings')): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', [
                'name' => __('cashregister::app.registerSettings'),
                'link' => route('cashregister.settings'),
                'active' => request()->routeIs('cashregister.settings'),
            ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2009579222-5', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleeb5c1102f81a48057b5d734c9cff39b)): ?>
<?php $attributes = $__attributesOriginaleeb5c1102f81a48057b5d734c9cff39b; ?>
<?php unset($__attributesOriginaleeb5c1102f81a48057b5d734c9cff39b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleeb5c1102f81a48057b5d734c9cff39b)): ?>
<?php $component = $__componentOriginaleeb5c1102f81a48057b5d734c9cff39b; ?>
<?php unset($__componentOriginaleeb5c1102f81a48057b5d734c9cff39b); ?>
<?php endif; ?>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->


<?php /**PATH C:\xampp\htdocs\script\Modules/CashRegister\Resources/views/sections/sidebar.blade.php ENDPATH**/ ?>