<?php $__env->startSection('content'); ?>
    <div class="bg-white dark:bg-gray-800 rounded-lg m-4">
        <header class="border-b border-gray-200 dark:border-gray-600 py-4">
            <div class="flex flex-col items-start gap-1 px-3 md:px-6">
                <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.menu.addMenuItem'); ?></h1>
                <?php if (isset($component)) { $__componentOriginal569b8c2fcefd05fb78949b21514b1424 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal569b8c2fcefd05fb78949b21514b1424 = $attributes; } ?>
<?php $component = App\View\Components\HelpText::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('help-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\HelpText::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo app('translator')->get('modules.menu.menuItemHelp'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal569b8c2fcefd05fb78949b21514b1424)): ?>
<?php $attributes = $__attributesOriginal569b8c2fcefd05fb78949b21514b1424; ?>
<?php unset($__attributesOriginal569b8c2fcefd05fb78949b21514b1424); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal569b8c2fcefd05fb78949b21514b1424)): ?>
<?php $component = $__componentOriginal569b8c2fcefd05fb78949b21514b1424; ?>
<?php unset($__componentOriginal569b8c2fcefd05fb78949b21514b1424); ?>
<?php endif; ?>
            </div>
        </header>

        <div class="p-4 sm:p-7">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('forms.createMenuItem');

$__html = app('livewire')->mount($__name, $__params, 'lw-2870966926-0', $__slots ?? [], get_defined_vars());

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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\script\resources\views/menu_items/create.blade.php ENDPATH**/ ?>