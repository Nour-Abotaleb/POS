<style>
    :root {
        --color-base: <?php echo e($baseColor); ?>;
        --brand-primary: #011646;
        --livewire-progress-bar-color: var(--brand-primary);
    }
    .dark {
        --brand-primary: #4C8CE4;
    }
    /* Force checkbox color to theme brand (overrides @tailwindcss/forms and browser default) */
    input[type="checkbox"],
    input[type="checkbox"].theme-checkbox {
        appearance: auto !important;
        -webkit-appearance: checkbox !important;
        accent-color: var(--brand-primary) !important;
    }
    input[type="checkbox"]:checked,
    input[type="checkbox"].theme-checkbox:checked {
        accent-color: var(--brand-primary) !important;
        background-color: var(--brand-primary) !important;
        border-color: var(--brand-primary) !important;
    }
    /* Dark mode: invert black SVG icons to white */
    .dark img[src*="waiter.svg"],
    .dark img[src*="checkout.svg"],
    .dark img[src*="reservation.svg"],
    .dark img[style*="width:11px"],
    .dark img[style*="width: 11px"] {
        filter: invert(1);
    }
    /* Enlarge currency symbol image */
    img[style*="width:11px"],
    img[style*="width: 11px"] {
        width: 14px !important;
        height: 16px !important;
    }
</style>
<?php /**PATH E:\nomufood\POS\resources\views/sections/theme_style.blade.php ENDPATH**/ ?>