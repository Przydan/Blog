<x-app-layout>
    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold mb-4 dark:text-white">{{ __('My Portfolio') }}</h1>
            <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                {{ __('A showcase of my recent work, projects, and technical experiments.') }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <img src="{{ $project->image_path }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 dark:text-white">{{ $project->title }}</h3>
                        <div class="text-gray-600 dark:text-gray-300 mb-4 prose dark:prose-invert">
                            {!! Str::markdown($project->description) !!}
                        </div>
                        <div class="flex flex-wrap gap-2 mb-6">
                            @php
                                $techs = $project->technologies;
                                if (is_string($techs)) {
                                    $techs = array_map('trim', explode(',', $techs));
                                }
                            @endphp
                            @if(is_iterable($techs))
                                @foreach($techs as $tech)
                                    <span class="px-2 py-1 text-xs font-medium bg-blue-50 text-blue-600 rounded border border-blue-100 dark:bg-blue-900/30 dark:text-blue-400 dark:border-blue-800/50">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            @endif
                        </div>
                        <a href="{{ $project->link }}" class="block text-center bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition font-medium">
                            {{ __('View Project') }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
