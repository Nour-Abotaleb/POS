 <!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e(isRtl() ? 'rtl' : 'ltr'); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(restaurant()->name); ?> - <?php echo e($order->show_formatted_order_number ?? ""); ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'DejaVu Sans', 'Arial', sans-serif;
        }

        [dir="rtl"] {
            text-align: right;
        }

        [dir="ltr"] {
            text-align: left;
        }

        .receipt {
            width: <?php echo e($width - 5); ?>mm;
            padding: <?php echo e($thermal ? '1mm' : '6.35mm'); ?>;
            page-break-after: always;
        }

        .header {
            text-align: center;
            margin-bottom: 3mm;
        }

        .restaurant-logo {
            width: 80px;
            height: 80px;
            margin-top: 3px;
            object-fit: contain;
        }

        .restaurant-name {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            margin-bottom: 1mm;
        }
        .restaurant-name img {
            display: block;
            margin: 0 auto 2mm;
        }

        .qr-code-img {
            width: 100px;
            height: 100px;
        }

        .restaurant-info {
            font-size: 9pt;
            margin-bottom: 1mm;
        }

        .order-info {
            border-top: 1px dashed #000;
            border-bottom: 1px dashed #000;
            padding: 2mm 0;
            margin-bottom: 3mm;
            font-size: 9pt;
        }

        . {
            font-weight: bold;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 3mm;
            font-size: 9pt;
        }

        .items-table th {
            padding: 1mm;
            border-bottom: 1px solid #000;
        }

        [dir="rtl"] .items-table th {
            text-align: right;
        }

        [dir="ltr"] .items-table th {
            text-align: left;
        }

        .items-table td {
            padding: 1mm 0;
            vertical-align: top;
        }

        .qty {
            width: 10%;
            text-align: center;
        }

        .description {
            width: 50%;
        }

        .payment-method {
            width: 28%;
        }

        [dir="rtl"] .price,
        [dir="rtl"] .amount {
            text-align: left;
        }

        [dir="ltr"] .price,
        [dir="ltr"] .amount {
            text-align: right;
        }

        .price {
            width: 20%;
        }

        .amount {
            width: 20%;
        }

        .summary {
            font-size: 9pt;
            margin-top: 2mm;
        }

        .summary-row {
            width: 100%;
            margin-bottom: 1mm;
        }
        .summary-row table {
            width: 100%;
            border-collapse: collapse;
        }
        .summary-row td {
            padding: 0;
        }
        .summary-row td:first-child {
            text-align: left;
        }
        .summary-row td:last-child {
            text-align: right;
        }
        .summary-row.secondary {
            font-size: 8pt;
            color: #555;
            margin-bottom: 0.5mm;
        }

        .summary-grid {
            width: 100%;
            margin-bottom: 1mm;
        }
        .summary-grid table {
            width: 100%;
            border-collapse: collapse;
        }
        .summary-grid td {
            width: 50%;
            padding: 2px 5px;
            vertical-align: top;
        }

        .total {
            font-weight: bold;
            font-size: 11pt;
            border-top: 1px solid #000;
            padding-top: 1mm;
            margin-top: 1mm;
        }

        .footer {
            text-align: center;
            margin-top: 3mm;
            font-size: 9pt;
            padding-top: 2mm;
            border-top: 1px dashed #000;
        }
        .img-qr-code {
            width: 100px;
            height: 100px;
        }

        .qr_code {
            margin-top: 5mm;
            margin-bottom: 3mm;
        }

        .modifiers {
            font-size: 8pt;
            color: #555;
        }

        .back-button {
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 1000;
            padding: 10px 20px;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        .back-button:hover {
            background-color: #2563eb;
        }

        @media print {
            @page {
                margin: 0;
                size: 80mm auto;
            }
            .back-button {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <!-- Back button for PWA mode -->
    <button class="back-button" onclick="goBack()" id="backButton" style="display: none;">
        ← <?php echo app('translator')->get('app.back'); ?>
    </button>
    <div class="receipt">
        <div class="header">
            <div class="restaurant-name">
                <?php if($receiptSettings->show_restaurant_logo): ?>
                    <?php
                        $logoUrl = restaurant()->logo_url;
                        $logoBase64 = null;
                        if ($logoUrl) {
                            try {
                                // If the URL is relative, prepend the app URL
                                if (!preg_match('/^https?:\/\//', $logoUrl)) {
                                    $logoUrl = url($logoUrl);
                                }
                                $logoImageContents = @file_get_contents($logoUrl);
                                if ($logoImageContents !== false) {
                                    $logoBase64 = 'data:image/png;base64,' . base64_encode($logoImageContents);
                                }
                            } catch (\Exception $e) {
                                $logoBase64 = null;
                            }
                        }
                    ?>
                    <?php if($logoBase64): ?>
                        <img src="<?php echo e($logoBase64); ?>" alt="<?php echo e(restaurant()->name); ?>" class="restaurant-logo">
                    <?php else: ?>
                        <img src="<?php echo e(restaurant()->logo_url); ?>" alt="<?php echo e(restaurant()->name); ?>" class="restaurant-logo">
                    <?php endif; ?>
                <?php endif; ?>
                <div><?php echo e(restaurant()->name); ?></div>
            </div>

            <div class="restaurant-info"><?php echo nl2br(branch()->address); ?></div>
            <div class="restaurant-info"><?php echo app('translator')->get('modules.customer.phone'); ?>:<span dir="ltr" style="unicode-bidi: embed;"><?php echo e(restaurant()->phone_number); ?></span></div>
            <?php if($receiptSettings->show_tax): ?>

                <?php $__currentLoopData = $taxDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="restaurant-info"><?php echo e($taxDetail->tax_name); ?>: <?php echo e($taxDetail->tax_id); ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

        </div>

        <div class="order-info">

            <div class="">
                <div class="summary-row">
                    <table>
                        <tr>
                            <td>
                                <span class="order-number"><?php echo e($order->show_formatted_order_number); ?></span>
                            </td>
                            <td class="space_left"><?php echo e($order->date_time->timezone(timezone())->translatedFormat('d M Y h:i A')); ?></td>
                        </tr>
                    </table>
                </div>
                <?php
                    $tokenNumber = $order->kot->whereNotNull('token_number')->first()?->token_number;
                ?>
                <?php if($tokenNumber): ?>
                    <div class="summary-row">
                        <span><?php echo app('translator')->get('modules.order.tokenNumber'); ?> <?php echo e($tokenNumber); ?></span>
                    </div>
                <?php endif; ?>
                <?php if($receiptSettings->show_table_number || $receiptSettings->show_total_guest): ?>
                <div class="summary-row">
                    <table>
                        <tr>
                            <td>
                                <?php if($receiptSettings->show_table_number && $order->table && $order->table->table_code): ?>
                                    <?php echo app('translator')->get('modules.settings.tableNumber'); ?>: <?php echo e($order->table->table_code); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($receiptSettings->show_total_guest && $order->number_of_pax): ?>
                                    <?php echo app('translator')->get('modules.order.noOfPax'); ?>: <?php echo e($order->number_of_pax); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <?php endif; ?>
                <?php if($receiptSettings->show_waiter && $order->waiter && $order->waiter->name): ?>
                    <div class="summary-row">
                            <span><?php echo app('translator')->get('modules.order.waiter'); ?>: <span class=""><?php echo e($order->waiter->name); ?></span></span>
                    </div>
                <?php endif; ?>
                <?php if($receiptSettings->show_order_type ): ?>
                    <div class="summary-row">

                            <span> <?php echo e(Str::title(ucwords(str_replace('_', ' ', $order->order_type)))); ?>

                                <?php if($order->order_type === 'pickup'): ?>
                                    <?php if($order->pickup_date): ?>
                                        <span class="">
                                            : <?php echo e(\Carbon\Carbon::parse($order->pickup_date)->translatedFormat('d M Y h:i A')); ?>

                                        </span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </span>

                    </div>
                <?php endif; ?>
                <?php if($receiptSettings->show_customer_name && $order->customer && $order->customer->name): ?>
                    <div class="summary-row">
                        <span class="showData"><?php echo app('translator')->get('modules.customer.customer'); ?>: <span class=""><?php echo e($order->customer->name); ?></span></span>
                    </div>
                <?php endif; ?>


                <?php if($receiptSettings->show_customer_address && $order->customer && $order->customer->delivery_address): ?>
                    <div class="summary-row">
                        <span><?php echo app('translator')->get('modules.customer.customerAddress'); ?>: <span class=""><?php echo e($order->customer->delivery_address); ?></span></span>
                    </div>
                <?php endif; ?>

                <?php if($receiptSettings->show_customer_phone && $order->customer && $order->customer->phone): ?>
                    <div class="summary-row">
                        <span><?php echo app('translator')->get('modules.customer.phone'); ?>: <span dir="ltr" style="unicode-bidi: embed;"><?php echo e($order->customer->phone); ?></span></span>
                    </div>
                <?php endif; ?>
            </div>

        </div>

        <table class="items-table">
            <thead>
                <tr>
                    <th class="qty"><?php echo app('translator')->get('modules.order.qty'); ?></th>
                    <th class="description"><?php echo app('translator')->get('modules.menu.itemName'); ?></th>
                    <th class="price"><?php echo app('translator')->get('modules.order.price'); ?></th>
                    <th class="amount"><?php echo app('translator')->get('modules.order.amount'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="qty"><?php echo e($item->quantity); ?></td>
                        <td class="description">
                            <?php echo e($item->menuItem->item_name); ?>


                            <?php if(isset($item->menuItemVariation)): ?>
                                <br><small>(<?php echo e($item->menuItemVariation->variation); ?>)</small>
                            <?php endif; ?>
                            <?php $__currentLoopData = $item->modifierOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    if ($order->order_type_id) {
                                        $modifier->setPriceContext($order->order_type_id, $order?->delivery_app_id);
                                    }
                                ?>
                                <div class="modifiers">• <?php echo e($modifier->name ?? $modifier->pivot->modifier_option_name); ?>

                                    (+<?php echo e(currency_format($modifier->pivot->modifier_option_price ?? $modifier->price, restaurant()->currency_id)); ?>)
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td class="price"><?php echo e(currency_format($item->price, restaurant()->currency_id)); ?></td>
                        <td class="amount">
                            <?php echo e(currency_format($item->amount, restaurant()->currency_id)); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="summary">
            <div class="summary-row">
                <table>
                    <tr>
                        <td><?php echo app('translator')->get('modules.order.subTotal'); ?>:</td>
                        <td><?php echo e(currency_format($order->sub_total, restaurant()->currency_id)); ?></td>
                    </tr>
                </table>
            </div>

            <?php if(!is_null($order->discount_amount)): ?>
                <div class="summary-row">
                    <table>
                        <tr>
                            <td><?php echo app('translator')->get('modules.order.discount'); ?> <?php if($order->discount_type == 'percent'): ?>
                                    (<?php echo e(rtrim(rtrim($order->discount_value, '0'), '.')); ?>%)
                                <?php endif; ?>
                            </td>
                            <td>-<?php echo e(currency_format($order->discount_amount, restaurant()->currency_id)); ?></td>
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
                        <td>
                            <?php echo e(currency_format(($item->charge->getAmount($order->sub_total - ($order->discount_amount ?? 0))), restaurant()->currency_id)); ?>

                        </td>
                    </tr>
                </table>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($order->tip_amount > 0): ?>
                <div class="summary-row">
                    <table>
                        <tr>
                            <td><?php echo app('translator')->get('modules.order.tip'); ?>:</td>
                            <td><?php echo e(currency_format($order->tip_amount, restaurant()->currency_id)); ?></td>
                        </tr>
                    </table>
                </div>
            <?php endif; ?>

            <?php if($order->order_type === 'delivery' && !is_null($order->delivery_fee)): ?>
                <div class="summary-row">
                    <table>
                        <tr>
                            <td><?php echo app('translator')->get('modules.delivery.deliveryFee'); ?></td>
                            <td>
                                <?php if($order->delivery_fee > 0): ?>
                                    <?php echo e(currency_format($order->delivery_fee, restaurant()->currency_id)); ?>

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
                                <td><?php echo e(currency_format(($item->tax->tax_percent / 100) * ($order->sub_total - ($order->discount_amount ?? 0)), restaurant()->currency_id)); ?></td>
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
                    <div>
                        <?php $__currentLoopData = $taxTotals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxName => $taxInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="summary-row secondary">
                            <table>
                                <tr>
                                    <td><?php echo e($taxName); ?> (<?php echo e($taxInfo['percent']); ?>%)</td>
                                    <td><?php echo e(currency_format($taxInfo['amount'], restaurant()->currency_id)); ?></td>
                                </tr>
                            </table>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="summary-row">
                        <table>
                            <tr>
                                <td><?php echo app('translator')->get('modules.order.totalTax'); ?>:</td>
                                <td><?php echo e(currency_format($totalTax, restaurant()->currency_id)); ?></td>
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
                            <td><?php echo e(currency_format($payment->balance, restaurant()->currency_id)); ?></td>
                        </tr>
                    </table>
                </div>
            <?php endif; ?>

            <div class="summary-row total">
                <table>
                    <tr>
                        <td><?php echo app('translator')->get('modules.order.total'); ?>:</td>
                        <td><?php echo e(currency_format($order->total, restaurant()->currency_id)); ?></td>
                    </tr>
                </table>
            </div>

            <?php if($receiptSettings->show_payment_status): ?>
                <div class="summary-row" style="margin-top: 2mm; padding-top: 2mm; border-top: 1px dashed #000;">
                    <table>
                        <tr>
                            <td style="font-weight: bold;"><?php echo app('translator')->get('modules.order.paymentStatus'); ?>:</td>
                            <td style="font-weight: bold;">
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

        <div class="footer">
            <p><?php echo app('translator')->get('messages.thankYouVisit'); ?></p>

            <?php if($order->status != 'paid'): ?>
            <div>
                <?php if($receiptSettings->show_payment_qr_code): ?>
                    <p class="qr_code"><?php echo app('translator')->get('modules.settings.payFromYourPhone'); ?></p>
                    <?php
                        // Get the QR code image and convert to base64
                        $qrCodeUrl = $receiptSettings->payment_qr_code_url;
                        $qrCodeBase64 = null;
                        if ($qrCodeUrl) {
                            try {
                                // If the URL is relative, prepend the app URL
                                if (!preg_match('/^https?:\/\//', $qrCodeUrl)) {
                                    $qrCodeUrl = url($qrCodeUrl);
                                }
                                $qrImageContents = @file_get_contents($qrCodeUrl);
                                if ($qrImageContents !== false) {
                                    $qrCodeBase64 = 'data:image/png;base64,' . base64_encode($qrImageContents);
                                }
                            } catch (\Exception $e) {
                                $qrCodeBase64 = null;
                            }
                        }
                    ?>
                    <?php if($qrCodeBase64): ?>
                        <img class="qr-code-img" src="<?php echo e($qrCodeBase64); ?>" alt="QR Code">
                    <?php else: ?>
                        <img class="qr-code-img" src="<?php echo e($receiptSettings->payment_qr_code_url); ?>" alt="QR Code">
                    <?php endif; ?>
                    <p class=""><?php echo app('translator')->get('modules.settings.scanQrCode'); ?></p>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if($receiptSettings->show_payment_details && $order->payments->count()): ?>
                <div class="summary">
                    <table class="items-table">
                        <thead>
                            <tr>
                                <th class="qty" style="text-align: center"><?php echo app('translator')->get('modules.order.amount'); ?></th>
                                <th class="payment-method" style="text-align: center"><?php echo app('translator')->get('modules.order.paymentMethod'); ?></th>
                                <th class="price" style="text-align: center"><?php echo app('translator')->get('app.dateTime'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $order->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="qty" style="text-align: center"><?php echo e(currency_format($payment->amount, restaurant()->currency_id)); ?></td>
                                    <td class="payment-method" style="text-align: center"><?php echo app('translator')->get('modules.order.' . $payment->payment_method); ?></td>
                                    <td class="price" style="text-align: center">
                                        <?php if($payment->payment_method != 'due'): ?>
                                            <?php echo e($payment->created_at->timezone(timezone())->translatedFormat('d M Y h:i A')); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>


    </div>

    <script>
        // Detect if running in PWA standalone mode
        function isPWA() {
            return (window.matchMedia('(display-mode: standalone)').matches) || 
                   (window.navigator.standalone === true) ||
                   (document.referrer.includes('android-app://'));
        }

        // Show back button if in PWA mode
        if (isPWA()) {
            const backButton = document.getElementById('backButton');
            if (backButton) {
                backButton.style.display = 'block';
            }
        }

        // Go back function
        function goBack() {
            if (window.history.length > 1) {
                window.history.back();
            } else {
                // If no history, redirect to orders page or home
                window.location.href = '<?php echo e(route("orders.index")); ?>';
            }
        }

        // Auto-trigger print dialog when page loads and close the window afterward
        window.onload = function() {
            const closeAfterPrint = () => {
                // In PWA, navigate back instead of trying to close the window
                if (isPWA()) {
                    goBack();
                } else {
                    window.close();
                }
            };

            // Set handler for after print where supported
            if ('onafterprint' in window) {
                window.onafterprint = function() {
                    closeAfterPrint();
                };
            } else {
                // Fallback: attempt to close shortly after print is triggered
                setTimeout(closeAfterPrint, 1000);
            }

            window.print();
        };
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\script\resources\views\order\print.blade.php ENDPATH**/ ?>