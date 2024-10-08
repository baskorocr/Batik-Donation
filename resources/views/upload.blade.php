<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Upload Karya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-lg font-semibold font-sans text-black">
                    Upload Your Work
                </div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <form id="upload-form" action="{{ route('stores.karya') }}" method="POST" enctype="multipart/form-data"
                                    class="p-6 text-black">
                                    @csrf
                                    <div class="space-y-4">
                                        <!-- Title -->
                                        <div>
                                            <label for="title"
                                                class="block text-sm font-medium text-black font-sans">Title</label>
                                            <input type="text" name="title" id="title" required
                                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm text-black">
                                        </div>
                                        <div>
                                            <label for="title"
                                                class="block text-sm font-medium text-black font-sans">Pembuat</label>
                                            <input type="text" name="pembuat" id="pembuat" required
                                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm text-black">
                                        </div>

                                        <!-- Description -->
                                        <div>
                                            <label for="description"
                                                class="block text-sm font-medium text-black font-sans">Description</label>
                                            <textarea name="description" id="description" rows="4"
                                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm text-black"></textarea>
                                        </div>

                                        <!-- File Upload -->
                                        <div>
                                            <label for="file" class="block text-sm font-medium text-black font-sans">Upload
                                                File</label>
                                            <input type="file" name="file" id="file" required
                                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm text-black">
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="flex items-center justify-end mt-4">
                                            <button type="submit" id="uploadbutton"
                                                class="inline-flex items-center px-4 py-2 font-sans bg-blue-500 text-white border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest shadow-sm hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition ease-in-out duration-150">
                                                {{ __('Upload') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var uploadbutton = document.getElementById('uploadbutton');
        var form = document.getElementById('upload-form'); // Asumsikan form memiliki id 'myForm'

        uploadbutton.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah submit default

            // Validasi form
            if (form.checkValidity()) {
                // Jika semua field terisi
                setTimeout(function () {
                    event.target.disabled = true;
                    event.target.textContent = 'Progress Upload...'; 
                }, 0);

                // Submit form secara manual
                form.submit(); 
            } else {
                // Jika ada field kosong, tampilkan pesan error
                alert("Harap isi semua field yang diperlukan.");
                // Enable tombol submit kembali
                event.target.disabled = false;
                event.target.textContent = 'UPLOAD'; 
            }
        });
    </script>
</x-app-layout>
