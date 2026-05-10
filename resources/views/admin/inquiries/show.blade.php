<x-admin-layout>
    <div class="mb-6">
        <a href="{{ route('admin.inquiries.index') }}" class="text-blue-600 hover:underline">&larr; Powrót do zapytań</a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow border border-gray-200 dark:border-slate-700">
                <h1 class="text-2xl font-bold dark:text-white mb-6">Zapytanie od: {{ $inquiry->name }}</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-slate-400">Usługa</p>
                        <p class="text-lg text-gray-900 dark:text-white">{{ $inquiry->service->title }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-slate-400">E-mail</p>
                        <p class="text-lg text-gray-900 dark:text-white">{{ $inquiry->email }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-slate-400">Telefon</p>
                        <p class="text-lg text-gray-900 dark:text-white">{{ $inquiry->phone }}</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-sm font-medium text-gray-500 dark:text-slate-400">Wiadomość</p>
                        <p class="text-lg text-gray-900 dark:text-white mt-2 bg-gray-50 dark:bg-slate-700 p-4 rounded">{{ $inquiry->message }}</p>
                    </div>
                </div>
            </div>

            @if($inquiry->status === \App\Enums\InquiryStatus::Completed)
                <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow border border-gray-200 dark:border-slate-700">
                    <h2 class="text-xl font-bold dark:text-white mb-4">Odpowiedź dla klienta</h2>
                    <form action="{{ route('admin.inquiries.store-response', $inquiry) }}" method="POST">
                        @csrf
                        <textarea name="message" rows="4" class="w-full border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded p-2 mb-2">{{ $inquiry->responses->first()?->message }}</textarea>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Zapisz odpowiedź</button>
                    </form>
                    @if($inquiry->responses->first())
                        <div class="mt-4 flex gap-4">
                            <a href="mailto:{{ $inquiry->email }}?subject=Odpowiedź na zapytanie: {{ $inquiry->service->title }}&body={{ rawurlencode($inquiry->responses->first()->message) }}" class="bg-green-600 text-white px-4 py-2 rounded">Otwórz w poczcie</a>
                            <form action="{{ route('admin.inquiries.mark-as-sent', $inquiry) }}" method="POST">
                                @csrf @method('PATCH')
                                <button type="submit" class="bg-gray-600 text-white px-4 py-2 rounded">Oznacz jako wysłane</button>
                            </form>
                            @if($inquiry->responses->first()->is_sent)
                                <p class="text-sm text-gray-500 mt-2">Wysłano: {{ $inquiry->responses->first()->sent_at->format('d.m.Y H:i') }}</p>
                            @endif
                        </div>
                    @endif
                </div>
            @endif

            <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow border border-gray-200 dark:border-slate-700">
                <h2 class="text-xl font-bold dark:text-white mb-4">Wewnętrzne notatki</h2>
                @foreach($inquiry->comments as $comment)
                    <div class="border-b border-gray-100 dark:border-slate-700 py-2">
                        <p class="text-sm dark:text-gray-300">{{ $comment->comment }}</p>
                        <p class="text-xs text-gray-500 dark:text-slate-500">{{ $comment->user->name }} - {{ $comment->created_at->format('d.m.Y H:i') }}</p>
                    </div>
                @endforeach
                <form action="{{ route('admin.inquiries.store-comment', $inquiry) }}" method="POST" class="mt-4">
                    @csrf
                    <textarea name="comment" rows="2" class="w-full border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded p-2 mb-2" placeholder="Dodaj notatkę..."></textarea>
                    <button type="submit" class="bg-slate-800 text-white px-4 py-2 rounded">Dodaj notatkę</button>
                </form>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow border border-gray-200 dark:border-slate-700 h-fit">
            <h2 class="text-xl font-bold dark:text-white mb-4">Status</h2>
            <form action="{{ route('admin.inquiries.update-status', $inquiry) }}" method="POST">
                @csrf @method('PATCH')
                <select name="status" class="w-full border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded p-2 mb-4">
                    @foreach(\App\Enums\InquiryStatus::cases() as $status)
                        <option value="{{ $status->value }}" {{ $inquiry->status === $status ? 'selected' : '' }}>{{ $status->label() }}</option>
                    @endforeach
                </select>
                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded">Zmień status</button>
            </form>
        </div>
    </div>
</x-admin-layout>
