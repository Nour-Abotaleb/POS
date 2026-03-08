<?php $__env->startSection('content'); ?>

<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('shop.cart', ['tableID' => $tableHash ?? null, 'restaurant' => $restaurant ?? null, 'shopBranch' => $shopBranch ?? null , 'getTable' => $getTable ?? false, 'canCreateOrder'=> $canCreateOrder]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2215907256-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('customer.signup', ['restaurant' => $restaurant]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2215907256-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\script\resources\views\shop\index.blade.php ENDPATH**/ ?>