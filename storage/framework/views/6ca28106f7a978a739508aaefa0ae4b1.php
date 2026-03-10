<li class="me-2">
    <a href="<?php echo e(route('superadmin.superadmin-settings.index').'?tab=backup&subtab=settings'); ?>" wire:navigate
    class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'backup'), 'active border-skin-base dark:text-skin-base dark:border-skin-base text-skin-base' => ($activeSetting == 'backup')]); ?>"><?php echo app('translator')->get('backup::app.databaseBackupSettings'); ?></a>
</li>
<?php /**PATH E:\nomu\testfood\POS\Modules/Backup\Resources/views/sections/superadmin-settings/sidebar.blade.php ENDPATH**/ ?>