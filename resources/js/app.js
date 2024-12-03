(() => {
    // assets/js/app.js
    document.addEventListener("DOMContentLoaded", () => {
        const darkModeToggle = document.getElementById("theme-toggle");
        if (darkModeToggle) {
            darkModeToggle.addEventListener("click", () => {
                document.documentElement.classList.toggle("dark");
                const isDark = document.documentElement.classList.contains("dark");
                localStorage.setItem("darkMode", isDark);
            });
        }
    });
})();
