<div class="px-4 pt-6 bg-white xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center settings-tab-bar" role="tablist">
            <li class="me-2">
                <a href="javascript:;" wire:click="setActiveTab('superadminPaymentSetting')"
                style="<?php echo e($activeTab == 'superadminPaymentSetting' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300", 'border-transparent' => ($activeTab != 'superadminPaymentSetting'), 'active' => ($activeTab == 'superadminPaymentSetting')]); ?>"><?php echo app('translator')->get('menu.superadminPaymentSetting'); ?></a>
            </li>
            <li class="me-2">
                <a href="javascript:;" wire:click="setActiveTab('adminPaymentSetting')"
                style="<?php echo e($activeTab == 'adminPaymentSetting' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300", 'border-transparent' => ($activeTab != 'adminPaymentSetting'), 'active' => ($activeTab == 'adminPaymentSetting')]); ?>"><?php echo app('translator')->get('menu.adminPaymentSetting'); ?></a>
            </li>
        </ul>
    </div>
    <!-- Tab content -->
    <div id="profile-tabs-content">
        <?php if($activeTab === 'superadminPaymentSetting'): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.superadmin-payment-settings', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3004662947-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php elseif($activeTab === 'adminPaymentSetting'): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.admin-payment-settings', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3004662947-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\settings\restaurant-payment-settings.blade.php ENDPATH**/ ?>