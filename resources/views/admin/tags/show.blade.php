<x-admin-layout>
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.tags.index') }}" class="text-blue-600 hover:underline">&larr; Back to Tags</a>
            <h1 class="text-2xl font-bold dark:text-white">{{ __("Tag Details") }}</h1>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow border border-gray-200 dark:border-slate-700 overflow-hidden">
            <div class="bg-gray-50 dark:bg-slate-700 px-8 py-4 border-b border-gray-200 dark:border-slate-600">
                <h2 class="text-lg font-semibold dark:text-white">{{ __("General Information") }}</h2>
            </div>
            <div class="p-8 space-y-4">
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 dark:border-slate-700 pb-4">
                    <span class="text-sm font-medium text-gray-500 dark:text-slate-400">{{ __("Name") }}</span>
                    <span class="col-span-2 text-sm text-gray-900 dark:text-white">{{ $tag->name }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 dark:border-slate-700 pb-4">
                    <span class="text-sm font-medium text-gray-500 dark:text-slate-400">{{ __("Slug") }}</span>
                    <span class="col-span-2 text-sm text-gray-900 dark:text-white">{{ $tag->slug }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <span class="text-sm font-medium text-gray-500 dark:text-slate-400">Created At</span>
                    <span class="col-span-2 text-sm text-gray-900 dark:text-white">{{ $tag->created_at->format('M d, Y H:i') }}</span>
                </div>
            </div>
            <div class="bg-gray-50 dark:bg-slate-700 px-8 py-4 border-t border-gray-200 dark:border-slate-600 flex justify-end gap-4">
                <a href="{{ route('admin.tags.edit', $tag) }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Edit Tag
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>
