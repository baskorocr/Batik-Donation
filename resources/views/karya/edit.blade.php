<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Karya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('karya.update', $karya->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-900">Title</label>
                            <input type="text" name="title" id="title" value="{{ $karya->title }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-black">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-900">Description</label>
                            <textarea name="description" id="description" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 text-black">{{ $karya->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="cover_image" class="block text-sm font-medium text-gray-900">Cover Image (Optional)</label>
                            <input type="file" name="cover_image" id="cover_image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm text-black">

       
                            <img src="{{ asset('storage/' . $karya->cover_image) }}" alt="Karya Image" class="h-20 w-20 mt-2">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Update Karya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
