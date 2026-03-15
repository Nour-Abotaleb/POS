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
                                    <?php echo app('translator')->get('modules.staff.name'); ?>
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium ltr:text-left rtl:text-right text-gray-500 uppercase dark:text-gray-400">
                                    <?php echo app('translator')->get('modules.customer.email'); ?>
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium ltr:text-left rtl:text-right text-gray-500 uppercase dark:text-gray-400">
                                    <?php echo app('translator')->get('app.role'); ?>
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium text-right text-gray-500 uppercase dark:text-gray-400">
                                    <?php echo app('translator')->get('app.action'); ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700" wire:key='member-list-<?php echo e(microtime()); ?>'>

                            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" wire:key='member-<?php echo e($item->id . rand(1111, 9999) . microtime()); ?>' wire:loading.class.delay='opacity-10'>
                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo e($item->name); ?>

                                </td>
                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo e($item->email ?? '--'); ?>

                                </td>
                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                    <!--[if BLOCK]><![endif]--><?php if($item->id == auth()->id()): ?>
                                        <span class="text-xs"><?php echo app('translator')->get('messages.cannotEditOwnRole'); ?></span>
                                    <?php elseif(user_can('Update Staff Member')): ?>
                                        <button wire:key='member-role-<?php echo e($item->id . microtime()); ?>' id="dropdownHoverButton<?php echo e($item->id); ?>" data-dropdown-toggle="dropdownHover<?php echo e($item->id); ?>" data-dropdown-trigger="click" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-lg font-semibold text-sm text-gray-700 dark:text-gray-300  shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150" type="button">
                                            <?php echo e($item->roles && isset($item->roles->pluck('display_name')[0]) ? $item->roles->pluck('display_name')[0] : ''); ?>

                                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                            </svg>
                                        </button>

                                        <!-- Dropdown menu -->
                                        <div wire:key='member-role-<?php echo e($item->id . microtime()); ?>' id="dropdownHover<?php echo e($item->id); ?>" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton<?php echo e($item->id); ?>">
                                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a href="javascript:;" wire:click="setUserRole('<?php echo e($role->name); ?>', <?php echo e($item->id); ?>)" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><?php echo e($role->translated_name); ?></a>
                                                </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                            </ul>
                                        </div>
                                    <?php else: ?>
                                    <?php echo e($item->roles->first()->translated_name ?? $item->roles->pluck('display_name')[0]); ?>

                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </td>

                                <td class="py-2.5 px-4 space-x-2 whitespace-nowrap text-right rtl:space-x-reverse">
                                    <!--[if BLOCK]><![endif]--><?php if(user_can('Update Staff Member')): ?>
                                    <?php if (isset($component)) { $__componentOriginal23a929514ef7d57034cc7b8bddc2b226 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a929514ef7d57034cc7b8bddc2b226 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button-table','data' => ['wire:click' => 'showEditCustomer('.e($item->id).')','wire:key' => 'editmenu-item-button-'.e($item->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'showEditCustomer('.e($item->id).')','wire:key' => 'editmenu-item-button-'.e($item->id).'']); ?>
                                        <svg class="w-4 h-4 me-1" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <?php echo app('translator')->get('app.update'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a929514ef7d57034cc7b8bddc2b226)): ?>
