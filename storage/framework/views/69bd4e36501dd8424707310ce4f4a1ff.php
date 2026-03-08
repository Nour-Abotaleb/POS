<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e(isRtl() ? 'rtl' : 'ltr'); ?>">

<head>
   <?php
        $lastSegment = last(request()->segments());
    ?>
    <?php if(user()->restaurant_id): ?>
        <link rel="manifest" href="<?php echo e(asset('manifest.json')); ?><?php if($lastSegment): ?>?url=<?php echo e($lastSegment); ?>&hash=<?php echo e(user()->restaurant->hash); ?><?php endif; ?>" crossorigin="use-credentials">
    <?php else: ?>
        <link rel="manifest" href="<?php echo e(asset('manifest.json')); ?><?php if($lastSegment): ?>?url=<?php echo e($lastSegment); ?><?php endif; ?>" crossorigin="use-credentials">
    <?php endif; ?>
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="<?php echo e(global_setting()->name); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />


    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(restaurantOrGlobalSetting()->upload_fav_icon_apple_touch_icon_url); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo e(restaurantOrGlobalSetting()->upload_fav_icon_android_chrome_192_url); ?>">
    <link rel="icon" type="image/png" sizes="512x512" href="<?php echo e(restaurantOrGlobalSetting()->upload_fav_icon_android_chrome_512_url); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(restaurantOrGlobalSetting()->upload_favicon_16_url); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(restaurantOrGlobalSetting()->upload_favicon_32_url); ?>">
    <link rel="shortcut icon" href="<?php echo e(restaurantOrGlobalSetting()->favicon_url); ?>">


    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(global_setting()->logoUrl); ?>">

    <title><?php echo e(global_setting()->name); ?></title>

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <!-- Styles -->
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>


    <?php echo $__env->yieldPushContent('styles'); ?>

    <?php echo $__env->make('sections.theme_style', [
        'baseColor' => restaurantOrGlobalSetting()->theme_rgb,
        'baseColorHex' => restaurantOrGlobalSetting()->theme_hex,
    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


    <?php if(File::exists(public_path() . '/css/app-custom.css')): ?>
        <link href="<?php echo e(asset('css/app-custom.css')); ?>" rel="stylesheet">
    <?php endif; ?>


    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>


    
    <?php if ($__env->exists('sections.custom_script_admin')) echo $__env->make('sections.custom_script_admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>


<body class="font-sans antialiased dark:bg-gray-900" id="main-body">


    <div class="flex rtl:flex-row-reverse  overflow-hidden bg-gray-50 dark:bg-gray-900 h-screen">

        <div id="main-content"
            class="relative w-full h-full overflow-y-auto bg-gray-50  dark:bg-gray-900">
            <main>
                <?php echo $__env->yieldContent('content'); ?>
                <?php echo e($slot ?? ''); ?>

            </main>


        </div>


    </div>

    <?php echo $__env->yieldPushContent('modals'); ?>


    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>


    <?php echo $__env->make('layouts.update-uri', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


    <script src="<?php echo e(asset('vendor/livewire-alert/livewire-alert.js')); ?>" defer data-navigate-track></script>
    <?php if (isset($component)) { $__componentOriginald2d87b894a350bded0052b294742bbb9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald2d87b894a350bded0052b294742bbb9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-alert::components.flash','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-alert::flash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald2d87b894a350bded0052b294742bbb9)): ?>
<?php $attributes = $__attributesOriginald2d87b894a350bded0052b294742bbb9; ?>
<?php unset($__attributesOriginald2d87b894a350bded0052b294742bbb9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald2d87b894a350bded0052b294742bbb9)): ?>
<?php $component = $__componentOriginald2d87b894a350bded0052b294742bbb9; ?>
<?php unset($__componentOriginald2d87b894a350bded0052b294742bbb9); ?>
<?php endif; ?>


    <script>
        var elem = document.getElementById("main-body");

        function openFullscreen() {
            if (!document.fullscreenElement) {
                if (elem.requestFullscreen) {
                    elem.requestFullscreen();
                } else if (elem.webkitRequestFullscreen) {
                    /* Safari */
                    elem.webkitRequestFullscreen();
                } else if (elem.msRequestFullscreen) {
                    /* IE11 */
                    elem.msRequestFullscreen();
                }
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.webkitExitFullscreen) {
                    /* Safari */
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) {
                    /* IE11 */
                    document.msExitFullscreen();
                }
            }
        }
    </script>

    <?php echo $__env->make('layouts.service-worker-js', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('sections.pusher-script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\script\resources\views\layouts\public.blade.php ENDPATH**/ ?>