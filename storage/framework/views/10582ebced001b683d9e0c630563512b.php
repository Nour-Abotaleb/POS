<?php $__env->startSection('content'); ?>
<div class="w-full px-4 sm:px-6 lg:px-8 py-6 space-y-6">
    <h2 class="text-2xl font-semibold"><?php echo app('translator')->get('cashregister::app.registerDashboard'); ?></h2>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('cash-register.dashboard.register-dashboard');

$__html = app('livewire')->mount($__name, $__params, 'lw-2212012488-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\script\Modules/CashRegister\Resources/views/dashboard.blade.php ENDPATH**/ ?>