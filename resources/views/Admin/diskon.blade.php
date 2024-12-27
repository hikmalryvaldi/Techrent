<x-header>Halaman Produk</x-header>

<body style="height: 100%; ">
    {{-- navbar dan sedbar --}}
    <x-sidebar></x-sidebar>
        {{-- Title --}}
        <div class="p-6 my-16 sm:ml-64 ">
            <div class="mx-auto p-6 bg-gray-100 rounded-lg shadow-lg">
                <div class="">
                    <h1 class="text-black text-2xl font-bold">Halaman Diskon</h1>
                    {{-- search --}}

                    {{-- ///////////Top menu///////////// --}}
                    <div class="py-3">
                        <form class="flex">
                            <label for="search-input"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            
                            
                            
                            <input type="hidden" name="category" value="{{ request('category') }}" />
                            <input type="search" id="search-input" name="search"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cari Product" value="{{ request('search') }}" />
                            <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>

                        {{-- Dropdown kategori  --}}
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="text-gray-900 mx-4 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                            type="button">Kategori<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                        </button>
                        
                        {{--  --}}
                        <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                            <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                            </svg>
                            Waktu
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        {{--  --}}
                        
                        <!-- Dropdown menu -->
                        <div id="dropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="{{ route('Admin.diskon') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Semua Product
                                </a>
                            </li>
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('Admin.diskon', ['category' => $category->slug]) }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        
                            </ul>
                        </div>

                        <div id="dropdownRadio"
                        class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                        data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                        style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownRadioButton">
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-1" type="radio" value="1"
                                        name="last_days"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        {{ request('last_days') == '1' ? 'checked' : '' }}
                                        onchange="this.form.submit()">
                                    <label for="filter-radio-example-1"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                        day</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input checked="" id="filter-radio-example-2" type="radio" value="7"
                                        name="last_days"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        {{ request('last_days') == '7' ? 'checked' : '' }}
                                        onchange="this.form.submit()">

                                    <label for="filter-radio-example-2"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                        7 days</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-3" type="radio" value="30"
                                        name="last_days"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        {{ request('last_days') == '30' ? 'checked' : '' }}
                                        onchange="this.form.submit()">
                                    <label for="filter-radio-example-3"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                        30 days</label>
                                </div>
                            </li>
                            <li>
                                <div
                                    class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-4" type="radio" value="365"
                                        name="last_days"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        {{ request('last_days') == '365' ? 'checked' : '' }}
                                        onchange="this.form.submit()">
                                    <label for="filter-radio-example-4"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                        year</label>
                                </div>
                            </li>
                            <li>
                                <div
                                    class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-5" type="radio" value=""
                                        name="last_days"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        {{ request('last_days') == '' ? 'checked' : '' }}
                                        onchange="this.form.submit()">
                                    <label for="filter-radio-example-5"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Semua
                                        Waktu</label>
                                </div>
                            </li>
                        </ul>
                    </div>

                        <!-- Button to trigger modal -->
                        <div class="flex justify-center mx-[16px]">
                            <button id="openModalBtn" type="button"
                                class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Generate Diskon
                            </button>
                        </div>
                        </form>
                </div>


    {{-- ///////////End Top menu///////////// --}}

    {{--  --}}
    {{-- FROM BACKEND --}}
        
        {{-- Top --}}
        
        <!-- Dropdown menu -->
        {{-- <div id="dropdownRadio" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
            <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <input id="filter-radio-example-1" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="filter-radio-example-1" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last day</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <input checked="" id="filter-radio-example-2" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="filter-radio-example-2" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 7 days</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <input id="filter-radio-example-3" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="filter-radio-example-3" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 30 days</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <input id="filter-radio-example-4" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="filter-radio-example-4" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last month</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <input id="filter-radio-example-5" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="filter-radio-example-5" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last year</label>
                    </div>
                </li>
            </ul>
        </div> --}}
        {{-- End Top --}}
    </div>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Gambar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Diskon
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga normal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga diskon
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody id="diskon-table-body">
                @foreach ($products as $index => $product)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <div class="mask mask-squircle h-12 w-12 bg-white">
                                    @foreach ($product->images as $image)
                                        <img src="{{ asset('storage/' . $image->image_path1) }}"
                                            alt="Product Image" alt="Avatar Tailwind CSS Component" />
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $product->product_name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $product->category->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->discount }}
                        </td>
                        <td class="px-6 py-4">
                            {{ number_format($product->price) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ number_format($product->price - ($product->price * $product->discount) / 100) }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            </table>
        </div>
        <div class="mt-3">{{ $products->links() }}</div>
    </div>
        {{-- END FROM BACKEND --}}
        
        <!-- Modal -->
        <div id="discountModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center z-50 hidden">
            <div class="bg-gray-50 p-8 rounded-lg shadow-lg w-full max-w-md md:max-w-lg lg:max-w-xl mx-4">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Generate Diskon Produk</h2>
                
                <!-- Form to generate diskon -->
                <form>
                    <div class="space-y-6">
                        
                        <!-- Input Nama Produk -->
                        <div>
                            <label for="product-name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                            <input type="text" id="product-name" name="product-name" required
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm bg-gray-700 text-white"
                            placeholder="Masukkan nama produk">
                    </div>

                    <!-- Input Besar Diskon (Persentase) -->
                    <div>
                        <label for="discount-value" class="block text-sm font-medium text-gray-700">Besar Diskon (%)</label>
                        <input type="number" id="discount-value" name="discount-value" required
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm bg-gray-700 text-white"
                            placeholder="Masukkan besar diskon">
                    </div>

                    <!-- Input Tanggal Berakhir Diskon -->
                    <div>
                        <label for="discount-expiry" class="block text-sm font-medium text-gray-700">Tanggal Berakhir
                            Diskon</label>
                        <input type="date" id="discount-expiry" name="discount-expiry" required
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm bg-gray-700 text-white">
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center mt-8">
                        <button type="submit"
                            class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Terapkan Diskon
                        </button>
                    </div>
                </div>
            </form>

            <!-- Close Button -->
            <div class="flex justify-center mt-4">
                <button id="closeModalBtn"
                    class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                    Close
                </button>
            </div>
        </div>
    </div>
                   {{--  --}}
                </div>

                {{-- Generate diskon --}}
                <!-- Modal -->
        <div id="discountModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center z-50 hidden">
            <div class="bg-gray-50 p-8 rounded-lg shadow-lg w-full max-w-md md:max-w-lg lg:max-w-xl mx-4">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Generate Diskon Produk</h2>
                
                <!-- Form to generate diskon -->
                <form>
                    <div class="space-y-6">
                        
                        <!-- Input Nama Produk -->
                        <div>
                            <label for="product-name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                            <input type="text" id="product-name" name="product-name" required
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm bg-gray-700 text-white"
                            placeholder="Masukkan nama produk">
                    </div>

                    <!-- Input Besar Diskon (Persentase) -->
                    <div>
                        <label for="discount-value" class="block text-sm font-medium text-gray-700">Besar Diskon (%)</label>
                        <input type="number" id="discount-value" name="discount-value" required
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm bg-gray-700 text-white"
                            placeholder="Masukkan besar diskon">
                    </div>

                    <!-- Input Tanggal Berakhir Diskon -->
                    <div>
                        <label for="discount-expiry" class="block text-sm font-medium text-gray-700">Tanggal Berakhir
                            Diskon</label>
                        <input type="date" id="discount-expiry" name="discount-expiry" required
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm bg-gray-700 text-white">
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center mt-8">
                        <button type="submit"
                            class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Terapkan Diskon
                        </button>
                    </div>
                </div>
            </form>

            <!-- Close Button -->
            <div class="flex justify-center mt-4">
                <button id="closeModalBtn"
                    class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                    Close
                </button>
            </div>
        </div>
    </div>


                <x-speedDeal></x-speedDeal>
            </div>
        </div>
    </div>


    {{-- js --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search-input').on('keyup', function() {
                let keyword = $(this).val();
                let category = '{{ $categorySlug ?? '' }}'; // Slug kategori dari server-side

                // Jika input kosong, hapus parameter dari URL dan tampilkan ulang data default
                if (keyword === '') {
                    let url = new URL(window.location.href);
                    url.searchParams.delete('search'); // Hapus parameter search
                    window.history.pushState({}, '', url); // Perbarui URL tanpa reload halaman

                    // Ambil data default (tanpa pencarian)
                    $.ajax({
                        url: "{{ route('diskon.search') }}",
                        type: "GET",
                        data: {
                            category: category // Kirim kategori saja jika ada
                        },
                        success: function(data) {
                            $('#diskon-table-body').html(data.html); // Update tabel produk
                        },
                        error: function(xhr) {
                            console.error("Gagal memuat data produk: ", xhr.responseText);
                        }
                    });
                    return;
                }

                $.ajax({
                    url: "{{ route('diskon.search') }}",
                    type: "GET",
                    data: {
                        search: keyword,
                        category: category // Kirim slug kategori yang sedang aktif
                    },
                    success: function(data) {
                        console.log(data.html); // Periksa isi respon
                        $('#diskon-table-body').html(data.html);
                    },
                    error: function(xhr) {
                        console.error("Gagal memuat data produk: ", xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
// Get modal element
const modal = document.getElementById('discountModal');
const openModalBtn = document.getElementById('openModalBtn');
const closeModalBtn = document.getElementById('closeModalBtn');

// Show modal when button is clicked
openModalBtn.addEventListener('click', function () {
    modal.classList.remove('hidden');
});

// Close modal when close button is clicked
closeModalBtn.addEventListener('click', function () {
    modal.classList.add('hidden');
});

    </script>

</body>
