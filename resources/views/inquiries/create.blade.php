<x-app-layout>
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-xl mx-auto bg-white dark:bg-slate-800 p-8 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700">
            <h2 class="text-3xl font-bold mb-8 text-center dark:text-white">{{ __('Send inquiry for service :title', ['title' => $service->title]) }}</h2>
            
            <form action="{{ route('inquiries.store') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="service_id" value="{{ $service->id }}">
                
                <div style="display:none;">
                    <label for="honeypot">{{ __("Leave this field empty") }}</label>
                    <input type="text" name="honeypot" id="honeypot">
                </div>

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Full Name') }}</label>
                    <input type="text" name="name" id="name" required class="mt-1 block w-full border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-md shadow-sm p-2">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Email Address') }}</label>
                    <input type="email" name="email" id="email" required class="mt-1 block w-full border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-md shadow-sm p-2">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Phone Number') }}</label>
                    <input type="text" name="phone" id="phone" required class="mt-1 block w-full border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-md shadow-sm p-2">
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Message') }}</label>
                    <textarea name="message" id="message" rows="4" required class="mt-1 block w-full border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-md shadow-sm p-2"></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition font-medium">
                    {{ __('Send Inquiry') }}
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
