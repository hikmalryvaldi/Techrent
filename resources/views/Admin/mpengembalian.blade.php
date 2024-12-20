<x-header>Halaman Pengembalian</x-header>

<body style="height: 100%;">
    {{-- Navbar --}}
    <x-sidebar></x-sidebar>

    {{-- Menu Pesanan --}}
    <div class="p-4 my-16 sm:ml-64">
        <div class="mx-auto p-8 bg-gray-100 rounded-lg shadow-lg">
            <h2 class="text-black text-2xl font-bold">Pengembalian Barang</h2>

            {{-- Menu Pesanan --}}
            <x-menuPengembalian></x-menuPengembalian>


            <div>
                {{-- search --}}
                <x-searchPesanan></x-searchPesanan>

                {{-- Table Head Pesanan --}}
                <div class="relative my-5 overflow-x-auto shadow-md sm:rounded-lg">

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
                                    Kategori
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    No Hp
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Alamat
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-4 p-4">
                                    00001
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center space-x-4">
                                        <img src="{{ asset('img/halamanhome/kategori/Kamera.jpg') }}" alt=""
                                            class="w-8 h-8 rounded-full object-cover">
                                        <div class="flex flex-col">
                                            <span class="font-semibold text-white">Canon 700D</span>
                                            <p class="text-sm text-gray-500 truncate">Peminjaman: 1 minggu</p>
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
                                </th>
                                <td class="px-6 py-4">
                                    Kamera
                                </td>
                                <td class="px-6 py-4">
                                    peminjam@gmail.com
                                </td>
                                <td class="px-6 py-4">
                                    08234398293
                                </td>
                                <td class="px-4 py-2 break-words text-sm md:text-base max-w-full">
                                    kp.suka tani, des.cokor kuda, kec. suka ringan, kab. bangkong budug, prov. jawa
                                    barat
                                    <br>
                                    <a href="https://www.google.com/maps?q=kp.suka+tani,des.cokor+kuda,kec.suka+ringan,kab.bangkong+budug,prov.jawa+barat"
                                        target="_blank" class="text-blue-500 hover:underline">
                                        Lihat di Google Maps
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    {{-- button hijau --}}


                                    <!-- Button Hijau-->
                                    <button
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                        data-modal-target="default-modal" data-modal-toggle="default-modal"
                                        type="button">
                                        Info Pesanan
                                    </button>

                                    {{-- MODAL INFO PESANAN --}}
                                    <div id="default-modal" tabindex="-1" aria-hidden="true"
                                        class="hidden fixed inset-0 z-50 justify-center items-center bg-gray-900 bg-opacity-50">
                                        <div class="relative w-full max-w-2xl">
                                            <!-- Modal content -->
                                            <div class="bg-white rounded-lg shadow-lg dark:bg-gray-800">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700 rounded-t">
                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                        Detail Pesanan
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-500 hover:text-gray-900 dark:hover:text-white rounded-lg text-sm w-8 h-8 flex justify-center items-center"
                                                        data-modal-hide="default-modal">
                                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>


                                                <div
                                                    class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6 dark:bg-gray-800 shadow rounded-lg">
                                                    <!-- Informasi Pesanan -->
                                                    <div class="space-y-4">
                                                        <!-- No. Pesanan -->
                                                        <div>
                                                            <h4
                                                                class="flex items-center text-sm font-bold text-gray-700 dark:text-gray-200">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                                    width="15" class="mr-2"
                                                                    viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                    <path fill="#ffffff"
                                                                        d="M280 64l40 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 128C0 92.7 28.7 64 64 64l40 0 9.6 0C121 27.5 153.3 0 192 0s71 27.5 78.4 64l9.6 0zM64 112c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16l-16 0 0 24c0 13.3-10.7 24-24 24l-88 0-88 0c-13.3 0-24-10.7-24-24l0-24-16 0zm128-8a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
                                                                </svg>
                                                                No. Pesanan
                                                            </h4>
                                                            <p class="text-gray-600 dark:text-gray-300 mt-2">
                                                                241202RCA11MDK</p>
                                                        </div>

                                                        <!-- Alamat Pengiriman -->
                                                        <div>
                                                            <h4
                                                                class="flex items-center text-sm font-bold text-gray-700 dark:text-gray-200">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                                    width="20" class="mr-2"
                                                                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                    <path fill="#ffffff"
                                                                        d="M384 48c8.8 0 16 7.2 16 16l0 384c0 8.8-7.2 16-16 16L96 464c-8.8 0-16-7.2-16-16L80 64c0-8.8 7.2-16 16-16l288 0zM96 0C60.7 0 32 28.7 32 64l0 384c0 35.3 28.7 64 64 64l288 0c35.3 0 64-28.7 64-64l0-384c0-35.3-28.7-64-64-64L96 0zM240 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16l192 0c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80l-64 0zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64zM496 192c-8.8 0-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64z" />
                                                                </svg>
                                                                Alamat Pengiriman
                                                            </h4>
                                                            <p class="text-gray-600 dark:text-gray-300 mt-2">
                                                                r.a *****15<br>
                                                                Jalan Kebun Raya Cibodas, Rarahan, Cimacan, Cipanas
                                                                (villa
                                                                aries 05/07),<br>
                                                                KAB. CIANJUR, CIPANAS, JAWA BARAT, ID, 43255
                                                            </p>
                                                        </div>

                                                        <!-- Informasi Jasa Kirim -->
                                                        <div>
                                                            <h4
                                                                class="flex items-center text-sm font-bold text-gray-700 dark:text-gray-200">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                                    width="25" class="mr-2"
                                                                    viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                    <path fill="#ffffff"
                                                                        d="M112 0C85.5 0 64 21.5 64 48l0 48L16 96c-8.8 0-16 7.2-16 16s7.2 16 16 16l48 0 208 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L64 160l-16 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l16 0 176 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L64 224l-48 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l48 0 144 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L64 288l0 128c0 53 43 96 96 96s96-43 96-96l128 0c0 53 43 96 96 96s96-43 96-96l32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64 0-32 0-18.7c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7L416 96l0-48c0-26.5-21.5-48-48-48L112 0zM544 237.3l0 18.7-128 0 0-96 50.7 0L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z" />
                                                                </svg>
                                                                Informasi Jasa Kirim
                                                            </h4>
                                                            <p class="text-gray-600 dark:text-gray-300 mt-2">
                                                                Paket: Hemat | SPX Hemat<br>
                                                            </p>
                                                        </div>

                                                        <!-- Total Harga -->
                                                        <div>
                                                            <h4
                                                                class="flex items-center text-sm font-bold text-gray-700 dark:text-gray-200">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                                    width="17.5" class="mr-2"
                                                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                    <path fill="#ffffff"
                                                                        d="M0 80L0 229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7L48 32C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                                                </svg>
                                                                Total Harga
                                                            </h4>
                                                            <p class="text-gray-600 dark:text-gray-300 mt-2">
                                                                Rp 120,000<br>
                                                            </p>
                                                        </div>

                                                        <!-- Nama Pengirim -->
                                                        <div>
                                                            <h4
                                                                class="flex items-center text-sm font-bold text-gray-700 dark:text-gray-200">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                                    width="17.5" class="mr-2"
                                                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                    <path fill="#ffffff"
                                                                        d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z" />
                                                                </svg>
                                                                Pengirim
                                                            </h4>
                                                            <p class="text-gray-600 dark:text-gray-300 mt-2">GUS MIFTAH
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                        class=" focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-6 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900"
                                        type="button">
                                        Kirim Pesan
                                    </button>

                                    <!-- MODAL PESAN -->
                                    <div id="crud-modal" tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                        Kirim Pesan Untuk Pengembali
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-toggle="crud-modal">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <form class="p-4 md:p-5">
                                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                                        <div class="col-span-2">
                                                            <label for="email"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan
                                                                Email</label>
                                                            <input type="email" id="email"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="name@flowbite.com" required />
                                                        </div>
                                                        <div class="col-span-2">
                                                            <label for="description"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pesan
                                                                Untuk Pengembali</label>
                                                            <textarea id="description" rows="4"
                                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Write product description here">
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        Kirim Pesan
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- js --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
