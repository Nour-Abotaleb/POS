<div>

    <div class="flex flex-col px-4 my-4">
        <!-- General Settings Section -->
        <div class="mb-6">
            <h2 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">
                <?php echo app('translator')->get('modules.reservation.generalSettings'); ?>
            </h2>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.reservation-general-settings', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-267431564-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>

        <!-- Time Slots Settings Section -->
        <div class="mb-6">
            <h2 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">
                <?php echo app('translator')->get('modules.reservation.timeSlotsSettings'); ?>
            </h2>

            <!-- Card Section -->
            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-7 sm:gap-4">
                <?php $__currentLoopData = $reservationSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Card -->
                <a
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(['group flex flex-col border shadow-sm rounded-lg hover:shadow-md transition', 'bg-[#011646] dark:bg-[#011646] dark:border-skin-base' => ($weekDay == $item->day_of_week), 'bg-white dark:bg-gray-700 dark:border-gray-600' => ($weekDay != $item->day_of_week)]); ?>"
                wire:key='menu-<?php echo e($key . microtime()); ?>' wire:click="showItems('<?php echo e($item->day_of_week); ?>')"
                    href="javascript:;">
                    <div class="p-3">
                        <div class="flex items-center justify-center">
                            <h3 wire:loading.class.delay='opacity-50'
                                class="<?php echo \Illuminate\Support\Arr::toCssClasses(['font-semibold dark:group-hover:text-neutral-400 dark:text-neutral-200 text-sm', 'text-gray-800 group-hover:text-skin-base' => ($weekDay != $item->day_of_week), 'text-white group-hover:text-white' => ($weekDay == $item->day_of_week)]); ?>">
                                <?php echo e(__('app.' . $item->day_of_week)); ?>

                            </h3>
                        </div>
                    </div>
                </a>
                <!-- End Card -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <!-- End Card Section -->

            <?php if($menuItems): ?>
                <div class="w-full">
                    <div class="flex items-center gap-4 my-4">
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"><?php echo e(__('app.' . $weekDay)); ?></h1>
                    </div>
                </div>

                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.reservation-day-settings', ['weekDay' => $weekDay]);

$__html = app('livewire')->mount($__name, $__params, 'week-item-'.e(microtime()).'', $__slots ?? [], get_defined_vars());

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

</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\settings\reservation-settings.blade.php ENDPATH**/ ?>