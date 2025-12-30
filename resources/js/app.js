import "./bootstrap";
import "flowbite";
import Alpine from "alpinejs";

window.Alpine = Alpine;

// Configuration du mode sombre
document.addEventListener("alpine:init", () => {
    Alpine.data("darkMode", () => ({
        darkMode: (() => {
            // Récupérer le thème depuis la session Laravel (passé via meta tag)
            const sessionTheme = document
                .querySelector('meta[name="theme"]')
                ?.getAttribute("content");
            const savedTheme =
                localStorage.getItem("theme") || sessionTheme || "system";

            if (savedTheme === "system") {
                return window.matchMedia("(prefers-color-scheme: dark)")
                    .matches;
            }
            return savedTheme === "dark";
        })(),
        theme:
            localStorage.getItem("theme") ||
            document
                .querySelector('meta[name="theme"]')
                ?.getAttribute("content") ||
            "system",

        init() {
            this.$watch("darkMode", (val) => {
                localStorage.setItem("darkMode", val);
                if (this.theme === "system") {
                    // Ne pas sauvegarder dans localStorage si c'est le système qui décide
                    return;
                }
                localStorage.setItem("theme", val ? "dark" : "light");
            });

            // Écouter les changements de préférences système
            if (this.theme === "system") {
                window
                    .matchMedia("(prefers-color-scheme: dark)")
                    .addEventListener("change", (e) => {
                        this.darkMode = e.matches;
                    });
            }
        },

        setTheme(newTheme) {
            this.theme = newTheme;
            localStorage.setItem("theme", newTheme);

            if (newTheme === "system") {
                this.darkMode = window.matchMedia(
                    "(prefers-color-scheme: dark)"
                ).matches;
                localStorage.removeItem("darkMode");
            } else {
                this.darkMode = newTheme === "dark";
                localStorage.setItem("darkMode", this.darkMode);
            }
        },
    }));
});

Alpine.start();

// Gestion de la barre latérale mobile
document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("sidebar");
    const toggleSidebarMobile = document.getElementById("toggleSidebarMobile");
    const toggleSidebarMobileHamburger = document.getElementById(
        "toggleSidebarMobileHamburger"
    );
    const toggleSidebarMobileClose = document.getElementById(
        "toggleSidebarMobileClose"
    );

    if (toggleSidebarMobile) {
        toggleSidebarMobile.addEventListener("click", () => {
            sidebar.classList.toggle("hidden");
            toggleSidebarMobileHamburger.classList.toggle("hidden");
            toggleSidebarMobileClose.classList.toggle("hidden");
        });
    }

    // Fermer la barre latérale lors du clic en dehors
    document.addEventListener("click", (e) => {
        if (
            !sidebar.contains(e.target) &&
            !toggleSidebarMobile.contains(e.target)
        ) {
            if (
                !sidebar.classList.contains("hidden") &&
                window.innerWidth < 1024
            ) {
                sidebar.classList.add("hidden");
                toggleSidebarMobileHamburger.classList.remove("hidden");
                toggleSidebarMobileClose.classList.add("hidden");
            }
        }
    });

    // Gérer le redimensionnement de la fenêtre
    window.addEventListener("resize", () => {
        if (window.innerWidth >= 1024) {
            sidebar.classList.remove("hidden");
        }
    });
});
