<div
    class="lg:w-6/12 flex flex-col h-screen max-h-[90vh] min-h-0 bg-white dark:border-gray-700 pr-4 px-2 py-4 dark:bg-gray-800 lg:sticky overflow-hidden rounded-md">
    <div class="flex items-center justify-between w-full mb-2">

        
        <!--[if BLOCK]><![endif]--><?php if($this->orderTypes->count()): ?>
        <div class="flex items-center gap-2 flex-wrap">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->orderTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button
                    type="button"
                    wire:click="$set('orderTypeId', <?php echo e($type->id); ?>)"
                    style="<?php echo e($orderTypeId === $type->id ? 'background-color: #011646; border-color: #011646;' : ''); ?>"
                    class="px-3 py-1.5 text-xs rounded-lg border transition-all
                    <?php echo e($orderTypeId === $type->id
                        ? 'text-white'
                        : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 border-gray-200 dark:border-gray-600 hover:bg-gray-200 dark:hover:bg-gray-600'); ?>">
                    <?php echo e($type->order_type_name); ?>

                </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

            <!--[if BLOCK]><![endif]--><?php if($orderTypeSlug === 'delivery' && $selectedDeliveryApp): ?>
                <span class="text-xs text-gray-500 dark:text-gray-400 mx-2">•</span>
                <span class="text-xs text-gray-500 dark:text-gray-400">Platform:</span>

                <span class="text-sm font-medium text-gray-900 dark:text-white">
                    <!--[if BLOCK]><![endif]--><?php if($selectedDeliveryApp === 'default'): ?>
                        Default
                    <?php else: ?>
                        <?php echo e(\App\Models\DeliveryPlatform::find($selectedDeliveryApp)?->name ?? 'Unknown'); ?>

                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </span>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        
        <div class="flex items-center gap-4">

            
            <div class="inline-flex items-center gap-1 text-sm !text-[#298000] 
            !bg-[#E6FFF0] rounded-lg px-2 py-2" style="background:#E6FFF0;color:#298000">

                <!--[if BLOCK]><![endif]--><?php if(!isOrderPrefixEnabled()): ?>
                    <?php echo app('translator')->get('modules.order.orderNumber'); ?> #<?php echo e($orderNumber); ?>

                <?php else: ?>
                    <?php echo e($formattedOrderNumber); ?>

                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>


            
            <!--[if BLOCK]><![endif]--><?php if($orderType == 'dine_in' && !is_null($tableNo)): ?>
            <div class="inline-flex items-center gap-2 dark:text-gray-300">
                <svg fill="currentColor" class="w-5 h-5 dark:text-gray-200"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44.999 44.999">
                    <path d="m42.558 23.378 2.406-10.92a1.512 1.512 0 0 0-2.954-.652l-2.145 9.733h-9.647a1.512 1.512 0 0 0 0 3.026h.573l-3.258 7.713a1.51 1.51 0 0 0 1.393 2.102c.59 0 1.15-.348 1.394-.925l2.974-7.038 4.717.001 2.971 7.037a1.512 1.512 0 1 0 2.787-1.177l-3.257-7.713h.573a1.51 1.51 0 0 0 1.473-1.187"/>
                </svg>
                <?php echo e($tableNo); ?>

            </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        </div>

    </div>
        <div class="flex-1 min-h-0 overflow-y-auto overflow-x-hidden space-y-2 pr-1">
            <div class="mt-2">

            <div class="flex w-full items-center gap-2 justify-end">

                <!--[if BLOCK]><![endif]--><?php if($orderType == 'dine_in'): ?>
                    <div class="flex flex-wrap items-center gap-2 justify-end">
                        
                        <div class="inline-flex items-center gap-2">
                            <!-- <svg width="16" height="16" fill="currentColor" viewBox="0 -2.89 122.88 122.88" class="shrink-0 text-gray-600 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg">
                                <path d="M36.82,107.86L35.65,78.4l13.25-0.53c5.66,0.78,11.39,3.61,17.15,6.92l10.29-0.41c4.67,0.1,7.3,4.72,2.89,8 c-3.5,2.79-8.27,2.83-13.17,2.58c-3.37-0.03-3.34,4.5,0.17,4.37c1.22,0.05,2.54-0.29,3.69-0.34c6.09-0.25,11.06-1.61,13.94-6.55 l1.4-3.66l15.01-8.2c7.56-2.83,12.65,4.3,7.23,10.1c-10.77,8.51-21.2,16.27-32.62,22.09c-8.24,5.47-16.7,5.64-25.34,1.01 L36.82,107.86z M29.74,62.97h91.9c0.68,0,1.24,0.57,1.24,1.24v5.41c0,0.67-0.56,1.24-1.24,1.24h-91.9 c-0.68,0-1.24-0.56-1.24-1.24v-5.41C28.5,63.53,29.06,62.97,29.74,62.97z M79.26,11.23 c25.16,2.01,46.35,23.16,43.22,48.06l-93.57,0C25.82,34.23,47.09,13.05,72.43,11.2V7.14l-4,0c-0.7,0-1.28-0.58-1.28-1.28V1.28 c0-0.7,0.57-1.28,1.28-1.28h14.72c0.7,0,1.28,0.58,1.28,1.28v4.58c0,0.7-0.58,1.28-1.28,1.28h-3.89L79.26,11.23z M0,77.39l31.55-1.66l1.4,35.25L1.4,112.63L0,77.39z"/>
                            </svg> -->
                            <!--[if BLOCK]><![endif]--><?php if(auth()->user()->roles->pluck('display_name')->contains('Waiter')): ?>
                                <span class="text-xs w-36 px-2 py-1 rounded-md bg-gray-100 dark:text-gray-200 dark:bg-gray-600 truncate" style="border-color: #011646;" title="<?php echo e($users->where('id', $selectWaiter)->first()->name ?? __('modules.order.selectWaiter')); ?>">
                                    <?php echo e($users->where('id', $selectWaiter)->first()->name ?? __('modules.order.selectWaiter')); ?>

                                </span>
                            <?php else: ?>
                                <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['class' => 'text-xs w-36 border-[#011646] focus:border-[#011646] focus:ring-[#011646]','wire:model.defer' => 'selectWaiter']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs w-36 border-[#011646] focus:border-[#011646] focus:ring-[#011646]','wire:model.defer' => 'selectWaiter']); ?>
                                    <option value=""><?php echo app('translator')->get('modules.order.selectWaiter'); ?></option>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $attributes = $__attributesOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__attributesOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $component = $__componentOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__componentOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>

                        
                        <div class="inline-flex items-center text-xs dark:text-gray-300">
                            <div class="inline-flex items-center gap-1.5 p-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-900 focus-within:ring-1 focus-within:ring-gray-500 dark:focus-within:ring-gray-400 focus-within:border-gray-500 dark:focus-within:border-gray-400 [&_input]:h-5 [&_input]:min-h-0">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg" class="shrink-0" style="color: #011646;">
                                    <path d="M6.48831 7.69958C6.41748 7.6925 6.33248 7.6925 6.25456 7.69958C4.56873 7.64291 3.22998 6.26166 3.22998 4.56166C3.22998 2.82625 4.63248 1.41666 6.37498 1.41666C8.1104 1.41666 9.51998 2.82625 9.51998 4.56166C9.5129 6.26166 8.17415 7.64291 6.48831 7.69958Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11.6237 2.83334C12.9979 2.83334 14.1029 3.94542 14.1029 5.3125C14.1029 6.65125 13.0404 7.74209 11.7158 7.79167C11.6591 7.78459 11.5954 7.78459 11.5316 7.79167" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2.94664 10.3133C1.23247 11.4608 1.23247 13.3308 2.94664 14.4713C4.89455 15.7746 8.08914 15.7746 10.0371 14.4713C11.7512 13.3238 11.7512 11.4538 10.0371 10.3133C8.09622 9.01709 4.90164 9.01709 2.94664 10.3133Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.9908 14.1667C13.5008 14.0604 13.9825 13.855 14.3792 13.5504C15.4842 12.7217 15.4842 11.3546 14.3792 10.5258C13.9896 10.2283 13.515 10.03 13.0121 9.91666" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['type' => 'number','step' => '1','min' => '1','class' => 'w-12 text-xs border-0 p-0 bg-transparent focus:ring-0 focus:border-0 dark:bg-transparent','wire:model.defer' => 'noOfPax']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','step' => '1','min' => '1','class' => 'w-12 text-xs border-0 p-0 bg-transparent focus:ring-0 focus:border-0 dark:bg-transparent','wire:model.defer' => 'noOfPax']); ?>
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
                            </div>
                        </div>

                        
                        <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['class' => 'relative text-xs p-2','wire:click' => '$toggle(\'showKotNote\')','title' => __('modules.order.addNote'),'dataTooltipTarget' => 'tooltip-note']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'relative text-xs p-2','wire:click' => '$toggle(\'showKotNote\')','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.order.addNote')),'data-tooltip-target' => 'tooltip-note']); ?>
                            <!--[if BLOCK]><![endif]--><?php if($this->orderNote): ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="currentColor" class="absolute top-1 right-1" style="color: #011646;" viewBox="0 0 16 16">
                                    <circle cx="8" cy="8" r="8" />
                                </svg>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg" style="color: #011646;">
                                <path d="M9.39254 2.55L3.57712 8.70542C3.35754 8.93917 3.14504 9.39958 3.10254 9.71833L2.84045 12.0133C2.74837 12.8421 3.34337 13.4087 4.16504 13.2671L6.44587 12.8775C6.76462 12.8208 7.21087 12.5871 7.43045 12.3462L13.2459 6.19083C14.2517 5.12833 14.705 3.91708 13.1396 2.43667C11.5813 0.970415 10.3984 1.4875 9.39254 2.55Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.42212 3.57709C8.7267 5.53209 10.3134 7.02667 12.2825 7.225" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.125 15.5833H14.875" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
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
                        <div id="tooltip-note" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            <?php echo app('translator')->get('modules.order.addNote'); ?>
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>

                        
                        <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => 'openMergeTableModal','class' => 'p-2','title' => __('modules.order.mergeTables')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'openMergeTableModal','class' => 'p-2','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.order.mergeTables'))]); ?>
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg" style="color: #011646;">
                                <path d="M12.24 7.40209L14.875 4.76707L12.24 2.13209" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.125 4.76707H14.875" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4.75998 9.59791L2.125 12.2329L4.75998 14.8679" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.875 12.2329H2.125" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
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

                        
                        <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => 'openTableChangeConfirmation','class' => 'p-2','title' => __('modules.order.setTable')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'openTableChangeConfirmation','class' => 'p-2','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.order.setTable'))]); ?>
                            <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg" style="color: #011646;">
                                <g clip-path="url(#clip0_kot_row_table)">
                                    <path d="M15.633 4.24998L17.2997 7.08331H2.69967L4.36634 4.24998H15.633ZM16.6663 2.83331H3.33301L0.833008 7.08331V8.49998H2.49967V13.4583H4.16634V11.3333H15.833V13.4583H17.4997V8.49998H19.1663V7.08331L16.6663 2.83331ZM4.16634 9.91665V8.49998H15.833V9.91665H4.16634Z" fill="currentColor"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_kot_row_table">
                                        <rect width="20" height="17" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
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
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!--[if BLOCK]><![endif]--><?php if($orderType == 'delivery'): ?>
                    <div class="gap-2 flex justify-between items-center mb-2">
                        <div class="inline-flex items-center gap-2">
                            <svg class="w-6 h-6 transition duration-75 text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" version="1.0" viewBox="0 0 512 512"
                                xmlns="http://www.w3.org/2000/svg">
                                <g transform="translate(0 512) scale(.1 -.1)">
                                    <path
                                        d="m2605 4790c-66-13-155-48-213-82-71-42-178-149-220-221-145-242-112-552 79-761 59-64 61-67 38-73-13-4-60-24-104-46-151-75-295-249-381-462-20-49-38-91-39-93-2-2-19 8-40 22s-54 30-74 36c-59 16-947 12-994-4-120-43-181-143-122-201 32-33 76-33 106 0 41 44 72 55 159 55h80v-135c0-131 1-137 25-160l24-25h231 231l24 25c24 23 25 29 25 161v136l95-4c82-3 97-6 117-26l23-23v-349-349l-46-46-930-6-29 30c-17 16-30 34-30 40 0 7 34 11 95 11 88 0 98 2 120 25 16 15 25 36 25 55s-9 40-25 55c-22 23-32 25-120 25h-95v80 80h55c67 0 105 29 105 80 0 19-9 40-25 55l-24 25h-231-231l-24-25c-33-32-33-78 0-110 22-23 32-25 120-25h95v-80-80h-175c-173 0-176 0-200-25-33-32-33-78 0-110 24-25 27-25 197-25h174l12-45c23-88 85-154 171-183 22-8 112-12 253-12h220l-37-43c-103-119-197-418-211-669-7-115-7-116 19-142 26-25 29-26 164-26h138l16-69c55-226 235-407 464-466 77-20 233-20 310 0 228 59 409 240 463 464l17 71h605 606l13-62c58-281 328-498 621-498 349 0 640 291 640 640 0 237-141 465-350 569-89 43-193 71-271 71h-46l-142 331c-78 183-140 333-139 335 2 1 28-4 58-12 80-21 117-18 145 11l25 24v351 351l-26 26c-24 24-30 25-91 20-130-12-265-105-317-217l-23-49-29 30c-16 17-51 43-79 57-49 26-54 27-208 24-186-3-227 9-300 87-43 46-137 173-137 185 0 3 10 6 23 6s48 12 78 28c61 31 112 91 131 155 7 25 25 53 45 70 79 68 91 152 34 242-17 27-36 65-41 85-13 46-13 100 0 100 6 0 22 11 35 25 30 29 33 82 10 190-61 290-332 508-630 504-38-1-88-5-110-9zm230-165c87-23 168-70 230-136 55-57 108-153 121-216l6-31-153-4c-131-3-161-6-201-25-66-30-133-96-165-162-26-52-28-66-31-210l-4-153-31 6c-63 13-159 66-216 121-66 62-113 143-136 230-88 339 241 668 580 580zm293-619c7-41 28-106 48-147l36-74-24-15c-43-28-68-59-68-85 0-40-26-92-54-110-30-20-127-16-211 8l-50 14-3 175c-2 166-1 176 21 218 35 67 86 90 202 90h91l12-74zm-538-496c132-25 214-88 348-269 101-137 165-199 241-237 31-15 57-29 59-30s-6-20-17-43c-12-22-27-75-33-117-12-74-12-76-38-71-149 30-321 156-424 311-53 80-90 95-140 55-48-38-35-89 52-204l30-39-28-36c-42-54-91-145-110-208l-18-57-337-3-338-2 6 82c9 112 47 272 95 400 135 357 365 522 652 468zm1490-630c0-254 1-252-83-167-54 53-77 104-77 167s23 114 77 168c84 84 83 86 83-168zm-454 63c18-13 41-46 57-83l26-61-45-19c-75-33-165-52-244-54l-75-1-3 29c-8 72 44 166 113 201 42 22 132 16 171-12zm-2346-63v-80h-120-120v80 80h120 120v-80zm1584-184c80-52 154-84 261-111l90-23 112-483c68-295 112-506 112-540 1-68-21-134-56-171l-26-27-17 48c-29 86-99 159-177 186l-38 13-6 279c-5 297-5 297-64 414-58 113-212 233-328 254-21 4-41 14-44 21-12 32 88 201 111 186 6-4 37-24 70-46zm1099-493 185-433-348-490h-138-138l33 68c40 81 56 176 44 252-8 47-203 894-217 941-4 13 9 17 75 23 80 6 230 44 280 71 14 7 29 10 32 7 4-4 90-202 192-439zm-1323 187c118-22 229-99 275-190 37-74 45-138 45-375v-225h-160-160v115c0 179-47 289-158 369-91 67-141 76-417 76h-244l10 32c5 18 9 72 9 120v88h374c209 0 397-4 426-10zm-319-402c50-15 111-67 135-115 16-32 20-70 24-244l5-205 36-72 35-72h-759-759l7 63c17 164 95 400 165 502 47 68 129 124 215 145 52 13 853 12 896-2zm2114-323c256-67 415-329 350-580-48-184-202-326-390-358-197-34-412 76-500 257-19 39-38 86-41 104l-6 32h80 81l24-53c31-69 86-123 156-156 77-36 192-36 266-1 63 31 124 91 156 155 33 68 34 197 2 267-27 60-95 127-156 157-95 46-229 36-311-22-18-12-26-15-21-6 13 22 126 182 143 202 19 22 86 23 167 2zm-1315-243c39-21 87-99 77-125-6-15-27-17-178-17-193 0-231 7-289 58-35 29-70 78-70 97 0 3 96 5 213 5 187 0 217-2 247-18zm1288-89c51-38 67-70 67-133s-16-95-69-134c-43-33-132-29-179 7-20 15-37 32-37 38 0 5 36 9 80 9 73 0 83 3 105 25 33 32 33 78 0 110-22 22-32 25-105 25-44 0-80 4-80 8 0 12 29 37 65 57 39 21 117 15 153-12zm-397-46c-10-9-11-8-5 6 3 10 9 15 12 12s0-11-7-18zm-2460-217c45-106 169-184 289-184s244 78 289 184l22 50h81 81l-7-32c-13-65-66-159-123-219-186-195-500-195-686 0-57 60-110 154-123 219l-6 32h80 81l22-50zm419 41c0-16-51-50-91-63-30-8-48-8-78 0-40 13-91 47-91 63 0 5 57 9 130 9s130-4 130-9z" />
                                </g>
                            </svg>

                            <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['class' => 'text-sm w-full','wire:model.defer' => 'selectDeliveryExecutive']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-sm w-full','wire:model.defer' => 'selectDeliveryExecutive']); ?>
                                <option value=""><?php echo app('translator')->get('modules.order.selectDeliveryExecutive'); ?></option>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $deliveryExecutives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $attributes = $__attributesOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__attributesOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $component = $__componentOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__componentOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!--[if BLOCK]><![endif]--><?php if($orderType == 'pickup'): ?>
                    <div class="gap-2 flex justify-between items-center mb-2">
                        <div class="inline-flex items-center gap-2 w-full">
                            <label for="delivery_datetime" class="text-sm text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('modules.order.pickUpDateTime'); ?>:
                            </label>
                            <input type="datetime-local" id="delivery_datetime"
                            class="px-3 py-2 text-sm text-gray-900 bg-gray-100 border border-gray-300 rounded-md dark:border-gray-700 dark:bg-gray-600 dark:text-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            wire:model.live="deliveryDateTime" min="<?php echo e($minDate); ?>" max="<?php echo e($maxDate); ?>"
                            value="<?php echo e($defaultDate); ?>" style="color-scheme: light dark;" />
                            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'pickupDateTime','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'pickupDateTime','class' => 'mt-2']); ?>
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
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            </div>

            <div class="flex flex-col rounded gap-1">
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $orderItemList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="border border-gray-100 dark:border-gray-700 rounded-md p-2 flex flex-col gap-2">
                    <div class="flex flex-col gap-1">
                        <div class="flex items-center justify-between">
                            <div class="flex flex-col gap-1">
                                <span class="text-gray-900 dark:text-white text-xs">
                                    <?php echo e($item->item_name); ?>

                                </span>

                                <!--[if BLOCK]><![endif]--><?php if(isset($orderItemVariation[$key])): ?>
                                <span class="text-gray-500 dark:text-gray-400 text-xs">
                                    <?php echo isset($orderItemVariation[$key]) ? '&bull; ' . $orderItemVariation[$key]->variation : ''; ?>

                                </span>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    

                                <!--[if BLOCK]><![endif]--><?php if(!empty($itemModifiersSelected[$key])): ?>
                                    <div class="inline-flex flex-wrap gap-2 text-xs text-gray-600 dark:text-white">
                                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $itemModifiersSelected[$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifierOptionId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div
                                                class="inline-flex items-center justify-between text-xs mb-1 py-0.5 px-1 border-l-2 border-blue-500 bg-gray-200 dark:bg-gray-900 rounded-md">
                                                <span
                                                    class="text-gray-900 dark:text-white"><?php echo e($this->modifierOptions[$modifierOptionId]->name); ?></span>
                                                <span
                                                    class="text-gray-600 dark:text-gray-300"><?php echo e(currency_format($this->modifierOptions[$modifierOptionId]->price, $restaurant->currency_id)); ?></span>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]--> 
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>

                            <?php
                                $displayPrice = $this->getItemDisplayPrice($key);
                                $totalAmount = $orderItemAmount[$key];
                            ?>
                            <div class="flex items-center gap-2">
                                <div class="text-gray-500 dark:text-gray-400 text-xs">
                                    <?php echo e(currency_format($displayPrice, restaurant()->currency_id)); ?>

                                </div>
                                <div class="text-gray-500 dark:text-gray-400 text-xs font-bold">
                                    <?php echo e(currency_format($totalAmount, restaurant()->currency_id)); ?>

                                </div>
                            </div>
                        </div>
                    

                    </div>

                    <div class="flex items-center gap-2 justify-between">
                

                        <div class="relative inline-flex items-center max-w-[7rem]"
                            wire:key='orderItemQty-<?php echo e($key); ?>-counter'>
                            <button type="button" wire:click="subQty('<?php echo e($key); ?>')"
                                wire:loading.attr="disabled" wire:loading.class="opacity-50"
                                class="bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-md p-3 h-8 relative">
                                <svg class="w-2 h-2 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                </svg>
                                
                                <div wire:loading.flex wire:target="subQty('<?php echo e($key); ?>')"
                                    class="absolute inset-0 items-center justify-center">
                                    <svg class="animate-spin h-3 w-3 text-skin-base"
                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </div>
                            </button>

                            <input type="text" wire:model.lazy="orderItemQty.<?php echo e($key); ?>" wire:change="updateQty('<?php echo e($key); ?>')"
                                class="min-w-10 bg-white border-x-0 border-gray-300 h-8 text-center text-gray-900 text-sm block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                min="1" oninput="this.value = this.value.replace(/[^0-9]/g, '')" />

                            <button type="button" wire:click="addQty('<?php echo e($key); ?>')"
                                wire:loading.attr="disabled" wire:loading.class="opacity-50"
                                class="bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-md p-3 h-8 relative">
                                <svg class="w-2 h-2 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                                
                                <div wire:loading.flex wire:target="addQty('<?php echo e($key); ?>')"
                                    class="absolute inset-0 items-center justify-center">
                                    <svg class="animate-spin h-3 w-3 text-skin-base"
                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </div>
                            </button>
                        </div>

                        <div>
                            <?php if (isset($component)) { $__componentOriginal434e94cd6fe149c27362179b4ada6de8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal434e94cd6fe149c27362179b4ada6de8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.pos.item-note','data' => ['id' => $key,'note' => $itemNotes[$key] ?? '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pos.item-note'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key),'note' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($itemNotes[$key] ?? '')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal434e94cd6fe149c27362179b4ada6de8)): ?>
<?php $attributes = $__attributesOriginal434e94cd6fe149c27362179b4ada6de8; ?>
<?php unset($__attributesOriginal434e94cd6fe149c27362179b4ada6de8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal434e94cd6fe149c27362179b4ada6de8)): ?>
<?php $component = $__componentOriginal434e94cd6fe149c27362179b4ada6de8; ?>
<?php unset($__componentOriginal434e94cd6fe149c27362179b4ada6de8); ?>
<?php endif; ?>
                        </div>

                        <div>
                            <button
                                class="rounded text-gray-800 dark:text-gray-400 border dark:border-gray-500 hover:bg-gray-200 dark:hover:bg-gray-900/20 p-2 relative"
                                wire:click="deleteCartItems('<?php echo e($key); ?>')" wire:loading.attr="disabled"
                                wire:loading.class="opacity-50">
                                <svg class="w-4 h-4 text-gray-700 dark:text-gray-200" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 0 0-.894.553L7.382 4H4a1 1 0 0 0 0 2v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V6a1 1 0 1 0 0-2h-3.382l-.724-1.447A1 1 0 0 0 11 2zM7 8a1 1 0 0 1 2 0v6a1 1 0 1 1-2 0zm5-1a1 1 0 0 0-1 1v6a1 1 0 1 0 2 0V8a1 1 0 0 0-1-1"
                                        clip-rule="evenodd" />
                                </svg>
                                
                                <div wire:loading.flex wire:target="deleteCartItems('<?php echo e($key); ?>')"
                                    class="absolute inset-0 items-center justify-center">
                                    <svg class="animate-spin h-4 w-4 text-skin-base"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </div>
                            </button>
                        </div>
                    </div>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-center text-gray-500 dark:text-gray-400 mt-4">
                    <div class="flex flex-col items-center justify-center">
                        <svg class="w-12 h-12 text-gray-500 dark:text-gray-300" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <div class="text-gray-500 dark:text-gray-400 text-base">
                            <?php echo app('translator')->get('messages.noItemAdded'); ?>
                        </div>

                    </div>
                </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            </div>
        </div>
        </div>

        
        <div class="flex-shrink-0 left-0 right-0 pb-8 pt-2 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 shadow-[0_-4px_12px_rgba(0,0,0,0.05)]">
            <div class="h-auto p-4 select-none text-center bg-gray-50 rounded space-y-2 dark:bg-gray-700">
                <!--[if BLOCK]><![endif]--><?php if(count($orderItemList) > 0 && user_can('Add Discount on POS')): ?>
                    <div class="text-left">
                        <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => 'showAddDiscount']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'showAddDiscount']); ?>
                            <svg class="h-5 w-5 text-current me-1" width="24" height="24" viewBox="0 0 16 16"
                                xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <path d="m7.25 14.25-5.5-5.5 7-7h5.5v5.5z" />
                                <circle cx="11" cy="5" r=".5" fill="#000" />
                            </svg>
                            <?php echo app('translator')->get('modules.order.addDiscount'); ?>
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
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                
                

                <!--[if BLOCK]><![endif]--><?php if($discountAmount): ?>
                    <div wire:key="discountAmount"
                        class="flex justify-between text-green-500 text-xs dark:text-green-400">
                        <div class="inline-flex items-center gap-x-1"><?php echo app('translator')->get('modules.order.discount'); ?> <!--[if BLOCK]><![endif]--><?php if($discountType == 'percent'): ?>
                                (<?php echo e($discountValue); ?>%)
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <span class="text-red-500 hover:scale-110 active:scale-100 cursor-pointer"
                                wire:click="removeCurrentDiscount">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                        <div>
                            -<?php echo e(currency_format($discountAmount, $restaurant->currency_id)); ?>

                        </div>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!--[if BLOCK]><![endif]--><?php if($orderType === 'delivery'): ?>
                    <div class="flex justify-between items-center text-gray-500 text-xs dark:text-neutral-400">
                        <div>
                            <?php echo app('translator')->get('modules.delivery.deliveryFee'); ?>
                            <span class="text-xs text-gray-400">
                                <!--[if BLOCK]><![endif]--><?php if($deliveryFee == 0): ?>
                                    (<?php echo app('translator')->get('modules.delivery.freeDelivery'); ?>)
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="relative">
                                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['type' => 'number','step' => '1','min' => '0','class' => 'w-16 text-sm','wire:model.live' => 'deliveryFee']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','step' => '1','min' => '0','class' => 'w-16 text-sm','wire:model.live' => 'deliveryFee']); ?>
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
                            </div>
                        </div>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!--[if BLOCK]><![endif]--><?php if(!$orderID && count($orderItemList) > 0 && $extraCharges): ?>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $extraCharges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $charge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div wire:key="extraCharge-<?php echo e($loop->index); ?>"
                            class="flex justify-between text-gray-500 text-xs dark:text-neutral-400">
                            <div class="inline-flex items-center gap-x-1"><?php echo e($charge->charge_name); ?>

                                <!--[if BLOCK]><![endif]--><?php if($charge->charge_type == 'percent'): ?>
                                    (<?php echo e($charge->charge_value); ?>%)
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <span class="text-red-500 hover:scale-110 active:scale-100 cursor-pointer"
                                    wire:click="removeExtraCharge('<?php echo e($charge->id); ?>', '<?php echo e($orderType); ?>')">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </div>
                            <div>
                                <?php echo e(currency_format($charge->getAmount($discountedTotal), $restaurant->currency_id)); ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                

                <div class="flex justify-between font-medium dark:text-neutral-300">
                    <div>
                        <?php echo app('translator')->get('modules.order.total'); ?>
                    </div>
                    <div>
                        <?php echo e(currency_format($total, $restaurant->currency_id)); ?>

                    </div>
                </div>
            </div>

            <div class="h-auto pt-3 select-none text-center w-full">
                <!--[if BLOCK]><![endif]--><?php if(in_array('KOT', restaurant_modules())): ?>
                    <div class="flex gap-3">
                        <button class="rounded-xl text-white w-full p-2 relative" style="background-color: #011646;" wire:click="saveOrder('kot')"
                            wire:loading.attr="disabled" wire:loading.class="opacity-50">
                            <span wire:loading.remove wire:target="saveOrder('kot')"><?php echo app('translator')->get('modules.order.kot'); ?></span>
                            <span wire:loading wire:target="saveOrder('kot')">
                                <svg class="animate-spin -ml-1 mr-1 h-4 w-4 inline-flex text-white" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <?php echo app('translator')->get('modules.order.kot'); ?>
                            </span>
                        </button>
                        <button class="rounded-xl text-white w-full p-2 relative" style="background-color: #011646;"
                            wire:click="saveOrder('kot', 'print')" wire:loading.attr="disabled"
                            wire:loading.class="opacity-50">
                            <span wire:loading.remove wire:target="saveOrder('kot', 'print')"><?php echo app('translator')->get('modules.order.kotAndPrint'); ?></span>
                            <span wire:loading wire:target="saveOrder('kot', 'print')" class="inline-flex items-center">
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <?php echo app('translator')->get('modules.order.kotAndPrint'); ?>
                            </span>
                        </button>
                        <button class="rounded-xl text-white w-full p-2 relative text-xs" style="background-color: #011646;"
                            wire:click="saveOrder('kot','bill','payment', 'print')" wire:loading.attr="disabled"
                            wire:loading.class="opacity-50">
                            <span wire:loading.remove
                                wire:target="saveOrder('kot','bill','payment', 'print')"><?php echo app('translator')->get('modules.order.kotBillAndPayment'); ?></span>
                            <span wire:loading wire:target="saveOrder('kot','bill','payment', 'print')" >
                                <svg class="animate-spin inline-flex -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <?php echo app('translator')->get('modules.order.kotBillAndPayment'); ?>
                            </span>
                        </button>
                        <!--[if BLOCK]><![endif]--><?php if(!$orderID || ($orderID && $orderDetail && $orderDetail->status !== 'draft')): ?>
                        <button class="rounded-xl hover:opacity-90 text-white w-auto py-2 px-4 relative inline-flex items-center justify-center" style="background-color: #011646;" wire:click="saveOrder('draft')"
                            wire:loading.attr="disabled" wire:loading.class="opacity-50" title="<?php echo app('translator')->get('modules.order.saveAsDraft'); ?>">
                            <span wire:loading.remove wire:target="saveOrder('draft')">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.3495 10.1292L15.0661 13.6709C14.9599 14.7546 14.8749 15.5834 12.9553 15.5834H4.04446C2.12488 15.5834 2.03988 14.7546 1.93363 13.6709L1.65029 10.1292C1.59363 9.54127 1.77779 8.99585 2.11071 8.57794C2.11779 8.57085 2.11779 8.57085 2.12488 8.56377C2.51446 8.08919 3.10238 7.79169 3.76113 7.79169H13.2386C13.8974 7.79169 14.4782 8.08919 14.8607 8.5496C14.8678 8.55669 14.8749 8.56377 14.8749 8.57085C15.222 8.98877 15.4132 9.53419 15.3495 10.1292Z" stroke="white" stroke-miterlimit="10"/>
                                    <path d="M2.47913 8.09626V4.44834C2.47913 2.04001 3.08121 1.43793 5.48954 1.43793H6.38913C7.28871 1.43793 7.49413 1.70709 7.83413 2.16043L8.73371 3.36459C8.96038 3.66209 9.09496 3.84626 9.69704 3.84626H11.5033C13.9116 3.84626 14.5137 4.44834 14.5137 6.85668V8.12459" stroke="white" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6.67957 12.0417H10.3204" stroke="white" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span wire:loading wire:target="saveOrder('draft')" class="inline-flex items-center justify-center">
                                <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                        </button>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <!--[if BLOCK]><![endif]--><?php if(!$orderID || ($orderID && $orderDetail && $orderDetail->status == 'draft')): ?>
                    <div class="flex gap-3 mt-3">
                        <button class="rounded-xl text-white w-full p-2 relative" style="background-color: #EA580B;" wire:click="saveOrder('bill')"
                            wire:loading.attr="disabled" wire:loading.class="opacity-50">
                            <span wire:loading.remove wire:target="saveOrder('bill')"><?php echo app('translator')->get('modules.order.bill'); ?></span>
                            <span wire:loading wire:target="saveOrder('bill')">
                                <svg class="animate-spin inline-flex items-center -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <?php echo app('translator')->get('modules.order.bill'); ?>
                            </span>
                        </button>
                        <button class="rounded-xl text-white w-full p-2 relative" style="background-color: #0D9F6E;"
                            wire:click="saveOrder('bill', 'payment')" wire:loading.attr="disabled"
                            wire:loading.class="opacity-50">
                            <span wire:loading.remove wire:target="saveOrder('bill', 'payment')"><?php echo app('translator')->get('modules.order.billAndPayment'); ?></span>
                            <span wire:loading wire:target="saveOrder('bill', 'payment')">
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline-flex items-center" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <?php echo app('translator')->get('modules.order.billAndPayment'); ?>
                            </span>
                        </button>
                        <button class="rounded-xl text-white w-full p-2 relative" style="background-color: #3F82F7;"
                            wire:click="saveOrder('bill', 'print')" wire:loading.attr="disabled"
                            wire:loading.class="opacity-50">
                            <span wire:loading.remove wire:target="saveOrder('bill', 'print')"><?php echo app('translator')->get('modules.order.createBillAndPrintReceipt'); ?></span>
                            <span wire:loading wire:target="saveOrder('bill', 'print')" class="inline-flex items-center">
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <?php echo app('translator')->get('modules.order.createBillAndPrintReceipt'); ?>
                            </span>
                        </button>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>

        <!-- Merge Table Modal is outside this panel wrapper -->

        <!-- Reservation Confirmation Modal -->
        <?php if (isset($component)) { $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dialog-modal','data' => ['wire:model.live' => 'showReservationModal','maxWidth' => 'md']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dialog-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'showReservationModal','maxWidth' => 'md']); ?>
             <?php $__env->slot('title', null, []); ?> 
                <div class="flex items-center gap-2">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <?php echo app('translator')->get('modules.order.reservationConfirmation'); ?>
                </div>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('content', null, []); ?> 
                <div class="space-y-4">
                    <div class="text-center">
                        <svg class="mx-auto h-12 w-12 text-blue-100" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">
                            <?php echo app('translator')->get('modules.order.tableHasReservation'); ?>
                        </h3>
                        <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            <p><?php echo app('translator')->get('modules.order.reservationFor'); ?>: <strong><?php echo e($this->reservationCustomer?->name ?? 'N/A'); ?></strong></p>
                            <p><?php echo app('translator')->get('modules.order.reservationTime'); ?>: <strong><?php echo e($this->reservation?->reservation_date_time?->format('M d, Y g:i A') ?? 'N/A'); ?></strong></p>
                        </div>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                        <p class="text-sm text-gray-700 dark:text-gray-300 text-center">
                            <?php echo app('translator')->get('modules.order.isThisSameCustomer'); ?>
                        </p>
                    </div>
                </div>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('footer', null, []); ?> 
                <div class="flex justify-between w-full">
                    <?php if (isset($component)) { $__componentOriginala6eb8d48d97827815852966e89cf193a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala6eb8d48d97827815852966e89cf193a = $attributes; } ?>
<?php $component = App\View\Components\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ButtonCancel::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'closeReservationModal','wire:loading.attr' => 'disabled']); ?>
                        <?php echo app('translator')->get('app.cancel'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala6eb8d48d97827815852966e89cf193a)): ?>
