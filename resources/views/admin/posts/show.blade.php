<x-admin-layout>
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.posts.index') }}" class="text-blue-600 hover:underline">&larr; Back to Posts</a>
            <h1 class="text-2xl font-bold dark:text-white">Post Details</h1>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow border border-gray-200 dark:border-slate-700 overflow-hidden">
            <div class="bg-gray-50 dark:bg-slate-700 px-8 py-4 border-b border-gray-200 dark:border-slate-600 flex justify-between items-center">
                <h2 class="text-lg font-semibold dark:text-white dark:text-white">Content Overview</h2>
                <span class="px-2 py-1 rounded-full text-xs font-semibold 
                    {{ $post->published_at && $post->published_at <= now() ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400' }}">
                    {{ $post->published_at && $post->published_at <= now() ? 'Published' : 'Draft' }}
                </span>
            </div>
            <div class="p-8 space-y-6">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="md:w-1/3">
                        @if($post->image_path)
                            <img src="{{ $post->image_path }}" alt="{{ $post->title }}" class="w-full h-auto rounded-lg shadow-sm border border-gray-200 dark:border-slate-700">
                        @else
                            <div class="w-full h-48 bg-gray-100 dark:bg-slate-700 rounded-lg flex items-center justify-center text-gray-400 dark:text-slate-500 text-sm italic border border-gray-200 dark:border-slate-700">
                                No image provided
                            </div>
                        @endif
                        <div class="mt-4 space-y-2">
                            <div class="text-sm">
                                <span class="font-medium text-gray-500 dark:text-slate-400">Category:</span>
                                <span class="text-gray-900 dark:text-white dark:text-white">{{ $post->category->name }}</span>
                            </div>
                            <div class="text-sm">
                                <span class="font-medium text-gray-500 dark:text-slate-400">Tags:</span>
                                <div class="flex flex-wrap gap-1 mt-1">
                                    @foreach($post->tags as $tag)
                                        <span class="px-2 py-0.5 rounded-full text-xs bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-400 dark:text-slate-300 border border-gray-200 dark:border-slate-600">
                                            {{ $tag->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-2/3 space-y-4">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white dark:text-white">{{ $post->title }}</h1>
                        <p class="text-gray-600 dark:text-gray-400 dark:text-slate-400 italic">{{ $post->description }}</p>
                        <div class="prose max-w-none text-gray-800 dark:text-slate-200">
                            {{ $post->content }}
                        </div>
                        <div class="pt-4 text-sm text-gray-500 dark:text-slate-400 border-t border-gray-100 dark:border-slate-700">
                            Published at: {{ $post->published_at?->format('M d, Y H:i') ?? 'Not yet published' }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 dark:bg-slate-700 px-8 py-4 border-t border-gray-200 dark:border-slate-600 flex justify-end gap-4">
                <a href="{{ route('admin.posts.edit', $post) }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Edit Post
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>
