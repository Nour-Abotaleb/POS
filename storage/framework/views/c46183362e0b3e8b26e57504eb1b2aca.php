<a  class="flex gap-2 items-center text-xl font-medium dark:text-white app-logo">
    <img src="<?php echo e(global_setting()->logoUrl); ?>" class="h-8" alt="<?php echo e(global_setting()->name); ?> Logo" /> 
    <?php if(global_setting()->show_logo_text): ?>
    <?php echo e(global_setting()->name); ?>

    <?php endif; ?>
</a>
<?php /**PATH C:\xampp\htdocs\script\resources\views\components\authentication-card-logo.blade.php ENDPATH**/ ?>