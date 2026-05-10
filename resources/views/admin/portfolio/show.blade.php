<x-admin-layout>
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.portfolio.index') }}" class="text-blue-600 hover:underline">&larr; Back to Portfolio</a>
            <h1 class="text-2xl font-bold dark:text-white">Project Details</h1>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow border border-gray-200 dark:border-slate-700 overflow-hidden">
            <div class="bg-gray-50 dark:bg-slate-700 px-8 py-4 border-b border-gray-200 dark:border-slate-600">
                <h2 class="text-lg font-semibold dark:text-white">Project Information</h2>
            </div>
            <div class="p-8 space-y-4">
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 dark:border-slate-700 pb-4">
                    <span class="text-sm font-medium text-gray-500 dark:text-slate-400">Title</span>
                    <span class="col-span-2 text-sm text-gray-900 dark:text-white">{{ $portfolio->title }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 dark:border-slate-700 pb-4">
                    <span class="text-sm font-medium text-gray-500 dark:text-slate-400">Description</span>
                    <span class="col-span-2 text-sm text-gray-900 dark:text-white">{{ $portfolio->description }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 dark:border-slate-700 pb-4">
                    <span class="text-sm font-medium text-gray-500 dark:text-slate-400">Link</span>
                    <span class="col-span-2 text-sm text-blue-600 dark:text-blue-400">
                        <a href="{{ $portfolio->link }}" target="_blank" class="hover:underline hover:text-blue-800 transition-colors">{{ $portfolio->link }}</a>
                    </span>
                </div>
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 dark:border-slate-700 pb-4">
                    <span class="text-sm font-medium text-gray-500 dark:text-slate-400">Image URL</span>
                    <span class="col-span-2 text-sm text-gray-900 dark:text-white">{{ $portfolio->image_path }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <span class="text-sm font-medium text-gray-500 dark:text-slate-400">Technologies</span>
                    <div class="col-span-2 flex flex-wrap gap-1">
                        @php
                            $technologies = is_array($portfolio->technologies) ? $portfolio->technologies : explode(',', $portfolio->technologies ?? '');
                        @endphp
                        @foreach($technologies as $tech)
                            @if(trim($tech))
                                <span class="px-2 py-0.5 rounded-full text-xs bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 border border-gray-200 dark:border-slate-600">
                                    {{ trim($tech) }}
                                </span>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 dark:bg-slate-700 px-8 py-4 border-t border-gray-200 dark:border-slate-600 flex justify-end gap-4">
                <x-button variant="primary" href="{{ route('admin.portfolio.edit', $portfolio) }}">
                    Edit Project
                </x-button>
            </div>
        </div>
    </div>
</x-admin-layout>
