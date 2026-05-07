<x-app-layout>
    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold mb-4">My Portfolio</h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                A showcase of my recent work, projects, and technical experiments.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">{{ $project['title'] }}</h3>
                        <p class="text-gray-600 mb-4">{{ $project['description'] }}</p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            @foreach($project['technologies'] as $tech)
                                <span class="px-2 py-1 text-xs font-medium bg-blue-50 text-blue-600 rounded border border-blue-100">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                        <a href="{{ $project['link'] }}" class="block text-center bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition font-medium">
                            View Project
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