<?php $attributes = $__attributesOriginala6eb8d48d97827815852966e89cf193a; ?>
<?php unset($__attributesOriginala6eb8d48d97827815852966e89cf193a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6eb8d48d97827815852966e89cf193a)): ?>
<?php $component = $__componentOriginala6eb8d48d97827815852966e89cf193a; ?>
<?php unset($__componentOriginala6eb8d48d97827815852966e89cf193a); ?>
<?php endif; ?>
                    <div class="flex gap-2">
                        <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => 'confirmDifferentCustomer','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'confirmDifferentCustomer','wire:loading.attr' => 'disabled']); ?>
                            <?php echo app('translator')->get('modules.order.differentCustomer'); ?>
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
<?php $component->withAttributes(['wire:click' => 'confirmSameCustomer','wire:loading.attr' => 'disabled']); ?>
                            <?php echo app('translator')->get('modules.order.sameCustomer'); ?>
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

        <!-- Table Change Confirmation Modal -->
        <?php if (isset($component)) { $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dialog-modal','data' => ['wire:model.live' => 'showTableChangeConfirmationModal','maxWidth' => 'md']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dialog-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'showTableChangeConfirmationModal','maxWidth' => 'md']); ?>
             <?php $__env->slot('title', null, []); ?> 
                <div class="flex items-center gap-2">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                    <?php echo app('translator')->get('modules.order.changeTable'); ?>
                </div>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('content', null, []); ?> 
                <div class="space-y-4">
                    <div class="text-center">
                        <svg class="mx-auto h-12 w-12 text-amber-100" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">
                            <?php echo app('translator')->get('modules.order.confirmTableChange'); ?>
                        </h3>
                        <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            <p><?php echo app('translator')->get('modules.order.currentTable'); ?>: <strong><?php echo e($tableNo); ?></strong></p>
                            <!--[if BLOCK]><![endif]--><?php if($pendingTable): ?>
                                <p><?php echo app('translator')->get('modules.order.changeTo'); ?>: <strong><?php echo e($pendingTable->table_code); ?></strong></p>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <p class="mt-2"><?php echo app('translator')->get('modules.order.tableChangeMessage'); ?></p>
                        </div>
                    </div>

                    <div class="bg-amber-50 dark:bg-amber-900/20 p-4 rounded-lg border border-amber-200 dark:border-amber-800">
                        <p class="text-sm text-amber-700 dark:text-amber-300 text-center">
                            <?php echo app('translator')->get('modules.order.tableChangeWarning'); ?>
                        </p>
                    </div>
                </div>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('footer', null, []); ?> 
                <div class="flex justify-end gap-2 w-full">
                    <?php if (isset($component)) { $__componentOriginala6eb8d48d97827815852966e89cf193a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala6eb8d48d97827815852966e89cf193a = $attributes; } ?>
<?php $component = App\View\Components\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ButtonCancel::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'cancelTableChange','wire:loading.attr' => 'disabled']); ?>
                        <?php echo app('translator')->get('app.cancel'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala6eb8d48d97827815852966e89cf193a)): ?>
