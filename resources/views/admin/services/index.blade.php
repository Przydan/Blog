<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Service Management</h1>
        <a href="{{ route('admin.services.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
            Create Service
        </a>
    </div>

<div class="bg-white rounded-lg shadow overflow-hidden border border-gray-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Icon</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($services as $service)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $service->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $service->icon }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                <x-button variant="view" href="{{ route('admin.services.show', $service) }}" class="text-xs">View</x-button>
                                <x-button variant="edit" href="{{ route('admin.services.edit', $service) }}" class="text-xs">Edit</x-button>
                                <form method="POST" action="{{ route('admin.services.destroy', $service) }}" class="inline delete-form" data-confirm="Are you sure you want to delete this service?">
                                     @csrf
                                     @method('DELETE')
                                     <x-button variant="danger" type="submit" class="text-xs">Delete</x-button>
                                 </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">
        {{ $services->links() }}
    </div>
</x-admin-layout>
