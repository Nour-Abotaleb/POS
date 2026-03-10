<!--[if BLOCK]><![endif]--><?php if(function_exists('module_enabled') && module_enabled('Whatsapp')): ?>
<li class="me-2">
    <a href="<?php echo e(route('superadmin.superadmin-settings.index').'?tab=whatsapp'); ?>" wire:navigate
        class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'whatsapp'), 'active border-skin-base dark:text-skin-base dark:border-skin-base text-skin-base' => ($activeSetting == 'whatsapp')]); ?>">
        <?php echo app('translator')->get('whatsapp::app.whatsappSettings'); ?>
    </a>
</li>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->

<?php /**PATH E:\nomu\testfood\POS\Modules/WhatsApp\Resources/views/sections/superadmin-settings/sidebar.blade.php ENDPATH**/ ?>