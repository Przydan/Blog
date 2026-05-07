<x-admin-layout>
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:underline">&larr; Back to Users</a>
            <h1 class="text-2xl font-bold">User Details</h1>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-8 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold">Profile Information</h2>
            </div>
            <div class="p-8 space-y-4">
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 pb-4">
                    <span class="text-sm font-medium text-gray-500">Full Name</span>
                    <span class="col-span-2 text-sm text-gray-900">{{ $user->name }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 pb-4">
                    <span class="text-sm font-medium text-gray-500">Email Address</span>
                    <span class="col-span-2 text-sm text-gray-900">{{ $user->email }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 pb-4">
                    <span class="text-sm font-medium text-gray-500">Role</span>
                    <span class="col-span-2 text-sm">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold 
                            {{ $user->role->value === 'administrator' ? 'bg-purple-100 text-purple-800' : '' }}
                            {{ $user->role->value === 'author' ? 'bg-blue-100 text-blue-800' : '' }}
                            {{ $user->role->value === 'reader' ? 'bg-gray-100 text-gray-800' : '' }}">
                            {{ $user->role->label() }}
                        </span>
                    </span>
                </div>
                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 pb-4">
                    <span class="text-sm font-medium text-gray-500">Joined</span>
                    <span class="col-span-2 text-sm text-gray-900">{{ $user->created_at->format('M d, Y H:i') }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <span class="text-sm font-medium text-gray-500">Last Updated</span>
                    <span class="col-span-2 text-sm text-gray-900">{{ $user->updated_at->format('M d, Y H:i') }}</span>
                </div>
            </div>
            <div class="bg-gray-50 px-8 py-4 border-t border-gray-200 flex justify-end gap-4">
                <a href="{{ route('admin.users.edit', $user) }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Edit User
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>
