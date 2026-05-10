<x-app-layout>
    <div class="max-w-md mx-auto mt-12 bg-white dark:bg-slate-800 p-8 rounded-lg shadow-sm border border-gray-200 dark:border-slate-700">
        <h2 class="text-2xl font-bold mb-6 text-center dark:text-white">{{ __('Register') }}</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('Full Name') }}</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-3 py-2 border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required autofocus>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('Email Address') }}</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full px-3 py-2 border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('Password') }}</label>
                <input type="password" name="password" id="password" class="w-full px-3 py-2 border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('Confirm Password') }}</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-3 py-2 border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200 font-medium">
                {{ __('Create Account') }}
            </button>
        </form>
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Already have an account?') }} <a href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400 hover:underline">{{ __('Login here') }}</a></p>
        </div>
    </div>
</x-app-layout>
