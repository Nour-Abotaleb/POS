<?php $__env->startSection('content'); ?>
    <div class="container mx-auto px-4 py-6">
        <div class="max-w-7xl mx-auto">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    <?php echo app('translator')->get('modules.modifier.addModifierGroup'); ?>
                </h1>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                    <?php echo app('translator')->get('modules.modifier.addModifierGroupDescription'); ?>
                </p>
            </div>

            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('forms.create-modifier-group');

$__html = app('livewire')->mount($__name, $__params, 'lw-4255938237-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\script\resources\views\modifier_groups\create.blade.php ENDPATH**/ ?>