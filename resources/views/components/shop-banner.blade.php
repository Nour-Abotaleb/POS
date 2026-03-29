@props([
    'restaurant',
    'carouselId' => null,
    'textBannerMarginTop' => '',
])

@php
    $restaurant->loadMissing(['cartHeaderSetting.images']);
    $setting = $restaurant->cartHeaderSetting;
    $isHeaderDisabled = $setting && ($setting->is_header_disabled ?? false);
    $headerType = $setting?->header_type ?? 'text';
    $headerText = $setting?->header_text;
    $headerImages = $setting?->images ?? collect();

    if (!$setting) {
        $headerText = __('messages.frontHeroHeading');
    }

    $carouselRootId = $carouselId ?? 'shop-banner-carousel-' . $restaurant->id;
@endphp

@if (!$isHeaderDisabled)
    <section {{ $attributes->merge(['class' => 'px-4 bg-white dark:bg-gray-900']) }}>
        @if ($headerType === 'text')
            <div
                class="mx-auto mt-4{{ $textBannerMarginTop }} flex items-center justify-center rounded-xl border border-gray-200 bg-[var(--brand-primary)]/10 px-4 py-5 text-center dark:border-gray-700 dark:bg-gray-800 sm:px-6 sm:py-6"
                style="min-height: clamp(9rem, 18vw, 15rem); max-height: clamp(10rem, 22vw, 16rem);"
            >
                <div class="max-w-3xl text-gray-900 dark:text-white">
                    <p class="whitespace-pre-line text-base font-semibold leading-snug sm:text-lg md:text-xl">
                        {{ $headerText ?: __('messages.frontHeroHeading') }}
                    </p>
                </div>
            </div>
        @elseif ($headerType === 'image' && $headerImages->count() > 0)
            <div
                id="{{ $carouselRootId }}"
                class="relative mx-auto w-full max-w-screen-xl touch-pan-y"
                data-carousel="slide"
            >
                {{-- clamp(): works even if Tailwind CSS is stale; avoids breakpoint chains that shrink (e.g. h-96 + sm:h-64). --}}
                <div
                    class="relative w-full overflow-hidden rounded-xl border border-gray-200 shadow-lg dark:border-gray-700"
                    style="height: clamp(8rem, 26vw, 14rem);"
                >
                    @foreach ($headerImages as $index => $image)
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img
                                src="{{ $image->image_url }}"
                                class="absolute inset-0 block h-full w-full object-cover object-center"
                                alt="{{ $image->alt_text ?? $restaurant->name }}"
                                loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                                width="1200"
                                height="600"
                            >
                        </div>
                    @endforeach
                </div>

                @if ($headerImages->count() > 1)
                    <div
                        class="absolute z-30 flex -translate-x-1/2 space-x-2 bottom-3 left-1/2 sm:bottom-5 sm:space-x-3 rtl:space-x-reverse"
                    >
                        @foreach ($headerImages as $index => $image)
                            <button
                                type="button"
                                class="h-2.5 w-2.5 rounded-full transition-all duration-200 sm:h-3 sm:w-3 {{ $index === 0 ? 'bg-white dark:bg-gray-200' : 'bg-white/50 hover:bg-white/75 dark:bg-gray-200/50 dark:hover:bg-gray-200/75' }}"
                                aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                aria-label="Slide {{ $index + 1 }}"
                                data-carousel-slide-to="{{ $index }}"
                            ></button>
                        @endforeach
                    </div>

                    <button
                        type="button"
                        class="group absolute start-0 top-0 z-30 hidden h-full cursor-pointer items-center justify-center px-2 focus:outline-none sm:flex sm:px-4"
                        data-carousel-prev
                    >
                        <span
                            class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/30 transition-all duration-200 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70 sm:h-10 sm:w-10"
                        >
                            <svg
                                class="h-3 w-3 text-white rtl:rotate-180 dark:text-gray-200 sm:h-4 sm:w-4"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 6 10"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 1 1 5l4 4"
                                />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button
                        type="button"
                        class="group absolute end-0 top-0 z-30 hidden h-full cursor-pointer items-center justify-center px-2 focus:outline-none sm:flex sm:px-4"
                        data-carousel-next
                    >
                        <span
                            class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/30 transition-all duration-200 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70 sm:h-10 sm:w-10"
                        >
                            <svg
                                class="h-3 w-3 text-white rtl:rotate-180 dark:text-gray-200 sm:h-4 sm:w-4"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 6 10"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m1 9 4-4-4-4"
                                />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                @endif
            </div>
        @else
            <div
                class="mx-auto max-w-screen-xl rounded-xl bg-[var(--brand-primary)]/10 px-4 py-5 text-center dark:bg-gray-800 sm:py-6 lg:px-12"
                style="min-height: clamp(7rem, 18vw, 11rem); max-height: clamp(8rem, 22vw, 14rem);"
            >
                <h1
                    class="text-2xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white md:text-3xl"
                >
                    @lang('messages.frontHeroHeading')
                </h1>
            </div>
        @endif
    </section>
@endif
