<x-header>Keranjang</x-header>

<body>
    <x-navbar :isRegistrationPage="true"></x-navbar>

    <!-- Keranjang Belanja -->
    <section class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Keranjang Barang</h1>

        <!-- Daftar Produk di Keranjang -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="space-y-6">
                <!-- Produk 1 -->
                <div class="border-b pb-4">
                    <div
                        class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-4">
                        <img src="https://via.placeholder.com/80" alt="Produk 1" class="w-20 h-20 object-cover rounded-md">
                        <div class="flex flex-col w-full">
                            <h3 class="text-lg font-semibold text-gray-800">Produk 1</h3>
                            <p class="text-gray-600">Deskripsi produk.</p>
                            <div class="flex justify-between mt-2 w-full">
                                <div class="flex items-center space-x-2">
                                    <button class="bg-gray-300 text-gray-800 px-2 py-1 rounded-full">-</button>
                                    <span class="text-gray-700">1</span>
                                    <button class="bg-gray-300 text-gray-800 px-2 py-1 rounded-full">+</button>
                                </div>
                                <div class="flex flex-col text-right">
                                    <p class="text-gray-700">Durasi: 6 Hari</p>
                                    <p class="text-gray-700 font-semibold">Rp 100.000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Produk 2 -->
                <div class="border-b pb-4">
                    <div
                        class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-4">
                        <img src="{{ asset('img/bca.png') }}" alt="Produk 2"
                            class="w-20 h-20 object-cover rounded-md">
                        <div class="flex flex-col w-full">
                            <h3 class="text-lg font-semibold text-gray-800">Produk 2</h3>
                            <p class="text-gray-600">Deskripsi produk.</p>
                            <div class="flex justify-between mt-2 w-full">
                                <div class="flex items-center space-x-2">
                                    <button class="bg-gray-300 text-gray-800 px-2 py-1 rounded-full">-</button>
                                    <span class="text-gray-700">1</span>
                                    <button class="bg-gray-300 text-gray-800 px-2 py-1 rounded-full">+</button>
                                </div>
                                <div class="flex flex-col text-right">
                                    <p class="text-gray-700">Durasi: 2 Hari</p>
                                    <p class="text-gray-700 font-semibold">Rp 150.000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total dan Checkout -->
        <div class="mt-6 flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
            <div class="text-xl font-semibold text-gray-800">
                Total: <span class="text-xl text-red-600">Rp 250.000</span>
            </div>
            <div class="tombol">
                <a href="produk"
                    class="bg-gray-700 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-gray-800 transition mr-2">Kembali</a>
                <a href="#"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition">Checkout</a>
            </div>
        </div>
    </section>

</body>
