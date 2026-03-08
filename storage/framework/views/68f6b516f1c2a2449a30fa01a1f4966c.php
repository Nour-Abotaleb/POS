<div class="w-full">
    <?php
        $orderStats = getRestaurantOrderStats(branch()->id);
        $orderLimitReached = !$orderStats['unlimited'] && $orderStats['current_count'] >= $orderStats['order_limit'];
    ?>
    <div x-data="{
        showMenu: false,
        filterView: getCookie('posFilterViewV2') ?? 'grid',
        toggleMenu() {
            this.showMenu = !this.showMenu;
            if (this.showMenu) {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        },
        setFilterView(view) {
            this.filterView = view;
            setCookie('posFilterViewV2', view, 30);
        }
    }">
        <!-- Mobile Toggle Button -->
        <button
            @click="toggleMenu()"
            style="background-color: #011646; border-color: #011646;"
            class="fixed bottom-6 right-6 z-50 md:hidden text-white rounded-full shadow-lg p-4 flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 transition"
            aria-label="Toggle Menu"
            type="button"
        >
            <svg x-show="!showMenu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg x-show="showMenu" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>

            <span class="lg:hidden ml-1"><?php echo app('translator')->get('menu.menu'); ?></span>
        </button>

        <!-- Menu Panel -->
        <div :class="{'hidden': !showMenu, ' inset-0 z-40 flex': showMenu}" class="md:flex flex-col bg-gray-50 lg:h-full w-full px-3 dark:bg-gray-900 transition-transform duration-300 md:static md:inset-auto md:z-auto md:translate-x-0 overflow-y-auto md:overflow-visible md:max-h-none" style="backdrop-filter: blur(2px);" x-cloak>
            
            <div class="bg-white/70 dark:bg-gray-800/70 rounded-xl border border-gray-100 dark:border-gray-700 p-3 shadow-sm space-y-4">
                

                <div class="grid grid-cols-1 gap-3">
                        <div class="relative space-y-2">
                            <div class="flex-1 min-w-0">
                            <template x-if="filterView === 'select'">
                                <div class="relative">
                                    <label for="menu-filter" class="sr-only text-nowrap"><?php echo app('translator')->get('modules.menu.menus'); ?></label>
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round"/></svg>
                                    </div>
                                    <select id="menu-filter" wire:model.live="menuId" class="block w-full pl-9 pr-3 py-2 text-sm rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-200 theme-focus">
                                        <option value=""><?php echo e(__('app.filterByMenu')); ?></option>
                                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $menuList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($menu->id); ?>">
                                                <?php echo e($menu->getTranslation('menu_name', session('locale', app()->getLocale()))); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                    </select>
                                </div>
                            </template>

                            <!--[if BLOCK]><![endif]--><?php if($this->menuItemsLoaded > 0): ?>
                            <template x-if="filterView === 'grid'">
                                <div class="flex flex-wrap items-center gap-2">
                                    <span class="text-sm font-light dark:text-gray-300 whitespace-nowrap" style="color: #D0D0D0;">Category:</span>
                                    <button type="button"
                                        wire:click="$set('menuId', null)"
                                        style="<?php echo e($menuId === null ? 'background-color: #011646; border-color: #011646; color: white;' : ''); ?>"
                                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                            'px-3 py-3 text-xs rounded-lg border transition text-left',
                                            'text-white shadow-sm' => $menuId === null,
                                            'border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-200' => $menuId !== null,
                                        ]); ?>">
                                        <div class="flex items-center justify-between gap-2">
                                            <span class="font-medium">Show All</span>
                                        </div>
                                    </button>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $menuList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $isActiveMenu = (string) $menuId === (string) $menu->id;
                                        ?>
                                        <button type="button"
                                            wire:click="$set('menuId', <?php echo e($menu->id); ?>)"
                                            style="<?php echo e($isActiveMenu ? 'background-color: #011646; border-color: #011646; color: white;' : ''); ?>"
                                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                'px-3 py-3 text-xs rounded-lg border transition text-left',
                                                'text-white shadow-sm' => $isActiveMenu,
                                                'border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-200' => ! $isActiveMenu,
                                            ]); ?>">
                                            <div class="flex items-center justify-between gap-2">
                                                <span class="font-medium"><?php echo e($menu->getTranslation('menu_name', session('locale', app()->getLocale()))); ?></span>
                                            </div>
                                        </button>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </template>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>

                        <div class="relative space-y-2">
                            <div class="flex-1 min-w-0">
                            <template x-if="filterView === 'select'">
                                <div class="relative">
                                    <label for="category-filter" class="sr-only"><?php echo app('translator')->get('modules.menu.categories'); ?></label>
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h6v6H4zM14 4h6v6h-6zM4 14h6v6H4zM14 14h6v6h-6z" stroke-linejoin="round"/></svg>
                                    </div>
                                    <select id="category-filter" wire:model.live="filterCategories" class="block w-full pl-9 pr-3 py-2 text-sm rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-200 theme-focus">
                                        <option value=""><?php echo e(__('app.filterByCategory')); ?></option>
                                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->categoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>">
                                                <?php echo e($category->category_name); ?> (<?php echo e($category->items_count); ?>)
                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                    </select>
                                </div>
                            </template>

                            <template x-if="filterView === 'grid'">
                                <div class="flex flex-wrap items-center gap-2">
                                    <span class="text-sm font-light dark:text-gray-300 whitespace-nowrap" style="color: #D0D0D0;">Products:</span>
                                    <button type="button"
                                        wire:click="$set('filterCategories', null)"
                                        style="<?php echo e($filterCategories === null ? 'background-color: #011646; border-color: #011646; color: white;' : ''); ?>"
                                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                            'px-3 py-3 text-xs rounded-lg border transition text-left',
                                            'text-white shadow-sm' => $filterCategories === null,
                                            'border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-200' => $filterCategories !== null,
                                        ]); ?>">
                                        <div class="flex items-center justify-between gap-2">
                                            <span class="font-medium">Show All</span>
                                        </div>
                                    </button>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->categoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $isActiveCategory = (string) $filterCategories === (string) $category->id;
                                        ?>
                                        <button type="button"
                                            wire:click="$set('filterCategories', <?php echo e($category->id); ?>)"
                                            style="<?php echo e($isActiveCategory ? 'background-color: #011646; border-color: #011646; color: white;' : ''); ?>"
                                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                'px-3 py-3 text-xs rounded-lg border transition text-left',
                                                'text-white shadow-sm' => $isActiveCategory,
                                                'border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-200' => ! $isActiveCategory,
                                            ]); ?>">
                                            <div class="flex items-center justify-between gap-2">
                                                <span class="font-medium"><?php echo e($category->category_name); ?></span>
                                                <span class="text-[11px] text-gray-500 dark:text-gray-300">(<?php echo e($category->items_count); ?>)</span>
                                            </div>
                                        </button>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </template>
                            </div>
                        </div>
                </div>
            </div>

            
            <div
                wire:init="loadInitialMenuItems"
                class="mt-4 overflow-y-auto ]
                    [&::-webkit-scrollbar]:w-2
                    [&::-webkit-scrollbar-track]:bg-gray-300
                    [&::-webkit-scrollbar-thumb]:bg-gray-400
                    hover:[&::-webkit-scrollbar-thumb]:bg-gray-500
                    dark:[&::-webkit-scrollbar-track]:bg-gray-700
                    dark:[&::-webkit-scrollbar-thumb]:bg-gray-500
                    dark:hover:[&::-webkit-scrollbar-thumb]:bg-gray-400"
                x-data="{
                    loadedCount: <?php if ((object) ('menuItemsLoaded') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('menuItemsLoaded'->value()); ?>')<?php echo e('menuItemsLoaded'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('menuItemsLoaded'); ?>')<?php endif; ?>,
                    totalCount: <?php echo e($this->totalMenuItemsCount); ?>,
                    
                    get allItemsLoaded() {
                        return this.loadedCount >= this.totalCount;
                    },
                    
                    scrollHandler(scrollEl = $el) {
                        if (this.allItemsLoaded) {
                            return;
                        }
                        if (!scrollEl) {
                            return;
                        }

                        if (scrollEl.scrollHeight - scrollEl.scrollTop <= scrollEl.clientHeight + 250) {
                            $wire.loadMoreMenuItems();
                        }
                    }
                }"
                >
                <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 2xl:grid-cols-8 gap-3 max-h-[calc(100vh-12rem)] overflow-y-auto"
                    @scroll.throttle.100ms="scrollHandler($event.target)">
                    <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $this->menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li class="group relative flex items-center justify-center">
                            <input type="checkbox" id="item-<?php echo e($item->id); ?>" value="<?php echo e($item->id); ?>"
                                wire:click='addCartItems(<?php echo e($item->id); ?>, <?php echo e($item->variations_count); ?>, <?php echo e($item->modifier_groups_count); ?>)'
                                wire:key='item-input-<?php echo e($item->id); ?>'
                                wire:loading.attr="disabled"
                                <?php echo e($orderLimitReached ? 'disabled' : ''); ?>

                                class="hidden peer">
                            <label for="item-<?php echo e($item->id); ?>"
                                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    "block lg:w-32 w-full rounded-lg shadow-sm transition-all duration-100 dark:shadow-gray-700 relative outline-none",
                                    "cursor-pointer hover:shadow-md dark:hover:bg-gray-700/30 peer-checked:ring-2 peer-checked:ring-skin-base active:scale-95 focus-visible:scale-95 focus-visible:ring-2 focus-visible:ring-skin-base" => !$orderLimitReached && $item->in_stock,
                                    "cursor-not-allowed opacity-60" => $orderLimitReached || !$item->in_stock,
                                    "bg-gray-100 dark:bg-gray-800" => !$item->in_stock,
                                    "bg-white dark:bg-gray-900" => $item->in_stock && !$orderLimitReached,
                                    "bg-gray-200 dark:bg-gray-800" => $orderLimitReached,
                                ]); ?>"
                                tabindex="<?php echo e($orderLimitReached ? '-1' : '0'); ?>"
                        >

                                    
                                    <div wire:loading.flex wire:target="addCartItems(<?php echo e($item->id); ?>, <?php echo e($item->variations_count); ?>, <?php echo e($item->modifier_groups_count); ?>)"
                                        class="absolute inset-0 bg-white/80 dark:bg-gray-800/80 rounded-lg z-10 items-center justify-center">
                                        <svg class="animate-spin h-6 w-6" style="color: #011646;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </div>

                                    
                                    <!--[if BLOCK]><![endif]--><?php if(!$restaurant->hide_menu_item_image_on_pos): ?>
                                    <div class="relative aspect-square hidden md:block">
                                        <img class="w-full lg:w-32 lg:h-32 object-cover rounded-t-lg"
                                            src="<?php echo e($item->item_photo_url); ?>"
                                            alt="<?php echo e($item->item_name); ?>"
                                            loading="lazy"
                                            onerror="this.onerror=null; this.src='<?php echo e(asset('img/food.svg')); ?>';" />
                                        <span class="absolute top-1 right-1 bg-white/90 dark:bg-gray-800/90 rounded-full p-1 shadow-sm">
                                            <img src="<?php echo e(asset('img/' . $item->type . '.svg')); ?>"
                                                class="h-4 w-4" title="<?php echo app('translator')->get('modules.menu.' . $item->type); ?>"
                                                alt="" />
                                        </span>
                                    </div>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                    
                                    <div class="p-2">
                                        <h5 class="text-xs font-medium text-gray-900 dark:text-white min-h-[1.5rem]">
                                            <?php echo e($item->item_name); ?>

                                        </h5>
                                        <!--[if BLOCK]><![endif]--><?php if($orderLimitReached): ?>
                                            <div class="text-red-500 text-xs"><?php echo app('translator')->get('messages.orderLimitReached'); ?></div>
                                        <?php elseif(!$item->in_stock): ?>
                                            <div class="text-red-500">Out of stock</div>
                                        <?php else: ?>

                                        <div class="mt-1 flex items-center justify-between gap-2">
                                            <!--[if BLOCK]><![endif]--><?php if($item->variations_count == 0): ?>
                                                <span class="text-sm font-semibold text-gray-900 dark:text-white">
                                                    <?php echo e(currency_format($item->price, $restaurant->currency_id)); ?>

                                                </span>
                                            <?php else: ?>
                                                <span class="text-xs text-gray-600 dark:text-gray-300 flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                                    </svg>
                                                    <?php echo app('translator')->get('modules.menu.showVariations'); ?>
                                                </span>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        </div>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </label>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <li class="col-span-full text-center py-8 text-gray-500 dark:text-gray-400">
                            <!--[if BLOCK]><![endif]--><?php if($this->menuItemsLoaded === 0 && $this->totalMenuItemsCount > 0): ?>
                                <div class="flex flex-col items-center gap-3 text-gray-600 dark:text-gray-400">
                                    <svg class="animate-spin h-10 w-10" style="color: #011646;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0 1 8-8V0C5.373 0 0 5.373 0 12zm2 5.291A7.96 7.96 0 0 1 4 12H0c0 3.042 1.135 5.824 3 7.938z"/></svg>
                                    <p class="text-sm font-medium"><?php echo app('translator')->get('messages.loadingData'); ?></p>
                                </div>
                            <?php else: ?>
                                <div class="flex flex-col items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                    </svg>
                                    <p><?php echo app('translator')->get('messages.noItemAdded'); ?></p>
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </li>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                </ul>
                
                <div class="flex items-center justify-center py-6 px-4">
                    <!--[if BLOCK]><![endif]--><?php if(!$this->allItemsLoaded): ?>
                        
                        <div wire:loading wire:target="loadMoreMenuItems" class="flex items-center justify-center gap-3 text-gray-600 dark:text-gray-400">
                            <svg class="inline animate-spin h-6 w-6" style="color: #011646;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0 1 8-8V0C5.373 0 0 5.373 0 12zm2 5.291A7.96 7.96 0 0 1 4 12H0c0 3.042 1.135 5.824 3 7.938z"/></svg>
                            <span class="text-sm font-medium"><?php echo app('translator')->get('messages.loadingData'); ?></span>
                        </div>
                    <?php else: ?>
                        <div class="flex items-center gap-x-1 text-gray-500 dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0"/></svg>
                            <span class="text-sm font-medium"><?php echo app('translator')->get('messages.allItemsLoaded'); ?></span>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function setCookie(name, value, days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = `${name}=${value};expires=${date.toUTCString()};path=/`;
    }

    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) {
            return parts.pop().split(';').shift();
        }
        return null;
    }
</script>
<?php /**PATH C:\xampp\htdocs\script\resources\views/pos/menu.blade.php ENDPATH**/ ?>