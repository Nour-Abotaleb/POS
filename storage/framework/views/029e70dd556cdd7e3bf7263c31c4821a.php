<?php $__env->startComponent('mail::layout'); ?>

<?php $__env->slot('header'); ?>
<?php $__env->startComponent('mail::header', ['url' => route('shop_restaurant', ['hash' => $settings->hash])]); ?>
<?php echo e($settings->name); ?>

<?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>

## <?php echo e(__('email.sendOrderBill.dear')); ?> <?php echo e($order->customer->name); ?>,

<?php echo e(__('email.sendOrderBill.thankYouForDining')); ?> **<?php echo e($settings->name); ?>**! <?php echo e(__('email.sendOrderBill.excitedToServe')); ?>


## <?php echo e(__('email.sendOrderBill.orderSummary')); ?>


**<?php echo e(__('email.sendOrderBill.order')); ?>**: #<?php echo e($order->show_formatted_order_number); ?>


**<?php echo e(__('email.sendOrderBill.orderType')); ?>**: <?php echo e(ucwords(str_replace('_', ' ', $order->order_type))); ?>

<?php $__env->startComponent('mail::table'); ?>
| <?php echo e(__('modules.menu.itemName')); ?>           | <?php echo e(__('modules.order.qty')); ?>      | <?php echo e(__('modules.order.price')); ?>     |
|:-------------- |:-------------:| ---------:|
<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
| **<?php echo e($item->menuItem->item_name); ?>** <?php if($item->modifierOptions->isNotEmpty()): ?> <?php $__currentLoopData = $item->modifierOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <br> &nbsp;• <?php echo e($modifier->name); ?> <?php if($modifier->price > 0): ?> (+<?php echo e(currency_format($modifier->price, $settings->currency_id)); ?>) <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?> <?php if($item->note): ?> <br> <em><?php echo e(__('modules.order.note')); ?>: <?php echo e($item->note); ?></em> <?php endif; ?> | <?php echo e($item->quantity); ?> | <?php echo e(currency_format(($item->price + $item->modifierOptions->sum('price')) * $item->quantity, $settings->currency_id)); ?> |
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
| **<?php echo e(__('modules.order.subTotal')); ?>**   |               | **<?php echo e(currency_format($subtotal, $settings->currency_id)); ?>** |
<?php if(!is_null($order->discount_amount)): ?>
| **<?php echo e(__('modules.order.discount')); ?>** <?php if($order->discount_type == 'percent'): ?> **(<?php echo e(rtrim(rtrim($order->discount_value, '0'), '.')); ?>%)** <?php endif; ?> |     | **-<?php echo e(currency_format($order->discount_amount, $settings->currency_id)); ?>** |
<?php endif; ?>
<?php if($order->tip_amount > 0): ?>
| **<?php echo e(__('modules.order.tip')); ?>** |     | **<?php echo e(currency_format($order->tip_amount, $settings->currency_id)); ?>** |
<?php endif; ?>
<?php if($order->order_type === 'delivery'): ?>
| **<?php echo e(__('modules.order.deliveryFee')); ?>** |     | <?php if($order->delivery_fee > 0): ?> **<?php echo e(currency_format($order->delivery_fee, $settings->currency_id)); ?>** <?php else: ?> **<span style="color: #10B981"><?php echo e(__('modules.delivery.freeDelivery')); ?></span>** <?php endif; ?> |
<?php endif; ?>
<?php $__currentLoopData = $chargesWithAmount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $charge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
| **<?php echo e($charge['name']); ?>** <?php if($charge['type'] == 'percent'): ?> **(<?php echo e(rtrim(rtrim($charge['rate'], '0'), '.')); ?>%)** <?php endif; ?> |     | **<?php echo e(currency_format($charge['amount'], $settings->currency_id)); ?>** |
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if($taxMode == 'order'): ?>
<?php $__currentLoopData = $taxesWithAmount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
| **<?php echo e($tax['name']); ?> (<?php echo e($tax['rate']); ?>%)** |     | **<?php echo e(currency_format($tax['amount'], $settings->currency_id)); ?>** |
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<?php
    $taxTotals = [];
    $totalTax = 0;
    foreach ($items as $item) {
        $qty = $item->quantity ?? 1;
        $taxBreakdown = is_array($item->tax_breakup) ? $item->tax_breakup : (json_decode($item->tax_breakup, true) ?? []);
        foreach ($taxBreakdown as $taxName => $taxInfo) {
            if (!isset($taxTotals[$taxName])) {
                $taxTotals[$taxName] = [
                    'percent' => $taxInfo['percent'] ?? 0,
                    'amount' => ($taxInfo['amount'] ?? 0) * $qty
                ];
            } else {
                $taxTotals[$taxName]['amount'] += ($taxInfo['amount'] ?? 0) * $qty;
            }
        }
        $totalTax += $item->tax_amount ?? 0;
    }
?>
<?php $__currentLoopData = $taxTotals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxName => $taxInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
| <?php echo e($taxName); ?> (<?php echo e($taxInfo['percent']); ?>%) |     | <?php echo e(currency_format($taxInfo['amount'], $settings->currency_id)); ?> |
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
| **<?php echo e(__('modules.order.totalTax')); ?>** |     | **<?php echo e(currency_format($totalTax, $settings->currency_id)); ?>** |
<?php endif; ?>
| **<?php echo e(__('modules.order.total')); ?>**      |               | **<?php echo e(currency_format($totalPrice, $settings->currency_id)); ?>** |
<?php echo $__env->renderComponent(); ?>

**<?php echo e(__('app.date')); ?>**: <?php echo e($order->date_time->timezone($settings->timezone)->translatedFormat('F j, Y, g:i a')); ?>


<?php echo e(__('email.sendOrderBill.satisfactionMessage')); ?>


<?php $__env->startComponent('mail::button', ['url' => route('orders.pdf', $order->id)]); ?>
<?php echo e(__('email.sendOrderBill.downloadReceipt')); ?>

<?php echo $__env->renderComponent(); ?>

<?php echo app('translator')->get('app.regards'); ?>,<br>
<?php echo e($settings->name); ?>



<?php $__env->slot('footer'); ?>
<?php $__env->startComponent('mail::footer'); ?>
    © <?php echo e(date('Y')); ?> <?php echo e($settings->name); ?>. <?php echo app('translator')->get('app.allRightsReserved'); ?>
<?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\xampp\htdocs\script\resources\views\emails\order-bill.blade.php ENDPATH**/ ?>