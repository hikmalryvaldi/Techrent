@if ($isRegistrationPage)
    <div class="navbar bg-[#282828] h-12">
        <div class="navbar-start">
            <a href="/"><img src="{{ asset('img/navbar/LogoPutih.png') }}" class="max-h-20 h-auto w-auto "
                    alt=""></a>
        </div>
    </div>
@elseif ($isProdukPage)
    <div class="navbar bg-[#282828] h-12 w-full fixed top-0 left-0 z-10">
        <div class="navbar-start">
            <a href="/"><img src="{{ asset('img/navbar/LogoPutih.png') }}"
                    class="max-h-20 h-auto w-auto hidden sm:block" alt=""></a>
        </div>
        <div class="navbar-end hidden lg:flex">
            <button class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5"
                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#FFFFFF"
                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                </svg>
            </button>
            <button class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="21"
                    viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#FFFFFF"
                        d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                </svg>
            </button>

        </div>
    </div>
@else
    @auth
        <div class="navbar bg-[#282828] h-12">
            <div class="navbar-start">
                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                    </div>
                    <ul tabindex="0"
                        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                        <li>
                            <div class="form-control">
                                <input type="text" placeholder="Search"
                                    class="input input-bordered h-8 w-40 md:w-100% bg-white" />
                            </div>
                        </li>
                        <li><a href="profile">Profile</a></li>
                        <li>
                            <a href="">Keranjang</a>
                        </li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="w-full text-left">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <a href="/"><img src="{{ asset('img/navbar/LogoPutih.png') }}" class="max-h-20 h-auto w-auto "
                        alt=""></a>
            </div>

            <div class="navbar-center hidden lg:flex text-black">
                <ul class="menu menu-horizontal px-1">
                    <li><a class="text-xl text-white font-bold" href="produk">KAMERA</a></li>
                    <li>
                        <a class="text-xl text-white font-bold" href="produk">PLAYSTATION</a>
                    </li>
                    <li><a class="text-xl text-white font-bold" href="produk">SPEAKER</a></li>
                    <li><a class="text-xl text-white font-bold" href="produk">LENSA</a></li>
                </ul>
            </div>

            <div class="navbar-end hidden lg:flex">
                <div class="form-control relative">
                    <!-- Input Pencarian -->
                    <input type="text" id="search-input" placeholder="Search"
                        class="input input-bordered h-8 w-24 md:w-auto bg-white" autocomplete="off" onkeyup="liveSearch()">

                    <!-- Dropdown untuk hasil pencarian -->
                    <div id="dropdown"
                        class="absolute w-full mt-2 rounded-lg bg-white shadow-lg z-10 hidden max-h-60 overflow-y-auto">
                    </div>
                </div>
                <a class="btn btn-ghost btn-circle ml-5">
                    <img src="{{ asset('img/navbar/keranjang.png') }}" class="max-h-20 h-auto w-auto" alt="">
                </a>


                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn m-1">
                        <div>{{ Auth::user()->nama }}</div>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <ul tabindex="0"
                        class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow absolute right-0">
                        <li>
                            <a href="{{ route('profile') }}">Profile </a>
                        </li>
                        @auth
                            <form action="/logout" method="POST">
                                @csrf
                                <li>
                                    <button type="submit" class="w-full text-left">Logout</button>
                                </li>
                            </form>
                        @endauth
                    </ul>
                </div>

            </div>

        </div>
    @else
        <div class="navbar bg-[#282828] h-12">
            <div class="navbar-start">
                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                    </div>
                    <ul tabindex="0"
                        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                        <li>
                            <div class="form-control">
                                <input type="text" placeholder="Search"
                                    class="input input-bordered h-8 w-40 md:w-100% bg-white" />
                            </div>
                        </li>
                        <li><a href="registrasi">Login</a></li>
                        <li>
                            <a href=""></a>
                        </li>

                    </ul>
                </div>
                <a href="/"><img src="{{ asset('img/navbar/LogoPutih.png') }}" class="max-h-20 h-auto w-auto "
                        alt=""></a>
            </div>

            <div class="navbar-center hidden lg:flex text-black">
                <ul class="menu menu-horizontal px-1">
                    <li><a class="text-xl text-white font-bold" href="produk">KAMERA</a></li>
                    <li>
                        <a class="text-xl text-white font-bold" href="produk">PLAYSTATION</a>
                    </li>
                    <li><a class="text-xl text-white font-bold" href="produk">SPEAKER</a></li>
                    <li><a class="text-xl text-white font-bold" href="produk">LENSA</a></li>
                </ul>
            </div>

            <div class="navbar-end hidden lg:flex">
                <div class="form-control relative">
                    <!-- Input Pencarian -->
                    <input type="text" id="search-input" placeholder="Search"
                        class="input input-bordered h-8 w-24 md:w-auto bg-white" autocomplete="off"
                        onkeyup="liveSearch()">

                    <!-- Dropdown untuk hasil pencarian -->
                    <div id="dropdown"
                        class="absolute w-full mt-2 rounded-lg bg-white shadow-lg z-10 hidden max-h-60 overflow-y-auto">
                    </div>
                </div>
                <a href="keranjang" class="btn btn-ghost btn-circle ml-5">
                    <img src="{{ asset('img/navbar/keranjang.png') }}" class="max-h-20 h-auto w-auto" alt="">
                </a>
                <a class="btn btn-ghost btn-circle" href="{{ route('auth') }}">
                    <img src="{{ asset('img/navbar/profile.png') }}" class="max-h-20 h-auto w-auto" alt="">
                </a>



            </div>

        </div>
    @endauth
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function liveSearch() {
        var searchQuery = document.getElementById('search-input').value;

        // Menyembunyikan dropdown jika input kosong
        if (searchQuery === '') {
            document.getElementById('dropdown').classList.add('hidden');
            return;
        }

        // Lakukan request AJAX untuk mendapatkan hasil pencarian
        $.ajax({
            url: '/search', // Rute untuk pencarian
            type: 'GET',
            data: {
                search: searchQuery // Mengirimkan parameter pencarian
            },
            success: function(response) {
                var dropdown = $('#dropdown');
                dropdown.empty(); // Kosongkan dropdown sebelum mengisi

                // Jika ada produk yang ditemukan
                if (response.length > 0) {
                    response.forEach(function(product) {
                        // Menambahkan produk ke dalam dropdown
                        dropdown.append(`
                            <a href="/produk/${product.id}" class="mt-2 block px-4 py-2 text-gray-700 hover:bg-gray-200">
                                ${product.product_name}
                            </a>
                        `);
                    });

                    // Menampilkan dropdown
                    dropdown.removeClass('hidden');
                } else {
                    // Menampilkan pesan jika tidak ada produk ditemukan
                    dropdown.append(`
                        <div class="px-4 py-2 text-gray-500">No results found</div>
                    `);
                    dropdown.removeClass('hidden');
                }
            }
        });
    }
</script>
