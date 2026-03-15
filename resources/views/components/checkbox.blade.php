@php
    $themeStyle = 'accent-color: var(--brand-primary);';
    $mergedStyle = trim($themeStyle . ' ' . ($attributes->get('style') ?? ''));
@endphp
<input type="checkbox"
    {!! $attributes->merge([
        'class' => 'cursor-pointer rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 shadow-sm focus:ring-gray-500 dark:focus:ring-gray-600 dark:focus:ring-offset-gray-800 theme-checkbox'
    ])->except('style') !!}
    style="{{ $mergedStyle }}">
