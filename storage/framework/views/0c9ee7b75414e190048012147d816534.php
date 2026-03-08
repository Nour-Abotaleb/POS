<?php $__env->startSection('content'); ?>

<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('area.areas');

$__html = app('livewire')->mount($__name, $__params, 'lw-3898132853-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

<!-- Product Drawer -->
<?php if (isset($component)) { $__componentOriginal2b99c754bd2fe26955b65fafa91f423b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2b99c754bd2fe26955b65fafa91f423b = $attributes; } ?>
<?php $component = App\View\Components\RightDrawer::resolve(['title' => __("modules.menu.addMenu")] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('right-drawer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\RightDrawer::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('forms.addMenu');

$__html = app('livewire')->mount($__name, $__params, 'lw-3898132853-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2b99c754bd2fe26955b65fafa91f423b)): ?>
<?php $attributes = $__attributesOriginal2b99c754bd2fe26955b65fafa91f423b; ?>
<?php unset($__attributesOriginal2b99c754bd2fe26955b65fafa91f423b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2b99c754bd2fe26955b65fafa91f423b)): ?>
<?php $component = $__componentOriginal2b99c754bd2fe26955b65fafa91f423b; ?>
<?php unset($__componentOriginal2b99c754bd2fe26955b65fafa91f423b); ?>
<?php endif; ?>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\script\resources\views/areas/index.blade.php ENDPATH**/ ?>