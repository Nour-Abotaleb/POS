<div>
    <aside id="sidebar"
        class="fixed top-0 ltr:left-0 rtl:right-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width menu-collapsed:hidden"
        aria-label="Sidebar">
        <div class="relative flex flex-col flex-1 min-h-0 pt-0 bg-gray-50 ltr:border-r rtl:border-l border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto mb-16 [&::-webkit-scrollbar]:w-1.5
                [&::-webkit-scrollbar-track]:rounded-xl
                [&::-webkit-scrollbar-thumb]:rounded-xl
                [&::-webkit-scrollbar-track]:bg-gray-300
                [&::-webkit-scrollbar-thumb]:bg-gray-400
                hover:[&::-webkit-scrollbar-thumb]:bg-gray-500
                dark:[&::-webkit-scrollbar-track]:bg-gray-700
                dark:[&::-webkit-scrollbar-thumb]:bg-gray-500
                dark:hover:[&::-webkit-scrollbar-thumb]:bg-gray-400">
                <div class="flex-1 px-3 space-y-1 bg-gray-50 divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

                    <!--[if BLOCK]><![endif]--><?php if(user()->hasRole('Admin_'.user()->restaurant_id)): ?>
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('forms.change-branch');

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    <?php else: ?>
                        <div class="text-sm text-gray-500 dark:text-gray-400 py-2 px-3 font-semibold flex items-center justify-between">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            </svg>

                            <?php echo e(branch()->name); ?>

                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <ul class="py-2 space-y-2">

                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-menu-item', ['name' => __('menu.dashboard'), 'icon' => 'dashboard', 'link' => route('dashboard'), 'active' => request()->routeIs('dashboard')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

                        <!--[if BLOCK]><![endif]--><?php if($this->hasModule('Menu') || $this->hasModule('Menu Item') || $this->hasModule('Item Category')): ?>
                            <!--[if BLOCK]><![endif]--><?php if(user_can('Show Menu') || user_can('Show Menu Item') || user_can('Show Item Category')): ?>
                                <?php if (isset($component)) { $__componentOriginaleeb5c1102f81a48057b5d734c9cff39b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleeb5c1102f81a48057b5d734c9cff39b = $attributes; } ?>
