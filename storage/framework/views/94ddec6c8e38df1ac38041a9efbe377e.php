<?php $__env->startSection('content'); ?>
    <div id="pos-app"></div>   
<?php $__env->stopSection(); ?>

<?php echo app('Illuminate\Foundation\Vite')('resources/js/pos-app.js'); ?>   

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\script\resources\views\pos\posvue.blade.php ENDPATH**/ ?>