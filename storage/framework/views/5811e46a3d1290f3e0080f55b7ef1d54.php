<?php $__env->startSection('content'); ?>


<div>
    <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-2 xl:gap-4 dark:bg-gray-900">
        <div class="mb-4 col-span-full xl:mb-2">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"><?php echo app('translator')->get('menu.appUpdate'); ?></h1>
        </div>
    </div>

    <div class="p-2 ">
        <?php if (isset($component)) { $__componentOriginalb5e767ad160784309dfcad41e788743b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb5e767ad160784309dfcad41e788743b = $attributes; } ?>
<?php $component = App\View\Components\Alert::resolve(['type' => 'warning'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php echo app('translator')->get('modules.dashboard.verificationPendingInfo'); ?></p>
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
    </div>

    <div class="p-2 text-center">
        <div class="mb-4">
            <img src="<?php echo e(asset('img/pending_approval.svg')); ?>" width="350" alt="<?php echo app('translator')->get('modules.dashboard.verificationPending'); ?>" class="mx-auto">
        </div>
        <h2 class="text-2xl font-bold text-gray-700 dark:text-gray-200 mb-2">
            <?php echo app('translator')->get('modules.dashboard.verificationPending'); ?>
        </h2>
        <p class="text-gray-600 dark:text-gray-400">
            <?php echo app('translator')->get('modules.dashboard.verificationPendingDescription'); ?>
        </p>
    </div>

</div>


<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
    <?php echo $__env->make('vendor.froiden-envato.update.update_script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\script\resources\views\dashboard\padding-approval.blade.php ENDPATH**/ ?>