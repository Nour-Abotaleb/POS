import "./bootstrap";
import "flowbite";
// import './sidebar';
// import './sidebar';
// import './charts';
import ApexCharts from "apexcharts";
import swal from "sweetalert2";
window.Swal = swal;
window.ApexCharts = ApexCharts;

// Mobile sidebar toggle: global so inline onclick works on all screens (POS + others). Called from nav button and backdrop.
window.toggleMobileSidebar = function () {
    const sidebar = document.getElementById("sidebar");
    const backdrop = document.getElementById("sidebarBackdrop");
    const hamburger = document.getElementById("toggleSidebarMobileHamburger");
    const closeIcon = document.getElementById("toggleSidebarMobileClose");
    if (sidebar && backdrop && hamburger && closeIcon) {
        sidebar.classList.toggle("hidden");
        sidebar.classList.add("flex");
        backdrop.classList.toggle("hidden");
        hamburger.classList.toggle("hidden");
        closeIcon.classList.toggle("hidden");
    }
};

// import './dark-mode';

// Check localStorage immediately to set initial state
if (localStorage.getItem("menu-collapsed") === "true") {
    // Add a class to body or html to handle initial state
    document.documentElement.classList.add('menu-collapsed');
}

document.addEventListener("livewire:navigating", () => {
    // Mutate the HTML before the page is navigated away...
    initFlowbite();
});

// Re-init Flowbite after any Livewire DOM update (e.g. menus card switch, deferred load)
// Fixes: "Drawer with id drawer-create-product-default has not been initialized"
document.addEventListener("livewire:morphed", () => {
    if (typeof initFlowbite === "function") {
        initFlowbite();
    }
});

document.addEventListener('DOMContentLoaded', () => {
    initializeThemeToggle();
});

document.addEventListener('livewire:load', () => {
    initializeThemeToggle();
});

