<div>
    <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px">

            <li class="me-2">
                <a href="<?php echo e(route('superadmin.superadmin-settings.index')); ?>" wire:navigate
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'app'), 'active border-skin-base dark:text-skin-base dark:border-skin-base text-skin-base' => ($activeSetting == 'app')]); ?>"><?php echo app('translator')->get('modules.settings.appSettings'); ?></a>
            </li>


            <li class="me-2">
                <a href="<?php echo e(route('superadmin.superadmin-settings.index').'?tab=email'); ?>" wire:navigate
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'email'), 'active border-skin-base dark:text-skin-base dark:border-skin-base text-skin-base' => ($activeSetting == 'email')]); ?>"><?php echo app('translator')->get('modules.settings.emailSettings'); ?></a>
            </li>

            <li class="me-2">
                <a href="<?php echo e(route('superadmin.superadmin-settings.index').'?tab=language'); ?>" wire:navigate
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'language'), 'active border-skin-base dark:text-skin-base dark:border-skin-base text-skin-base' => ($activeSetting == 'language')]); ?>"><?php echo app('translator')->get('modules.settings.languageSettings'); ?></a>
            </li>

            <li class="me-2">
                <a href="<?php echo e(route('superadmin.superadmin-settings.index').'?tab=payment'); ?>" wire:navigate
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'payment'), 'active border-skin-base dark:text-skin-base dark:border-skin-base text-skin-base' => ($activeSetting == 'payment')]); ?>"><?php echo app('translator')->get('modules.settings.paymentgatewaySettings'); ?></a>
            </li>

              <li class="me-2">
                <a href="<?php echo e(route('superadmin.superadmin-settings.index').'?tab=theme'); ?>" wire:navigate
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'theme'), 'active border-skin-base dark:text-skin-base dark:border-skin-base text-skin-base' => ($activeSetting == 'theme')]); ?>"><?php echo app('translator')->get('modules.settings.themeSettings'); ?></a>
            </li>

            <li class="me-2">
                <a href="<?php echo e(route('superadmin.superadmin-settings.index').'?tab=push'); ?>" wire:navigate
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'push'), 'active border-skin-base dark:text-skin-base dark:border-skin-base text-skin-base' => ($activeSetting == 'push')]); ?>"><?php echo app('translator')->get('modules.settings.pushNotificationSettings'); ?></a>
            </li>

            <li class="me-2">
                <a href="<?php echo e(route('superadmin.superadmin-settings.index').'?tab=currency'); ?>" wire:navigate
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'currency'), 'active border-skin-base dark:text-skin-base dark:border-skin-base text-skin-base' => ($activeSetting == 'currency')]); ?>"><?php echo app('translator')->get('modules.settings.currencySettings'); ?></a>
            </li>

            <li class="me-2">
                <a href="<?php echo e(route('superadmin.superadmin-settings.index').'?tab=storage'); ?>" wire:navigate
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'storage'), 'active border-skin-base dark:text-skin-base dark:border-skin-base text-skin-base' => ($activeSetting == 'storage')]); ?>"><?php echo app('translator')->get('modules.settings.storageSettings'); ?></a>
            </li>

            <li class="me-2">
                <a href="<?php echo e(route('superadmin.superadmin-settings.index').'?tab=desktop-app'); ?>" wire:navigate
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'desktop-app'), 'active border-skin-base dark:text-skin-base dark:border-skin-base text-skin-base' => ($activeSetting == 'desktop-app')]); ?>"><?php echo app('translator')->get('Desktop Application'); ?></a>
            </li>

            <li class="me-2">
                <a href="<?php echo e(route('superadmin.superadmin-settings.index').'?tab=webPushSetting'); ?>" wire:navigate
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'webPushSetting'), 'active border-skin-base dark:text-skin-base dark:border-skin-base text-skin-base' => ($activeSetting == 'webPushSetting')]); ?>"><?php echo app('translator')->get('modules.settings.webPushSetting'); ?></a>
            </li>

            <!-- NAV ITEM - CUSTOM MODULES  -->
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = custom_module_plugins(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if ($__env->exists(strtolower($item) . '::sections.superadmin-settings.sidebar')) echo $__env->make(strtolower($item) . '::sections.superadmin-settings.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

        </ul>
    </div>

    <div class="grid grid-cols-1 pt-6 dark:bg-gray-900">

        <div>
            <!--[if BLOCK]><![endif]--><?php switch($activeSetting):
                case ('app'): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('superadminSettings.appSettings', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3273468935-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('email'): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.emailSettings', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3273468935-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('language'): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.languageSettings');

$__html = app('livewire')->mount($__name, $__params, 'lw-3273468935-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('payment'): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.RestaurantPaymentSettings');

$__html = app('livewire')->mount($__name, $__params, 'lw-3273468935-3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('theme'): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.SuperadminThemeSettings', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3273468935-4', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('push'): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.pushNotificationSettings', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3273468935-5', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('currency'): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.SuperadminCurrencySettings', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3273468935-6', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('storage'): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.storageSettings');

$__html = app('livewire')->mount($__name, $__params, 'lw-3273468935-7', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('webPushSetting'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.webPushSettings');

$__html = app('livewire')->mount($__name, $__params, 'lw-3273468935-8', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('desktop-app'): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.desktopApplicationSettings', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3273468935-9', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php default: ?>

            <?php endswitch; ?><!--[if ENDBLOCK]><![endif]-->

              <!-- NAV ITEM - CUSTOM MODULES  -->
              <!--[if BLOCK]><![endif]--><?php $__currentLoopData = custom_module_plugins(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!--[if BLOCK]><![endif]--><?php if($activeSetting == $item): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split($item.'::super-admin.setting');

$__html = app('livewire')->mount($__name, $__params, 'lw-3273468935-10', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

        </div>


    </div>

</div>
<?php /**PATH E:\nomu\testfood\POS\resources\views/livewire/superadmin-settings/master.blade.php ENDPATH**/ ?>