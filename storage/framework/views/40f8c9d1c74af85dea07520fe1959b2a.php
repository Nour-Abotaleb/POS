<div>
    <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px settings-tab-bar">
            <!--[if BLOCK]><![endif]--><?php if(user()->hasRole('Admin_'.user()->restaurant_id)): ?>

            <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=restaurant'); ?>" wire:navigate
                    style="<?php echo e($activeSetting == 'restaurant' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'restaurant'), 'active' => ($activeSetting == 'restaurant')]); ?>">
                    <?php echo app('translator')->get('modules.settings.restaurantSettings'); ?>
                </a>
            </li>
            <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=app'); ?>" wire:navigate
                style="<?php echo e($activeSetting == 'app' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'app'), 'active' => ($activeSetting == 'app')]); ?>"><?php echo app('translator')->get('modules.settings.appSettings'); ?></a>
            </li>
            <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=language'); ?>" wire:navigate
                style="<?php echo e($activeSetting == 'language' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'language'), 'active' => ($activeSetting == 'language')]); ?>"><?php echo app('translator')->get('modules.settings.languageSettings'); ?></a>
            </li>
            <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=branch'); ?>" wire:navigate
                style="<?php echo e($activeSetting == 'branch' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'branch'), 'active' => ($activeSetting == 'branch')]); ?>"><?php echo app('translator')->get('modules.settings.branchSettings'); ?></a>
            </li>
            <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=currency'); ?>" wire:navigate
                style="<?php echo e($activeSetting == 'currency' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'currency'), 'active' => ($activeSetting == 'currency')]); ?>"><?php echo app('translator')->get('modules.settings.currencySettings'); ?></a>
            </li>
            <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=email'); ?>" wire:navigate
                style="<?php echo e($activeSetting == 'email' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'email'), 'active' => ($activeSetting == 'email')]); ?>"><?php echo app('translator')->get('modules.settings.emailSettings'); ?></a>
            </li>
            <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=tax'); ?>" wire:navigate
                style="<?php echo e($activeSetting == 'tax' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'tax'), 'active' => ($activeSetting == 'tax')]); ?>"><?php echo app('translator')->get('modules.settings.taxSettings'); ?></a>
            </li>
            <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=payment'); ?>" wire:navigate
                style="<?php echo e($activeSetting == 'payment' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'payment'), 'active' => ($activeSetting == 'payment')]); ?>"><?php echo app('translator')->get('modules.settings.paymentgatewaySettings'); ?></a>
            </li>
            <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=theme'); ?>" wire:navigate
                style="<?php echo e($activeSetting == 'theme' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'theme'), 'active' => ($activeSetting == 'theme')]); ?>"><?php echo app('translator')->get('modules.settings.themeSettings'); ?></a>
            </li>
            <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=role'); ?>" wire:navigate
                style="<?php echo e($activeSetting == 'role' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'role'), 'active' => ($activeSetting == 'role')]); ?>"><?php echo app('translator')->get('modules.settings.roleSettings'); ?></a>
            </li>

            <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=billing'); ?>" wire:navigate
                style="<?php echo e($activeSetting == 'billing' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'billing'), 'active' => ($activeSetting == 'billing')]); ?>"><?php echo app('translator')->get('modules.settings.billing'); ?></a>
            </li>

            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=reservation'); ?>" wire:navigate
                style="<?php echo e($activeSetting == 'reservation' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'reservation'), 'active' => ($activeSetting == 'reservation')]); ?>"><?php echo app('translator')->get('modules.settings.reservationSettings'); ?></a>
            </li>

            <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=aboutus'); ?>" wire:navigate
                style="<?php echo e($activeSetting == 'aboutus' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'aboutus'), 'active' => ($activeSetting == 'aboutus')]); ?>"><?php echo app('translator')->get('modules.settings.aboutUsSettings'); ?></a>
            </li>

            <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=customerSite'); ?>" wire:navigate
                style="<?php echo e($activeSetting == 'customerSite' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'customerSite'), 'active' => ($activeSetting == 'customerSite')]); ?>"><?php echo app('translator')->get('modules.settings.customerSiteSettings'); ?></a>
            </li>

              <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=receipt'); ?>" wire:navigate
                style="<?php echo e($activeSetting == 'receipt' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'receipt'), 'active' => ($activeSetting == 'receipt')]); ?>"><?php echo app('translator')->get('modules.settings.receiptSetting'); ?></a>
            </li>

             <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=printer'); ?>" wire:navigate
                style="<?php echo e($activeSetting == 'printer' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'printer'), 'active' => ($activeSetting == 'printer')]); ?>"><?php echo app('translator')->get('modules.settings.printerSetting'); ?></a>
            </li>

            <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=deliverySettings'); ?>" wire:navigate
                style="<?php echo e($activeSetting == 'deliverySettings' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'deliverySettings'), 'active' => ($activeSetting == 'deliverySettings')]); ?>"><?php echo app('translator')->get('modules.settings.deliverySettings'); ?></a>
            </li>

            <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=kotSettings'); ?>" wire:navigate
                style="<?php echo e($activeSetting == 'kotSettings' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'kotSettings'), 'active' => ($activeSetting == 'kotSettings')]); ?>"><?php echo app('translator')->get('modules.settings.kotSettings'); ?></a>
            </li>
            <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=cancelSettings'); ?>" wire:navigate
                style="<?php echo e($activeSetting == 'cancelSettings' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'cancelSettings'), 'active' => ($activeSetting == 'cancelSettings')]); ?>"><?php echo app('translator')->get('modules.settings.cancelSettings'); ?></a>
            </li>

            <li class="me-2">
                <a href="<?php echo e(route('settings.index').'?tab=orderSettings'); ?>" wire:navigate
                style="<?php echo e($activeSetting == 'orderSettings' ? 'color: #011646; border-bottom-color: #011646;' : ''); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300", 'border-transparent' => ($activeSetting != 'orderSettings'), 'active' => ($activeSetting == 'orderSettings')]); ?>"><?php echo app('translator')->get('modules.settings.orderSetting'); ?></a>
            </li>

            <!-- NAV ITEM - CUSTOM MODULES  -->
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = custom_module_plugins(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if ($__env->exists(strtolower($item) . '::sections.settings.restaurant.sidebar')) echo $__env->make(strtolower($item) . '::sections.settings.restaurant.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </ul>
    </div>

    <div class="grid grid-cols-1 pt-6 dark:bg-gray-900">

        <div>
            <!--[if BLOCK]><![endif]--><?php switch($activeSetting):
                case ('restaurant'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.generalSettings', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('app'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.timezoneSettings', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-1', $__slots ?? [], get_defined_vars());

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

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-2', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('settings.notificationSettings', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-3', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('settings.currencySettings');

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-4', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('settings.paymentSettings', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-5', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('settings.themeSettings', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-6', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('role'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.roleSettings', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-7', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('tax'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.taxSettings', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-8', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('reservation'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.reservationSettings');

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-9', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('branch'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.branchSettings');

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-10', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>
                <?php case ('billing'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.billingSettings');

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-11', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('aboutus'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.aboutUsSettings', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-12', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('customerSite'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.customerSiteSettings', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-13', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('receipt'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.ReceiptSetting', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-14', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('printer'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.PrinterSetting', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-15', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('deliverySettings'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.branchDeliverySettings', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-16', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('kotSettings'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.kotSettings', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-17', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('cancelSettings'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.CancellationSettings', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-18', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php break; ?>

                <?php case ('orderSettings'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.OrderSettings', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-19', $__slots ?? [], get_defined_vars());

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
                <!--[if BLOCK]><![endif]--><?php if($activeSetting == strtolower($item).'Settings'): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split(strtolower($item).'::restaurant.setting', ['settings' => $settings]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1207472648-20', $__slots ?? [], get_defined_vars());

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
<?php /**PATH E:\nomu\testfood\POS\resources\views/livewire/settings/master.blade.php ENDPATH**/ ?>