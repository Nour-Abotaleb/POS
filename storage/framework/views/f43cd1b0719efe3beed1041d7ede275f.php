<div>
    <div class="p-4 bg-white block sm:flex items-center justify-between dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                <?php echo app('translator')->get('modules.restaurant.restaurantDetails'); ?></h1>

        </div>
    </div>
    <div class="px-4 pt-6 xl:gap-4 dark:bg-gray-900">

        <div class="grid lg:grid-cols-2 lg:gap-6 mb-4">
            <div
                class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="items-center flex  gap-x-4">
                    <img class="mb-4 rounded-lg w-20 sm:mb-0 " src="<?php echo e($restaurant->logoUrl); ?>"
                        alt="<?php echo e($restaurant->name); ?>">
                    <div>
                        <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white"><?php echo e($restaurant->name); ?>



                            <a href="<?php echo e(module_enabled('Subdomain') ? 'https://' . $restaurant->sub_domain : route('shop_restaurant', [$restaurant->hash])); ?>" target="_blank" class="inline-flex justify-center items-center gap-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
                                    <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
                                </svg>
                            </a>
                            <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['class' => 'lg:ms-3 inline-flex items-center gap-1 group relative ','wire:click' => 'impersonate('.e($restaurant->id).')','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'lg:ms-3 inline-flex items-center gap-1 group relative ','wire:click' => 'impersonate('.e($restaurant->id).')','wire:loading.attr' => 'disabled']); ?>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="m4.736 1.968-.892 3.269-.014.058C2.113 5.568 1 6.006 1 6.5 1 7.328 4.134 8 8 8s7-.672 7-1.5c0-.494-1.113-.932-2.83-1.205l-.014-.058-.892-3.27c-.146-.533-.698-.849-1.239-.734C9.411 1.363 8.62 1.5 8 1.5s-1.411-.136-2.025-.267c-.541-.115-1.093.2-1.239.735m.015 3.867a.25.25 0 0 1 .274-.224c.9.092 1.91.143 2.975.143a30 30 0 0 0 2.975-.143.25.25 0 0 1 .05.498c-.918.093-1.944.145-3.025.145s-2.107-.052-3.025-.145a.25.25 0 0 1-.224-.274M3.5 10h2a.5.5 0 0 1 .5.5v1a1.5 1.5 0 0 1-3 0v-1a.5.5 0 0 1 .5-.5m-1.5.5q.001-.264.085-.5H2a.5.5 0 0 1 0-1h3.5a1.5 1.5 0 0 1 1.488 1.312 3.5 3.5 0 0 1 2.024 0A1.5 1.5 0 0 1 10.5 9H14a.5.5 0 0 1 0 1h-.085q.084.236.085.5v1a2.5 2.5 0 0 1-5 0v-.14l-.21-.07a2.5 2.5 0 0 0-1.58 0l-.21.07v.14a2.5 2.5 0 0 1-5 0zm8.5-.5h2a.5.5 0 0 1 .5.5v1a1.5 1.5 0 0 1-3 0v-1a.5.5 0 0 1 .5-.5"/>
                                </svg>
                                <?php echo e(__('app.impersonate')); ?>

                                <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-96 rounded bg-gray-900 px-2 py-1 text-sm text-white opacity-0 group-hover:opacity-100 mb-8">
                                    <?php echo e(__('app.impersonateTooltip')); ?>

                                </span>
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
                        </h3>
                        <?php if(module_enabled('Subdomain')): ?>
                            <div class="mb-2">
                                <a href="https://<?php echo e($restaurant->sub_domain); ?>" target="_blank" class="underline flex items-center gap-1 underline-offset-1 font-normal dark:text-white">https://<?php echo e($restaurant->sub_domain); ?>

                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
                                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
                                    </svg>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            <?php echo nl2br(e($restaurant->address)); ?>

                        </div>

                    </div>

                </div>
                <div class="space-y-3 mt-10">
                    <dl class="flex flex-col sm:flex-row gap-1">
                        <dt class="min-w-40">
                            <span class="block text-sm text-gray-500 dark:text-neutral-500"><?php echo app('translator')->get('app.id'); ?></span>
                        </dt>
                        <dd>
                            <ul>
                                <li
                                    class="me-1 inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                                    <?php echo e($restaurant->id); ?>

                                </li>
                            </ul>
                        </dd>
                    </dl>
                    <dl class="flex flex-col sm:flex-row gap-1">
                        <dt class="min-w-40">
                            <span class="block text-sm text-gray-500 dark:text-neutral-500"><?php echo app('translator')->get('app.status'); ?></span>
                        </dt>
                        <dd>
                            <ul>
                                <li class="me-1 inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                                    <?php if($restaurant->is_active == true): ?>
                                        <span class="bg-green-100 uppercase text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300"><?php echo app('translator')->get('app.active'); ?></span>
                                    <?php else: ?>
                                        <span class="bg-red-100 uppercase text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"><?php echo app('translator')->get('app.inactive'); ?></span>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </dd>
                    </dl>
                    <dl class="flex flex-col sm:flex-row gap-1">
                        <dt class="min-w-40">
                            <span class="block text-sm text-gray-500 dark:text-neutral-500"><?php echo app('translator')->get('modules.restaurant.phone'); ?></span>
                        </dt>
                        <dd>
                            <ul>
                                <li
                                    class="me-1 inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                                    <?php echo e($restaurant->phone_code ? '+' . $restaurant->phone_code . ' ' . $restaurant->phone_number : $restaurant->phone_number); ?>

                                </li>
                            </ul>
                        </dd>
                    </dl>

                    <dl class="flex flex-col sm:flex-row gap-1">
                        <dt class="min-w-40">
                            <span class="block text-sm text-gray-500 dark:text-neutral-500"><?php echo app('translator')->get('modules.restaurant.email'); ?></span>
                        </dt>
                        <dd>
                            <ul>
                                <li
                                    class="me-1 inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                                    <?php echo e($restaurant->email); ?>

                                </li>
                            </ul>
                        </dd>
                    </dl>

                    <dl class="flex flex-col sm:flex-row gap-1">
                        <dt class="min-w-40">
                            <span class="block text-sm text-gray-500 dark:text-neutral-500"><?php echo app('translator')->get('modules.settings.restaurantTimezone'); ?></span>
                        </dt>
                        <dd>
                            <ul>
                                <li
                                    class="me-1 inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                                    <?php echo e($restaurant->timezone); ?>

                                </li>
                            </ul>
                        </dd>
                    </dl>

                    <dl class="flex flex-col sm:flex-row gap-1">
                        <dt class="min-w-40">
                            <span class="block text-sm text-gray-500 dark:text-neutral-500"><?php echo app('translator')->get('modules.settings.restaurantCountry'); ?></span>
                        </dt>
                        <dd>
                            <ul>
                                <li
                                    class="me-1 inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                                    <img class="h-3.5 w-3.5 rounded-full mr-2"
                                    src="<?php echo e($restaurant->country->flagUrl); ?>" alt="">
                                    <?php echo e($restaurant->country->countries_name); ?>

                                </li>
                            </ul>
                        </dd>
                    </dl>

                    <dl class="flex flex-col sm:flex-row gap-1">
                        <dt class="min-w-40">
                            <span class="block text-sm text-gray-500 dark:text-neutral-500"><?php echo app('translator')->get('modules.settings.restaurantCurrency'); ?></span>
                        </dt>
                        <dd>
                            <ul>
                                <li
                                    class="me-1 inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                                    <?php echo e($restaurant?->currency?->currency_name); ?> (<?php echo e($restaurant?->currency?->currency_code); ?>)
                                </li>
                            </ul>
                        </dd>
                    </dl>
                    <dl class="flex flex-col sm:flex-row gap-1">
                        <dt class="min-w-40">
                            <span class="block text-sm text-gray-500 dark:text-neutral-500"><?php echo app('translator')->get('app.dateTime'); ?></span>
                        </dt>
                        <dd>
                            <ul>
                                <li
                                    class="me-1 inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                                    <?php echo e($restaurant->created_at->timezone(global_setting()->timezone ?? 'Asia/Kolkata')->translatedFormat('D, d M Y, h:i A')); ?>

                                </li>
                            </ul>
                        </dd>
                    </dl>

                </div>
            </div>

            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3"><?php echo app('translator')->get('modules.restaurant.currentPackage'); ?></h3>
                        <p class="text-sm text-gray-700 dark:text-gray-300"><span class="font-semibold"><?php echo app('translator')->get('modules.package.packageName'); ?>:</span> <?php echo e($restaurant->package?->package_name ?? __('messages.noPackageFound')); ?></p>
                        <p class="text-sm text-gray-700 dark:text-gray-300 mt-1"><span class="font-semibold"><?php echo app('translator')->get('modules.package.packageType'); ?>:</span> <?php echo e(ucfirst($restaurant?->package_type)); ?>(<?php echo e(ucfirst($restaurant->package?->package_type->value)); ?>)</p>
                        <?php if($restaurant->package?->package_type->value == 'trial'): ?>
                        <p class="text-sm text-gray-700 dark:text-gray-300 mt-1">
                            <span class="font-semibold"><?php echo app('translator')->get('modules.package.trialExpireOn'); ?>:</span>  <?php echo e($restaurant?->trial_ends_at ? \Carbon\Carbon::parse($restaurant->trial_ends_at)->format('D, d M Y') : '--'); ?>

                        </p>
                        <?php elseif($restaurant->package?->package_type->value != 'lifetime'): ?>
                        <p class="text-sm text-gray-700 dark:text-gray-300 mt-1">
                            <span class="font-semibold"><?php echo app('translator')->get('modules.package.licenceExpiresOn'); ?>:</span> <?php echo e(optional($restaurant->license_expire_on)->format('D, d M Y') ?? '--'); ?>

                        </p>
                        <?php endif; ?>

                        <?php if($restaurant->package && isset($allModules) && isset($additionalFeatures)): ?>
                            <?php
                                $existFeatures = collect(json_decode($restaurant->package->additional_features ?? '[]', true) ?? []);
                            ?>

                            <div class="mt-4">
                                <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-2"><?php echo app('translator')->get('modules.package.moduleInPackage'); ?></h4>
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                                    <div class="grid grid-cols-2 gap-x-4 gap-y-1">
                                        <?php $__currentLoopData = $allModules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="flex items-center space-x-2 text-xs">
                                                <?php if($restaurant->package->modules->contains('id', $module->id)): ?>
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
                                                <span class="<?php echo e($isActive ? 'text-gray-700 dark:text-gray-300' : 'text-gray-500 dark:text-gray-400'); ?>"><?php echo e($feature); ?></span>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!--for future use -->
                    
                </div>
            </div>

        </div>

        <div class="grid lg:grid-cols-2 lg:gap-6 mb-4">
            <div
            class="p-4  bg-white border border-gray-200 rounded-lg shadow-sm  dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <!-- List -->
                <div class="flex flex-col mb-12">
                    <h3 class="px-4 mb-4 text-xl font-semibold dark:text-white"><?php echo app('translator')->get('modules.settings.branches'); ?></h3>
                    <div class="overflow-x-auto ">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden shadow">
                                <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                                    <thead class="bg-gray-100 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col"
                                                class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                #
                                            </th>
                                            <th scope="col"
                                                class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                <?php echo app('translator')->get('modules.settings.branchName'); ?>
                                            </th>

                                            <th scope="col"
                                                class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                <?php echo app('translator')->get('modules.settings.branchAddress'); ?>
                                            </th>

                                            <th scope="col"
                                                class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                <?php echo app('translator')->get('modules.order.totalOrder'); ?>
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700" wire:key='member-list-<?php echo e(microtime()); ?>'>

                                        <?php $__currentLoopData = $restaurant->branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" wire:key='member-<?php echo e($item->id . rand(1111, 9999) . microtime()); ?>' wire:loading.class.delay='opacity-10'>
                                            <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                                <?php echo e($loop->index+1); ?>

                                            </td>

                                            <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                                <?php echo e($item->name); ?>

                                            </td>

                                            <td class="py-2.5 px-4 text-sm text-gray-900 whitespace-nowrap dark:text-white">
                                                <?php echo e($item->address); ?>

                                            </td>

                                            <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                                <?php echo e($item->orders_count); ?>

                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End List -->
            </div>

            <div class="p-4  bg-white border border-gray-200 rounded-lg shadow-sm  dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <?php if($restaurantAdmin): ?>

                    <h5 class="px-4  text-xl font-semibold dark:text-white"><?php echo app('translator')->get('modules.restaurant.firstAdmin'); ?></h5>

                    <div class="flex flex-col items-center">
                        <img class="w-24 h-24 mb-3 rounded-full" src="<?php echo e($restaurantAdmin->profile_photo_url); ?>" alt="Bonnie image"/>
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"><?php echo e($restaurantAdmin->name); ?></h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400"><?php echo e($restaurantAdmin->email); ?></span>
                        <div class="flex mt-4 md:mt-6">
                            <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$set(\'showPasswordModal\', true)']); ?><?php echo app('translator')->get('modules.restaurant.changePassword'); ?> <?php echo $__env->renderComponent(); ?>
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

            <?php else: ?>

                    <h5 class="mb-6  text-lg font-medium text-gray-900 dark:text-white"><?php echo app('translator')->get('messages.noAdminFound'); ?></h5>

            <?php endif; ?>

            </div>
        </div>

        <?php
            $restaurantHasSms = false;
            if ($restaurant->package) {
                $packageModules = $restaurant->package->modules->pluck('name')->toArray();
                $additionalFeatures = json_decode($restaurant->package->additional_features ?? '[]', true);
                $allModules = array_unique(array_merge($packageModules, $additionalFeatures));
                $restaurantHasSms = in_array('Sms', $allModules);
            }
        ?>

        <?php if(module_enabled('Sms') && $restaurantHasSms): ?>
            <div class="mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold dark:text-white"><?php echo app('translator')->get('sms::modules.menu.smsSettings'); ?></h3>
                    <?php if($packageSmsCount != -1): ?>
                    <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$set(\'showSmsTopupModal\', true)','class' => 'inline-flex items-center gap-2']); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <?php echo app('translator')->get('sms::modules.sms.addSmsTopup'); ?>
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
                    <?php endif; ?>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- Widget 1: Package Limit with Status Badge -->
                    <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <div class="w-full">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="text-base font-normal text-gray-500 dark:text-gray-400"><?php echo app('translator')->get('sms::modules.package.packageLimit'); ?></h3>
                                <?php if($packageSmsCount == -1): ?>
                                    <span class="bg-green-100 uppercase text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                        <?php echo app('translator')->get('sms::modules.package.unlimited'); ?>
                                    </span>
                                <?php else: ?>
                                    <?php if($isSmsLimitReached): ?>
                                        <span class="bg-red-100 uppercase text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                            <?php echo app('translator')->get('sms::modules.package.exhausted'); ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="bg-blue-100 uppercase text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                            <?php echo app('translator')->get('sms::modules.package.active'); ?>
                                        </span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <?php if($packageSmsCount == -1): ?>
                                <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">∞</span>
                                <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
                                    <span class="flex items-center mr-1.5 text-sm text-gray-500 dark:text-gray-400">
                                        <?php echo app('translator')->get('sms::modules.package.unlimitedMessagesAllowed'); ?>
                                    </span>
                                </p>
                            <?php else: ?>
                                <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white"><?php echo e($packageSmsCount); ?></span>
                                <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
                                    <span class="flex items-center mr-1.5 text-sm text-gray-500 dark:text-gray-400">
                                        <?php echo app('translator')->get('sms::modules.package.totalSmsInPackage'); ?>
                                    </span>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Widget 2: Used SMS Count -->
                    <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <div class="w-full">
                            <h3 class="text-base font-normal text-gray-500 dark:text-gray-400"><?php echo app('translator')->get('sms::modules.package.usedSmsCount'); ?></h3>
                            <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white"><?php echo e($usedSmsCount); ?></span>
                            <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
                                <?php if($packageSmsCount != -1): ?>
                                    <?php
                                        $usagePercent = $packageSmsCount > 0 ? round(($usedSmsCount / $packageSmsCount) * 100, 1) : 0;
                                    ?>
                                    <span class="flex items-center mr-1.5 text-sm <?php echo e($usagePercent > 80 ? 'text-red-500 dark:text-red-400' : 'text-blue-500 dark:text-blue-400'); ?>">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <?php if($usagePercent > 80): ?>
                                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z"></path>
                                            <?php else: ?>
                                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
                                            <?php endif; ?>
                                        </svg>
                                        <?php echo e($usagePercent); ?>%
                                    </span>
                                    <?php echo app('translator')->get('sms::modules.package.ofPackageUsed'); ?>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>



    <div class="flex flex-col mb-12">
        <h3 class="px-4 mb-4 text-xl font-semibold dark:text-white"><?php echo app('translator')->get('menu.payments'); ?></h3>

        <?php if(isset($paymentStats) && $paymentStats['total_invoices'] > 0): ?>
            <div class="px-4 mb-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Total Payments -->
                    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400"><?php echo app('translator')->get('modules.billing.total'); ?></p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white"><?php echo e($paymentStats['total_invoices']); ?></p>
                                <p class="text-xs text-gray-400 dark:text-gray-500 mt-1"><?php echo app('translator')->get('modules.billing.receipt'); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Amount -->
                    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400"><?php echo app('translator')->get('modules.customer.totalAmountReceived'); ?></p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white">

                                    <?php echo e(global_currency_format($paymentStats['total_amount'], global_setting()->default_currency_id)); ?>

                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- First Payment -->
                    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400"><?php echo app('translator')->get('modules.billing.purchaseHistory'); ?></p>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                    <?php if($paymentStats['first_payment_date']): ?>
                                        <?php echo e($paymentStats['first_payment_date']->format('D, d M Y')); ?>

                                    <?php else: ?>
                                        --
                                    <?php endif; ?>
                                </p>
                                <p class="text-xs text-gray-400 dark:text-gray-500 mt-1"><?php echo app('translator')->get('app.first'); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Last Payment -->
                    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400"><?php echo app('translator')->get('modules.billing.paymentDate'); ?></p>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                    <?php if($paymentStats['last_payment_date']): ?>
                                        <?php echo e($paymentStats['last_payment_date']->format('D, d M Y')); ?>

                                    <?php else: ?>
                                        --
                                    <?php endif; ?>
                                </p>
                                <p class="text-xs text-gray-400 dark:text-gray-500 mt-1"><?php echo app('translator')->get('app.last'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('billing.invoice-table', ['restaurantId' => $restaurant->id,'search' => $search]);

$__html = app('livewire')->mount($__name, $__params, 'payment-table-'.e(microtime()).'', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    </div>


    <?php if(module_enabled('MultiPOS')): ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('multipos::restaurant.multi-p-o-s-usage-table', ['restaurantId' => $restaurant->id]);

$__html = app('livewire')->mount($__name, $__params, 'multipos-usage-'.e(microtime()).'', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?>

   <?php if (isset($component)) { $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dialog-modal','data' => ['wire:model.live' => 'showPasswordModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dialog-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'showPasswordModal']); ?>
             <?php $__env->slot('title', null, []); ?> 
                <?php echo app('translator')->get('modules.restaurant.changePassword'); ?>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('content', null, []); ?> 
                <form wire:submit="submitForm">
                    <?php echo csrf_field(); ?>

                    <div class="space-y-4">
                        <div>
                            <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'password','value' => ''.e(__('Password')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'password','value' => ''.e(__('Password')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'password','class' => 'block mt-1 w-full','type' => 'password','autocomplete' => 'new-password','wire:model' => 'password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'password','class' => 'block mt-1 w-full','type' => 'password','autocomplete' => 'new-password','wire:model' => 'password']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'password','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'password','class' => 'mt-2']); ?>
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
                        <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo app('translator')->get('app.save'); ?> <?php echo $__env->renderComponent(); ?>
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
                </form>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('footer', null, []); ?> 
                <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => '$toggle(\'showPasswordModal\')','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$toggle(\'showPasswordModal\')','wire:loading.attr' => 'disabled']); ?><?php echo app('translator')->get('app.cancel'); ?> <?php echo $__env->renderComponent(); ?>
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
<?php if (isset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $attributes = $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $component = $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>

    <!-- SMS Top-up Modal -->
    <?php if (isset($component)) { $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dialog-modal','data' => ['wire:model.live' => 'showSmsTopupModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dialog-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'showSmsTopupModal']); ?>
         <?php $__env->slot('title', null, []); ?> 
            <?php echo app('translator')->get('sms::modules.sms.addSmsTopup'); ?>
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('content', null, []); ?> 
            <div class="space-y-4">
                <div>
                    <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'smsTopupAmount','value' => ''.e(__('sms::modules.package.smsCount')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'smsTopupAmount','value' => ''.e(__('sms::modules.package.smsCount')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'smsTopupAmount','class' => 'block mt-1 w-full','type' => 'number','min' => '1','wire:model' => 'smsTopupAmount','placeholder' => ''.e(__('sms::modules.sms.enterSmsCount')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'smsTopupAmount','class' => 'block mt-1 w-full','type' => 'number','min' => '1','wire:model' => 'smsTopupAmount','placeholder' => ''.e(__('sms::modules.sms.enterSmsCount')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'smsTopupAmount','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'smsTopupAmount','class' => 'mt-2']); ?>
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

                <div class="p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        <div class="ml-3">
                            <p class="text-sm text-blue-800 dark:text-blue-300">
                                <?php echo app('translator')->get('sms::modules.sms.currentSmsBalance'); ?>: <span class="font-semibold"><?php echo e($packageSmsCount == -1 ? '∞ (Unlimited)' : $packageSmsCount); ?></span>
                            </p>
                            <p class="text-sm text-blue-800 dark:text-blue-300 mt-1">
                                <?php echo app('translator')->get('sms::modules.sms.usedSms'); ?>: <span class="font-semibold"><?php echo e($usedSmsCount); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('footer', null, []); ?> 
            <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => '$toggle(\'showSmsTopupModal\')','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$toggle(\'showSmsTopupModal\')','wire:loading.attr' => 'disabled']); ?>
                <?php echo app('translator')->get('app.cancel'); ?>
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

            <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-3','wire:click' => 'addSmsTopup','wire:loading.attr' => 'disabled']); ?>
                <?php echo app('translator')->get('sms::modules.sms.addTopup'); ?>
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
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $attributes = $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $component = $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>

</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\restaurant\restaurant-detail.blade.php ENDPATH**/ ?>