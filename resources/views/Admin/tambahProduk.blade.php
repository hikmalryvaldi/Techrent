<x-header>Halaman Tambah Produk Baru</x-header>
<body>
    {{-- side bar --}}
    <x-sidebar></x-sidebar>

    {{-- form --}}
    <div class="p-4 my-16 sm:ml-64">
        <div class="mx-auto bg-gray-100 rounded-lg shadow-lg">
            <h1 class="text-black text-center text-2xl font-bold">Tambah Produk Baru</h1>
            <form action="/Admin/tambahProduk" class="p-4 md:p-5" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="col-span-2">
                    <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Image</label>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                        {{-- Image ke 1 --}}
                        <label for="image_1" class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <img id="preview_image_1" src="#" alt="Preview" class="hidden absolute w-full h-full object-cover rounded-lg" />
                            <div id="placeholder_1" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Image ke 1</span></p>
                                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input id="image_1" name="images[]" type="file" class="hidden" onchange="previewImage(event, 'preview_image_1', 'placeholder_1')" />
                        </label>

                        {{-- image ke 2 --}}
                        <label for="image_2" class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <img id="preview_image_2" src="#" alt="Preview" class="hidden absolute w-full h-full object-cover rounded-lg" />
                            <div id="placeholder_2" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Image ke 1</span></p>
                                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input id="image_2" name="images[]" type="file" class="hidden" onchange="previewImage(event, 'preview_image_2', 'placeholder_2')" />
                        </label>

                        {{-- image ke 3 --}}
                        <label for="image_3" class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <img id="preview_image_3" src="#" alt="Preview" class="hidden absolute w-full h-full object-cover rounded-lg" />
                            <div id="placeholder_3" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Image ke 1</span></p>
                                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input id="image_3" name="images[]" type="file" class="hidden" onchange="previewImage(event, 'preview_image_3', 'placeholder_3')" />
                        </label>

                        {{-- image ke 4 --}}
                        <label for="image_4" class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <img id="preview_image_4" src="#" alt="Preview" class="hidden absolute w-full h-full object-cover rounded-lg" />
                            <div id="placeholder_4" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Image ke 1</span></p>
                                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input id="image_4" name="images[]" type="file" class="hidden" onchange="previewImage(event, 'preview_image_4', 'placeholder_4')" />
                        </label>

                    </div>
                </div>
                
                

                <div class="grid gap-4 mb-4 grid-cols-2 my-3">
                    {{-- Nama Produk --}}
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nama
                            Produk</label>
                        <input type="text" name="product_name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type product name" required>
                    </div>

                    {{-- Harga --}}
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Harga</label>
                        <input type="number" name="price" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Rp 1000" required>
                    </div>

                    {{-- Kategori --}}
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Kategori</label>
                        <select id="category_id" name="category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required>
                            <option value="" selected>Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Jumlah Stok --}}
                    <div>
                        <label for="stock"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Jumlah Stok</label>
                        <div class="relative flex items-center max-w-[8rem]">
                            <button type="button" id="decrement-button" data-input-counter-decrement="stock"
                                class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h16" />
                                </svg>
                            </button>
                            <input type="text"id="stock" name="stock" data-input-counter
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="0" required />
                            <button type="button" id="increment-button" data-input-counter-increment="stock"
                                class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>
                        <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Please
                            select a 5 digit number from 0 to 9.</p>
                    </div>

                    {{-- Deskripsi Produk --}}
                    <div class="col-span-2">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Product
                            Description</label>
                        <textarea id="description" name="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write product description here"></textarea>
                    </div>
                </div>

                {{-- button add --}}
                <button type="button" data-modal-target="popup-save" data-modal-toggle="popup-save"
                    class="text-white mx-1 inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Save
                </button>

                <!-- Pop-Up Save -->
                <div id="popup-save" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <div class="p-4 md:p-5 text-center">
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Data Yang
                                    Telah Di Masukan Sudah Benar?</h3>
                                <!-- Button Submit -->
                                <button type="submit" data-modal-hide="popup-save"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Yes, I'm sure
                                </button>
                                <!-- Button Cancel -->
                                <button type="button" data-modal-hide="popup-save"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                    No, cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button Cancel -->
                <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-10 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    Cancel
                </button>

                <!-- Pop-Up Cancel -->
                <div id="popup-modal" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <div class="p-4 md:p-5 text-center">
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Data Yang Sudah
                                    Anda Masukan Tidak Akan Tersimpan, Apakah Anda Yakin?</h3>
                                <a href="produk">
                                    <button data-modal-hide="popup-modal" type="button"
                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Yes, I'm sure
                                    </button>
                                </a>
                                <button type="button" data-modal-hide="popup-modal"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                    No, cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

{{-- js --}}
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script>
    function previewImage(event, previewId, placeholderId) {
    const input = event.target; // Input file element
    const file = input.files[0]; // File yang dipilih
    const preview = document.getElementById(previewId); // Elemen img untuk preview
    const placeholder = document.getElementById(placeholderId); // Placeholder teks/icon

    if (file) {
        const reader = new FileReader();

        // Ketika file selesai dibaca
        reader.onload = function (e) {
            preview.src = e.target.result; // Set sumber gambar dari hasil baca file
            preview.classList.remove('hidden'); // Tampilkan gambar preview
            placeholder.classList.add('hidden'); // Sembunyikan placeholder
        };

        reader.readAsDataURL(file); // Baca file sebagai URL
    } else {
        // Jika tidak ada file, kembalikan ke state awal
        preview.src = "#";
        preview.classList.add('hidden');
        placeholder.classList.remove('hidden');
    }
}

</script>
</body>