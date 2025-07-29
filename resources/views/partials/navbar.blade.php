
<div class="flex justify-between items-center">
    <div class="flex-shrink-0">
        <a href="/{{ app()->getLocale() }}" class="flex items-center">
            @include('partials.logo', ['size' => 'lg', 'animated' => true])
        </a>
    </div>

    <div class="hidden md:flex items-center space-x-6">
        <div class="theme-switcher-container">
            @include('partials.theme-switcher', ['prefix' => 'desktop'])
        </div>
        <div class="language-switcher-container">
            @include('partials.language-switcher', ['prefix' => 'desktop'])
        </div>

        {{-- Authenticated user menu - JavaScript ile gösterilecek --}}
        <div id="auth-menu" class="flex items-center space-x-6" style="display: none;">
            <a
                href="/dashboard"
                class="inline-flex items-center text-lg font-medium text-gray-600 hover:text-primary-600 dark:text-gray-300 dark:hover:text-primary-400 px-2 py-3 transition-colors"
            >
                <!-- Dashboard icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard mr-2"><rect width="7" height="9" x="3" y="3" rx="1"></rect><rect width="7" height="5" x="14" y="3" rx="1"></rect><rect width="7" height="9" x="14" y="12" rx="1"></rect><rect width="7" height="5" x="3" y="16" rx="1"></rect></svg>
                {{ __('translation.navbar.dashboard') }}
            </a>

            <button
                type="submit"
                class="inline-flex px-4 py-2 items-center text-lg font-medium bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-semibold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl px-4"
                id="logout-btn"
                aria-label="{{ __('translation.navbar.logout') }}"
            >
                <!-- Logout icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out mr-2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" x2="9" y1="12" y2="12"></line></svg>
                <span id="logout-text">
                        {{ __('translation.navbar.logout') }}
                    </span>
            </button>
        </div>

        {{-- Guest user menu - JavaScript ile gösterilecek --}}
        <div id="guest-menu" class="flex items-center space-x-6" style="display: none;">
            <a
                href="/login"
                class="inline-flex items-center text-lg font-medium text-gray-600 hover:text-primary-600 dark:text-gray-300 dark:hover:text-primary-400 px-4 py-2"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-in mr-1"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" x2="3" y1="12" y2="12"></line></svg>
                {{ __('translation.navbar.login') }}
            </a>

            <a
                href="/register"
                class="blueToPurpleButton"
            >
                <!-- Register icon -->
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                {{ __('translation.navbar.register') }}
            </a>
        </div>
    </div>

    <!-- Mobile menu button -->
    <div class="mobile-menu-container flex items-center md:hidden space-x-2">
        <div class="theme-switcher-container">
            @include('partials.theme-switcher', ['prefix' => 'mobile'])
        </div>
        <button
            id="mobile-menu-toggle"
            class="text-gray-600 hover:text-primary-600 dark:text-gray-300 dark:hover:text-primary-400 p-2"
            aria-label="{{ __('translation.navbar.openMenu') }}"
        >
            <!-- Menu icon -->
            <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>

            <!-- Close icon -->
            <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
</div>

<!-- Mobile menu -->
<div id="mobile-menu" class="mobile-menu hidden md:hidden border-t border-gray-100 dark:border-gray-800 mt-2">
    <div class="px-4 pt-2 pb-3 space-y-1">
        <!-- Language Switcher - üstte ortada -->
        <div class="flex justify-center items-center pt-2">
            <div class="language-switcher-container">
                @include('partials.language-switcher', ['prefix' => 'mobile'])
            </div>
        </div>

        <div class="border-t border-gray-100 dark:border-gray-800">
            {{-- Mobile authenticated user menu - JavaScript ile gösterilecek --}}
            <div id="mobile-auth-menu" class="flex flex-col space-y-3" style="display: none;">
                <a
                    href="/dashboard"
                    class="flex items-center justify-center px-3 py-2 text-lg font-medium text-primary-600 dark:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-md transition-colors"
                >
                    <!-- Dashboard icon -->
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H10a2 2 0 01-2-2V5z"></path>
                    </svg>
                    {{ __('translation.navbar.dashboard') }}
                </a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button
                        type="submit"
                        class="flex items-center justify-center px-4 py-2 text-lg font-medium bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-semibold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl rounded-md text-left transition-colors w-full"
                        id="mobile-logout-btn"
                        aria-label="{{ __('translation.navbar.logout') }}"
                    >
                        <!-- Logout icon -->
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span id="mobile-logout-text">
                            {{ __('translation.navbar.logout') }}
                        </span>
                    </button>
                </form>
            </div>

            {{-- Mobile guest user menu - JavaScript ile gösterilecek --}}
            <div id="mobile-guest-menu" class="flex flex-col space-y-3" style="display: none;">
                <a
                    href="/login"
                    class="px-3 py-2 text-lg font-medium text-gray-600 hover:text-primary-600 dark:text-gray-300 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-md flex items-center justify-center"
                >
                    <!-- Login icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-in mr-1"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" x2="3" y1="12" y2="12"></line></svg>
                    {{ __('translation.navbar.login') }}
                </a>

                <a
                    href="/register"
                    class="px-3 py-2 text-lg font-medium bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-semibold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl rounded-md flex items-center justify-center"
                >
                    <!-- Register icon -->
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    {{ __('translation.navbar.register') }}
                </a>
            </div>
        </div>
    </div>
</div>
