<x-admin-layout>
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.portfolio.index') }}" class="text-blue-600 hover:underline">&larr; Back to Portfolio</a>
            <h1 class="text-2xl font-bold">Project Details</h1>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-8 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold">Project Information</h2>
            </div>
            <div class="p-8 space-y-4">
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 pb-4">
                    <span class="text-sm font-medium text-gray-500">Title</span>
                    <span class="col-span-2 text-sm text-gray-900">{{ $portfolio->title }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 pb-4">
                    <span class="text-sm font-medium text-gray-500">Description</span>
                    <span class="col-span-2 text-sm text-gray-900">{{ $portfolio->description }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 pb-4">
                    <span class="text-sm font-medium text-gray-500">Link</span>
                    <span class="col-span-2 text-sm text-blue-600">
                        <a href="{{ $portfolio->link }}" target="_blank">{{ $portfolio->link }}</a>
                    </span>
                </div>
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 pb-4">
                    <span class="text-sm font-medium text-gray-500">Image URL</span>
                    <span class="col-span-2 text-sm text-gray-900">{{ $portfolio->image_path }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <span class="text-sm font-medium text-gray-500">Technologies</span>
                    <div class="col-span-2 flex flex-wrap gap-1">
                        @foreach($portfolio->technologies ?? [] as $tech)
                            <span class="px-2 py-0.5 rounded-full text-xs bg-gray-100 text-gray-600 border border-gray-200">
                                {{ trim($tech) }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-8 py-4 border-t border-gray-200 flex justify-end gap-4">
                <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Edit Project
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>
