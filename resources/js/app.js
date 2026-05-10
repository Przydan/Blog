document.addEventListener('DOMContentLoaded', function() {
    const handleToggle = () => {
        const isDark = document.documentElement.classList.toggle('dark');
        localStorage.setItem('dark_mode', isDark);
        console.log('🔄 DarkMode Toggled:', isDark);
    };

    // Attach to all elements with the toggle class
    // Using delegation to handle dynamically added elements if any
    document.addEventListener('click', (e) => {
        if (e.target.closest('.dark-mode-toggle-btn')) {
            handleToggle();
        }
    });

    // Handle session errors as alerts (e.g. for the 403 redirect back)
    const errorAlert = document.querySelector('[data-type="error"]');
    if (errorAlert && errorAlert.innerText.includes('uprawnień')) {
        // Optional: you could make this a toast notification
        console.warn('⛔ Access Denied:', errorAlert.innerText);
    }
});
