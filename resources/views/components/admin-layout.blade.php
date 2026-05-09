<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Blog Przydan') }} - Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
    <style>
        @media (max-width: 767px) {
            .sidebar-hidden { transform: translateX(-100%); }
            .sidebar-visible { transform: translateX(0); }
            .mobile-drawer { transition: transform 0.3s ease-in-out; }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased flex flex-col md:flex-row min-h-screen">
    <!-- Mobile Header -->
    <div class="md:hidden p-4 flex justify-between items-center sticky top-0 z-30 shadow-md bg-slate-900 text-white">
        <span class="text-xl font-bold">Admin Panel</span>
        <button id="mobile-menu-button" class="p-2 rounded-md hover:bg-slate-800 focus:outline-none transition-colors text-white" aria-label="Toggle Menu">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <!-- Mobile Backdrop -->
    <div id="mobile-backdrop" class="fixed inset-0 z-40 hidden md:hidden transition-opacity duration-300 bg-slate-900/60 backdrop-blur-sm"></div>

    <!-- Sidebar -->
    <aside id="admin-sidebar" class="fixed inset-y-0 left-0 z-50 w-64 p-4 flex flex-col mobile-drawer sidebar-hidden md:relative md:translate-x-0 md:min-h-screen shadow-2xl bg-slate-900 text-white">
        <div class="flex items-center justify-between mb-8">
            <a href="{{ route('home') }}" class="text-xl font-bold text-white hover:text-slate-200 transition-colors">
                Admin Panel
            </a>
            <button id="close-sidebar" class="md:hidden p-2 text-slate-400 hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <div class="mb-6">
            <a href="{{ route('home') }}" class="block px-4 py-2 text-sm font-medium text-blue-400 hover:text-blue-300 transition-colors bg-slate-800 rounded border border-slate-700 text-center">
                &larr; View Public Site
            </a>
        </div>

        <nav class="flex-1 space-y-2">
            <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 rounded transition {{ request()->routeIs('admin.users.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800' }}">
                Users
            </a>
            <a href="{{ route('admin.posts.index') }}" class="block px-4 py-2 rounded transition {{ request()->routeIs('admin.posts.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800' }}">
                Posts
            </a>
            <a href="{{ route('admin.categories.index') }}" class="block px-4 py-2 rounded transition {{ request()->routeIs('admin.categories.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800' }}">
                Categories
            </a>
            <a href="{{ route('admin.tags.index') }}" class="block px-4 py-2 rounded transition {{ request()->routeIs('admin.tags.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800' }}">
                Tags
            </a>
            <a href="{{ route('admin.portfolio.index') }}" class="block px-4 py-2 rounded transition {{ request()->routeIs('admin.portfolio.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800' }}">
                Portfolio
            </a>
            <a href="{{ route('admin.services.index') }}" class="block px-4 py-2 rounded transition {{ request()->routeIs('admin.services.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800' }}">
                Services
            </a>
            <a href="{{ route('admin.inquiries.index') }}" class="block px-4 py-2 rounded transition {{ request()->routeIs('admin.inquiries.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800' }}">
                Zapytania
            </a>
            <a href="{{ route('admin.settings.index') }}" class="block px-4 py-2 rounded transition {{ request()->routeIs('admin.settings.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800' }}">
                Ustawienia
            </a>
        </nav>
        <form method="POST" action="{{ route('logout') }}" class="mt-auto pt-4 border-t border-slate-800">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-slate-400 hover:text-white transition">
                Logout
            </button>
        </form>
    </aside>

    <main class="flex-1 p-4 md:p-8 relative">
        @if(session('success'))
            <x-alert type="success">{{ session('success') }}</x-alert>
        @endif
        @if(session('error'))
            <x-alert type="error">{{ session('error') }}</x-alert>
        @endif
        @if($errors->any())
            <x-alert type="error">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-alert>
        @endif
        {{ $slot }}
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.getElementById('mobile-menu-button');
            const closeButton = document.getElementById('close-sidebar');
            const sidebar = document.getElementById('admin-sidebar');
            const backdrop = document.getElementById('mobile-backdrop');

            function toggleMenu(show) {
                if (show) {
                    sidebar.classList.remove('sidebar-hidden');
                    sidebar.classList.add('sidebar-visible');
                    backdrop.classList.remove('hidden');
                    document.body.classList.add('overflow-hidden');
                } else {
                    sidebar.classList.remove('sidebar-visible');
                    sidebar.classList.add('sidebar-hidden');
                    backdrop.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                }
            }

            if (menuButton) menuButton.addEventListener('click', () => toggleMenu(true));
            if (closeButton) closeButton.addEventListener('click', () => toggleMenu(false));
            if (backdrop) backdrop.addEventListener('click', () => toggleMenu(false));
        });

        // Global handler for delete confirmations
        // We use capture phase (true) because submit events do not bubble
        document.addEventListener('submit', function(e) {
            if (e.target && e.target.classList.contains('delete-form')) {
                const message = e.target.dataset.confirm || 'Are you sure you want to delete this record?';
                if (!confirm(message)) {
                    e.preventDefault();
                    e.stopPropagation();
                }
            }
        }, true);

        // Initialize Markdown Editor
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.markdown-editor').forEach(element => {
                new EasyMDE({ element: element });
            });
        });
    </script>
</body>
</html>
