<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Blog Przydan') }} - Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 font-sans antialiased flex">
    <aside class="w-64 bg-slate-900 text-white min-h-screen p-4 flex flex-col">
        <a href="{{ route('home') }}" class="text-xl font-bold mb-8 block text-center">
            Admin Panel
        </a>
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
        </nav>
        <form method="POST" action="{{ route('logout') }}" class="mt-auto pt-4 border-t border-slate-800">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-slate-400 hover:text-white transition">
                Logout
            </button>
        </form>
    </aside>

    <main class="flex-1 p-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                {{ session('error') }}
            </div>
        @endif
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ $slot }}
    </main>
</body>
</html>
