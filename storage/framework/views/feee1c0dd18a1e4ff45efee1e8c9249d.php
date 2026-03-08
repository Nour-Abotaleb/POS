<table <?php echo e($attributes->merge(['class' => 'min-w-full divide-y divide-gray-200', 'id' => 'example' ])); ?>>
    <?php if(isset($thead)): ?>
        <thead class="<?php echo e($headType ?? 'bg-gray-50'); ?>">
            <tr>
                <?php echo $thead; ?>

            </tr>
        </thead>
    <?php endif; ?>
    <tbody class="bg-white divide-y divide-gray-200">
        <?php echo e($slot); ?>

    </tbody>
    <?php if(isset($tfoot)): ?>
        <tfoot class="bg-gray-50">
            <?php echo e($tfoot); ?>

        </tfoot>
    <?php endif; ?>
</table>
<?php /**PATH C:\xampp\htdocs\script\resources\views\components\table.blade.php ENDPATH**/ ?>