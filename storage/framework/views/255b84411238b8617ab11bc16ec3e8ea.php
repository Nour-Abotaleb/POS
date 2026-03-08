<div>
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium ltr:text-left rtl:text-right text-gray-500 uppercase dark:text-gray-400">
                                    <?php echo app('translator')->get('app.id'); ?>
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium ltr:text-left rtl:text-right text-gray-500 uppercase dark:text-gray-400">
                                    <?php echo app('translator')->get('modules.settings.restaurantName'); ?>
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium ltr:text-left rtl:text-right text-gray-500 uppercase dark:text-gray-400">
                                    <?php echo app('translator')->get('modules.order.amount'); ?>
                                </th>

                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium ltr:text-left rtl:text-right text-gray-500 uppercase dark:text-gray-400">
                                    <?php echo app('translator')->get('modules.order.transactionId'); ?>
                                </th>

                                <th scope="col"
                                    class="text-center py-2.5 px-4 text-xs font-medium  text-gray-500 uppercase dark:text-gray-400">
                                    <?php echo app('translator')->get('app.dateTime'); ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700" wire:key='customer-list-<?php echo e(microtime()); ?>'>

                            <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" wire:key='customer-<?php echo e($item->id . rand(1111, 9999) . microtime()); ?>' wire:loading.class.delay='opacity-10'>
                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo e($item->id); ?>

                                </td>
                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white inline-flex gap-2 items-center">
                                    <img src="<?php echo e($item->restaurant->logoUrl); ?>" class="h-8" alt="App Logo" />
                                    <?php echo e($item->restaurant->name); ?>

                                </td>
                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo e($item->package->currency->currency_symbol . $item->amount); ?>

                                </td>

                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo e($item->transaction_id); ?>

                                </td>

                                <td class="py-2.5 px-4 space-x-2 whitespace-nowrap text-center text-gray-900 dark:text-white">
                                    <?php echo $__env->make('common.date-time-display', ['date' => $item->created_at], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="py-2.5 px-4 space-x-6" colspan="6">
                                    <?php echo app('translator')->get('messages.noPaymentFound'); ?>
                                </td>
                            </tr>
                            <?php endif; ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div wire:key='payments-table-paginate-<?php echo e(microtime()); ?>'
        class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center mb-4 sm:mb-0 w-full">
            <?php echo e($payments->links()); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\restaurant-payment\restaurant-payment-table.blade.php ENDPATH**/ ?>