<x-app-layout>
    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold mb-4">Professional Services</h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Helping businesses and individuals build high-quality digital products.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($services as $service)
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-200 hover:border-blue-500 transition-colors duration-300 text-center">
                    <div class="text-5xl mb-6">{{ $service['icon'] }}</div>
                    <h3 class="text-2xl font-bold mb-4">{{ $service['title'] }}</h3>
                    <p class="text-gray-600 mb-6">
                        {{ $service['description'] }}
                    </p>
                    <ul class="text-left space-y-2 mb-8 max-w-xs mx-auto">
                        @foreach($service['details'] as $detail)
                            <li class="flex items-center gap-2 text-sm text-gray-600">
                                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                {{ $detail }}
                            </li>
                        @endforeach
                    </ul>
                    <a href="#" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition font-medium">
                        Get a Quote
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
