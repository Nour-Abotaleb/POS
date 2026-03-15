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
    <?php if (! (request()->routeIs('pos.*'))): ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/trix/trix.css')); ?>" />
    <?php endif; ?>


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
    
    <!-- ApexCharts (Load early for dashboard charts) -->
    <?php if (! (request()->routeIs('pos.*'))): ?>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.45.2/dist/apexcharts.min.js"></script>
    <?php endif; ?>

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

    <?php if(App::environment('codecanyon') && pusherSettings()->beamer_status): ?>
        <script src="https://js.pusher.com/beams/2.1.0/push-notifications-cdn.js" async></script>
    <?php endif; ?>

    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <script>
        if (localStorage.getItem("menu-collapsed") === "true") {
            document.documentElement.style.visibility = 'hidden';
            window.addEventListener('DOMContentLoaded', () => {
                const sidebar = document.getElementById('sidebar');
                const openIcon = document.getElementById('toggle-sidebar-open');
                const closeIcon = document.getElementById('toggle-sidebar-close');

                if (sidebar) {
                    sidebar.classList.add('hidden');
                    sidebar.classList.remove('flex', 'lg:flex');
                }

                if (openIcon && closeIcon) {
                    openIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                }

                setTimeout(() => {
                    document.documentElement.style.visibility = 'visible';
                }, 50);
            });
        } else {
            // Handle expanded state icons without hiding the page
            window.addEventListener('DOMContentLoaded', () => {
                const openIcon = document.getElementById('toggle-sidebar-open');
                const closeIcon = document.getElementById('toggle-sidebar-close');

                if (openIcon && closeIcon) {
                    openIcon.classList.add('hidden');
                    closeIcon.classList.remove('hidden');
                }
            });
        }
    </script>

    
    <?php if(user()->restaurant_id ?? false): ?>
    <style>
        @media (min-width: 1024px) {
            body.pos-route-active #sidebar { display: none !important; }
            body.pos-route-active #main-content { margin-left: 0 !important; margin-right: 0 !important; }
            body.pos-route-active #toggle-sidebar { display: none !important; }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function posRouteSync() {
            var onPos = window.location.pathname.indexOf('/pos') !== -1;
            document.body.classList.toggle('pos-route-active', onPos);
        });
        document.addEventListener('livewire:navigated', function posRouteSync() {
            var onPos = window.location.pathname.indexOf('/pos') !== -1;
            document.body.classList.toggle('pos-route-active', onPos);
        });
    </script>
    <?php endif; ?>

    
    <?php if ($__env->exists('sections.custom_script_admin')) echo $__env->make('sections.custom_script_admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>


<body class="font-sans antialiased dark:bg-gray-900" id="main-body">

    <?php if(user()->restaurant_id): ?>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('navigation-menu');

$__html = app('livewire')->mount($__name, $__params, 'lw-653746187-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php else: ?>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('superadmin-navigation-menu');

$__html = app('livewire')->mount($__name, $__params, 'lw-653746187-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?>

    <div class="flex rtl:flex-row-reverse overflow-hidden bg-gray-50 dark:bg-gray-900 h-screen <?php echo e(request()->routeIs('pos.*') ? '' : 'pt-16'); ?>">

        <?php if(user()->restaurant_id): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar');

$__html = app('livewire')->mount($__name, $__params, 'lw-653746187-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php else: ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('superadmin-sidebar');

$__html = app('livewire')->mount($__name, $__params, 'lw-653746187-3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?>


        <div id="main-content"
            <?php if(request()->routeIs('pos.*')): ?> data-pos-page="true" <?php endif; ?>
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'relative w-full h-full bg-gray-50 dark:bg-gray-900',
                'overflow-hidden flex flex-col' => request()->routeIs('pos.*'),
                'overflow-y-auto' => !request()->routeIs('pos.*'),
                'ltr:lg:ml-0 rtl:lg:mr-0' => request()->routeIs('pos.*'),
                'ltr:lg:ml-64 rtl:lg:mr-64' => !request()->routeIs('pos.*'),
            ]); ?>">
            <main class="<?php echo \Illuminate\Support\Arr::toCssClasses(['h-full min-h-0 flex flex-col' => request()->routeIs('pos.*')]); ?>">
                <?php echo $__env->yieldContent('content'); ?>
                <?php echo e($slot ?? ''); ?>

            </main>


        </div>


    </div>

    <?php echo $__env->yieldPushContent('modals'); ?>


    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>


    <?php echo $__env->make('layouts.update-uri', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('raise-support-ticket');

$__html = app('livewire')->mount($__name, $__params, 'lw-653746187-4', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

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

    <?php if(superadminPaymentGateway()->razorpay_status): ?>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <?php endif; ?>

    <?php if(user()->restaurant_id): ?>

        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('order.OrderDetail');

$__html = app('livewire')->mount($__name, $__params, 'lw-653746187-5', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('customer.addCustomer');

$__html = app('livewire')->mount($__name, $__params, 'lw-653746187-6', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('settings.upgradeLicense');

$__html = app('livewire')->mount($__name, $__params, 'lw-653746187-7', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('order.addPayment');

$__html = app('livewire')->mount($__name, $__params, 'lw-653746187-8', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

        <?php echo $__env->make('sections.payment-gateway-include', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php endif; ?>


    <?php if(App::environment('codecanyon') && pusherSettings()->beamer_status): ?>
        <script>
            var currentUserId = "<?php echo e(Str::slug(global_setting()->name)); ?>-<?php echo e(auth()->id()); ?>"; // Get this from your auth system

            const beamsClient = new PusherPushNotifications.Client({
                instanceId: "<?php echo e(pusherSettings()->instance_id); ?>",
            });

            const beamsTokenProvider = new PusherPushNotifications.TokenProvider({
                url: "<?php echo e(route('beam_auth')); ?>",
            });

            beamsClient.start()
                .then(() => beamsClient.addDeviceInterest('<?php echo e(Str::slug(global_setting()->name)); ?>'))
                .then(() => beamsClient.setUserId(currentUserId, beamsTokenProvider))
                .then(() => console.log('Successfully registered and subscribed!'))
                .catch(console.error);

            beamsClient
                .getUserId()
                .then((userId) => {
                    console.log(userId, currentUserId);
                    // Check if the Beams user matches the user that is currently logged in
                    if (userId !== currentUserId) {
                        // Unregister for notifications
                        return beamsClient.stop();
                    }
                })
                .catch(console.error);
        </script>
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

    <script>
        function hideNotificationIfResponded() {
            const permission = Notification.permission;
            if (permission === 'granted' || permission === 'denied') {
                const alertBox = document.getElementById('notification-alert');
                if (alertBox) {
                    alertBox.style.display = 'none';
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            hideNotificationIfResponded();
            if ('serviceWorker' in navigator) {
                navigator.serviceWorker.register("<?php echo e(asset('service-worker.js')); ?>")
                    .then(registration => console.log("Service Worker registered:", registration))
                    .catch(error => console.error("Service Worker registration failed:", error));
            }
        });

        document.addEventListener('livewire:navigated', () => {
            hideNotificationIfResponded();
        });

        document.addEventListener('click', async (e) => {
            if (e.target && e.target.id === 'subscribe-button') {
                if ('Notification' in window && 'serviceWorker' in navigator) {
                    const permission = await Notification.requestPermission();

                    localStorage.setItem('notificationPermission', permission);

                    hideNotificationIfResponded();

                    if (permission !== 'granted') {
                        console.warn("Push notifications permission denied.");
                        return;
                    }
                    try {
                        const registration = await navigator.serviceWorker.register("<?php echo e(asset('service-worker.js')); ?>");
                        console.log("Service Worker registered:", registration);
                        subscribeUserToPush(registration);
                    } catch (error) {
                        console.error("Service Worker registration failed:", error);
                    }
                } else if ('safari' in window && 'pushNotification' in window.safari) {
                    handleSafariPush();
                } else {
                    console.error("Push notifications are not supported in this browser.");
                }
            }
        });
        async function subscribeUserToPush(registration) {
            try {
                const applicationServerKey = "<?php echo e(global_setting()->vapid_public_key); ?>";

                const subscription = await registration.pushManager.subscribe({
                    userVisibleOnly: true,
                    applicationServerKey: applicationServerKey
                });

                console.log("Push Subscription:", subscription);

                await fetch("/subscribe", {
                    method: "POST",
                    body: JSON.stringify(subscription),
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    }
                });

                console.log("Push subscription saved on the server.");
            } catch (error) {
                console.error("Subscription error:", error);
            }
        }

        function handleSafariPush() {
            const permissionData = window.safari.pushNotification.permission("<?php echo e(config('app.safari_push_id')); ?>");

            if (permissionData.permission === "default") {
                window.safari.pushNotification.requestPermission(
                    "https://yourdomain.com",
                    "<?php echo e(config('app.safari_push_id')); ?>",
                    {},
                    (permission) => {
                        localStorage.setItem('notificationPermission', permission.permission);
                        hideNotificationIfResponded();
                        console.log("Safari push permission:", permission);
                    }
                );
            } else {
                localStorage.setItem('notificationPermission', permissionData.permission);
                hideNotificationIfResponded();
                console.log("Safari push subscription:", permissionData.deviceToken);
            }
        }
    </script>

    <?php echo $__env->make('sections.pusher-script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->make('layouts.service-worker-js', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <?php if (! (request()->routeIs('pos.*'))): ?>
    <!-- ApexCharts for Dashboard Charts (Backup load) -->
    <script>
        // Ensure ApexCharts is loaded
        if (typeof ApexCharts === 'undefined') {
            console.log('Loading ApexCharts backup...');
            const script = document.createElement('script');
            script.src = 'https://cdn.jsdelivr.net/npm/apexcharts@3.45.2/dist/apexcharts.min.js';
            script.onload = function() {
                console.log('ApexCharts loaded successfully');
                // Trigger a custom event when ApexCharts is ready
                document.dispatchEvent(new Event('apexcharts-ready'));
            };
            document.head.appendChild(script);
        } else {
            // ApexCharts already loaded
            document.dispatchEvent(new Event('apexcharts-ready'));
        }
    </script>
    <script src="<?php echo e(asset('vendor/trix/trix.umd.min.js')); ?>"></script>
    <!-- Print Image Handler (not needed on POS) -->
    <script src="https://cdn.jsdelivr.net/npm/html-to-image@1.11.11/dist/html-to-image.min.js" data-navigate-track></script>
    <script src="<?php echo e(asset('js/print-image-handler.js')); ?>" data-navigate-track></script>
    <?php endif; ?>
</body>
</html>
<?php /**PATH E:\nomu\testfood\POS\resources\views/layouts/app.blade.php ENDPATH**/ ?>