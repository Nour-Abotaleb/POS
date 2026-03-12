<template>
    <div class="w-full">
        <div data-has-alpine-state="true">
            <!-- Mobile Toggle Button -->
            <button
                @click="showMenu = !showMenu"
                class="fixed bottom-6 right-6 z-50 md:hidden bg-skin-base text-white rounded-full shadow-lg p-4 flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-skin-base transition"
                aria-label="Toggle Menu"
                type="button"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                    ></path>
                </svg>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    style="display: none"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12"
                    ></path>
                </svg>
            </button>

            <!-- Menu Panel -->
            <div
                :class="{ hidden: !showMenu, ' inset-0 z-40 flex': showMenu }"
                class="md:flex flex-col bg-gray-50 lg:h-full w-full py-4 px-3 dark:bg-gray-900 transition-transform duration-300 md:static md:inset-auto md:z-auto md:translate-x-0 overflow-y-auto md:overflow-visible md:max-h-none hidden"
                style="backdrop-filter: blur(2px)"
            >
                <!-- Menu Filters (Categories): one row, horizontal slider with arrows -->
                <div class="mt-4">
                    <div class="relative flex items-center gap-1 -mx-0.5">
                        <div
                            ref="menuSliderRef"
                            class="pos-menu-scroll flex-1 min-w-0 overflow-x-auto overflow-y-hidden scroll-smooth -mx-0.5"
                        >
                            <div
                                class="flex flex-nowrap items-center gap-2 min-w-0"
                            >
                                <span
                                    class="text-sm font-light dark:text-gray-300 whitespace-nowrap shrink-0 text-gray-500 dark:text-gray-400 ms-2"
                                >
                                    Category:
                                </span>
                                <button
                                    @click="handleMenuFilter(null)"
                                    :class="[
                                        'px-3 py-2 text-xs font-medium rounded-lg whitespace-nowrap shrink-0',
                                        localMenuId === null
                                            ? 'bg-gray-900 text-white dark:bg-white dark:text-gray-900'
                                            : 'bg-white text-gray-700 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700 border border-gray-200 dark:border-gray-600',
                                    ]"
                                >
                                    Show All
                                </button>
                                <button
                                    v-for="menu in menus"
                                    :key="menu.id"
                                    @click="handleMenuFilter(menu.id)"
                                    :class="[
                                        'px-3 py-2 text-xs font-medium rounded-lg whitespace-nowrap shrink-0',
                                        localMenuId === menu.id
                                            ? 'bg-gray-900 text-white dark:bg-white dark:text-gray-900'
                                            : 'bg-white text-gray-700 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700 border border-gray-200 dark:border-gray-600',
                                    ]"
                                >
                                    {{ menu.menu_name }}
                                </button>
                            </div>
                        </div>
                        <button
                            v-show="hasMenuOverflow"
                            type="button"
                            @click="scrollMenu(1)"
                            :disabled="!canScrollMenuRight"
                            :class="[
                                'shrink-0 w-8 h-8 flex items-center justify-center rounded-lg border-0 bg-transparent text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-800/50 transition',
                                canScrollMenuRight
                                    ? 'opacity-100'
                                    : 'opacity-40 pointer-events-none',
                            ]"
                            style="color: #011646"
                            aria-label="Next"
                        >
                            <svg
                                class="w-[13px] h-3"
                                viewBox="0 0 13 12"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M6.85509 9.53636C6.62366 9.71697 6.22221 10.0202 6.08773 10.1218C5.80982 10.3265 5.75043 10.7177 5.95512 10.9957C6.15982 11.2736 6.55146 11.3327 6.8294 11.128L6.83122 11.1266C6.972 11.0203 7.38785 10.7062 7.62413 10.5218C8.09811 10.1519 8.73219 9.6432 9.3681 9.09108C10.0009 8.54164 10.6498 7.93692 11.1454 7.37599C11.3926 7.09624 11.6149 6.81266 11.7787 6.54086C11.9323 6.28621 12.0833 5.9638 12.0833 5.62505C12.0833 5.28629 11.9323 4.96387 11.7787 4.70923C11.6149 4.43742 11.3926 4.15385 11.1454 3.87409C10.6498 3.31316 10.0009 2.70844 9.36809 2.159C8.73217 1.60688 8.09808 1.09818 7.62409 0.728286C7.38803 0.544061 6.97235 0.230101 6.83119 0.123481L6.82896 0.121794C6.55102 -0.0828998 6.15977 -0.0235256 5.95508 0.25441C5.75038 0.532346 5.81033 0.924017 6.08827 1.12871C6.22275 1.23028 6.62363 1.53312 6.85506 1.71372C7.31858 2.07545 7.93449 2.56971 8.54857 3.10288C9.16576 3.63875 9.76685 4.20167 10.2087 4.70177C10.4303 4.95253 10.5986 5.17281 10.7082 5.35458C10.8113 5.52553 10.8327 5.62355 10.8327 5.62355C10.8327 5.62355 10.8113 5.72454 10.7082 5.8955C10.5986 6.07727 10.4303 6.29756 10.2087 6.54832C9.76684 7.04841 9.16577 7.61134 8.54858 8.1472C7.93451 8.68037 7.3186 9.17463 6.85509 9.53636Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M1.02175 9.53636C0.790329 9.71697 0.388875 10.0202 0.254397 10.1218C-0.0235141 10.3265 -0.0829025 10.7177 0.121786 10.9957C0.326481 11.2736 0.718128 11.3327 0.996062 11.128L0.997882 11.1266C1.13864 11.0203 1.5545 10.7062 1.79079 10.5218C2.26477 10.1519 2.89885 9.6432 3.53477 9.09108C4.16757 8.54164 4.81648 7.93692 5.31211 7.37599C5.55929 7.09624 5.78155 6.81266 5.94541 6.54086C6.09892 6.28621 6.24999 5.9638 6.24999 5.62505C6.25 5.28629 6.09893 4.96387 5.94541 4.70923C5.78156 4.43742 5.55929 4.15385 5.31211 3.87409C4.81648 3.31316 4.16757 2.70844 3.53475 2.159C2.89883 1.60688 2.26475 1.09818 1.79076 0.728286C1.55465 0.544024 1.13885 0.229975 0.997773 0.123417L0.995623 0.121794C0.717686 -0.0828998 0.326438 -0.0235256 0.121745 0.25441C-0.0829494 0.532346 -0.0230022 0.924017 0.254933 1.12871C0.389413 1.23028 0.790298 1.53312 1.02173 1.71372C1.48524 2.07545 2.10116 2.56971 2.71524 3.10288C3.33243 3.63875 3.93351 4.20167 4.37538 4.70177C4.59695 4.95253 4.76531 5.17281 4.87489 5.35458C4.97795 5.52553 4.99938 5.62355 4.99938 5.62355C4.99938 5.62355 4.97795 5.72454 4.87489 5.8955C4.76531 6.07727 4.59695 6.29756 4.37538 6.54832C3.93351 7.04841 3.33243 7.61134 2.71525 8.1472C2.10117 8.68037 1.48526 9.17463 1.02175 9.53636Z"
                                    fill="currentColor"
                                />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Category Filters (Products): one row, horizontal slider with arrows -->
                <div class="mt-4">
                    <div class="relative flex items-center gap-1 -mx-0.5">
                        <div
                            ref="productsSliderRef"
                            class="pos-menu-scroll flex-1 min-w-0 overflow-x-auto overflow-y-hidden scroll-smooth -mx-0.5"
                        >
                            <div
                                class="flex flex-nowrap items-center gap-2 min-w-0"
                            >
                                <span
                                    class="text-sm font-light dark:text-gray-300 whitespace-nowrap shrink-0 text-gray-500 dark:text-gray-400 ms-2"
                                >
                                    Products:
                                </span>
                                <button
                                    @click="handleCategoryFilter(null)"
                                    :class="[
                                        'px-3 py-2 text-xs font-medium rounded-lg whitespace-nowrap shrink-0',
                                        localCategoryId === null
                                            ? 'bg-gray-900 text-white dark:bg-white dark:text-gray-900'
                                            : 'bg-white text-gray-700 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700 border border-gray-200 dark:border-gray-600',
                                    ]"
                                >
                                    Show All
                                </button>
                                <button
                                    v-for="category in categories"
                                    :key="category.id"
                                    @click="handleCategoryFilter(category.id)"
                                    :class="[
                                        'px-3 py-2 text-xs font-medium rounded-lg whitespace-nowrap shrink-0',
                                        localCategoryId === category.id
                                            ? 'bg-gray-900 text-white dark:bg-white dark:text-gray-900'
                                            : 'bg-white text-gray-700 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700 border border-gray-200 dark:border-gray-600',
                                    ]"
                                >
                                    {{ category.category_name }}
                                    <span
                                        v-if="category.count !== undefined"
                                        class="text-xs text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-800 rounded-full px-1 py-0.5 ml-1"
                                    >
                                        {{ category.count }}
                                    </span>
                                </button>
                            </div>
                        </div>
                        <button
                            v-show="hasProductsOverflow"
                            type="button"
                            @click="scrollProducts(1)"
                            :disabled="!canScrollProductsRight"
                            :class="[
                                'shrink-0 w-8 h-8 flex items-center justify-center rounded-lg border-0 bg-transparent text-gray-700 dark:text-gray-200 hover:bg-gray-100/50 dark:hover:bg-gray-800/50 transition',
                                canScrollProductsRight
                                    ? 'opacity-100'
                                    : 'opacity-40 pointer-events-none',
                            ]"
                            style="color: #011646"
                            aria-label="Next"
                        >
                            <svg
                                class="w-[13px] h-3"
                                viewBox="0 0 13 12"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M6.85509 9.53636C6.62366 9.71697 6.22221 10.0202 6.08773 10.1218C5.80982 10.3265 5.75043 10.7177 5.95512 10.9957C6.15982 11.2736 6.55146 11.3327 6.8294 11.128L6.83122 11.1266C6.972 11.0203 7.38785 10.7062 7.62413 10.5218C8.09811 10.1519 8.73219 9.6432 9.3681 9.09108C10.0009 8.54164 10.6498 7.93692 11.1454 7.37599C11.3926 7.09624 11.6149 6.81266 11.7787 6.54086C11.9323 6.28621 12.0833 5.9638 12.0833 5.62505C12.0833 5.28629 11.9323 4.96387 11.7787 4.70923C11.6149 4.43742 11.3926 4.15385 11.1454 3.87409C10.6498 3.31316 10.0009 2.70844 9.36809 2.159C8.73217 1.60688 8.09808 1.09818 7.62409 0.728286C7.38803 0.544061 6.97235 0.230101 6.83119 0.123481L6.82896 0.121794C6.55102 -0.0828998 6.15977 -0.0235256 5.95508 0.25441C5.75038 0.532346 5.81033 0.924017 6.08827 1.12871C6.22275 1.23028 6.62363 1.53312 6.85506 1.71372C7.31858 2.07545 7.93449 2.56971 8.54857 3.10288C9.16576 3.63875 9.76685 4.20167 10.2087 4.70177C10.4303 4.95253 10.5986 5.17281 10.7082 5.35458C10.8113 5.52553 10.8327 5.62355 10.8327 5.62355C10.8327 5.62355 10.8113 5.72454 10.7082 5.8955C10.5986 6.07727 10.4303 6.29756 10.2087 6.54832C9.76684 7.04841 9.16577 7.61134 8.54858 8.1472C7.93451 8.68037 7.3186 9.17463 6.85509 9.53636Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M1.02175 9.53636C0.790329 9.71697 0.388875 10.0202 0.254397 10.1218C-0.0235141 10.3265 -0.0829025 10.7177 0.121786 10.9957C0.326481 11.2736 0.718128 11.3327 0.996062 11.128L0.997882 11.1266C1.13864 11.0203 1.5545 10.7062 1.79079 10.5218C2.26477 10.1519 2.89885 9.6432 3.53477 9.09108C4.16757 8.54164 4.81648 7.93692 5.31211 7.37599C5.55929 7.09624 5.78155 6.81266 5.94541 6.54086C6.09892 6.28621 6.24999 5.9638 6.24999 5.62505C6.25 5.28629 6.09893 4.96387 5.94541 4.70923C5.78156 4.43742 5.55929 4.15385 5.31211 3.87409C4.81648 3.31316 4.16757 2.70844 3.53475 2.159C2.89883 1.60688 2.26475 1.09818 1.79076 0.728286C1.55465 0.544024 1.13885 0.229975 0.997773 0.123417L0.995623 0.121794C0.717686 -0.0828998 0.326438 -0.0235256 0.121745 0.25441C-0.0829494 0.532346 -0.0230022 0.924017 0.254933 1.12871C0.389413 1.23028 0.790298 1.53312 1.02173 1.71372C1.48524 2.07545 2.10116 2.56971 2.71524 3.10288C3.33243 3.63875 3.93351 4.20167 4.37538 4.70177C4.59695 4.95253 4.76531 5.17281 4.87489 5.35458C4.97795 5.52553 4.99938 5.62355 4.99938 5.62355C4.99938 5.62355 4.97795 5.72454 4.87489 5.8955C4.76531 6.07727 4.59695 6.29756 4.37538 6.54832C3.93351 7.04841 3.33243 7.61134 2.71525 8.1472C2.10117 8.68037 1.48526 9.17463 1.02175 9.53636Z"
                                    fill="currentColor"
                                />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Menu Items Grid -->
                <div class="mt-4">
                    <ul
                        class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-8 gap-3"
                    >
                        <MenuItem
                            v-for="item in filteredItems"
                            :key="item.id"
                            :item="item"
                            :currency-symbol="currencySymbol"
                            @add-to-cart="handleAddToCart"
                        />
                    </ul>
                    <div
                        v-if="filteredItems.length === 0"
                        class="text-center py-8 text-gray-500 dark:text-gray-400"
                    >
                        No items found
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, watch, onMounted, onUnmounted, nextTick } from "vue";
import MenuItem from "./MenuItem.vue";

