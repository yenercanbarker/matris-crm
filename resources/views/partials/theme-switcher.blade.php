<button
    onclick="toggleTheme()"
    class="relative inline-flex items-center justify-center p-2 transition-colors rounded-md cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 theme-toggle-btn"
    aria-label="{{ __('translation.theme.switch') }}"
    title="{{ __('translation.theme.switch') }}"
    id="theme-toggle-btn"
>
    <div class="relative">
        <!-- Sun icon (shown in dark mode) - başlangıçta görünür (default dark mode) -->
        <svg class="w-6 h-6 text-gray-100 theme-icon sun-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: block;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
        </svg>

        <!-- Moon icon (shown in light mode) - başlangıçta gizli -->
        <svg class="w-6 h-6 text-gray-700 theme-icon moon-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
        </svg>
    </div>
</button>

<script>
// Theme toggle function
function toggleTheme() {
    const currentTheme = window.__theme || localStorage.getItem('theme') || 'dark';
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

    localStorage.setItem('theme', newTheme);
    window.__theme = newTheme;
    applyTheme(newTheme);
}

// Apply theme function
function applyTheme(theme) {
    const sunIcons = document.querySelectorAll('.sun-icon');
    const moonIcons = document.querySelectorAll('.moon-icon');
    const logoLight = document.getElementById('logo-light');
    const logoDark = document.getElementById('logo-dark');
    const footerLogoLight = document.getElementById('footer-logo-light');
    const footerLogoDark = document.getElementById('footer-logo-dark');

    if (theme === 'dark') {
        document.documentElement.classList.add('dark');
        sunIcons.forEach(icon => icon.style.display = 'block');
        moonIcons.forEach(icon => icon.style.display = 'none');
        if (logoLight) logoLight.style.display = 'none';
        if (logoDark) logoDark.style.display = 'block';
        if (footerLogoLight) footerLogoLight.style.display = 'none';
        if (footerLogoDark) footerLogoDark.style.display = 'block';
    } else {
        document.documentElement.classList.remove('dark');
        sunIcons.forEach(icon => icon.style.display = 'none');
        moonIcons.forEach(icon => icon.style.display = 'block');
        if (logoLight) logoLight.style.display = 'block';
        if (logoDark) logoDark.style.display = 'none';
        if (footerLogoLight) footerLogoLight.style.display = 'block';
        if (footerLogoDark) footerLogoDark.style.display = 'none';
    }
}

// Initialize theme icons when page loads
document.addEventListener('DOMContentLoaded', function() {
    // Global tema değerini kullan
    const currentTheme = window.__theme || localStorage.getItem('theme') || 'dark';
    applyTheme(currentTheme);
});
</script>
