<x-header>Halaman Pengembalian</x-header>
<body style="height: 100%;">
    {{--Navbar--}}
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
        
            {{--Table Head Pesanan--}}
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
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                00001
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex items-center space-x-4">
                                    <img src="{{ asset('img/halamanhome/kategori/Kamera.jpg') }}" alt="" class="w-8 h-8 rounded-full object-cover">
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
                                kp.suka tani, des.cokor kuda, kec. suka ringan, kab. bangkong budug, prov. jawa barat
                                <br>
                                <a 
                                    href="https://www.google.com/maps?q=kp.suka+tani,des.cokor+kuda,kec.suka+ringan,kab.bangkong+budug,prov.jawa+barat" 
                                    target="_blank" 
                                    class="text-blue-500 hover:underline"
                                >
                                    Lihat di Google Maps
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                {{-- button hijau --}}
                                    

                            <!-- Button Hijau-->
                            <button class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button">
                                Info Pesanan
                            </button> 
                             <!-- Button -->
                             <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class=" focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-6 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900" type="button">
                                Kirim Pesan
                            </button>
                            
                            <!-- Main modal -->
                            <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Kirim Pesan Untuk Pengembali
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form class="p-4 md:p-5">
                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                <div class="col-span-2">
                                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan Email</label>
                                                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pesan Untuk Pengembali</label>
                                                    <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"></textarea>                    
                                                </div>
                                            </div>
                                            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
            
            


{{-- js --}}
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>