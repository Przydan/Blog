<x-admin-layout>
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.tags.index') }}" class="text-blue-600 hover:underline">&larr; Back to Tags</a>
            <h1 class="text-2xl font-bold">Tag Details</h1>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-8 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold">General Information</h2>
            </div>
            <div class="p-8 space-y-4">
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 pb-4">
                    <span class="text-sm font-medium text-gray-500">Name</span>
                    <span class="col-span-2 text-sm text-gray-900">{{ $tag->name }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 pb-4">
                    <span class="text-sm font-medium text-gray-500">Slug</span>
                    <span class="col-span-2 text-sm text-gray-900">{{ $tag->slug }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <span class="text-sm font-medium text-gray-500">Created At</span>
                    <span class="col-span-2 text-sm text-gray-900">{{ $tag->created_at->format('M d, Y H:i') }}</span>
                </div>
            </div>
            <div class="bg-gray-50 px-8 py-4 border-t border-gray-200 flex justify-end gap-4">
                <a href="{{ route('admin.tags.edit', $tag) }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Edit Tag
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>
