<!-- Product Details -->
<div class="w-full lg:w-1/2">
    <h1 class="text-2xl font-bold text-gray-800 mb-2">Kamera Canon EOS 5D Mark IV</h1>
    <div class="flex items-center mb-4">
        <span class="text-yellow-500 text-lg">★ 4.5</span>
        <span class="text-gray-500 text-sm ml-2">(19 rating)</span>
        <span class="text-gray-500 text-sm ml-4">Penyewa 30+</span>
    </div>

    <!-- Shipping Options -->
    <div class="mb-4 relative">
        <h2 class="text-gray-700 font-medium mb-2">Jasa Kirim:</h2>
        <div class="relative">
            <button class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white shadow-md text-left" id="shippingDropdownButton">Pilih Jasa Kirim</button>
            <div id="shippingDropdown" class="absolute hidden mt-2 w-full bg-white border border-gray-300 rounded-lg shadow-md z-10">
                <div class="p-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-600">Garansi Tepat Waktu</span>
                        <span class="text-green-500 text-sm">Dapatkan Voucher s/d Rp10.000 jika pesanan terlambat.</span>
                    </div>
                    <ul class="divide-y divide-gray-200">
                        <li class="py-2 flex justify-between">
                            <span class="text-gray-700">Instant</span>
                            <button class="text-gray-400 font-bold">Rp 30.000</button>
                        </li>
                        <li class="py-2 flex justify-between">
                            <span class="text-gray-700">Same Day</span>
                            <button class="text-gray-400 font-bold" disabled>Rp 30.000</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="text-3xl font-bold text-gray-900 mb-4">Rp95.000</div>

    <!-- Color Options -->
    <div class="mb-4">
        <h2 class="text-gray-700 font-medium mb-2">Pilih Jangka Waktu Peminjaman:</h2>
        <div class="flex space-x-4">
            <button id="Satu" class="variant-button px-4 py-2 border rounded-lg bg-gray-100 font-bold" onclick="selectVariant('Satu')">1 Hari</button>
            <button id="Dua" class="variant-button px-4 py-2 border rounded-lg text-gray-700" onclick="selectVariant('Dua')">2 Hari</button>
            <button id="Tiga" class="variant-button px-4 py-2 border rounded-lg text-gray-700" onclick="selectVariant('Tiga')">3 Hari</button>
        </div>
    </div>

    <!-- Stock and Purchase -->
    <div class="flex items-center space-x-4 mb-4">
        <div>
            <h2 class="text-gray-700 font-medium mb-2">Atur jumlah dan catatan</h2>
            <div class="flex items-center space-x-2">
                <button onclick="adjustQuantity(-1)" class="px-4 py-2 border rounded-lg">-</button>
                <input id="quantityInput" type="text" value="1" class="w-12 text-center border rounded-lg">
                <button onclick="adjustQuantity(1)" class="px-4 py-2 border rounded-lg">+</button>
            </div>
            <div class="text-sm text-gray-500 mt-2">Stok: 83</div>
        </div>
        <div class="flex flex-col lg:flex-row gap-4 mt-6">
            <button class="px-6 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 w-full lg:w-auto">Keranjang</button>
            <button class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg shadow hover:bg-gray-200 w-full lg:w-auto">Sewa Sekarang</button>
        </div>
    </div>

    <!-- Additional Info -->
    <div>
        
        <h2 class="text-gray-700 font-medium mb-2">Detail</h2>
        <p class="text-sm text-gray-600 mb-2">Tipe Kamera : Canon EOS 5D Mark IV</p>
        <p class="text-sm text-gray-600 mb-2">Min. Pemesanan: 1 Buah</p>
        <p class="text-sm text-gray-600 mb-2">Etalase: Canon</p>
        <p class="text-sm text-gray-600">HARAP BACA SEBELUM ORDER YAH</p>
        <p class="text-sm text-gray-600">Estimas Peminjaman Camera: 1 sampai 3 hari</p>
        <p class="text-sm text-gray-600">READY STOCK</p>
        
    </div>
</div>
</div>
</div>