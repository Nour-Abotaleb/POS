<div class="flex flex-col h-auto min-h-screen px-2 py-4 pr-4 bg-white border-l lg:w-5/12 dark:border-gray-700 dark:bg-gray-800">
    <div>

        <div class="flex justify-between items-center dark:text-neutral-200">
            <h2 class="text-lg dark:text-neutral-200">
                <?php echo e($orderDetail->show_formatted_order_number); ?>

            </h2>
            <div class="flex items-center gap-2">
                <?php if($orderDetail->order_type == 'pickup'): ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-bag-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4z" />
                    </svg>
                <?php elseif($orderDetail->order_type == 'delivery'): ?>
                    <svg class="w-6 h-6 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                        fill="currentColor" version="1.0" viewBox="0 0 512 512"
                        xmlns="http://www.w3.org/2000/svg">
                        <g transform="translate(0 512) scale(.1 -.1)">
                            <path d="m2605 4790c-66-13-155-48-213-82-71-42-178-149-220-221-145-242-112-552 79-761 59-64 61-67 38-73-13-4-60-24-104-46-151-75-295-249-381-462-20-49-38-91-39-93-2-2-19 8-40 22s-54 30-74 36c-59 16-947 12-994-4-120-43-181-143-122-201 32-33 76-33 106 0 41 44 72 55 159 55h80v-135c0-131 1-137 25-160l24-25h231 231l24 25c24 23 25 29 25 161v136l95-4c82-3 97-6 117-26l23-23v-349-349l-46-46-930-6-29 30c-17 16-30 34-30 40 0 7 34 11 95 11 88 0 98 2 120 25 16 15 25 36 25 55s-9 40-25 55c-22 23-32 25-120 25h-95v80 80h55c67 0 105 29 105 80 0 19-9 40-25 55l-24 25h-231-231l-24-25c-33-32-33-78 0-110 22-23 32-25 120-25h95v-80-80h-175c-173 0-176 0-200-25-33-32-33-78 0-110 24-25 27-25 197-25h174l12-45c23-88 85-154 171-183 22-8 112-12 253-12h220l-37-43c-103-119-197-418-211-669-7-115-7-116 19-142 26-25 29-26 164-26h138l16-69c55-226 235-407 464-466 77-20 233-20 310 0 228 59 409 240 463 464l17 71h605 606l13-62c58-281 328-498 621-498 349 0 640 291 640 640 0 237-141 465-350 569-89 43-193 71-271 71h-46l-142 331c-78 183-140 333-139 335 2 1 28-4 58-12 80-21 117-18 145 11l25 24v351 351l-26 26c-24 24-30 25-91 20-130-12-265-105-317-217l-23-49-29 30c-16 17-51 43-79 57-49 26-54 27-208 24-186-3-227 9-300 87-43 46-137 173-137 185 0 3 10 6 23 6s48 12 78 28c61 31 112 91 131 155 7 25 25 53 45 70 79 68 91 152 34 242-17 27-36 65-41 85-13 46-13 100 0 100 6 0 22 11 35 25 30 29 33 82 10 190-61 290-332 508-630 504-38-1-88-5-110-9zm230-165c87-23 168-70 230-136 55-57 108-153 121-216l6-31-153-4c-131-3-161-6-201-25-66-30-133-96-165-162-26-52-28-66-31-210l-4-153-31 6c-63 13-159 66-216 121-66 62-113 143-136 230-88 339 241 668 580 580zm293-619c7-41 28-106 48-147l36-74-24-15c-43-28-68-59-68-85 0-40-26-92-54-110-30-20-127-16-211 8l-50 14-3 175c-2 166-1 176 21 218 35 67 86 90 202 90h91l12-74zm-538-496c132-25 214-88 348-269 101-137 165-199 241-237 31-15 57-29 59-30s-6-20-17-43c-12-22-27-75-33-117-12-74-12-76-38-71-149 30-321 156-424 311-53 80-90 95-140 55-48-38-35-89 52-204l30-39-28-36c-42-54-91-145-110-208l-18-57-337-3-338-2 6 82c9 112 47 272 95 400 135 357 365 522 652 468zm1490-630c0-254 1-252-83-167-54 53-77 104-77 167s23 114 77 168c84 84 83 86 83-168zm-454 63c18-13 41-46 57-83l26-61-45-19c-75-33-165-52-244-54l-75-1-3 29c-8 72 44 166 113 201 42 22 132 16 171-12zm-2346-63v-80h-120-120v80 80h120 120v-80zm1584-184c80-52 154-84 261-111l90-23 112-483c68-295 112-506 112-540 1-68-21-134-56-171l-26-27-17 48c-29 86-99 159-177 186l-38 13-6 279c-5 297-5 297-64 414-58 113-212 233-328 254-21 4-41 14-44 21-12 32 88 201 111 186 6-4 37-24 70-46zm1099-493 185-433-348-490h-138-138l33 68c40 81 56 176 44 252-8 47-203 894-217 941-4 13 9 17 75 23 80 6 230 44 280 71 14 7 29 10 32 7 4-4 90-202 192-439zm-1323 187c118-22 229-99 275-190 37-74 45-138 45-375v-225h-160-160v115c0 179-47 289-158 369-91 67-141 76-417 76h-244l10 32c5 18 9 72 9 120v88h374c209 0 397-4 426-10zm-319-402c50-15 111-67 135-115 16-32 20-70 24-244l5-205 36-72 35-72h-759-759l7 63c17 164 95 400 165 502 47 68 129 124 215 145 52 13 853 12 896-2zm2114-323c256-67 415-329 350-580-48-184-202-326-390-358-197-34-412 76-500 257-19 39-38 86-41 104l-6 32h80 81l24-53c31-69 86-123 156-156 77-36 192-36 266-1 63 31 124 91 156 155 33 68 34 197 2 267-27 60-95 127-156 157-95 46-229 36-311-22-18-12-26-15-21-6 13 22 126 182 143 202 19 22 86 23 167 2zm-1315-243c39-21 87-99 77-125-6-15-27-17-178-17-193 0-231 7-289 58-35 29-70 78-70 97 0 3 96 5 213 5 187 0 217-2 247-18zm1288-89c51-38 67-70 67-133s-16-95-69-134c-43-33-132-29-179 7-20 15-37 32-37 38 0 5 36 9 80 9 73 0 83 3 105 25 33 32 33 78 0 110-22 22-32 25-105 25-44 0-80 4-80 8 0 12 29 37 65 57 39 21 117 15 153-12zm-397-46c-10-9-11-8-5 6 3 10 9 15 12 12s0-11-7-18zm-2460-217c45-106 169-184 289-184s244 78 289 184l22 50h81 81l-7-32c-13-65-66-159-123-219-186-195-500-195-686 0-57 60-110 154-123 219l-6 32h80 81l22-50zm419 41c0-16-51-50-91-63-30-8-48-8-78 0-40 13-91 47-91 63 0 5 57 9 130 9s130-4 130-9z" />
                        </g>
                    </svg>
                <?php else: ?>
                    <svg class="w-6 h-6 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                        fill="currentColor" version="1.0" viewBox="0 0 512 512"
                        xmlns="http://www.w3.org/2000/svg">
                        <g transform="translate(0 512) scale(.1 -.1)">
                            <path d="m249 4691c-19-20-29-40-29-60 0-16-14-243-31-503s-28-495-25-522 19-77 35-111c46-100 126-167 236-200l40-12 3-400 2-401-25-6c-58-15-56 21-53-867l3-814 23-45c35-72 75-114 144-151 58-31 70-34 148-34s90 3 148 34c70 38 100 69 140 145l27 51 5 293 5 294 52-64c380-466 1036-731 1654-667 645 65 1211 449 1511 1024l57 110 3-495c3-491 3-495 26-540 35-72 75-114 144-151 58-31 70-34 148-34s90 3 148 34c70 38 100 69 140 145l27 51 3 1938 2 1938-52 52-161-5c-184-6-260-25-384-93-90-50-218-178-268-268-66-120-87-202-93-370l-5-148-86 84c-469 455-1109 646-1736 517-295-61-612-212-835-399l-75-63-6 53c-4 30-15 182-24 339-12 208-21 291-32 308-31 50-98 53-130 6-15-24-15-48 6-387 12-199 24-383 27-409 5-41 3-48-19-62-28-19-159-52-234-60l-53-5v455 455l-25 24c-15 16-36 25-55 25s-40-9-55-25l-25-24v-456-457l-27 6c-16 3-53 8-83 12-69 8-174 40-188 57-7 8-3 125 14 382 30 467 30 450-1 480-33 33-70 32-106-4zm4551-1171v-1040h-320-320v783c0 512 4 804 11 843 29 162 151 321 303 394 91 44 149 57 254 59l72 1v-1040zm-1955 776c271-49 475-131 701-282 126-83 292-236 390-358l64-80v-604-603l25-24c23-24 30-25 150-25 101 0 125-3 125-14 0-34-33-179-60-269-90-288-240-529-465-745-443-426-1063-587-1665-432-403 103-777 372-1019 732l-51 76v382 381l-25 24c-13 14-31 25-40 25-14 0-15 44-13 401l3 402 40 12c111 33 189 100 238 203 29 60 32 77 34 166l1 98 49 50c243 250 626 440 978 487 44 6 94 13 110 15 60 9 352-3 430-18zm-2470-652c200-61 554-55 731 13 15 6 16 1 10-38-9-57-46-112-98-146l-42-28h-256-256l-42 28c-52 34-89 89-98 145-4 23-5 42-3 42s27-7 54-16zm425-764v-400h-80-80v400 400h80 80v-400zm78-1309c-3-739-3-750-24-777-39-53-71-69-134-69s-95 16-134 69c-21 27-21 38-24 777l-2 749h160 160l-2-749zm3920 0c-3-739-3-750-24-777-39-53-71-69-134-69s-95 16-134 69c-21 27-21 38-24 777l-2 749h160 160l-2-749z" />
                            <path d="m2420 3834c-293-38-560-167-763-371-476-475-502-1239-60-1743 495-563 1356-588 1875-52 196 202 313 436 352 703 60 408-69 797-363 1090-182 182-382 293-631 350-83 19-331 33-410 23zm315-169c467-75 826-424 927-900 16-77 16-333 0-410-98-461-436-799-897-897-77-16-333-16-410 0-348 74-626 281-783 580-173 331-175 697-7 1032 214 427 696 672 1170 595z" />
                        </g>
                    </svg>
                <?php endif; ?>
                <span><?php echo e(Str::title($orderDetail->orderType?->order_type_name ?? $orderDetail->custom_order_type_name ?? $orderDetail->order_type)); ?></span>
            </div>
        </div>

        <div class="flex justify-between gap-3 my-4 space-y-1">
            <div class="inline-flex gap-4">
                <?php if($orderDetail->order_type == 'dine_in'): ?>
                    <?php if(!is_null($orderDetail->table)): ?>
                        <div class="inline-flex items-center gap-2">
                            <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['p-3 rounded-lg tracking-wide bg-skin-base/[0.2] text-skin-base']); ?>">
                                <h3 wire:loading.class.delay='opacity-50'
                                    class="<?php echo \Illuminate\Support\Arr::toCssClasses(['font-semibold']); ?>">
                                    <?php echo e($orderDetail->table->table_code ?? '--'); ?>

                                </h3>
                            </div>
                            <?php if(user_can('Update Order')): ?>
                                <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => 'openTableChangeConfirmation']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'openTableChangeConfirmation']); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-gear" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0" />
                                        <path
                                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z" />
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
                            <?php endif; ?>
                        </div>
                    <?php elseif(user_can('Update Order')): ?>
                        <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => 'openTableChangeConfirmation']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'openTableChangeConfirmation']); ?><?php echo app('translator')->get('modules.order.setTable'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $attributes = $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $component = $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['p-3 rounded-lg tracking-wide bg-skin-base/[0.2] text-skin-base']); ?>">
                        <h3 wire:loading.class.delay='opacity-50'
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['font-semibold']); ?>">
                            <?php echo e($orderDetail->table->table_code ?? '--'); ?>

                        </h3>
                    </div>
                <?php endif; ?>
                <div>
                    <?php if($orderDetail->customer_id): ?>
                        <div class="flex items-center gap-2">
                            <div class="font-semibold text-gray-700 dark:text-gray-300"><?php echo e($orderDetail->customer->name); ?></div>
                            <?php if(user_can('Update Order')): ?>
                                <button  wire:click="$dispatch('showAddCustomerModal', { id: <?php echo e($orderDetail->id); ?>, customerId: <?php echo e($orderDetail->customer_id); ?>, fromPos: true })" title="<?php echo e(__('modules.order.updateCustomerDetails')); ?>" class="p-1 text-gray-500 transition-colors bg-gray-100 rounded-md hover:text-gray-700 hover:bg-gray-200 rtl:ml-2 ltr:mr-2 dark:text-gray-300 dark:bg-gray-600 dark:hover:text-gray-200 dark:hover:bg-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg>
                                </button>
                            <?php endif; ?>
                        </div>
                    <?php elseif(user_can('Update Order')): ?>
                        <a href="javascript:;" wire:click="$dispatch('showAddCustomerModal', { id: <?php echo e($orderDetail->id); ?>, customerId: null, fromPos: true })"
                        class="text-sm underline dark:text-gray-300 underline-offset-2">&plus; <?php echo app('translator')->get('modules.order.addCustomerDetails'); ?></a>
                    <?php endif; ?>
                    <div class="text-xs font-medium text-gray-600 dark:text-gray-400"><?php echo e($orderDetail->date_time->timezone(timezone())->translatedFormat('M d, Y h:i A')); ?></div>
                </div>

            </div>
            <div>
                <span class="<?php echo \Illuminate\Support\Arr::toCssClasses(['text-sm font-medium px-2 py-1 rounded uppercase tracking-wide whitespace-nowrap ',
                'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-400 border border-gray-400' => ($orderDetail->status == 'draft'),
                'bg-yellow-100 text-yellow-800 dark:bg-yellow-700 dark:text-yellow-400 border border-yellow-400' => ($orderDetail->status == 'kot'),
                'bg-blue-100 text-blue-800 dark:bg-blue-700 dark:text-blue-400 border border-blue-400' => ($orderDetail->status == 'billed'),
                'bg-green-100 text-green-800 dark:bg-gray-700 dark:text-green-400 border border-green-400' => ($orderDetail->status == 'paid'),
                'bg-red-100 text-red-800 dark:bg-red-700 dark:text-red-400 border border-red-400' => ($orderDetail->status == 'canceled'),
                ]); ?>">
                    <?php echo app('translator')->get('modules.order.' . $orderDetail->status); ?>
                </span>
            </div>

        </div>

        <?php if($orderDetail->order_status->value === 'cancelled'): ?>
            <span class="inline-block px-2 py-1 my-2 text-xs font-medium text-red-800 bg-red-100 rounded-full">
                <?php echo app('translator')->get('modules.order.info_cancelled'); ?>
                            </span>
                                <?php else: ?>
        <div class="p-4 mb-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <?php
                $statuses = match($orderDetail->order_type) {
                    'delivery' => ['placed', 'confirmed', 'preparing', 'food_ready', 'out_for_delivery', 'delivered'],
                    'pickup' => ['placed', 'confirmed', 'preparing', 'ready_for_pickup', 'delivered'],
                    default => ['placed', 'confirmed', 'preparing', 'food_ready', 'served'],
                };

                $currentIndex = array_search($orderDetail->order_status->value, $statuses);
                $currentIndex = $currentIndex !== false ? $currentIndex : 0;
                $nextIndex = min($currentIndex + 1, count($statuses) - 1);
            ?>

            <?php if($orderDetail->order_status->value === 'canceled'): ?>
                <div class="flex items-center justify-center">
                    <h3 class="text-lg font-semibold text-red-600 dark:text-red-400">
                        <?php echo e(__('modules.order.orderCancelled')); ?>

                    </h3>

                </div>
            <?php else: ?>
                <div class="flex flex-col space-y-4">
                    <div class="flex items-center justify-between text-gray-900 dark:text-white">
                        <h3 class="text-lg font-semibold">
                            <?php echo e(__('modules.order.orderStatus')); ?>

                        </h3>
                        <span class="px-3 py-1 text-sm font-medium rounded-full"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' => $orderDetail->order_status->value === 'delivered' || $orderDetail->order_status->value === 'served' || $orderDetail->order_status->value === 'food_ready',
                                'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300' => $orderDetail->order_status->value === 'placed',
                                'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300' => $orderDetail->order_status->value !== 'delivered' && $orderDetail->order_status->value !== 'served' && $orderDetail->order_status->value !== 'placed',
                            ]); ?>">
                            <?php echo e(App\Enums\OrderStatus::from($orderDetail->order_status->value)->translatedLabel()); ?>

                        </span>


                    </div>

                    <div class="relative">
                        <div class="relative flex justify-between">
                            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex flex-col items-center">
                                    <div class="w-8 h-8 rounded-full flex items-center justify-center mb-2
                                        <?php if($index <= $currentIndex): ?>
                                            bg-skin-base text-white
                                        <?php else: ?>
                                            bg-gray-200 dark:bg-gray-700 text-gray-400 dark:text-gray-500
                                        <?php endif; ?>">
                                        <?php switch($status):
                                            case ('placed'): ?>
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                </svg>
                                                <?php break; ?>
                                            <?php case ('confirmed'): ?>
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <?php break; ?>
                                            <?php case ('preparing'): ?>
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 7.68 7.68" xmlns="http://www.w3.org/2000/svg"><path d="M7.584 3.072 6.72 3.72v1.8a0.961 0.961 0 0 1 -0.96 0.96H1.92a0.961 0.961 0 0 1 -0.96 -0.96v-1.8L0.096 3.072a0.24 0.24 0 0 1 0.288 -0.384L0.96 3.12V2.64a0.481 0.481 0 0 1 0.48 -0.48h4.8a0.481 0.481 0 0 1 0.48 0.48v0.48l0.576 -0.432a0.24 0.24 0 0 1 0.288 0.384M4.8 1.68a0.24 0.24 0 0 0 0.24 -0.24V0.48a0.24 0.24 0 0 0 -0.48 0v0.96a0.24 0.24 0 0 0 0.24 0.24m-0.96 0a0.24 0.24 0 0 0 0.24 -0.24V0.48a0.24 0.24 0 0 0 -0.48 0v0.96a0.24 0.24 0 0 0 0.24 0.24m-0.96 0a0.24 0.24 0 0 0 0.24 -0.24V0.48a0.24 0.24 0 0 0 -0.48 0v0.96a0.24 0.24 0 0 0 0.24 0.24" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                                <?php break; ?>
                                            <?php case ('out_for_delivery'): ?>
                                            <?php case ('ready_for_pickup'): ?>
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                                </svg>
                                                <?php break; ?>
                                            <?php case ('delivered'): ?>
                                            <?php case ('served'): ?>
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                <?php break; ?>
                                            <?php case ('food_ready'): ?>
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8c-1.11 0-2.08.402-2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M12 16c1.11 0 2.08-.402 2.599-1M19 7h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5M3 7h2a2 2 0 012 2v6a2 2 0 01-2 2H3.5" />
                                                </svg>
                                            <?php break; ?>
                                        <?php endswitch; ?>
                                    </div>
                                    <span class="text-xs font-medium text-gray-500 dark:text-gray-400">
                                        <?php echo e(App\Enums\OrderStatus::from($status)->translatedLabel()); ?>

                                    </span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <?php if(user_can('Update Order')): ?>
                        <div class="flex justify-end items-center mt-4 space-x-2 rtl:!space-x-reverse">
                            <?php if($orderDetail->order_status->value === 'placed'): ?>
                                <?php if (isset($component)) { $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-button','data' => ['class' => 'inline-flex items-center gap-2 dark:text-gray-200','wire:click' => '$toggle(\'confirmDeleteModal\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('danger-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'inline-flex items-center gap-2 dark:text-gray-200','wire:click' => '$toggle(\'confirmDeleteModal\')']); ?>
                                    <span><?php echo e(__('modules.order.cancelOrder')); ?></span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
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

                            <?php if($currentIndex < count($statuses) - 1): ?>
                                <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['class' => 'inline-flex items-center gap-2','wire:click' => '$set(\'orderStatus\', \''.e($statuses[$nextIndex]).'\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'inline-flex items-center gap-2','wire:click' => '$set(\'orderStatus\', \''.e($statuses[$nextIndex]).'\')']); ?>
                                    <span><?php echo e(__('modules.order.moveTo')); ?> <?php echo e(App\Enums\OrderStatus::from($statuses[$nextIndex])->translatedLabel()); ?></span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
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
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if($orderDetail): ?>
        <div class="flex flex-col rounded ">
            <table class="flex-1 min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th scope="col"
                            class="p-2 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 rtl:text-right ltr:text-left">
                            <?php echo app('translator')->get('modules.menu.itemName'); ?>
                        </th>
                        <th scope="col"
                            class="p-2 text-xs text-center text-gray-500 uppercase dark:text-gray-400">
                            <?php echo app('translator')->get('modules.order.qty'); ?>
                        </th>
                        <th scope="col"
                            class="p-2 text-xs font-medium text-right text-gray-500 uppercase dark:text-gray-400">
                            <?php echo app('translator')->get('modules.order.price'); ?>
                        </th>
                        <th scope="col"
                            class="p-2 text-xs font-medium text-right text-gray-500 uppercase dark:text-gray-400">
                            <?php echo app('translator')->get('modules.order.amount'); ?>
                        </th>
                        <?php if(user_can('Delete Order') && $orderDetail->status !== 'paid'): ?>
                        <th scope="col"
                            class="p-2 text-xs font-medium text-right text-gray-500 uppercase dark:text-gray-400">
                            <?php echo app('translator')->get('app.action'); ?>
                        </th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700" wire:key="menu-item-list">

                    <?php $__empty_1 = true; $__currentLoopData = $orderDetail->items->load('modifierOptions'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        if ($orderTypeId) {
                            $item->menuItem->setPriceContext($orderTypeId, $selectedDeliveryApp);
                            if ($item->menuItemVariation) {
                                $item->menuItemVariation->setPriceContext($orderTypeId, $selectedDeliveryApp);
                            }
                            foreach ($item->modifierOptions as $modifier) {
                                $modifier->setPriceContext($orderTypeId, $selectedDeliveryApp);
                            }
                        }
                        
                        // Get prices with context applied
                        $baseItemPrice = $item->menuItemVariation 
                            ? $item->menuItemVariation->price 
                            : $item->menuItem->price;
                        $modifierTotal = $item->modifierOptions->sum('pivot.modifier_option_price');
                        $displayPrice = $baseItemPrice + $modifierTotal;
                    ?>
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" wire:key='menu-item-<?php echo e($key); ?>' wire:loading.class.delay='opacity-10'>
                        <td class="flex flex-col p-2 mr-12 lg:min-w-28">
                            <div class="inline-flex items-center text-xs text-gray-900 dark:text-white">
                                <?php echo e($item->menuItem->item_name); ?>

                            </div>
                            <?php if(isset($item->menuItemVariation)): ?>
                            <div class="inline-flex items-center text-xs text-gray-600 dark:text-white">
                                <?php echo e($item->menuItemVariation->variation); ?>

                            </div>
                            <?php endif; ?>
                            <?php if($item->modifierOptions->isNotEmpty()): ?>
                                <div class="mt-1 text-xs text-gray-600 dark:text-white">
                                    <?php $__currentLoopData = $item->modifierOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="flex items-center justify-between text-xs mb-1 py-0.5 px-1 border-l-2 border-blue-500 bg-gray-200 dark:bg-gray-900 rounded-md">
                                            <span class="text-gray-900 dark:text-white"><?php echo e($modifier->name ?? $modifier->pivot->modifier_option_name); ?></span>
                                            <span class="text-gray-600 dark:text-gray-300"><?php echo e(currency_format($modifier->pivot->modifier_option_price ?? $modifier->price, restaurant()->currency_id)); ?></span>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="p-2 text-base text-center text-gray-900 dark:text-gray-200 whitespace-nowrap">
                            <?php echo e($item->quantity); ?>

                        </td>
                        <td class="p-2 text-xs font-medium text-right text-gray-700 whitespace-nowrap dark:text-white">
                            <?php echo e(currency_format($displayPrice, restaurant()->currency_id)); ?>

                        </td>
                        <td class="p-2 text-xs font-medium text-right text-gray-900 whitespace-nowrap dark:text-white">
                            <?php echo e(currency_format($item->amount, restaurant()->currency_id)); ?>

                        </td>
                        <?php if(user_can('Delete Order') && $orderDetail->status !== 'paid'): ?>
                        <td class="p-2 text-right whitespace-nowrap">
                            <button class="p-2 text-gray-800 border rounded dark:text-gray-400 dark:border-gray-500 hover:bg-gray-200 dark:hover:bg-gray-900/20" wire:click="deleteOrderItems('<?php echo e($item->id); ?>')">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 0 0-.894.553L7.382 4H4a1 1 0 0 0 0 2v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V6a1 1 0 1 0 0-2h-3.382l-.724-1.447A1 1 0 0 0 11 2zM7 8a1 1 0 0 1 2 0v6a1 1 0 1 1-2 0zm5-1a1 1 0 0 0-1 1v6a1 1 0 1 0 2 0V8a1 1 0 0 0-1-1" clip-rule="evenodd"/></svg>
                            </button>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                        <td class="p-2 space-x-6 text-gray-800 dark:text-gray-200" colspan="5">
                            <?php echo app('translator')->get('messages.noItemAdded'); ?>
                        </td>
                    </tr>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>

        <div>
            <div class="w-full h-auto p-4 mt-3 space-y-4 text-center rounded select-none bg-gray-50 dark:bg-gray-700">
                <div class="flex justify-between text-sm text-gray-500 dark:text-neutral-400">
                    <div>
                        <?php echo app('translator')->get('modules.order.totalItem'); ?>
                    </div>
                    <div>
                        <?php echo e(count($orderDetail->items)); ?>

                    </div>
                </div>
                <div class="flex justify-between text-sm text-gray-500 dark:text-neutral-400">
                    <div>
                        <?php echo app('translator')->get('modules.order.subTotal'); ?>
                    </div>
                    <div>
                        <?php echo e(currency_format($orderDetail->sub_total, restaurant()->currency_id)); ?>

                    </div>
                </div>

                <?php if(!is_null($orderDetail->discount_amount)): ?>
                <div wire:key="discountAmount" class="flex justify-between text-sm text-green-500 dark:text-green-400">
                    <div>
                        <?php echo app('translator')->get('modules.order.discount'); ?> <?php if($orderDetail->discount_type == 'percent'): ?> (<?php echo e(rtrim(rtrim($orderDetail->discount_value), '.')); ?>%) <?php endif; ?>
                    </div>
                    <div>
                        -<?php echo e(currency_format($orderDetail->discount_amount, restaurant()->currency_id)); ?>

                    </div>
                </div>
                <?php endif; ?>

                <?php $__currentLoopData = $extraCharges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $charge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                    <div class="inline-flex items-center gap-x-1"><?php echo e($charge->charge_name); ?>

                        <?php if($charge->charge_type == 'percent'): ?>
                            (<?php echo e($charge->charge_value); ?>%)
                        <?php endif; ?>
                        <?php if($orderDetail->status !== 'paid' && user_can('Update Order')): ?>
                        <span class="text-red-500 cursor-pointer hover:scale-110 active:scale-100"
                            wire:click="removeExtraCharge('<?php echo e($charge->id); ?>', '<?php echo e($orderType); ?>')">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div>
                        <?php echo e(currency_format($charge->getAmount($subTotal - ($discountAmount ?? 0)), restaurant()->currency_id)); ?>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if($orderDetail->tip_amount > 0): ?>
                <div class="flex justify-between text-sm text-gray-500 dark:text-neutral-400">
                    <div>
                        <?php echo app('translator')->get('modules.order.tip'); ?>
                    </div>
                    <div>
                        <?php echo e(currency_format($orderDetail->tip_amount, restaurant()->currency_id)); ?>

                    </div>
                </div>
                <?php endif; ?>

                <?php if($orderType === 'delivery' && !is_null($deliveryFee)): ?>
                    <div class="flex justify-between text-sm text-gray-500 dark:text-neutral-400">
                        <div>
                            <?php echo app('translator')->get('modules.delivery.deliveryFee'); ?>
                        </div>
                        <div>
                            <?php if($deliveryFee > 0): ?>
                                <?php echo e(currency_format($deliveryFee, restaurant()->currency_id)); ?>

                            <?php else: ?>
                                <span class="font-medium text-green-500"><?php echo app('translator')->get('modules.delivery.freeDelivery'); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($taxMode == 'order'): ?>
                    <?php $__currentLoopData = $orderDetail->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex justify-between text-sm text-gray-500 dark:text-neutral-400">
                            <div>
                                <?php echo e($item->tax->tax_name); ?> (<?php echo e($item->tax->tax_percent); ?>%)
                            </div>
                            <div>
                                <?php echo e(currency_format(($item->tax->tax_percent / 100) * ($orderDetail->sub_total - ($orderDetail->discount_amount ?? 0)), restaurant()->currency_id)); ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <?php
                    // Show item-wise tax breakdown using actual order items data
                    $taxTotals = [];
                    foreach ($orderItemTaxDetails as $item) {
                        $qty = $item['qty'] ?? 1;
                        if (!empty($item['tax_breakup'])) {
                            foreach ($item['tax_breakup'] as $taxName => $taxInfo) {
                                if (!isset($taxTotals[$taxName])) {
                                    $taxTotals[$taxName] = [
                                        'percent' => $taxInfo['percent'],
                                        'amount' => 0
                                    ];
                                }
                                $taxTotals[$taxName]['amount'] += $taxInfo['amount'] * $qty;
                            }
                        }
                    }
                ?>
                <?php $__currentLoopData = $taxTotals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxName => $taxInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex justify-between text-gray-500 text-xs dark:text-neutral-400">
                        <div>
                            <?php echo e($taxName); ?> (<?php echo e($taxInfo['percent']); ?>%)
                        </div>
                        <div>
                            <?php echo e(currency_format($taxInfo['amount'], restaurant()->currency_id)); ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="flex justify-between text-gray-500 text-sm dark:text-neutral-400">
                    <div>
                        <?php echo app('translator')->get('modules.order.totalTax'); ?>
                        <?php if($taxMode === 'item'): ?>
                            <span
                                class="ml-2 px-2 py-0.5 rounded text-xs bg-gray-100 dark:bg-gray-600 text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get(restaurant()->tax_inclusive ? 'modules.settings.taxInclusive' : 'modules.settings.taxExclusive'); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div>
                        <?php echo e(currency_format($totalTaxAmount, restaurant()->currency_id)); ?>

                    </div>
                </div>
                <?php endif; ?>

                <div class="flex justify-between font-medium dark:text-neutral-300">
                    <div>
                        <?php echo app('translator')->get('modules.order.total'); ?>
                    </div>
                    <div>
                        <?php echo e(currency_format($orderDetail->total, restaurant()->currency_id)); ?>

                    </div>
                </div>
            </div>

            <div class="w-full h-auto pt-3 pb-4 text-center select-none">
                <div class="flex gap-2">

                    <?php if($orderDetail->status == 'billed' && user_can('Update Order')): ?>
                    <button class="w-full p-2 text-white bg-green-600 rounded" wire:click='showPayment(<?php echo e($orderDetail->id); ?>)'>
                        <?php echo app('translator')->get('modules.order.addPayment'); ?>
                    </button>
                    <?php endif; ?>

                    <?php if($orderDetail->status == 'paid'): ?>
                    <button class="inline-flex items-center justify-center w-full p-2 mt-2 text-gray-800 border border-gray-300 rounded dark:border-gray-600 dark:text-gray-200 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 gap-x-1"
                        wire:click="printOrder(<?php echo e($orderDetail->id); ?>)" type="button">
                        <svg class="w-6 h-6 text-current" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z"/>
                        </svg>
                        <?php echo app('translator')->get('app.print'); ?>
                    </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>
    <?php if (isset($component)) { $__componentOriginal5b8b2d0f151a30be878e1a760ec3900c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.confirmation-modal','data' => ['wire:model' => 'confirmDeleteModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('confirmation-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'confirmDeleteModal']); ?>
         <?php $__env->slot('title', null, []); ?> 
            <div class="flex items-center gap-4">

                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.order.cancelOrder'); ?></h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">This action cannot be undone</p>
                </div>
            </div>
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('content', null, []); ?> 
            <div class="space-y-6">
                <!-- Warning Message -->
                <div class="p-4 border bg-amber-50 dark:bg-amber-900/20 border-amber-200 dark:border-amber-800 rounded-xl">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-amber-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-amber-800 dark:text-amber-200"><?php echo app('translator')->get('modules.order.cancelOrderMessage'); ?></p>
                            <p class="mt-1 text-sm text-amber-700 dark:text-amber-300">Please select a reason for cancellation</p>
                        </div>
                    </div>
                </div>

                <!-- Reason Selection -->
                 <div>
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'cancelReason','value' => ''.e(__('modules.settings.selectCancelReason')).'','class' => 'text-sm font-medium text-gray-700 dark:text-gray-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'cancelReason','value' => ''.e(__('modules.settings.selectCancelReason')).'','class' => 'text-sm font-medium text-gray-700 dark:text-gray-200']); ?>
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
                <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['id' => 'cancelReason','class' => 'block w-full mt-2','wire:model' => 'cancelReason']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'cancelReason','class' => 'block w-full mt-2','wire:model' => 'cancelReason']); ?>
                    <option value=""><?php echo e(__('modules.settings.selectCancelReason')); ?></option>
                    <?php $__currentLoopData = $cancelReasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($reason->id); ?>"><?php echo e($reason->reason); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'cancelReason','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'cancelReason','class' => 'mt-2']); ?>
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

                <!-- Custom Reason Textarea -->
                <textarea
                    wire:model.defer="cancelReasonText"
                    id="cancelReasonText"
                    rows="4"
                    class="block w-full px-4 py-3 transition-all duration-200 border-2 border-gray-300 shadow-sm resize-none dark:border-gray-600 rounded-xl focus:ring-2 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                    placeholder="<?php echo app('translator')->get('modules.settings.enterCancelReason'); ?>"
                ></textarea>
            </div>
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('footer', null, []); ?> 
            <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => '$set(\'confirmDeleteModal\', false)','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$set(\'confirmDeleteModal\', false)','wire:loading.attr' => 'disabled']); ?>
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

            <?php if (isset($component)) { $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-button','data' => ['class' => 'ml-3','wire:click' => 'cancelOrder','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('danger-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-3','wire:click' => 'cancelOrder','wire:loading.attr' => 'disabled']); ?>
                <?php echo app('translator')->get('modules.order.cancelOrder'); ?>
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
                        <p><?php echo app('translator')->get('modules.order.currentTable'); ?>: <strong><?php echo e($orderDetail->table->table_code ?? '--'); ?></strong></p>
                        <?php if($pendingTable): ?>
                            <p><?php echo app('translator')->get('modules.order.changeTo'); ?>: <strong><?php echo e($pendingTable->table_code); ?></strong></p>
                        <?php endif; ?>
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

</div>

<?php /**PATH C:\xampp\htdocs\script\resources\views\pos\order_detail.blade.php ENDPATH**/ ?>