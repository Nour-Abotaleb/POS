@extends('layouts.guest')

@section('content')

@php
    $daysOrder = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    $hoursLocale = session('customer_locale', app()->getLocale());
    $todayName = now()->format('l');
    $todayIndexDefault = array_search($todayName, $daysOrder, true);
    if ($todayIndexDefault === false) {
        $todayIndexDefault = 0;
    }
@endphp

<div
    x-data="{
        hoursModalOpen: false,
        hoursBranchName: '',
        hoursDays: [],
        hoursSelected: 0,
        openBranchHours(payload) {
            this.hoursBranchName = payload.branchName;
            this.hoursDays = payload.days;
            this.hoursSelected = typeof payload.todayIndex === 'number' ? payload.todayIndex : 0;
            this.hoursModalOpen = true;
            document.body.classList.add('overflow-hidden');
        },
        closeBranchHours() {
            this.hoursModalOpen = false;
            document.body.classList.remove('overflow-hidden');
        },
        activeDay() {
            return this.hoursDays[this.hoursSelected] || { closed: true, from: null, to: null, label: '' };
        }
    }"
    @keydown.escape.window="closeBranchHours()"
>
<x-shop-banner :restaurant="$restaurant" />

<section class="bg-white dark:bg-transparent py-6 px-4 pb-12">
    <div class="mx-auto">
        <div class="flex flex-col items-center mb-8">
            <!-- <div
                class="rounded-2xl p-5 shadow-md mb-1"
                style="background-color: var(--brand-primary);"
            >
                <img
                    src="{{ $restaurant->logoUrl }}"
                    alt="{{ $restaurant->name }}"
                    class="h-16 w-auto max-w-[140px] object-contain mx-auto"
                />
            </div> -->
            <h1 class="w-full text-start text-2xl font-bold text-gray-900 dark:text-white">
                @lang('menu.branches')
            </h1>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach ($restaurant->branches as $branch)
                @php
                    $isCurrent = $shopBranch && (int) $shopBranch->id === (int) $branch->id;
                    $branchIsOpen = $branch->is_active !== false;
                    $mapHref = null;
                    if ($branch->lat && $branch->lng) {
                        $mapHref = 'https://www.google.com/maps/search/?api=1&query=' . $branch->lat . ',' . $branch->lng;
                    } elseif ($branch->address) {
                        $mapHref = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($branch->address);
                    }

                    $hoursDays = [];
                    foreach ($daysOrder as $day) {
                        $dayKey = strtolower($day);
                        $rows = $branch->reservationSettings
                            ->where('day_of_week', $day)
                            ->filter(fn ($r) => (bool) $r->available);
                        if ($rows->isEmpty()) {
                            $hoursDays[] = [
                                'label' => __('menu.day_'.$dayKey),
                                'closed' => true,
                                'from' => null,
                                'to' => null,
                            ];
                            continue;
                        }
                        $minStart = $rows->min('time_slot_start');
                        $maxEnd = $rows->max('time_slot_end');
                        $openT = \Carbon\Carbon::parse($minStart);
                        $closeT = \Carbon\Carbon::parse($maxEnd);
                        $hoursDays[] = [
                            'label' => __('menu.day_'.$dayKey),
                            'closed' => false,
                            'from' => $openT->copy()->locale($hoursLocale)->translatedFormat('g:i a'),
                            'to' => $closeT->copy()->locale($hoursLocale)->translatedFormat('g:i a'),
                        ];
                    }

                    $hoursModalPayload = [
                        'branchName' => $branch->name,
                        'days' => $hoursDays,
                        'todayIndex' => $todayIndexDefault,
                    ];
                @endphp
                <article
                    class="relative overflow-hidden rounded-lg bg-white dark:bg-gray-800 shadow-sm border border-gray-100 dark:border-gray-700"
                >
                    <div class="flex items-center justify-between gap-3 p-4">
                        <a
                            href="{{ route('shop_pick_branch', [$restaurant->hash, $branch->id]) }}"
                            wire:navigate
                            class="min-w-0 flex-1 text-start rounded-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-[var(--brand-primary)] focus-visible:ring-offset-2 dark:focus-visible:ring-offset-gray-800"
                        >
                            <h2 class="font-bold text-gray-900 dark:text-white leading-snug">
                                {{ $branch->name }}
                            </h2>
                            @if ($branch->address)
                                <p class="mt-1.5 text-sm text-gray-500 dark:text-gray-400 leading-relaxed">
                                    {{ $branch->address }}
                                </p>
                            @endif
                            <div class="mt-3 flex flex-wrap items-center gap-2">
                                @if ($branchIsOpen)
                                    <span class="inline-block rounded-md px-2.5 py-1 text-xs font-semibold bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">
                                        @lang('menu.branch_open')
                                    </span>
                                @else
                                    <span class="inline-block rounded-md px-2.5 py-1 text-xs font-semibold bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-200">
                                        @lang('menu.branch_closed')
                                    </span>
                                @endif
                            </div>
                        </a>

                        <div class="flex gap-2 shrink-0">
                            @if ($branch->phone)
                                <a
                                    href="tel:{{ preg_replace('/\s+/', '', $branch->phone) }}"
                                    class="p-1 text-black font-light hover:text-[var(--brand-primary)] hover:bg-gray-50 dark:hover:bg-gray-700 transition"
                                    title="@lang('menu.branch_call')"
                                    onclick="event.stopPropagation()"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </a>
                            @endif
                            @if ($mapHref)
                                <a
                                    href="{{ $mapHref }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="p-1 rounded-md text-gray-600 hover:text-[var(--brand-primary)] hover:bg-gray-50 dark:hover:bg-gray-700 transition"
                                    title="@lang('menu.branch_map')"
                                    onclick="event.stopPropagation()"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </a>
                            @endif
                            <button
                                type="button"
                                class="p-1 rounded-md text-gray-600 hover:text-[var(--brand-primary)] hover:bg-gray-50 dark:hover:bg-gray-700 transition dark:text-gray-400"
                                title="@lang('menu.branch_hours_title')"
                                aria-haspopup="dialog"
                                @click.prevent.stop="openBranchHours(@js($hoursModalPayload))"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- Branch hours modal --}}
