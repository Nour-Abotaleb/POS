<!--[if BLOCK]><![endif]--><?php if(in_array('Inventory', restaurant_modules()) && user_can('Show Inventory Stock')): ?>
<?php if (isset($component)) { $__componentOriginaleeb5c1102f81a48057b5d734c9cff39b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleeb5c1102f81a48057b5d734c9cff39b = $attributes; } ?>
<?php $component = App\View\Components\SidebarDropdownMenu::resolve(['name' => __("inventory::modules.menu.inventory"),'isAddon' => 'true','icon' => 'inventory','customIcon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-6 h-6 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" viewBox="0 0 16 16">
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
  <path d="M4.5 6.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V7a.5.5 0 0 1 .5-.5zm2.5.5a.5.5 0 0 1 1 0v4a.5.5 0 0 1-1 0V7zm3 0a.5.5 0 0 1 1 0v4a.5.5 0 0 1-1 0V7z"/>
</svg>','active' => request()->routeIs(["inventory.*"]) || request()->routeIs(["units.*", "inventory-items.*", "inventory-stocks.*", "inventory-movements.*", "recipes.*", "purchase-orders.*", "inventory.reports.*", "inventory-settings.*", "suppliers.*", "inventory-item-categories.*", "inventory.batch-recipes.*", "inventory.batch-inventory.*", "batch-recipes.*", "batch-inventory.*" ])] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar-dropdown-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SidebarDropdownMenu::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!--[if BLOCK]><![endif]--><?php if(user_can('Show Inventory Stock')): ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('inventory::modules.menu.dashboard'), 'link' => route('inventory.dashboard'), 'active' => request()->routeIs('inventory.dashboard')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4108741250-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    
    <!--[if BLOCK]><![endif]--><?php if(user_can('Show Unit')): ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('inventory::modules.menu.units'), 'link' => route('units.index'), 'active' => request()->routeIs('units.index')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4108741250-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    
    <!--[if BLOCK]><![endif]--><?php if(user_can('Show Inventory Item')): ?>
      <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('inventory::modules.menu.inventoryItems'), 'link' => route('inventory-items.index'), 'active' => request()->routeIs('inventory-items.index')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4108741250-2', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('inventory::modules.menu.inventoryItemCategories'), 'link' => route('inventory-item-categories.index'), 'active' => request()->routeIs('inventory-item-categories.*')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4108741250-3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    
    
    <!--[if BLOCK]><![endif]--><?php if(user_can('Show Inventory Stock')): ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('inventory::modules.menu.inventoryStocks'), 'link' => route('inventory-stocks.index'), 'active' => request()->routeIs('inventory-stocks.index')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4108741250-4', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    
    <!--[if BLOCK]><![endif]--><?php if(user_can('Show Inventory Movement')): ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('inventory::modules.menu.inventoryMovements'), 'link' => route('inventory-movements.index'), 'active' => request()->routeIs('inventory-movements.index')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4108741250-5', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    
    <!--[if BLOCK]><![endif]--><?php if(user_can('Show Recipe')): ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('inventory::modules.menu.recipes'), 'link' => route('recipes.index'), 'active' => request()->routeIs('recipes.index')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4108741250-6', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    
    <!--[if BLOCK]><![endif]--><?php if(user_can('Show Batch Recipe')): ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('inventory::modules.menu.batchRecipes'), 'link' => route('batch-recipes.index'), 'active' => request()->routeIs('batch-recipes.*')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4108741250-7', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    
    <!--[if BLOCK]><![endif]--><?php if(user_can('Show Batch Inventory')): ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('inventory::modules.menu.batchInventory'), 'link' => route('batch-inventory.index'), 'active' => request()->routeIs('batch-inventory.*')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4108741250-8', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    
    <!--[if BLOCK]><![endif]--><?php if(user_can('Show Purchase Order')): ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('inventory::modules.menu.purchaseOrders'), 'link' => route('purchase-orders.index'), 'active' => request()->routeIs('purchase-orders.index')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4108741250-9', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    
    <!--[if BLOCK]><![endif]--><?php if(user_can('Show Supplier')): ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('inventory::modules.menu.suppliers'), 'link' => route('suppliers.index'), 'active' => request()->routeIs('suppliers.*')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4108741250-10', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if(user_can('Show Inventory Report')): ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('inventory::modules.menu.reports'), 'link' => route('inventory.reports.usage'), 'active' => request()->routeIs('inventory.reports.*')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4108741250-11', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('inventory::modules.menu.batchReports'), 'link' => route('inventory.batch-reports.production'), 'active' => request()->routeIs('inventory.batch-reports.*')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4108741250-12', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if(user_can('Update Inventory Settings')): ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', ['name' => __('inventory::modules.menu.settings'), 'link' => route('inventory-settings.index'), 'active' => request()->routeIs('inventory-settings.index')]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4108741250-13', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
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
<?php endif; ?><!--[if ENDBLOCK]><![endif]--><?php /**PATH C:\xampp\htdocs\script\Modules/Inventory\Resources/views/sections/sidebar.blade.php ENDPATH**/ ?>