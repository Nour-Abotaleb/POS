<div class="card">
    <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 rounded-lg shadow-lg p-8 border dark:border-gray-700 w-full">
        <div class="space-y-4">
            <p class="flex justify-between border-b pb-2 border-gray-300 dark:border-gray-600">
                <strong class="text-gray-600 dark:text-gray-400"><?php echo app('translator')->get('modules.expenses.expenseTitle'); ?></strong>
                <span><?php echo e($expense_title); ?></span>
            </p>
            <p class="flex justify-between border-b pb-2 border-gray-300 dark:border-gray-600">
                <strong class="text-gray-600 dark:text-gray-400"><?php echo app('translator')->get('modules.expenses.expenseCategory'); ?></strong>
                <span><?php echo e($expense_category); ?></span>
            </p>
            <p class="flex justify-between border-b pb-2 border-gray-300 dark:border-gray-600">
                <strong class="text-gray-600 dark:text-gray-400"><?php echo app('translator')->get('modules.expenses.expenseAmount'); ?></strong>
                <span>$<?php echo e(number_format($amount, 2)); ?></span>
            </p>
            <p class="flex justify-between border-b pb-2 border-gray-300 dark:border-gray-600">
                <strong class="text-gray-600 dark:text-gray-400"><?php echo app('translator')->get('modules.expenses.expenseTitle'); ?></strong>
                <span><?php echo e($expense_date); ?></span>
            </p>
            <p class="flex justify-between border-b pb-2 border-gray-300 dark:border-gray-600">
                <strong class="text-gray-600 dark:text-gray-400"><?php echo app('translator')->get('modules.expenses.paymentStatus'); ?>:</strong>
                <span
                    class="px-4 py-1 text-sm font-semibold rounded-full
                    <?php echo e($payment_status == 'paid' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'); ?>">
                    <?php echo e(ucfirst($payment_status)); ?>

                </span>
            </p>
            <p class="flex justify-between border-b pb-2 border-gray-300 dark:border-gray-600">
                <strong class="text-gray-600 dark:text-gray-400"><?php echo app('translator')->get('modules.expenses.paymentDate'); ?>:</strong>
                <span><?php echo e($payment_date ?? 'N/A'); ?></span>
            </p>
            <p class="flex justify-between border-b pb-2 border-gray-300 dark:border-gray-600">
                <strong class="text-gray-600 dark:text-gray-400"><?php echo app('translator')->get('modules.expenses.paymentDueDate'); ?>:</strong>
                <span><?php echo e($payment_due_date ?? 'N/A'); ?></span>
            </p>

            <?php if($payment_method): ?>
                <p class="flex justify-between border-b pb-2 border-gray-300 dark:border-gray-600">
                    <strong class="text-gray-600 dark:text-gray-400"><?php echo app('translator')->get('modules.expenses.paymentMethod'); ?>:</strong>
                    <span><?php echo app('translator')->get('modules.expenses.methods.' . $payment_method); ?></span>
                </p>
            <?php endif; ?>
            <p class="border-b pb-2 border-gray-300 dark:border-gray-600">
                <strong class="text-gray-600 dark:text-gray-400"><?php echo app('translator')->get('modules.expenses.description'); ?>:</strong> <br>
                <span class="block mt-1 text-gray-700 dark:text-gray-300"><?php echo e($description ?? 'No description provided'); ?></span>
            </p>

            <!-- Receipt Preview -->
            <?php if($existingReceiptUrl): ?>
                <div class="mt-4">
                    <strong class="text-gray-600 dark:text-gray-400"><?php echo app('translator')->get('modules.expenses.receiptPreview'); ?>:</strong>
                    <div class="mt-2">
                        <?php if(Str::endsWith($existingReceiptUrl, ['.jpg', '.jpeg', '.png', '.gif'])): ?>
                            <img src="<?php echo e($existingReceiptUrl); ?>" alt="Expense Receipt"
                                class="rounded-lg shadow-md w-32 h-auto border dark:border-gray-700">
                        <?php endif; ?>
                        <?php if(Str::endsWith($existingReceiptUrl, ['.pdf'])): ?>
                            <img src="<?php echo e(asset('/img/receipt icon.jpg')); ?>" alt="Expense Receipt"
                                class="rounded-lg shadow-md w-32 h-auto border dark:border-gray-700">
                        <?php endif; ?>
                    </div>
                </div>
            <?php else: ?>
                <p class="text-gray-500 dark:text-gray-400 mt-4"><?php echo app('translator')->get('modules.expenses.noReceiptAvailable'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\payments\expense-details.blade.php ENDPATH**/ ?>