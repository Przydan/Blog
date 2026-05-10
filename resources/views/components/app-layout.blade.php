<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="darkreader-lock">
    <title>{{ config('app.name', 'Przydan Blog') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        // Critical script to prevent "White Flash" and ensure dark mode persistence
        (function() {
            try {
                const userPref = localStorage.getItem('dark_mode');
                const systemPref = window.matchMedia('(prefers-color-scheme: dark)').matches;
                const isDark = userPref === null ? systemPref : userPref === 'true';
                
                if (isDark) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
                console.log('🌓 Theme Init:', isDark ? 'dark' : 'light', { userPref, systemPref });
            } catch (e) {}
        })();
    </script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased dark:bg-slate-900 dark:text-slate-100 transition-colors duration-200">
    <nav class="bg-white border-b border-gray-200 px-4 py-3 dark:bg-slate-800 dark:border-slate-700 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-4">
            <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600 hover:text-blue-700 transition-colors whitespace-nowrap dark:text-blue-400">
                {{ config('app.name', 'Przydan Blog') }}
            </a>
            <div class="flex items-center gap-3 md:gap-4">
                <button class="dark-mode-toggle-btn p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors text-gray-500 dark:text-gray-400" title="Przełącz tryb">
                    <!-- Sun icon -->
                    <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 18v1m9-11h1M3 12h1m15.364 6.364l-.707-.707M6.364 6.364l-.707-.707m12.728 0l-.707.707M6.364 17.636l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <!-- Moon icon -->
                    <svg class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                </button>
                <x-language-switcher />
                <a href="{{ route('portfolio') }}" class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">{{ __('Portfolio') }}</a>
                <a href="{{ route('services') }}" class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">{{ __('Services') }}</a>
                @auth
                    @if(auth()->user()->isAuthor())
                        <a href="{{ route('admin.posts.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">{{ __('Admin Panel') }}</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">{{ __('Logout') }}</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="text-sm bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">{{ __('Register') }}</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="min-h-screen transition-opacity duration-300">
        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 mt-6">
                <x-alert type="success">{{ session('success') }}</x-alert>
            </div>
        @endif
        @if(session('error'))
            <div class="max-w-7xl mx-auto px-4 mt-6">
                <x-alert type="error">{{ session('error') }}</x-alert>
            </div>
        @endif
        {{ $slot }}
    </main>

    <footer class="bg-white border-t border-gray-200 py-8 mt-12 dark:bg-slate-800 dark:border-slate-700 dark:text-gray-400 transition-colors">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
