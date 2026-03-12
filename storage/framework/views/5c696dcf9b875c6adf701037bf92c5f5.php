<div>
    <button type="button" wire:click="toggleLanguage" data-tooltip-target="tooltip-language"
        class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 inline-flex items-center justify-center gap-1">
        <span class="sr-only"><?php echo app('translator')->get('app.language'); ?></span>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"/>
            <path d="M7.99998 3H8.99998C7.04998 8.84 7.04998 15.16 8.99998 21H7.99998"/>
            <path d="M15 3C16.95 8.84 16.95 15.16 15 21"/>
            <path d="M3 16V15C8.84 16.95 15.16 16.95 21 15V16"/>
            <path d="M3 9.00001C8.84 7.05001 15.16 7.05001 21 9.00001"/>
        </svg>
        <span class="hidden sm:inline text-sm"><?php echo e($currentLanguageName); ?></span>
    </button>
    <div id="tooltip-language" role="tooltip"
        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
        <?php echo app('translator')->get('app.language'); ?>
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</div>
<?php /**PATH E:\nomu\testfood\POS\resources\views/livewire/settings/language-switcher.blade.php ENDPATH**/ ?>