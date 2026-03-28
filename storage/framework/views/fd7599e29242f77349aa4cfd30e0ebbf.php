
<header x-data="{ menuOpen: false }">
    <nav style="background-color: #011646;" class="px-3 py-3 dark:bg-gray-900">
        <div class="mx-auto max-w-3xl lg:max-w-screen-xl">
        <div class="flex items-center gap-2">

            
            <button type="button"
                    @click="menuOpen = true"
                    class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-white transition">
                <svg class="w-5 h-5" fill="#000" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                          clip-rule="evenodd"/>
                </svg>
            </button>

            
            <button type="button"
                    x-on:click="Livewire.dispatch('open-order-type-modal')"
                    class="flex-1 flex items-center gap-2 bg-white dark:bg-gray-800 rounded-md px-3 py-1 text-end hover:bg-gray-50 dark:hover:bg-gray-700 transition min-h-[42px]">
                    <div class="min-w-0 flex-1">
                        <div class="text-xs font-medium text-gray-600 dark:text-gray-300 leading-tight">
                            <?php echo app('translator')->get('modules.order.orderType'); ?>
                        </div>
                        <div class="text-sm text-gray-400 dark:text-gray-500 truncate leading-tight">
                            <?php echo app('translator')->get('modules.order.selectOrderType'); ?>
                        </div>
                    </div>
                    <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
            </button>

            
            <a href="javascript:;"
               x-on:click="Livewire.dispatch('showCartItems')"
               class="relative flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                     stroke="#000" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
            </a>
        </div>
        </div>
    </nav>

    
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
        class="fixed inset-0 bg-black/40 z-40"
    ></div>

    
    <div
        x-show="menuOpen"
        x-cloak
        x-transition:enter="transition ease-out duration-250"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed bg-white dark:bg-gray-800 z-50 shadow-2xl rounded-lg flex flex-col overflow-y-auto" style="width: min(85vw, 400px); top: 14px; bottom: 14px; inset-inline-start: 14px;"
    >
        
        <div class="flex items-center justify-start p-3 border-b border-gray-100 dark:border-gray-700">
            <button type="button"
                    @click="menuOpen = false"
                    class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        
        <div class="p-3 border-b border-gray-100 dark:border-gray-700">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('forms.shopSelectBranchMobile', ['restaurant' => $restaurant, 'shopBranch' => $shopBranch]);

$__html = app('livewire')->mount($__name, $__params, 'lw-266541002-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>

        
        <ul class="flex-1 py-1 text-sm divide-y divide-gray-50 dark:divide-gray-700">
            <!--[if BLOCK]><![endif]--><?php if($restaurant->allow_customer_orders): ?>
                <li>
                    <a href="<?php echo e(route('shop_restaurant', [$restaurant->hash])); ?>" wire:navigate
                       @click="menuOpen = false"
                       class="flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <?php echo app('translator')->get('menu.home'); ?>
                    </a>
                </li>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <!--[if BLOCK]><![endif]--><?php if(in_array('Table Reservation', $modules)): ?>
                <li>
                    <a href="<?php echo e(route('book_a_table', [$restaurant->hash]).'?branch='.$shopBranch->id); ?>"
                       wire:navigate @click="menuOpen = false"
                       class="flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <?php echo app('translator')->get('menu.bookTable'); ?>
                    </a>
                </li>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <!--[if BLOCK]><![endif]--><?php if(!is_null(customer())): ?>
                <li>
                    <a href="<?php echo e(route('my_addresses', [$restaurant->hash]).'?branch='.$shopBranch->id); ?>"
                       wire:navigate @click="menuOpen = false"
                       class="flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <?php echo app('translator')->get('menu.myAddresses'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('my_orders', [$restaurant->hash]).'?branch='.$shopBranch->id); ?>"
                       wire:navigate @click="menuOpen = false"
                       class="flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <?php echo app('translator')->get('menu.myOrders'); ?>
                    </a>
                </li>

                <!--[if BLOCK]><![endif]--><?php if(in_array('Table Reservation', $modules)): ?>
                    <li>
                        <a href="<?php echo e(route('my_bookings', [$restaurant->hash]).'?branch='.$shopBranch->id); ?>"
                           wire:navigate @click="menuOpen = false"
                           class="flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                            <?php echo app('translator')->get('menu.myBookings'); ?>
                        </a>
                    </li>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <li>
                    <a href="<?php echo e(route('profile', [$restaurant->hash]).'?branch='.$shopBranch->id); ?>"
                       wire:navigate @click="menuOpen = false"
                       class="flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <?php echo app('translator')->get('menu.profile'); ?>
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(url('customer-logout').'?restaurant='.$restaurant->hash); ?>"
                       class="flex items-center gap-3 px-4 py-3 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <?php echo app('translator')->get('app.logout'); ?>
                    </a>
                </li>
            <?php else: ?>
                <li>
                    <button type="button"
                            x-on:click="Livewire.dispatch('showSignup'); menuOpen = false"
                            class="w-full flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        <?php echo app('translator')->get('app.login'); ?>
                    </button>
                </li>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            
            <!--[if BLOCK]><![endif]--><?php if(languages()->count() > 1): ?>
                <li class="px-4 py-2 border-t border-gray-100 dark:border-gray-700 flex items-center gap-3">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('shop.languageSwitcher');

$__html = app('livewire')->mount($__name, $__params, 'lw-266541002-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    اللغة
                </li>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            
            <li class="border-t border-gray-100 dark:border-gray-700">
                <button id="theme-toggle-nav" type="button"
                        class="w-full flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <svg id="theme-toggle-dark-icon-nav" class="hidden w-4 h-4 text-gray-400" fill="currentColor"
                         viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                    </svg>
                    <svg id="theme-toggle-light-icon-nav" class="hidden w-4 h-4 text-gray-400" fill="currentColor"
                         viewBox="0 0 20 20">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"/>
                    </svg>
                    <?php echo app('translator')->get('app.toggleDarkMode'); ?>
                </button>
            </li>
        </ul>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const darkIcon = document.getElementById('theme-toggle-dark-icon-nav');
            const lightIcon = document.getElementById('theme-toggle-light-icon-nav');
            const btn = document.getElementById('theme-toggle-nav');
            if (!btn) return;

            if (localStorage.getItem('color-theme') === 'dark' ||
                (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                lightIcon && lightIcon.classList.remove('hidden');
            } else {
                darkIcon && darkIcon.classList.remove('hidden');
            }

            btn.addEventListener('click', function () {
                darkIcon && darkIcon.classList.toggle('hidden');
                lightIcon && lightIcon.classList.toggle('hidden');
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
                document.dispatchEvent(new Event('dark-mode'));
            });
        });
    </script>
</header>
<?php /**PATH E:\nomufood\POS\resources\views/livewire/shop-navigation.blade.php ENDPATH**/ ?>