<?php $attributes = $__attributesOriginala6eb8d48d97827815852966e89cf193a; ?>
<?php unset($__attributesOriginala6eb8d48d97827815852966e89cf193a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6eb8d48d97827815852966e89cf193a)): ?>
<?php $component = $__componentOriginala6eb8d48d97827815852966e89cf193a; ?>
<?php unset($__componentOriginala6eb8d48d97827815852966e89cf193a); ?>
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
<?php $component->withAttributes(['wire:click' => 'confirmTableChange','wire:loading.attr' => 'disabled','class' => 'bg-amber-600 hover:bg-amber-700']); ?>
                        <?php echo app('translator')->get('modules.order.changeTable'); ?>
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

        <!-- Merge Table Modal -->
        <?php if (isset($component)) { $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dialog-modal','data' => ['wire:model.live' => 'showMergeTableModal','maxWidth' => 'lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dialog-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'showMergeTableModal','maxWidth' => 'lg']); ?>
             <?php $__env->slot('title', null, []); ?> 
                <div class="flex items-center gap-2">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                    <?php echo app('translator')->get('modules.order.mergeTables'); ?>
                </div>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('content', null, []); ?> 
                <div class="space-y-4">
                    <!--[if BLOCK]><![endif]--><?php if(count($tablesWithUnpaidOrders) > 0): ?>
                        <div class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            <?php echo app('translator')->get('modules.order.mergeTableDescription'); ?>
                        </div>
                        <div class="max-h-96 overflow-y-auto">
                            <div class="grid grid-cols-1 gap-3">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $tablesWithUnpaidOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors cursor-pointer <?php echo e(in_array($table->id, $selectedTablesForMerge) ? 'bg-blue-50 dark:bg-blue-900/20 border-blue-300 dark:border-blue-700' : ''); ?>">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-3 flex-1">
                                                <input type="checkbox" 
                                                    wire:model.live="selectedTablesForMerge" 
                                                    value="<?php echo e($table->id); ?>"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <svg fill="currentColor" class="w-6 h-6 text-gray-700 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44.999 44.999" xml:space="preserve">
                                                    <g stroke-width="0"/>
                                                    <g stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="m42.558 23.378 2.406-10.92a1.512 1.512 0 0 0-2.954-.652l-2.145 9.733h-9.647a1.512 1.512 0 0 0 0 3.026h.573l-3.258 7.713a1.51 1.51 0 0 0 1.393 2.102c.59 0 1.15-.348 1.394-.925l2.974-7.038 4.717.001 2.971 7.037a1.512 1.512 0 1 0 2.787-1.177l-3.257-7.713h.573a1.51 1.51 0 0 0 1.473-1.187m-28.35 1.186h.573a1.512 1.512 0 0 0 0-3.026H5.134L2.99 11.806a1.511 1.511 0 1 0-2.954.652l2.406 10.92a1.51 1.51 0 0 0 1.477 1.187h.573L1.234 32.28a1.51 1.51 0 0 0 .805 1.98 1.515 1.515 0 0 0 1.982-.805l2.971-7.037 4.717-.001 2.972 7.038a1.514 1.514 0 0 0 1.982.805 1.51 1.51 0 0 0 .805-1.98z"/>
                                                    <path d="M24.862 31.353h-.852V18.308h8.13a1.513 1.513 0 1 0 0-3.025H12.856a1.514 1.514 0 0 0 0 3.025h8.13v13.045h-.852a1.514 1.514 0 0 0 0 3.027h4.728a1.513 1.513 0 1 0 0-3.027"/>
                                                </svg>
                                                <div class="flex-1">
                                                    <div class="font-semibold text-gray-900 dark:text-white">
                                                        <?php echo e($table->table_code); ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400 ml-4">
                                                <!--[if BLOCK]><![endif]--><?php if($table->activeOrder): ?>
                                                    <?php echo e(ucfirst($table->activeOrder->status)); ?>

                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </div>
                                        </div>
                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                        <!--[if BLOCK]><![endif]--><?php if(count($selectedTablesForMerge) > 0): ?>
                            <div class="mt-4 p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
                                <p class="text-sm text-blue-700 dark:text-blue-300">
                                    <strong><?php echo e(count($selectedTablesForMerge)); ?></strong> <?php echo app('translator')->get('modules.order.tablesSelectedForMerge'); ?>
                                </p>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <?php else: ?>
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">
                                <?php echo app('translator')->get('modules.order.noTablesWithUnpaidOrders'); ?>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                <?php echo app('translator')->get('modules.order.noTablesWithUnpaidOrdersDescription'); ?>
                            </p>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('footer', null, []); ?> 
                <div class="flex justify-end gap-2 w-full">
                    <?php if (isset($component)) { $__componentOriginala6eb8d48d97827815852966e89cf193a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala6eb8d48d97827815852966e89cf193a = $attributes; } ?>
