@assets
<style>
  #pos-header-search::placeholder {
    color: #A3A3A3 !important;
    opacity: 1;
  }
  #pos-header-search::-webkit-input-placeholder {
    color: #A3A3A3 !important;
  }
  #pos-header-search::-moz-placeholder {
    color: #A3A3A3 !important;
    opacity: 1;
  }
  /* MultiPOS header chip: plain CSS so responsive rules work even if Tailwind md:/xl: variants are missing from production CSS */
  .multipos-nav-status {
    display: flex;
    align-items: center;
    flex-shrink: 0;
    box-sizing: border-box;
    background-color: #fff;
    border: 1px solid #E0E5F2;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    line-height: 1.25rem;
    overflow: hidden;
    max-width: 80px;
    padding: 0.5rem;
  }
  @media (min-width: 768px) {
    .multipos-nav-status {
      max-width: 130px;
    }
  }
  @media (min-width: 1280px) {
    .multipos-nav-status {
      max-width: none;
      padding: 0.625rem 0.75rem;
    }
  }
  @media (min-width: 1280px) and (max-width: 1456px) {
    .multipos-nav-status {
      max-width: 150px;
    }
  }
  .dark .multipos-nav-status {
    background-color: rgb(75 85 99);
    border-color: rgb(156 163 175);
  }

  /* POS / nav header: plain CSS for sm/md/lg/xl so production builds without those Tailwind variants still match */
  .pos-nav-inner {
    padding: 0.75rem;
  }
  @media (min-width: 1024px) {
    .pos-nav-inner {
      padding-top: 0.75rem;
      padding-bottom: 0.75rem;
      padding-left: 0.75rem;
      padding-right: 1.25rem;
    }
  }

  .pos-nav-mobile-menu-btn {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  @media (min-width: 1024px) {
    .pos-nav-mobile-menu-btn {
      display: none;
    }
  }

  .pos-nav-sidebar-toggle {
    display: none;
  }
  @media (min-width: 1024px) {
    .pos-nav-sidebar-toggle.show-on-lg {
      display: inline-flex;
      align-items: center;
    }
  }

  .pos-header-search-wrap {
    margin-inline-start: 0.25rem;
  }
  @media (min-width: 640px) {
    .pos-header-search-wrap {
      margin-inline-start: 1rem;
    }
  }

  #pos-header-search {
    width: 7rem;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
  }
  @media (min-width: 640px) {
    #pos-header-search {
      width: 9rem;
    }
  }
  @media (min-width: 768px) {
    #pos-header-search {
      width: 11rem;
    }
  }
  @media (min-width: 1024px) {
    #pos-header-search {
      width: 7rem;
    }
  }
  @media (min-width: 1280px) {
    #pos-header-search {
      width: 12rem;
      padding-top: 0.625rem;
      padding-bottom: 0.625rem;
    }
  }

  .pos-nav-add-customer {
    width: auto;
    padding: 0.5rem;
  }
  @media (min-width: 1280px) {
    .pos-nav-add-customer {
      padding: 0.625rem 0.75rem;
    }
  }

  .pos-nav-add-customer-label {
    display: none;
  }
  @media (min-width: 1280px) {
    .pos-nav-add-customer-label {
      display: block;
    }
  }

  .pos-nav-reset-btn {
    padding: 0.5rem;
  }
  @media (min-width: 640px) {
    .pos-nav-reset-btn {
      width: auto;
    }
  }
  @media (min-width: 1280px) {
    .pos-nav-reset-btn {
      padding: 0.625rem 0.75rem;
    }
  }

  .pos-nav-upgrade-btn {
    padding-left: 0.5rem;
    padding-right: 0.5rem;
  }
  @media (min-width: 640px) {
    .pos-nav-upgrade-btn {
      padding-left: 0.75rem;
      padding-right: 0.75rem;
    }
  }

  .pos-nav-upgrade-label {
    display: none;
  }
  @media (min-width: 640px) {
    .pos-nav-upgrade-label {
      display: inline;
    }
  }

  .pos-nav-trial-inline {
    display: none;
  }
  @media (min-width: 1024px) {
    .pos-nav-trial-inline {
      display: inline-flex;
    }
  }

  .pos-nav-trial-btn {
    padding-left: 0.5rem;
    padding-right: 0.5rem;
  }
  @media (min-width: 640px) {
    .pos-nav-trial-btn {
      padding-left: 0.75rem;
      padding-right: 0.75rem;
    }
  }

  .pos-nav-trial-text {
    font-size: 0.75rem;
    line-height: 1rem;
  }
  @media (min-width: 640px) {
    .pos-nav-trial-text {
      font-size: 0.875rem;
      line-height: 1.25rem;
    }
  }

  .pos-nav-fs-tooltip {
    padding-left: 0.5rem;
    padding-right: 0.5rem;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
  }
  @media (min-width: 1280px) {
    .pos-nav-fs-tooltip {
      padding-left: 0.75rem;
      padding-right: 0.75rem;
    }
  }

  /* Today-orders / reservations / waiter-requests counter buttons: plain CSS so
     they show on md+ even when Tailwind responsive variants are purged in production. */
  .nav-counter-btn {
    display: none;
    padding-top: 0.25rem;
    padding-bottom: 0.25rem;
  }
  @media (min-width: 768px) {
    .nav-counter-btn {
      display: inline-flex;
    }
  }
  @media (min-width: 1024px) {
    .nav-counter-btn {
      padding-left: 0.5rem;
      padding-right: 0.5rem;
    }
  }
  .nav-counter-btn .nav-counter-badge {
    padding: 0.125rem 0.2rem;
    margin-inline-start: 0.125rem;
  }
  @media (min-width: 1024px) {
    .nav-counter-btn .nav-counter-badge {
      padding-left: 0.2rem;
      padding-right: 0.2rem;
      margin-inline-start: 0.2rem;
    }
  }
