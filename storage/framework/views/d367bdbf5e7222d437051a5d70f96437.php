<nav class="fixed z-30 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">

      <div class="flex items-center justify-start">
        <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
          class="p-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
          <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
              clip-rule="evenodd"></path>
          </svg>
          <svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
        <a href="<?php echo e(route('dashboard')); ?>" class="flex ltr:ml-2 rtl:mr-2 items-center app-logo">
          <img src="<?php echo e(restaurant()->logoUrl); ?>" class="h-8 ltr:mr-3 rtl:ml-3" alt="" />

          <!--[if BLOCK]><![endif]--><?php if(restaurant()->show_logo_text): ?>
          <span class="self-center text-xl font-semibold sm:text-xl whitespace-nowrap dark:text-white hidden lg:block ltr:mr-2 rtl:ml-2"><?php echo e(Str::limit(restaurant()->name, 10)); ?></span>
          <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </a>

        <!--[if BLOCK]><![endif]--><?php if(!request()->routeIs('pos.*')): ?>
        <button id="toggle-sidebar" type="button" class="lg:inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 mx-2 hidden">
          <!-- Menu expand icon (shows when sidebar is collapsed) -->
          <svg id="toggle-sidebar-open" class="hidden w-6 h-6 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"/>
          </svg>
          <!-- Menu collapse icon (shows when sidebar is expanded) -->
          <svg id="toggle-sidebar-close" class=" w-6 h-6 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7M19 19l-7-7 7-7"/>
          </svg>
      </button>
      <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <div class="flex gap-2">
          <!--[if BLOCK]><![endif]--><?php if(in_array('Order', restaurant_modules()) && user_can('Show Order') && restaurant()->hide_new_orders == 0): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.todayOrders');

$__html = app('livewire')->mount($__name, $__params, 'lw-355412944-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
          <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

          <!--[if BLOCK]><![endif]--><?php if(in_array('Reservation', restaurant_modules()) && user_can('Show Reservation') && restaurant()->hide_new_reservations == 0 && in_array('Table Reservation', restaurant_modules())): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.todayReservations');

$__html = app('livewire')->mount($__name, $__params, 'lw-355412944-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
          <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

          <!--[if BLOCK]><![endif]--><?php if(in_array('Waiter Request', restaurant_modules()) && user_can('Manage Waiter Request') && restaurant()->hide_new_waiter_request == 0): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.activeWaiterRequests');

$__html = app('livewire')->mount($__name, $__params, 'lw-355412944-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
          <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

          <!--[if BLOCK]><![endif]--><?php if(request()->routeIs('pos.*')): ?>
          <?php if (isset($component)) { $__componentOriginalecbfaf65020c31547e71f42b3a8afb5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-link','data' => ['href' => ''.e(route('dashboard')).'','class' => 'inline-flex items-center px-1 py-2 gap-1 text-xs ltr:mr-2 rtl:ml-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('dashboard')).'','class' => 'inline-flex items-center px-1 py-2 gap-1 text-xs ltr:mr-2 rtl:ml-2']); ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4" viewBox="0 0 16 16">
              <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2M3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.39.39 0 0 0-.029-.518z"/>
              <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.95 11.95 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0"/>
            </svg>
            <span class="hidden lg:block"><?php echo app('translator')->get('menu.dashboard'); ?></span>
           <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f)): ?>