<?php $component = App\View\Components\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ButtonCancel::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'closeMergeTableModal','wire:loading.attr' => 'disabled']); ?>
                        <?php echo app('translator')->get('app.close'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala6eb8d48d97827815852966e89cf193a)): ?>
<?php $attributes = $__attributesOriginala6eb8d48d97827815852966e89cf193a; ?>
<?php unset($__attributesOriginala6eb8d48d97827815852966e89cf193a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6eb8d48d97827815852966e89cf193a)): ?>
<?php $component = $__componentOriginala6eb8d48d97827815852966e89cf193a; ?>
<?php unset($__componentOriginala6eb8d48d97827815852966e89cf193a); ?>
<?php endif; ?>
                    <!--[if BLOCK]><![endif]--><?php if(count($tablesWithUnpaidOrders) > 0): ?>
                        <!--[if BLOCK]><![endif]--><?php if(count($selectedTablesForMerge) > 0): ?>
                            <button type="button" 
                                wire:click="mergeSelectedTables" 
                                wire:loading.attr="disabled" 
                                wire:key="merge-button-enabled"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                <span wire:loading.remove wire:target="mergeSelectedTables">
                                    <?php echo app('translator')->get('modules.order.mergeTables'); ?>
                                </span>
                                <span wire:loading wire:target="mergeSelectedTables" class="inline-flex items-center">
                                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                    <?php echo app('translator')->get('modules.order.merging'); ?>
                                </span>
                            </button>
                        <?php else: ?>
                            <button type="button" 
                                class="inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest cursor-not-allowed opacity-50" 
                                disabled>
                                <?php echo app('translator')->get('modules.order.mergeTables'); ?>
                            </button>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
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
<?php /**PATH C:\xampp\htdocs\script\resources\views/pos/kot_items.blade.php ENDPATH**/ ?>