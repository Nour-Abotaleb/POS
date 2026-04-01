<div class="text-base text-gray-900 dark:text-gray-100 flex flex-col" style="max-height: 85vh; max-height: 85svh;">
<style>
    /* Dark mode: Riyal/currency is often a black img or SVG — invert so it matches light text */
    .dark .item-modifiers-currency img,
    .dark .item-modifiers-currency svg {
        filter: invert(1) !important;
    }
    /* Dark blue add button: bright glyph on #011646 (spinner SVG is outside .btn-add-item-currency) */
    .btn-add-item .btn-add-item-currency img,
    .btn-add-item .btn-add-item-currency svg {
        filter: invert(1) brightness(10) !important;
    }
</style>
    @php $currencyId = $selectedModifierItem->branch->restaurant->currency_id; @endphp

    <!-- Hero Image -->
    <div
        class="relative overflow-hidden rounded-t-lg flex-shrink-0"
        style="height: clamp(240px, 30vh, 300px);"
    >
        <!-- Close button -->
        <button type="button"
            wire:click="$dispatch('closeModifiersModal')"
            class="absolute top-3 left-3 w-9 h-9 flex items-center justify-center bg-white/50 rounded-full shadow text-gray-500 hover:text-gray-700 z-10 border-0 focus:outline-none focus:ring-0 focus:ring-offset-0 focus:ring-transparent focus-border-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        @if (restaurant() && !restaurant()->hide_menu_item_image_on_customer_site)
        <img class="w-full h-full object-cover"
            src="{{ $selectedModifierItem->item_photo_url ?: asset('img/product.jpg') }}"
            alt="{{ $selectedModifierItem->item_name }}">
        @else
        <img class="w-full h-full object-cover"
            src="{{ asset('img/product.jpg') }}"
            alt="{{ $selectedModifierItem->item_name }}">
        @endif
    </div>

    <!-- Scrollable Content -->
    <div class="flex-1 overflow-y-auto scrollbar-hide px-6 pb-2">
    <!-- Item Info -->
    <div class="pt-4 flex items-center justify-between gap-2">
        <span class="text-xl font-bold text-gray-900 dark:text-white text-end">
            {{ $selectedModifierItem->item_name }}
            @if ($selectedVariationName)
                <span class="text-sm font-normal text-gray-500">({{ $selectedVariationName }})</span>
            @endif
        </span>
        @if ($selectedModifierItem->price)
        <span class="item-modifiers-currency text-base font-bold text-gray-900 dark:text-white whitespace-nowrap inline-flex items-center gap-1">
            {!! currency_format($selectedModifierItem->price, $currencyId) !!}
        </span>
        @endif
    </div>

    @if ($selectedModifierItem->description)
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400 text-center">{{ $selectedModifierItem->description }}</p>
    @endif

    @if ($selectedModifierItem->calories || $selectedModifierItem->preparation_time)
    <div class="mt-2 flex items-center gap-3 justify-center flex-wrap text-sm text-gray-500 dark:text-gray-400">
        @if ($selectedModifierItem->calories)
        <span class="inline-flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z"/>
            </svg>
            {{ $selectedModifierItem->calories }} @lang('modules.menu.calories')
        </span>
        @endif
        @if ($selectedModifierItem->preparation_time)
        <span class="inline-flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
            {{ $selectedModifierItem->preparation_time }} @lang('modules.menu.minutes')
        </span>
        @endif
    </div>
    @endif

    <!-- Modifier Groups -->
    @foreach ($modifiers as $modifier)
    <div class="mt-5">
        <!-- Group Header -->
        <div class="text-start mb-2">
            <div class="text-base font-semibold text-gray-900 dark:text-white">{{ $modifier->name }}</div>
            @if ($modifier->description)
            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $modifier->description }}</div>
            @endif
            @if ($modifier->itemModifiers->isNotEmpty() && ($modifier->itemModifiers->first()->max_items_on_order ?? null))
            <div class="text-sm text-gray-400">@lang('app.max') {{ $modifier->itemModifiers->first()->max_items_on_order }}</div>
            @endif
        </div>

        <!-- Options -->
        @foreach ($modifier->options as $option)
        <div class="flex w-full items-center justify-between gap-3 py-3">
            <div class="flex min-w-0 flex-1 items-center gap-3 text-start">
                @if ($option->is_available)
                    <x-checkbox
                        class="shrink-0"
                        wire:model="selectedModifiers.{{ $option->id }}"
                        wire:click="toggleSelection({{ $modifier->id }}, {{ $option->id }})"
                        value="{{ $option->id }}" />
                @else
                    <span class="shrink-0 text-xs font-medium px-2 py-0.5 rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                        @lang('modules.menu.notAvailable')
                    </span>
                @endif
                <div class="min-w-0 text-gray-900 dark:text-white font-medium">{{ $option->name }}</div>
            </div>
            @if ($option->is_available && $option->price)
                <span class="item-modifiers-currency shrink-0 text-sm font-medium text-gray-900 dark:text-gray-300 whitespace-nowrap inline-flex items-center gap-1">{!! currency_format($option->price, $currencyId) !!}</span>
            @endif
        </div>
        @endforeach

        <x-input-error for="requiredModifiers.{{ $modifier->id }}" class="mt-2" />
    </div>
    @endforeach
    </div><!-- end scrollable -->

    <!-- Fixed Bottom: Add button + quantity counter -->
    <div class="flex-shrink-0 flex items-center gap-3 px-6 py-4 border-t border-gray-100 dark:border-gray-700">
        <div class="flex items-center justify-between bg-[#F8F8F8] rounded-md overflow-hidden md:min-w-[180px] flex-shrink-0 py-2.5 px-2" style="background-color: #F8F8F8">
            <button type="button"
            wire:click="incrementQuantity"
            class="w-6 h-6 md:w-8 md:h-8 flex items-center justify-center hover:bg-gray-50 border border-gray-400 rounded-md dark:hover:bg-gray-700 text-gray-400 py-2">
            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
            </button>
            <span class="px-3 text-gray-900 font-medium text-xl sm:text-2xl tabular-nums select-none">{{ $quantity }}</span>
            <button type="button"
                wire:click="decrementQuantity"
                class="w-6 h-6 md:w-8 md:h-8 flex items-center justify-center hover:bg-gray-50 border border-gray-400 rounded-md dark:hover:bg-gray-700 text-gray-400 py-2">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                </svg>
            </button>
        </div>
        <button
            type="button"
            wire:click="saveModifiers"
            wire:loading.attr="disabled"
            class="btn-add-item flex-1 py-3.5 rounded-md text-white font-bold text-base transition"
            style="background-color: #011646;">
            <span wire:loading.remove wire:target="saveModifiers" class="text-xs md:text-sm lg:text-base inline-flex items-center justify-center gap-1">
                @lang('app.add') (<span class="btn-add-item-currency item-modifiers-currency inline-flex items-center gap-0">{!! currency_format($selectedModifierItem->price * $quantity, $currencyId) !!}</span>)
            </span>
            <span wire:loading wire:target="saveModifiers" class="inline-flex items-center justify-center">
                <svg class="w-5 h-5 animate-spin" viewBox="0 0 24 24" fill="none">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                </svg>
            </span>
        </button>
    </div>
</div>
