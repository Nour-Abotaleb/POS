<div class="relative flex-1 min-h-0 flex flex-col">
    {{-- Include MultiPOS registration and status handling --}}
    @if(module_enabled('MultiPOS'))
        @include('multipos::partials.pos-registration', [
            'hasPosMachine' => $hasPosMachine,
            'machineStatus' => $machineStatus,
            'posMachine' => $posMachine,
            'limitReached' => $limitReached,
            'limitMessage' => $limitMessage,
            'shouldBlockPos' => $shouldBlockPos
        ])
    @endif

    {{-- Only render POS content if not blocked by registration/pending/declined --}}
    @if(!$shouldBlockPos)
        @if(!$orderTypeId)
        @livewire('forms.OrderTypeSelection')
        @endif

        <div class="pos-container flex flex-col md:flex-row flex-1 min-h-0 h-full gap-3" x-data="{
            init() {
                if (typeof Alpine === 'undefined') return;
                if (!Alpine.store('pos')) Alpine.store('pos', { showProductsPanel: false });
                else if (typeof Alpine.store('pos').showProductsPanel === 'undefined') Alpine.store('pos').showProductsPanel = false;
            },
            get menuOpen() { return this.$store.pos?.showProductsPanel ?? false; },
            toggleMenu() {
                if (!this.$store.pos) Alpine.store('pos', { showProductsPanel: false });
                this.$store.pos.showProductsPanel = !this.$store.pos.showProductsPanel;
            }
        }">
            {{-- Single menu toggle: fixed so it stays visible when products panel is full screen. Shows Menu to open, X/Close to close. --}}
            <div class="fixed bottom-6 right-6 z-50 md:hidden">
                <button type="button"
                    @click="toggleMenu()"
                    style="background-color: var(--brand-primary); border-color: var(--brand-primary);"
                    class="text-white rounded-full shadow-lg p-4 flex items-center justify-center gap-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white transition hover:opacity-90"
                    aria-label="Toggle menu">
                    <svg x-show="!menuOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg x-show="menuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span class="ml-1" x-show="!menuOpen">@lang('menu.menu')</span>
                    <span class="ml-1" x-show="menuOpen" x-cloak>@lang('app.close')</span>
                </button>
            </div>
            {{-- Products (menu) section: on mobile appears below order panel (order-2), on desktop left (order-1). flex-none on mobile avoids empty space when panel is closed. --}}
            <div class="order-2 lg:order-1 min-w-0 flex-none lg:flex-[2] flex flex-col min-h-0 pt-0 lg:pt-16 overflow-y-auto pos-slider-scroll-hide" data-pos-products-panel>
                @include('pos.menu')
            </div>
            {{-- Order panel: on mobile first (order-1), on desktop right (order-2). Width/flex controlled by layout CSS so desktop always shows 500px. --}}
            <div class="pos-order-panel-wrapper order-1 lg:order-2 w-full min-w-0 flex flex-col">
                @if (!$orderDetail)
                @include('pos.kot_items')
                @elseif($orderDetail->status == 'kot')
                    @include('pos.order_items')
                @elseif($orderDetail->status == 'billed' || $orderDetail->status == 'paid')
                    @include('pos.order_detail')
                @elseif($orderDetail->status == 'draft')
                    @include('pos.kot_items')
                @endif
            </div>
        </div>

        <x-dialog-modal wire:model="showVariationModal" maxWidth="xl">
            <x-slot name="title">
                @lang('modules.menu.itemVariations')
            </x-slot>

            <x-slot name="content">
                @if ($showVariationModal && $menuItem)
                @livewire('pos.itemVariations', [
                    'menuItemId' => $menuItem->id,
                    'orderTypeId' => $orderTypeId,
                    'deliveryAppId' => $this->normalizedDeliveryAppId
                ], key(str()->random(50)))
                @elseif($showVariationModal)
                    <div class="py-8 text-center text-gray-500 dark:text-gray-400">@lang('messages.loadingData')</div>
                @endif
            </x-slot>

            <x-slot name="footer">
                <x-button-cancel wire:click="$toggle('showVariationModal')" wire:loading.attr="disabled" />
            </x-slot>
        </x-dialog-modal>

        <x-dialog-modal wire:model="showKotNote" maxWidth="xl">
            <x-slot name="title">
                @lang('modules.order.addNote')
            </x-slot>

            <x-slot name="content">
                <div>
                    <x-label for="orderNote" :value="__('modules.order.orderNote')" />
                    <x-textarea data-gramm="false"  class="block mt-1 w-full"  wire:model.defer="orderNote" rows="2" />
                    <x-input-error for="orderNote" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-button wire:click="$toggle('showKotNote')" wire:loading.attr="disabled">@lang('app.save')</x-button>
            </x-slot>
        </x-dialog-modal>

        <x-dialog-modal wire:model="showTableModal" maxWidth="2xl">
            <x-slot name="title">
                @lang('modules.table.availableTables')
            </x-slot>

            <x-slot name="content">
                @if($showTableModal)
                    @livewire('pos.setTable')
                @else
                    <div class="py-8 text-center text-gray-500 dark:text-gray-400">@lang('messages.loadingData')</div>
                @endif
            </x-slot>

            <x-slot name="footer">
                <x-button-cancel wire:click="$toggle('showTableModal')" wire:loading.attr="disabled" />
            </x-slot>
        </x-dialog-modal>

        <x-dialog-modal wire:model="showDiscountModal" maxWidth="xl">
            <x-slot name="title">
                @lang('modules.order.addDiscount')
            </x-slot>

            <x-slot name="content">
                <div class="mt-4 flex">
                    <!-- Discount Value -->
                    <x-input id="discountValue" class="block w-2/3 text-md" type="number" step="0.001" wire:model.defer="discountValue"
                        placeholder="{{ __('modules.order.enterDiscountValue') }}" min="0" />
                    <!-- Discount Type -->
                    <x-select id="discountType" class="block ml-2 w-1/3 rounded-md border-gray-300" wire:model.defer="discountType">
                        <option value="fixed">@lang('modules.order.fixed')</option>
                        <option value="percent">@lang('modules.order.percent')</option>
                    </x-select>
                </div>
            <x-input-error for="discountValue" class="mt-2" />
            </x-slot>

            <x-slot name="footer">
                <x-button-cancel wire:click="$set('showDiscountModal', false)">@lang('app.cancel')</x-button-cancel>
                <x-button class="ml-3" wire:click="addDiscounts" wire:loading.attr="disabled">@lang('app.save')</x-button>
            </x-slot>
        </x-dialog-modal>


        @if ($errors->count())
            <x-dialog-modal wire:model='showErrorModal' maxWidth="xl">
                <x-slot name="title">
                    @lang('app.error')
                </x-slot>

                <x-slot name="content">
                    <div class="space-y-3">
                        @foreach ($errors->all() as $error)
                            <div class="text-red-700 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                                </svg>
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>

                </x-slot>

                <x-slot name="footer">
                    @if ($showNewKotButton)
                        <x-button class="me-2">
                            <a href="{{ route('pos.kot', ['id' => $orderDetail->id]) }}">
                                @lang('modules.order.newKot')
                            </a>
                        </x-button>
                    @endif
                    <x-button-cancel wire:click="closeErrorModal" wire:loading.attr="disabled" />
                </x-slot>
            </x-dialog-modal>
        @endif

        <x-dialog-modal wire:model="showModifiersModal" maxWidth="md" :noPadding="true">
            <x-slot name="title">
                @lang('modules.modifier.itemModifiers')
            </x-slot>

            <x-slot name="content">
                @if ($showModifiersModal && $selectedModifierItem)
                    @livewire('pos.itemModifiers', [
                        'menuItemId' => $selectedModifierItem,
                        'orderTypeId' => $orderTypeId,
                        'deliveryAppId' => $selectedDeliveryApp
                    ], key('pos-modifiers-' . $selectedModifierItem))
                @elseif($showModifiersModal)
                    <div class="py-8 text-center text-gray-500 dark:text-gray-400">@lang('messages.loadingData')</div>
                @endif
            </x-slot>
        </x-dialog-modal>

        @script
        <script>
            $wire.on('play_beep', () => {
                new Audio("{{ asset('sound/sound_beep-29.mp3')}}").play();
            });

            $wire.on('print_location', (url) => {
                // Detect if running in PWA standalone mode
                const isPWA = (window.matchMedia('(display-mode: standalone)').matches) || 
                             (window.navigator.standalone === true) ||
                             (document.referrer.includes('android-app://'));
                
                if (isPWA) {
                    // In PWA mode, open in same tab to prevent app closing
                    window.location.href = url;
                } else {
                    // In browser mode, open in new tab
                    const anchor = document.createElement('a');
                    anchor.href = url;
                    anchor.target = '_blank';
                    anchor.click();
                }
            });

            // Handle deletion of merged orders after save
            // Use a small delay to ensure it happens after Livewire response is complete
            $wire.on('deleteMergedOrdersAfterSave', (orderIds) => {
                // Delay deletion to ensure it happens after all redirects/modals are processed
                setTimeout(() => {
                    $wire.call('handleDeleteMergedOrdersAfterSave', orderIds);
                }, 100);
            });

        </script>

        @endscript
    @endif

</div>