const showMenu = ref(false);

// Menu (Category) slider state
const menuSliderRef = ref(null);
const menuScrollLeft = ref(0);
const menuScrollWidth = ref(0);
const menuClientWidth = ref(0);
const hasMenuOverflow = computed(
    () => menuScrollWidth.value > menuClientWidth.value,
);
const canScrollMenuRight = computed(
    () =>
        menuScrollWidth.value > menuClientWidth.value &&
        menuScrollLeft.value <
            menuScrollWidth.value - menuClientWidth.value - 2,
);
function updateMenuScroll() {
    const el = menuSliderRef.value;
    if (!el) return;
    menuScrollLeft.value = el.scrollLeft;
    menuScrollWidth.value = el.scrollWidth;
    menuClientWidth.value = el.clientWidth;
}
function scrollMenu(dir) {
    const el = menuSliderRef.value;
    if (!el) return;
    el.scrollBy({ left: dir * 220, behavior: "smooth" });
}

// Products (Category) slider state
const productsSliderRef = ref(null);
const productsScrollLeft = ref(0);
const productsScrollWidth = ref(0);
const productsClientWidth = ref(0);
const hasProductsOverflow = computed(
    () => productsScrollWidth.value > productsClientWidth.value,
);
const canScrollProductsRight = computed(
    () =>
        productsScrollWidth.value > productsClientWidth.value &&
        productsScrollLeft.value <
            productsScrollWidth.value - productsClientWidth.value - 2,
);
function updateProductsScroll() {
    const el = productsSliderRef.value;
    if (!el) return;
    productsScrollLeft.value = el.scrollLeft;
    productsScrollWidth.value = el.scrollWidth;
    productsClientWidth.value = el.clientWidth;
}
function scrollProducts(dir) {
    const el = productsSliderRef.value;
    if (!el) return;
    el.scrollBy({ left: dir * 220, behavior: "smooth" });
}

