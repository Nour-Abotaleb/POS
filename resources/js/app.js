import "./bootstrap";
import "flowbite";
// import './sidebar';
// import './sidebar';
// import './charts';
import ApexCharts from "apexcharts";
import swal from "sweetalert2";
window.Swal = swal;
window.ApexCharts = ApexCharts;

// import './dark-mode';

// Desktop sidebar toggle: collapses/expands sidebar, updates localStorage, adjusts content margin, rotates icon
window.toggleDesktopSidebar = function () {
    const sidebar = document.getElementById("sidebar");
    const mainContent = document.getElementById("main-content");
    const icon = document.getElementById("toggle-sidebar-icon");
    if (!sidebar) return;
    const isCollapsed = sidebar.classList.contains("hidden");
    if (isCollapsed) {
        sidebar.classList.remove("hidden");
        sidebar.classList.add("flex", "lg:flex");
        if (mainContent) {
            mainContent.classList.add("ltr:lg:ml-64", "rtl:lg:mr-64");
        }
        localStorage.setItem("menu-collapsed", "false");
        if (icon) icon.classList.remove("rotate-180");
    } else {
        sidebar.classList.add("hidden");
        sidebar.classList.remove("flex", "lg:flex", "translate-x-0");
        if (mainContent) {
            mainContent.classList.remove("ltr:lg:ml-64", "rtl:lg:mr-64");
        }
        localStorage.setItem("menu-collapsed", "true");
        if (icon) icon.classList.add("rotate-180");
    }
};

// Mobile sidebar toggle: on POS use body class (CSS-only); elsewhere toggle .hidden on sidebar/backdrop/icons
window.toggleMobileSidebar = function () {
    if (document.body.classList.contains("pos-route-active")) {
        document.body.classList.toggle("mobile-sidebar-open");
        return;
    }
    const sidebar = document.getElementById("sidebar");
    const sidebarBackdrop = document.getElementById("sidebarBackdrop");
    const hamburger = document.getElementById("toggleSidebarMobileHamburger");
    const closeIcon = document.getElementById("toggleSidebarMobileClose");
    if (sidebar && sidebarBackdrop && hamburger && closeIcon) {
        sidebar.classList.toggle("hidden");
        sidebarBackdrop.classList.toggle("hidden");
        hamburger.classList.toggle("hidden");
        closeIcon.classList.toggle("hidden");
    }
};

// Check localStorage immediately to set initial state
if (localStorage.getItem("menu-collapsed") === "true") {
    // Add a class to body or html to handle initial state
    document.documentElement.classList.add("menu-collapsed");
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
    initializeThemeToggle();
});

