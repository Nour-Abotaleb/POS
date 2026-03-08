<div class="mx-4 p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">

    <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px settings-tab-bar">
            <li class="me-2">
                <span wire:click="showTab('planDetails')"
                    style="<?php echo e($activeSetting == 'planDetails' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 select-none cursor-pointer rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'planDetails'), 'active' => ($activeSetting == 'planDetails')]); ?>">
                    <?php echo app('translator')->get('modules.billing.planDetails'); ?>
                </span>
            </li>
            <li class="me-2">
                <span wire:click="showTab('purchaseHistory')"
                    style="<?php echo e($activeSetting == 'purchaseHistory' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 select-none cursor-pointer rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'purchaseHistory'), 'active' => ($activeSetting == 'purchaseHistory')]); ?>">
                    <?php echo app('translator')->get('modules.billing.purchaseHistory'); ?>
                </span>
            </li>
            <li class="me-2">
                <span wire:click="showTab('offlineRequest')"
                    style="<?php echo e($activeSetting == 'offlineRequest' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 select-none cursor-pointer rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'offlineRequest'), 'active' => ($activeSetting == 'offlineRequest')]); ?>">
                    <?php echo app('translator')->get('modules.billing.offlineRequest'); ?>
                </span>
            </li>
        </ul>
    </div>

    <div>
        <?php switch($activeSetting):
            case ('planDetails'): ?>
            <?php echo $__env->make('billing.billing-details.plan-details', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php break; ?>
            <?php case ('purchaseHistory'): ?>
            <?php echo $__env->make('billing.billing-details.purchase-history', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php break; ?>
            <?php case ('offlineRequest'): ?>
            <?php echo $__env->make('billing.billing-details.offline-requests', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php break; ?>

            <?php default: ?>

        <?php endswitch; ?>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\settings\billing-settings.blade.php ENDPATH**/ ?>