<div>

        <?php
        $__assetKey = '2641875047-0';

        ob_start();
    ?>
    <script src="<?php echo e(asset('vendor/pikaday.js')); ?>" defer></script>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/pikaday.css')); ?>">
        <?php
        $__output = ob_get_clean();

        // If the asset has already been loaded anywhere during this request, skip it...
        if (in_array($__assetKey, \Livewire\Features\SupportScriptsAndAssets\SupportScriptsAndAssets::$alreadyRunAssetKeys)) {
            // Skip it...
        } else {
            \Livewire\Features\SupportScriptsAndAssets\SupportScriptsAndAssets::$alreadyRunAssetKeys[] = $__assetKey;

            // Check if we're in a Livewire component or not and store the asset accordingly...
            if (isset($this)) {
                \Livewire\store($this)->push('assets', $__output, $__assetKey);
            } else {
                \Livewire\Features\SupportScriptsAndAssets\SupportScriptsAndAssets::$nonLivewireAssets[$__assetKey] = $__output;
            }
        }
    ?>

    <div class="p-4 bg-white block  dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-4">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"><?php echo app('translator')->get('menu.reservations'); ?></h1>
        </div>

        <div class="flex flex-col my-4">
            <!-- Card Section -->
            <div class="space-y-4">
                <?php if (isset($component)) { $__componentOriginaldf75c4825bb48e77d5e4d435ccad7b3e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf75c4825bb48e77d5e4d435ccad7b3e = $attributes; } ?>
<?php $component = App\View\Components\UpgradeBox::resolve(['title' => __('modules.reservation.upgradeHeading'),'text' => __('modules.reservation.upgradeInfo')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('upgrade-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\UpgradeBox::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf75c4825bb48e77d5e4d435ccad7b3e)): ?>
<?php $attributes = $__attributesOriginaldf75c4825bb48e77d5e4d435ccad7b3e; ?>
<?php unset($__attributesOriginaldf75c4825bb48e77d5e4d435ccad7b3e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf75c4825bb48e77d5e4d435ccad7b3e)): ?>
<?php $component = $__componentOriginaldf75c4825bb48e77d5e4d435ccad7b3e; ?>
<?php unset($__componentOriginaldf75c4825bb48e77d5e4d435ccad7b3e); ?>
<?php endif; ?>
            </div>
            <!-- End Card Section -->
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\license-expire.blade.php ENDPATH**/ ?>