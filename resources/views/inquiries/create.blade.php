<x-app-layout>
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-gray-200">
            <h2 class="text-3xl font-bold mb-8 text-center">Zapytanie ofertowe do usługi {{ $service->title }}</h2>
            
            <form action="{{ route('inquiries.store') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="service_id" value="{{ $service->id }}">
                
                <div style="display:none;">
                    <label for="honeypot">Leave this field empty</label>
                    <input type="text" name="honeypot" id="honeypot">
                </div>

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Imię i nazwisko</label>
                    <input type="text" name="name" id="name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                    <input type="email" name="email" id="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Telefon</label>
                    <input type="text" name="phone" id="phone" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Wiadomość</label>
                    <textarea name="message" id="message" rows="4" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition font-medium">
                    Wyślij zapytanie
                </button>
            </form>
        </div>
    </div>
</x-app-layout>