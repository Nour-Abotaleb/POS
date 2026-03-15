<div>
    <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px settings-tab-bar">
            @if (user()->hasRole('Admin_'.user()->restaurant_id))

            <li class="me-2">
                <a href="{{ route('settings.index').'?tab=restaurant' }}" wire:navigate
                    style="{{ $activeSetting == 'restaurant' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                    @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'restaurant'), 'active' => ($activeSetting == 'restaurant')])>
                    @lang('modules.settings.restaurantSettings')
                </a>
            </li>
            <li class="me-2">
                <a href="{{ route('settings.index').'?tab=app' }}" wire:navigate
                style="{{ $activeSetting == 'app' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'app'), 'active' => ($activeSetting == 'app')])>@lang('modules.settings.appSettings')</a>
            </li>
            <li class="me-2">
                <a href="{{ route('settings.index').'?tab=language' }}" wire:navigate
                style="{{ $activeSetting == 'language' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'language'), 'active' => ($activeSetting == 'language')])>@lang('modules.settings.languageSettings')</a>
            </li>
            <li class="me-2">
                <a href="{{ route('settings.index').'?tab=branch' }}" wire:navigate
                style="{{ $activeSetting == 'branch' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'branch'), 'active' => ($activeSetting == 'branch')])>@lang('modules.settings.branchSettings')</a>
            </li>
            <li class="me-2">
                <a href="{{ route('settings.index').'?tab=currency' }}" wire:navigate
                style="{{ $activeSetting == 'currency' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'currency'), 'active' => ($activeSetting == 'currency')])>@lang('modules.settings.currencySettings')</a>
            </li>
            <li class="me-2">
                <a href="{{ route('settings.index').'?tab=email' }}" wire:navigate
                style="{{ $activeSetting == 'email' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'email'), 'active' => ($activeSetting == 'email')])>@lang('modules.settings.emailSettings')</a>
            </li>
            <li class="me-2">
                <a href="{{ route('settings.index').'?tab=tax' }}" wire:navigate
                style="{{ $activeSetting == 'tax' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'tax'), 'active' => ($activeSetting == 'tax')])>@lang('modules.settings.taxSettings')</a>
            </li>
            <li class="me-2">
                <a href="{{ route('settings.index').'?tab=payment' }}" wire:navigate
                style="{{ $activeSetting == 'payment' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'payment'), 'active' => ($activeSetting == 'payment')])>@lang('modules.settings.paymentgatewaySettings')</a>
            </li>
            <li class="me-2">
                <a href="{{ route('settings.index').'?tab=theme' }}" wire:navigate
                style="{{ $activeSetting == 'theme' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'theme'), 'active' => ($activeSetting == 'theme')])>@lang('modules.settings.themeSettings')</a>
            </li>
            <li class="me-2">
                <a href="{{ route('settings.index').'?tab=role' }}" wire:navigate
                style="{{ $activeSetting == 'role' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'role'), 'active' => ($activeSetting == 'role')])>@lang('modules.settings.roleSettings')</a>
            </li>

            <li class="me-2">
                <a href="{{ route('settings.index').'?tab=billing' }}" wire:navigate
                style="{{ $activeSetting == 'billing' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'billing'), 'active' => ($activeSetting == 'billing')])>@lang('modules.settings.billing')</a>
            </li>

            @endif

            <li class="me-2">
                <a href="{{ route('settings.index').'?tab=reservation' }}" wire:navigate
                style="{{ $activeSetting == 'reservation' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'reservation'), 'active' => ($activeSetting == 'reservation')])>@lang('modules.settings.reservationSettings')</a>
            </li>

            <li class="me-2">
                <a href="{{ route('settings.index').'?tab=aboutus' }}" wire:navigate
                style="{{ $activeSetting == 'aboutus' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'aboutus'), 'active' => ($activeSetting == 'aboutus')])>@lang('modules.settings.aboutUsSettings')</a>
            </li>

            <li class="me-2">
                <a href="{{ route('settings.index').'?tab=customerSite' }}" wire:navigate
                style="{{ $activeSetting == 'customerSite' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'customerSite'), 'active' => ($activeSetting == 'customerSite')])>@lang('modules.settings.customerSiteSettings')</a>
            </li>

              <li class="me-2">
                <a href="{{ route('settings.index').'?tab=receipt' }}" wire:navigate
                style="{{ $activeSetting == 'receipt' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'receipt'), 'active' => ($activeSetting == 'receipt')])>@lang('modules.settings.receiptSetting')</a>
            </li>

             <li class="me-2">
                <a href="{{ route('settings.index').'?tab=printer' }}" wire:navigate
                style="{{ $activeSetting == 'printer' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'printer'), 'active' => ($activeSetting == 'printer')])>@lang('modules.settings.printerSetting')</a>
            </li>

            <li class="me-2">
                <a href="{{ route('settings.index').'?tab=deliverySettings' }}" wire:navigate
                style="{{ $activeSetting == 'deliverySettings' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'deliverySettings'), 'active' => ($activeSetting == 'deliverySettings')])>@lang('modules.settings.deliverySettings')</a>
            </li>

            <li class="me-2">
                <a href="{{ route('settings.index').'?tab=kotSettings' }}" wire:navigate
                style="{{ $activeSetting == 'kotSettings' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'kotSettings'), 'active' => ($activeSetting == 'kotSettings')])>@lang('modules.settings.kotSettings')</a>
            </li>
            <li class="me-2">
                <a href="{{ route('settings.index').'?tab=cancelSettings' }}" wire:navigate
                style="{{ $activeSetting == 'cancelSettings' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'cancelSettings'), 'active' => ($activeSetting == 'cancelSettings')])>@lang('modules.settings.cancelSettings')</a>
            </li>

            <li class="me-2">
                <a href="{{ route('settings.index').'?tab=orderSettings' }}" wire:navigate
                style="{{ $activeSetting == 'orderSettings' ? 'color: var(--brand-primary); border-bottom-color: var(--brand-primary);' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'orderSettings'), 'active' => ($activeSetting == 'orderSettings')])>@lang('modules.settings.orderSetting')</a>
            </li>

            <!-- NAV ITEM - CUSTOM MODULES  -->
            @foreach (custom_module_plugins() as $item)
                @includeIf(strtolower($item) . '::sections.settings.restaurant.sidebar')
            @endforeach
        </ul>
    </div>

    <div class="grid grid-cols-1 pt-6 dark:bg-gray-900">

        <div>
            @switch($activeSetting)
                @case('restaurant')
                @livewire('settings.generalSettings', ['settings' => $settings])
                @break

                @case('app')
                @livewire('settings.timezoneSettings', ['settings' => $settings])
                @break

                @case('language')
                @livewire('settings.languageSettings')
                @break

                @case('email')
                @livewire('settings.notificationSettings', ['settings' => $settings])
                @break

                @case('currency')
                @livewire('settings.currencySettings')
                @break

                @case('payment')
                @livewire('settings.paymentSettings', ['settings' => $settings])
                @break

                @case('theme')
                @livewire('settings.themeSettings', ['settings' => $settings])
                @break

                @case('role')
                @livewire('settings.roleSettings', ['settings' => $settings])
                @break

                @case('tax')
                @livewire('settings.taxSettings', ['settings' => $settings])
                @break

                @case('reservation')
                @livewire('settings.reservationSettings')
                @break

                @case('branch')
                @livewire('settings.branchSettings')
                @break
                @case('billing')
                @livewire('settings.billingSettings')
                @break

                @case('aboutus')
                @livewire('settings.aboutUsSettings', ['settings' => $settings])
                @break

                @case('customerSite')
                @livewire('settings.customerSiteSettings', ['settings' => $settings])
                @break

                @case('receipt')
                @livewire('settings.ReceiptSetting', ['settings' => $settings])
                @break

                @case('printer')
                @livewire('settings.PrinterSetting', ['settings' => $settings])
                @break

                @case('deliverySettings')
                @livewire('settings.branchDeliverySettings', ['settings' => $settings])
                @break

                @case('kotSettings')
                @livewire('settings.kotSettings', ['settings' => $settings])
                @break

                @case('cancelSettings')
                @livewire('settings.CancellationSettings', ['settings' => $settings])
                @break

                @case('orderSettings')
                @livewire('settings.OrderSettings', ['settings' => $settings])
                @break

                @default

            @endswitch

             <!-- NAV ITEM - CUSTOM MODULES  -->
             @foreach (custom_module_plugins() as $item)
                @if($activeSetting == strtolower($item).'Settings')
                    @livewire(strtolower($item).'::restaurant.setting', ['settings' => $settings])
                @endif
           @endforeach
        </div>

    </div>

</div>
