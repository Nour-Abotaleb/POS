<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ isRtl() ? 'rtl' : 'ltr' }}">

<head>
   @php
        $lastSegment = last(request()->segments());
    @endphp
    @if (user()->restaurant_id)
        <link rel="manifest" href="{{ asset('manifest.json') }}@if($lastSegment)?url={{ $lastSegment }}&hash={{ user()->restaurant->hash }}@endif" crossorigin="use-credentials">
    @else
        <link rel="manifest" href="{{ asset('manifest.json') }}@if($lastSegment)?url={{ $lastSegment }}@endif" crossorigin="use-credentials">
    @endif
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="{{ global_setting()->name }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @unless(request()->routeIs('pos.*'))
    <link rel="stylesheet" href="{{ asset('vendor/trix/trix.css') }}" />
    @endunless


    <link rel="apple-touch-icon" sizes="180x180" href="{{ restaurantOrGlobalSetting()->upload_fav_icon_apple_touch_icon_url }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ restaurantOrGlobalSetting()->upload_fav_icon_android_chrome_192_url }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ restaurantOrGlobalSetting()->upload_fav_icon_android_chrome_512_url }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ restaurantOrGlobalSetting()->upload_favicon_16_url }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ restaurantOrGlobalSetting()->upload_favicon_32_url }}">
    <link rel="shortcut icon" href="{{ restaurantOrGlobalSetting()->favicon_url }}">


    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ global_setting()->logoUrl }}">

    <title>{{ global_setting()->name }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    @stack('styles')

    @include('sections.theme_style', [
        'baseColor' => restaurantOrGlobalSetting()->theme_rgb,
        'baseColorHex' => restaurantOrGlobalSetting()->theme_hex,
    ])


    @if (File::exists(public_path() . '/css/app-custom.css'))
        <link href="{{ asset('css/app-custom.css') }}" rel="stylesheet">
    @endif

    @if (App::environment('codecanyon') && pusherSettings()->beamer_status)
        <script src="https://js.pusher.com/beams/2.1.0/push-notifications-cdn.js" async></script>
    @endif

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

    {{-- When on POS route (including after wire:navigate), hide sidebar on desktop --}}
    @if (user()->restaurant_id ?? false)
    <style>
        @media (min-width: 1024px) {
            body.pos-route-active #sidebar { display: none !important; }
            body.pos-route-active #main-content { margin-left: 0 !important; margin-right: 0 !important; }
            body.pos-route-active #toggle-sidebar { display: none !important; }
            body.pos-route-active .pos-order-panel-wrapper { flex: 0 0 auto !important; width: 500px !important; min-width: 500px !important; }
        }
        @media (max-width: 1023px) {
            body.pos-route-active #sidebar:not(.hidden) { display: flex !important; z-index: 50 !important; }
            body.pos-route-active #sidebarBackdrop { z-index: 45 !important; }
            body.pos-route-active .pos-layout { padding-top: 4rem !important; min-height: 100vh !important; }
            body.pos-route-active #main-content {
                flex: 1 1 0% !important;
                min-height: 0 !important;
                height: calc(100vh - 4rem) !important;
            }
            body.pos-route-active main > div {
                flex: 1 1 0% !important;
                min-height: 0 !important;
                display: flex !important;
                flex-direction: column !important;
                height: 100% !important;
            }
            body.pos-route-active .pos-container { flex: 1 1 0% !important; min-height: 0 !important; }
            body.pos-route-active .pos-order-panel-wrapper { flex: 1 1 0% !important; min-height: 0 !important; }
            body.pos-route-active nav.fixed { z-index: 50 !important; }
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
    @endif

    {{-- Include file for widgets if exist --}}
    @includeIf('sections.custom_script_admin')
</head>


<body class="font-sans antialiased dark:bg-gray-900" id="main-body">

    @if (user()->restaurant_id)
        @livewire('navigation-menu')
    @else
        @livewire('superadmin-navigation-menu')
    @endif

    <div class="flex rtl:flex-row-reverse overflow-hidden bg-gray-50 dark:bg-gray-900 h-screen {{ request()->routeIs('pos.*') ? 'pos-layout' : 'pt-16' }}">

        @if (user()->restaurant_id)
            @livewire('sidebar')
        @else
            @livewire('superadmin-sidebar')
        @endif


        <div id="main-content"
            @if (request()->routeIs('pos.*')) data-pos-page="true" @endif
            @class([
                'relative w-full h-full bg-gray-50 dark:bg-gray-900',
                'overflow-hidden flex flex-col' => request()->routeIs('pos.*'),
                'overflow-y-auto' => !request()->routeIs('pos.*'),
                'ltr:lg:ml-0 rtl:lg:mr-0' => request()->routeIs('pos.*'),
                'ltr:lg:ml-64 rtl:lg:mr-64' => !request()->routeIs('pos.*'),
            ])>
            <main @class(['h-full min-h-0 flex flex-col' => request()->routeIs('pos.*')])>
                @yield('content')
                {{ $slot ?? '' }}
            </main>


        </div>


    </div>

    @stack('modals')


    @livewireScripts

    @include('layouts.update-uri')

    @livewire('raise-support-ticket')

    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}" defer data-navigate-track></script>
    <x-livewire-alert::flash />

    @if (superadminPaymentGateway()->razorpay_status)
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    @endif

    @if (user()->restaurant_id)

        @livewire('order.OrderDetail')

        @livewire('customer.addCustomer')

        @livewire('settings.upgradeLicense')

        @livewire('order.addPayment')

        @include('sections.payment-gateway-include')

    @endif


    @if (App::environment('codecanyon') && pusherSettings()->beamer_status)
        <script>
            var currentUserId = "{{ Str::slug(global_setting()->name) }}-{{ auth()->id() }}"; // Get this from your auth system

            const beamsClient = new PusherPushNotifications.Client({
                instanceId: "{{ pusherSettings()->instance_id }}",
            });

            const beamsTokenProvider = new PusherPushNotifications.TokenProvider({
                url: "{{ route('beam_auth') }}",
            });

            beamsClient.start()
                .then(() => beamsClient.addDeviceInterest('{{ Str::slug(global_setting()->name) }}'))
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
    @endif

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
                navigator.serviceWorker.register("{{ asset('service-worker.js') }}")
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
                        const registration = await navigator.serviceWorker.register("{{ asset('service-worker.js') }}");
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
                const applicationServerKey = "{{ global_setting()->vapid_public_key }}";

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
            const permissionData = window.safari.pushNotification.permission("{{ config('app.safari_push_id') }}");

            if (permissionData.permission === "default") {
                window.safari.pushNotification.requestPermission(
                    "https://yourdomain.com",
                    "{{ config('app.safari_push_id') }}",
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

    @include('sections.pusher-script')

    @include('layouts.service-worker-js')
    @stack('scripts')
    @unless(request()->routeIs('pos.*'))
    <script src="{{ asset('vendor/trix/trix.umd.min.js') }}"></script>
    <!-- Print Image Handler (not needed on POS) -->
    <script src="https://cdn.jsdelivr.net/npm/html-to-image@1.11.11/dist/html-to-image.min.js" data-navigate-track></script>
    <script src="{{ asset('js/print-image-handler.js') }}" data-navigate-track></script>
    @endunless
</body>
</html>
