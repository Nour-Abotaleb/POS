
<div>
<header x-data="{ menuOpen: false }" class="fixed top-0 inset-x-0 z-[45] pt-[env(safe-area-inset-top,0px)] shadow-md bg-[#011646] dark:bg-[#011646] dark:bg-gray-900">
    {{-- Full-width bar; inner row matches guest main column (same as cart grid) --}}
    <nav class="relative z-50 w-full py-3">
        <div class="mx-auto w-full max-w-screen-xl-mid px-4">
        <div class="flex items-center gap-2">

            {{-- Hamburger Menu --}}
            <button type="button"
                    @click="menuOpen = true"
                    class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-md bg-white dark:bg-gray-800 transition">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                          clip-rule="evenodd"/>
                </svg>
            </button>

            {{-- Order Type Selector --}}
            <button type="button"
                    x-on:click="Livewire.dispatch('open-order-type-modal')"
                    class="flex-1 flex items-center gap-2 bg-white dark:bg-gray-800 rounded-md px-3 py-1 text-end hover:bg-gray-50 dark:hover:bg-gray-700 transition min-h-[42px]">
                    <div class="min-w-0 flex-1">
                        <div class="text-xs font-medium text-gray-600 dark:text-gray-300 leading-tight">
                            @lang('modules.order.orderType')
                        </div>
                        <div class="text-sm text-gray-400 dark:text-gray-500 truncate leading-tight">
                            @lang('modules.order.selectOrderType')
                        </div>
                    </div>
                    <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
            </button>

            {{-- Cart / Bag Icon --}}
            <a href="javascript:;"
               x-on:click="Livewire.dispatch('showCartItems')"
               class="relative flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-md bg-white dark:bg-gray-800 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
            </a>
        </div>
        </div>
    </nav>

    {{-- Backdrop --}}
    <div
        x-show="menuOpen"
        x-cloak
        @click="menuOpen = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-40 bg-black/50"
    ></div>

    {{-- Side Drawer --}}
    <div
        x-show="menuOpen"
        x-cloak
        x-transition:enter="transition ease-out duration-250"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed bg-white dark:bg-gray-800 z-50 shadow-2xl rounded-md flex flex-col overflow-hidden" style="width: min(85vw, 400px); top: 14px; bottom: 14px; inset-inline-start: 14px;"
    >
        {{-- Close Button --}}
        <div class="flex items-center justify-start p-3 shrink-0">
            <button type="button"
                    @click="menuOpen = false"
                    class="w-10 h-10 flex items-center justify-center rounded-md bg-white dark:bg-gray-800 transition shadow-md">
                <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        <div class="flex flex-col flex-1 min-h-0">
        {{-- Main menu --}}
        <div class="flex flex-col flex-1 min-h-0 overflow-y-auto">
        {{-- Nav Links --}}
        <ul class="flex-1 py-1 text-sm divide-y divide-gray-50 dark:divide-gray-700">
            @if ($restaurant->allow_customer_orders)
                <li>
                    <a href="{{ route('shop_restaurant', [$restaurant->hash]) }}" wire:navigate
                       @click="menuOpen = false"
                       class="flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        @lang('menu.home')
                    </a>
                </li>
            @endif

            @if (in_array('Table Reservation', $modules))
                <li>
                    <a href="{{ route('book_a_table', [$restaurant->hash]).'?branch='.$shopBranch->id }}"
                       wire:navigate @click="menuOpen = false"
                       class="flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        @lang('menu.bookTable')
                    </a>
                </li>
            @endif

            @if (!is_null(customer()))
                <li>
                    <a href="{{ route('my_addresses', [$restaurant->hash]).'?branch='.$shopBranch->id }}"
                       wire:navigate @click="menuOpen = false"
                       class="flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        @lang('menu.myAddresses')
                    </a>
                </li>
                <li>
                    <a href="{{ route('my_orders', [$restaurant->hash]).'?branch='.$shopBranch->id }}"
                       wire:navigate @click="menuOpen = false"
                       class="flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        @lang('menu.myOrders')
                    </a>
                </li>

                @if (in_array('Table Reservation', $modules))
                    <li>
                        <a href="{{ route('my_bookings', [$restaurant->hash]).'?branch='.$shopBranch->id }}"
                           wire:navigate @click="menuOpen = false"
                           class="flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                            @lang('menu.myBookings')
                        </a>
                    </li>
                @endif

                <li>
                    <a href="{{ route('profile', [$restaurant->hash]).'?branch='.$shopBranch->id }}"
                       wire:navigate @click="menuOpen = false"
                       class="flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        @lang('menu.myAccount')
                    </a>
                </li>
                @if ($restaurant->branches->count() > 1)
                <li>
                    <a href="{{ route('shop_branches', [$restaurant->hash]) }}?branch={{ $shopBranch->id }}"
                       wire:navigate
                       @click="menuOpen = false"
                       class="flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        @lang('menu.branches')
                    </a>
                </li>
                @endif
            @else
                @if ($restaurant->branches->count() > 1)
                <li>
                    <a href="{{ route('shop_branches', [$restaurant->hash]) }}?branch={{ $shopBranch->id }}"
                       wire:navigate
                       @click="menuOpen = false"
                       class="flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        @lang('menu.branches')
                    </a>
                </li>
                @endif
                <li>
                    <button type="button"
                            x-on:click="Livewire.dispatch('showSignup'); menuOpen = false"
                            class="w-full flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        @lang('app.login')
                    </button>
                </li>
            @endif

            {{-- Language: tap عربي / English (no dropdown) when only ar+en are enabled --}}
            @if (languages()->count() > 1)
                <li class="border-t border-gray-100 dark:border-gray-700">
                    @livewire('shop.languageSwitcher', ['variant' => 'menu'])
                </li>
            @endif

            {{-- Dark mode: directly under Language in the side menu --}}
            <li class="border-t border-gray-100 dark:border-gray-700">
                <button id="theme-toggle-nav" type="button"
                        onclick="window.toggleColorTheme()"
                        class="w-full flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition text-start">
                    <span class="inline-flex h-4 w-4 shrink-0 text-gray-400 dark:hidden" aria-hidden="true">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                        </svg>
                    </span>
                    <span class="hidden h-4 w-4 shrink-0 text-gray-400 dark:inline-flex" aria-hidden="true">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"/>
                        </svg>
                    </span>
                    <span id="theme-toggle-label-dark">@lang('app.toggleDarkMode')</span>
                    <span id="theme-toggle-label-light" class="hidden">@lang('app.toggleLightMode')</span>
                </button>
            </li>

            @if (!is_null(customer()))
                <li class="border-t border-gray-100 dark:border-gray-700">
                    <a href="{{ url('customer-logout').'?restaurant='.$restaurant->hash }}"
                       class="flex items-center gap-3 px-4 py-3 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        @lang('app.logout')
                    </a>
                </li>
            @endif
        </ul>
        </div>
        </div>

    </div>

</header>
<div class="w-full shrink-0" style="min-height: calc(4.5rem + env(safe-area-inset-top, 0px));" aria-hidden="true"></div>
</div>
