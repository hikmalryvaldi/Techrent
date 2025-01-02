<x-header>Halaman Dashboard</x-header>

<body style="height: 100%; ">

    <x-sidebar></x-sidebar>


    <div class="p-4 my-16 sm:ml-64 ">
        <div class="mx-auto p-8 bg-gray-100 rounded-lg shadow-lg">
        <h1 class="text-black text-2xl font-bold">Halaman Dashboard</h1>
        {{-- search --}}
        {{-- <form class="max-w-md ">   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form> --}}

        {{-- form add --}}


        {{-- data dasboard --}}

        <!-- Default View (Dashboard) -->
        <div id="dashboardContent" class="block mt-10 ">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                {{-- menu Order --}}
                <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between">
                        <div>
                            <h5 class="leading-none text-3xl text-gray-900 dark:text-white pb-2">Pesanan</h5>
                            <div class="mt-5">
                                <h5 class="leading-none text-3xl text-gray-900 dark:text-white pb-2"><span
                                        class="font-bold">100</span> <span class="text-xl">Pcs</span></h5>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Jumlah Semua Pesanan</p>
                            </div>
                        </div>
                    </div>
                    <div id="area-chart"></div>
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-5">
                        <div class="flex justify-center md:justify-between items-center">
                            <a href="mperluDikirim"
                                class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500 hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 py-2">
                                pesanan
                                <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m1 9 4-4-4-4" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Menu Produk --}}
                <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between">
                        <div>
                            <h5 class="leading-none text-3xl text-gray-900 dark:text-white pb-2">Produk</h5>
                            <div class="mt-5">
                                <h5 class="leading-none text-3xl text-gray-900 dark:text-white pb-2"><span
                                        class="font-bold">{{ $produkCount }}</span> <span class="text-xl">Pcs</span></h5>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Jumlah Produk</p>
                            </div>
                        </div>
                    </div>
                    <div id="area-chart"></div>
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-5">
                        <div class="flex justify-center md:justify-between items-center">
                            <a href="produk"
                                class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500 hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 py-2">
                                Produk
                                <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m1 9 4-4-4-4" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            
                {{-- Menu User --}}
                <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between">
                        <div>
                            <h5 class="leading-none text-3xl text-gray-900 dark:text-white pb-2">Users</h5>
                            <div class="mt-5">
                                <h5 class="leading-none text-3xl text-gray-900 dark:text-white pb-2"><span
                                        class="font-bold">{{ $userCount }}</span> <span class="text-xl">Users</span></h5>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Jumlah Semua User</p>
                            </div>
                        </div>
                    </div>
                    <div id="area-chart"></div>
                    <div
                        class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                    </div>
                </div>


            </div>
        </div>


        <!-- User Distribution Chart (Hidden Initially) -->
        <div id="userChartContainer" class="hidden">
            <h5 class="text-lg font-semibold">User Distribution Chart</h5>
            <div class="mt-4" style="height: 400px;">
                <canvas id="userChart"></canvas>
            </div>
        </div>
    </div>
</div>



    {{-- js --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</body>
