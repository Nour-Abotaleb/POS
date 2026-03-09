<div>
    <form wire:submit="saveSettings">
        <div class="space-y-6">
            <!-- Enable/Disable Reservation Settings -->
            <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-800">
                <h3 class="mb-4 text-lg font-medium text-gray-900 dark:text-white">
                    <?php echo app('translator')->get('modules.reservation.reservationSettings'); ?>
                </h3>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <!-- Admin Reservation Toggle -->
                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg dark:border-gray-700">
                        <div>
                            <h4 class="text-sm font-medium text-gray-900 dark:text-white">
                                <?php echo app('translator')->get('modules.reservation.enableAdminReservation'); ?>
                            </h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <?php echo app('translator')->get('modules.reservation.enableAdminReservationDescription'); ?>
                            </p>
                        </div>
                        <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['wire:model' => 'enable_admin_reservation']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'enable_admin_reservation']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal74b62b190a03153f11871f645315f4de)): ?>
<?php $attributes = $__attributesOriginal74b62b190a03153f11871f645315f4de; ?>
<?php unset($__attributesOriginal74b62b190a03153f11871f645315f4de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal74b62b190a03153f11871f645315f4de)): ?>
<?php $component = $__componentOriginal74b62b190a03153f11871f645315f4de; ?>
<?php unset($__componentOriginal74b62b190a03153f11871f645315f4de); ?>
<?php endif; ?>
                    </div>

                    <!-- Customer Reservation Toggle -->
                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg dark:border-gray-700">
                        <div>
                            <h4 class="text-sm font-medium text-gray-900 dark:text-white">
                                <?php echo app('translator')->get('modules.reservation.enableCustomerReservation'); ?>
                            </h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <?php echo app('translator')->get('modules.reservation.enableCustomerReservationDescription'); ?>
                            </p>
                        </div>
                        <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['wire:model' => 'enable_customer_reservation']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'enable_customer_reservation']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal74b62b190a03153f11871f645315f4de)): ?>
<?php $attributes = $__attributesOriginal74b62b190a03153f11871f645315f4de; ?>
<?php unset($__attributesOriginal74b62b190a03153f11871f645315f4de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal74b62b190a03153f11871f645315f4de)): ?>
<?php $component = $__componentOriginal74b62b190a03153f11871f645315f4de; ?>
<?php unset($__componentOriginal74b62b190a03153f11871f645315f4de); ?>
<?php endif; ?>
                    </div>

                    <!-- Minimum Party Size -->
                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg dark:border-gray-700">
                        <div class="flex-1">
                            <label for="minimum_party_size" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                <?php echo app('translator')->get('modules.reservation.minimumPartySize'); ?>
                            </label>
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                <?php echo app('translator')->get('modules.reservation.minimumPartySizeDescription'); ?>
                            </p>
                        </div>
                        <div class="ms-4">
                            <input
                                type="number"
                                id="minimum_party_size"
                                wire:model="minimum_party_size"
                                min="1"
                                max="50"
                                class="block w-20 px-3 py-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-skin-base focus:border-skin-base dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                placeholder="1"
                            />
                            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'minimum_party_size','class' => 'mt-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'minimum_party_size','class' => 'mt-1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                        </div>
                    </div>

                    <!-- Last Minute Booking Settings -->
                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg dark:border-gray-700">
                        <div class="flex-1">
                            <label for="disableSlotMinutes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                <?php echo app('translator')->get('modules.reservation.disableSlotMinutes'); ?>
                            </label>
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                <?php echo app('translator')->get('modules.reservation.disableSlotMinutesInfo'); ?>
                            </p>
                        </div>
                        <div class="ms-4">
                            <div class="relative w-32">
                                <input
                                    type="number"
                                    id="disableSlotMinutes"
                                    wire:model.live="disableSlotMinutes"
                                    min="0"
                                    max="1440"
                                    step="5"
                                    class="block w-full px-3 py-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-skin-base focus:border-skin-base dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                />
                                <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3 pointer-events-none text-sm text-gray-500 dark:text-gray-400">
                                    <?php echo app('translator')->get('app.minutes'); ?>
                                </div>
                            </div>
                            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'disableSlotMinutes','class' => 'mt-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'disableSlotMinutes','class' => 'mt-1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
                        </div>

            <!-- Save Button -->
            <div class="flex justify-end">
                <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit']); ?>
                    <?php echo app('translator')->get('app.save'); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale67687e3e4e61f963b25a6bcf3983629)): ?>
<?php $attributes = $__attributesOriginale67687e3e4e61f963b25a6bcf3983629; ?>
<?php unset($__attributesOriginale67687e3e4e61f963b25a6bcf3983629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale67687e3e4e61f963b25a6bcf3983629)): ?>
<?php $component = $__componentOriginale67687e3e4e61f963b25a6bcf3983629; ?>
<?php unset($__componentOriginale67687e3e4e61f963b25a6bcf3983629); ?>
<?php endif; ?>
            </div>
        </div>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\settings\reservation-general-settings.blade.php ENDPATH**/ ?>