<?php $component = App\View\Components\SidebarDropdownMenu::resolve(['name' => __("menu.menu"),'icon' => 'menu','active' => request()->routeIs(["menus.*", "menu-items.*", "item-categories.*", "item-modifiers.*", "modifier-groups.*"])] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar-dropdown-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SidebarDropdownMenu::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <!--[if BLOCK]><![endif]--><?php if($this->hasModule('Menu')): ?>
                                        <!--[if BLOCK]><![endif]--><?php if(user_can('Show Menu')): ?>
                                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.menus'), 'link' => route('menus.index'), 'active' => request()->routeIs('menus.index')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                    <!--[if BLOCK]><![endif]--><?php if($this->hasModule('Menu Item')): ?>
                                        <!--[if BLOCK]><![endif]--><?php if(user_can('Show Menu Item')): ?>
                                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.menuItem'), 'link' => route('menu-items.index'), 'active' => request()->routeIs(['menu-items.index', 'menu-items.bulk-import', 'menu-items.entities.sort', 'menu-items.create', 'menu-items.edit'])]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                    <!--[if BLOCK]><![endif]--><?php if($this->hasModule('Item Category')): ?>
                                        <!--[if BLOCK]><![endif]--><?php if(user_can('Show Item Category')): ?>
                                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.itemCategories'), 'link' => route('item-categories.index'), 'active' => request()->routeIs('item-categories.index')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-4', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                    <!--[if BLOCK]><![endif]--><?php if($this->hasModule('Menu Item')): ?>
                                        <!--[if BLOCK]><![endif]--><?php if(user_can('Show Menu Item')): ?>
                                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.modifierGroups'), 'link' => route('modifier-groups.index'), 'active' => request()->routeIs('modifier-groups.index', 'modifier-groups.create', 'modifier-groups.edit')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-5', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.itemModifiers'), 'link' => route('item-modifiers.index'), 'active' => request()->routeIs('item-modifiers.index')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-6', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php if($this->hasModule('Area') || $this->hasModule('Table')): ?>
                            <!--[if BLOCK]><![endif]--><?php if(user_can('Show Area') || user_can('Show Table')): ?>
                                <?php if (isset($component)) { $__componentOriginaleeb5c1102f81a48057b5d734c9cff39b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleeb5c1102f81a48057b5d734c9cff39b = $attributes; } ?>
<?php $component = App\View\Components\SidebarDropdownMenu::resolve(['name' => __("menu.tables"),'icon' => 'table','active' => request()->routeIs(["areas.*", "tables.*", "qrcodes.index"])] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar-dropdown-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SidebarDropdownMenu::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if($this->hasModule('Area')): ?>
                                        <!--[if BLOCK]><![endif]--><?php if(user_can('Show Area')): ?>
                                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.areas'), 'link' => route('areas.index'), 'active' => request()->routeIs('areas.index')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-7', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                    <!--[if BLOCK]><![endif]--><?php if($this->hasModule('Table')): ?>
                                        <!--[if BLOCK]><![endif]--><?php if(user_can('Show Table')): ?>
                                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.tables'), 'link' => route('tables.index'), 'active' => request()->routeIs('tables.index')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-8', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.qrCodes'), 'link' => route('qrcodes.index'), 'active' => request()->routeIs('qrcodes.index')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-9', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php if($this->hasModule('Waiter Request') && user_can('Manage Waiter Request')): ?>
                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-menu-item', ['name' => __('menu.waiterRequest'), 'icon' => 'waiterRequest', 'link' => route('waiter-requests.index'), 'active' => request()->routeIs('waiter-requests.*')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-10', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php if($this->hasModule('Reservation') && user_can('Show Reservation')): ?>
                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-menu-item', ['name' => __('menu.reservations'), 'icon' => 'reservations', 'link' => route('reservations.index'), 'active' => request()->routeIs('reservations.index')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-11', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php if($this->hasModule('Order') && user_can('Create Order')): ?>
                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-menu-item', ['name' => __('menu.pos'), 'icon' => 'pos', 'link' => route('pos.index'), 'active' => request()->routeIs('pos.*')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-12', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php if($this->hasModule('Kitchen') && in_array('kitchen', custom_module_plugins())): ?>
                            <?php if($this->hasModule('Order') && user_can('Show Order')): ?>
                                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-menu-item', ['name' => __('menu.orders'), 'icon' => 'orders', 'link' => route('orders.index'), 'active' => request()->routeIs('orders.*')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-13', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php else: ?>
                            <?php if($this->hasModule('Order') || $this->hasModule('KOT')): ?>
                                <!--[if BLOCK]><![endif]--><?php if(user_can('Show Order') || user_can('Manage KOT')): ?>
                                    <?php if (isset($component)) { $__componentOriginaleeb5c1102f81a48057b5d734c9cff39b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleeb5c1102f81a48057b5d734c9cff39b = $attributes; } ?>
<?php $component = App\View\Components\SidebarDropdownMenu::resolve(['name' => __("menu.orders"),'icon' => 'orders','active' => request()->routeIs(["orders.*", "kots.*"])] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar-dropdown-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SidebarDropdownMenu::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <!--[if BLOCK]><![endif]--><?php if($this->hasModule('KOT')): ?>
                                            <!--[if BLOCK]><![endif]--><?php if(user_can('Manage KOT')): ?>
                                                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.kot'), 'link' => route('kots.index'), 'active' => request()->routeIs('kots.*')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-14', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                        <!--[if BLOCK]><![endif]--><?php if($this->hasModule('Order')): ?>
                                            <?php if(user_can('Show Order')): ?>
                                                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.orders'), 'link' => route('orders.index'), 'active' => request()->routeIs('orders.*')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-15', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php if($this->hasModule('Customer')): ?>
                            <!--[if BLOCK]><![endif]--><?php if(user_can('Show Customer')): ?>
                                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-menu-item', ['name' => __('menu.customers'), 'icon' => 'customers', 'link' => route('customers.index'), 'active' => request()->routeIs('customers.index')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-16', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php if($this->hasModule('Staff')): ?>
                            <!--[if BLOCK]><![endif]--><?php if(user_can('Show Staff Member')): ?>
                                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-menu-item', ['name' => __('menu.staff'), 'icon' => 'staff', 'link' => route('staff.index'), 'active' => request()->routeIs('staff.index')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-17', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php if($this->hasModule('Delivery Executive')): ?>
                            <!--[if BLOCK]><![endif]--><?php if(user_can('Show Delivery Executive')): ?>
                                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-menu-item', ['name' => __('menu.deliveryExecutive'), 'icon' => 'delivery', 'link' => route('delivery-executives.index'), 'active' => request()->routeIs('delivery-executives.index')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-18', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php if($this->hasModule('Expense') && user_can('Show Expense')): ?>
                            <?php if (isset($component)) { $__componentOriginaleeb5c1102f81a48057b5d734c9cff39b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleeb5c1102f81a48057b5d734c9cff39b = $attributes; } ?>
<?php $component = App\View\Components\SidebarDropdownMenu::resolve(['name' => __("menu.expenses"),'icon' => 'expenses','active' => request()->routeIs(["payments.expenses", "payments.expenseCategory"])] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar-dropdown-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SidebarDropdownMenu::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.expenses'), 'link' => route('payments.expenses'), 'active' => request()->routeIs('payments.expenses')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-19', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.expensesCategory'), 'link' => route('payments.expenseCategory'), 'active' => request()->routeIs('payments.expenseCategory')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-20', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
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

                        <!--[if BLOCK]><![endif]--><?php if($this->hasModule('Payment')): ?>
                            <!--[if BLOCK]><![endif]--><?php if(user_can('Show Payments')): ?>
                                <?php if (isset($component)) { $__componentOriginaleeb5c1102f81a48057b5d734c9cff39b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleeb5c1102f81a48057b5d734c9cff39b = $attributes; } ?>
<?php $component = App\View\Components\SidebarDropdownMenu::resolve(['name' => __("menu.payments"),'icon' => 'payments','active' => request()->routeIs(["payments.index", "payments.due"])] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar-dropdown-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SidebarDropdownMenu::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.payments'), 'link' => route('payments.index'), 'active' => request()->routeIs('payments.index')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-21', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.duePayments'), 'link' => route('payments.due'), 'active' => request()->routeIs('payments.due')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-22', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
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
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <!--[if BLOCK]><![endif]--><?php if($this->hasModule('Report')): ?>
                            <!--[if BLOCK]><![endif]--><?php if(user_can('Show Reports')): ?>
                                <?php if (isset($component)) { $__componentOriginaleeb5c1102f81a48057b5d734c9cff39b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleeb5c1102f81a48057b5d734c9cff39b = $attributes; } ?>
<?php $component = App\View\Components\SidebarDropdownMenu::resolve(['name' => __("menu.reports"),'icon' => 'reports','active' => request()->routeIs(["reports.*", "multi-pos.reports.*"])] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar-dropdown-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SidebarDropdownMenu::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.salesReport'), 'link' => route('reports.sales'), 'active' => request()->routeIs('reports.sales')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-23', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.itemReport'), 'link' => route('reports.item'), 'active' => request()->routeIs('reports.item')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-24', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.categoryReport'), 'link' => route('reports.category'), 'active' => request()->routeIs('reports.category')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-25', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.deliveryAppReport'), 'link' => route('reports.delivery'), 'active' => request()->routeIs('reports.delivery')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-26', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                                    <?php if($this->hasModule('Expense')): ?>
                                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.expenseReports'), 'link' => route('reports.expenseReports'), 'active' => request()->routeIs('reports.expenseReports')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-27', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]--><?php if(module_enabled('MultiPOS')): ?>
                                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('multipos::messages.reports.title'), 'link' => route('multi-pos.reports.sales-summary'), 'active' => request()->routeIs('multi-pos.reports.sales-summary')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-28', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.cancelledOrderReport'), 'link' => route('reports.cancelledOrder'), 'active' => request()->routeIs('reports.cancelledOrder')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-29', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.removedKotItemReport'), 'link' => route('reports.removedKotItem'), 'active' => request()->routeIs('reports.removedKotItem')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-30', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('menu.taxReport'), 'link' => route('reports.tax'), 'active' => request()->routeIs('reports.tax')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-31', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

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
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = custom_module_plugins(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if ($__env->exists(strtolower($item) . '::sections.sidebar')) echo $__env->make(strtolower($item) . '::sections.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php if($this->hasModule('Settings')): ?>
                            <!--[if BLOCK]><![endif]--><?php if(user_can('Manage Settings')): ?>
                                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-menu-item', ['name' => __('menu.settings'), 'icon' => 'settings', 'link' => route('settings.index'), 'active' => request()->routeIs('settings.index')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3677355543-32', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    </ul>

                </div>
            </div>

            <div class="absolute bottom-0 left-0 justify-center w-full p-2 space-x-4 bg-white md:flex dark:bg-gray-800 rtl:space-x-reverse" sidebar-bottom-menu>
                <a href="<?php echo e(module_enabled('Subdomain') ? 'https://'.restaurant()->sub_domain : route('shop_restaurant', [restaurant()->hash])); ?>" target="_blank" class="inline-flex justify-center items-center gap-1 p-2 w-full md:w-auto text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                    <?php echo app('translator')->get('menu.customerSite'); ?>

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
                    </svg>
                </a>
            </div>

        </div>
    </aside>

    <div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>

</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views/livewire/sidebar.blade.php ENDPATH**/ ?>