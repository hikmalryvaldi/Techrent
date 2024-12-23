<x-header>Halaman Produk</x-header>

<body style="height: 100%; ">
    <div>
        {{-- navbar dan sedbar --}}
        <x-sidebar></x-sidebar>

        {{-- menu --}}
        <div class="p-6 my-16 sm:ml-64 ">
            <div class="mx-auto p-6 bg-gray-100 rounded-lg shadow-lg">
                <div class="">
                    <h1 class="text-black text-2xl font-bold">Halaman Produk</h1>
                    {{-- search --}}
                    <form class="flex max-w-md  mt-10">
                        <label for="default-search"
                            class="mb-2  text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search"
                                class="block px-24 w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search....." required />
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

                        <!-- Dropdown menu -->
                        <div id="dropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Kamera</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Lensa</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Playstation</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sound</a>
                                </li>
                            </ul>
                        </div>

                    </form>

                    {{-- table --}}
                    <div class="relative my-5 overflow-x-auto shadow-md sm:rounded-lg">

                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">
                                        No
                                    </th>
                                    <th scope="col" class="p-4">
                                        Image
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Produk
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kategori
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Harga
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        jumlah
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="w-4 p-4">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="w-4 p-4">
                                            @foreach ($product->images as $image)
                                                <img src="{{ asset('storage/' . $image->image_path1) }}"
                                                    alt="Product Image" class="w-20 h-20 object-cover">
                                            @endforeach
                                        </td>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $product->product_name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $product->category->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            Rp {{ number_format($product->price) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $product->stock }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{-- button hijau --}}


                                            <!-- Button Hijau-->
                                            <button action="{{ route('produk.edit', $product->id) }}"
                                                data-modal-target="crud-modal-{{ $product->id }}"
                                                data-modal-toggle="crud-modal-{{ $product->id }}"
                                                class=" focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-7 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                                type="button">
                                                Edit
                                            </button>

                                            <!-- Main modal -->
                                            <div id="crud-modal-{{ $product->id }}" tabindex="-1" aria-hidden="true"
                                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-md max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <!-- Modal header -->
                                                        <div
                                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                            <h3
                                                                class="text-lg font-semibold text-gray-900 dark:text-white">
                                                                Edit Produk
                                                            </h3>
                                                            <button type="button"
                                                                data-modal-hide="crud-modal-{{ $product->id }}"
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
                                                        <form action="{{ route('produk.update', $product->id) }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            class="p-4 md:p-5">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                                <div class="col-span-2">
                                                                    <label for="name"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                                                    <input type="text" name="product_name"
                                                                        id="name"
                                                                        value="{{ $product->product_name }}"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                        placeholder="product name" required>
                                                                </div>
                                                                <div class="col-span-2 sm:col-span-1">
                                                                    <label for="price"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                                                                    <input type="number" name="price"
                                                                        id="price" value="{{ $product->price }}"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                        placeholder="Rp 1000" required="">
                                                                </div>
                                                                <div class="col-span-2 sm:col-span-1">
                                                                    <label for="category_id"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                                                    <select id="category_id" name="category_id"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                        <option value="" selected>Pilih Kategori
                                                                        </option>
                                                                        @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}"
                                                                                {{ $category->id == old('category_id', $product->category_id) ? 'selected' : '' }}>
                                                                                {{ $category->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-span-2">

                                                                    <label for="stock-{{ $product->id }}"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                                        Stok</label>
                                                                    <div
                                                                        class="relative flex items-center max-w-[8rem]">
                                                                        <button type="button"
                                                                            id="decrement-button-{{ $product->id }}"
                                                                            data-input-counter-decrement="stock-{{ $product->id }}"
                                                                            class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                                            <svg class="w-3 h-3 text-gray-900 dark:text-white"
                                                                                aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 18 2">
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2" d="M1 1h16" />
                                                                            </svg>
                                                                        </button>
                                                                        <input type="text"
                                                                            id="stock-{{ $product->id }}"
                                                                            name="stock" data-input-counter
                                                                            aria-describedby="helper-text-explanation-{{ $product->id }}"
                                                                            value="{{ $product->stock }}"
                                                                            class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                            placeholder="0" required />
                                                                        <button type="button"
                                                                            id="increment-button-{{ $product->id }}"
                                                                            data-input-counter-increment="stock-{{ $product->id }}"
                                                                            class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                                            <svg class="w-3 h-3 text-gray-900 dark:text-white"
                                                                                aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 18 18">
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="M9 1v16M1 9h16" />
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                    <p id="helper-text-explanation-{{ $product->id }}"
                                                                        class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                                                        Please
                                                                        select a 5 digit number from 0 to 9.</p>
                                                                </div>

                                                                <div class="col-span-2">
                                                                    <label for="description"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                                                                        Produk</label>
                                                                    <textarea id="description" name="description" rows="4"
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                        placeholder="Write product description here">{{ $product->description }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-span-2">
                                                                <label for="description"
                                                                    class="block mx-5 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                                                                <div
                                                                    class="flex flex-col gap-4 items-center justify-center w-full col-span-2 p-5">
                                                                    @foreach ($product->images as $image)
                                                                        <label for="image_1"
                                                                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                            <input type="hidden" name="oldImage1"
                                                                                value="{{ $image->image_path1 }}">

                                                                            <div
                                                                                class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                                @if ($image->image_path1)
                                                                                    <img src="{{ asset('storage/' . $image->image_path1) }}"
                                                                                        alt="Image 1"
                                                                                        class="w-32 h-32 object-cover mb-4 rounded-lg">
                                                                                @else
                                                                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                                                        aria-hidden="true"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none"
                                                                                        viewBox="0 0 20 16">
                                                                                        <path stroke="currentColor"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            stroke-width="2"
                                                                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                                                    </svg>
                                                                                    <p
                                                                                        class="text-sm text-gray-500 dark:text-gray-400">
                                                                                        Click to upload</p>
                                                                                @endif
                                                                            </div>
                                                                            <input id="image_1" name="image_path1"
                                                                                type="file" />
                                                                        </label>
                                                                        <label for="image_2"
                                                                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                            <input type="hidden" name="oldImage2"
                                                                                value="{{ $image->image_path2 }}">
                                                                            <div
                                                                                class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                                @if ($image->image_path2)
                                                                                    <img src="{{ asset('storage/' . $image->image_path2) }}"
                                                                                        alt="Image 1"
                                                                                        class="w-32 h-32 object-cover mb-4 rounded-lg">
                                                                                @else
                                                                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                                                        aria-hidden="true"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none"
                                                                                        viewBox="0 0 20 16">
                                                                                        <path stroke="currentColor"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            stroke-width="2"
                                                                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                                                    </svg>
                                                                                    <p
                                                                                        class="text-sm text-gray-500 dark:text-gray-400">
                                                                                        Click to upload</p>
                                                                                @endif
                                                                            </div>
                                                                            <input id="image_2" name="image_path2"
                                                                                type="file" />
                                                                        </label>
                                                                        <label for="image_3"
                                                                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                            <input type="hidden" name="oldImage3"
                                                                                value="{{ $image->image_path3 }}">
                                                                            <div
                                                                                class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                                @if ($image->image_path3)
                                                                                    <img src="{{ asset('storage/' . $image->image_path3) }}"
                                                                                        alt="Image 1"
                                                                                        class="w-32 h-32 object-cover mb-4 rounded-lg">
                                                                                @else
                                                                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                                                        aria-hidden="true"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none"
                                                                                        viewBox="0 0 20 16">
                                                                                        <path stroke="currentColor"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            stroke-width="2"
                                                                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                                                    </svg>
                                                                                    <p
                                                                                        class="text-sm text-gray-500 dark:text-gray-400">
                                                                                        Click to upload</p>
                                                                                @endif
                                                                            </div>
                                                                            <input id="image_3" name="image_path3"
                                                                                type="file" />
                                                                        </label>
                                                                        <label for="image_4"
                                                                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                            <input type="hidden" name="oldImage4"
                                                                                value="{{ $image->image_path4 }}">
                                                                            <div
                                                                                class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                                @if ($image->image_path4)
                                                                                    <img src="{{ asset('storage/' . $image->image_path4) }}"
                                                                                        alt="Image 4"
                                                                                        class="w-32 h-32 object-cover mb-4 rounded-lg">
                                                                                @else
                                                                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                                                        aria-hidden="true"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none"
                                                                                        viewBox="0 0 20 16">
                                                                                        <path stroke="currentColor"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            stroke-width="2"
                                                                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                                                    </svg>
                                                                                    <p
                                                                                        class="text-sm text-gray-500 dark:text-gray-400">
                                                                                        Click to upload</p>
                                                                                @endif
                                                                            </div>
                                                                            <input id="image_4" name="image_path4"
                                                                                type="file" />
                                                                        </label>
                                                                    @endforeach
                                                                </div>
                                                            </div>

                                                            {{-- button Edit --}}
                                                            <button type="button"
                                                                data-modal-target="popup-modal-{{ $product->id }}"
                                                                data-modal-toggle="popup-modal-{{ $product->id }}"
                                                                class="text-white inline-flex mx-5 my-4 items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-11
                                                        
                                                        py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                Edit
                                                            </button>
                                                            {{-- fungsi pop up --}}
                                                            <div id="popup-modal-{{ $product->id }}" tabindex="-1"
                                                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                <div class="relative p-4 w-full max-w-md max-h-full">
                                                                    <div
                                                                        class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                        <button type="button"
                                                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                            data-modal-hide="popup-modal">
                                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 14 14">
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                            </svg>
                                                                            <span class="sr-only">Close modal</span>
                                                                        </button>
                                                                        <div class="p-4 md:p-5 text-center">
                                                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                                                aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 20 20">
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                            </svg>
                                                                            <h3
                                                                                class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                                                Apakah data yang anda masukan sudah
                                                                                benar!
                                                                            </h3>
                                                                            <button
                                                                                data-modal-hide="popup-modal-{{ $product->id }}"
                                                                                type="submit"
                                                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                                Yes, I'm sure
                                                                            </button>
                                                                            <button
                                                                                data-modal-hide="popup-modal-{{ $product->id }}"
                                                                                type="button"
                                                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                                                                cancel</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <a href="produk">
                                                                <button type="button"
                                                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-10 mx-2 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Cancle</button>
                                                            </a>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>



                                            {{-- butoon merah --}}
                                            <button data-modal-target="popup-Delete-{{ $product->id }}"
                                                data-modal-toggle="popup-Delete-{{ $product->id }}"
                                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                                type="button">
                                                Delete
                                            </button>

                                            <div id="popup-Delete-{{ $product->id }}" tabindex="-1"
                                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-md max-h-full">
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <button type="button"
                                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-hide="popup-Delete-{{ $product->id }}">
                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                        <div class="p-4 md:p-5 text-center">
                                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 20 20">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                            </svg>
                                                            <h3
                                                                class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                                Apakah Anda Yakin Ingin Menghapus Produk Ini!</h3>
                                                            <div class="flex justify-center gap-4">
                                                                <form
                                                                    action="{{ route('produk.destroy', $product->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button
                                                                        data-modal-hide="popup-Delete-{{ $product->id }}"
                                                                        type="submit"
                                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                </form>
                                                                <button
                                                                    data-modal-hide="popup-Delete-{{ $product->id }}"
                                                                    type="button"
                                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                                                    cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <nav class="flex justify-center items-center flex-column flex-wrap md:flex-row  pt-4"
                        aria-label="Table navigation">
                        <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page"
                                    class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <x-speedDeal></x-speedDeal>
            </div>
        </div>
    </div>


    {{-- js --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
