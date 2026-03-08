<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e(isRtl() ? 'rtl' : 'ltr'); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(restaurant()->name); ?> - <?php echo e($order->show_formatted_order_number); ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        [dir="rtl"] {
            text-align: right;
        }

        [dir="ltr"] {
            text-align: left;
        }

        body {
            font-size: 12px;
            line-height: 1.4;
            color: #333;
        }

        .receipt {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 15px;
        }

        .restaurant-logo {
            width: 60px;
            height: 60px;
            margin: 0 auto 10px;
            display: block;
        }

        .restaurant-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .restaurant-info {
            font-size: 12px;
            margin-bottom: 3px;
            color: #666;
        }

        .order-info {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }

        .order-info h3 {
            margin-bottom: 10px;
            color: #333;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        .info-grid {
            width: 100%;
            margin-bottom: 10px;
        }

        .info-item {
            margin-bottom: 8px;
            line-height: 1.6;
        }

        .info-label {
            font-weight: bold;
            color: #555;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 11px;
        }

        .items-table th {
            background-color: #f5f5f5;
            padding: 10px;
            border: 1px solid #ddd;
            font-weight: bold;
            text-align: left;
        }

        .items-table td {
            padding: 8px 10px;
            border: 1px solid #ddd;
            vertical-align: top;
        }

        .qty {
            width: 8%;
            text-align: center;
        }

        .description {
            width: 50%;
        }

        .price {
            width: 20%;
            text-align: right;
        }

        .amount {
            width: 22%;
            text-align: right;
        }

        .modifiers {
            font-size: 10px;
            color: #666;
            margin-top: 3px;
        }

        .summary {
            border: 1px solid #ddd;
            padding: 15px;
            background-color: #f9f9f9;
            text-align: right;
        }

        .summary-row {
            width: 100%;
            margin-bottom: 8px;
            padding: 3px 0;
        }
        .summary-row table {
            width: 100%;
            border-collapse: collapse;
        }
        .summary-row td:first-child {
            text-align: left;
        }
        .summary-row td:last-child {
            text-align: right;
        }

        .summary-row.secondary {
            font-size: 10px;
            color: #666;
            margin-bottom: 3px;
            padding-left: 20px;
        }

        .total {
            font-weight: bold;
            font-size: 16px;
            border-top: 2px solid #333;
            padding-top: 10px;
            margin-top: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            font-size: 11px;
            color: #666;
        }

        .qr_code {
            margin: 15px 0;
            text-align: center;
        }

        .qr_code img {
            max-width: 150px;
            height: auto;
        }

        .payment-details {
            margin-top: 15px;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }

        .payment-details h4 {
            margin-bottom: 10px;
            color: #333;
        }

        @media print {
            body {
                font-size: 11px;
            }

            .receipt {
                max-width: none;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="receipt">
        <div class="header">
            <?php if($receiptSettings->show_restaurant_logo): ?>
                <img src="<?php echo e(restaurant()->logo_url); ?>" alt="<?php echo e(restaurant()->name); ?>" class="restaurant-logo">
            <?php endif; ?>
            <div class="restaurant-name"><?php echo e(restaurant()->name); ?></div>
            <div class="restaurant-info"><?php echo e(branch()->address); ?></div>
            <div class="restaurant-info"><?php echo app('translator')->get('modules.customer.phone'); ?>: <?php echo e(restaurant()->phone_number); ?></div>
            <?php if($receiptSettings->show_tax): ?>
                <?php $__currentLoopData = $taxDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="restaurant-info"><?php echo e($taxDetail->tax_name); ?>: <?php echo e($taxDetail->tax_id); ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

        <div class="order-info">
            <h3><?php echo app('translator')->get('modules.settings.orderDetails'); ?></h3>
            <div class="info-grid">
                <div class="info-item">

                    <span>
                        <?php if(!isOrderPrefixEnabled()): ?>
                            <span class="info-label"><?php echo app('translator')->get('modules.order.orderNumber'); ?>:</span>
                            <span>#<?php echo e($order->order_number); ?></span>
                        <?php else: ?>
                            <?php echo e($order->formatted_order_number); ?>

                        <?php endif; ?>
                    </span>
                </div>
                <?php
                    $tokenNumber = $order->kot->whereNotNull('token_number')->first()?->token_number;
                ?>
                <?php if($tokenNumber): ?>
                    <div class="info-item">
                        <span class="info-label"><?php echo app('translator')->get('modules.order.tokenNumber'); ?>:</span>
                        <span><?php echo e($tokenNumber); ?></span>
                    </div>
                <?php endif; ?>
                <div class="info-item">
                    <span class="info-label"><?php echo app('translator')->get('app.dateTime'); ?>:</span>
                    <span><?php echo e($order->date_time->timezone(timezone())->translatedFormat('d M Y H:i')); ?></span>
                </div>
                <?php if($receiptSettings->show_table_number && $order->table && $order->table->table_code): ?>
                    <div class="info-item">
                        <span class="info-label"><?php echo app('translator')->get('modules.settings.tableNumber'); ?>:</span>
                        <span><?php echo e($order->table->table_code); ?></span>
                    </div>
                <?php endif; ?>
                <?php if($receiptSettings->show_total_guest && $order->number_of_pax): ?>
                    <div class="info-item">
                        <span class="info-label"><?php echo app('translator')->get('modules.order.noOfPax'); ?>:</span>
                        <span><?php echo e($order->number_of_pax); ?></span>
                    </div>
                <?php endif; ?>
                <?php if($receiptSettings->show_waiter && $order->waiter && $order->waiter->name): ?>
                    <div class="info-item">
                        <span class="info-label"><?php echo app('translator')->get('modules.order.waiter'); ?>:</span>
                        <span><?php echo e($order->waiter->name); ?></span>
                    </div>
                <?php endif; ?>
                <?php if($receiptSettings->show_customer_name && $order->customer && $order->customer->name): ?>
                    <div class="info-item">
                        <span class="info-label"><?php echo app('translator')->get('modules.customer.customer'); ?>:</span>
                        <span><?php echo e($order->customer->name); ?></span>
                    </div>
                <?php endif; ?>
                <?php if($receiptSettings->show_customer_address && $order->customer && $order->customer->delivery_address): ?>
                    <div class="info-item" style="grid-column: 1 / -1;">
                        <span class="info-label"><?php echo app('translator')->get('modules.customer.customerAddress'); ?>:</span>
                        <span><?php echo e($order->customer->delivery_address); ?></span>
                    </div>
                <?php endif; ?>
                <?php if($receiptSettings->show_customer_phone && $order->customer && $order->customer->phone): ?>
                    <div class="info-item">
                        <span class="info-label"><?php echo app('translator')->get('modules.customer.phone'); ?>:</span>
                        <span><?php echo e($order->customer->phone); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <table class="items-table">
            <thead>
                <tr>
                    <th class="qty"><?php echo app('translator')->get('modules.order.qty'); ?></th>
                    <th class="description"><?php echo app('translator')->get('modules.menu.itemName'); ?></th>
                    <th class="price"><?php echo app('translator')->get('modules.order.price'); ?> (<?php echo e(restaurant()->currency->currency_code); ?>)</th>
                    <th class="amount"><?php echo app('translator')->get('modules.order.amount'); ?> (<?php echo e(restaurant()->currency->currency_code); ?>)</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="qty"><?php echo e($item->quantity); ?></td>
                        <td class="description">
                            <strong><?php echo e($item->menuItem->item_name); ?></strong>
                            <?php if(isset($item->menuItemVariation)): ?>
                                <br><small>(<?php echo e($item->menuItemVariation->variation); ?>)</small>
                            <?php endif; ?>
                            <?php $__currentLoopData = $item->modifierOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="modifiers">• <?php echo e($modifier->name); ?>

                                    <?php if($modifier->price > 0): ?>
                                        (+<?php echo e(currency_format($modifier->price, restaurant()->currency_id, false, true)); ?>)
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($item->note): ?>
                                <div class="modifiers"><em><?php echo app('translator')->get('modules.order.note'); ?>: <?php echo e($item->note); ?></em></div>
                            <?php endif; ?>
                        </td>
                        <td class="price"><?php echo e(currency_format($item->price, restaurant()->currency_id, false, false)); ?></td>
                        <td class="amount"><?php echo e(currency_format($item->amount, restaurant()->currency_id, false, false)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="summary">
            <div class="summary-row">
                <table>
                    <tr>
                        <td><?php echo app('translator')->get('modules.order.subTotal'); ?>:</td>
                        <td><?php echo e(currency_format($order->sub_total, restaurant()->currency_id, false, true)); ?></td>
                    </tr>
                </table>
            </div>

            <?php if(!is_null($order->discount_amount)): ?>
                <div class="summary-row">
                    <table>
                        <tr>
                            <td><?php echo app('translator')->get('modules.order.discount'); ?>
                                <?php if($order->discount_type == 'percent'): ?>
                                    (<?php echo e(rtrim(rtrim($order->discount_value, '0'), '.')); ?>%)
                                <?php endif; ?>:
                            </td>
                            <td>-<?php echo e(currency_format($order->discount_amount, restaurant()->currency_id, false, true)); ?></td>
                        </tr>
                    </table>
                </div>
            <?php endif; ?>

            <?php $__currentLoopData = $order->charges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="summary-row">
                    <table>
                        <tr>
                            <td><?php echo e($item->charge->charge_name); ?>

                                <?php if($item->charge->charge_type == 'percent'): ?>
                                    (<?php echo e($item->charge->charge_value); ?>%)
                                <?php endif; ?>:
                            </td>
                            <td><?php echo e(currency_format(($item->charge->getAmount($order->sub_total - ($order->discount_amount ?? 0))), restaurant()->currency_id, true, true)); ?></td>
                        </tr>
                    </table>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($order->tip_amount > 0): ?>
                <div class="summary-row">
                    <table>
                        <tr>
                            <td><?php echo app('translator')->get('modules.order.tip'); ?>:</td>
                            <td><?php echo e(currency_format($order->tip_amount, restaurant()->currency_id, false, true)); ?></td>
                        </tr>
                    </table>
                </div>
            <?php endif; ?>

            <?php if($order->order_type === 'delivery' && !is_null($order->delivery_fee)): ?>
                <div class="summary-row">
                    <table>
                        <tr>
                            <td><?php echo app('translator')->get('modules.delivery.deliveryFee'); ?>:</td>
                            <td>
                                <?php if($order->delivery_fee > 0): ?>
                                    <?php echo e(currency_format($order->delivery_fee, restaurant()->currency_id, false, true)); ?>

                                <?php else: ?>
                                    <?php echo app('translator')->get('modules.delivery.freeDelivery'); ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            <?php endif; ?>

            <?php if($taxMode == 'order'): ?>
                <?php $__currentLoopData = $order->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="summary-row">
                        <table>
                            <tr>
                                <td><?php echo e($item->tax->tax_name); ?> (<?php echo e($item->tax->tax_percent); ?>%):</td>
                                <td><?php echo e(currency_format(($item->tax->tax_percent / 100) * ($order->sub_total - ($order->discount_amount ?? 0)), restaurant()->currency_id, false, true)); ?></td>
                            </tr>
                        </table>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <?php if($order->total_tax_amount > 0): ?>
                    <?php
                        $taxTotals = [];
                        $totalTax = 0;
                        foreach ($order->items as $item) {
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
                        <div class="summary-row secondary">
                            <table>
                                <tr>
                                    <td><?php echo e($taxName); ?> (<?php echo e($taxInfo['percent']); ?>%)</td>
                                    <td><?php echo e(currency_format($taxInfo['amount'], restaurant()->currency_id, false, true)); ?></td>
                                </tr>
                            </table>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="summary-row">
                        <table>
                            <tr>
                                <td><?php echo app('translator')->get('modules.order.totalTax'); ?>:</td>
                                <td><?php echo e(currency_format($totalTax, restaurant()->currency_id, false, true)); ?></td>
                            </tr>
                        </table>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if($payment): ?>
                <div class="summary-row">
                    <table>
                        <tr>
                            <td><?php echo app('translator')->get('modules.order.balanceReturn'); ?>:</td>
                            <td><?php echo e(currency_format($payment->balance, restaurant()->currency_id, false, true)); ?></td>
                        </tr>
                    </table>
                </div>
            <?php endif; ?>

            <div class="summary-row total">
                <table>
                    <tr>
                        <td><?php echo app('translator')->get('modules.order.total'); ?>:</td>
                        <td><?php echo e(currency_format($order->total, restaurant()->currency_id, false, true)); ?></td>
                    </tr>
                </table>
            </div>

            <?php if($receiptSettings->show_payment_status): ?>
                <div class="summary-row" style="margin-top: 10px; padding-top: 10px; border-top: 2px solid #333;">
                    <table>
                        <tr>
                            <td style="font-weight: bold; font-size: 14px;"><?php echo app('translator')->get('paymentStatus'); ?>:</td>
                            <td style="font-weight: bold; font-size: 14px;">
                                <?php if($order->status === 'paid'): ?>
                                    <span style="color: #10b981;"><?php echo app('translator')->get('modules.order.paid'); ?></span>
                                <?php else: ?>
                                    <span style="color: #ef4444;"><?php echo app('translator')->get('modules.order.unpaid'); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            <?php endif; ?>
        </div>

        <?php if($receiptSettings->show_payment_details && $order->payments->count()): ?>
            <div class="payment-details">
                <h4><?php echo app('translator')->get('modules.order.paymentDetails'); ?></h4>
                <table class="items-table">
                    <thead>
                        <tr>
                            <th class="qty"><?php echo app('translator')->get('modules.order.amount'); ?></th>
                            <th class="description"><?php echo app('translator')->get('modules.order.paymentMethod'); ?></th>
                            <th class="price"><?php echo app('translator')->get('app.dateTime'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $order->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="qty"><?php echo e(currency_format($payment->amount, restaurant()->currency_id, false, true)); ?></td>
                                <td class="description"><?php echo app('translator')->get('modules.order.' . $payment->payment_method); ?></td>
                                <td class="price">
                                    <?php if($payment->payment_method != 'due'): ?>
                                        <?php echo e($payment->created_at->timezone(timezone())->translatedFormat('d M Y H:i')); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <div class="footer">
            <p><?php echo app('translator')->get('messages.thankYouVisit'); ?></p>

            <?php if($order->status != 'paid' && $receiptSettings->show_payment_qr_code): ?>
                <div class="qr_code">
                    <p><?php echo app('translator')->get('modules.settings.payFromYourPhone'); ?></p>
                    <img src="<?php echo e($receiptSettings->payment_qr_code_url); ?>" alt="QR Code">
                    <p><?php echo app('translator')->get('modules.settings.scanQrCode'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\script\resources\views\order\print-pdf.blade.php ENDPATH**/ ?>