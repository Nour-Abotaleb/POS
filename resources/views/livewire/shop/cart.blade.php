<div class="w-full min-w-0 px-4">
    <!-- Order Type Selection Modal -->
    @php
        $firstOrderTypeId = ($orderTypes ?? collect())->first()?->id ?? null;
        $orderTypeMapApiKey = global_setting()->google_map_api_key ?? '';
        $orderTypeBranchLat = $shopBranch->lat ?? 24.7136;
        $orderTypeBranchLng = $shopBranch->lng ?? 46.6753;
    @endphp
    <x-dialog-modal wire:model.live="showOrderTypeModal" maxWidth="4xl">
        <x-slot name="title"></x-slot>

        <x-slot name="content">
            <div x-data="{ activeTab: {{ $firstOrderTypeId ?? 'null' }} }">

                {{-- Order Type Tabs --}}
                <div class="flex gap-1 mb-5">
                    @foreach($orderTypes ?? [] as $orderType)
                        <button
                            type="button"
                            wire:key="tab-{{ $orderType->id }}"
                            wire:click="onOrderTypeModalTabChanged({{ $orderType->id }})"
                            @click="activeTab = {{ $orderType->id }}"
                            :style="activeTab === {{ $orderType->id }} ? 'background-color:#011646;color:#fff;' : ''"
                            :class="activeTab !== {{ $orderType->id }} ? 'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300' : ''"
                            class="flex-1 flex flex-col items-center gap-1 px-2 py-3 text-xs font-medium rounded-lg transition"
                        >
                            {{ $orderType->translated_name }}
                        </button>
                    @endforeach
                </div>

                {{-- Delivery: map + phone + OTP; other types: branch cards --}}
                @foreach($orderTypes ?? [] as $orderType)
                    @php
                        $isDeliveryOrderType = strtolower((string) ($orderType->slug ?? '')) === 'delivery'
                            || strtolower((string) ($orderType->type ?? '')) === 'delivery';
                    @endphp
                    <div x-show="activeTab === {{ $orderType->id }}" x-cloak class="space-y-4 mb-5">
                        @if($isDeliveryOrderType)
                            <div wire:key="order-type-delivery-panel-{{ $orderType->id }}"
                                class="relative rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden min-h-[420px] bg-gray-100 dark:bg-gray-900">
                                <div id="order-type-delivery-map" class="absolute inset-0 min-h-[420px] z-0" wire:ignore></div>

                                @if($orderTypeDeliveryStep === 'map' && $orderTypeDeliveryPendingTypeId === $orderType->id)
                                    <div class="absolute bottom-0 inset-x-0 z-[15] p-3 sm:p-4 bg-gradient-to-t from-black/70 via-black/40 to-transparent pointer-events-none">
                                        <div class="pointer-events-auto space-y-2 max-w-lg mx-auto">
                                            <x-textarea wire:model.live="orderTypeDeliveryAddress" rows="2"
                                                class="w-full text-sm bg-white/95 dark:bg-gray-800 border-0 shadow-md"
                                                placeholder="{{ __('modules.delivery.fullAddressPlaceholder') }}" />
                                            <x-input-error for="orderTypeDeliveryAddress" class="text-white text-xs" />
                                            @if($orderTypeDeliveryInRange && $orderTypeDeliveryQuotedFee !== null)
                                                <p class="text-xs text-white drop-shadow">
                                                    @lang('modules.delivery.deliveryFee'):
                                                    <span class="font-semibold">{!! currency_format($orderTypeDeliveryQuotedFee, $restaurant->currency_id) !!}</span>
                                                </p>
                                            @endif
                                            <button type="button" wire:click="orderTypeDeliveryContinueFromMap" wire:loading.attr="disabled"
                                                class="w-full py-3 rounded-xl text-white text-sm font-bold shadow-lg"
                                                style="background-color: #011646;">
                                                @lang('app.next')
                                            </button>
                                        </div>
                                    </div>
                                @endif

                                @if($orderTypeDeliveryStep === 'phone' && $orderTypeDeliveryPendingTypeId === $orderType->id)
                                    <div class="absolute inset-0 z-20 bg-black/45 flex items-center justify-center p-4">
                                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-2xl max-w-sm w-full p-6 space-y-5">
                                            {{-- Header: title (RTL right) + circle close button (RTL left) --}}
                                            <div class="flex items-center justify-between gap-3">
                                                <h3 class="py-2 text-base font-bold text-gray-900 dark:text-white flex-1 text-start">
                                                    @lang('modules.customer.phoneVerificationHeading')
                                                </h3>
                                                <button type="button" wire:click="orderTypeDeliveryCloseFlow"
                                                    class="w-9 h-9 flex-shrink-0 flex items-center justify-center rounded-full bg-white shadow-md dark:hover:bg-gray-700 text-gray-500 dark:text-gray-300"
                                                    aria-label="@lang('app.close')">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                    </svg>
                                                </button>
                                            </div>

                                            {{-- Combined phone input --}}
                                            <div class="my-4 flex rounded-lg border border-gray-200 dark:border-gray-600 overflow-hidden focus-within:ring-2 focus-within:ring-gray-300 dark:focus-within:ring-gray-500 bg-white dark:bg-gray-900">
                                                <input type="tel"
                                                class="flex-1 min-w-0 border-0 bg-transparent px-4 py-3 text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-0"
                                                wire:model="orderTypeDeliveryPhone"
                                                placeholder="55XXXXXXX" />
                                                <input type="text"
                                                    class="w-16 shrink-0 border-0 bg-gray-50 px-3 py-3 text-sm text-center font-medium text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-0 border-e border-gray-200 dark:border-gray-600"
                                                    wire:model="orderTypeDeliveryPhoneCode"
                                                    placeholder="+966" />
                                            </div>

                                            <x-input-error for="orderTypeDeliveryPhoneCode" />
                                            <x-input-error for="orderTypeDeliveryPhone" />

                                            <button type="button" wire:click="orderTypeDeliverySendOtp" wire:loading.attr="disabled"
                                                class="w-full py-3 rounded-lg text-white text-base font-bold transition hover:opacity-90 mt-4"
                                                style="background-color: var(--brand-primary);">
                                                <span wire:loading.remove wire:target="orderTypeDeliverySendOtp">@lang('app.next')</span>
                                                <span wire:loading wire:target="orderTypeDeliverySendOtp">...</span>
                                            </button>
                                        </div>
                                    </div>
                                @endif

                                @if($orderTypeDeliveryStep === 'otp' && $orderTypeDeliveryPendingTypeId === $orderType->id)
                                    <div class="absolute inset-0 z-20 bg-black/45 flex items-center justify-center p-4">
                                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-2xl max-w-sm w-full p-6 space-y-5">
                                            {{-- Header: title (RTL right) + circle back/close button (RTL left) --}}
                                            <div class="flex items-center justify-between gap-3">
                                                <h3 class="text-base font-bold text-gray-900 dark:text-white flex-1 text-start">
                                                    @lang('app.verification')
                                                </h3>
                                                <button type="button" wire:click="orderTypeDeliveryBackToPhone"
                                                    class="w-9 h-9 flex-shrink-0 flex items-center justify-center rounded-full shadow-md hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-500 dark:text-gray-300"
                                                    aria-label="@lang('app.back')">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                    </svg>
                                                </button>
                                            </div>

                                            {{-- Info text --}}
                                            <p class="text-sm text-black dark:text-gray-400 text-center">@lang('messages.verificationCodeSent')</p>
                                            <p class="mt-2 mb-3 text-base font-semibold text-gray-900 dark:text-white text-center" dir="ltr">
                                                +{{ $orderTypeDeliveryPhoneCode }} {{ $orderTypeDeliveryPhone }}
                                            </p>

                                            {{-- OTP input --}}
                                            <input type="text" inputmode="numeric" maxlength="6"
                                                class="block w-full rounded-lg border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-900 text-center text-xl leading-none font-semibold tracking-[0.5em] py-2.5 text-gray-900 dark:text-white placeholder-gray-300 dark:placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-500 focus:border-transparent"
                                                wire:model="orderTypeDeliveryOtp"
                                                placeholder="_ _ _ _"
                                                autocomplete="one-time-code" />
                                            <x-input-error for="orderTypeDeliveryOtp" />

                                            <button type="button" wire:click="orderTypeDeliveryVerifyAndComplete" wire:loading.attr="disabled"
                                                class="mt-4 w-full py-3 rounded-lg text-white text-base font-bold transition hover:opacity-90"
                                                style="background-color: var(--brand-primary);">
                                                <span wire:loading.remove wire:target="orderTypeDeliveryVerifyAndComplete">@lang('app.verify')</span>
                                                <span wire:loading wire:target="orderTypeDeliveryVerifyAndComplete">...</span>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @else
                            @foreach(($modalBranchesByOrderTypeId[$orderType->id] ?? collect()) as $branch)
                                <div wire:key="modal-branch-{{ $orderType->id }}-{{ $branch->id }}"
                                    class="rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                                    <div class="flex items-center justify-between px-4 py-3 bg-gray-50 dark:bg-gray-800 gap-2">
                                        <span class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ $branch->name }}</span>
                                        <div class="flex items-center gap-2 flex-shrink-0">
                                            @if($branch->id !== $shopBranch->id)
                                                <a href="{{ route('shop_restaurant', [$restaurant->hash]) }}?branch={{ $branch->unique_hash }}"
                                                    wire:navigate
                                                    class="text-xs font-medium px-2 py-1 rounded-md bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 border border-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    @lang('messages.shopAtThisBranch')
                                                </a>
                                            @endif
                                            <span @class([
                                                'text-xs font-medium px-2.5 py-0.5 rounded-full',
                                                'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' => $branch->is_active,
                                                'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400' => !$branch->is_active,
                                            ])>
                                                {{ $branch->is_active ? __('app.open') : __('app.closed') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="divide-y divide-gray-100 dark:divide-gray-700">
                                        @if($branch->phone)
                                            <div class="flex items-center gap-3 px-4 py-3">
                                                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                                    </svg>
                                                </div>
                                                <span class="text-sm text-gray-700 dark:text-gray-300">{{ $branch->phone }}</span>
                                            </div>
                                        @endif
                                        @if($branch->address)
                                            <div class="flex items-start gap-3 px-4 py-3">
                                                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    </svg>
                                                </div>
                                                <span class="text-sm text-gray-700 dark:text-gray-300">{{ $branch->address }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                @endforeach

                {{-- Confirm Button --}}
                <!-- <button
                    type="button"
                    @click="$wire.call('selectOrderTypeFromModal', activeTab)"
                    class="w-full py-3 px-4 rounded-xl text-white text-sm font-semibold transition hover:opacity-90"
                    style="background-color: #011646;"
                >
                    @lang('app.confirm')
                </button> -->

            </div>
        </x-slot>

        <x-slot name="footer">
        </x-slot>
    </x-dialog-modal>

    @script
    <script>
        $wire.on('init-order-type-delivery-map', () => {
            const MAP_KEY = @js($orderTypeMapApiKey ?? '');
            const BR_LAT = {{ (float) $orderTypeBranchLat }};
            const BR_LNG = {{ (float) $orderTypeBranchLng }};
            const el = document.getElementById('order-type-delivery-map');
            if (!el) return;
            el.innerHTML = '';

            const start = () => {
                if (!window.google?.maps?.marker?.AdvancedMarkerElement) {
                    setTimeout(start, 80);
                    return;
                }
                const geocoder = new google.maps.Geocoder();
                const map = new google.maps.Map(el, {
                    center: { lat: BR_LAT, lng: BR_LNG },
                    zoom: 15,
                    gestureHandling: 'greedy',
                    zoomControl: true,
                    mapTypeControl: false,
                    streetViewControl: false,
                    mapId: 'ORDER_TYPE_DELIVERY_MAP',
                });
                const marker = new google.maps.marker.AdvancedMarkerElement({
                    map,
                    position: { lat: BR_LAT, lng: BR_LNG },
                    gmpDraggable: true,
                });
                const pushPin = (lat, lng) => {
                    marker.position = { lat, lng };
                    map.panTo({ lat, lng });
                    geocoder.geocode({ location: { lat, lng } }, (results, status) => {
                        const addr = (status === 'OK' && results[0]) ? results[0].formatted_address : '';
                        $wire.call('syncOrderTypeDeliveryPin', lat, lng, addr);
                    });
                };
                map.addListener('click', (e) => pushPin(e.latLng.lat(), e.latLng.lng()));
                marker.addListener('dragend', () => {
                    const p = marker.position;
                    const lat = typeof p.lat === 'function' ? p.lat() : p.lat;
                    const lng = typeof p.lng === 'function' ? p.lng() : p.lng;
                    pushPin(lat, lng);
                });
                pushPin(BR_LAT, BR_LNG);
            };

            if (window.google?.maps?.marker?.AdvancedMarkerElement) {
                setTimeout(start, 120);
                return;
            }
            const cbName = 'otDelMapCb_' + Math.random().toString(36).slice(2, 11);
            window[cbName] = () => {
                delete window[cbName];
                start();
            };
            const script = document.createElement('script');
            script.src = MAP_KEY
                ? 'https://maps.googleapis.com/maps/api/js?key=' + encodeURIComponent(MAP_KEY) + '&libraries=marker&callback=' + cbName
                : 'https://maps.googleapis.com/maps/api/js?libraries=marker&callback=' + cbName;
            script.async = true;
            document.head.appendChild(script);
        });
    </script>
    @endscript

    <!-- Location Access Modal -->
    <x-dialog-modal wire:model="showLocationModal" maxWidth="sm">
        <x-slot name="title">
            @lang('app.locationAccess')
        </x-slot>

        <x-slot name="content">
            <div class="space-y-3 text-sm text-gray-700 dark:text-gray-300">
                <p>@lang('app.locationAccessMessage')</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    @lang('app.locationAccessOptional')
                </p>

                @error('location')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex gap-3">
                <x-button
                    class="flex-1 h-9 inline-flex items-center justify-center border-0 px-3 py-2"
                    wire:click="requestCustomerLocation"
                >
                    @lang('app.allow')
                </x-button>

                <x-button-cancel
                    class="flex-1 h-9 inline-flex items-center justify-center px-3 py-2"
                    wire:click="$toggle('showLocationModal')"
                    wire:loading.attr="disabled"
                >
                    @lang('app.cancel')
                </x-button-cancel>
            </div>
        </x-slot>

    </x-dialog-modal>




    {{-- Admin: Settings → Customer site (text header or image carousel) --}}
    <x-shop-banner :restaurant="$restaurant" />

    @if ($showMenu)
        <div class="grid grid-cols-1 gap-6 px-4 mt-4 mb-32 items-start md:grid-cols-3 lg:grid-cols-4"
            x-data="{
                loadedCount: @entangle('menuItemsLoaded'),
                totalCount: {{ $this->totalMenuItemsCount }},
                isLoading: false,
                get allItemsLoaded() { return this.loadedCount >= this.totalCount; },
                scrollHandler() {
                    if (this.allItemsLoaded || this.isLoading) return;
                    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                    const windowHeight = window.innerHeight;
                    const documentHeight = document.documentElement.scrollHeight;
                    if (documentHeight - scrollTop <= windowHeight + 250) {
                        this.isLoading = true;
                        $wire.loadMoreMenuItems().then(() => { this.isLoading = false; });
                    }
                }
            }"
            x-init="window.addEventListener('scroll', () => scrollHandler()); $watch('loadedCount', () => { totalCount = {{ $this->totalMenuItemsCount }}; });"
            @scroll.window.throttle.200ms="scrollHandler()">

            <!-- Categories (1fr): same fixed-in-viewport behavior as receipt (tracks grid cell on scroll/resize) -->
            <div class="hidden lg:block w-full min-w-0 lg:col-span-1"
                x-data="{
                    categoriesFixedStyle: '',
                    categoriesFixedSync() {
                        const cell = this.$el;
                        const rect = cell.getBoundingClientRect();
                        const inset = 16;
                        const headerReserve = 90;
                        const top = Math.max(inset, rect.top, headerReserve);
                        const maxH = Math.max(220, window.innerHeight - top - inset);
                        const w = rect.width;
                        const rtl = document.documentElement.getAttribute('dir') === 'rtl';
                        if (rtl) {
                            this.categoriesFixedStyle = 'position:fixed;z-index:20;overflow-y:auto;top:' + top + 'px;left:' + rect.left + 'px;width:' + w + 'px;max-height:' + maxH + 'px;';
                        } else {
                            this.categoriesFixedStyle = 'position:fixed;z-index:20;overflow-y:auto;top:' + top + 'px;right:' + (window.innerWidth - rect.right) + 'px;width:' + w + 'px;max-height:' + maxH + 'px;';
                        }
                    },
                    init() {
                        this.categoriesFixedSync();
                        window.addEventListener('resize', () => this.categoriesFixedSync());
                        window.addEventListener('scroll', () => this.categoriesFixedSync(), { passive: true });
                        this.$nextTick(() => {
                            const el = this.$refs.categoriesFixedPanel;
                            if (el && typeof ResizeObserver !== 'undefined') {
                                new ResizeObserver(() => this.categoriesFixedSync()).observe(el);
                            }
                        });
                    }
                }">
                <div x-ref="categoriesFixedPanel" class="pb-4 scrollbar-hide" :style="categoriesFixedStyle">

                    <!-- Single bordered container — click scrolls to section, highlights on scroll -->
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden shadow-sm"
                        x-data="{ activecat: '{{ $this->categoryList->first()?->id }}' }"
                        x-init="
                            const observer = new IntersectionObserver((entries) => {
                                entries.forEach(entry => {
                                    if (entry.isIntersecting) activecat = entry.target.dataset.catid;
                                });
                            }, { rootMargin: '-20% 0px -60% 0px' });
                            document.querySelectorAll('[data-catid]').forEach(el => observer.observe(el));
                        ">

                        @foreach ($this->categoryList as $cat)
                            @php $catName = $cat->getTranslation('category_name', session('locale', app()->getLocale())); @endphp
                            <button
                                @click="
                                    activecat = '{{ $cat->id }}';
                                    const el = document.getElementById('cat-section-{{ $cat->id }}');
                                    if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                                "
                                class="w-full flex items-center gap-2 px-4 py-3 text-left text-sm font-semibold transition-colors text-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700"
                                :class="activecat == '{{ $cat->id }}' ? 'text-gray-900 dark:text-white' : ''"
                                wire:key="cat-filter-{{ $cat->id }}">
                                <svg class="w-3 h-3 flex-shrink-0 rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                                <span class="truncate">{{ $catName }}</span>
                            </button>
                        @endforeach

                    </div><!-- end single border container -->

                </div>
            </div>

            <!-- Products listing (right on desktop) -->
            <div class="min-w-0 w-full space-y-4 md:col-span-2 self-start overflow-visible">
                @if ($this->categoryList->isNotEmpty())
                    <div class="lg:hidden w-full min-w-0 mb-1 max-md:-mx-4 md:mx-0 min-h-[3.25rem] shrink-0"
                        x-data="{
                            activecat: '{{ $this->categoryList->first()?->id }}',
                            chipBarStyle: '',
                            chipBarSync() {
                                const cell = this.$el;
                                const rect = cell.getBoundingClientRect();
                                const headerReserve = 68;
                                const top = Math.max(headerReserve, rect.top);
                                const w = Math.max(0, rect.width);
                                const l = rect.left;
                                this.chipBarStyle = 'position:fixed;z-index:40;top:' + top + 'px;left:' + l + 'px;width:' + w + 'px;overflow-x:auto;-webkit-overflow-scrolling:touch;';
                            },
                            init() {
                                this.chipBarSync();
                                window.addEventListener('resize', () => this.chipBarSync());
                                window.addEventListener('scroll', () => this.chipBarSync(), { passive: true });
                                this.$nextTick(() => {
                                    if (typeof ResizeObserver !== 'undefined') {
                                        new ResizeObserver(() => this.chipBarSync()).observe(this.$el);
                                    }
                                });
                                const observer = new IntersectionObserver((entries) => {
                                    entries.forEach(entry => {
                                        if (entry.isIntersecting) this.activecat = entry.target.dataset.catid;
                                    });
                                }, { rootMargin: '-20% 0px -60% 0px' });
                                document.querySelectorAll('[data-catid]').forEach(el => observer.observe(el));
                            }
                        }">
                        <div class="flex gap-2 scrollbar-hide snap-x snap-mandatory px-4 py-2 touch-pan-x bg-white dark:bg-gray-900"
                            :style="chipBarStyle">
                            @foreach ($this->categoryList as $cat)
                                @php $catName = $cat->getTranslation('category_name', session('locale', app()->getLocale())); @endphp
                                <button
                                    type="button"
                                    wire:key="cat-chip-{{ $cat->id }}"
                                    @click="
                                        activecat = '{{ $cat->id }}';
                                        const el = document.getElementById('cat-section-{{ $cat->id }}');
                                        if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                                    "
                                    class="flex-shrink-0 snap-center whitespace-nowrap rounded-md px-4 py-2.5 text-sm font-normal transition"
                                    :class="activecat == '{{ $cat->id }}'
                                        ? 'bg-[#011646] text-white'
                                        : 'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-200'"
                                >
                                    {{ $catName }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                @endif
                @forelse ($this->menuItems as $key => $itemCat)
                    @php $catSection = $this->categoryList->firstWhere('category_name->'.session('locale', app()->getLocale()), $key) ?? $this->categoryList->first(fn($c) => $c->getTranslation('category_name', session('locale', app()->getLocale())) === $key); @endphp
                    <h3 id="cat-section-{{ $catSection?->id ?? Str::slug($key) }}"
                        data-catid="{{ $catSection?->id ?? Str::slug($key) }}"
                        class="mb-4 text-base font-semibold text-gray-900 lg:text-xl dark:text-white scroll-mt-4">{{ $key }}</h3>
                    <div class="space-y-4 grid grid-cols-1 gap-1">
                        @foreach ($itemCat as $item)
                            <div
                                @class([
                                    'cursor-pointer border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg shadow-sm hover:shadow-md transition',
                                    'opacity-70' => !$item->in_stock,
                                ])
                                wire:key='menu-item-{{ $item->id . microtime() }}'
                                wire:click='addCartItems({{ $item->id }}, {{ $item->variations_count }}, {{ $item->modifier_groups_count }})'
                            >
                                <div class="flex items-stretch justify-between gap-4 p-4 w-full">
                                    <div class="flex-1 min-w-0 flex-col items-start justify-between gap-4">
                                        <div class="flex items-start justify-between gap-4">
                                            <div class="min-w-0">
                                                <div class="inline-flex items-center gap-2 text-base font-bold text-gray-900 dark:text-white">
                                                    {{-- <img src="{{ asset('img/' . $item->type . '.svg') }}" class="h-4"
                                                        title="@lang('modules.menu.' . $item->type)" alt="" /> --}}
                                                    <span class="truncate">{{ $item->getTranslatedValue('item_name', session('locale')) }}</span>
                                                </div>
                                                {{-- @if ($item->calories)
                                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                                        {{ $item->calories }}
                                                    </div>
                                                @endif --}}
                                                @if ($item->description)
                                                    <div class="mt-1 text-sm text-gray-500 dark:text-gray-400 line-clamp-2">
                                                        {{ $item->getTranslatedValue('description', session('locale')) }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="mt-4 flex items-center justify-between gap-3">
                                            <div class="flex items-center gap-3 min-w-0 flex-1">
                                                @if ($item->variations_count == 0)
                                                    <span class="inline-flex items-center px-3 py-1 rounded-lg bg-[#F7F7F7] dark:bg-gray-800 font-medium text-gray-900 dark:text-black whitespace-nowrap" style="background-color: #F7F7F7;">
                                                        {!! currency_format($item->price, $restaurant->currency_id) !!}
                                                    </span>
                                                @endif
                                               {{-- @if ($item->preparation_time)
                                                    <span class="text-xs text-gray-600 dark:text-gray-400 truncate">
                                                        @lang('modules.menu.preparationTime') : {{ $item->preparation_time }} @lang('modules.menu.minutes')
                                                    </span>
                                                @endif --}}
                                            </div>

                                            <div class="flex items-center justify-end gap-2 shrink-0">
                                                @if ($item->calories)
                                                    <span class="inline-flex items-center px-3 py-1.5 text-xs rounded-lg bg-[#F7F7F7] dark:bg-gray-800 font-medium text-gray-900 dark:text-black whitespace-nowrap" style="background-color: #F7F7F7;">
                                                        {{ $item->calories }} @lang('modules.menu.calories')
                                                    </span>
                                                @endif
                                                @if ($canCreateOrder)
                                                    @if (!$item->in_stock)
                                                        <div class="text-sm font-semibold text-red-600">@lang('modules.menu.notAvailable')</div>
                                                    @elseif ($item->variations_count > 0 && $restaurant->allow_customer_orders)
                                                        <x-secondary-button-table wire:click='showItemVariations({{ $item->id }})'>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 me-1" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                                            </svg>
                                                            @lang('modules.menu.showVariations') ({{ $item->variations_count }})
                                                        </x-secondary-button-table>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="w-28 h-28 rounded-md overflow-hidden flex-shrink-0"
                                    >
                                        <img
                                            class="w-full h-full object-cover cart-item-photo-invert"
                                            src="{{ $item->item_photo_url }}"
                                            alt="{{ $item->item_name }}"
                                        >
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @empty
                    <div class="flex flex-col items-center justify-center p-6 text-center text-gray-500 dark:text-gray-400">
                        <svg width="100" height="100" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path d="M4 14a8 8 0 0 1 16 0z" fill="#e5e7eb"/>
                            <rect x="3" y="14" width="18" height="2.5" rx=".5" fill="#d1d5db"/>
                            <circle cx="12" cy="4.5" r=".8" fill="#9ca3af"/>
                            <circle cx="9.5" cy="10" r=".5" fill="#4b5563"/>
                            <circle cx="14.5" cy="10" r=".5" fill="#4b5563"/>
                        </svg>
                        <span class="text-lg">@lang('messages.noItemAdded')</span>
                    </div>
                @endforelse

                <style>
                    .dark .cart-item-photo-invert {
                        filter: invert(1) brightness(10) !important;
                    }
                </style>

                <!-- Load More Indicator -->
                <div class="flex items-center justify-center py-6 px-4">
                    @if(!$this->allItemsLoaded)
                        <div wire:loading wire:target="loadMoreMenuItems" class="flex items-center justify-center gap-3 text-gray-600 dark:text-gray-400">
                            <svg class="inline animate-spin h-6 w-6" style="color: var(--brand-primary);" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0 1 8-8V0C5.373 0 0 5.373 0 12zm2 5.291A7.96 7.96 0 0 1 4 12H0c0 3.042 1.135 5.824 3 7.938z"/>
                            </svg>
                            <span class="text-sm font-medium">@lang('messages.loadingData')</span>
                        </div>
                    @else
                        <div class="flex items-center gap-x-1 text-gray-500 dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0"/>
                            </svg>
                            <span class="text-sm font-medium">@lang('messages.allItemsLoaded')</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Receipt (1fr): fixed in viewport; top + horizontal edge track the grid cell (updates on scroll/resize) -->
            <div class="hidden md:block w-full min-w-0 md:col-span-1"
                x-data="{
                    receiptFixedStyle: '',
                    receiptFixedSync() {
                        const cell = this.$el;
                        const rect = cell.getBoundingClientRect();
                        const inset = 16;
                        const headerReserve = 90;
                        const top = Math.max(inset, rect.top, headerReserve);
                        const maxH = Math.max(220, window.innerHeight - top - inset);
                        const w = rect.width;
                        const rtl = document.documentElement.getAttribute('dir') === 'rtl';
                        if (rtl) {
                            this.receiptFixedStyle = 'position:fixed;z-index:20;overflow-y:auto;top:' + top + 'px;left:' + rect.left + 'px;width:' + w + 'px;max-height:' + maxH + 'px;';
                        } else {
                            this.receiptFixedStyle = 'position:fixed;z-index:20;overflow-y:auto;top:' + top + 'px;right:' + (window.innerWidth - rect.right) + 'px;width:' + w + 'px;max-height:' + maxH + 'px;';
                        }
                    },
                    init() {
                        this.receiptFixedSync();
                        window.addEventListener('resize', () => this.receiptFixedSync());
                        window.addEventListener('scroll', () => this.receiptFixedSync(), { passive: true });
                        this.$nextTick(() => {
                            const el = this.$refs.receiptFixedPanel;
                            if (el && typeof ResizeObserver !== 'undefined') {
                                new ResizeObserver(() => this.receiptFixedSync()).observe(el);
                            }
                        });
                    }
                }">
                <div x-ref="receiptFixedPanel" class="pb-4 scrollbar-hide" :style="receiptFixedStyle">
                @if ($cartQty > 0)
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-sm overflow-hidden">

                        <!-- Items list -->
                        <div class="divide-y divide-gray-100 dark:divide-gray-700 max-h-[60vh] overflow-y-auto scrollbar-hide">
                            @foreach ($orderItemList as $key => $item)
                            <div class="p-4" wire:key="receipt-item-{{ $key }}">

                                <!-- Name + Price row -->
                                <div class="flex items-center justify-between gap-2">
                                    <span class="text-sm font-semibold text-gray-900 dark:text-white text-end truncate">
                                        {{ $item->getTranslatedValue('item_name', session('locale')) }}
                                    </span>
                                    <span class="text-sm font-semibold text-gray-900 dark:text-white whitespace-nowrap">
                                        {!! currency_format($orderItemAmount[$key], $restaurant->currency_id) !!}
                                    </span>
                                </div>
                                @if ($item->calories)
                                    <div class="text-xs text-gray-500 dark:text-gray-400 text-end mt-0.5">
                                        {{ $item->calories }}
                                    </div>
                                @endif

                                <!-- Addons toggle -->
                                @if (!empty($itemModifiersSelected[$key]))
                                <div x-data="{ open: false }" class="mt-1">
                                    <button type="button" @click="open = !open"
                                        class="flex items-center gap-1 text-xs font-medium"
                                        style="color: var(--brand-primary);">
                                        <svg x-bind:class="open ? 'rotate-180' : ''" class="w-3 h-3 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                                        </svg>
                                        @lang('app.show')
                                    </button>
                                    <div x-show="open" x-collapse class="mt-1 space-y-0.5 text-end">
                                        @php
                                            $groupedModifiers = [];
                                            $allModOpts = \App\Models\ModifierOption::with('modifierGroup')
                                                ->whereIn('id', $itemModifiersSelected[$key])
                                                ->get()->keyBy('id');
                                            foreach ($itemModifiersSelected[$key] as $modOptId) {
                                                $opt = $allModOpts[$modOptId] ?? null;
                                                if ($opt) {
                                                    $groupName = $opt->modifierGroup->name ?? '';
                                                    $groupedModifiers[$groupName][] = $opt->name;
                                                }
                                            }
                                        @endphp
                                        @foreach ($groupedModifiers as $groupName => $optionNames)
                                        <div>
                                            <div class="text-xs font-semibold text-gray-700 dark:text-gray-300">{{ $groupName }}.. :</div>
                                            @foreach ($optionNames as $optName)
                                            <div class="text-xs text-gray-500 dark:text-gray-400">{{ $optName }} ({{ $orderItemQty[$key] ?? 1 }})</div>
                                            @endforeach
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <!-- Controls: delete | minus | qty | plus -->
                                <div class="flex items-center justify-end gap-2 mt-3">
                                    <!-- Plus -->
                                    <button type="button" wire:click="addQty('{{ $key }}')"
                                    class="w-7 h-7 flex items-center justify-center rounded-md text-white flex-shrink-0"
                                    style="background-color: #011646;">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                    </svg>
                                </button>
                                <!-- Qty -->
                                <span class="min-w-[1.5rem] text-center text-base sm:text-lg font-semibold text-gray-900 dark:text-white">{{ $orderItemQty[$key] ?? 1 }}</span>
                                <!-- Minus -->
                                <button type="button" wire:click="subQty('{{ $key }}')"
                                    class="w-7 h-7 flex items-center justify-center rounded-md text-white flex-shrink-0"
                                    style="background-color: #011646;">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                    </svg>
                                </button>
                                <!-- Delete -->
                                <button type="button" wire:click="removeItem('{{ $key }}')"
                                    class="w-7 h-7 flex items-center justify-center rounded-md bg-red-500 hover:bg-red-600 text-white flex-shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                                </div>

                            </div>
                            @endforeach
                        </div>

                        <!-- Summary + Place Order -->
                        <div class="p-4 border-t border-gray-100 dark:border-gray-700 space-y-2">
                            <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-400">
                                <span>@lang('modules.order.subTotal')</span>
                                <span>{!! currency_format($subTotal, $restaurant->currency_id) !!}</span>
                            </div>
                            <div class="flex items-center justify-between text-sm font-bold text-gray-900 dark:text-white">
                                <span>@lang('modules.order.total')</span>
                                <span>{!! currency_format($total, $restaurant->currency_id) !!}</span>
                            </div>

                            @if ($canCreateOrder && $restaurant->allow_customer_orders)
                            <div class="pt-2">
                                @php
                                    $sidebarPayNow = $paymentGateway && (
                                        $paymentGateway->is_qr_payment_enabled ||
                                        $paymentGateway->stripe_status ||
                                        $paymentGateway->razorpay_status ||
                                        $paymentGateway->flutterwave_status ||
                                        $paymentGateway->paypal_status ||
                                        $paymentGateway->payfast_status ||
                                        $paymentGateway->xendit_status ||
                                        ($paymentGateway->epay_status ?? false) ||
                                        $paymentGateway->is_offline_payment_enabled
                                    );
                                @endphp
                                <button type="button"
                                    wire:click="{{ $sidebarPayNow ? 'placeOrder(true)' : 'placeOrder' }}"
                                    wire:loading.attr="disabled"
                                    class="w-full py-3 rounded-md text-white font-bold text-sm flex items-center justify-center gap-2"
                                    style="background-color: #011646;">
                                    <span wire:loading.remove wire:target="placeOrder">
                                        {{ $sidebarPayNow ? __('modules.order.payNow') : __('modules.order.placeOrder') }}
                                    </span>
                                    <span wire:loading wire:target="placeOrder">
                                        <svg class="w-5 h-5 animate-spin" viewBox="0 0 24 24" fill="none">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                            @endif
                        </div>

                    </div>
                @else
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm p-8 text-center">
                        <div class="mx-auto mb-4 h-14 w-14 rounded-md bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                            <svg class="w-7 h-7 text-gray-400 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 7.5M17 13l1.5 7.5M9 21h6"/>
                            </svg>
                        </div>
                        <div class="text-base font-semibold text-gray-400 dark:text-white">
                            أضف أصناف من القائمة
                        </div>
                    </div>
                @endif
            </div>
            </div>

        </div>

        <div class="fixed flex justify-center w-full max-w-lg gap-6 px-4 bottom-24 lg:hidden">
            @if ($this->shouldShowWaiterButtonMobile)
                @livewire('forms.callWaiterButton', ['tableNumber' => $table->id ?? null, 'shopBranch' => $shopBranch])
            @endif
            @if (is_null(customer()) && $restaurant->customer_login_required)
                <x-button type="button" wire:click="$dispatch('showSignup')">@lang('app.login')</x-button>
            @endif
        </div>

        {{-- @if ($cartQty > 0)
            <div class="fixed z-10 flex items-center justify-between w-full max-w-lg p-4 mx-auto antialiased font-bold text-white rounded-md lg:max-w-screen-xl dark:bg-gray-800 bottom-1 left-1/2 -translate-x-1/2"
                style="background-color: var(--brand-primary);">
                <div>@lang('modules.order.totalItem'): {{ $cartQty }} &nbsp;|&nbsp;
                    {!! currency_format($subTotal, $restaurant->currency_id) !!} + @lang('modules.order.taxes')</div>
                <x-secondary-button wire:click="showCartItems">@lang('modules.order.viewCart')</x-secondary-button>
            </div>
        @endif --}}
    @endif

    @if ($showCart)

        {{-- Order type selection removed - users select at the beginning via modal --}}

        <div class="px-4 mt-4 space-y-4">
            @foreach ($orderItemList as $key => $item)
                <div class="flex items-center justify-between gap-6 transition bg-white border rounded-lg shadow-sm hover:shadow-md dark:border-gray-600 dark:lg:bg-gray-900 dark:shadow-sm"
                    wire:key='menu-item-{{ $item->id . microtime() }}'>
                    <div class="flex w-full p-4 space-x-4 dark:bg-gray-800 dark:text-gray-200">
                        <!-- Item Image -->
                        @if ($restaurant && !$restaurant->hide_menu_item_image_on_customer_site)

                            <img class="object-cover w-10 h-10 rounded-lg cursor-pointer lg:w-16 lg:h-16"
                                wire:click="showItemDetail({{ $item->id }})" src="{{ $item->item_photo_url }}"
                                alt="{{ $item->item_name }}">
                        @endif

                        <!-- Item Details -->
                        <div class="flex-1 min-w-0">
                            <div
                                class="flex flex-col items-start justify-between w-full gap-2 sm:flex-row sm:items-baseline">
                                <!-- Item Name and Details -->
                                <div class="flex flex-wrap items-center gap-2">
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        <img src="{{ asset('img/' . $item->type . '.svg') }}" class="h-4 me-2"
                                            title="@lang('modules.menu.' . $item->type)" alt="" />
                                        {{ $item->item_name }}
                                    </div>
                                    @if ($item->calories)
                                        <span class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ $item->calories }}
                                        </span>
                                    @endif

                                    @if (isset($orderItemVariation[$key]))
                                        <span
                                            class="px-2.5 py-0.5 bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-sm text-xs font-sm">
                                            {{ $orderItemVariation[$key]->variation }}
                                        </span>
                                    @endif

                                    {{-- @if ($item->preparation_time)
                                        <span class="text-xs text-gray-500 dark:text-gray-400">
                                            @lang('modules.menu.preparationTime'): {{ $item->preparation_time }} @lang('modules.menu.minutes')
                                        </span>
                                    @endif --}}
                                </div>

                                <!-- Quantity Controls and Price -->
                                <div class="flex flex-wrap items-center justify-between gap-3 sm:w-auto md:w-1/3">
                                    <!-- Quantity Controls -->
                                    <div class="flex items-center">
                                        <button type="button" wire:click="subQty('{{ $key }}')"
                                            class="h-8 p-2 border border-gray-300 bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 rounded-s-md">
                                            <svg class="w-2 h-2 text-gray-900 dark:text-white" aria-hidden="true"
                                                viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                            </svg>
                                        </button>

                                        <input type="text" wire:model='orderItemQty.{{ $key }}'
                                            class="w-12 h-8 text-sm text-center text-gray-900 bg-white border-gray-300 border-x-0 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                            readonly />

                                        <button type="button" wire:click="addQty('{{ $key }}')"
                                            class="h-8 p-2 border border-gray-300 bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 rounded-e-md">
                                            <svg class="w-2 h-2 text-gray-900 dark:text-white" aria-hidden="true"
                                                viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Price and Amount -->
                                    @php
                                        // Use display price (base price without tax for inclusive items)
                                        $displayPrice = $this->getItemDisplayPrice($key);
                                        // Total amount per line (what customer pays)
                                        $totalAmount = $orderItemAmount[$key];
                                    @endphp
                                    <div class="flex flex-col items-end gap-1">
                                        @if ($taxMode === 'item' && $restaurant?->tax_inclusive)
                                            <div class="text-xs text-gray-500 dark:text-gray-400">
                                                {!! currency_format($displayPrice, $restaurant->currency_id) !!} ×
                                                {{ $orderItemQty[$key] }}
                                            </div>
                                        @endif
                                        <span
                                            class="text-base font-semibold text-gray-900 dark:text-white whitespace-nowrap">
                                            {!! currency_format($totalAmount, $restaurant->currency_id) !!}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Modifiers (Shown below if present) -->
                            @if (!empty($itemModifiersSelected[$key]))
                                <div class="flex flex-wrap gap-2 mt-2">
                                    @foreach ($itemModifiersSelected[$key] as $modifierOptionId)
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-[var(--brand-primary)]/10" style="color: var(--brand-primary);">
                                            {{ $this->modifierOptions[$modifierOptionId]->name }}
                                            <span class="ml-1" style="color: var(--brand-primary);">
                                                {!! currency_format($this->modifierOptions[$modifierOptionId]->price, $this->modifierOptions[$modifierOptionId]->modifierGroup->branch->restaurant->currency_id) !!}
                                            </span>
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Item Notes Section -->
                            <div class="mt-2">
                                @if (isset($this->itemNotes[$key]) && !empty($this->itemNotes[$key]))
                                    <div class="flex items-center mt-2">
                                        <span
                                            class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-600 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">
                                            <svg class="w-3.5 h-3.5 mr-1.5" viewBox="0 0 24 24" stroke="currentColor"
                                                fill="none">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 8h10M7 12h4m1 8-4-4H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-3z" />
                                            </svg>
                                            <span class="mr-1.5">{{ $this->itemNotes[$key] }}</span>
                                            <button wire:click="$set('itemNotes.{{ $key }}', '')"
                                                class="text-gray-400 transition-colors duration-200 hover:text-red-500">
                                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                @else
                                    <div x-data="{ showNoteInput: false, noteText: '' }" class="mt-2">
                                        <button x-show="!showNoteInput"
                                            @click="showNoteInput = true; $nextTick(() => $refs.noteInput.focus())"
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1.5 text-xs font-medium rounded-full text-gray-700 hover:bg-[var(--brand-primary)]/10 hover:text-[var(--brand-primary)] dark:text-gray-300 dark:hover:text-gray-200 dark:hover:bg-gray-600 transition-all duration-200 group">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                class="w-3.5 h-3.5 group-hover:scale-110 transition-transform duration-200"
                                                xml:space="preserve">
                                                <path
                                                    d="M11.3 26.5 4 28l1.5-7.3L21.6 4.5c.8-.8 2.1-.8 2.9 0l2.9 2.9c.8.8.8 2.1 0 2.9zm7.4-19 5.8 5.8m-5.8 0-8.8 8.8"
                                                    style="fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10" />
                                            </svg>
                                            <span class="whitespace-nowrap">@lang('modules.order.addNote')</span>
                                        </button>
                                        <div x-show="showNoteInput" x-cloak @click.away="showNoteInput = false"
                                            x-transition:enter="transition ease-out duration-200"
                                            x-transition:enter-start="opacity-0 transform scale-95"
                                            x-transition:enter-end="opacity-100 transform scale-100"
                                            class="flex items-center mt-2">

                                            <div class="flex w-full">
                                                <div class="relative flex-1">
                                                    <x-input x-ref="noteInput" x-model="noteText" type="text"
                                                        class="w-full pr-20 text-sm border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-[var(--brand-primary)] focus:border-[var(--brand-primary)]"
                                                        :placeholder="__('placeholders.addItemNotesPlaceholder')"
                                                        @keydown.enter="$wire.set('itemNotes.{{ $key }}', noteText); showNoteInput = false" />
                                                    <div
                                                        class="absolute inset-y-0 right-0 flex items-center gap-1 pr-2">
                                                        <button
                                                            @click="$wire.set('itemNotes.{{ $key }}', noteText); showNoteInput = false"
                                                            class="p-1.5 text-white rounded-md hover:opacity-90 transition-colors duration-200" style="background-color: var(--brand-primary);"
                                                            title="@lang('app.save')">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="w-3.5 h-3.5" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="m5 13 4 4L19 7" />
                                                            </svg>
                                                        </button>
                                                        <button @click="showNoteInput = false"
                                                            class="p-1.5 text-gray-500 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200"
                                                            title="@lang('app.cancel')">
                                                            <svg class="w-3.5 h-3.5"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M6 18 18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @if ($cartQty > 0)
                <div>
                    <div
                        class="w-full h-auto p-4 mt-3 space-y-4 text-center rounded select-none bg-gray-50 dark:bg-gray-700">
                        <div class="mb-3">
                            <div x-data="{ showNotes: false }" x-cloak>
                                <!-- Add Note Button -->
                                <div x-show="!showNotes && !$wire.orderNote" class="flex">
                                    <x-secondary-button @click="showNotes = true"
                                        class="inline-flex items-center gap-2">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                        @lang('modules.order.addNote')
                                    </x-secondary-button>
                                </div>

                                <!-- Notes Form -->
                                <div x-show="showNotes" x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform scale-95"
                                    x-transition:enter-end="opacity-100 transform scale-100" class="mt-3">

                                    <div
                                        class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                        <!-- Header -->
                                        <div
                                            class="flex items-center justify-between p-3 border-b border-gray-200 dark:border-gray-700">
                                            <h3 class="font-medium text-gray-900 dark:text-white">
                                                @lang('modules.order.addNote')
                                            </h3>
                                            <x-secondary-button @click="showNotes = false" class="!p-1.5">
                                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18 18 6M6 6l12 12" />
                                                </svg>
                                            </x-secondary-button>
                                        </div>

                                        <!-- Form Content -->
                                        <div class="p-3">
                                            <x-textarea id="orderNote" class="block w-full mt-1" rows="3"
                                                wire:model.live.debounce.750ms="orderNote"
                                                placeholder="{{ __('placeholders.addOrderNotesPlaceholder') }}" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Preview Note -->
                                <div x-show="!showNotes && $wire.orderNote"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform translate-y-2"
                                    x-transition:enter-end="opacity-100 transform translate-y-0" class="mt-3">
                                    <div
                                        class="flex items-center justify-between p-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700/50 dark:border-gray-600">
                                        <!-- Note Icon & Text -->
                                        <div class="flex items-center gap-3">
                                            <svg class="w-5 h-5 text-gray-400" width="24" height="24"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M6 11h8V9H6zm0 4h8v-2H6zm0-8h4V5H6zm6-5H5.5A1.5 1.5 0 0 0 4 3.5v13A1.5 1.5 0 0 0 5.5 18h9a1.5 1.5 0 0 0 1.5-1.5V6z"
                                                    fill="currentColor" />
                                            </svg>
                                            <p class="text-sm text-gray-600 dark:text-gray-300">{{ $orderNote }}
                                            </p>
                                        </div>

                                        <!-- Edit Button -->
                                        <button @click="showNotes = true"
                                            class="flex items-center gap-1.5 hover:opacity-80 hover:scale-110 p-1" style="color: var(--brand-primary);">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="m15.232 5.232 3.536 3.536m-2.036-5.036a2.5 2.5 0 1 1 3.536 3.536L6.5 21.036H3v-3.572z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                            <div>
                                @lang('modules.order.totalItem')
                            </div>
                            <div>
                                {{ count($orderItemList) }}
                            </div>
                        </div>

                        <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                            <div>
                                @lang('modules.order.subTotal')
                            </div>
                            <div>
                                {!! currency_format($subTotal, $restaurant->currency_id) !!}
                            </div>
                        </div>

                        @if (count($orderItemList) > 0 && $extraCharges && count($extraCharges) > 0)
                            @foreach ($extraCharges as $charge)
                                <div wire:key="extra-charge-{{ $loop->index }}"
                                    class="flex justify-between text-sm text-gray-500 dark:text-neutral-400">
                                    <div class="inline-flex items-center gap-x-1">{{ $charge->charge_name }}
                                        @if ($charge->charge_type == 'percent')
                                            ({{ $charge->charge_value }}%)
                                        @endif
                                    </div>
                                    <div>
                                        {!! currency_format($charge->getAmount($subTotal), $restaurant->currency_id) !!}
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        @if ($taxMode == 'order')
                            @foreach ($taxes ?? [] as $item)
                                <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400" wire:key="order-tax-{{ $item->id }}">
                                    <div>
                                        {{ $item->tax_name }} ({{ $item->tax_percent }}%)
                                    </div>
                                    <div>
                                        {!! currency_format(($item->tax_percent / 100) * $subTotal, $restaurant->currency_id) !!}
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @if (!empty($orderItemTaxDetails) && count($orderItemTaxDetails))
                                @php
                                    $taxTotals = [];
                                    $totalTax = 0;
                                    foreach ($orderItemTaxDetails as $item) {
                                        $qty = $item['qty'] ?? 1;
                                        foreach ($item['tax_breakup'] as $taxName => $taxInfo) {
                                            if (!isset($taxTotals[$taxName])) {
                                                $taxTotals[$taxName] = [
                                                    'percent' => $taxInfo['percent'],
                                                    'amount' => $taxInfo['amount'] * $qty,
                                                ];
                                            } else {
                                                $taxTotals[$taxName]['amount'] += $taxInfo['amount'] * $qty;
                                            }
                                        }
                                        $totalTax += collect($item['tax_amount'])->sum();
                                    }
                                @endphp
                                @foreach ($taxTotals as $taxName => $taxInfo)
                                    <div class="flex justify-between text-xs text-gray-500 dark:text-neutral-400">
                                        <div>
                                            {{ $taxName }} ({{ $taxInfo['percent'] }}%)
                                        </div>
                                        <div>
                                            {!! currency_format($taxInfo['amount'], $restaurant->currency_id) !!}
                                        </div>
                                    </div>
                                @endforeach
                                <div class="flex justify-between mt-2 text-sm text-gray-500 dark:text-neutral-400">
                                    <div>
                                        @lang('modules.order.totalTax')
                                        <span
                                            class="ml-2 px-2 py-0.5 rounded text-xs bg-gray-100 dark:bg-gray-600 text-gray-600 dark:text-gray-300">
                                            @lang($restaurant?->tax_inclusive ? 'modules.settings.taxInclusive' : 'modules.settings.taxExclusive')
                                        </span>
                                    </div>
                                    <div>
                                        {!! currency_format($totalTax, $restaurant->currency_id) !!}
                                    </div>
                                </div>
                            @endif
                        @endif

                        @if ($orderType === 'delivery' && !is_null($deliveryFee))
                            <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                                <div>
                                    @lang('modules.delivery.deliveryFee')
                                </div>
                                <div>
                                    @if ($deliveryFee > 0)
                                        {!! currency_format($deliveryFee, $restaurant->currency_id) !!}
                                    @else
                                        <span class="font-medium text-green-500">@lang('modules.delivery.freeDelivery')</span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="flex justify-between font-medium text-gray-900 dark:text-white">
                            <div>
                                @lang('modules.order.total')
                            </div>
                            <div>
                                {!! currency_format($total, $restaurant->currency_id) !!}
                            </div>
                        </div>
                    </div>

                    @if ($orderType === 'delivery' && !empty($deliveryAddress))
                        <div class="w-full h-auto p-4 mt-3 rounded select-none bg-gray-50 dark:bg-gray-700">
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="text-base font-medium text-gray-900 dark:text-white">@lang('modules.delivery.deliveryAddress')</h3>

                                @if (!empty($deliveryAddress))
                                    <x-secondary-button class="text-xs"
                                        wire:click="$toggle('showDeliveryAddressModal')">
                                        @lang('modules.delivery.changeDeliveryAddress')
                                    </x-secondary-button>
                                @endif
                            </div>

                            @if (!empty($deliveryAddress))
                                <div
                                    class="p-3 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:border-gray-700">
                                    <div class="flex items-start gap-3">
                                        <svg class="w-5 h-5 mt-0.5 text-gray-500 dark:text-gray-400 flex-shrink-0"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <div class="text-sm text-gray-700 dark:text-gray-300">
                                            <p class="font-medium">{{ $deliveryAddress }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif

                    <div class="w-full h-auto pt-3 pb-4 text-center select-none"
                        wire:key='order-{{ microtime() }}'>
                        <div class="flex gap-2">

                            @if (is_null($customer) && ($restaurant->customer_login_required || $orderTypeSlug == 'delivery'))
                                <x-button class="justify-center w-full" wire:click="$dispatch('showSignup')">
                                    @lang('app.next')
                                </x-button>
                            @elseif ($orderTypeSlug == 'pickup')
                                <x-button class="justify-center w-full" wire:click="showPickupDateTime">
                                    @lang('app.next')
                                </x-button>
                            @else
                                <div class="grid w-full grid-cols-2 gap-2">
                                    @php
                                        $isPaymentEnabled =
                                            in_array($orderTypeSlug, ['dine_in', 'delivery', 'pickup']) &&
                                            (($orderTypeSlug == 'dine_in' && $paymentGateway->is_dine_in_payment_enabled) ||
                                                ($orderTypeSlug == 'delivery' &&
                                                    $paymentGateway->is_delivery_payment_enabled) ||
                                                ($orderTypeSlug == 'pickup' && $paymentGateway->is_pickup_payment_enabled));

                                        $showPayNow =
                                            $paymentGateway->is_qr_payment_enabled ||
                                            $paymentGateway->stripe_status ||
                                            $paymentGateway->razorpay_status ||
                                            $paymentGateway->flutterwave_status ||
                                            $paymentGateway->paypal_status ||
                                            $paymentGateway->payfast_status ||
                                            $paymentGateway->xendit_status ||
                                            $paymentGateway->epay_status ||
                                            $paymentGateway->is_offline_payment_enabled;

                                        $loadingSpinner = '
                                            <div role="status" class="flex items-center">
                                                <svg aria-hidden="true" class="w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-gray-700"
                                                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                                </svg>
                                            </div>';
                                    @endphp

                                    @if (!$order)
                                        @if ($showPayNow)
                                            <x-button class="flex items-center justify-center w-full gap-2"
                                                wire:click="placeOrder(true)" wire:loading.delay.attr="disabled">
                                                <span wire:loading.delay
                                                    wire:target="placeOrder(true)">{!! $loadingSpinner !!}</span>
                                                @lang('modules.order.payNow')
                                            </x-button>

                                            @if (!$isPaymentEnabled)
                                                <x-secondary-button
                                                    class="flex items-center justify-center w-full gap-2"
                                                    wire:click="placeOrder" wire:loading.delay.attr="disabled">
                                                    <span wire:loading.delay
                                                        wire:target="placeOrder">{!! $loadingSpinner !!}</span>
                                                    @lang('modules.order.payLater')
                                                </x-secondary-button>
                                            @endif
                                        @else
                                            <x-button class="flex items-center justify-center w-full gap-2"
                                                wire:click="placeOrder" wire:loading.delay.attr="disabled">
                                                <span wire:loading.delay
                                                    wire:target="placeOrder">{!! $loadingSpinner !!}</span>
                                                @lang('modules.order.placeOrder')
                                            </x-button>
                                        @endif
                                    @else
                                        <x-button class="flex items-center justify-center w-full gap-2"
                                            wire:click="placeOrder" wire:loading.delay.attr="disabled">
                                            <span wire:loading.delay
                                                wire:target="placeOrder">{!! $loadingSpinner !!}</span>
                                            @lang('modules.order.placeOrder')
                                        </x-button>
                                    @endif

                                </div>

                            @endif
                        </div>

                        <div class="flex mt-4">
                            <a href="javascript:;" wire:click="showMenuItems"
                                class="relative text-gray-500 transition-colors duration-300 group hover:text-[var(--brand-primary)]">
                                <span class="inline-block">@lang('app.back')</span>
                                <span
                                    class="absolute bottom-0 left-0 w-0 h-0.5 bg-[var(--brand-primary)] group-hover:w-full transition-all duration-300 ease-in-out"></span>
                            </a>
                        </div>
                    </div>

                </div>
            @else
                <div class="p-4 text-center md:py-7 md:px-5">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                        @lang('messages.cartEmpty')
                    </h3>

                    <a class="inline-flex items-center justify-center px-3 py-2 mt-3 text-sm font-medium text-white border border-transparent rounded-lg gap-x-2 hover:opacity-90 focus:outline-none disabled:opacity-50 disabled:pointer-events-none"
 style="background-color: var(--brand-primary);"
                        href="{{ module_enabled('Subdomain') ? url('/') : route('shop_restaurant', [$restaurant->hash]) }}"
                        wire:navigate>
                        @lang('modules.order.placeOrder')
                    </a>
                </div>
            @endif
        </div>
    @endif

    <x-dialog-modal wire:model.live="showCustomerNameModal" maxWidth="sm" noPadding>
        <x-slot name="title"></x-slot>

        <x-slot name="content">
            @if (!is_null($customer))
                <form wire:submit="submitCustomerName" class="p-6 space-y-5">
                    @csrf

                    {{-- Header: title + close button --}}
                    <div class="flex items-center justify-between gap-3">
                        <h3 class="text-base font-bold text-gray-900 dark:text-white flex-1 text-start">
                            @lang('messages.completeYourInfo')
                        </h3>
                        <button type="button" wire:click="$toggle('showCustomerNameModal')"
                            class="w-9 h-9 flex-shrink-0 flex items-center justify-center rounded-full shadow-md hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-500 dark:text-gray-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    {{-- Name --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                            {{ __('modules.customer.enterName') }}
                        </label>
                        <input id="customerName" type="text" wire:model="customerName"
                            class="block w-full rounded-lg border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-900 px-4 py-3 text-sm text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-500 focus:border-transparent" />
                        <x-input-error for="customerName" class="mt-1.5" />
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                            {{ __('modules.customer.phone') }}
                        </label>
                        <div class="flex rounded-lg border border-gray-200 dark:border-gray-600 overflow-hidden focus-within:ring-2 focus-within:ring-gray-300 dark:focus-within:ring-gray-500 bg-white dark:bg-gray-900">
                            <div x-data="{ isOpen: @entangle('phoneCodeIsOpen').live }" @click.away="isOpen = false" class="relative shrink-0">
                                <button type="button" @click="isOpen = !isOpen"
                                    class="flex items-center gap-1 px-3 py-3 text-sm font-medium text-gray-700 dark:text-gray-300 border-e border-gray-200 dark:border-gray-600 bg-transparent h-full">
                                    <span>{{ $customerPhoneCode ? '+' . $customerPhoneCode : __('modules.settings.select') }}</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <ul x-show="isOpen" x-transition @click.stop
                                    class="absolute z-50 start-0 top-full mt-1 w-36 overflow-auto bg-white dark:bg-gray-700 rounded-lg shadow-lg max-h-52 ring-1 ring-black/10">
                                    <li class="sticky top-0 px-2 py-2 bg-white dark:bg-gray-700 z-10">
                                        <input wire:model.live.debounce.300ms="phoneCodeSearch"
                                            class="block w-full px-2 py-1 text-sm border border-gray-300 rounded dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                                            type="text" placeholder="{{ __('placeholders.search') }}" />
                                    </li>
                                    @forelse ($phonecodes as $phonecode)
                                        <li @click="$wire.selectPhoneCode('{{ $phonecode }}')"
                                            wire:key="info-phone-code-{{ $phonecode }}"
                                            class="py-2 px-3 text-sm text-gray-900 dark:text-gray-300 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600"
                                            :class="{ 'bg-gray-100 dark:bg-gray-600': '{{ $phonecode }}' === '{{ $customerPhoneCode }}' }">
                                            +{{ $phonecode }}
                                        </li>
                                    @empty
                                        <li class="py-2 px-3 text-sm text-gray-500 dark:text-gray-400">
                                            {{ __('modules.settings.noPhoneCodesFound') }}
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                            <input id="customerPhone" type="tel" wire:model="customerPhone" placeholder="1234567890"
                                class="flex-1 min-w-0 border-0 bg-transparent px-4 py-3 text-sm text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none" />
                        </div>
                        <x-input-error for="customerPhoneCode" class="mt-1.5" />
                        <x-input-error for="customerPhone" class="mt-1.5" />
                    </div>

                    @if ($orderType === 'delivery' || $orderTypeSlug === 'delivery')
                        {{-- Address --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                                {{ __('modules.customer.address') }}
                            </label>
                            <textarea id="customerAddress" wire:model="customerAddress" rows="3"
                                class="block w-full rounded-lg border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-900 px-4 py-3 text-sm text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-500 focus:border-transparent resize-none"></textarea>
                            <x-input-error for="customerAddress" class="mt-1.5" />
                        </div>
                    @endif

                    {{-- Submit --}}
                    <button type="submit" wire:loading.attr="disabled"
                        class="w-full py-3 rounded-lg text-white text-base font-bold transition hover:opacity-90"
                        style="background-color: var(--brand-primary);">
                        <span wire:loading.remove wire:target="submitCustomerName">@lang('app.continue')</span>
                        <span wire:loading wire:target="submitCustomerName">...</span>
                    </button>
                </form>
            @endif
        </x-slot>

    </x-dialog-modal>

    <!-- Pickup DateTime Dialog Modal -->
    <x-dialog-modal wire:model.live="showPickupDateTimeModal" maxWidth="sm">
        <x-slot name="title">
            @lang('modules.order.pickUpDateTime')
        </x-slot>

        <x-slot name="content">
            <form wire:submit="savePickupDateTime">
                @csrf
                <div class="space-y-4">
                    <div class="relative">
                        {{-- <x-label for="pickupDateTime" value="{{ __('modules.order.selectPickupDateTime') }}"  class="m-2"/> --}}
                         <input type="datetime-local" id="delivery_datetime"
                            class="w-full px-3 py-2 pr-10 text-sm text-gray-900 bg-white border border-gray-300 rounded-md dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 min-h-[44px] [&::-webkit-calendar-picker-indicator]:opacity-0 [&::-webkit-calendar-picker-indicator]:absolute [&::-webkit-calendar-picker-indicator]:right-0 [&::-webkit-calendar-picker-indicator]:w-full [&::-webkit-calendar-picker-indicator]:h-full [&::-webkit-calendar-picker-indicator]:cursor-pointer"
                            wire:model.defer="deliveryDateTime" min="{{ now($restaurant->timezone ?? config('app.timezone'))->format('Y-m-d\TH:i') }}" max="{{ $maxDate }}"
                            value="{{ $defaultDate }}" style="color-scheme: light dark;" />
                        <!-- Custom calendar icon for better visibility in both modes -->
                        <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <x-input-error for="pickupDateTime" class="mt-2" />
                    </div>
                </div>
                <div class="flex justify-between w-full pb-4 mt-6 space-x-4">
                    <x-button>@lang('app.continue')</x-button>
                    <x-button-cancel wire:click="$toggle('showPickupDateTimeModal')"
                        wire:loading.attr="disabled">@lang('app.cancel')</x-button-cancel>
                </div>
            </form>

        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model.live="showTableModal" maxWidth="2xl">
        <x-slot name="title">
            @lang('modules.table.selectTable')
        </x-slot>

        <x-slot name="content">
            @if ($showTableModal && $getTable)
                <!-- Card Section -->
                <div class="col-span-2 space-y-8">
                    @forelse ($tables as $area)
                        <div class="flex flex-col gap-3 space-y-3 sm:gap-4"
                            wire:key='area-table-{{ $loop->index }}'>
                            <h3 class="inline-flex items-center gap-2 font-medium f-15 dark:text-neutral-200">
                                {{ $area->area_name }}
                                <span
                                    class="px-2 py-1 text-sm text-gray-800 border border-gray-300 rounded bg-slate-100 ">{{ $area->tables_count }}
                                    @lang('modules.table.table')</span>
                            </h3>
                            <!-- Card -->

                            <div class="grid grid-cols-2 gap-3 md:grid-cols-4 sm:gap-4">
                                @foreach ($area->tables as $item)
                                    <a @class([
                                        'group cursor-pointer flex items-center justify-center border shadow-sm rounded-lg hover:shadow-md transition dark:bg-gray-700 dark:border-gray-600',
                                        'bg-red-50' => $item->status == 'inactive',
                                        'bg-white' => $item->status == 'active',
                                    ]) wire:key='table-{{ $loop->index }}'
                                        wire:click="selectTableOrder('{{ $item->hash }}')">
                                        <div class="p-3">
                                            <div class="flex flex-col items-center justify-center space-y-2">
                                                @if ($item->status == 'inactive')
                                                    <div class="inline-flex gap-1 text-xs font-semibold text-red-600">
                                                        @lang('app.inactive')
                                                    </div>
                                                @endif
                                                <div @class([
                                                    'p-2 rounded-lg tracking-wide ',
                                                    ' bg-green-100 text-green-600' => $item->available_status == 'available',
                                                    'bg-red-100 text-red-600' => $item->available_status == 'reserved',
                                                    'bg-blue-100 text-blue-600' => $item->available_status == 'running',
                                                ])>
                                                    <h3 wire:loading.class.delay='opacity-50'
                                                        @class(['font-semibold'])>
                                                        {{ $item->table_code }}
                                                    </h3>
                                                </div>
                                                <p @class(['text-xs font-medium dark:text-neutral-200 text-gray-500'])>
                                                    {{ $item->seating_capacity }} @lang('modules.table.seats')
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- End Card -->
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <div>
                            @lang('messages.noTablesFound')
                        </div>
                    @endforelse

                </div>
                <!-- End Card Section -->
            @endif
        </x-slot>

    </x-dialog-modal>

    <x-dialog-modal wire:model.live="showVariationModal" maxWidth="xl">
        <x-slot name="title">
            @lang('modules.menu.itemVariations')
        </x-slot>

        <x-slot name="content">
            @if ($menuItem)
                @livewire('pos.itemVariations', [
                    'menuItemId' => $menuItem->id,
                    'orderTypeId' => $orderTypeId,
                    'deliveryAppId' => null
                ], key(str()->random(50)))
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-button-cancel wire:click="$toggle('showVariationModal')" wire:loading.attr="disabled" />
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model.live="showCartVariationModal" maxWidth="sm">
        <x-slot name="title">
            @lang('modules.menu.itemVariations')
        </x-slot>

        <x-slot name="content">
            @if ($menuItem)
                @livewire('shop.cartItemVariations', ['menuItem' => $menuItem, 'orderItemQty' => $orderItemQty], key(str()->random(50)))
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-button-cancel wire:click="$toggle('showCartVariationModal')" wire:loading.attr="disabled" />
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model.live="showItemDetailModal" maxWidth="sm">
        <x-slot name="title">
            @lang('modules.menu.itemDescription')
        </x-slot>

        <x-slot name="content">
            @if ($selectedItem)
                <div class="flex flex-col gap-2">
                    <div class="flex flex-col gap-2">
                        @if ($restaurant && !$restaurant->hide_menu_item_image_on_customer_site)

                            <img src="{{ $selectedItem->item_photo_url }}" alt="{{ $selectedItem->item_name }}"
                                class="object-cover w-full rounded-md">
                        @endif
                        <div class="flex flex-col gap-1">
                            <h3 class="text-lg font-semibold dark:text-white">{{ $selectedItem->item_name }}</h3>
                            @if ($selectedItem->calories)
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $selectedItem->calories }}
                                </div>
                            @endif
                            @if (strlen($selectedItem->description) > 100)
                                <div x-data="{ expanded: false }">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        <span
                                            x-show="!expanded">{{ Str::limit($selectedItem->description, 100) }}</span>
                                        <span x-show="expanded">{{ $selectedItem->description }}</span>
                                    </p>
                                    <button @click="expanded = !expanded"
                                        class="mt-1 text-sm font-medium" style="color: var(--brand-primary);">
                                        <span x-text="expanded ? '@lang('modules.menu.showLess')' : '@lang('modules.menu.showMore')'"></span>
                                    </button>
                                </div>
                            @else
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $selectedItem->description }}
                                </p>
                            @endif

                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    @lang('modules.menu.preparationTime')
                                    {{ $selectedItem->preparation_time }} @lang('modules.menu.minutes')
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-button-cancel wire:click="$toggle('showItemDetailModal')" wire:loading.attr="disabled" />
        </x-slot>
    </x-dialog-modal>

    @if ($paymentOrder)
        <x-dialog-modal wire:model.live="showPaymentModal" maxWidth="md">
            <x-slot name="title">
                @lang('modules.order.chooseGateway')
            </x-slot>

            <x-slot name="content">
                <div
                    class="flex items-center justify-between p-2 mb-6 rounded-md cursor-pointer bg-gray-50 dark:bg-gray-800">
                    <div class="flex items-center min-w-0">
                        <div>
                            <div class="font-medium text-gray-700 truncate dark:text-white">
                                    {{ $paymentOrder->show_formatted_order_number }}
                            </div>
                        </div>
                    </div>
                    <div class="inline-flex flex-col text-base font-semibold text-right text-gray-900 dark:text-white">
                        <div>{!! currency_format($paymentOrder->total, $restaurant->currency_id) !!}</div>
                    </div>
                </div>

                @if ($showQrCode || $showPaymentDetail)
                    <x-secondary-button wire:click="{{ $showQrCode ? 'toggleQrCode' : 'togglePaymenntDetail' }}">
                        <span class="ml-2">@lang('modules.billing.showOtherPaymentOption')</span>
                    </x-secondary-button>

                    <div class="flex items-center mt-2">
                        @if ($showQrCode)
                            <img src="{{ $paymentGateway->qr_code_image_url }}" alt="QR Code Preview"
                                class="object-cover rounded-md h-30 w-30">
                        @else
                            <span class="p-3 font-bold text-gray-700 rounded">@lang('modules.billing.accountDetails')</span>
                            <span>{{ $paymentGateway->offline_payment_detail }}</span>
                        @endif
                    </div>
                 @else
                    <div class="grid items-center w-full grid-cols-1 gap-6 mt-4 md:grid-cols-2">
                        @if ($paymentGateway->stripe_status)
                            <x-secondary-button wire:click='initiateStripePayment({{ $paymentOrder->id }})'>
                                <span class="inline-flex items-center">
                                    <svg height="21" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 468 222.5"
                                        xml:space="preserve">
                                        <path
                                            d="M414 113.4c0-25.6-12.4-45.8-36.1-45.8-23.8 0-38.2 20.2-38.2 45.6 0 30.1 17 45.3 41.4 45.3 11.9 0 20.9-2.7 27.7-6.5v-20c-6.8 3.4-14.6 5.5-24.5 5.5-9.7 0-18.3-3.4-19.4-15.2h48.9c0-1.3.2-6.5.2-8.9m-49.4-9.5c0-11.3 6.9-16 13.2-16 6.1 0 12.6 4.7 12.6 16zm-63.5-36.3c-9.8 0-16.1 4.6-19.6 7.8l-1.3-6.2h-22v116.6l25-5.3.1-28.3c3.6 2.6 8.9 6.3 17.7 6.3 17.9 0 34.2-14.4 34.2-46.1-.1-29-16.6-44.8-34.1-44.8m-6 68.9c-5.9 0-9.4-2.1-11.8-4.7l-.1-37.1c2.6-2.9 6.2-4.9 11.9-4.9 9.1 0 15.4 10.2 15.4 23.3 0 13.4-6.2 23.4-15.4 23.4m-71.3-74.8 25.1-5.4V36l-25.1 5.3zm0 7.6h25.1v87.5h-25.1zm-26.9 7.4-1.6-7.4h-21.6v87.5h25V97.5c5.9-7.7 15.9-6.3 19-5.2v-23c-3.2-1.2-14.9-3.4-20.8 7.4m-50-29.1-24.4 5.2-.1 80.1c0 14.8 11.1 25.7 25.9 25.7 8.2 0 14.2-1.5 17.5-3.3V135c-3.2 1.3-19 5.9-19-8.9V90.6h19V69.3h-19zM79.3 94.7c0-3.9 3.2-5.4 8.5-5.4 7.6 0 17.2 2.3 24.8 6.4V72.2c-8.3-3.3-16.5-4.6-24.8-4.6C67.5 67.6 54 78.2 54 95.9c0 27.6 38 23.2 38 35.1 0 4.6-4 6.1-9.6 6.1-8.3 0-18.9-3.4-27.3-8v23.8c9.3 4 18.7 5.7 27.3 5.7 20.8 0 35.1-10.3 35.1-28.2-.1-29.8-38.2-24.5-38.2-35.7"
                                            style="fill-rule:evenodd;clip-rule:evenodd;fill:#635bff" />
                                    </svg>
                                </span>
                            </x-secondary-button>
                        @endif

                        @if ($paymentGateway->razorpay_status)
                            <x-secondary-button wire:click='initiatePayment({{ $paymentOrder->id }})'>
                                <span class="inline-flex items-center">
                                    <svg height="21" version="1.1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        x="0px" y="0px" viewBox="0 0 122.88 26.53"
                                        style="enable-background:new 0 0 122.88 26.53" xml:space="preserve">
                                        <style type="text/css">
                                            <![CDATA[
                                            .strp0 {
                                                fill: #3395FF;
                                            }

                                            .st1 {
                                                fill: #072654;
                                            }
                                            ]]>
                                        </style>
                                        <g>
                                            <polygon class="st1"
                                                points="11.19,9.03 7.94,21.47 0,21.47 1.61,15.35 11.19,9.03" />
                                            <path class="st1"
                                                d="M28.09,5.08C29.95,5.09,31.26,5.5,32,6.33s0.92,2.01,0.51,3.56c-0.27,1.06-0.82,2.03-1.59,2.8 c-0.8,0.8-1.78,1.38-2.87,1.68c0.83,0.19,1.34,0.78,1.5,1.79l0.03,0.22l0.6,5.09h-3.7l-0.62-5.48c-0.01-0.18-0.06-0.36-0.15-0.52 c-0.09-0.16-0.22-0.29-0.37-0.39c-0.31-0.16-0.65-0.24-1-0.25h-0.21h-2.28l-1.74,6.63h-3.46l4.3-16.38H28.09L28.09,5.08z M122.88,9.37l-4.4,6.34l-5.19,7.52l-0.04,0.04l-1.16,1.68l-0.04,0.06L112,25.09l-1,1.44h-3.44l4.02-5.67l-1.82-11.09h3.57 l0.9,7.23l4.36-6.19l0.06-0.09l0.07-0.1l0.07-0.09l0.54-1.15H122.88L122.88,9.37z M92.4,10.25c0.66,0.56,1.09,1.33,1.24,2.19 c0.18,1.07,0.1,2.18-0.21,3.22c-0.29,1.15-0.78,2.23-1.46,3.19c-0.62,0.88-1.42,1.61-2.35,2.13c-0.88,0.48-1.85,0.73-2.85,0.73 c-0.71,0.03-1.41-0.15-2.02-0.51c-0.47-0.28-0.83-0.71-1.03-1.22l-0.06-0.2l-1.77,6.75h-3.43l3.51-13.4l0.02-0.06l0.01-0.06 l0.86-3.25h3.35l-0.57,1.88l-0.01,0.08c0.49-0.7,1.15-1.27,1.91-1.64c0.76-0.4,1.6-0.6,2.45-0.6C90.84,9.43,91.7,9.71,92.4,10.25 L92.4,10.25z M88.26,12.11c-0.4-0.01-0.8,0.07-1.18,0.22c-0.37,0.15-0.71,0.38-1,0.66c-0.68,0.7-1.15,1.59-1.36,2.54 c-0.3,1.11-0.28,1.95,0.02,2.53c0.3,0.58,0.87,0.88,1.72,0.88c0.81,0.02,1.59-0.29,2.18-0.86c0.66-0.69,1.12-1.55,1.33-2.49 c0.29-1.09,0.27-1.96-0.03-2.57S89.08,12.11,88.26,12.11L88.26,12.11z M103.66,9.99c0.46,0.29,0.82,0.72,1.02,1.23l0.07,0.19 l0.44-1.66h3.36l-3.08,11.7h-3.37l0.45-1.73c-0.51,0.61-1.15,1.09-1.87,1.42c-0.7,0.32-1.45,0.49-2.21,0.49 c-0.88,0.04-1.76-0.21-2.48-0.74c-0.66-0.52-1.1-1.28-1.24-2.11c-0.18-1.06-0.12-2.14,0.19-3.17c0.3-1.15,0.8-2.24,1.49-3.21 c0.63-0.89,1.44-1.64,2.38-2.18c0.86-0.5,1.84-0.77,2.83-0.77C102.36,9.43,103.06,9.61,103.66,9.99L103.66,9.99z M101.92,12.14 c-0.41,0-0.82,0.08-1.19,0.24c-0.38,0.16-0.72,0.39-1.01,0.68c-0.67,0.71-1.15,1.59-1.36,2.55c-0.28,1.08-0.28,1.9,0.04,2.49 c0.31,0.59,0.89,0.87,1.75,0.87c0.4,0.01,0.8-0.07,1.18-0.22s0.71-0.38,1-0.66c0.59-0.63,1.02-1.38,1.26-2.22l0.08-0.31 c0.3-1.11,0.29-1.96-0.03-2.53C103.33,12.44,102.76,12.14,101.92,12.14L101.92,12.14z M81.13,9.63l0.22,0.09l-0.86,3.19 c-0.49-0.26-1.03-0.39-1.57-0.39c-0.82-0.03-1.62,0.24-2.27,0.75c-0.56,0.48-0.97,1.12-1.18,1.82l-0.07,0.27l-1.6,6.11h-3.42 l3.1-11.7h3.37l-0.44,1.72c0.42-0.58,0.96-1.05,1.57-1.4c0.68-0.39,1.44-0.59,2.22-0.59C80.51,9.48,80.83,9.52,81.13,9.63 L81.13,9.63z M68.5,10.19c0.76,0.48,1.31,1.24,1.52,2.12c0.25,1.06,0.21,2.18-0.11,3.22c-0.3,1.18-0.83,2.28-1.58,3.22 c-0.71,0.91-1.61,1.63-2.64,2.12c-1.05,0.49-2.19,0.74-3.35,0.73c-1.22,0-2.22-0.24-3-0.73c-0.77-0.48-1.32-1.24-1.54-2.12 c-0.24-1.06-0.2-2.18,0.11-3.22c0.3-1.17,0.83-2.27,1.58-3.22c0.71-0.9,1.62-1.63,2.66-2.12c1.06-0.49,2.22-0.75,3.39-0.73 C66.57,9.41,67.6,9.67,68.5,10.19L68.5,10.19z M64.84,12.1c-0.81-0.01-1.59,0.3-2.18,0.86c-0.61,0.58-1.07,1.43-1.36,2.57 c-0.6,2.29-0.02,3.43,1.74,3.43c0.8,0.02,1.57-0.29,2.15-0.85c0.6-0.57,1.04-1.43,1.34-2.58c0.3-1.13,0.31-1.98,0.01-2.57 C66.25,12.37,65.68,12.1,64.84,12.1L64.84,12.1z M57.89,9.76l-0.6,2.32l-7.55,6.67h6.06l-0.72,2.73H45.05l0.63-2.41l7.43-6.57 h-5.65l0.72-2.73H57.89L57.89,9.76z M40.96,9.99c0.46,0.29,0.82,0.72,1.02,1.23l0.07,0.19l0.44-1.66h3.37l-3.07,11.7h-3.37 l0.45-1.73c-0.51,0.6-1.14,1.08-1.85,1.41s-1.48,0.5-2.27,0.5c-0.88,0.04-1.74-0.22-2.45-0.74c-0.66-0.52-1.1-1.28-1.24-2.11 c-0.18-1.06-0.12-2.14,0.19-3.17c0.29-1.15,0.8-2.24,1.49-3.21c0.63-0.89,1.44-1.64,2.37-2.18c0.86-0.5,1.84-0.76,2.83-0.76 C39.66,9.44,40.36,9.62,40.96,9.99L40.96,9.99z M39.23,12.14c-0.41,0-0.81,0.08-1.19,0.24c-0.38,0.16-0.72,0.39-1.01,0.68 c-0.68,0.71-1.15,1.59-1.36,2.55c-0.28,1.08-0.27,1.9,0.04,2.49c0.31,0.59,0.89,0.87,1.75,0.87c0.4,0.01,0.8-0.07,1.18-0.22 c0.37-0.15,0.72-0.38,1-0.66c0.59-0.62,1.03-1.38,1.26-2.22l0.08-0.31c0.29-1.11,0.26-1.94-0.03-2.53 C40.64,12.44,40.06,12.14,39.23,12.14L39.23,12.14z M26.85,7.81h-3.21l-1.13,4.28h3.21c1.01,0,1.81-0.17,2.35-0.52 c0.57-0.37,0.98-0.95,1.13-1.63c0.2-0.72,0.11-1.27-0.27-1.62C28.55,7.99,27.86,7.81,26.85,7.81L26.85,7.81z" />
                                            <polygon class="strp0"
                                                points="18.4,0 12.76,21.47 8.89,21.47 12.7,6.93 6.86,10.78 7.9,6.95 18.4,0" />
                                        </g>
                                    </svg>
                                </span>
                            </x-secondary-button>
                        @endif

                        @if ($paymentGateway->flutterwave_status)
                            <x-secondary-button wire:click="initiateFlutterwavePayment({{ $paymentOrder->id }})">
                                <span class="inline-flex items-center">
                                    <svg class="h-5 dark:mix-blend-plus-lighter" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 916.7 144.7">
                                        <path
                                            d="M280.5 33.8h16.1v82.9h-16.1zM359 87.3c0 11.4-7.4 16.6-17.2 16.6s-16.4-5.1-16.4-16V58.3h-16.1v33.3c0 16.6 10.4 26.3 27.7 26.3 10.9 0 16.9-4 21-8.5h.9l1.4 7.4h14.8V58.3H359zm158 17.9c-11.8 0-18.4-5.4-19.5-13.2h51.1c.2-1.6.4-3.3.3-4.9-.1-21-16-29.9-33-29.9-19.7 0-34.6 11.8-34.6 30.8 0 18.1 14.2 29.9 35.6 29.9 17.9 0 29.8-7.9 32.2-20.1h-15.9c-1.8 4.8-7.5 7.4-16.2 7.4m-1-35.3c10.3 0 16.2 4.6 17.2 11h-35.3c1.5-6.2 7.5-11 18.1-11m60.4-3.2h-1l-1.5-8.4h-14.6v58.4h16.1V91.6c0-11.3 6.5-17.6 18.7-17.6q3.3 0 6.6.6V58.3h-2.2c-10.9 0-17.5 2.3-22.1 8.4m103.3 31.8h-.9L665 62h-16.6l-13.5 36.4h-1.1L621 58.3h-16l19.7 58.4h17.5l14-37.2h1l13.8 37.2h17.6l19.7-58.4h-16zm92.7 1.2V80.2c0-15.9-13.4-23-30.1-23-17.7 0-28.8 8.4-30.3 21h16.1c1.2-5.5 5.8-8.5 14.2-8.5s14 3.2 14 9.6v1.5l-26.3 2c-12.1.9-21 6.3-21 17.8 0 11.8 10.2 17.4 25.1 17.4 12.1 0 19.4-3.4 23.9-8.4h.8c2.5 5.7 7.7 7.3 13.2 7.3h6.8V105h-1.5c-3.3-.2-4.9-1.8-4.9-5.3m-16.1-6.2c0 9.2-11 12.3-20.4 12.3-6.4 0-10.6-1.6-10.6-6.1 0-4 3.6-5.9 9-6.4l22.1-1.6zM832 58.3l-18.8 42.3h-1l-19.1-42.3h-17.4l27.2 58.4h19.3l27.1-58.4zm68.8 39.5c-2 4.8-7.7 7.4-16.3 7.4-11.8 0-18.4-5.4-19.5-13.2h51.1c.2-1.6.4-3.3.3-4.9-.1-21-16-29.9-33-29.9-19.7 0-34.5 11.8-34.5 30.8 0 18.1 14.2 29.9 35.6 29.9 17.9 0 29.8-7.9 32.2-20.1zm-17.4-27.9c10.3 0 16.2 4.6 17.2 11h-35.3c1.5-6.2 7.4-11 18.1-11M254.4 54c0-5.1 3.6-7.3 8.3-7.3 2.2 0 4.3.3 6.4.9l2.7-11.7c-3.9-1.4-8-2.1-12.1-2.1-11.9 0-21.5 6.3-21.5 19.4v5.1h-13.9v12.8h13.9v45.6h16.2V71.1h18.2V58.3h-18.2zm156.4-12.1h-15l-.8 16.5h-12.7v12.8h12.4V100c0 9.8 5 18 20 18 3.9 0 7.8-.4 11.6-1.3v-12.3c-2.2.5-4.4.8-6.7.8-8 0-8.8-4.6-8.8-8.1v-26h16V58.3h-16zm50.6 0h-14.9l-.8 16.5H433v12.8h12.4V100c0 9.8 5 18 20 18 3.9 0 7.7-.5 11.5-1.3v-12.3c-2.2.5-4.4.8-6.7.8-8 0-8.8-4.6-8.8-8.1v-26h16V58.3h-16.1V41.9z"
                                            style="fill:#2a3362" />
                                        <path
                                            d="M0 31.6c0-9.4 2.7-17.4 8.5-23.1l10 10C7.4 29.6 17.1 64.1 48.8 95.8s66.2 41.4 77.3 30.3l10 10c-18.8 18.8-61.5 5.4-97.3-30.3C14 80.9 0 52.8 0 31.6"
                                            style="fill:#009a46" />
                                        <path
                                            d="M63.1 144.7c-9.4 0-17.4-2.7-23.1-8.5l10-10c11.1 11.1 45.6 1.4 77.3-30.3s41.4-66.2 30.3-77.3l10-10c18.8 18.8 5.4 61.5-30.3 97.3-24.9 24.8-53.1 38.8-74.2 38.8"
                                            style="fill:#ff5805" />
                                        <path
                                            d="M140.5 91.6C134.4 74.1 122 55.4 105.6 39 69.8 3.2 27.1-10.1 8.3 8.6 7 10 8.2 13.3 10.9 16s6.1 3.9 7.4 2.6c11.1-11.1 45.6-1.4 77.3 30.3 15 15 26.2 31.8 31.6 47.3 4.7 13.6 4.3 24.6-1.2 30.1-1.3 1.3-.2 4.6 2.6 7.4s6.1 3.9 7.4 2.6c9.6-9.7 11.2-25.6 4.5-44.7"
                                            style="fill:#f5afcb" />
                                        <path
                                            d="M167.5 8.6C157.9-1 142-2.6 122.9 4c-17.5 6.1-36.2 18.5-52.6 34.9-35.8 35.8-49.1 78.5-30.3 97.3 1.3 1.3 4.7.2 7.4-2.6s3.9-6.1 2.6-7.4c-11.1-11.1-1.4-45.6 30.3-77.3 15-15 31.8-26.2 47.2-31.6 13.6-4.7 24.6-4.3 30.1 1.2 1.3 1.3 4.6.2 7.4-2.6s3.9-5.9 2.5-7.3"
                                            style="fill:#ff9b00" />
                                    </svg>
                                </span>
                            </x-secondary-button>
                        @endif

                        @if ($paymentGateway->paypal_status)
                            <x-secondary-button wire:click='initiatePaypalPayment({{ $paymentOrder->id }})'>
                                <span class="inline-flex items-center">
                                    <svg height="21" viewBox="0 0 916.7 144.7" class="h-6 w-22"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <style>
                                                .text {
                                                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                                                    font-size: 80px;
                                                    font-weight: bold;
                                                }

                                                .dark-blue {
                                                    fill: #002E6D;
                                                }

                                                .blue {
                                                    fill: #009CDE;
                                                }
                                            </style>
                                        </defs>
                                        <!-- P Shape -->
                                        <path class="dark-blue" d="M60,30 h50 a30,30 0 0 1 0,60 h-35 l-10,60 h-30z" />
                                        <!-- Overlay light P -->
                                        <path class="blue" d="M75,40 h25 a20,20 0 0 1 0,40 h-20 l-8,40 h-20z" />
                                        <!-- PayPal Text -->
                                        <text x="140" y="95" class="text">
                                            <tspan class="dark-blue">Pay</tspan>
                                            <tspan class="blue">Pal</tspan>
                                        </text>
                                    </svg>

                                </span>
                            </x-secondary-button>
                        @endif

                        @if ($paymentGateway->payfast_status)
                            <x-secondary-button wire:click='initiatePayfastPayment({{ $paymentOrder->id }})'>
                                <span class="inline-flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 6 L14 12 L8 18" fill="none" stroke="#E63950"
                                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    @lang('modules.billing.payfast')

                                </span>
                            </x-secondary-button>
                        @endif

                        @if ($paymentGateway->paystack_status)
                            <x-secondary-button wire:click='initiatePaystackPayment({{ $paymentOrder->id }})'>
                                <span class="inline-flex items-center">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        width="24" height="24" fill="#0AA5FF">
                                        <path
                                            d="M2 3.6c0-.331.269-.6.6-.6H21.4c.331 0 .6.269.6.6v1.8a.6.6 0 0 1-.6.6H2.6a.6.6 0 0 1-.6-.6V3.6Zm0 4.8c0-.331.269-.6.6-.6H15.4c.331 0 .6.269.6.6v1.8a.6.6 0 0 1-.6.6H2.6a.6.6 0 0 1-.6-.6V8.4Zm0 4.8c0-.331.269-.6.6-.6H21.4c.331 0 .6.269.6.6v1.8a.6.6 0 0 1-.6.6H2.6a.6.6 0 0 1-.6-.6v-1.8Zm0 4.8c0-.331.269-.6.6-.6H15.4c.331 0 .6.269.6.6v1.8a.6.6 0 0 1-.6.6H2.6a.6.6 0 0 1-.6-.6v-1.8Z"
                                            fill-rule="evenodd" />
                                    </svg>
                                    @lang('modules.billing.paystack')

                                </span>
                            </x-secondary-button>
                        @endif

                        @if ($paymentGateway->xendit_status)
                            <x-secondary-button wire:click='initiateXenditPayment({{ $paymentOrder->id }})'>
                                <span class="inline-flex items-center">
                                    <svg class="w-4 h-4" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="Xendit--Streamline-Simple-Icons" height="24" width="24">
                                            <desc>
                                            Xendit Streamline Icon: https://streamlinehq.com
                                            </desc>
                                            <title>Xendit</title>
                                            <path d="M11.781 2.743H7.965l-5.341 9.264 5.341 9.263 -1.312 2.266L0 12.007 6.653 0.464h6.454l-1.326 2.279Zm-5.128 2.28 1.312 -2.28L9.873 6.03 8.561 8.296 6.653 5.023Zm9.382 -2.28 1.312 2.28L7.965 21.27l-1.312 -2.279 9.382 -16.248Zm-5.128 20.793 1.298 -2.279h3.83L14.1 17.931l1.312 -2.267 1.926 3.337 4.038 -6.994 -5.341 -9.264L17.347 0.464 24 12.007l-6.653 11.529h-6.44Z" fill="#000000" stroke-width="1"></path>
                                        </svg>
                                        @lang('modules.billing.xendit')
                                </span>
                            </x-secondary-button>
                        @endif

                        @if ($paymentGateway->epay_status)
                            <x-secondary-button wire:click='initiateEpayPayment({{ $paymentOrder->id }})'>
                                <span class="inline-flex items-center">
                                    <svg class="w-4 h-4 me-2" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                        <rect x="1.5" y="1.5" width="21" height="21" rx="3" ry="3"
                                            stroke="currentColor" stroke-width="2"/>

                                        <path d="M9.3 7.8L6.1 11C5.7 11.4 5.7 12 6.1 12.4L9.3 15.6C9.7 16 10.3 16 10.7 15.6L13.9 12.4C14.3 12 14.3 11.4 13.9 11L10.7 7.8C10.3 7.4 9.7 7.4 9.3 7.8Z"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>

                                        <path d="M14.7 7.8L11.5 11C11.1 11.4 11.1 12 11.5 12.4L14.7 15.6C15.1 16 15.7 16 16.1 15.6L19.3 12.4C19.7 12 19.7 11.4 19.3 11L16.1 7.8C15.7 7.4 15.1 7.4 14.7 7.8Z"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>

                                    </svg>
                                    @lang('modules.billing.epay')

                                </span>
                            </x-secondary-button>
                        @endif

                        @if ($paymentGateway->is_qr_payment_enabled && $paymentGateway->qr_code_image_url)
                            <!-- Button -->
                            <x-secondary-button wire:click="toggleQrCode">
                                <span class="inline-flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g stroke-width="0" />
                                        <g stroke-linecap="round" stroke-linejoin="round" />
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M16 17v-1h-3v-3h3v2h2v2h-1v2h-2v2h-2v-3h2v-1zm5 4h-4v-2h2v-2h2zM3 3h8v8H3zm2 2v4h4V5zm8-2h8v8h-8zm2 2v4h4V5zM3 13h8v8H3zm2 2v4h4v-4zm13-2h3v2h-3zM6 6h2v2H6zm0 10h2v2H6zM16 6h2v2h-2z" />
                                    </svg>
                                    <span class="ml-2">@lang('modules.billing.paybyQr')</span>
                                </span>
                            </x-secondary-button>
                        @endif

                        @if ($paymentGateway->is_offline_payment_enabled && $paymentGateway->offline_payment_detail)
                            <!-- Button -->
                            <x-secondary-button wire:click="togglePaymenntDetail">
                                <span class="inline-flex items-center">
                                    <svg class="w-4 h-4" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 15V17M6 7H18C18.5523 7 19 7.44772 19 8V16C19 16.5523 18.5523 17 18 17H6C5.44772 17 5 16.5523 5 16V8C5 7.44772 5.44772 7 6 7ZM6 7L18 7C18.5523 7 19 6.55228 19 6V4C19 3.44772 18.5523 3 18 3H6C5.44772 3 5 3.44772 5 4V6C5 6.55228 5.44772 7 6 7Z"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M12 11C13.1046 11 14 10.1046 14 9C14 7.89543 13.1046 7 12 7C10.8954 7 10 7.89543 10 9C10 10.1046 10.8954 11 12 11Z"
                                            stroke="currentColor" stroke-width="2" />
                                    </svg>

                                    <span class="ml-2">@lang('modules.billing.bankTransfer')</span>
                                </span>
                            </x-secondary-button>
                        @endif

                        @if ($paymentGateway->is_cash_payment_enabled)
                            <x-secondary-button wire:click="placeOrder(false, {{ $paymentOrder->id }}, 'cash')">
                                <span class="inline-flex items-center">
                                    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="M8 7V6a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1M3 18v-7a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                    <span class="ml-2">@lang('modules.order.payViaCash')</span>
                                </span>
                            </x-secondary-button>
                        @endif
                    </div>
                @endif

            </x-slot>

            <x-slot name="footer">
                <x-button-cancel wire:click="hidePaymentModal" wire:loading.attr="disabled" />
                @if ($showQrCode)
                    <x-button class="ml-3"
                        wire:click="placeOrder(false, {{ $paymentOrder->id }}, '{{ $showQrCode ? 'upi' : 'others' }}')"
                        wire:loading.attr="disabled">@lang('modules.billing.paymentDone')</x-button>

                @elseif ($showPaymentDetail)
                    <x-button class="ml-3"
                        wire:click="placeOrder(false, {{ $paymentOrder->id }}, 'bank_transfer')"
                        wire:loading.attr="disabled">@lang('modules.billing.paymentDone')</x-button>
                @endif
            </x-slot>
        </x-dialog-modal>
    @endif

    <x-dialog-modal wire:model.live="showModifiersModal" maxWidth="lg" :noPadding="true">
        <x-slot name="content">
            @if ($cartSelectedModifierModel)
                @include('livewire.pos.item-modifiers', [
                    'selectedModifierItem' => $cartSelectedModifierModel,
                    'modifiers'            => $cartModifiers,
                    'quantity'             => $modifierQuantity,
                    'selectedVariationName'=> $selectedVariationName,
                ])
            @endif
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model.live="showItemVariationsModal" maxWidth="xl">
        <x-slot name="title">
            @lang('modules.menu.itemVariations')
        </x-slot>

        <x-slot name="content">
            @if ($menuItem)
                <div>
                    <div class="flex flex-col">
                        <div class="flex gap-4 mb-4">
                            @if ($restaurant && !$restaurant->hide_menu_item_image_on_customer_site)

                                <img class="w-16 h-16 rounded-md" src="{{ $menuItem->item_photo_url }}"
                                    alt="{{ $menuItem->item_name }}">
                            @endif
                            <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                <div
                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                    <img src="{{ asset('img/' . $menuItem->type . '.svg') }}" class="h-4 me-2"
                                        title="@lang('modules.menu.' . $menuItem->type)" alt="" />
                                    {{ $menuItem->item_name }}
                                </div>
                                @if ($menuItem->calories)
                                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                        {{ $menuItem->calories }}
                                    </div>
                                @endif
                                <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                    {{ $menuItem->description }}</div>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden shadow">
                                    <table
                                        class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                                        <thead class="bg-gray-100 dark:bg-gray-700">
                                            <tr>
                                                <th scope="col"
                                                    class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    @lang('modules.menu.itemName')
                                                </th>
                                                <th scope="col"
                                                    class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    @lang('modules.menu.setPrice')
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700"
                                            wire:key='menu-item-list-{{ microtime() }}'>

                                            @foreach ($menuItem->variations as $item)
                                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700"
                                                    wire:key='menu-item-{{ $item->id . microtime() }}'>
                                                    <td
                                                        class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                                                        <div
                                                            class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                                            <div
                                                                class="inline-flex items-center text-base text-gray-900 dark:text-white">
                                                                {{ $item->variation }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $item->price ? currency_format($item->price, $restaurant->currency_id) : '--' }}
                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-button-cancel wire:click="$toggle('showItemVariationsModal')" wire:loading.attr="disabled" />
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model.live="showDeliveryAddressModal" maxWidth="4xl">
        <x-slot name="title"></x-slot>

        <x-slot name="content">
            @if ($shopBranch?->deliverySetting)
                @livewire('customer.location-selector', ['shopBranch' => $shopBranch, 'customer' => $customer, 'orderGrandTotal' => $total, 'maxPreparationTime' => $maxPreparationTime, 'currencyId' => $restaurant->currency_id], key(str()->random(50)))
            @endif
        </x-slot>
    </x-dialog-modal>

    @script

        @push('scripts')

        <script>
            document.addEventListener('requestGeolocation', () => {
                if (!('geolocation' in navigator)) {
                    Livewire.dispatch('alert', {
                        type: 'error',
                        message: @js(__('app.geolocationNotSupported'))
                    });
                    return;
                }

                navigator.geolocation.getCurrentPosition(
                    position => {
                        const lat = position.coords.latitude;
                        const lng = position.coords.longitude;
                        @this.call('setCustomerLocation', lat, lng);
                    },
                    error => {
                        Livewire.dispatch('alert', {
                            type: 'error',
                            message: error.message || @js(__('app.unableToFetchLocation'))
                        });
                    },
                    { enableHighAccuracy: true, timeout: 15000, maximumAge: 0 }
                );
            });
        </script>

        @endpush

        <script>

            $wire.on('paymentInitiated', (payment) => {
                payViaRazorpay(payment);
            });

            $wire.on('stripePaymentInitiated', (payment) => {
                document.getElementById('order_payment').value = payment.payment.id;
                document.getElementById('order-payment-form').submit();
            });

            $wire.on('epayPaymentInitiated', (payment) => {
                payViaEpay(payment);
            });

            function payViaEpay(payment) {
                console.log('Epay payment initiated:', payment);

                // Wait for halyk library to load
                if (typeof halyk === 'undefined') {
                    console.error('Epay library not loaded');
                    alert('Payment gateway failed to load. Please refresh and try again.');
                    return;
                }

                try {
                    var paymentData = payment.payment;
                    var orderNumber = paymentData.order?.formatted_order_number || paymentData.order?.id || '';
                    var descriptionText = "{{ __('messages.orderPayment', [], app()->getLocale()) }} #" + orderNumber;

                    // Limit description to 125 bytes as per Epay documentation (UTF-8 byte counting)
                    function getByteLength(str) {
                        return new TextEncoder().encode(str).length;
                    }

                    function truncateToBytes(str, maxBytes) {
                        var encoder = new TextEncoder();
                        var decoder = new TextDecoder();
                        var bytes = encoder.encode(str);
                        if (bytes.length <= maxBytes) {
                            return str;
                        }
                        // Truncate and decode, ensuring we don't break multi-byte characters
                        var truncated = bytes.slice(0, maxBytes - 3); // Reserve 3 bytes for '...'
                        return decoder.decode(truncated) + '...';
                    }

                    if (getByteLength(descriptionText) > 125) {
                        descriptionText = truncateToBytes(descriptionText, 125);
                    }

                    // Map language codes according to documentation (eng/kaz/rus)
                    var locale = "{{ app()->getLocale() }}";
                    var language = 'eng'; // default
                    if (locale === 'kaz' || locale === 'kz') {
                        language = 'kaz';
                    } else if (locale === 'rus' || locale === 'ru') {
                        language = 'rus';
                    }

                    // Parse the auth token (stored as JSON string)
                    var authToken = null;
                    try {
                        if (typeof paymentData.epay_access_token === 'string') {
                            authToken = JSON.parse(paymentData.epay_access_token);
                        } else {
                            authToken = paymentData.epay_access_token;
                        }
                    } catch (e) {
                        console.error('Failed to parse auth token:', e);
                        alert('Payment token error. Please try again.');
                        return;
                    }

                    if (!authToken || !authToken.access_token) {
                        console.error('Invalid auth token:', authToken);
                        alert('Payment token is invalid. Please try again.');
                        return;
                    }

                    // Format amount to 2 decimal places to match token endpoint format
                    var amount = parseFloat(paymentData.amount);
                    var formattedAmount = parseFloat(amount.toFixed(2));

                    var paymentObject = {
                        invoiceId: paymentData.epay_invoice_id,
                        backLink: "{{ route('epay.success') }}",
                        failureBackLink: "{{ route('epay.cancel') }}",
                        postLink: "{{ route('epay.webhook', ['hash' => $restaurant->hash]) }}",
                        failurePostLink: "{{ route('epay.webhook', ['hash' => $restaurant->hash]) }}",
                        language: language,
                        description: descriptionText,
                        terminal: "{{ $paymentGateway->epay_mode === 'sandbox' ? $paymentGateway->test_epay_terminal_id : $paymentGateway->epay_terminal_id }}",
                        amount: formattedAmount, // Ensure 2 decimal places to match token request
                        currency: "{{ strtoupper($restaurant->currency->currency_code) }}",
                        auth: authToken, // Pass complete token object as per documentation
                    };

                    // Add customer data if available (optional fields)
                    if (paymentData.order?.customer) {
                        var customer = paymentData.order.customer;
                        if (customer.phone) paymentObject.phone = customer.phone;
                        if (customer.name) paymentObject.name = customer.name;
                        if (customer.email) paymentObject.email = customer.email;
                    } else if (paymentData.order?.customer_id) {
                        // Try to get from global customer if available
                        @if($customer)
                        @if($customer->phone)
                        paymentObject.phone = "{{ $customer->phone }}";
                        @endif
                        @if($customer->name)
                        paymentObject.name = "{{ $customer->name }}";
                        @endif
                        @if($customer->email)
                        paymentObject.email = "{{ $customer->email }}";
                        @endif
                        @endif
                    }

                    console.log('Calling halyk.pay() with:', paymentObject);

                    // Call halyk.pay() immediately
                    halyk.pay(paymentObject);
                } catch (error) {
                    console.error('Epay payment error:', error);
                    alert('Payment initialization failed: ' + error.message);
                }
            }

            function payViaRazorpay(payment) {

                var options = {
                    "key": "{{ $restaurant->paymentGateways->razorpay_key }}", // Enter the Key ID generated from the Dashboard
                    "amount": (parseFloat(payment.payment.amount) * 100),
                    "currency": "{{ $restaurant->currency->currency_code }}",
                    "description": "Order Payment",
                    "image": "{{ $restaurant->logoUrl }}",
                    "order_id": payment.payment.razorpay_order_id,
                    "handler": function(response) {
                        Livewire.dispatch('razorpayPaymentCompleted', [response.razorpay_payment_id, response
                            .razorpay_order_id,
                            response.razorpay_signature
                        ]);
                    },
                    "modal": {
                        "ondismiss": function() {
                            if (confirm("Are you sure, you want to close the form?")) {
                                txt = "You pressed OK!";
                                console.log("Checkout form closed by the user");
                            } else {
                                txt = "You pressed Cancel!";
                                console.log("Complete the Payment")
                            }
                        }
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.on('payment.failed', function(response) {
                    console.log(response);
                });
                rzp1.open();
            }
        </script>
    @endscript

    @script
        <script>
            // Prevent closing order type modal by ESC or clicking outside
            document.addEventListener('livewire:init', () => {
                Livewire.on('showOrderTypeModal', (show) => {
                    if (show) {
                        // Disable closing modal
                        const modal = document.querySelector('[x-data*="show"]');
                        if (modal) {
                            modal.addEventListener('click', function(e) {
                                // Prevent click outside from closing
                                e.stopPropagation();
                            });
                        }
                    }
                });
            });
        </script>
    @endscript

</div>
