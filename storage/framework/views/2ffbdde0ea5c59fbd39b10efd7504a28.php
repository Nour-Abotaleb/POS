
<!--[if BLOCK]><![endif]--><?php if(in_array('Kiosk', restaurant_modules())): ?>
    <li class="me-2">
        <a href="<?php echo e(route('settings.index').'?tab=kioskSettings'); ?>" wire:navigate
        class="<?php echo \Illuminate\Support\Arr::toCssClasses(["
        inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300",
        'border-transparent' => ($activeSetting != 'kioskSettings'),
        'active border-skin-base dark:text-skin-base dark:border-skin-base text-skin-base' => ($activeSetting == 'kioskSettings')]); ?>"><?php echo app('translator')->get('kiosk::modules.settings.kioskSettings'); ?></a>
    </li>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH E:\nomu\testfood\POS\Modules/Kiosk\Resources/views/sections/settings/restaurant/sidebar.blade.php ENDPATH**/ ?>