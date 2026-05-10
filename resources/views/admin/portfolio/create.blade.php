<x-admin-layout>
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.portfolio.index') }}" class="text-blue-600 hover:underline">&larr; Back to Portfolio</a>
            <h1 class="text-2xl font-bold dark:text-white">{{ __("Create Project") }}</h1>
        </div>

        <form method="POST" action="{{ route('admin.portfolio.store') }}" class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow border border-gray-200 dark:border-slate-700 space-y-6" novalidate>
            @csrf
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Project Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full px-3 py-2 border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __("Description") }}</label>
                <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 markdown-editor" required>{{ old('description') }}</textarea>
            </div>
            <div>
                <label for="image_path" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __("Image URL") }}</label>
                <input type="text" name="image_path" id="image_path" value="{{ old('image_path') }}" class="w-full px-3 py-2 border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="link" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Project Link</label>
                <input type="text" name="link" id="link" value="{{ old('link') }}" class="w-full px-3 py-2 border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="technologies" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Technologies (comma separated)</label>
                <input type="text" name="technologies" id="technologies" value="{{ old('technologies') }}" placeholder="Laravel, Tailwind, Vue.js" class="w-full px-3 py-2 border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('admin.portfolio.index') }}" class="px-4 py-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:text-white">{{ __("Cancel") }}</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                    {{ __("Save Project") }}
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