<?php $attributes = $__attributesOriginal23a929514ef7d57034cc7b8bddc2b226; ?>
<?php unset($__attributesOriginal23a929514ef7d57034cc7b8bddc2b226); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a929514ef7d57034cc7b8bddc2b226)): ?>
<?php $component = $__componentOriginal23a929514ef7d57034cc7b8bddc2b226; ?>
<?php unset($__componentOriginal23a929514ef7d57034cc7b8bddc2b226); ?>
<?php endif; ?>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                    <!--[if BLOCK]><![endif]--><?php if(user_can('Delete Staff Member') && $item->id != user()->id): ?>
                                    <?php if (isset($component)) { $__componentOriginal0c3cd59628568adb72d0e419d6abdcc6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0c3cd59628568adb72d0e419d6abdcc6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-button-table','data' => ['wire:click' => 'showDeleteCustomer('.e($item->id).')','wire:key' => 'member-del-'.e($item->id . microtime()).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('danger-button-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'showDeleteCustomer('.e($item->id).')','wire:key' => 'member-del-'.e($item->id . microtime()).'']); ?>
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0c3cd59628568adb72d0e419d6abdcc6)): ?>
<?php $attributes = $__attributesOriginal0c3cd59628568adb72d0e419d6abdcc6; ?>
<?php unset($__attributesOriginal0c3cd59628568adb72d0e419d6abdcc6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0c3cd59628568adb72d0e419d6abdcc6)): ?>
<?php $component = $__componentOriginal0c3cd59628568adb72d0e419d6abdcc6; ?>
<?php unset($__componentOriginal0c3cd59628568adb72d0e419d6abdcc6); ?>
<?php endif; ?>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="py-2.5 px-4 text-center dark:text-gray-200" colspan="5">
                                    <?php echo app('translator')->get('messages.noMemberFound'); ?>
                                </td>
                            </tr>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div wire:key='customer-table-paginate-<?php echo e(microtime()); ?>'
        class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center mb-4 sm:mb-0 w-full">
            <?php echo e($members->links()); ?>

        </div>
    </div>

    <?php if (isset($component)) { $__componentOriginal2b7129b9a6e7f6a1be2b5d072517af13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2b7129b9a6e7f6a1be2b5d072517af13 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.right-modal','data' => ['wire:model.live' => 'showEditCustomerModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('right-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'showEditCustomerModal']); ?>
         <?php $__env->slot('title', null, []); ?> 
            <?php echo e(__("modules.staff.editMember")); ?>

         <?php $__env->endSlot(); ?>

         <?php $__env->slot('content', null, []); ?> 
            <!--[if BLOCK]><![endif]--><?php if($customer): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('forms.edit-staff', ['member' => $customer]);

$__html = app('livewire')->mount($__name, $__params, str()->random(50), $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('footer', null, []); ?> 
            <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => '$set(\'showEditCustomerModal\', false)','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$set(\'showEditCustomerModal\', false)','wire:loading.attr' => 'disabled']); ?>
                <?php echo e(__('app.close')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $attributes = $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $component = $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2b7129b9a6e7f6a1be2b5d072517af13)): ?>
<?php $attributes = $__attributesOriginal2b7129b9a6e7f6a1be2b5d072517af13; ?>
<?php unset($__attributesOriginal2b7129b9a6e7f6a1be2b5d072517af13); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2b7129b9a6e7f6a1be2b5d072517af13)): ?>
<?php $component = $__componentOriginal2b7129b9a6e7f6a1be2b5d072517af13; ?>
<?php unset($__componentOriginal2b7129b9a6e7f6a1be2b5d072517af13); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal5b8b2d0f151a30be878e1a760ec3900c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.confirmation-modal','data' => ['wire:model' => 'confirmDeleteCustomerModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('confirmation-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'confirmDeleteCustomerModal']); ?>
         <?php $__env->slot('title', null, []); ?> 
            <?php echo app('translator')->get('modules.staff.deleteMember'); ?>?
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('content', null, []); ?> 
            <?php echo app('translator')->get('modules.staff.deleteMemberMessage'); ?>
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('footer', null, []); ?> 
            <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => '$toggle(\'confirmDeleteCustomerModal\')','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$toggle(\'confirmDeleteCustomerModal\')','wire:loading.attr' => 'disabled']); ?>
                <?php echo e(__('app.cancel')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $attributes = $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $component = $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>

            <!--[if BLOCK]><![endif]--><?php if($customer): ?>
            <?php if (isset($component)) { $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-button','data' => ['class' => 'ml-3','wire:click' => 'deleteCustomer('.e($customer->id).')','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('danger-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-3','wire:click' => 'deleteCustomer('.e($customer->id).')','wire:loading.attr' => 'disabled']); ?>
                <?php echo e(__('app.delete')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11)): ?>
<?php $attributes = $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11; ?>
<?php unset($__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11)): ?>
<?php $component = $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11; ?>
<?php unset($__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11); ?>
<?php endif; ?>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
          <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c)): ?>
<?php $attributes = $__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c; ?>
<?php unset($__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b8b2d0f151a30be878e1a760ec3900c)): ?>
<?php $component = $__componentOriginal5b8b2d0f151a30be878e1a760ec3900c; ?>
<?php unset($__componentOriginal5b8b2d0f151a30be878e1a760ec3900c); ?>
<?php endif; ?>

</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views/livewire/staff/staff-table.blade.php ENDPATH**/ ?>