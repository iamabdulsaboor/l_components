<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ isset($product) ? 'Edit' : 'Add' }} Product
            </h2>
            <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-300">
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
            
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @if(isset($product)) @method('PUT') @endif

                <!-- Name -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Name</label>
                    <input type="text" name="name" value="{{ $product->name ?? old('name') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Code -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Code</label>
                    <input type="text" name="code" value="{{ $product->code ?? old('code') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('code') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Price -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Price</label>
                    <input type="number" name="price" value="{{ $product->price ?? old('price') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('price') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Discount Price -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Discount Price</label>
                    <input type="number" name="discount_price" value="{{ $product->discount_price ?? old('discount_price') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('discount_price') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Size -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Size</label>
                    <input type="text" name="size" value="{{ $product->size ?? old('size') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('size') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Weight -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Weight</label>
                    <input type="text" name="weight" value="{{ $product->weight ?? old('weight') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('weight') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Image -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Image</label>
                    <input type="file" name="image" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @if(isset($product) && $product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" class="mt-2 w-24 h-24 object-cover rounded">
                    @endif
                    @error('image') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Description</label>
                    <textarea name="description" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ $product->description ?? old('description') }}</textarea>
                    @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Meta Title -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ $product->meta_title ?? old('meta_title') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('meta_title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Meta Description -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Meta Description</label>
                    <textarea name="meta_description" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ $product->meta_description ?? old('meta_description') }}</textarea>
                    @error('meta_description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Meta Keywords -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Meta Keywords</label>
                    <input type="text" name="meta_keywords" value="{{ $product->meta_keywords ?? old('meta_keywords') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('meta_keywords') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700">
                        {{ isset($product) ? 'Update' : 'Create' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
