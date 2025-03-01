import "./bootstrap";
import "flowbite";
import Alpine from "alpinejs";

window.Alpine = Alpine;

// Configuration du mode sombre
document.addEventListener("alpine:init", () => {
    Alpine.data("darkMode", () => ({
        darkMode: localStorage.getItem("darkMode") === "true",
        init() {
            this.$watch("darkMode", (val) =>
                localStorage.setItem("darkMode", val)
            );
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
