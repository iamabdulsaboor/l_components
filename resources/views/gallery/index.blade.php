<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Gallery
            </h2>
            <a href="{{ route('gallery.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700">
                Add Gallery Item
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Size</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Crop</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Show Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($galleryItems as $gallery)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $gallery->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ Str::limit($gallery->description, 50) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($gallery->image)
                                    <img src="{{ asset('storage/'.$gallery->image) }}" class="w-16 h-16 object-cover rounded">
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $gallery->size }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $gallery->crop ? 'Yes' : 'No' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $gallery->show_description ? 'Yes' : 'No' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                <a href="{{ route('gallery.edit', $gallery->id) }}" class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 text-sm">Edit</a>
                                <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Delete this gallery item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($galleryItems->isEmpty())
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No gallery items found.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
