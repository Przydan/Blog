<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Przydan blog') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased">
    <nav class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-4">
            <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600 hover:text-blue-700 transition-colors whitespace-nowrap">
                {{ config('app.name', 'Przydan blog') }}
            </a>
            <div class="flex items-center gap-3 md:gap-4">
                <x-language-switcher />
                <a href="{{ route('portfolio') }}" class="text-sm text-gray-600 hover:text-gray-900">{{ __('Portfolio') }}</a>
                <a href="{{ route('services') }}" class="text-sm text-gray-600 hover:text-gray-900">{{ __('Services') }}</a>
                @auth
                    @if(auth()->user()->isAuthor())
                        <a href="{{ route('admin.posts.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800">{{ __('Admin Panel') }}</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="text-sm text-gray-600 hover:text-gray-900">{{ __('Logout') }}</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="text-sm bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">{{ __('Register') }}</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto p-4">
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
</body>
</html>