<div
    x-show="hoursModalOpen"
    x-cloak
    x-transition
    class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/50 backdrop-blur-[2px]"
    role="dialog"
    aria-modal="true"
    aria-labelledby="branch-hours-heading"
    @click.self="closeBranchHours()"
>
    <div
        @click.stop
        x-transition
        class="relative w-full max-w-lg rounded-lg bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 max-h-[90vh] flex flex-col"
    >
        <div class="flex items-center justify-between gap-3 px-5 pt-5 pb-3 shrink-0">
            <div class="min-w-0 flex-1 text-start">
                <h2 id="branch-hours-heading" class="text-lg font-bold text-gray-900 dark:text-white">
                    @lang('menu.branch_hours_title')
                </h2>
                <!-- <p class="text-sm text-gray-500 dark:text-gray-400 truncate mt-0.5" x-text="hoursBranchName"></p> -->
            </div>
            <button
                type="button"
                class="shrink-0 flex h-8 w-8 items-center justify-center rounded-full bg-white dark:bg-gray-200 text-gray-600 shadow-md"
                @click="closeBranchHours()"
                aria-label="@lang('app.close')"
            >
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="px-5 py-4 overflow-y-auto min-h-0 flex-1">
            <div class="flex gap-2 justify-center mb-5" dir="{{ session('customer_is_rtl') ? 'rtl' : 'ltr' }}">
                <template x-for="(d, i) in hoursDays" :key="i">
                    <button
                        type="button"
                        @click="hoursSelected = i"
                        class="rounded-lg px-2 py-2 text-sm font-light transition w-[80px] text-center"
                        :class="hoursSelected === i
                            ? 'text-white shadow-sm'
                            : 'bg-gray-100 text-gray-600 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600'"
                        :style="hoursSelected === i ? 'background-color: var(--brand-primary);' : ''"
                        x-text="d.label"
                    ></button>
                </template>
            </div>

            <div class="grid grid-cols-2 gap-4 max-w-xs mx-auto sm:mt-10 pb-4" dir="{{ session('customer_is_rtl') ? 'rtl' : 'ltr' }}">
                <div class="text-center space-y-2">
                    <div class="text-sm font-bold text-gray-900 dark:text-white">@lang('menu.branch_hours_from')</div>
                    <div class="rounded-md bg-gray-100 dark:bg-gray-700 px-4 py-2 text-sm font-light text-gray-600 dark:text-gray-100 min-h-[2.5rem] flex items-center justify-center">
                        <span x-show="activeDay().closed" x-cloak class="text-gray-500 dark:text-gray-400">@lang('menu.branch_hours_closed_day')</span>
                        <span x-show="!activeDay().closed" x-text="activeDay().from || '—'"></span>
                    </div>
                </div>
                <div class="text-center space-y-2">
                    <div class="text-sm font-bold text-gray-900 dark:text-white">@lang('menu.branch_hours_to')</div>
                    <div class="rounded-md bg-gray-100 dark:bg-gray-700 px-4 py-2 text-sm font-light text-gray-600 dark:text-gray-100 min-h-[2.5rem] flex items-center justify-center">
                        <span x-show="activeDay().closed" x-cloak class="text-gray-500 dark:text-gray-400">@lang('menu.branch_hours_closed_day')</span>
                        <span x-show="!activeDay().closed" x-text="activeDay().to || '—'"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
