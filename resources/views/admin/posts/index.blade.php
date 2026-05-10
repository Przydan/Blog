<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold dark:text-white">Post Management</h1>
        <a href="{{ route('admin.posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
            Create Post
        </a>
    </div>

<div class="bg-white dark:bg-slate-800 rounded-lg shadow overflow-hidden border border-gray-200 dark:border-slate-700">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-slate-700">
            <thead class="bg-gray-50 dark:bg-slate-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __("Title") }}</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __("Category") }}</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __("Status") }}</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __("Actions") }}</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-slate-800 divide-y divide-gray-200 dark:divide-slate-700">
                @foreach($posts as $post)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white dark:text-white font-medium">{{ $post->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $post->category->name ?? 'Uncategorized' }}</td>                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-medium border {{ $post->status->color() }}">
                                    {{ $post->status->label() }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                @if($post->isDraft())
                                    <form method="POST" action="{{ route('admin.posts.publish', $post) }}" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <x-button variant="view" type="submit">{{ __("Publish") }}</x-button>
                                    </form>
                                @endif                                <x-button variant="view" href="{{ route('admin.posts.show', $post) }}">{{ __("View") }}</x-button>
                                <x-button variant="edit" href="{{ route('admin.posts.edit', $post) }}">{{ __("Edit") }}</x-button>

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
