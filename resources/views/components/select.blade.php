@props(['disabled' => false])

@if (!isset($append))
<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-gray-300
  focus:ring-gray-300 rounded-md shadow-sm bg-white pe-8 rtl:pe-0 rtl:ps-8 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-gray-600 dark:focus:ring-gray-600']) !!}>
  {{ $slot }}
</select>
@else
<div class="flex">
  <select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-gray-300
    focus:ring-gray-300 rounded-l-md rtl:rounded-l-none rtl:rounded-r-md shadow-sm bg-white pe-8 rtl:pe-0 rtl:ps-8 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-gray-600 dark:focus:ring-gray-600']) !!}>
    {{ $slot }}
  </select>

  <span
    class="inline-flex items-center px-3 text-gray-900 bg-gray-100 border border-l-0 border-gray-300 rounded-r-md rtl:border-l rtl:border-r-0 rtl:rounded-r-none rtl:rounded-l-md mt-1 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700">
    {{ $append }}
  </span>
</div>
@endif
