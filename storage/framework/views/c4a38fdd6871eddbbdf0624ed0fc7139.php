<div>
    <div class="my-4 grid gap-6 grid-cols-3">
        <!-- Card Section -->
        <div class="space-y-8 col-span-2">
            <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="flex flex-col gap-3 sm:gap-4 space-y-3" wire:key='area-<?php echo e($area->id); ?>'>
                    <h3 class="f-15 font-medium inline-flex gap-2 items-center dark:text-neutral-200"><?php echo e($area->area_name); ?>

                        <span class="px-2 py-1 text-sm rounded bg-slate-100 border-gray-300 border text-gray-800 "><?php echo e($area->tables->count()); ?> <?php echo app('translator')->get('modules.table.table'); ?></span>
                    </h3>
                    <!-- Card -->

                    <div class="grid sm:grid-cols-3 gap-3 sm:gap-4">
                        <?php $__currentLoopData = $area->tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $isAvailable = $this->isTableAvailable($item->id);
                            $conflictingInfo = $this->getConflictingReservationInfo($item->id);
                        ?>

                        <div class="relative">
                            <div
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'group flex items-center justify-center border shadow-sm rounded-lg transition dark:bg-gray-700 dark:border-gray-600', 'bg-red-50 border-red-200 hover:shadow-md cursor-pointer' => ($item->status == 'inactive'),
                                'bg-white hover:shadow-md cursor-pointer' => ($item->status == 'active' && $isAvailable),
                                'bg-gray-100 border-gray-300 cursor-not-allowed opacity-60' => ($item->status == 'active' && !$isAvailable),
                            ]); ?>"
                            <?php if($isAvailable && $item->status == 'active'): ?>
                                wire:click='setReservationTable(<?php echo e($item->id); ?>)'
                            <?php endif; ?>
                            wire:key='table-<?php echo e($item->id); ?>'
                            title="<?php echo e(!$isAvailable && $item->status == 'active' ? 'Table is already reserved for this time' : ''); ?>">
                                <div class="p-3">
                                    <div class="flex flex-col space-y-2 items-center justify-center">
                                        <?php if($item->status == 'inactive'): ?>
                                            <div class="inline-flex text-xs gap-1 text-red-600 font-semibold">
                                                <?php echo app('translator')->get('app.inactive'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['p-2 rounded-lg tracking-wide ',
                                        'bg-green-100 text-green-600' => ($item->available_status == 'available' && $isAvailable),
                                        'bg-red-100 text-red-600' => ($item->available_status == 'reserved' || !$isAvailable),
                                        'bg-blue-100 text-blue-600' => ($item->available_status == 'running')]); ?>">
                                            <h3 wire:loading.class.delay='opacity-50'
                                                class="<?php echo \Illuminate\Support\Arr::toCssClasses(['font-semibold']); ?>">
                                                <?php echo e($item->table_code); ?>

                                            </h3>
                                        </div>
                                        <p
                                        class="<?php echo \Illuminate\Support\Arr::toCssClasses(['text-xs font-medium dark:text-neutral-200 text-gray-500']); ?>">
                                            <?php echo e($item->seating_capacity); ?> <?php echo app('translator')->get('modules.table.seats'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <!-- End Card Section -->


        <div class="col-span-1 space-y-3 bg-gray-50 dark:bg-neutral-900/30 rounded-md p-3">
            <h4 class="text-xs font-semibold"><?php echo app('translator')->get('modules.reservation.reservedTables'); ?>: <?php echo e($reservation->reservation_date_time->translatedFormat('d F')); ?></h4>

            <?php if($reservation->table_id): ?>
            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-md p-3">
                <h5 class="text-xs font-semibold text-blue-800 dark:text-blue-200 mb-2"><?php echo app('translator')->get('modules.reservation.currentTable'); ?></h5>
                <div class="flex items-center gap-2">
                    <div class="p-2 rounded-md bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-200">
                        <span class="font-semibold text-sm"><?php echo e($reservation->table->table_code); ?></span>
                    </div>
                    <span class="text-xs text-blue-600 dark:text-blue-300"><?php echo e($reservation->table->seating_capacity); ?> <?php echo app('translator')->get('modules.table.seats'); ?></span>
                </div>
            </div>
            <?php endif; ?>

            <?php $__empty_1 = true; $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70 p-2">
                <div class="flex justify-between">
                    <div class="text-base font-semibold text-gray-800 dark:text-white">
                        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['p-2 rounded-md tracking-wide bg-skin-base/[0.2] text-skin-base']); ?>">
                            <h3 wire:loading.class.delay='opacity-50'
                                class="<?php echo \Illuminate\Support\Arr::toCssClasses(['font-semibold']); ?>">
                                <?php echo e($item->table->table_code); ?>

                            </h3>
                        </div>
                    </div>
                    <div class=" text-gray-700 dark:text-neutral-400 flex flex-col space-y-1">
                        <div class="inline-flex gap-2 items-center text-xs">
                            <?php echo e($item->party_size); ?> <?php echo app('translator')->get('modules.reservation.guests'); ?>
                        </div>

                        <div class="inline-flex gap-2 items-center text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                            </svg>
                            <?php echo e($item->reservation_date_time->translatedFormat('h:i A')); ?>

                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div>
                <?php echo app('translator')->get('messages.noTableReserved'); ?>
            </div>
            <?php endif; ?>
        </div>

    </div>

</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\reservations\assign-table.blade.php ENDPATH**/ ?>