let menuResizeObserver = null;
let productsResizeObserver = null;
onMounted(() => {
    nextTick(() => {
        const menuEl = menuSliderRef.value;
        if (menuEl) {
            menuEl.addEventListener("scroll", updateMenuScroll);
            menuResizeObserver = new ResizeObserver(updateMenuScroll);
            menuResizeObserver.observe(menuEl);
            updateMenuScroll();
        }
        const productsEl = productsSliderRef.value;
        if (productsEl) {
            productsEl.addEventListener("scroll", updateProductsScroll);
            productsResizeObserver = new ResizeObserver(updateProductsScroll);
            productsResizeObserver.observe(productsEl);
            updateProductsScroll();
        }
    });
});
onUnmounted(() => {
    const menuEl = menuSliderRef.value;
    if (menuEl) {
        menuEl.removeEventListener("scroll", updateMenuScroll);
        if (menuResizeObserver) menuResizeObserver.disconnect();
    }
    const productsEl = productsSliderRef.value;
    if (productsEl) {
        productsEl.removeEventListener("scroll", updateProductsScroll);
        if (productsResizeObserver) productsResizeObserver.disconnect();
    }
});

const props = defineProps({
    search: {
        type: String,
        default: "",
    },
    menuId: {
        type: [Number, String, null],
        default: null,
    },
    filterCategories: {
        type: [Number, String, null],
        default: null,
    },
    menus: {
        type: Array,
        default: () => [],
    },
    categories: {
        type: Array,
        default: () => [],
    },
    items: {
        type: Array,
        default: () => [],
    },
    order: {
        type: Object,
        default: () => null,
    },
    currencySymbol: {
        type: String,
        default: "$",
    },
});

