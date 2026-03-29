@extends('layouts.guest')

@section('content')

<x-shop-banner :restaurant="$restaurant" />

<section class="bg-white dark:bg-transparent py-6 px-4 pb-12 min-h-[60vh]">
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
            <h1 class="mt-6 w-full text-start text-2xl font-bold text-gray-900 dark:text-white">
                @lang('menu.myAddresses')
            </h1>
        </div>

        @livewire('shop.addresses', ['shopBranch' => $shopBranch])
    </div>
</section>

@endsection
