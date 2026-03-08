<div class="px-4 space-y-6" <?php if(pusherSettings()->is_enabled_pusher_broadcast): ?> wire:poll.10s <?php endif; ?>>

    <h2 class="text-xl font-bold dark:text-white inline-flex gap-2 items-center text-green-600">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-patch-check text-green-600" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
            <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z"/>
        </svg>

        <?php echo app('translator')->get('messages.orderPlacedSuccess'); ?>
    </h2>


    <div >
        <div class="flex items-end justify-between cursor-pointer mb-4">
            <div class="flex items-center min-w-0">
                <div class="space-y-2">
                    <p class="font-medium text-gray-900 truncate dark:text-white flex gap-2 ">

                            <?php echo e($order->show_formatted_order_number); ?>



                        <?php if($order->status == 'kot'): ?>
                            <span class="bg-yellow-100 text-yellow-800 dark:bg-yellow-700 dark:text-yellow-400 border border-yellow-400 text-xs font-medium px-2 py-1 rounded uppercase tracking-wide whitespace-nowrap">
                                <?php echo app('translator')->get('modules.order.infokot'); ?>
                            </span>
                        <?php endif; ?>
                    </p>
                    <div class="flex items-center flex-1 text-xs text-gray-500">
                        <?php echo e($order->items->count()); ?> <?php echo app('translator')->get('modules.menu.item'); ?> | <?php echo e($order->date_time->timezone(timezone())->translatedFormat('M d, Y h:i A')); ?>

                    </div>

                    <?php
                        $maxPreparationTime = $order->items->max(function($item) {
                            return $item->menuItem->preparation_time;
                        });
                    ?>

                    <?php if($maxPreparationTime): ?>
                        <div class="text-xs font-normal text-gray-500 dark:text-gray-400 max-w-56 items-center inline-flex my-1">
                            <?php echo app('translator')->get('modules.menu.preparationTime'); ?> :
                            <?php echo e($maxPreparationTime); ?> <?php echo app('translator')->get('modules.menu.minutes'); ?> (<?php echo app('translator')->get('app.approx'); ?>)
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="inline-flex flex-col text-right text-base font-semibold text-gray-900 dark:text-white">
                <div><?php echo e(currency_format($order->total, $restaurant->currency_id)); ?></div>
                <div class="text-xs text-gray-500 font-light"><?php echo app('translator')->get('modules.order.includeTax'); ?></div>
            </div>
        </div>

        <div
            class="w-full divide-y divide-gray-200 overflow-hidden rounded-lg border border-gray-200 dark:divide-gray-700 dark:border-gray-700">
            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="space-y-4 p-3">
                <div class="flex justify-between items-center gap-4">
                    <div class="flex gap-4 items-center">
                        <a class="shrink-0">
                            <img class="w-12 h-12 rounded-md object-cover shadow-sm" src="<?php echo e($item->menuItem->item_photo_url); ?>"
                                alt="<?php echo e($item->menuItem->item_name); ?>" />
                        </a>

                        <a class="min-w-0 flex flex-col font-medium text-gray-900  dark:text-white">
                            <div class="text-gray-900 dark:text-white inline-flex items-center">
                                <?php echo e($item->menuItem->item_name); ?>

                            </div>
                            <div class="text-xs text-gray-600 dark:text-white inline-flex items-center">
                                <?php echo e((isset($item->menuItemVariation) ? $item->menuItemVariation->variation : '')); ?>

                            </div>
                            <?php if($item->modifierOptions->isNotEmpty()): ?>
                            <div class="text-xs text-gray-600 dark:text-white">
                                <?php $__currentLoopData = $item->modifierOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex items-center justify-between text-xs mb-1 py-0.5 px-1 border-l-2 border-blue-500 bg-gray-200 dark:bg-gray-800 rounded-md">
                                    <span class="text-gray-900 dark:text-white"><?php echo e($modifier->name); ?></span>
                                    <span class="text-gray-600 dark:text-gray-300"><?php echo e(currency_format($modifier->price, $restaurant->currency_id)); ?></span>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php endif; ?>
                            <?php if($item->menuItem->preparation_time): ?>
                                <div class="text-xs font-normal text-gray-500 dark:text-gray-400 max-w-56 items-center inline-flex my-1">
                                    <?php echo app('translator')->get('modules.menu.preparationTime'); ?> :
                                    <?php echo e($item->menuItem->preparation_time); ?> <?php echo app('translator')->get('modules.menu.minutes'); ?>
                                </div>
                            <?php endif; ?>
                        </a>
                    </div>

                    <div class="flex items-center justify-end gap-4">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">x<?php echo e($item->quantity); ?></p>

                        <div class="flex flex-col items-end gap-1">
                            <?php if($taxMode === 'item' && $restaurant?->tax_inclusive && $item->tax_amount > 0): ?>
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    <?php echo e(currency_format(($item->price + $item->modifierOptions->sum('price')) - ($item->tax_amount / $item->quantity), $restaurant->currency_id)); ?> + tax
                                </div>
                            <?php endif; ?>
                            <p class="text-lg font-medium leading-tight text-gray-900 dark:text-white">
                                <?php echo e(currency_format($item->price + $item->modifierOptions->sum('price'), $restaurant->currency_id)); ?>

                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="space-y-4 bg-gray-50 p-3 dark:bg-gray-800">
                <div class="space-y-2">
                    <dl class="flex items-center justify-between gap-4">
                        <dt class="font-normal text-gray-500 dark:text-gray-400"> <?php echo app('translator')->get('modules.order.subTotal'); ?></dt>
                        <dd class="font-medium text-gray-900 dark:text-white"><?php echo e(currency_format($order->sub_total, $restaurant->currency_id)); ?></dd>
                    </dl>

                    <?php if($order->discount_amount): ?>
                        <dl class="flex items-center justify-between gap-4 text-sm text-gray-500 dark:text-gray-400">
                            <dt class="font-normal"><?php echo app('translator')->get('modules.order.discount'); ?></dt>
                            <dd class="font-medium text-gray-900 dark:text-white">-<?php echo e(currency_format($order->discount_amount, $restaurant->currency_id)); ?></dd>
                        </dl>
                    <?php endif; ?>
                    <?php $__currentLoopData = $order->charges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex justify-between text-gray-500 text-sm dark:text-gray-400">
                        <div class="inline-flex items-center gap-x-1">
                            <?php echo e($item->charge->charge_name); ?>

                            <?php if($item->charge->charge_type == 'percent'): ?>
                                (<?php echo e($item->charge->charge_value); ?>%)
                            <?php endif; ?>
                        </div>
                        <div>
                            <?php echo e(currency_format(($item->charge->getAmount($order->sub_total - ($order->discount_amount ?? 0))), $restaurant->currency_id)); ?>

                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = $order->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <dl class="flex items-center justify-between gap-4 text-sm text-gray-500 dark:text-gray-400">
                        <dt class="font-normal"><?php echo e($item->tax->tax_name); ?> (<?php echo e($item->tax->tax_percent); ?>%)</dt>
                        <dd class="text-sm font-medium "><?php echo e(currency_format(($item->tax->tax_percent / 100) * $order->sub_total, $restaurant->currency_id)); ?></dd>
                    </dl>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if($order->tip_amount > 0): ?>
                        <dl class="flex items-center justify-between gap-4 text-sm text-gray-500 dark:text-gray-400">
                            <dt class="font-normal"><?php echo app('translator')->get('modules.order.tip'); ?></dt>
                            <dd class="font-medium text-gray-900 dark:text-white"><?php echo e(currency_format($order->tip_amount, $restaurant->currency_id)); ?></dd>
                        </dl>
                    <?php endif; ?>
                </div>

                <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                    <dt class="text-lg font-bold text-gray-900 dark:text-white"><?php echo app('translator')->get('modules.order.total'); ?></dt>
                    <dd class="text-lg font-bold text-gray-900 dark:text-white"><?php echo e(currency_format($order->total, $restaurant->currency_id)); ?></dd>
                </dl>
            </div>

        </div>
    </div>

    <div class="flex">
        <?php if($order->status == 'paid'): ?>

            <?php if($order->table_id): ?>
                <?php
                    $newOrderLink = route('table_order', [$order->table->hash]);
                ?>
            <?php else: ?>
                <?php
                    $newOrderLink = module_enabled('Subdomain')?url('/'):route('shop_restaurant',['hash' => $restaurant->hash]);
                ?>
            <?php endif; ?>
        <?php else: ?>
            <?php
                $newOrderLink = module_enabled('Subdomain')?url('/'):route('shop_restaurant',['hash' => $restaurant->hash]).'?current_order='.$order->id;
            ?>
        <?php endif; ?>



        <?php if (isset($component)) { $__componentOriginalecbfaf65020c31547e71f42b3a8afb5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-link','data' => ['wire:navigate' => true,'class' => 'inline-flex items-center mb-2','href' => ''.e($newOrderLink).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:navigate' => true,'class' => 'inline-flex items-center mb-2','href' => ''.e($newOrderLink).'']); ?>
            <?php echo app('translator')->get('modules.order.newOrder'); ?>
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f)): ?>
<?php $attributes = $__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f; ?>
<?php unset($__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalecbfaf65020c31547e71f42b3a8afb5f)): ?>
<?php $component = $__componentOriginalecbfaf65020c31547e71f42b3a8afb5f; ?>
<?php unset($__componentOriginalecbfaf65020c31547e71f42b3a8afb5f); ?>
<?php endif; ?>

    </div>


</div>


<?php $__env->startPush('scripts'); ?>

    <?php if(pusherSettings()->is_enabled_pusher_broadcast): ?>
        <script>

            document.addEventListener('DOMContentLoaded', function () {

                const channel = PUSHER.subscribe('order-success');
                channel.bind('order-success.created', function(data) {
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').call('refreshOrderSuccess');
                    new Audio("<?php echo e(asset('sound/new_order.wav')); ?>").play();
                    console.log('✅ Pusher received data for order success!. Refreshing...');
                });
                PUSHER.connection.bind('connected', () => {
                    console.log('✅ Pusher connected for Order Success!');
                });
                channel.bind('pusher:subscription_succeeded', () => {
                    console.log('✅ Subscribed to order-success channel!');
                });
            });
        </script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\shop\order-success.blade.php ENDPATH**/ ?>