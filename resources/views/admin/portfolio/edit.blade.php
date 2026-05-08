<x-admin-layout>
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.portfolio.index') }}" class="text-blue-600 hover:underline">&larr; Back to Portfolio</a>
            <h1 class="text-2xl font-bold">Edit Project</h1>
        </div>

        <form method="POST" action="{{ route('admin.portfolio.update', $portfolioProject) }}" class="bg-white p-8 rounded-lg shadow border border-gray-200 space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Project Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $portfolioProject->title) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('description', $portfolioProject->description) }}</textarea>
            </div>
            <div>
                <label for="image_path" class="block text-sm font-medium text-gray-700 mb-1">Image URL</label>
                <input type="text" name="image_path" id="image_path" value="{{ old('image_path', $portfolioProject->image_path) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="link" class="block text-sm font-medium text-gray-700 mb-1">Project Link</label>
                <input type="text" name="link" id="link" value="{{ old('link', $portfolioProject->link) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="technologies" class="block text-sm font-medium text-gray-700 mb-1">Technologies (comma separated)</label>
                <input type="text" name="technologies" id="technologies" value="{{ old('technologies', implode(', ', $portfolioProject->technologies ?? [])) }}" placeholder="Laravel, Tailwind, Vue.js" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('admin.portfolio.index') }}" class="px-4 py-2 text-gray-600 hover:text-gray-900">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                    Update Project
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
