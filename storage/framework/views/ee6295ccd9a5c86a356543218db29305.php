<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo app('translator')->get('modules.billing.paymentReceipt'); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <?php if ($__env->exists('billing.billing_pdf_css')) echo $__env->make('billing.billing_pdf_css', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <style>
        .bg-grey {
            background-color: #F2F4F7;
        }

        .bg-white {
            background-color: #fff;
        }

        .border-radius-25 {
            border-radius: 0.25rem;
        }

        .p-25 {
            padding: 1.25rem;
        }

        .f-11 {
            font-size: 11px;
        }

        .f-12 {
            font-size: 12px;
        }

        .f-13 {
            font-size: 13px;
        }

        .f-14 {
            font-size: 13px;
        }

        .f-15 {
            font-size: 13px;
        }

        .f-21 {
            font-size: 17px;
        }

        .text-black {
            color: #28313c;
        }

        .text-grey {
            color: #616e80;
        }

        .font-weight-700 {
            font-weight: 700;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .text-capitalize {
            text-transform: capitalize;
        }

        .line-height {
            line-height: 15px;
        }

        .mt-1 {
            margin-top: 1rem;
        }

        .mb-0 {
            margin-bottom: 0px;
        }

        .b-collapse {
            border-collapse: collapse;
        }

        .heading-table-left {
            padding: 6px;
            border: 1px solid #DBDBDB;
            font-weight: bold;
            background-color: #f1f1f3;
            border-right: 0;
        }

        .heading-table-right {
            padding: 6px;
            border: 1px solid #DBDBDB;
            border-left: 0;
        }

        .paid {
            color: #28a745 !important;
            border: 1px solid #28a745;
            position: relative;
            padding: 3px 8px;
            font-size: 12px;
            border-radius: 0.25rem;
            width: 75px;
            text-align: center;
            margin-top: 50px;
        }

        .main-table-heading {
            border: 1px solid #DBDBDB;
            background-color: #f1f1f3;
            font-weight: 700;
        }

        .main-table-heading td {
            padding: 5px 8px;
            border: 1px solid #DBDBDB;
            font-size: 11px;
        }

        .main-table-items td {
            padding: 5px 8px;
            border: 1px solid #e7e9eb;
        }

        .total-box {
            border: 1px solid #e7e9eb;
            padding: 0px;
            border-bottom: 0px;
        }

        .total {
            padding: 10px 8px;
            border: 1px solid #e7e9eb;
            border-top: 0;
            font-weight: 700;
            border-left: 0;
            border-right: 0;
        }

        .total-amt {
            padding: 10px 8px;
            border: 1px solid #e7e9eb;
            border-top: 0;
            border-left: 0;
            border-right: 0;
            font-weight: 700;
        }

        .balance {
            font-size: 13px;
            font-weight: bold;
        }

        .balance-left {
            padding: 10px 8px;
            border: 1px solid #e7e9eb;
            border-top: 0;
            border-left: 0;
            border-right: 0;
        }

        .balance-right {
            padding: 10px 8px;
            border: 1px solid #e7e9eb;
            border-top: 0;
            border-left: 0;
            border-right: 0;
        }

        .centered {
            margin: 0 auto;
        }

        .rightaligned {
            margin-right: 0;
            margin-left: auto;
        }

        .leftaligned {
            margin-left: 0;
            margin-right: auto;
        }

        .page_break {
            page-break-before: always;
        }

        #logo {
            height: 40px;
        }

        .word-break {
            max-width: 175px;
            word-wrap: break-word;
        }

        .summary {
            padding: 11px 10px;
            border: 1px solid #e7e9eb;
            font-size: 11px;
        }

        .border-left-0 {
            border-left: 0 !important;
        }

        .border-right-0 {
            border-right: 0 !important;
        }

        .border-top-0 {
            border-top: 0 !important;
        }

        .border-bottom-0 {
            border-bottom: 0 !important;
        }

        .h3-border {
            border-bottom: 1px solid #AAAAAA;
        }
    </style>

</head>

<body class="content-wrapper">
    <table class="bg-white" border="0" cellpadding="0" cellspacing="0" width="100%" role="presentation">
        <tbody>
            <!-- Table Row Start -->
            <tr>
                <td style="vertical-align: top;">
                    <?php
                        $logoUrl = global_setting()->logo_url;
                        $logoBase64 = null;
                        if ($logoUrl) {
                            try {
                                // If the URL is relative, prepend the app URL
                                if (!preg_match('/^https?:\/\//', $logoUrl)) {
                                    $logoUrl = url($logoUrl);
                                }
                                $logoImageContents = @file_get_contents($logoUrl);
                                if ($logoImageContents !== false) {
                                    $imageInfo = @getimagesizefromstring($logoImageContents);
                                    $mimeType = $imageInfo ? $imageInfo['mime'] : 'image/png';
                                    $logoBase64 = 'data:' . $mimeType . ';base64,' . base64_encode($logoImageContents);
                                }
                            } catch (\Exception $e) {
                                $logoBase64 = null;
                            }
                        }
                    ?>
                    <?php if($logoBase64): ?>
                        <img src="<?php echo e($logoBase64); ?>" id="logo" />
                    <?php else: ?>
                        <img src="<?php echo e(global_setting()->logo_url); ?>" id="logo" />
                    <?php endif; ?>
                    <p class="line-height mb-0 f-11 text-black">
                        <?php echo e(global_setting()->name); ?>

                    </p>
                </td>
                <td align="right" class="f-21 text-black text-uppercase"><?php echo app('translator')->get('modules.billing.paymentReceipt'); ?><br>
                    <table class="text-black mt-1 f-11 b-collapse rightaligned">
                        <tr>
                            <td class="heading-table-left text-capitalize"><?php echo app('translator')->get('modules.billing.receipt'); ?> #</td>
                            <td class="heading-table-right"><?php echo e($invoice->id); ?></td>
                        </tr>
                        <tr>
                            <td class="heading-table-left text-capitalize"><?php echo app('translator')->get('modules.billing.paymentDate'); ?></td>
                            <td class="heading-table-right">
                                <?php echo e($invoice->pay_date->format('D, d M, Y')); ?>

                            </td>
                        </tr>
                        <tr>
                            <td class="heading-table-left text-capitalize"><?php echo app('translator')->get('modules.billing.transactionId'); ?></td>
                            <td class="heading-table-right">
                                <?php echo e($invoice->transaction_id); ?>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- Table Row End -->
            <tr>
                <td height="10"></td>
            </tr>
            <!-- Table Row Start -->
            <tr>
                <td class="f-12 text-black" style="vertical-align: top;">
                    <p class="line-height mb-0">
                        <span class="text-grey text-capitalize"><?php echo app('translator')->get('modules.billing.billedTo'); ?></span><br>
                        <?php echo e($invoice->restaurant->name); ?>

                    </p>
                </td>
                <td align="right">
                    <div style="margin: 0 0 auto auto" class="text-uppercase bg-white paid rightaligned">
                        <?php echo app('translator')->get('modules.billing.paid'); ?>
                    </div>
                </td>
            </tr>
            <!-- Table Row End -->
            <!-- Table Row Start -->
            <tr>
                <td height="10"></td>
            </tr>
            <!-- Table Row End -->
            <!-- Table Row Start -->

        </tbody>
    </table>

    <table width="100%" class="f-14 b-collapse">
        <tr>
            <td height="10" colspan="2"></td>
        </tr>
        <!-- Table Row Start -->
        <tr class="main-table-heading text-grey">
            <td width="40%"><?php echo app('translator')->get('modules.package.description'); ?></td>
            <td align="right"><?php echo app('translator')->get('modules.package.packageName'); ?></td>
            <td align="right"><?php echo app('translator')->get('modules.package.packagePrice'); ?></td>
            <td align="right"><?php echo app('translator')->get('modules.package.amount'); ?> (<?php echo e($invoice->globalCurrency->currency_code); ?>)</td>
        </tr>
        <!-- Table Row End -->
        <!-- Table Row Start -->
        <tr class="f-12 main-table-items text-black">
            <td width="40%" class="border-bottom-0">
                <?php echo e($invoice->package->description); ?>

            </td>
            <td align="right" width="10%" class="border-bottom-0"><?php echo e($invoice->package->package_name); ?> (<?php echo e($invoice->package_type); ?>)</td>
            <td align="right" class="border-bottom-0"><?php echo e($invoice->sub_total ?? 0); ?></td>
            <td align="right" class="border-bottom-0"><?php echo e($invoice->sub_total ?? 0); ?></td>
        </tr>
        <!-- Table Row End -->

        <!-- Table Row Start -->
        <tr>
            <td class="total-box" align="right" colspan="3">
                <table width="100%" border="0" class="b-collapse">

                    <!-- Table Row Start -->
                    <tr align="right" class="text-grey">
                        <td width="50%" class="total"><?php echo app('translator')->get('modules.billing.total'); ?></td>
                    </tr>
                    <!-- Table Row End -->
                </table>
            </td>
            <td class="total-box" align="right">
                <table width="100%" class="b-collapse">
                    <!-- Table Row Start -->
                    <tr align="right" class="text-grey">
                        <td class="total-amt f-15"><?php echo e($invoice->total); ?></td>
                    </tr>
                    <!-- Table Row End -->

                </table>
            </td>
        </tr>
    </table>

    <div class="f-12 mt-1">
        <?php echo app('translator')->get('modules.billing.paidVia'); ?> <?php echo e($invoice->gateway_name); ?> - <?php echo e($invoice->created_at->format('Y-m-d H:i:s')); ?>

    </div>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\script\resources\views\billing\billing-receipt.blade.php ENDPATH**/ ?>