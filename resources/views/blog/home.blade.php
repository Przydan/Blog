<x-app-layout>
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-6xl mx-auto">
            <div class="mb-12 text-center">
                <h1 class="text-4xl font-bold mb-4">Blog</h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Insights, tutorials, and stories from my journey in software engineering.
                </p>
            </div>

            <!-- Filters -->
            <div class="mb-12 flex flex-col md:flex-row gap-6 items-center justify-between bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <form method="GET" action="{{ route('home') }}" class="flex flex-col md:flex-row flex-wrap gap-4 items-center w-full md:w-auto">
                    <div class="flex items-center gap-2 w-full md:w-auto">
                        <span class="text-sm font-medium text-gray-500 whitespace-nowrap">Category:</span>
                        <select name="category" onchange="this.form.submit()" class="w-full md:w-auto text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center gap-2 w-full md:w-auto">
                        <span class="text-sm font-medium text-gray-500 whitespace-nowrap">Tag:</span>
                        <select name="tag" onchange="this.form.submit()" class="w-full md:w-auto text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            <option value="">All Tags</option>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->slug }}" {{ request('tag') == $tag->slug ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @if(request()->has('category') || request()->has('tag'))
                        <a href="{{ route('home') }}" class="text-sm text-blue-600 hover:underline w-full md:w-auto text-center">Clear Filters</a>
                    @endif
                </form>
            </div>

            @if($posts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                        <article class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300 flex flex-col">
                            <!-- Featured Image -->
                            <div class="h-48 overflow-hidden bg-gray-200">
                                @if($post->image_path)
                                    <img src="{{ $post->image_path }}" 
                                         alt="{{ $post->title }}" 
                                         class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                        <span class="text-white text-6xl">📝</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Content -->
                            <div class="p-6 flex flex-col flex-1">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="px-2 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-600 border border-blue-100">
                                        {{ $post->category->name }}
                                    </span>
                                    <span class="text-xs text-gray-400">
                                        {{ $post->published_at->format('M d, Y') }}
                                    </span>
                                </div>
                                <h2 class="text-xl font-bold mb-2 text-gray-900 line-clamp-2">
                                    {{ $post->title }}
                                </h2>
                                <p class="text-gray-600 mb-6 line-clamp-3 text-sm">
                                    {{ $post->description }}
                                </p>
                                <div class="mt-auto">
                                    <a href="{{ route('posts.show', $post->slug) }}" class="inline-block text-blue-600 font-semibold hover:underline text-sm">
                                        Read More →
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
                <div class="mt-12">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="bg-blue-50 border-l-4 border-blue-500 p-6 rounded text-center">
                    <p class="text-gray-700 text-lg">No posts found matching your criteria.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
