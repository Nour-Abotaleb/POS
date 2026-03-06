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
                <!-- Menu Filters -->
                <div
                    class="flex gap-2 mt-4 overflow-x-auto pb-2 scrollbar-thin scrollbar-thumb-gray-300 dark:scrollbar-thumb-gray-600 flex-wrap"
                >
                    <button
                        @click="handleMenuFilter(null)"
                        :class="[
                            'px-3 py-1.5 text-sm font-medium rounded-lg whitespace-nowrap',
                            localMenuId === null
                                ? 'bg-gray-900 text-white dark:bg-white dark:text-gray-900'
                                : 'bg-white text-gray-700 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700',
                        ]"
                    >
                        Categories
                    </button>

                    <button
                        v-for="menu in menus"
                        :key="menu.id"
                        @click="handleMenuFilter(menu.id)"
                        :class="[
                            'px-3 py-1.5 text-sm font-medium rounded-lg whitespace-nowrap',
                            localMenuId === menu.id
                                ? 'bg-gray-900 text-white dark:bg-white dark:text-gray-900'
                                : 'bg-white text-gray-700 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700',
                        ]"
                    >
                        {{ menu.menu_name }}
                    </button>
                </div>

                <!-- Category Filters -->
                <div
                    class="flex gap-2 mt-4 overflow-x-auto pb-2 scrollbar-thin scrollbar-thumb-gray-300 dark:scrollbar-thumb-gray-600 flex-wrap"
                >
                    <button
                        @click="handleCategoryFilter(null)"
                        :class="[
                            'px-3 py-1.5 text-sm font-medium rounded-lg whitespace-nowrap',
                            localCategoryId === null
                                ? 'bg-gray-900 text-white dark:bg-white dark:text-gray-900'
                                : 'bg-white text-gray-700 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700',
                        ]"
                    >
                        Products
                    </button>

                    <button
                        v-for="category in categories"
                        :key="category.id"
                        @click="handleCategoryFilter(category.id)"
                        :class="[
                            'px-3 py-1.5 text-sm font-medium rounded-lg whitespace-nowrap',
                            localCategoryId === category.id
                                ? 'bg-gray-900 text-white dark:bg-white dark:text-gray-900'
                                : 'bg-white text-gray-700 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700',
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
import { ref, computed, watch } from "vue";
import MenuItem from "./MenuItem.vue";

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

<style scoped></style>
