<x-app-layout>
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-3xl mx-auto">
            <div class="mb-8">
                <a href="{{ route('home') }}" class="text-blue-600 dark:text-blue-400 hover:underline flex items-center gap-2 text-sm mb-4">
                    &larr; {{ __('Back to Blog') }}
                </a>
                <div class="flex items-center gap-3 mb-4">
                    <span class="px-2 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-600 border border-blue-100 dark:bg-blue-900/30 dark:text-blue-400 dark:border-blue-800/50">
                        {{ $post->category->name }}
                    </span>
                    <span class="text-sm text-gray-400 dark:text-gray-500">
                        {{ $post->published_at->format('F d, Y') }}
                    </span>
                </div>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-6 leading-tight">
                    {{ $post->title }}
                </h1>
            </div>

            @if($post->image_path)
                <img src="{{ $post->image_path }}" alt="{{ $post->title }}" class="w-full h-auto rounded-xl shadow-sm mb-10 border border-gray-200 dark:border-slate-700">
            @endif

            <div class="prose prose-lg max-w-none text-gray-800 dark:text-gray-200 leading-relaxed dark:prose-invert">
                <p class="text-xl text-gray-600 dark:text-gray-400 mb-8 italic border-l-4 border-blue-500 pl-4">
                    {{ $post->description }}
                </p>
                <div>
                    {!! Str::markdown($post->content) !!}
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-gray-200 dark:border-slate-700">
                <div class="flex flex-wrap gap-2">
                    @foreach($post->tags as $tag)
                        <a href="{{ route('home', ['tag' => $tag->slug]) }}" class="px-3 py-1 rounded-full text-sm bg-gray-100 dark:bg-slate-800 text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-slate-700 transition border border-gray-200 dark:border-slate-700">
                            #{{ $tag->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