<?php $attributes = $__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f; ?>
<?php unset($__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalecbfaf65020c31547e71f42b3a8afb5f)): ?>
<?php $component = $__componentOriginalecbfaf65020c31547e71f42b3a8afb5f; ?>
<?php unset($__componentOriginalecbfaf65020c31547e71f42b3a8afb5f); ?>
<?php endif; ?>
            
          <?php if (isset($component)) { $__componentOriginalecbfaf65020c31547e71f42b3a8afb5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-link','data' => ['href' => 'javascript:;','onclick' => '
              try { window.dispatchEvent(new CustomEvent(\'pos:show-add-customer\')); } catch (e) {}
              try { if (window.Livewire && typeof window.Livewire.dispatch === \'function\') window.Livewire.dispatch(\'showAddCustomerModal\'); } catch (e) {}
            ','class' => 'inline-flex items-center px-1 py-2 gap-1 text-xs ltr:mr-2 rtl:ml-2','title' => 'Add Customer Details']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => 'javascript:;','onclick' => '
              try { window.dispatchEvent(new CustomEvent(\'pos:show-add-customer\')); } catch (e) {}
              try { if (window.Livewire && typeof window.Livewire.dispatch === \'function\') window.Livewire.dispatch(\'showAddCustomerModal\'); } catch (e) {}
            ','class' => 'inline-flex items-center px-1 py-2 gap-1 text-xs ltr:mr-2 rtl:ml-2','title' => 'Add Customer Details']); ?>
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5.5 11H16.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M11 16.5V5.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
            <span class="hidden lg:block">Customer</span>
           <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f)): ?>
<?php $attributes = $__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f; ?>
<?php unset($__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalecbfaf65020c31547e71f42b3a8afb5f)): ?>
<?php $component = $__componentOriginalecbfaf65020c31547e71f42b3a8afb5f; ?>
<?php unset($__componentOriginalecbfaf65020c31547e71f42b3a8afb5f); ?>
<?php endif; ?>

          <div class="hidden lg:flex items-center gap-2 ltr:mr-2 rtl:ml-2">
            <button
                type="button"
                onclick="var el = document.getElementById('pos-header-search'); if (el) el.value = ''; var inPage = document.getElementById('pos-products-search'); if (inPage) { inPage.value = ''; inPage.dispatchEvent(new Event('input', { bubbles: true })); } window.dispatchEvent(new CustomEvent('pos:reset-search')); window.dispatchEvent(new CustomEvent('pos:reset-filters')); if (window.Livewire && window.Livewire.dispatch) { window.Livewire.dispatch('pos-reset-filters'); window.Livewire.dispatch('pos-reset-search'); }"
                style="background-color: #011646; border-color: #011646;"
                class="text-white justify-center sm:w-auto font-semibold rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center gap-1"
                title="<?php echo app('translator')->get('app.reset'); ?>"
              >
              <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.4084 4.23333C11.6834 4.01667 10.8834 3.875 10 3.875C6.00836 3.875 2.77502 7.10833 2.77502 11.1C2.77502 15.1 6.00836 18.3333 10 18.3333C13.9917 18.3333 17.225 15.1 17.225 11.1083C17.225 9.625 16.775 8.24167 16.0084 7.09167" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13.4417 4.43333L11.0333 1.66667" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13.4417 4.43333L10.6334 6.48333" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
                <!-- <?php echo app('translator')->get('app.reset'); ?> -->
              </button>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500 dark:text-gray-400">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.58334 17.5C13.9556 17.5 17.5 13.9556 17.5 9.58333C17.5 5.21108 13.9556 1.66667 9.58334 1.66667C5.21108 1.66667 1.66667 5.21108 1.66667 9.58333C1.66667 13.9556 5.21108 17.5 9.58334 17.5Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M18.3333 18.3333L16.6667 16.6667" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              </div>
              <input
                id="pos-header-search"
                type="text"
                class="w-64 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-gray-600 rounded-md shadow-sm block pl-10 pr-3 py-2 border-gray-200 rounded-lg text-sm"
                placeholder="<?php echo app('translator')->get('placeholders.searchMenuItems'); ?>"
                oninput="var v = this.value; window.dispatchEvent(new CustomEvent('pos:set-search', { detail: { value: v } })); if (window.Livewire && window.Livewire.dispatch) window.Livewire.dispatch('pos-set-search', { value: v }); var inPage = document.getElementById('pos-products-search'); if (inPage && inPage.value !== v) { inPage.value = v; inPage.dispatchEvent(new Event('input', { bubbles: true })); }"
              />
            </div>
          </div>
          <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
          
        </div>
      </div>

      <div class="flex items-center gap-4 w-fit justify-end">

        <!-- Search mobile -->
        <button id="toggleSidebarMobileSearch" type="button"
          class="p-2 text-gray-500 rounded-lg hidden hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
          <span class="sr-only">Search</span>
          <!-- Search icon -->
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
              clip-rule="evenodd"></path>
          </svg>
        </button>


        <!--[if BLOCK]><![endif]--><?php if(languages()->count() > 1): ?>
         <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.languageSwitcher');

$__html = app('livewire')->mount($__name, $__params, 'lw-355412944-3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('restaurant.stop-impersonate-restaurant');

$__html = app('livewire')->mount($__name, $__params, 'lw-355412944-4', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

        <?php if(restaurant()->package->package_type == \App\Enums\PackageType::DEFAULT): ?>
            <a href="<?php echo e(route('pricing.plan')); ?>" wire:navigate class="inline-flex" >
                <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['class' => 'inline-flex items-center gap-2 shadow-md text-skin-base dark:text-skin-base hover:origin-center group px-2 sm:px-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'inline-flex items-center gap-2 shadow-md text-skin-base dark:text-skin-base hover:origin-center group px-2 sm:px-3']); ?>
                    <svg class="w-5 h-5 text-current group-hover:scale-110 duration-500" width="24" height="24" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="currentColor"><path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.73 1.73 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.73 1.73 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.73 1.73 0 0 0 3.407 2.31zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z"/></svg>
                    <span class="hidden sm:inline"><?php echo app('translator')->get('modules.settings.upgradeLicense'); ?></span>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $attributes = $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $component = $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
            </a>
        <?php elseif(restaurant()->package->package_type == \App\Enums\PackageType::TRIAL): ?>
        <a href="<?php echo e(route('pricing.plan')); ?>" wire:navigate class=" hidden lg:inline-flex" >
            <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['class' => 'px-2 sm:px-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'px-2 sm:px-3']); ?>
                <?php
                    $daysLeftInTrial = floor(now(timezone())->diffInDays(\Carbon\Carbon::parse(restaurant()->trial_ends_at)->addDays(1)));
                ?>
                <span class="text-xs sm:text-sm"><?php echo e($daysLeftInTrial > 0 ? $daysLeftInTrial .' ' . __('modules.package.daysLeftTrial') : __('modules.package.trialExpired')); ?></span>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $attributes = $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $component = $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
        </a>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <button onclick="openFullscreen();" type="button" data-tooltip-target="fullscreen-tooltip-toggle"
        class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fullscreen" viewBox="0 0 16 16">
            <path d="M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5M.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5"/>
          </svg>
        </button>

        <div id="fullscreen-tooltip-toggle" role="tooltip"
          class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
          View in Fullscreen
          <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        <button id="theme-toggle" data-tooltip-target="tooltip-toggle" type="button"
          class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
          <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
          </svg>
          <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
              fill-rule="evenodd" clip-rule="evenodd"></path>
          </svg>
        </button>

        <div id="tooltip-toggle" role="tooltip"
          class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
          <?php echo app('translator')->get('app.toggleDarkMode'); ?>

          <div class="tooltip-arrow" data-popper-arrow></div>
        </div>


        <!-- Profile -->
        <div class="flex items-center w-8">
          <div class="flex w-full">
            <button type="button"
              class="inline-flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
              id="user-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-2">
              <span class="sr-only">Open user menu</span>
              <img class="w-8 h-8 rounded-full" src="<?php echo e(auth()->user()->profile_photo_path ? asset_url_local_s3(auth()->user()->profile_photo_path):auth()->user()->profile_photo_url); ?>" alt="user photo">
            </button>
          </div>
          <!-- Dropdown menu -->
          <div
            class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
            id="dropdown-2">
            <div class="px-4 py-3" role="none">
              <p class="text-sm text-gray-900 dark:text-white" role="none">
                <?php echo e(auth()->user()->name); ?>

              </p>
              <p class="text-sm font-medium text-gray-500 truncate dark:text-gray-300" role="none">
                <?php echo e(auth()->user()->email); ?>

              </p>
            </div>
            <ul class="py-1" role="none">
              <li>
                <a href="<?php echo e(route('profile.show')); ?>" wire:navigate
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                  role="menuitem"><?php echo app('translator')->get('menu.profile'); ?></a>
              </li>

              <!--[if BLOCK]><![endif]--><?php if(user_can('Manage Settings') && in_array('Settings', restaurant_modules())): ?>
              <li>
                <a href="<?php echo e(route('settings.index')); ?>" wire:navigate
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                  role="menuitem"><?php echo app('translator')->get('menu.settings'); ?></a>
              </li>

              <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

              <li>
                <form method="POST" action="<?php echo e(route('logout')); ?>" x-data>
                  <?php echo csrf_field(); ?>
                  <a href="<?php echo e(route('logout')); ?>" @click.prevent="$root.submit();"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                    role="menuitem"><?php echo app('translator')->get('menu.signOut'); ?></a>
                </form>
              </li>
            </ul>
          </div>
        </div>


        <!-- Profile -->
        <div class="flex items-center w-8">
          <div class="flex w-full">
            <button type="button"
              class="inline-flex items-center justify-center w-10 h-10 text-gray-500 bg-gray-100 rounded-full hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-600"
              id="user-menu-button-3" aria-expanded="false" data-dropdown-toggle="dropdown-3" data-dropdown-placement="left-end">
              <span class="sr-only">Open user menu</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24" viewBox="0 0 512 512" xml:space="preserve"><path d="M112 441.328h288v32H112zM0 38.672v352h200v34.656h112v-34.656h200v-352zm216 323.25v-16h80v16zm248-35.25H48v-240h416z" style="fill:currentColor"/></svg>

            </button>
          </div>
          <!-- Dropdown menu -->
          <div
            class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
            id="dropdown-3">

            <ul class="py-1" role="none">
              <!--[if BLOCK]><![endif]--><?php if(in_array('Customer Display', restaurant_modules())): ?>
              <li>
                <a href="<?php echo e(route('customer.display')); ?>" target="_blank"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                  role="menuitem"><?php echo app('translator')->get('menu.customerDisplay'); ?></a>
              </li>
              <li>
                <a href="<?php echo e(route('customer.order-board')); ?>" target="_blank"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                  role="menuitem"><?php echo app('translator')->get('modules.order.customerOrderBoard'); ?></a>
              </li>
              <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

              <!--[if BLOCK]><![endif]--><?php if(module_enabled('Kiosk') && in_array('Kiosk', restaurant_modules())): ?>
                <li>
                    <a href="<?php echo e(route('kiosk.restaurant', restaurant()->hash). '?branch=' . branch()->unique_hash); ?>" target="_blank"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                    role="menuitem"><?php echo app('translator')->get('kiosk::modules.menu.kiosk'); ?></a>
                </li>
              <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            </ul>
          </div>
        </div>



        </div>

      </div>
    </div>
  </div>
</nav>
<?php /**PATH C:\xampp\htdocs\script\resources\views/navigation-menu.blade.php ENDPATH**/ ?>