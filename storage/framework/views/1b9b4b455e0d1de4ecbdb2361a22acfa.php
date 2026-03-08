<div>

    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    <?php echo app('translator')->get('app.id'); ?>
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    <?php echo app('translator')->get('modules.package.packageName'); ?>
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    <?php echo app('translator')->get('modules.package.monthlyPrice'); ?>
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    <?php echo app('translator')->get('modules.package.annualPrice'); ?>
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    <?php echo app('translator')->get('modules.package.lifetimePrice'); ?>
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    <?php echo app('translator')->get('modules.package.moduleInPackage'); ?>
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-right">
                                    <?php echo app('translator')->get('app.action'); ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700" wire:key='member-list-<?php echo e(microtime()); ?>'>

                            <?php $__empty_1 = true; $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" wire:key='member-<?php echo e($item->id . rand(1111, 9999) . microtime()); ?>' wire:loading.class.delay='opacity-10'>
                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo e($loop->iteration); ?>

                                </td>

                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex flex-col items-start gap-y-1">
                                        <span class="inline-flex items-center">
                                            <?php echo e($item->package_name); ?>

                                            <?php if(in_array($item->package_type->value, ['trial', 'default'])): ?>
                                            <svg data-popover-target="popover-<?php echo e($item->package_type->value); ?>-pack" data-popover-placement="bottom-end" class="w-4 h-4 text-gray-400 ms-1 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                                            <div data-popover id="popover-<?php echo e($item->package_type->value); ?>-pack" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 text-wrap w-52 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                                <div class="p-3 space-y-2 break-words">
                                                    <?php if($item->package_type->value === 'trial'): ?>
                                                        <h3 class="font-semibold text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.package.trialPackage'); ?></h3>
                                                        <p><?php echo app('translator')->get('modules.package.trialPackageDetails'); ?></p>
                                                    <?php elseif($item->package_type->value === 'default'): ?>
                                                        <h3 class="font-semibold text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.package.defaultPackage'); ?></h3>
                                                        <p><?php echo app('translator')->get('modules.package.defaultPackageDetails'); ?></p>
                                                        <p><?php echo app('translator')->get('modules.package.defaultPackageDetails2'); ?></p>
                                                    <?php endif; ?>
                                                    <p><?php echo app('translator')->get('modules.package.thisPackageCannotBeDeleted'); ?></p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <?php endif; ?>
                                        </span>
                                        <div class="flex items-center gap-x-1">
                                            <?php if($item->is_recommended): ?>
                                            <span class="bg-blue-500 text-white inline-flex text-xs font-medium items-center px-1 rounded gap-x-0.5 dark:bg-blue-700 border border-blue-500">
                                                <svg class="w-3 h-3 text-current" width="24" height="24" fill="currentColor" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg"><path d="m7.5 0-2 5h-5l4 3.5-2 6 5-3.5 5 3.5-2-6 4-3.5h-5z"/></svg>
                                                <?php echo app('translator')->get('modules.package.recommended'); ?>
                                            </span>

                                            <?php endif; ?>

                                            <?php if($item->is_private): ?>
                                            <span class="bg-red-500 text-white inline-flex text-xs font-medium items-center px-1 rounded gap-x-0.5 dark:bg-red-700 border border-red-500">
                                                <svg class="w-4 h-4 text-current" width="16" height="16" fill="currentColor" viewBox="-64 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M96 416q-13 0-22-9-10-10-10-23V224q0-13 10-22 9-10 22-10v-32q0-62 48-84 24-11 47-11 40 0 69 27 28 26 28 69v31q14 0 23 9t9 23v160q0 14-9 23t-23 9zm145-256q0-20-14-33t-35-13q-20 0-33 14-14 13-14 32l-1 64h97z"/></svg>
                                                <?php echo app('translator')->get('modules.package.private'); ?>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="flex items-center gap-x-0.5">
                                            <?php if($item->package_type->value == 'trial'): ?>
                                            <span class="bg-amber-500 text-white inline-flex text-xs font-medium items-center px-1 rounded gap-x-0.5 dark:bg-amber-600 border border-amber-500">
                                                <svg class="w-2.5 h-2.5 me-0.5 text-current" aria-hidden="true" height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 0a10 10 0 1 0 10 10A10.01 10.01 0 0 0 10 0m3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1 1 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414"/></svg>
                                                <?php echo app('translator')->get('modules.package.trial'); ?>
                                            </span>
                                            <?php elseif($item->package_type->value == 'lifetime'): ?>
                                            <span class="bg-indigo-500 text-white inline-flex text-xs font-medium items-center px-1 rounded gap-x-0.5 dark:bg-indigo-600 border border-indigo-500">
                                                <svg class="w-3 h-3 text-current" width="24" height="24" fill="currentColor" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g stroke-width="0"/><g stroke-linecap="round" stroke-linejoin="round"/><path d="m31.89 14.55-4-8A1 1 0 0 0 27 6H5a1 1 0 0 0-.89.55l-4 8a.3.3 0 0 1 0 .09 2 2 0 0 0 0 .26S0 15 0 15v.05a1.3 1.3 0 0 0 .06.28s0 .05 0 .08a.8.8 0 0 0 .18.27l15 16a1 1 0 0 0 1.46 0l15-16a1 1 0 0 0 .19-1.13M16 8.89 19.2 14h-6.4Zm-5.08 4.34L7 8h7.2ZM17.8 8H25l-3.92 5.23Zm1.84 8L16 27.65 12.36 16Zm-5.89 11.14L3.31 16h7Zm8-11.14h7l-10.5 11.14Zm7.65-2H23l3.83-5.11ZM5.17 8.89 9 14H2.62ZM16 4a1 1 0 0 0 1-1V1a1 1 0 0 0-2 0v2a1 1 0 0 0 1 1m-5.71-.29a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-1-1a1 1 0 0 0-1.42 1.42ZM21 4a1 1 0 0 0 .71-.29l1-1a1 1 0 1 0-1.42-1.42l-1 1a1 1 0 0 0 0 1.42A1 1 0 0 0 21 4" data-name="6. Diamond"/></svg>
                                                <?php echo app('translator')->get('modules.package.lifetime'); ?>
                                            </span>
                                            <?php endif; ?>

                                            <?php if($item->package_type->value == 'trial'): ?>
                                            <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                'text-white inline-flex text-xs font-medium items-center px-1 rounded ms-1',
                                                'bg-green-500 dark:bg-green-700 border border-green-500' => $item->trial_status == true,
                                                'bg-red-500 dark:bg-red-700 border border-red-500' => $item->trial_status == false
                                            ]); ?>">
                                            <?php echo e($item->trial_status == true ? __('app.active') : __('app.inactive')); ?>

                                            </span>

                                            <?php endif; ?>
                                        </div>
                                        <?php if($item->package_type->value == 'trial' && $item->trial_days): ?>
                                        <span class="inline-flex items-center px-1 text-xs font-medium text-white bg-gray-500 border border-gray-500 rounded dark:bg-gray-700">
                                            <?php echo app('translator')->get('modules.package.trialPeriod'); ?>: <?php echo e($item->trial_days); ?> <?php echo app('translator')->get('modules.package.days'); ?>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php if($item->package_type->value != 'default' && $item->package_type->value != 'trial'): ?>
                                        <?php echo e(global_currency_format($item->monthly_price, $item->currency_id)); ?>

                                    <?php else: ?>
                                    --
                                    <?php endif; ?>
                                </td>
                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php if($item->package_type->value != 'default' && $item->package_type->value != 'trial'): ?>
                                        <?php echo e(global_currency_format($item->annual_price, $item->currency_id)); ?>

                                    <?php else: ?>
                                    --
                                    <?php endif; ?>
                                </td>
                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php if($item->package_type->value != 'default' && $item->package_type->value != 'trial'): ?>
                                        <?php echo e(global_currency_format($item->price, $item->currency_id)); ?>

                                    <?php else: ?>
                                    --
                                    <?php endif; ?>
                                </td>

                                <td class="py-4 px-4 text-sm text-gray-900 dark:text-white max-w-lg">
                                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                                        <div class="grid grid-cols-2 gap-x-4 gap-y-1">
                                            <?php $__currentLoopData = $allModules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="flex items-center space-x-2 text-xs">
                                                    <?php if($item->modules->contains('id', $module->id)): ?>
                                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                        </svg>
                                                        <span class="text-gray-700 dark:text-gray-300"><?php echo e(__('permissions.modules.'.$module->name)); ?></span>
                                                    <?php else: ?>
                                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                        </svg>
                                                        <span class="text-gray-500 dark:text-gray-400"><?php echo e(__('permissions.modules.'.$module->name)); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php $existFeatures = collect(json_decode($item->additional_features, true) ?? []); ?>

                                            <?php $__currentLoopData = $additionalFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $isActive = $existFeatures->contains($feature); ?>
                                                <div class="flex items-center space-x-2 text-xs">
                                                    <svg class="flex-shrink-0 w-3.5 h-3.5 <?php echo e($isActive ? 'text-green-500' : 'text-red-500'); ?>" fill="currentColor" viewBox="0 0 20 20">
                                                        <?php if($isActive): ?>
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                        <?php else: ?>
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                        <?php endif; ?>
                                                    </svg>
                                                    <span class="<?php echo e($isActive ? 'text-gray-700 dark:text-gray-300' : 'text-gray-500 dark:text-gray-400'); ?>"><?php echo e(__('permissions.modules.'.$feature)); ?></span>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </td>

                                <td class="py-2.5 px-4 space-x-2 whitespace-nowrap text-right rtl:space-x-reverse">
                                    <?php if (isset($component)) { $__componentOriginala6c1b2378c7a756a2b58951b1494d68f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala6c1b2378c7a756a2b58951b1494d68f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-link','data' => ['href' => ''.e(route('superadmin.packages.edit', $item->id)).'','wire:navigate' => true,'class' => 'text-blue-600 hover:underline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('superadmin.packages.edit', $item->id)).'','wire:navigate' => true,'class' => 'text-blue-600 hover:underline']); ?>
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                            </path>
                                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                        </svg>  <?php echo app('translator')->get('app.update'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala6c1b2378c7a756a2b58951b1494d68f)): ?>
