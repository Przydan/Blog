<x-admin-layout>
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.portfolio.index') }}" class="text-blue-600 hover:underline">&larr; Back to Portfolio</a>
            <h1 class="text-2xl font-bold">Edit Project</h1>
        </div>

        <form method="POST" action="{{ route('admin.portfolio.update', $portfolio) }}" class="bg-white p-8 rounded-lg shadow border border-gray-200 space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Project Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $portfolio->title) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('description', $portfolio->description) }}</textarea>
            </div>
            <div>
                <label for="image_path" class="block text-sm font-medium text-gray-700 mb-1">Image URL</label>
                <input type="text" name="image_path" id="image_path" value="{{ old('image_path', $portfolio->image_path) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="link" class="block text-sm font-medium text-gray-700 mb-1">Project Link</label>
                <input type="text" name="link" id="link" value="{{ old('link', $portfolio->link) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
                    <div>
                        <label for="technologies" class="block text-sm font-medium text-gray-700 mb-1">Technologies (comma separated)</label>
                        <input type="text" name="technologies" id="technologies" value="{{ old('technologies', is_array($portfolio->technologies) ? implode(', ', $portfolio->technologies) : $portfolio->technologies) }}" placeholder="Laravel, Tailwind, Vue.js" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('admin.portfolio.index') }}" class="px-4 py-2 text-gray-600 hover:text-gray-900">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                    Update Project
                </button>
            </div>
        </form>
        <form method="POST" action="{{ route('admin.portfolio.destroy', $portfolio) }}" class="inline delete-form" data-confirm="Are you sure you want to delete this project?">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 text-red-600 hover:text-red-800 transition font-medium" onclick="return confirm('Are you sure you want to delete this project?')">Delete Project</button>
        </form>
    </div>
</x-admin-layout>
