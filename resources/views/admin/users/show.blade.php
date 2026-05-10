<x-admin-layout>
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:underline">&larr; Back to Users</a>
            <h1 class="text-2xl font-bold dark:text-white">{{ __("User Details") }}</h1>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-lg shadow border border-gray-200 dark:border-slate-700 overflow-hidden">
            <div class="bg-gray-50 dark:bg-slate-700 px-8 py-4 border-b border-gray-200 dark:border-slate-600">
                <h2 class="text-lg font-semibold dark:text-white">{{ __("Profile Information") }}</h2>
            </div>
            <div class="p-8 space-y-4">
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 dark:border-slate-700 pb-4">
                    <span class="text-sm font-medium text-gray-500 dark:text-slate-400">{{ __("Full Name") }}</span>
                    <span class="col-span-2 text-sm text-gray-900 dark:text-white">{{ $user->name }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 dark:border-slate-700 pb-4">
                    <span class="text-sm font-medium text-gray-500 dark:text-slate-400">{{ __("Email Address") }}</span>
                    <span class="col-span-2 text-sm text-gray-900 dark:text-white">{{ $user->email }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 dark:border-slate-700 pb-4">
                    <span class="text-sm font-medium text-gray-500 dark:text-slate-400">{{ __("Role") }}</span>
                    <span class="col-span-2 text-sm">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold 
                            {{ $user->role->value === 'administrator' ? 'bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-400' : '' }}
                            {{ $user->role->value === 'author' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400' : '' }}
                            {{ $user->role->value === 'reader' ? 'bg-gray-100 text-gray-800 dark:bg-slate-700 dark:text-gray-300' : '' }}">
                            {{ $user->role->label() }}
                        </span>
                    </span>
                </div>
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 dark:border-slate-700 pb-4">
                    <span class="text-sm font-medium text-gray-500 dark:text-slate-400">{{ __("Joined") }}</span>
                    <span class="col-span-2 text-sm text-gray-900 dark:text-white">{{ $user->created_at->format('M d, Y H:i') }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <span class="text-sm font-medium text-gray-500 dark:text-slate-400">{{ __("Last Updated") }}</span>
                    <span class="col-span-2 text-sm text-gray-900 dark:text-white">{{ $user->updated_at->format('M d, Y H:i') }}</span>
                </div>
            </div>
            <div class="bg-gray-50 dark:bg-slate-700 px-8 py-4 border-t border-gray-200 dark:border-slate-600 flex justify-end gap-4">
                <a href="{{ route('admin.users.edit', $user) }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Edit User
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>
