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
                                    <?php echo app('translator')->get('modules.order.amount'); ?>
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium ltr:text-left rtl:text-right text-gray-500 uppercase dark:text-gray-400">
                                    <?php echo app('translator')->get('modules.order.paymentMethod'); ?>
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium ltr:text-left rtl:text-right text-gray-500 uppercase dark:text-gray-400">
                                    <?php echo app('translator')->get('modules.order.orderNumber'); ?>
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium ltr:text-left rtl:text-right text-gray-500 uppercase dark:text-gray-400">
                                    <?php echo app('translator')->get('app.dateTime'); ?>
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium ltr:text-left rtl:text-right text-gray-500 uppercase dark:text-gray-400">
                                    <?php echo app('translator')->get('app.action'); ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700" wire:key='customer-list-<?php echo e(microtime()); ?>'>

                            <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" wire:key='customer-<?php echo e($item->id . rand(1111, 9999) . microtime()); ?>' wire:loading.class.delay='opacity-10'>
                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo e(currency_format($item->amount, restaurant()->currency_id)); ?>

                                </td>
                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white"">
                                    <?php echo app('translator')->get('modules.order.due'); ?>
                                </td>

                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="javascript:;" class="underline underline-offset-2 decoration-dotted" wire:click="$dispatch('showOrderDetail', { id: <?php echo e($item->order->id); ?> })">
                                        <?php echo e($item->order->show_formatted_order_number); ?>

                                    </a>
                                </td>
                                <td class="py-2.5 px-4 text-sm text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo e($item->created_at->timezone(timezone())->translatedFormat('d M Y, h:i A')); ?>

                                </td>
                                <td class="py-2.5 px-4 space-x-2 whitespace-nowrap text-right">
                                    <?php if (isset($component)) { $__componentOriginal23a929514ef7d57034cc7b8bddc2b226 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a929514ef7d57034cc7b8bddc2b226 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button-table','data' => ['wire:click' => 'showPayment('.e($item->order_id).')','wire:key' => 'edit-cat-button-'.e($item->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'showPayment('.e($item->order_id).')','wire:key' => 'edit-cat-button-'.e($item->id).'']); ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 mr-1" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                          </svg>
                                        <?php echo app('translator')->get('modules.order.addPayment'); ?>
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

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="py-2.5 px-4 space-x-6 dark:text-white" colspan="5">
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
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\payments\due-payments-table.blade.php ENDPATH**/ ?>