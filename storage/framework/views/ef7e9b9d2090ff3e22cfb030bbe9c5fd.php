<div>
    <div
        class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px settings-tab-bar">

            <li class="me-2">
                <a href="#" wire:click.prevent="$set('activeReport', 'outstandingPaymentReport')"
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300',
                        'border-transparent' => $activeReport != 'outstandingPaymentReport',
                        'active' =>
                            $activeReport == 'outstandingPaymentReport',
                    ]); ?>">
                    <?php echo app('translator')->get('modules.expenses.reports.outstandingPaymentReport'); ?>
                </a>
            </li>

            <li class="me-2">
                <a href="#" wire:click.prevent="$set('activeReport', 'expenseSummaryReport')"
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300',
                        'border-transparent' => $activeReport != 'expenseSummaryReport',
                        'active' =>
                            $activeReport == 'expenseSummaryReport',
                    ]); ?>">
                    <?php echo app('translator')->get('modules.expenses.reports.expenseSummaryReport'); ?>
                </a>
            </li>

        </ul>
    </div>

    <div class="grid grid-cols-1 pt-6 dark:bg-gray-900">
        <div>
            <!--[if BLOCK]><![endif]--><?php switch($activeReport):
                case ('outstandingPaymentReport'): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('reports.outstanding-payment-report', ['reports' => $reports]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3447312883-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('expenseSummaryReport'): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('reports.expense-summary-report', ['reports' => $reports]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3447312883-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php default: ?>
                    <p class="text-center text-gray-500 dark:text-gray-400"><?php echo app('translator')->get('modules.reports.selectReport'); ?></p>
            <?php endswitch; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views/livewire/reports/expense-reports.blade.php ENDPATH**/ ?>