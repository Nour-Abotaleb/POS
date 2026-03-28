<?php
    $themeStyle = 'accent-color: var(--brand-primary);';
    $mergedStyle = trim($themeStyle . ' ' . ($attributes->get('style') ?? ''));
?>
<input type="checkbox"
    <?php echo $attributes->merge([
        'class' => 'cursor-pointer rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 shadow-sm focus:ring-gray-500 dark:focus:ring-gray-600 dark:focus:ring-offset-gray-800 theme-checkbox'
    ])->except('style'); ?>

    style="<?php echo e($mergedStyle); ?>">
<?php /**PATH E:\nomufood\POS\resources\views/components/checkbox.blade.php ENDPATH**/ ?>