</style>
@endassets
<nav class="fixed z-30 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
  <div class="pos-nav-inner">
    <div class="flex items-center justify-between">

      <div class="flex items-center justify-start">
        <button type="button" id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" onclick="if(window.toggleMobileSidebar)window.toggleMobileSidebar();(event||window.event).stopPropagation();"
          class="pos-nav-mobile-menu-btn p-2 text-gray-600 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
          <svg id="toggleSidebarMobileHamburger" class="pos-mobile-nav-hamburger w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
              clip-rule="evenodd"></path>
          </svg>
          <svg id="toggleSidebarMobileClose" class="pos-mobile-nav-close hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
        @if (request()->routeIs('pos.*'))
        <a href="javascript:history.back()" title="@lang('menu.back')" class="ltr:mr-1 rtl:ml-1 p-1.5 text-gray-500 rounded-lg hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-600 rtl:scale-x-[-1]">
          <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6.5353 2.14191C6.82458 1.91616 7.3264 1.53709 7.49449 1.41012C7.84188 1.15425 7.91612 0.66518 7.66026 0.317773C7.40439 -0.0296452 6.91483 -0.103495 6.56741 0.152375L6.56514 0.154093C6.38916 0.287012 5.86935 0.679633 5.574 0.910124C4.98152 1.3725 4.18892 2.00836 3.39403 2.69852C2.60303 3.38531 1.79189 4.14122 1.17235 4.84238C0.863379 5.19207 0.58555 5.54654 0.380732 5.88629C0.18884 6.2046 3.60122e-06 6.60761 0 7.03106C-3.60101e-06 7.45451 0.188834 7.85752 0.380725 8.17583C0.585544 8.51559 0.863374 8.87006 1.17235 9.21975C1.79189 9.92091 2.60303 10.6768 3.39405 11.3636C4.18895 12.0538 4.98156 12.6896 5.57404 13.152C5.86912 13.3823 6.38872 13.7747 6.56517 13.908L6.56796 13.9101C6.91538 14.166 7.40444 14.0918 7.66031 13.7444C7.91618 13.3969 7.84124 12.9073 7.49382 12.6515C7.32572 12.5245 6.82462 12.146 6.53533 11.9202C5.95594 11.4681 5.18604 10.8502 4.41844 10.1838C3.64695 9.51393 2.8956 8.81027 2.34326 8.18516C2.0663 7.87171 1.85585 7.59636 1.71888 7.36914C1.59006 7.15545 1.56327 7.03293 1.56327 7.03293C1.56327 7.03293 1.59005 6.90669 1.71888 6.69299C1.85586 6.46577 2.06631 6.19042 2.34327 5.87697C2.8956 5.25185 3.64695 4.5482 4.41843 3.87836C5.18602 3.2119 5.95591 2.59407 6.5353 2.14191Z" fill="currentColor"/>
            <path d="M13.827 2.14191C14.1162 1.91616 14.6181 1.53709 14.7862 1.41012C15.1335 1.15425 15.2078 0.66518 14.9519 0.317773C14.6961 -0.0296452 14.2065 -0.103495 13.8591 0.152375L13.8568 0.154093C13.6809 0.286986 13.161 0.679617 12.8657 0.910124C12.2732 1.3725 11.4806 2.00836 10.6857 2.69852C9.89469 3.38531 9.08355 4.14122 8.46402 4.84238C8.15505 5.19207 7.87722 5.54654 7.6724 5.88629C7.48051 6.2046 7.29167 6.60761 7.29167 7.03106C7.29166 7.45451 7.4805 7.85752 7.67239 8.17583C7.87721 8.51559 8.15504 8.87006 8.46402 9.21975C9.08355 9.92091 9.8947 10.6768 10.6857 11.3636C11.4806 12.0538 12.2732 12.6896 12.8657 13.152C13.1608 13.3823 13.6806 13.7749 13.8569 13.9081L13.8596 13.9101C14.207 14.166 14.6961 14.0918 14.952 13.7444C15.2078 13.3969 15.1329 12.9073 14.7855 12.6515C14.6174 12.5245 14.1163 12.146 13.827 11.9202C13.2476 11.4681 12.4777 10.8502 11.7101 10.1838C10.9386 9.51393 10.1873 8.81027 9.63493 8.18516C9.35797 7.87171 9.14752 7.59636 9.01055 7.36914C8.88173 7.15545 8.85494 7.03293 8.85494 7.03293C8.85494 7.03293 8.88172 6.90669 9.01055 6.69299C9.14753 6.46577 9.35798 6.19042 9.63494 5.87697C10.1873 5.25185 10.9386 4.5482 11.7101 3.87836C12.4777 3.2119 13.2476 2.59407 13.827 2.14191Z" fill="currentColor"/>
          </svg>
        </a>
        @endif

        <a href="{{ route('dashboard') }}" class="flex items-center app-logo">
          <img src="{{ restaurant()->logoUrl }}" class="h-8 dark:invert" alt="" onerror="this.onerror=null; this.style.visibility='hidden';" />

          {{-- @if (restaurant()->show_logo_text)
          <span class="self-center text-xl font-semibold sm:text-xl whitespace-nowrap dark:text-white hidden md:block ltr:mr-2 rtl:ml-2">{{ Str::limit(restaurant()->name, 10) }}</span>
          @endif --}}
        </a>

        <button id="toggle-sidebar" type="button" class="pos-nav-sidebar-toggle items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 mx-2 {{ request()->routeIs('pos.*') ? '' : 'show-on-lg' }}">
          <svg id="toggle-sidebar-icon" class="w-6 h-6 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7M19 19l-7-7 7-7"/>
          </svg>
        </button>

        <div class="flex items-center gap-2">
          @if (request()->routeIs('pos.*'))
          {{-- POS screen order: 1) Search, 2) MultiPOS last update, 3) Customer, 4) Reset, 5) rest (orders/reservations/waiter below) --}}

          <div class="pos-header-search-wrap flex items-center gap-2">
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
                class="border-[#E0E5F2] dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-gray-600 rounded-md shadow-sm block pl-10 pr-3 py-2 border-gray-200 rounded-lg text-sm"
                placeholder="@lang('placeholders.searchMenuItems')"
                oninput="var v = this.value; window.dispatchEvent(new CustomEvent('pos:set-search', { detail: { value: v } })); if (window.Livewire && window.Livewire.dispatch) window.Livewire.dispatch('pos-set-search', { value: v }); var inPage = document.getElementById('pos-products-search'); if (inPage && inPage.value !== v) { inPage.value = v; inPage.dispatchEvent(new Event('input', { bubbles: true })); }"
              />
            </div>
          </div>

          @if(module_enabled('MultiPOS') && ($posMachine = pos_machine()) && $posMachine->status === 'active')
          <div class="multipos-nav-status">
            <svg class="shrink-0" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16.78 9.7L11.11 15.37C10.97 15.51 10.78 15.59 10.58 15.59C10.38 15.59 10.19 15.51 10.05 15.37L7.22 12.54C6.93 12.25 6.93 11.77 7.22 11.48C7.51 11.19 7.99 11.19 8.28 11.48L10.58 13.78L15.72 8.64C16.01 8.35 16.49 8.35 16.78 8.64C17.07 8.93 17.07 9.4 16.78 9.7Z" fill="#34C759"/>
            </svg>
            <span class="ml-1 truncate text-[#A3A3A3]" style="color: #A3A3A3;">{{ $posMachine->alias ?? __('multipos::messages.registration.device') }}</span>
            @if($posMachine->last_seen_at)
              <span class="ms-1 shrink-0 inline text-[#A3A3A3]" style="color: #A3A3A3;">. {{ $posMachine->last_seen_at->diffForHumans() }}</span>
            @endif
          </div>
          @endif

          <x-primary-link
            href="javascript:;"
            onclick="
              try { window.dispatchEvent(new CustomEvent('pos:show-add-customer')); } catch (e) {}
              try { if (window.Livewire && typeof window.Livewire.dispatch === 'function') window.Livewire.dispatch('showAddCustomerModal'); } catch (e) {}
            "
            class="pos-nav-add-customer inline-flex items-center gap-1 text-xs"
            title="{{ __('app.addCustomerDetails') }}"
          >
          <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M10 10C12.3012 10 14.1667 8.13454 14.1667 5.83335C14.1667 3.53217 12.3012 1.66669 10 1.66669C7.69882 1.66669 5.83334 3.53217 5.83334 5.83335C5.83334 8.13454 7.69882 10 10 10Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M2.84167 18.3333C2.84167 15.1083 6.05001 12.5 10 12.5C10.8 12.5 11.575 12.6083 12.3 12.8083" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M18.3333 15C18.3333 15.2667 18.3 15.525 18.2333 15.775C18.1583 16.1083 18.025 16.4334 17.85 16.7167C17.275 17.6834 16.2167 18.3334 15 18.3334C14.1417 18.3334 13.3667 18.0083 12.7833 17.475C12.5333 17.2583 12.3166 17 12.15 16.7167C11.8416 16.2167 11.6667 15.625 11.6667 15C11.6667 14.1 12.025 13.275 12.6083 12.675C13.2167 12.05 14.0667 11.6667 15 11.6667C15.9833 11.6667 16.875 12.0917 17.475 12.775C18.0083 13.3667 18.3333 14.15 18.3333 15Z" stroke="white" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M16.2416 14.9833H13.7583" stroke="white" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M15 13.7667V16.2583" stroke="white" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
            <span class="pos-nav-add-customer-label">@lang('app.customer')</span>
          </x-primary-link>

          <div class="flex items-center gap-2">
            <button
                type="button"
                onclick="var el = document.getElementById('pos-header-search'); if (el) el.value = ''; var inPage = document.getElementById('pos-products-search'); if (inPage) { inPage.value = ''; inPage.dispatchEvent(new Event('input', { bubbles: true })); } window.dispatchEvent(new CustomEvent('pos:reset-search')); window.dispatchEvent(new CustomEvent('pos:reset-filters')); if (window.Livewire && window.Livewire.dispatch) { window.Livewire.dispatch('pos-reset-filters'); window.Livewire.dispatch('pos-reset-search'); }"
                style="background-color: var(--brand-primary); border-color: var(--brand-primary);"
                class="pos-nav-reset-btn text-white justify-center font-semibold rounded-lg text-sm text-center inline-flex items-center gap-1"
                title="@lang('app.reset')"
              >
              <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.4084 4.23333C11.6834 4.01667 10.8834 3.875 10 3.875C6.00836 3.875 2.77502 7.10833 2.77502 11.1C2.77502 15.1 6.00836 18.3333 10 18.3333C13.9917 18.3333 17.225 15.1 17.225 11.1083C17.225 9.625 16.775 8.24167 16.0084 7.09167" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13.4417 4.43333L11.0333 1.66667" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13.4417 4.43333L10.6334 6.48333" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              </button>
          </div>

          @endif

          {{-- POS-only: show live order/reservation/waiter counters on the left --}}
          @if (request()->routeIs('pos.*'))
          <div class="pos-nav-counters flex items-center gap-2">
            @if (in_array('Order', restaurant_modules()) && user_can('Show Order') && restaurant()->hide_new_orders == 0)
              @livewire('dashboard.todayOrders')
            @endif

            @if (in_array('Reservation', restaurant_modules()) && user_can('Show Reservation') && restaurant()->hide_new_reservations == 0 && in_array('Table Reservation', restaurant_modules()))
              @livewire('dashboard.todayReservations')
            @endif

            @if (in_array('Waiter Request', restaurant_modules()) && user_can('Manage Waiter Request') && restaurant()->hide_new_waiter_request == 0)
              @livewire('dashboard.activeWaiterRequests')
            @endif
          </div>
          @endif

          {{-- Non-POS: dark mode, language, profile, display, etc. on the LEFT beside logo --}}
          @if (!request()->routeIs('pos.*'))
          <button id="toggleSidebarMobileSearch" type="button"
            class="p-2 text-gray-500 rounded-lg hidden hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            <span class="sr-only">Search</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
            </svg>
          </button>
          @livewire('restaurant.stop-impersonate-restaurant')
          @if (restaurant()->package->package_type == \App\Enums\PackageType::DEFAULT)
            <a href="{{ route('pricing.plan') }}" wire:navigate class="inline-flex" >
              <x-secondary-button class="pos-nav-upgrade-btn inline-flex items-center gap-2 shadow-md text-skin-base dark:text-skin-base hover:origin-center group">
                <svg class="w-5 h-5 text-current group-hover:scale-110 duration-500" width="24" height="24" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="currentColor"><path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.73 1.73 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.73 1.73 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.73 1.73 0 0 0 3.407 2.31zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z"/></svg>
                <span class="pos-nav-upgrade-label">@lang('modules.settings.upgradeLicense')</span>
              </x-secondary-button>
            </a>
          @elseif (restaurant()->package->package_type == \App\Enums\PackageType::TRIAL)
            <a href="{{ route('pricing.plan') }}" wire:navigate class="pos-nav-trial-inline" >
              <x-secondary-button class="pos-nav-trial-btn">
                @php $daysLeftInTrial = floor(now(timezone())->diffInDays(\Carbon\Carbon::parse(restaurant()->trial_ends_at)->addDays(1))); @endphp
                <span class="pos-nav-trial-text">{{ $daysLeftInTrial > 0 ? $daysLeftInTrial .' ' . __('modules.package.daysLeftTrial') : __('modules.package.trialExpired') }}</span>
              </x-secondary-button>
            </a>
          @endif
          <button onclick="openFullscreen();" type="button" data-tooltip-target="fullscreen-tooltip-toggle"
            class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fullscreen" viewBox="0 0 16 16">
              <path d="M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5M.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5"/>
            </svg>
          </button>
          <div id="fullscreen-tooltip-toggle" role="tooltip" class="pos-nav-fs-tooltip absolute z-10 invisible inline-block py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">@lang('app.viewInFullscreen')<div class="tooltip-arrow" data-popper-arrow></div></div>
          <button id="theme-toggle" data-tooltip-target="tooltip-toggle" type="button"
            onclick="window.toggleColorTheme && window.toggleColorTheme()"
            class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
          </button>
          <div id="tooltip-toggle" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">@lang('app.toggleDarkMode')<div class="tooltip-arrow" data-popper-arrow></div></div>
          @livewire('settings.languageSwitcher')
          <!-- Profile -->
        <div class="flex items-center w-8">
          <div class="flex w-full">
            <button type="button"
              class="inline-flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
              id="user-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-2">
              <span class="sr-only">Open user menu</span>
              <img class="w-8 h-8 rounded-full" src="{{ auth()->user()->profile_photo_path ? asset_url_local_s3(auth()->user()->profile_photo_path):auth()->user()->profile_photo_url }}" alt="user photo">
            </button>
          </div>
          <!-- Dropdown menu -->
          <div
            class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
            id="dropdown-2">
            <div class="px-4 py-3" role="none">
              <p class="text-sm text-gray-900 dark:text-white" role="none">
                {{ auth()->user()->name }}
              </p>
              <p class="text-sm font-medium text-gray-500 truncate dark:text-gray-300" role="none">
                {{ auth()->user()->email }}
              </p>
            </div>
            <ul class="py-1" role="none">
              <li>
                <a href="{{ route('profile.show') }}" wire:navigate
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                  role="menuitem">@lang('menu.profile')</a>
              </li>

              @if (user_can('Manage Settings') && in_array('Settings', restaurant_modules()))
              <li>
                <a href="{{ route('settings.index') }}" wire:navigate
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                  role="menuitem">@lang('menu.settings')</a>
              </li>

              @endif

              <li>
                <form method="POST" action="{{ route('logout') }}" x-data>
                  @csrf
                  <a href="{{ route('logout') }}" @click.prevent="$root.submit();"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                    role="menuitem">@lang('menu.signOut')</a>
                </form>
              </li>
            </ul>
          </div>
        </div>
        @endif

        @if (!request()->routeIs('pos.*'))
        <!-- Display (Customer Display, Order Board, Kiosk) -->
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
              @if (in_array('Customer Display', restaurant_modules()))
              <li>
                <a href="{{ route('customer.display') }}" target="_blank"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                  role="menuitem">@lang('menu.customerDisplay')</a>
              </li>
              <li>
                <a href="{{ route('customer.order-board') }}" target="_blank"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                  role="menuitem">@lang('modules.order.customerOrderBoard')</a>
              </li>
              @endif

              @if (module_enabled('Kiosk') && in_array('Kiosk', restaurant_modules()))
                <li>
                    <a href="{{ route('kiosk.restaurant', restaurant()->hash). '?branch=' . branch()->unique_hash }}" target="_blank"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                    role="menuitem">@lang('kiosk::modules.menu.kiosk')</a>
                </li>
              @endif

            </ul>
          </div>
        </div>
        @endif

        </div>
      </div>

      {{-- Right side: non-POS only the 3 icons (order, reservation, waiter) --}}
      <div class="flex items-center gap-4 w-fit justify-end">
        @if (!request()->routeIs('pos.*'))
          @if (in_array('Order', restaurant_modules()) && user_can('Show Order') && restaurant()->hide_new_orders == 0)
            @livewire('dashboard.todayOrders')
          @endif
          @if (in_array('Reservation', restaurant_modules()) && user_can('Show Reservation') && restaurant()->hide_new_reservations == 0 && in_array('Table Reservation', restaurant_modules()))
            @livewire('dashboard.todayReservations')
          @endif
          @if (in_array('Waiter Request', restaurant_modules()) && user_can('Manage Waiter Request') && restaurant()->hide_new_waiter_request == 0)
            @livewire('dashboard.activeWaiterRequests')
          @endif
        @endif
      </div>
    </div>
  </div>
</nav>
