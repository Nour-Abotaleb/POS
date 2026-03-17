<div>
    <div
    class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
            <h3 class="text-base font-normal text-gray-500 dark:text-gray-400 mb-4"><?php echo app('translator')->get('modules.dashboard.topTables'); ?> (<?php echo app('translator')->get('app.today'); ?>)
            </h3>
            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li class="py-1 sm:py-2">
                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                            <div class="flex-1 min-w-0">
                                <div class="w-full max-w-smspace-y-2">
                                    <div >
                                        <div class="flex items-center gap-3">

                                            <span class="text-gray-400 text-sm">#<?php echo e($loop->index+1); ?></span>

                                            <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['p-2 rounded-md tracking-wide bg-[var(--brand-primary)]/[0.2] text-skin-base']); ?>">
                                                <h3 wire:loading.class.delay='opacity-50'
                                                    class="<?php echo \Illuminate\Support\Arr::toCssClasses(['font-semibold']); ?>">
                                                    <?php echo e($item?->table?->table_code); ?>

                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="inline-flex items-center text-base font-medium text-gray-900 dark:text-white">
                                <?php echo currency_format($item->total_price, restaurant()->currency_id); ?>

                            </div>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <li class="py-2">
                    <div class="flex items-center space-x-4 rtl:space-x-reverse">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            <?php echo app('translator')->get('messages.noPaymentFound'); ?>
                        </p>
                    </div>
                    </div>
                </li>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


            </ul>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views/livewire/dashboard/today-table-earnings.blade.php ENDPATH**/ ?>