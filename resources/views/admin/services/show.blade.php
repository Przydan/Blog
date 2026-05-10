<x-admin-layout>
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.services.index') }}" class="text-blue-600 hover:underline">&larr; Back to Services</a>
            <h1 class="text-2xl font-bold dark:text-white">Service Details</h1>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow border border-gray-200 dark:border-slate-700 overflow-hidden">
            <div class="bg-gray-50 dark:bg-slate-700 px-8 py-4 border-b border-gray-200 dark:border-slate-600">
                <h2 class="text-lg font-semibold dark:text-white">Service Information</h2>
            </div>
            <div class="p-8 space-y-4">
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 dark:border-slate-700 pb-4">
                    <span class="text-sm font-medium text-gray-500 dark:text-slate-400">Title</span>
                    <span class="col-span-2 text-sm text-gray-900 dark:text-white">{{ $service->title }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 dark:border-slate-700 pb-4">
                    <span class="text-sm font-medium text-gray-500 dark:text-slate-400">Description</span>
                    <span class="col-span-2 text-sm text-gray-900 dark:text-white">{{ $service->description }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 dark:border-slate-700 pb-4">
                    <span class="text-sm font-medium text-gray-500 dark:text-slate-400">Icon</span>
                    <span class="col-span-2 text-sm text-gray-900 dark:text-white">{{ $service->icon }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <span class="text-sm font-medium text-gray-500 dark:text-slate-400">Details</span>
                    <div class="col-span-2 flex flex-wrap gap-1">
                        @php
                            $details = is_array($service->details) ? $service->details : explode(',', $service->details ?? '');
                        @endphp
                        @foreach($details as $detail)
                            @if(trim($detail))
                                <span class="px-2 py-0.5 rounded-full text-xs bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 border border-gray-200 dark:border-slate-600">
                                    {{ trim($detail) }}
                                </span>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 dark:bg-slate-700 px-8 py-4 border-t border-gray-200 dark:border-slate-600 flex justify-end gap-4">
                <a href="{{ route('admin.services.edit', $service) }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Edit Service
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>
