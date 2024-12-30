<x-header>Promosi</x-header>

<body>
    <div class="relative flex h-screen">

        <x-sidebar></x-sidebar>

        <!-- Konten Utama -->
        <div class="flex justify-center w-full p-10 sm:ml-64">
            <div class="relative w-full sm:w-[70%]">
                <div class="carousell mt-24 relative">
                    <h3 class="text-lg font-bold text-black mb-4">Carousel</h3>
                    <!-- Slide 1 -->
                    <div class="carousel-item">
                        <img src="{{ asset('img/halamanhome/promo/BgCanon.jpg') }}" alt="Slide 1"
                            class="w-full h-[70%] object-cover">
                        <div
                            class="absolute inset-0 flex flex-col items-start justify-center bg-opacity-50 px-4 sm:px-8 md:px-16">
                            <h1
                                class="text-base sm:text-lg md:text-2xl lg:text-3xl xl:text-4xl font-bold text-white mb-4">
                                Product Name 1
                            </h1>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item hidden">
                        <img src="{{ asset('img/halamanhome/promo/BgSony.jpg') }}" alt="Slide 2"
                            class="w-full h-[70%] object-cover">
                        <div
                            class="absolute inset-0 flex flex-col items-start justify-center bg-opacity-50 px-4 sm:px-8 md:px-16">
                            <h1
                                class="text-base sm:text-lg md:text-2xl lg:text-3xl xl:text-4xl font-bold text-white mb-4">
                                Product Name 2
                            </h1>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <button id="prev"
                        class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-300 z-10">
                        &lt;
                    </button>
                    <button id="next"
                        class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-300 z-10">
                        &gt;
                    </button>
                </div>

                <!-- Tombol Tambah Carousel -->
                <div class="flex justify-start mt-4">
                    <label for="my_modal_6"
                        class="btn bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition">Tambah
                        Carousel</label>




                    {{-- MODAL TAMBAH CAROUSEL --}}
                    <input type="checkbox" id="my_modal_6" class="modal-toggle" />
                    <div class="modal" role="dialog">
                        <div class="modal-box bg-white rounded-lg shadow-lg p-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-4">Tambah Carousel</h3>
                            <form action="" class="space-y-4">
                                <!-- Image Input -->
                                <label for="image_1"
                                    class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-100 hover:bg-gray-200 transition">
                                    <img id="preview_image_1" src="#" alt="Preview"
                                        class="hidden absolute w-full h-full object-cover rounded-lg" />
                                    <div id="placeholder_1" class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-10 h-10 mb-3 text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-1 text-sm text-gray-600 font-semibold">Upload Image</p>
                                        <p class="text-xs text-gray-500">SVG, PNG, JPG, or GIF (MAX. 800x400px)</p>
                                    </div>
                                    <input id="image_1" name="image_path1" type="file" class="hidden"
                                        onchange="previewImage(event, 'preview_image_1', 'placeholder_1')" />
                                </label>

                                <!-- Product Name Input -->
                                <div>
                                    <label for="name" class="block mb-1 text-sm font-medium text-gray-700">Nama
                                        Produk</label>
                                    <input type="text" name="product_name" id="name"
                                        class="w-full bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 transition"
                                        placeholder="Type product name" required>
                                </div>

                                <!-- Buttons -->
                                <div class="flex justify-end space-x-3">
                                    <!-- Close Button -->
                                    <label for="my_modal_6"
                                        class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 focus:ring-2 focus:ring-gray-300 focus:outline-none transition cursor-pointer">
                                        Close
                                    </label>
                                    <!-- Submit Button -->
                                    <button type="submit"
                                        class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-300 focus:outline-none transition">
                                        Kirim
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- TABEL PRODUK -->
                <div class="mt-8">
                    <h3 class="text-lg font-bold text-black mb-4">Daftar Produk</h3>
                    <div class="overflow-x-auto text-black">
                        <table class="table-auto w-full border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 border border-black">No</th>
                                    <th class="px-4 py-2 border border-black">Gambar</th>
                                    <th class="px-4 py-2 border border-black">Nama Produk</th>
                                    <th class="px-4 py-2 border border-black">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Row 1 -->
                                <tr>
                                    <td class="px-4 py-2 text-center border border-black">1</td>
                                    <td class="px-4 py-2 text-center border border-black">
                                        <img src="https://via.placeholder.com/100x60" alt="Gambar Produk"
                                            class="w-24 h-16 object-cover rounded">
                                    </td>
                                    <td class="px-4 py-2 border border-black">Produk 1</td>
                                    <td class="px-4 py-2 text-center border border-black">
                                        <button type="button"
                                            class="px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300 transition">
                                            Edit
                                        </button>
                                        <button type="button"
                                            class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                                <!-- Row 2 -->
                                <tr>
                                    <td class="px-4 py-2 text-center border border-black">2</td>
                                    <td class="px-4 py-2 text-center border border-black">
                                        <img src="https://via.placeholder.com/100x60" alt="Gambar Produk"
                                            class="w-24 h-16 object-cover rounded">
                                    </td>
                                    <td class="px-4 py-2 border border-black">Produk 2</td>
                                    <td class="px-4 py-2 text-center border border-black">
                                        <button type="button"
                                            class="px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300 transition">
                                            Edit
                                        </button>
                                        <button type="button"
                                            class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- BANNER NEW PRODUK --}}
                <div class="mt-8">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Banner New Product</h3>
                    <form action="/submit" method="POST" enctype="multipart/form-data" class="space-y-4">
                        <div class="flex justify-around gap-4">
                            <!-- Image Input 1 -->
                            <label for="image_1"
                                class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-100 hover:bg-gray-200 transition">
                                <img id="preview_image_1" src="#" alt="Preview"
                                    class="hidden absolute w-full h-full object-cover rounded-lg" />
                                <div id="placeholder_1" class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-10 h-10 mb-3 text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-1 text-sm text-gray-600 font-semibold">Upload Image</p>
                                    <p class="text-xs text-gray-500">SVG, PNG, JPG, or GIF (MAX. 800x400px)</p>
                                </div>
                                <input id="image_1" name="image_path1" type="file" class="hidden"
                                    onchange="previewImage(event, 'preview_image_1', 'placeholder_1')" />
                            </label>

                            <!-- Image Input 2 -->
                            <label for="image_2"
                                class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-100 hover:bg-gray-200 transition">
                                <img id="preview_image_2" src="#" alt="Preview"
                                    class="hidden absolute w-full h-full object-cover rounded-lg" />
                                <div id="placeholder_2" class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-10 h-10 mb-3 text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-1 text-sm text-gray-600 font-semibold">Upload Image</p>
                                    <p class="text-xs text-gray-500">SVG, PNG, JPG, or GIF (MAX. 800x400px)</p>
                                </div>
                                <input id="image_2" name="image_path2" type="file" class="hidden"
                                    onchange="previewImage(event, 'preview_image_2', 'placeholder_2')" />
                            </label>
                        </div>

                        <!-- Product Name Inputs in One Row -->
                        <div class="flex gap-4">
                            <div class="flex-1">
                                <label for="name1" class="block mb-1 text-sm font-medium text-gray-700">Nama
                                    Produk</label>
                                <input type="text" name="product_name1" id="name1"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 transition"
                                    placeholder="Type product name" required>
                            </div>
                            <div class="flex-1">
                                <label for="name2" class="block mb-1 text-sm font-medium text-gray-700">Nama
                                    Produk</label>
                                <input type="text" name="product_name2" id="name2"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 transition"
                                    placeholder="Type product name" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-left">
                            <button type="submit"
                                class="px-6 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition">Submit</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>


    {{-- speed dial  --}}
    <x-speedDeal></x-speedDeal>


    {{-- js --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    <script>
        const carouselItems = document.querySelectorAll('.carousel-item');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');

        let currentIndex = 0;

        // Function to show the current slide
        function showSlide(index) {
            carouselItems.forEach((item, i) => {
                item.classList.toggle('hidden', i !== index);
            });
        }

        // Event listener for the Previous button
        prevButton.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + carouselItems.length) % carouselItems.length;
            showSlide(currentIndex);
        });

        // Event listener for the Next button
        nextButton.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % carouselItems.length;
            showSlide(currentIndex);
        });

        // Initialize the first slide
        showSlide(currentIndex);

        // PREVIEW IMAGE
        function previewImage(event, previewId, placeholderId) {
            const input = event.target; // Input file element
            const file = input.files[0]; // File yang dipilih
            const preview = document.getElementById(previewId); // Elemen img untuk preview
            const placeholder = document.getElementById(placeholderId); // Placeholder teks/icon

            if (file) {
                const reader = new FileReader();

                // Ketika file selesai dibaca
                reader.onload = function(e) {
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
