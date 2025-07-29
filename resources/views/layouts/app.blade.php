<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('meta')

    <title>@yield('title'){{ ' | ' . config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link rel="preload" href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700"></noscript>

    <link rel="icon" type="image/svg+xml" href="{{ asset('images/' . config('app.logo_white'), true) }}">

    <link rel="stylesheet" href="{{ asset('css/critical.css') }}">

    <style>
        /* Page Loader */
        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        .page-loader.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .loader-content {
            text-align: center;
            color: white;
        }

        .loader-logo {
            margin: 0 auto 2rem;
            animation: pulse 2s infinite;
        }

        .loader-text {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 2rem;
            background: linear-gradient(45deg, #3b82f6, #9333ea);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .loader-spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(59, 130, 246, 0.3);
            border-top: 3px solid #3b82f6;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        .loader-progress {
            width: 200px;
            height: 4px;
            background: rgba(59, 130, 246, 0.3);
            border-radius: 2px;
            margin: 2rem auto 0;
            overflow: hidden;
        }

        .loader-progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #3b82f6, #9333ea);
            border-radius: 2px;
            animation: progress 3s ease-in-out infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.8; }
        }

        @keyframes progress {
            0% { width: 0%; }
            50% { width: 70%; }
            100% { width: 100%; }
        }

        /* Hide main content until loaded */
        .main-content {
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .main-content.loaded {
            opacity: 1;
        }

        /* Light theme loader */
        html:not(.dark) .page-loader {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
        }

        html:not(.dark) .loader-content {
            color: #111827;
        }

        html:not(.dark) .loader-text {
            background: linear-gradient(45deg, #2563eb, #7c3aed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .animate-fade-in-up { animation: fadeInUp 0.6s ease-out forwards; }
        .animate-slide-up { animation: slideUp 0.8s ease-out forwards; }
        .animate-float { animation: float 4s ease-in-out infinite; }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
        .delay-600 { animation-delay: 0.6s; }
        .delay-700 { animation-delay: 0.7s; }
        .delay-800 { animation-delay: 0.8s; }

        .bg-gradient-orb {
            opacity: 0.3;
            animation: float 8s ease-in-out infinite;
        }

        .bg-gradient-orb:nth-child(1) { animation-delay: 0s; }
        .bg-gradient-orb:nth-child(2) { animation-delay: 1s; }
        .bg-gradient-orb:nth-child(3) { animation-delay: 2s; }
        .bg-gradient-orb:nth-child(4) { animation-delay: 3s; }

        .section {
            margin: 0 auto;
            max-width: 80rem;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
            margin-top: 0;
            margin-bottom: 3rem;
        }

        @media (min-width: 640px) {
            .section {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
                margin-top: 3rem;
                margin-bottom: 3rem;
            }
        }

        @media (min-width: 768px) {
            .section {
                margin-top: 2rem;
                margin-bottom: 2rem;
            }
        }

        @media (min-width: 1024px) {
            .section {
                padding-left: 2rem;
                padding-right: 2rem;
                margin-top: 4rem;
                margin-bottom: 4rem;
            }
        }

        .sectionTitle {
            font-size: 1.5rem;
            font-weight: 700;
            color: #111827;
            max-width: 42rem;
            margin: 0 auto 1.5rem auto;
            text-align: center;
        }

        .sectionTitle.text-left {
            text-align: left;
            margin-left: 0;
            margin-right: 0;
        }

        @media (min-width: 640px) {
            .sectionTitle {
                font-size: 1.875rem;
                line-height: 2.25rem;
            }
        }

        @media (min-width: 1280px) {
            .sectionTitle {
                font-size: 2.25rem;
            }
        }

        .dark .sectionTitle {
            color: #ffffff;
        }

        .sectionDescription {
            margin-top: 1rem;
            font-size: 1.125rem;
            color: #4b5563;
            max-width: 42rem;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        .dark .sectionDescription {
            color: #d1d5db;
        }

        .sectionContentTitle {
            font-size: 1.125rem;
            font-weight: 700;
            color: #111827;
        }

        @media (min-width: 640px) {
            .sectionContentTitle {
                font-size: 1.25rem;
            }
        }

        @media (min-width: 1280px) {
            .sectionContentTitle {
                font-size: 1.5rem;
            }
        }

        .dark .sectionContentTitle {
            color: #ffffff;
        }

        .sectionContent {
            font-size: 1.125rem;
            color: #374151;
            margin-bottom: 1.5rem;
            margin-top: 1.5rem;
            text-align: left;
        }

        .dark .sectionContent {
            color: #d1d5db;
        }

        .sectionContentDetails {
            color: #4b5563;
        }

        .dark .sectionContentDetails {
            color: #d1d5db;
        }

        .sectionTitleBadge {
            margin-top: 1rem;
            font-size: 1.125rem;
            color: #374151;
        }

        .dark .sectionTitleBadge {
            color: #d1d5db;
        }

        .blueToPurpleButton {
            width: 100%;
            border-radius: 0.75rem;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(to right, #2563eb, #9333ea);
            color: #ffffff;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .blueToPurpleButton:hover {
            background: linear-gradient(to right, #1d4ed8, #7c3aed);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        @media (min-width: 640px) {
            .blueToPurpleButton {
                width: auto;
                justify-content: flex-start;
            }
        }

        .blueToPurpleBadge {
            display: inline-flex;
            align-items: center;
            border-radius: 9999px;
            padding: 0.25rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
            background: linear-gradient(to right, #dbeafe, #ede9fe);
            color: #1e40af;
            margin-bottom: 1rem;
            border: 1px solid #bfdbfe;
            line-height: 1.25rem;
        }

        .dark .blueToPurpleBadge {
            background: linear-gradient(to right, rgba(30, 58, 138, 0.3), rgba(88, 28, 135, 0.3));
            color: #93c5fd;
            border-color: rgba(30, 58, 138, 0.7);
        }

        .blueToPurpleBadgeDot {
            display: flex;
            height: 0.5rem;
            width: 0.5rem;
            border-radius: 50%;
            background-color: #3b82f6;
            margin-right: 0.375rem;
        }

        .dark .blueToPurpleBadgeDot {
            background-color: #60a5fa;
        }

        .blueBadge {
            display: inline-flex;
            align-items: center;
            border-radius: 9999px;
            padding: 0.25rem 0.75rem;
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-weight: 500;
            background-color: #dbeafe;
            color: #1e40af;
        }

        .dark .blueBadge {
            background-color: rgba(30, 58, 138, 0.7);
            color: #93c5fd;
        }

        .purpleBadge {
            display: inline-flex;
            align-items: center;
            border-radius: 9999px;
            padding: 0.25rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
            background-color: #ede9fe;
            color: #6b21a8;
            line-height: 1.25rem;
        }

        .dark .purpleBadge {
            background-color: rgba(107, 33, 168, 0.7);
            color: #ede9fe;
        }

        .yellowBadge {
            display: inline-flex;
            align-items: center;
            border-radius: 9999px;
            padding: 0.25rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
            background-color: #fef3c7;
            color: #92400e;
            line-height: 1.25rem;
        }

        .dark .yellowBadge {
            background-color: rgba(146, 64, 14, 0.7);
            color: #fcd34d;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .mobile-menu-container {
            display: flex;
        }

        .mobile-menu {
            display: none;
        }

        .mobile-menu.show {
            display: block;
        }

        @media (min-width: 768px) {
            .mobile-menu-container {
                display: none;
            }

            .mobile-menu {
                display: none !important;
            }
        }
    </style>

    <script>
        (function() {
            window.pageLoadingManager = {
                loaded: false,
                resources: {
                    fonts: false,
                    tailwind: false,
                    alpine: false,
                    navbar: false
                },

                checkAllLoaded: function() {
                    const allLoaded = Object.values(this.resources).every(loaded => loaded);
                    if (allLoaded && !this.loaded) {
                        this.loaded = true;
                        this.hideLoader();
                    }
                },

                markLoaded: function(resource) {
                    this.resources[resource] = true;
                    this.checkAllLoaded();
                },

                hideLoader: function() {
                    const loader = document.getElementById('page-loader');
                    const mainContent = document.getElementById('main-content');

                    if (loader && mainContent) {
                        setTimeout(() => {
                            loader.classList.add('hidden');
                            mainContent.classList.add('loaded');
                            document.body.style.overflow = 'auto';
                        }, 500);
                    }
                }
            };

            setTimeout(() => {
                if (!window.pageLoadingManager.loaded) {
                    window.pageLoadingManager.hideLoader();
                }
            }, 5000);
        })();
    </script>

    <link rel="preload" href="https://cdn.tailwindcss.com" as="script">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" as="script">

    @stack('scripts')
    @stack('styles')

</head>

<body style="overflow: hidden">

<div id="page-loader" class="page-loader">
    <div class="loader-content">
        <div class="loader-logo">
            <img src="{{ asset('images/' . config('app.logo_only_shape')) }}" fetchpriority=high alt="Logo">
        </div>
    </div>
</div>

<div id="main-content" class="main-content">
    <div class="page-wrapper">
        <div class="absolute inset-0 pointer-events-none z-0">
            <div class="bg-orb bg-orb-1"></div>
            <div class="bg-orb bg-orb-2"></div>
            <div class="bg-orb bg-orb-3"></div>
        </div>

        <main>
            <nav>
                <div class="nav-container">
                    @include('partials.navbar')
                </div>
            </nav>

            @yield('content')

            <footer class="relative z-10" style="margin-top: 8rem">
                <div class="section">
                    @include('partials.footer')
                </div>
            </footer>
        </main>
    </div>
</div>

<script>
    (function() {
        var script = document.createElement('script');
        script.src = 'https://cdn.tailwindcss.com';
        script.onload = function() {
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        colors: {
                            primary: {
                                50: '#eff6ff',
                                100: '#dbeafe',
                                200: '#bfdbfe',
                                300: '#93c5fd',
                                400: '#60a5fa',
                                500: '#3b82f6',
                                600: '#2563eb',
                                700: '#1d4ed8',
                                800: '#1e40af',
                                900: '#1e3a8a',
                            }
                        }
                    }
                }
            };
            window.pageLoadingManager.markLoaded('tailwind');
        };
        document.head.appendChild(script);
    })();
</script>

<script>
    window.addEventListener('load', function() {
        var script = document.createElement('script');
        script.src = 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js';
        script.defer = true;
        script.onload = function() {
            window.pageLoadingManager.markLoaded('alpine');
        };
        document.head.appendChild(script);
    });
</script>

<script>
    window.addEventListener('load', function() {
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', {{ config('app.google_analytics') }});
    });
</script>

<script defer src="{{ asset('js/navbar.js') }}" onload="window.pageLoadingManager.markLoaded('navbar')"></script>

<script>
    document.fonts.ready.then(function() {
        window.pageLoadingManager.markLoaded('fonts');
    });
</script>

<script>
    window.addEventListener('load', function() {
        requestAnimationFrame(function() {
            var bgContainer = document.querySelector('.absolute.inset-0');
            if (bgContainer) {
                bgContainer.innerHTML = `
                        <div class="bg-orb bg-orb-1"></div>
                        <div class="bg-orb bg-orb-2"></div>
                        <div class="bg-orb bg-orb-3"></div>
                        <div class="absolute -right-20 top-1/4 w-96 h-96 bg-primary-400/10 dark:bg-primary-800/20 rounded-full blur-3xl"></div>
                        <div class="absolute -left-20 top-1/6 w-72 h-72 bg-cyan-400/10 dark:bg-cyan-800/20 rounded-full blur-3xl"></div>
                        <div class="absolute top-32 left-1/3 w-80 h-80 bg-amber-400/10 dark:bg-amber-800/20 rounded-full blur-3xl"></div>
                        <div class="absolute -left-20 top-1/2 w-80 h-80 bg-secondary-400/10 dark:bg-secondary-800/20 rounded-full blur-3xl"></div>
                        <div class="absolute right-1/4 top-2/5 w-64 h-64 bg-teal-400/10 dark:bg-teal-800/20 rounded-full blur-3xl"></div>
                        <div class="absolute left-2/3 top-1/3 w-72 h-72 bg-indigo-400/10 dark:bg-indigo-800/20 rounded-full blur-3xl"></div>
                        <div class="absolute bottom-0 left-1/4 w-80 h-80 bg-accent-400/10 dark:bg-accent-800/20 rounded-full blur-3xl"></div>
                        <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-pink-400/10 dark:bg-pink-800/20 rounded-full blur-3xl"></div>
                        <div class="absolute bottom-1/5 left-2/3 w-72 h-72 bg-blue-400/10 dark:bg-blue-800/20 rounded-full blur-3xl"></div>
                        <div class="absolute top-1/3 right-1/3 w-72 h-72 bg-green-400/10 dark:bg-green-800/20 rounded-full blur-3xl"></div>
                        <div class="absolute bottom-1/3 right-10 w-64 h-64 bg-yellow-400/10 dark:bg-yellow-800/20 rounded-full blur-3xl"></div>
                        <div class="absolute top-3/4 left-1/3 w-60 h-60 bg-red-400/10 dark:bg-red-800/20 rounded-full blur-3xl"></div>
                        <div class="absolute top-1/2 left-10 w-56 h-56 bg-purple-400/10 dark:bg-purple-800/20 rounded-full blur-3xl"></div>
                        <div class="absolute bottom-2/3 right-1/5 w-48 h-48 bg-orange-400/10 dark:bg-orange-800/20 rounded-full blur-3xl"></div>
                        <div class="absolute top-1/5 right-2/5 w-40 h-40 bg-emerald-400/10 dark:bg-emerald-800/20 rounded-full blur-3xl"></div>
                    `;
            }
        });
    });
</script>
</body>
</html>