function applyThemeClassFromStorage() {
    if (
        localStorage.getItem("color-theme") === "dark" ||
        (!("color-theme" in localStorage) &&
            window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
        document.documentElement.classList.add("dark");
    } else {
        document.documentElement.classList.remove("dark");
    }
}

/** Admin bar + shop drawer moon/sun (Tailwind darkMode: "class" on documentElement). */
function syncThemeToggleIcons() {
    const pairs = [
        ["theme-toggle-dark-icon", "theme-toggle-light-icon"],
        ["theme-toggle-dark-icon-nav", "theme-toggle-light-icon-nav"],
    ];
    const isDark = document.documentElement.classList.contains("dark");
    for (const [darkId, lightId] of pairs) {
        const d = document.getElementById(darkId);
        const l = document.getElementById(lightId);
        if (!d || !l) continue;
        if (isDark) {
            l.classList.remove("hidden");
            d.classList.add("hidden");
        } else {
            d.classList.remove("hidden");
            l.classList.add("hidden");
        }
    }
}

function themeToggleClickHandler() {
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
    syncThemeToggleIcons();
    document.dispatchEvent(new Event("dark-mode"));
}

/** Alpine / Blade can call this directly: @click="window.toggleColorTheme()" */
window.toggleColorTheme = themeToggleClickHandler;

/**
 * One delegated listener: shop pages have no #theme-toggle, so the old code returned early
 * and never wired #theme-toggle-nav. Delegation survives Livewire morphs.
 */
function bindThemeToggleDelegation() {
    if (window.__themeToggleDelegationBound) {
        return;
    }
    window.__themeToggleDelegationBound = true;
    document.addEventListener(
        "click",
        function (e) {
            const el =
                e.target instanceof Element ? e.target : e.target?.parentElement;
            const btn = el?.closest?.("#theme-toggle, #theme-toggle-nav");
            if (!btn) {
                return;
            }
            e.preventDefault();
            themeToggleClickHandler();
        },
        true,
    );
}

function initializeThemeToggle() {
    applyThemeClassFromStorage();
    syncThemeToggleIcons();
}

document.addEventListener("DOMContentLoaded", () => {
    bindThemeToggleDelegation();
    initializeThemeToggle();
});

document.addEventListener("livewire:init", () => {
    bindThemeToggleDelegation();
    initializeThemeToggle();
});

function observeThemeToggleMount() {
    try {
        initializeThemeToggle();
    } catch (e) {
        console.warn("observeThemeToggleMount:", e);
    }
}

document.addEventListener("livewire:navigated", () => {
    try {
        // Ensure theme toggle initializes even if later blocks fail
        observeThemeToggleMount();

        // Check initial state on page load
        const sidebar = document.getElementById("sidebar");
        const mainContent = document.getElementById("main-content");
        const isPosPage =
            mainContent && mainContent.getAttribute("data-pos-page") === "true";

        // On POS desktop, sidebar starts collapsed so the expand arrow works
        if (isPosPage && sidebar && window.innerWidth >= 1024) {
            localStorage.setItem("menu-collapsed", "true");
        }

        // Initial state without transitions (skip on POS so sidebar stays hidden on desktop)
        if (
            window.innerWidth >= 1024 &&
            sidebar != null &&
            mainContent != null &&
            !isPosPage
        ) {
            if (localStorage.getItem("menu-collapsed") === "true") {
                sidebar.classList.add("hidden");
                sidebar.classList.remove("flex", "lg:flex", "translate-x-0");
                mainContent.classList.remove("ltr:lg:ml-64", "rtl:lg:mr-64");
            } else {
                sidebar.classList.remove("hidden", "-translate-x-full");
                sidebar.classList.add("flex", "lg:flex", "translate-x-0");
                mainContent.classList.add("ltr:lg:ml-64", "rtl:lg:mr-64");
            }
        }

        // Initial rotation state for the single toggle icon
        const toggleIcon = document.getElementById("toggle-sidebar-icon");
        if (toggleIcon) {
            const collapsed =
                isPosPage || localStorage.getItem("menu-collapsed") === "true";
            toggleIcon.classList.toggle("rotate-180", collapsed);
        }

        const toggleSidebar = document.getElementById("toggle-sidebar");
        if (toggleSidebar) {
            toggleSidebar.onclick = window.toggleDesktopSidebar;
        }

        // (Re)initialize theme toggle on every Livewire navigation (already attempted at top)
        observeThemeToggleMount();

        if (sidebar) {
            const sidebarBackdrop = document.getElementById("sidebarBackdrop");
            const toggleSidebarMobileSearch = document.getElementById(
                "toggleSidebarMobileSearch",
            );

            if (
                toggleSidebarMobileSearch &&
                typeof toggleSidebarMobileSearch.addEventListener === "function"
            ) {
                toggleSidebarMobileSearch.addEventListener("click", () => {
                    if (window.toggleMobileSidebar)
                        window.toggleMobileSidebar();
                });
            }
        }

        // Reinitialize Flowbite components (may fail on pages with different DOM, e.g. POS)
        if (typeof initFlowbite === "function") {
            try {
                initFlowbite();
            } catch (e) {
                console.warn("Flowbite init:", e);
            }
        }
    } catch (err) {
        console.warn("livewire:navigated handler:", err);
    }
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
    document.removeEventListener("click", handlePasswordToggle);
    // Add single event listener on document
    document.addEventListener("click", handlePasswordToggle);
}

function handlePasswordToggle(event) {
    const toggleButton =
        event.target && event.target.closest(".toggle-password");
    if (!toggleButton) return;

    const wrapper = toggleButton.closest(".relative");
    if (!wrapper) return;

    const passwordInput = wrapper.querySelector(".password");
    const eyeIcon = wrapper.querySelector(".eye-icon");
    const eyeSlashIcon = wrapper.querySelector(".eye-slash-icon");
    if (!passwordInput || !eyeIcon || !eyeSlashIcon) return;

    const isPassword = passwordInput.type === "password";
    passwordInput.type = isPassword ? "text" : "password";
    eyeIcon.classList.toggle("hidden", isPassword);
    eyeSlashIcon.classList.toggle("hidden", !isPassword);
}

initPasswordToggles();

// Re-initialize when Livewire updates the DOM
document.addEventListener("livewire:navigated", () => {
    try {
        initPasswordToggles();
    } catch (e) {
        console.warn("initPasswordToggles:", e);
    }
});
