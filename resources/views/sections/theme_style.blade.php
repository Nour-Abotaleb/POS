<style>
    :root {
        --color-base: {{ $baseColor }};
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
