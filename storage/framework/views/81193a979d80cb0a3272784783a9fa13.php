<?php
    use App\Models\KotPlace;
    $multipleKots = KotPlace::where('is_active', true)->get();
?>

<!--[if BLOCK]><![endif]--><?php if(in_array('Kitchen', restaurant_modules()) && user()->can('Show Kitchen Place')): ?>
    <?php if (isset($component)) { $__componentOriginaleeb5c1102f81a48057b5d734c9cff39b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleeb5c1102f81a48057b5d734c9cff39b = $attributes; } ?>
<?php $component = App\View\Components\SidebarDropdownMenu::resolve(['name' => __('kitchen::modules.menu.kitchenPlaces'),'isAddon' => 'true','icon' => 'kitchen','customIcon' => '<svg fill="currentColor" viewBox="0 -1.05 48.095 48.095" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"><path d="M9 0 A 1.0001 1.0001 0 0 0 8 1L8 4.484375L1.4179688 9.1855469 A 1.0001 1.0001 0 0 0 1 10L1 14 A 1.0001 1.0001 0 0 0 2 15L24 15 A 1.0001 1.0001 0 0 0 25 14L25 10 A 1.0001 1.0001 0 0 0 24.582031 9.1855469L18 4.4863281L18 1 A 1.0001 1.0001 0 0 0 17 0L9 0 z M 10 2L16 2L16 5 A 1.0001 1.0001 0 0 0 16.417969 5.8144531L23 10.513672L23 13L3 13L3 10.513672L9.5820312 5.8144531 A 1.0001 1.0001 0 0 0 10 5L10 2 z M 5.5 21C4.8457598 21 4.2978026 21.418077 4.0917969 22L1 22 A 1.0001 1.0001 0 0 0 0 23L0 45 A 1.0001 1.0001 0 0 0 1 46L47.095703 46 A 1.0001 1.0001 0 0 0 48.095703 45L48.095703 23 A 1.0001 1.0001 0 0 0 47.095703 22L21.908203 22C21.702197 21.418077 21.15424 21 20.5 21L5.5 21 z M 2 24L5.5 24L20.5 24L24.095703 24L24.095703 44L2 44L2 24 z M 26.095703 24L46.095703 24L46.095703 30L26.095703 30L26.095703 24 z M 5 26 A 1.0001 1.0001 0 0 0 4 27L4 41 A 1.0001 1.0001 0 0 0 5 42L21 42 A 1.0001 1.0001 0 0 0 22 41L22 27 A 1.0001 1.0001 0 0 0 21 26L5 26 z M 30 26 A 1.0001 1.0001 0 1 0 30 28L42 28 A 1.0001 1.0001 0 1 0 42 26L30 26 z M 6 28L20 28L20 40L6 40L6 28 z M 26.095703 32L46.095703 32L46.095703 44L26.095703 44L26.095703 32 z M 29.984375 34.986328 A 1.0001 1.0001 0 0 0 29 36L29 41 A 1.0001 1.0001 0 1 0 31 41L31 36 A 1.0001 1.0001 0 0 0 29.984375 34.986328 z"></path></svg>','active' => request()->routeIs('kitchen.*')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
[$__name, $__params] = $__split('sidebar-dropdown-menu', [
            'name' => __('kitchen::modules.menu.kitchenSettings'),
            'link' => route('kitchen.kitchen-places.index'),
            'active' => request()->routeIs('kitchen.kitchen-places.index'),
        ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2208710470-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('sidebar-dropdown-menu', [
            'name' => __('kitchen::modules.menu.allKitchenKot'),
            'link' => route('kitchen.all-kot.index'),
            'active' => request()->routeIs('kitchen.all-kot.index'),
        ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2208710470-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

        
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $multipleKots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kotPlace): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-dropdown-menu', [
                'name' => $kotPlace->name,
                'link' => route('kitchen.kot.show', ['id' => $kotPlace->id]),
                'active' => request()->routeIs('kitchen.kot.show') && request()->route('id') == $kotPlace->id,
            ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2208710470-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

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
<?php /**PATH E:\nomufood\POS\Modules/Kitchen\Resources/views/sections/sidebar.blade.php ENDPATH**/ ?>