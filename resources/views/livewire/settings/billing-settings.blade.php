<div class="mx-4 p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">

    <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px settings-tab-bar">
            <li class="me-2">
                <span wire:click="showTab('planDetails')"
                    style="{{ $activeSetting == 'planDetails' ? 'color: #011646; border-bottom-color: #011646;' : '' }}"
                    @class(["inline-block p-4 border-b-2 select-none cursor-pointer rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'planDetails'), 'active' => ($activeSetting == 'planDetails')])>
                    @lang('modules.billing.planDetails')
                </span>
            </li>
            <li class="me-2">
                <span wire:click="showTab('purchaseHistory')"
                    style="{{ $activeSetting == 'purchaseHistory' ? 'color: #011646; border-bottom-color: #011646;' : '' }}"
                    @class(["inline-block p-4 border-b-2 select-none cursor-pointer rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'purchaseHistory'), 'active' => ($activeSetting == 'purchaseHistory')])>
                    @lang('modules.billing.purchaseHistory')
                </span>
            </li>
            <li class="me-2">
                <span wire:click="showTab('offlineRequest')"
                    style="{{ $activeSetting == 'offlineRequest' ? 'color: #011646; border-bottom-color: #011646;' : '' }}"
                    @class(["inline-block p-4 border-b-2 select-none cursor-pointer rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'offlineRequest'), 'active' => ($activeSetting == 'offlineRequest')])>
                    @lang('modules.billing.offlineRequest')
                </span>
            </li>
        </ul>
    </div>

    <div>
        @switch($activeSetting)
            @case('planDetails')
            @include('billing.billing-details.plan-details')
            @break
            @case('purchaseHistory')
            @include('billing.billing-details.purchase-history')
            @break
            @case('offlineRequest')
            @include('billing.billing-details.offline-requests')
            @break

            @default

        @endswitch
    </div>

</div>
