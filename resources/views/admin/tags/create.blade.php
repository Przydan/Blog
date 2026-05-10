<x-admin-layout>
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.tags.index') }}" class="text-blue-600 hover:underline">&larr; Back to Tags</a>
            <h1 class="text-2xl font-bold dark:text-white">{{ __("Create Tag") }}</h1>
        </div>

        <form method="POST" action="{{ route('admin.tags.store') }}" class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow border border-gray-200 dark:border-slate-700 space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __("Name") }}</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-3 py-2 border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __("Slug") }}</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="w-full px-3 py-2 border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('admin.tags.index') }}" class="px-4 py-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:text-white">{{ __("Cancel") }}</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                    {{ __("Save Tag") }}
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
