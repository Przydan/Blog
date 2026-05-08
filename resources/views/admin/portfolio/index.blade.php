<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Portfolio Projects</h1>
        <a href="{{ route('admin.portfolio.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
            Create Project
        </a>
    </div>

<div class="bg-white rounded-lg shadow overflow-hidden border border-gray-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Link</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($projects as $project)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $project->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $project->link }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                <a href="{{ route('admin.portfolio.show', $project) }}" class="inline-block px-2 py-1 rounded text-xs font-medium transition" style="background-color: #dbeafe; color: #1e40af;">View</a>
                                <a href="{{ route('admin.portfolio.edit', $project) }}" class="inline-block px-2 py-1 rounded text-xs font-medium transition" style="background-color: #e0e7ff; color: #3730a3;">Edit</a>
<form method="POST" action="{{ route('admin.portfolio.destroy', $project) }}" class="inline delete-form" data-confirm="Are you sure you want to delete this project?">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" class="px-2 py-1 rounded text-xs font-medium transition" style="background-color: #fee2e2; color: #b91c1c;">Delete</button>
                                 </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">
        {{ $projects->links() }}
    </div>
</x-admin-layout>
