<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Post Management</h1>
        <a href="{{ route('admin.posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
            Create Post
        </a>
    </div>

<div class="bg-white rounded-lg shadow overflow-hidden border border-gray-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($posts as $post)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">{{ $post->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $post->category->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                @if($post->published_at && $post->published_at <= now())
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">Published</span>
                                @else
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                <x-button variant="view" href="{{ route('admin.posts.show', $post) }}">View</x-button>
                                <x-button variant="edit" href="{{ route('admin.posts.edit', $post) }}">Edit</x-button>
                                <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" class="inline delete-form" data-confirm="Are you sure you want to delete this post?">
                                     @csrf
                                     @method('DELETE')
                                     <x-button variant="danger" type="submit">Delete</x-button>
                                 </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</x-admin-layout>