// Initialize theme toggle safely and idempotently
function initializeThemeToggle() {
    const themeToggleBtn = document.getElementById("theme-toggle");
    const themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
    const themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");

    // Ensure html has correct theme class before manipulating icons
    if (localStorage.getItem('color-theme') === 'dark' ||
        (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }

    // If required elements aren't present yet, do nothing
    if (!themeToggleBtn || !themeToggleDarkIcon || !themeToggleLightIcon) {
        return;
    }

    // Set initial icon visibility based on current theme
    if (document.documentElement.classList.contains('dark')) {
        themeToggleLightIcon.classList.remove('hidden');
        themeToggleDarkIcon.classList.add('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
        themeToggleLightIcon.classList.add('hidden');
    }

    // Avoid attaching multiple listeners
    if (themeToggleBtn.dataset.initialized === 'true') {
        return;
    }
    themeToggleBtn.dataset.initialized = 'true';

    let event = new Event("dark-mode");
    themeToggleBtn.addEventListener("click", function () {
        // Toggle html class and persist
        if (localStorage.getItem("color-theme")) {
            if (localStorage.getItem("color-theme") === "light") {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
            } else {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
            }
        } else {
            if (document.documentElement.classList.contains("dark")) {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
            } else {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
            }
        }

        // Sync icons
        if (document.documentElement.classList.contains('dark')) {
            themeToggleLightIcon.classList.remove('hidden');
            themeToggleDarkIcon.classList.add('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
            themeToggleLightIcon.classList.add('hidden');
        }

        document.dispatchEvent(event);
    });
}

// Observe for the theme toggle button being (re)inserted by Livewire and init once
function observeThemeToggleMount() {
    // Initialize now if present
    initializeThemeToggle();

    const observer = new MutationObserver(() => {
        const btn = document.getElementById('theme-toggle');
        if (btn && btn.dataset.initialized !== 'true') {
            initializeThemeToggle();
        }
    });
    if (document.body) {
        observer.observe(document.body, { childList: true, subtree: true });
    } else {
        document.addEventListener('DOMContentLoaded', () => {
            observer.observe(document.body, { childList: true, subtree: true });
        });
    }
}

document.addEventListener("livewire:navigated", () => {
    try {
        observeThemeToggleMount();
    } catch (e) { /* theme toggle may fail if elements missing */ }

    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    const isPosPage = mainContent && mainContent.getAttribute('data-pos-page') === 'true';

    if (isPosPage && sidebar && window.innerWidth >= 1024) {
        localStorage.setItem('menu-collapsed', 'true');
    }

    if (window.innerWidth >= 1024 && sidebar && mainContent && !isPosPage) {
        if (localStorage.getItem("menu-collapsed") === "true") {
            sidebar.classList.add('hidden');
            sidebar.classList.remove('flex', 'lg:flex', 'translate-x-0');
            mainContent.classList.remove('ltr:lg:ml-64', 'rtl:lg:mr-64');
        } else {
            sidebar.classList.remove('hidden', '-translate-x-full');
            sidebar.classList.add('flex', 'lg:flex', 'translate-x-0');
            mainContent.classList.add('ltr:lg:ml-64', 'rtl:lg:mr-64');
        }
    }

    const openIcon = document.getElementById('toggle-sidebar-open');
    const closeIcon = document.getElementById('toggle-sidebar-close');
    if (openIcon && closeIcon) {
        if (isPosPage) {
            openIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        } else if (localStorage.getItem("menu-collapsed") === "true") {
            openIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        } else {
            openIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
        }
    }

    const toggleSidebar = document.getElementById('toggle-sidebar');
    if (toggleSidebar && openIcon && closeIcon && sidebar && mainContent) {
        toggleSidebar.addEventListener('click', function () {
            openIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
            sidebar.classList.add('transition-transform', 'duration-300', 'ease-in-out');
            mainContent.classList.add('transition-all', 'duration-300', 'ease-in-out');
            if (localStorage.getItem("menu-collapsed") === "true") {
                localStorage.setItem("menu-collapsed", "false");
                sidebar.classList.remove('hidden');
                sidebar.classList.add('flex', 'lg:flex', 'translate-x-0');
                mainContent.classList.add('ltr:lg:ml-64', 'rtl:lg:mr-64');
            } else {
                localStorage.setItem("menu-collapsed", "true");
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                mainContent.classList.remove('ltr:lg:ml-64', 'rtl:lg:mr-64');
                const handler = function () {
                    if (localStorage.getItem("menu-collapsed") === "true" && sidebar && mainContent) {
                        sidebar.classList.add('hidden');
                        sidebar.classList.remove('flex', 'lg:flex');
                        sidebar.classList.remove('transition-transform', 'duration-300', 'ease-in-out');
                        mainContent.classList.remove('transition-all', 'duration-300', 'ease-in-out');
                    }
                    sidebar.removeEventListener('transitionend', handler);
                };
                sidebar.addEventListener('transitionend', handler);
            }
        });
    }

    try {
        observeThemeToggleMount();
        if (typeof initFlowbite === 'function') initFlowbite();
    } catch (e) { /* avoid one failure breaking the app */ }
});

let attrs = [
    "snapshot",
    "effects",
    // 'click',
    // 'id'
];

function snapKill() {
    document
        .querySelectorAll("div, nav, a, header")
        .forEach(function (element) {
            for (let i in attrs) {
                if (element.getAttribute(`wire:${attrs[i]}`) !== null) {
                    element.removeAttribute(`wire:${attrs[i]}`);
                }
            }
        });
}

window.addEventListener("load", (ev) => {
    snapKill();
});

function initPasswordToggles() {
    // Remove existing listeners to prevent duplicates
    document.removeEventListener('click', handlePasswordToggle);
    // Add single event listener on document
    document.addEventListener('click', handlePasswordToggle);
}

function handlePasswordToggle(event) {
    const toggleButton = event.target && event.target.closest('.toggle-password');
    if (!toggleButton) return;
    const wrapper = toggleButton.closest('.relative');
    if (!wrapper) return;
    const passwordInput = wrapper.querySelector('.password');
    const eyeIcon = wrapper.querySelector('.eye-icon');
    const eyeSlashIcon = wrapper.querySelector('.eye-slash-icon');
    if (!passwordInput) return;
    const isPassword = passwordInput.type === "password";
    passwordInput.type = isPassword ? "text" : "password";
    if (eyeIcon) eyeIcon.classList.toggle("hidden", isPassword);
    if (eyeSlashIcon) eyeSlashIcon.classList.toggle("hidden", !isPassword);
}

initPasswordToggles();

// Re-initialize when Livewire updates the DOM
document.addEventListener('livewire:navigated', () => {
    initPasswordToggles();
});

