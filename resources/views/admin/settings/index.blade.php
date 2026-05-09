<x-admin-layout>
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Ustawienia bloga</h1>

        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PATCH')

            <div class="bg-white p-6 rounded-lg shadow border border-gray-200 space-y-6">
                <!-- Blog Name -->
                <div>
                    <label for="blog_name" class="block text-sm font-medium text-gray-700 mb-1">Nazwa bloga</label>
                    <input type="text" name="blog_name" id="blog_name" value="{{ $settings->get('blog_name', config('app.name')) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Dark Mode -->
                <div class="flex items-center justify-between">
                    <div>
                        <label for="dark_mode" class="text-sm font-medium text-gray-700">Tryb ciemny (Dark Mode)</label>
                        <p class="text-xs text-gray-500">Włącz domyślny ciemny motyw dla całego bloga.</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="dark_mode" id="dark_mode" value="on" {{ $settings->get('dark_mode') === 'on' ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>

                <!-- Color Scheme -->
                <div>
                    <label for="color_scheme" class="block text-sm font-medium text-gray-700 mb-2">Schemat kolorów</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach(['blue' => 'Niebieski', 'emerald' => 'Szmaragdowy', 'indigo' => 'Indygo', 'amber' => 'Bursztynowy'] as $value => $label)
                            @php
                                $colorClass = match($value) {
                                    'blue' => 'bg-blue-500',
                                    'emerald' => 'bg-emerald-500',
                                    'indigo' => 'bg-indigo-500',
                                    'amber' => 'bg-amber-500',
                                    default => 'bg-slate-500'
                                };
                                $isActive = $settings->get('color_scheme', 'blue') === $value;
                            @endphp
                            <label class="relative flex flex-col items-center gap-2 p-4 border rounded-lg cursor-pointer hover:bg-gray-50 {{ $isActive ? 'border-blue-500 bg-blue-50 ring-1 ring-blue-500' : 'border-gray-200' }}">
                                <input type="radio" name="color_scheme" value="{{ $value }}" {{ $isActive ? 'checked' : '' }} class="sr-only">
                                <div class="w-8 h-8 rounded-full shadow-inner {{ $colorClass }}"></div>
                                <span class="text-xs font-medium">{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Languages -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Obsługiwane języki</label>
                    <div class="flex flex-wrap gap-4">
                        @php $activeLangs = explode(',', $settings->get('supported_languages', 'pl,en')); @endphp
                        @foreach(['pl' => 'Polski', 'en' => 'English', 'de' => 'Deutsch', 'es' => 'Español', 'fr' => 'Français'] as $code => $name)
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="{{ $code }}" {{ in_array($code, $activeLangs) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="text-sm text-gray-700">{{ $name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition font-medium">
                    Zapisz ustawienia
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
