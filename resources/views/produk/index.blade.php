<x-header>Produk Kami</x-header>

<body class="bg-gray-100">

    <!-- Navbar -->
    <x-navbar></x-navbar>

    <!-- Content -->
    <div class="container mx-auto p-6 mt-20">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-semibold text-black flex-shrink-0">Kamera</h1>
            <!-- Search input and button -->
            <div class="flex items-center w-full ml-6 space-x-2">
                <input type="text" class="input input-bordered input-primary flex-grow h-8 bg-gray-100 w-full max-w-xs"
                    placeholder="Cari Kamera...">
                <button
                    class="btn btn-primary h-3 ml-2 rounded-xl text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200 ease-in-out flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" class="-mr-1"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#FFFFFF"
                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                    </svg>

                    <span>Cari</span>
                </button>
            </div>
        </div>



        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Kamera 1" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">Kamera DSLR Canon</h2>
                    <p class="text-gray-600 mt-2">Kamera DSLR dengan kualitas foto terbaik untuk pemotretan
                        profesional.</p>
                    <p class="text-lg font-semibold text-green-600 mt-2">Rp 250.000/hari</p>
                    <a href="#"
                        class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Sewa
                        Sekarang</a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Kamera 2" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">Kamera Mirrorless Sony</h2>
                    <p class="text-gray-600 mt-2">Kamera mirrorless dengan desain kompak dan fitur canggih untuk
                        fotografi modern.</p>
                    <p class="text-lg font-semibold text-green-600 mt-2">Rp 350.000/hari</p>
                    <a href="#"
                        class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Sewa
                        Sekarang</a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Kamera 3" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">Kamera Aksi GoPro</h2>
                    <p class="text-gray-600 mt-2">Kamera aksi GoPro untuk olahraga ekstrem dan dokumentasi
                        petualangan.</p>
                    <p class="text-lg font-semibold text-green-600 mt-2">Rp 200.000/hari</p>
                    <a href="#"
                        class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Sewa
                        Sekarang</a>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Kamera 4" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">Kamera Polaroid</h2>
                    <p class="text-gray-600 mt-2">Kamera Polaroid untuk mencetak foto langsung dalam hitungan detik.
                    </p>
                    <p class="text-lg font-semibold text-green-600 mt-2">Rp 100.000/hari</p>
                    <a href="#"
                        class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Sewa
                        Sekarang</a>
                </div>
            </div>
        </div>
    </div>

</body>
