<?php
$transaction = $checkout->getTransaction();
$items = $checkout->getItems();
$customer = $checkout->getCustomer();
$custom = $checkout->getCustomData();
?>

<a
    href='#!'
    <?php if($transaction): ?>
        data-transaction-id='<?php echo e($transaction['id']); ?>'
    <?php else: ?>
        data-items='<?php echo json_encode($items); ?>'
    <?php endif; ?>
    data-allow-logout='false'
    <?php if($customer): ?> data-customer-id='<?php echo e($customer->paddle_id); ?>' <?php endif; ?>
    <?php if($custom): ?> data-custom-data='<?php echo e(json_encode($custom)); ?>' <?php endif; ?>
    <?php if($returnUrl = $checkout->getReturnUrl()): ?> data-success-url='<?php echo e($returnUrl); ?>' <?php endif; ?>
    <?php echo e($attributes->merge(['class' => 'paddle_button'])); ?>

>
    <?php echo e($slot); ?>

</a>
<?php /**PATH C:\xampp\htdocs\script\vendor\laravel\cashier-paddle\resources\views\components\button.blade.php ENDPATH**/ ?>