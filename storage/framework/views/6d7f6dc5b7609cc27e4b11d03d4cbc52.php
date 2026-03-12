<!--[if BLOCK]><![endif]--><?php if(function_exists('module_enabled') && module_enabled('Whatsapp') && function_exists('restaurant_modules') && in_array('Whatsapp', restaurant_modules()) && \Modules\Whatsapp\Entities\WhatsAppSetting::whereNull('restaurant_id')->where('is_enabled', true)->exists()): ?>
<li class="me-2">
    <a href="<?php echo e(route('settings.index').'?tab=whatsappSettings'); ?>" wire:navigate
        class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'whatsappSettings'), 'active border-skin-base dark:text-skin-base dark:border-skin-base text-skin-base' => ($activeSetting == 'whatsappSettings')]); ?>">
        <?php echo app('translator')->get('whatsapp::app.whatsappNotifications'); ?>
    </a>
</li>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->

<?php /**PATH E:\nomu\testfood\POS\Modules/Whatsapp\Resources/views/sections/settings/restaurant/sidebar.blade.php ENDPATH**/ ?>