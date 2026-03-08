<?php

$seller = array_filter([
    'pwAuth' => (int) config('cashier.retain_key'),
]);

if (config('cashier.client_side_token')) {
    $seller['token'] = config('cashier.client_side_token');
} elseif (config('cashier.seller_id')) {
    $seller['seller'] = (int) config('cashier.seller_id');
}

if (isset($seller['pwAuth']) && Auth::check() && $customer = Auth::user()->customer) {
    $seller['pwCustomer'] = ['id' => $customer->paddle_id];
}

$nonce = $nonce ?? '';
?>

<script src="https://cdn.paddle.com/paddle/v2/paddle.js" <?php if($nonce): ?> nonce="<?php echo e($nonce); ?>" <?php endif; ?>></script>

<?php if(config('cashier.sandbox')): ?>
    <script type="text/javascript" <?php if($nonce): ?> nonce="<?php echo e($nonce); ?>" <?php endif; ?>>
        Paddle.Environment.set('sandbox');
    </script>
<?php endif; ?>

<script type="text/javascript" <?php if($nonce): ?> nonce="<?php echo e($nonce); ?>" <?php endif; ?>>
    Paddle.Initialize(<?php echo json_encode($seller, 15, 512) ?>);
</script>
<?php /**PATH C:\xampp\htdocs\script\vendor\laravel\cashier-paddle\resources\views\js.blade.php ENDPATH**/ ?>