const emit = defineEmits([
    "update:search",
    "update:menuId",
    "update:filterCategories",
    "add-to-cart",
    "reset",
]);

const localSearch = ref(props.search);
const localMenuId = ref(props.menuId);
const localCategoryId = ref(props.filterCategories);

// Watch for prop changes
watch(
    () => props.search,
    (newVal) => {
        localSearch.value = newVal;
    },
);

watch(
    () => props.menuId,
    (newVal) => {
        localMenuId.value = newVal;
    },
);

watch(
    () => props.filterCategories,
    (newVal) => {
        localCategoryId.value = newVal;
    },
);

// Filter items based on search, menu, and category
const filteredItems = computed(() => {
    let filtered = [...props.items];

    // Filter by search
    if (localSearch.value) {
        const searchLower = localSearch.value.toLowerCase();
        filtered = filtered.filter((item) =>
            (item.name || item.item_name || "")
                .toLowerCase()
                .includes(searchLower),
        );
    }

    // Filter by menu
    if (localMenuId.value !== null) {
        filtered = filtered.filter(
            (item) => item.menu_id === localMenuId.value,
        );
    }

    // Filter by category
    if (localCategoryId.value !== null) {
        filtered = filtered.filter(
            (item) => item.item_category_id === localCategoryId.value,
        );
    }

    return filtered;
});

const handleSearch = () => {
    emit("update:search", localSearch.value);
};

const handleMenuFilter = (menuId) => {
    localMenuId.value = menuId;
    emit("update:menuId", menuId);
};

const handleCategoryFilter = (categoryId) => {
    localCategoryId.value = categoryId;

    emit("update:filterCategories", categoryId);
};

const handleAddToCart = (itemId, variantId, modifierId) => {
    console.log("itemId", itemId);
    console.log("variantId", variantId);
    console.log("modifierId", modifierId);
    emit("add-to-cart", itemId, variantId, modifierId);
};

const handleReset = () => {
    localSearch.value = "";
    localMenuId.value = null;
    localCategoryId.value = null;
    emit("reset");
    emit("update:search", "");
    emit("update:menuId", null);
    emit("update:filterCategories", null);
};
</script>

<style scoped>
.pos-menu-scroll::-webkit-scrollbar {
    display: none;
    width: 0;
    height: 0;
}
.pos-menu-scroll {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>
