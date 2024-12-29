<x-header>Keranjang</x-header>

<body>
    <x-navbar :isRegistrationPage="true"></x-navbar>

    <!-- Keranjang Belanja -->
    <section class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Keranjang Barang</h1>

        <!-- Rincian Identitas Pembeli -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
            <div class="flex items-center space-x-3">
                <!-- Ikon SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="15" viewBox="0 0 384 512"
                    class="text-gray-800">
                    <path
                        d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                </svg>
                <!-- Teks Heading -->
                <h2 class="text-xl font-semibold text-gray-800">Alamat Pengiriman</h2>
            </div>
            <div class="space-y-4">
                <!-- Nama -->
                <div>
                    <p class="text-gray-700 font-semibold mt-3">Nama Lengkap:</p>
                    <p class="text-gray-800">[AHMAD MURBERRY]</p>
                </div>
                <!-- Nomor Telepon -->
                <div>
                    <p class="text-gray-700 font-semibold">Nomor Telepon:</p>
                    <p class="text-gray-800">[007]</p>
                </div>
                <!-- Alamat -->
                <div>
                    <p class="text-gray-700 font-semibold">Alamat:</p>
                    <p class="text-gray-800">[ASTANA ANYAR]</p>
                </div>
            </div>
        </div>

        <!-- Daftar Produk di Keranjang -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="space-y-6">
                <!-- Produk 1 -->
                <div class="border-b pb-4">
                    <div
                        class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-4">
                        <img src="https://via.placeholder.com/80" alt="Produk 1"
                            class="w-20 h-20 object-cover rounded-md">
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
                        <img src="{{ asset('img/bca.png') }}" alt="Produk 2" class="w-20 h-20 object-cover rounded-md">
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

            <!-- Dropdown Voucher -->
            <div class="mt-6">
                <label for="voucher" class="block text-gray-700 font-semibold mb-2">Pilih Voucher untuk
                    Keranjang:</label>
                <select id="voucher" name="voucher"
                    class="bg-gray-200 border border-gray-400 text-gray-800 rounded-lg px-4 py-2 w-full hover:bg-gray-300 focus:ring focus:ring-blue-500">
                    <option value="">-- Pilih Voucher --</option>
                    <option value="voucher1">Voucher Diskon 10%</option>
                    <option value="voucher2">Voucher Gratis Ongkir</option>
                    <option value="voucher3">Voucher Cashback</option>
                </select>
            </div>
        </div>

        <!-- Rincian Pembayaran -->
        <div class="bg-white p-6 rounded-lg shadow-lg mt-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Rincian Pembayaran</h2>
            <div class="space-y-2">
                <!-- Subtotal Produk -->
                <div class="flex justify-between">
                    <p class="text-gray-700">Subtotal Produk:</p>
                    <p class="text-gray-800 font-semibold">Rp 250.000</p>
                </div>
                <!-- Subtotal Pengiriman -->
                <div class="flex justify-between">
                    <p class="text-gray-700">Subtotal Pengiriman:</p>
                    <p class="text-gray-800 font-semibold">Rp 20.000</p>
                </div>
                <!-- Voucher Diskon -->
                <div class="flex justify-between">
                    <p class="text-gray-700">Voucher Diskon:</p>
                    <p class="text-gray-800 font-semibold">- Rp 25.000</p>
                </div>
                <hr class="my-2 border-gray-300">
                <!-- Total Pembayaran -->
                <div class="flex justify-between text-lg font-semibold">
                    <p class="text-gray-800">Total Pembayaran:</p>
                    <p class="text-red-600">Rp 245.000</p>
                </div>
            </div>
        </div>



        <!-- Total dan Checkout -->
        <div class="mt-6 flex flex-col sm:flex-row justify-end items-center space-y-4 sm:space-y-0">
            <div class="tombol">
                <a href="produk"
                    class="bg-gray-700 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-gray-800 transition mr-2">Kembali</a>
                <a href="#"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition">Checkout</a>
            </div>
        </div>
    </section>

</body>
