<style>
    :root {
        --color-base: <?php echo e($baseColor); ?>;
        --livewire-progress-bar-color: #011646;
    }
    /* Force checkbox color to #011646 (overrides @tailwindcss/forms and browser default) */
    input[type="checkbox"],
    input[type="checkbox"].theme-checkbox {
        appearance: auto !important;
        -webkit-appearance: checkbox !important;
        accent-color: #011646 !important;
    }
    input[type="checkbox"]:checked,
    input[type="checkbox"].theme-checkbox:checked {
        accent-color: #011646 !important;
        background-color: #011646 !important;
        border-color: #011646 !important;
    }
</style>
<?php /**PATH C:\xampp\htdocs\script\resources\views/sections/theme_style.blade.php ENDPATH**/ ?>