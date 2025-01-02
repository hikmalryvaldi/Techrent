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
            @auth
                            {{-- navbar kranjang --}}
                            <div class="relative group">
                                <!-- Tombol Keranjang -->
                                <button onclick="toggleDropdown()" class="btn btn-ghost btn-circle ml-5">
                                    <img src="{{ asset('img/navbar/keranjang.png') }}" class="max-h-20 w-auto h-auto" alt="Keranjang">
                                </button>
            
                                <!-- Konten Dropdown -->
                                <form action="/keranjang/checkout" method="GET">
                                    @csrf
                                    <ul id="dropdownCart" class="hidden absolute bg-base-100 rounded-box z-[1] w-96 p-3 shadow-lg left-1/2 transform -translate-x-1/2 mt-3">
                                        @if ($keranjang && $keranjang->items->isNotEmpty())
                                            @foreach ($keranjang->items as $item)
                                                <li class="flex items-center justify-between p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <!-- Checkbox -->
                                                    <input type="checkbox" name="product_ids[]" value="{{ $item->product->id }}"
                                                           id="checkbox-item-{{ $item->product->id }}"
                                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                                    <!-- Gambar -->
                                                    @foreach ($item->product->images as $image)
                                                        <img src="{{ $image->image_path1 }}" class="h-8 w-8 rounded ml-2" alt="Produk">
                                                    @endforeach
                                                    <!-- Label -->
                                                    <label for="checkbox-item-{{ $item->product->id }}"
                                                           class="flex-1 ml-2 truncate text-sm font-medium text-gray-900 dark:text-gray-300">
                                                        {{ $item->product->product_name }}
                                                    </label>
                                                    <!-- Durasi dan Harga -->
                                                    <div class="flex items-center space-x-2">
                                                        <span class="text-sm text-gray-500 dark:text-gray-400">3 Hari</span>
                                                        <span class="text-sm font-bold text-gray-700 dark:text-gray-300">Rp 50.000</span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @else
                                            <p>Keranjang Anda kosong</p>
                                        @endif
                                        <hr class="my-2">
                                        <div class="py-2 flex justify-between items-center">
                                            <span class="text-sm font-bold text-gray-700 dark:text-gray-300">3 pcs</span>
                                            <div class="flex gap-2">
                                                <button type="button" onclick="submitDeleteForm()" class="btn bg-red-500 text-white hover:bg-red-600">Hapus</button>
                                                <button type="submit" class="btn btn-primary text-white">Sewa Sekarang</button>
                                            </div>
                                        </div>
                                    </ul>
                                </form>                    
                            </div>
                            
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
                    @if (Auth::check() && Auth::user()->is_admin !== null)
                        <li>
                            <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                        </li>
                    @endif
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

            @else
            <a href="{{ route('auth') }}" class="auth btn btn-ghost btn-circle ml-5">
                <img src="{{ asset('img/navbar/keranjang.png') }}" class="max-h-20 h-auto w-auto" alt="">
            </a>

            <a class="auth btn btn-ghost btn-circle" href="{{ route('auth') }}">
                <img src="{{ asset('img/navbar/profile.png') }}" class="max-h-20 h-auto w-auto" alt="">
            </a>
            @endauth
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
                    <li><a class="text-xl text-white font-bold"
                            href="{{ route('produk.index', ['category' => 'kamera']) }}">KAMERA</a></li>
                    <li>
                        <a class="text-xl text-white font-bold"
                            href="{{ route('produk.index', ['category' => 'lensa']) }}">LENSA</a>
                    </li>
                    <li><a class="text-xl text-white font-bold"
                            href="{{ route('produk.index', ['category' => 'konsol']) }}">CONSOL</a></li>
                    <li><a class="text-xl text-white font-bold"
                            href="{{ route('produk.index', ['category' => 'speaker']) }}">SPEAKER</a></li>
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

                {{-- navbar kranjang --}}
                <div class="relative group">
                    <!-- Tombol Keranjang -->
                    <button onclick="toggleDropdown()" class="btn btn-ghost btn-circle ml-5">
                        <img src="{{ asset('img/navbar/keranjang.png') }}" class="max-h-20 w-auto h-auto" alt="Keranjang">
                    </button>

                    <!-- Konten Dropdown -->
                    <form action="/keranjang/checkout" method="GET">
                        @csrf
                        <ul id="dropdownCart" class="hidden absolute bg-base-100 rounded-box z-[1] w-96 p-3 shadow-lg left-1/2 transform -translate-x-1/2 mt-3">
                            @if ($keranjang && $keranjang->items->isNotEmpty())
                                @foreach ($keranjang->items as $item)
                                    <li class="flex items-center justify-between p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <!-- Checkbox -->
                                        <input type="checkbox" name="product_ids[]" value="{{ $item->product->id }}"
                                               id="checkbox-item-{{ $item->product->id }}"
                                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                        <!-- Gambar -->
                                        @foreach ($item->product->images as $image)
                                            <img src="{{ $image->image_path1 }}" class="h-8 w-8 rounded ml-2" alt="Produk">
                                        @endforeach
                                        <!-- Label -->
                                        <label for="checkbox-item-{{ $item->product->id }}"
                                               class="flex-1 ml-2 truncate text-sm font-medium text-gray-900 dark:text-gray-300">
                                            {{ $item->product->product_name }}
                                        </label>
                                        <!-- Durasi dan Harga -->
                                        <div class="flex items-center space-x-2">
                                            <span class="text-sm text-gray-500 dark:text-gray-400">3 Hari</span>
                                            <span class="text-sm font-bold text-gray-700 dark:text-gray-300">Rp 50.000</span>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <p>Keranjang Anda kosong</p>
                            @endif
                            <hr class="my-2">
                            <div class="py-2 flex justify-between items-center">
                                <span class="text-sm font-bold text-gray-700 dark:text-gray-300">3 pcs</span>
                                <div class="flex gap-2">
                                    <button type="button" onclick="submitDeleteForm()" class="btn bg-red-500 text-white hover:bg-red-600">Hapus</button>
                                    <button type="submit" class="btn btn-primary text-white">Sewa Sekarang</button>
                                </div>
                            </div>
                        </ul>
                    </form>                    
                </div>





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
                        @if (Auth::check() && Auth::user()->is_admin !== null)
                            <li>
                                <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                            </li>
                        @endif
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
                    <li><a class="text-xl text-white font-bold"
                            href="{{ route('produk.index', ['category' => 'kamera']) }}">KAMERA</a></li>
                    <li>
                        <a class="text-xl text-white font-bold"
                            href="{{ route('produk.index', ['category' => 'lensa']) }}">LENSA</a>
                    </li>
                    <li><a class="text-xl text-white font-bold"
                            href="{{ route('produk.index', ['category' => 'konsol']) }}">CONSOL</a></li>
                    <li><a class="text-xl text-white font-bold"
                            href="{{ route('produk.index', ['category' => 'speaker']) }}">SPEAKER</a></li>
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
                        class="absolute w-full mt-2 rounded-lg bg-white shadow-lg z-10 hidden max-h-60 overflow-y-auto top-6">
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
<script>
function submitDeleteForm() {
    const selectedProductIds = [];
    
    // Ambil semua checkbox yang dipilih
    document.querySelectorAll('input[name="product_ids[]"]:checked').forEach(function(checkbox) {
        selectedProductIds.push(checkbox.value);  // Tambahkan ID produk yang dipilih
    });
    
    if (selectedProductIds.length === 0) {
        alert('Pilih produk yang ingin dihapus.');
        return;
    }

    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '/keranjang/hapus';  // Rute penghapusan produk

    // CSRF token
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = '{{ csrf_token() }}';
    form.appendChild(csrfInput);

    // Simulasi metode DELETE
    const methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = 'DELETE';
    form.appendChild(methodInput);

    // Menambahkan ID produk yang dipilih ke dalam form
    const productIdsInput = document.createElement('input');
    productIdsInput.type = 'hidden';
    productIdsInput.name = 'product_ids[]';
    productIdsInput.value = selectedProductIds.join(',');
    form.appendChild(productIdsInput);

    // Kirim form
    document.body.appendChild(form);
    form.submit();
}

</script>
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

    // Navbar Keranjang
    let dropdownVisible = false;

    function toggleDropdown() {
        const dropdown = document.getElementById('dropdownCart');
        dropdownVisible = !dropdownVisible;

        if (dropdownVisible) {
            dropdown.classList.remove('hidden'); // Tampilkan dropdown
        } else {
            dropdown.classList.add('hidden'); // Sembunyikan dropdown
        }
    }

    // Menyembunyikan dropdown jika pengguna mengklik di luar dropdown
    document.addEventListener('click', (event) => {
        const dropdown = document.getElementById('dropdownCart');
        const button = event.target.closest('button');

        if (!dropdown.contains(event.target) && !button) {
            dropdown.classList.add('hidden');
            dropdownVisible = false;
        }
    });
</script>