<?php $attributes = $__attributesOriginala6c1b2378c7a756a2b58951b1494d68f; ?>
<?php unset($__attributesOriginala6c1b2378c7a756a2b58951b1494d68f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6c1b2378c7a756a2b58951b1494d68f)): ?>
<?php $component = $__componentOriginala6c1b2378c7a756a2b58951b1494d68f; ?>
<?php unset($__componentOriginala6c1b2378c7a756a2b58951b1494d68f); ?>
<?php endif; ?>

                                    <?php if($item->package_type->isDeletable()): ?>
                                    <?php if (isset($component)) { $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-button','data' => ['wire:click' => 'showDeletePackage('.e($item->id).')','wire:key' => 'package-del-'.e($item->id . microtime()).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('danger-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'showDeletePackage('.e($item->id).')','wire:key' => 'package-del-'.e($item->id . microtime()).'']); ?>
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
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
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="py-2.5 px-4 space-x-6 dark:text-gray-400" colspan="7">
                                    <?php echo app('translator')->get('messages.noPackageFound'); ?>
                                </td>
                            </tr>
                            <?php endif; ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div wire:key='package-table-paginate-<?php echo e(microtime()); ?>'
        class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center w-full mb-4 sm:mb-0">
            <?php echo e($packages->links()); ?>

        </div>
    </div>

    <?php if (isset($component)) { $__componentOriginal5b8b2d0f151a30be878e1a760ec3900c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.confirmation-modal','data' => ['wire:model' => 'confirmDeletePackageModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('confirmation-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'confirmDeletePackageModal']); ?>
         <?php $__env->slot('title', null, []); ?> 
            <?php echo app('translator')->get('modules.package.deletePackage'); ?>
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('content', null, []); ?> 
            <?php echo app('translator')->get('modules.package.deletePackageMessage'); ?>
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('footer', null, []); ?> 
            <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => '$set(\'confirmDeletePackageModal\', false)','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$set(\'confirmDeletePackageModal\', false)','wire:loading.attr' => 'disabled']); ?>
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

            <?php if($packageDelete): ?>
            <?php if (isset($component)) { $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-button','data' => ['class' => 'ml-3','wire:click' => 'deletePackage('.e($packageDelete->id).')','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('danger-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-3','wire:click' => 'deletePackage('.e($packageDelete->id).')','wire:loading.attr' => 'disabled']); ?>
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
            <?php endif; ?>
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
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\package\package-table.blade.php ENDPATH**/ ?>