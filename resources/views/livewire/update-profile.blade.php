<div class="w-full max-w-xl mx-auto">
    @php
        $phoneLine = trim(($phoneCode ? '+'.$phoneCode.' ' : '').($phone ?? ''));
        $initial = $fullName ? mb_strtoupper(mb_substr($fullName, 0, 1, 'UTF-8'), 'UTF-8') : '?';
    @endphp

    <div class="rounded-md border border-gray-100 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="flex flex-row items-start gap-4">
            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-blue-600 text-xl font-bold text-white" aria-hidden="true">
                {{ $initial }}
            </div>
            <div class="min-w-0 flex-1 text-start">
                <p class="font-bold text-gray-900 dark:text-white truncate">{{ $fullName ?: '—' }}</p>
                @if($phoneLine !== '')
                    <p class="mt-0.5 text-sm text-gray-600 dark:text-gray-400">{{ $phoneLine }}</p>
                @endif
                @if($email)
                    <p class="mt-0.5 text-sm text-gray-600 dark:text-gray-400 truncate">{{ $email }}</p>
                @endif
            </div>
            <button type="button" wire:click="startEditing"
                class="shrink-0 rounded-md p-2 text-gray-400 transition hover:bg-gray-50 hover:text-gray-600 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                aria-label="@lang('menu.myInformation')">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
            </button>
        </div>
    </div>

    @if($restaurantHash)
        @php
            $logoutUrl = url('customer-logout').'?restaurant='.$restaurantHash;
            if ($shopBranchId) {
                $logoutUrl .= '&branch='.$shopBranchId;
            }
        @endphp
        <div class="mt-6 flex justify-center">
            <a href="{{ $logoutUrl }}"
                class="inline-flex w-full max-w-xs items-center justify-center rounded-md border border-gray-200 bg-white px-4 py-3 text-base font-semibold text-red-500 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700">
                @lang('app.logout')
            </a>
        </div>
    @endif

    @if($showEditForm)
        <div
            class="fixed inset-0 z-[100] flex items-end justify-center sm:items-center sm:p-4"
            role="dialog"
            aria-modal="true"
            aria-labelledby="profile-edit-modal-title"
            x-data
            x-on:keydown.escape.window="$wire.cancelEditing()"
        >
            <div
                class="absolute inset-0 bg-gray-900/50 dark:bg-black/60"
                wire:click="cancelEditing"
                aria-hidden="true"
            ></div>

            <div
                class="relative z-10 flex max-h-[min(92vh,720px)] w-full max-w-xl flex-col rounded-lg bg-white shadow-md dark:bg-gray-800 sm:max-h-[90vh] sm:rounded-2xl"
            >
                <div class="flex shrink-0 items-center justify-between px-5 py-4 dark:border-gray-700">
                    <h2 id="profile-edit-modal-title" class="text-lg font-bold text-gray-900 dark:text-white">
                        @lang('menu.myInformation')
                    </h2>
                    <button
                        type="button"
                        wire:click="cancelEditing"
                        class="rounded-full bg-white shadow-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-600 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                        aria-label="@lang('app.cancel')"
                    >
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="min-h-0 flex-1 overflow-y-auto overscroll-contain px-5 py-4">
                    <form wire:submit="submitForm" id="profile-edit-form">
                        @csrf
                        <div class="grid gap-4 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('app.fullName')</label>
                                <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" wire:model="fullName">
                                @error('fullName')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('modules.customer.email')</label>
                                <input type="email" id="email" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" wire:model="email">
                                @error('email')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('modules.customer.phone')</label>
                                <div class="flex gap-2">
                                    <div x-data="{ isOpen: @entangle('phoneCodeIsOpen').live }" @click.away="isOpen = false" class="relative w-32 shrink-0">
                                        <div @click="isOpen = !isOpen"
                                            class="p-2.5 bg-gray-50 border border-gray-300 rounded-lg cursor-pointer dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                            <div class="flex items-center justify-between">
                                                <span class="text-sm">
                                                    @if($phoneCode)
                                                        +{{ $phoneCode }}
                                                    @else
                                                        {{ __('modules.settings.select') }}
                                                    @endif
                                                </span>
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </div>
                                        </div>

                                        <ul x-show="isOpen" x-transition class="absolute z-[110] w-full mt-1 overflow-auto bg-white rounded-lg shadow-lg max-h-60 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                            <li class="sticky top-0 px-3 py-2 bg-white dark:bg-gray-700 z-10">
                                                <input wire:model.live.debounce.300ms="phoneCodeSearch" class="block w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-white" type="text" placeholder="{{ __('placeholders.search') }}" />
                                            </li>
                                            @forelse ($phonecodes as $phonecode)
                                                <li @click="$wire.selectPhoneCode('{{ $phonecode }}')"
                                                    wire:key="profile-phone-code-{{ $phonecode }}"
                                                    class="relative py-2 pl-3 text-gray-900 transition-colors duration-150 cursor-pointer select-none pr-9 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-300"
                                                    :class="{ 'bg-gray-100 dark:bg-gray-600': '{{ $phonecode }}' === '{{ $phoneCode }}' }" role="option">
                                                    <div class="flex items-center">
                                                        <span class="block ml-3 text-sm whitespace-nowrap">+{{ $phonecode }}</span>
                                                        <span x-show="'{{ $phonecode }}' === '{{ $phoneCode }}'" class="absolute inset-y-0 right-0 flex items-center pr-4 text-black dark:text-gray-300" x-cloak>
                                                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </li>
                                            @empty
                                                <li class="relative py-2 pl-3 text-gray-500 cursor-default select-none pr-9 dark:text-gray-400">
                                                    {{ __('modules.settings.noPhoneCodesFound') }}
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div>

                                    <input type="tel" id="telephone" class="flex-1 min-w-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" wire:model="phone" placeholder="1234567890">
                                </div>
                                @error('phoneCode')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                                @error('phone')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('modules.customer.address')</label>
                                <textarea id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" wire:model="address" rows="3"></textarea>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="flex shrink-0 flex-wrap gap-3 justify-end px-5 py-4">
                    <button type="button" wire:click="cancelEditing"
                        class="inline-flex items-center rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                        @lang('app.cancel')
                    </button>
                    <button type="submit" form="profile-edit-form"
                        class="inline-flex items-center rounded-md px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:opacity-95 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2"
                        style="background-color: var(--brand-primary);">
                        @lang('app.save')
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
