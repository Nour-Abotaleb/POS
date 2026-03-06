<div class="px-4 pt-6 bg-white xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center settings-tab-bar" role="tablist">
            <li class="me-2">
                <a href="javascript:;" wire:click="setActiveTab('superadminPaymentSetting')"
                style="{{ $activeTab == 'superadminPaymentSetting' ? 'color: #011646; border-bottom-color: #011646;' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300", 'border-transparent' => ($activeTab != 'superadminPaymentSetting'), 'active' => ($activeTab == 'superadminPaymentSetting')])>@lang('menu.superadminPaymentSetting')</a>
            </li>
            <li class="me-2">
                <a href="javascript:;" wire:click="setActiveTab('adminPaymentSetting')"
                style="{{ $activeTab == 'adminPaymentSetting' ? 'color: #011646; border-bottom-color: #011646;' : '' }}"
                @class(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300", 'border-transparent' => ($activeTab != 'adminPaymentSetting'), 'active' => ($activeTab == 'adminPaymentSetting')])>@lang('menu.adminPaymentSetting')</a>
            </li>
        </ul>
    </div>
    <!-- Tab content -->
    <div id="profile-tabs-content">
        @if ($activeTab === 'superadminPaymentSetting')
            <livewire:settings.superadmin-payment-settings />
        @elseif ($activeTab === 'adminPaymentSetting')
            <livewire:settings.admin-payment-settings />
        @endif
    </div>
</div>
