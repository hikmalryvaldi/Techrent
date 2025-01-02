<x-header>Pesanan</x-header>

<body style="height: 100%;">
    {{-- Navbar --}}
    <x-sidebar></x-sidebar>

    {{-- Menu Pesanan --}}
    <div class="p-4 my-16 sm:ml-64">
        <div class="mx-auto p-8 bg-gray-100 rounded-lg shadow-lg">
            <h2 class="text-black text-2xl font-bold">Pesanan</h2>

            {{-- Menu Pesanan --}}
            <x-menuPesanan></x-menuPesanan>


            <div>
                {{-- search --}}
                <x-searchPesanan></x-searchPesanan>

                {{-- Table Head Pesanan --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4">
                                    No Pesanan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Produk
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total Harga
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jasa Kirim
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="w-4 p-4">
                                    00001
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex flex-col items-start space-y-4 w-[140px]">
                                        <!-- Item 1 buat mempeli 1 perangkat-->
                                        <div class="flex items-center">
                                            <img src="{{ asset('img/halamanhome/kategori/Kamera.jpg') }}" alt="Kamera"
                                                class="w-[30px] mr-4 rounded-full">
                                            <div>
                                                <span class="font-semibold text-white">Canon 700D</span>
                                                <p class="text-sm text-gray-500">Peminjaman: 1 minggu</p>
                                            </div>
                                        </div>

                                        <!-- Item 2 membeli lebih dari beberapa perangkat-->
                                        {{-- <div class="flex items-center">
                                      <img src="{{ asset('img/halamanhome/kategori/Kamera.jpg') }}" alt="Kamera" class="w-[30px] mr-4 rounded-full">
                                      <div>
                                        <span class="font-semibold text-white">Canon 800D</span>
                                        <p class="text-sm text-gray-500">Peminjaman: 1 minggu</p>
                                      </div>
                                    </div> --}}
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    cihuy
                                </td>
                                <td class="px-6 py-4">
                                    Rp 30000
                                </td>
                                <td class="px-6 py-4">
                                    Dikirim
                                </td>
                                <td class="px-6 py-4">
                                    Gojek/Gosen
                                </td>
                                <td class="px-6 py-4">

                                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
    </div>




    {{-- js --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
