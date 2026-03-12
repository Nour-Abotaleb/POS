<!--[if BLOCK]><![endif]--><?php if(module_enabled('MultiPOS') && in_array('MultiPOS', restaurant_modules())): ?>
    <!--[if BLOCK]><![endif]--><?php if(user_can('Manage MultiPOS Machines')): ?>
        <li class="me-2">
            <a href="<?php echo e(route('settings.index').'?tab='.strtolower($item).'Settings'); ?>" wire:navigate
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != strtolower($item).'Settings'), 'active border-skin-base dark:text-skin-base dark:border-skin-base text-skin-base' => ($activeSetting == strtolower($item).'Settings')]); ?>">
                <?php echo app('translator')->get('modules.settings.multiposSettings'); ?>
            </a>
        </li>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->

<?php /**PATH E:\nomu\testfood\POS\Modules/Multipos\Resources/views/sections/settings/restaurant/sidebar.blade.php ENDPATH**/ ?>