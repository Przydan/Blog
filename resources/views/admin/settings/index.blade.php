<x-admin-layout>
    <div class="mb-6">
        <h1 class="text-2xl font-bold">Ustawienia bloga</h1>
    </div>

    <div class="bg-white p-8 rounded-lg shadow border border-gray-200">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nazwa bloga</label>
                    <input type="text" name="blog_name" value="{{ $settings['blog_name'] ?? '' }}" class="w-full border border-gray-300 rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Schemat kolorów</label>
                    <select name="color_scheme" class="w-full border border-gray-300 rounded p-2">
                        @foreach(['blue', 'slate', 'emerald'] as $scheme)
                            <option value="{{ $scheme }}" {{ ($settings['color_scheme'] ?? '') === $scheme ? 'selected' : '' }}>{{ ucfirst($scheme) }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Dark Mode</label>
                    <select name="dark_mode" class="w-full border border-gray-300 rounded p-2">
                        <option value="0" {{ ($settings['dark_mode'] ?? '0') === '0' ? 'selected' : '' }}>Wyłączony</option>
                        <option value="1" {{ ($settings['dark_mode'] ?? '') === '1' ? 'selected' : '' }}>Włączony</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Obsługiwane języki (oddzielone przecinkami)</label>
                    <input type="text" name="languages" value="{{ $settings['languages'] ?? 'en,pl' }}" class="w-full border border-gray-300 rounded p-2">
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Zapisz ustawienia</button>
            </div>
        </form>
    </div>
</x-admin-layout>