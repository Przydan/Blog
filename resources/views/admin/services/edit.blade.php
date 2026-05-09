<x-admin-layout>
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.services.index') }}" class="text-blue-600 hover:underline">&larr; Back to Services</a>
            <h1 class="text-2xl font-bold">Edit Service</h1>
        </div>

        <form method="POST" action="{{ route('admin.services.update', $service) }}" class="bg-white p-8 rounded-lg shadow border border-gray-200 space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Service Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $service->title) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 markdown-editor" required>{{ old('description', $service->description) }}</textarea>
            </div>
            <div>
                <label for="icon" class="block text-sm font-medium text-gray-700 mb-1">Icon (Emoji or symbol)</label>
                <input type="text" name="icon" id="icon" value="{{ old('icon', $service->icon) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
                    <div>
                        <label for="details" class="block text-sm font-medium text-gray-700 mb-1">Details (comma separated)</label>
                        <input type="text" name="details" id="details" value="{{ old('details', is_array($service->details) ? implode(', ', $service->details) : $service->details) }}" placeholder="CMS, E-commerce, Corporate Sites" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('admin.services.index') }}" class="px-4 py-2 text-gray-600 hover:text-gray-900">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                    Update Service
                </button>
            </div>
        </form>
        <form method="POST" action="{{ route('admin.services.destroy', $service) }}" class="inline delete-form" data-confirm="Are you sure you want to delete this service?">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 text-red-600 hover:text-red-800 transition font-medium" onclick="return confirm('Are you sure you want to delete this service?')">Delete Service</button>
        </form>
    </div>
</x-admin-layout>
