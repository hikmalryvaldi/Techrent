<!-- Product Details -->
<div class="w-full lg:w-1/2">
    <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $product->product_name }}</h1>
    <div class="flex items-center mb-4">
        <span class="text-yellow-500 text-lg">★ 4.5</span>
        <span class="text-gray-500 text-sm ml-2">(19 rating)</span>
        <span class="text-gray-500 text-sm ml-4">Penyewa 30+</span>
    </div>

    <div class="harga text-3xl font-bold text-gray-900 mb-4">Rp{{ number_format($product->price, 0, ',', '.') }}</div>
    {{-- <div class="harga text-3xl font-bold text-gray-900 mb-4" id="priceDisplay" data-price="{{ $product->price }}">
        Rp{{ number_format($product->price, 0, ',', '.') }}
    </div> --}}

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
            <h2 class="text-gray-700 font-medium mb-2">Atur jumlah</h2>
            <div class="flex items-center space-x-2">
                <button type="button" onclick="adjustQuantity(-1)" class="px-4 py-2 border rounded-lg">-</button>
                <input id="quantityInput" name="quantity" type="text" inputmode="numeric" value="1" class="w-12 text-center border rounded-lg">
                <button type="button" onclick="adjustQuantity(1)" class="px-4 py-2 border rounded-lg">+</button>
            </div>
            <div class="text-sm text-gray-500 mt-2">Stok: {{ $product->stock }}</div>
        </div>
        <div class="flex flex-col lg:flex-row gap-4 mt-6">
            <form id="cart-form" action="{{ route('keranjang.add', $product->id) }}" method="POST">
                @csrf
                <!-- Input untuk jumlah produk -->
                <input type="hidden" id="quantityInputHidden" name="quantity" value="1">
                
                <!-- Input hidden untuk rental_duration -->
                <input type="hidden" id="rental_duration" name="rental_duration" value="1">
            
                <!-- Tombol untuk submit form -->
                <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 w-full lg:w-auto">Keranjang</button>
            </form>
            <button type="submit" class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg shadow hover:bg-gray-200 w-full lg:w-auto">Sewa Sekarang</button>
        </div>
    </div>

    <!-- Additional Info -->
    <div>
        
        <h2 class="text-gray-700 font-medium mb-2">Detail</h2>
        <p class="text-sm text-gray-600">{{ $product->description }}</p>
    </div>

    <div class="mt-6 flex">
        <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-md">
            <h2 class="text-xl font-bold text-center mb-6 text-gray-700">Cek Ongkos Kirim</h2>
    
            <form action="" method="post">
                @csrf
                <div class="mb-4">
                    <label for="origin" class="block text-sm font-medium text-gray-700">Asal Kota</label>
                    <select name="origin" id="origin" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        <option value="" disabled selected>Pilih Kota Asal</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="mb-4">
                    <label for="destination" class="block text-sm font-medium text-gray-700">Kota Tujuan</label>
                    <select name="destination" id="destination" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        <option value="" disabled selected>Pilih Kota Tujuan</option>
                        @foreach ($cities as $city)
                        <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                    @endforeach
                    </select>
                </div>

            <div class="mb-4">
                <label for="weight" class="block text-sm font-medium text-gray-700">Berat Paket (gram)</label>
                <input type="number" name="weight" id="weight" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan berat" required>
            </div>

            <div class="mb-4">
                <label for="courier" class="block text-sm font-medium text-gray-700">Kurir</label>
                <select name="courier" id="courier" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    <option value="" disabled selected>Kurir</option>
                    <option value="jne">JNE</option>
                    <option value="pos">POS</option>
                    <option value="tiki">TIKI</option>
                </select>
            </div>
    
                <div class="flex justify-center">
                    <button type="submit" name="cekOngkir" class="px-4 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 font-medium  focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Cek Ongkir
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="max-w-md mt-10">
        <div class="bg-white shadow-lg rounded-lg p-6">
            @if ($ongkir != '')
                <h2 class="text-xl font-bold mb-6 text-gray-700">Rincian Ongkos kirim</h2>
                <div class="">
                        <div class="border border-gray-300 rounded-lg bg-gray-50 p-4 shadow-sm">
                            <p class="text-lg font-medium text-gray-900">Asal Kota : {{ $ongkir['origin_details']['city_name'] }}</p>
                            <p class="text-lg font-medium text-gray-900">Kota Tujuan : {{ $ongkir['destination_details']['city_name'] }}</p>
                            @foreach ($ongkir['results'] as $item)
                            {{-- <label for="name" class="block text-sm font-semibold text-gray-700">
                            </label> --}}
                            <p class="text-lg font-medium text-gray-900">{{ $item['name'] }}</p>
                            @endforeach

                            @foreach ($item['costs'] as $cost)
                            <p class="text-lg font-medium text-gray-900">Service : {{ $cost['service'] }}</p>

                            @foreach ($cost['cost'] as $harga)
                            <p class="text-lg font-medium text-gray-900">Harga: {{ $harga['value'] }} (est: {{ $harga['etd'] }} hari)</p>
                        
                        @endforeach
                    @endforeach
                </div>
                </div>
            @endif
        </div>
    </div>
    
    {{-- <div>
        <div class="mt-5">
            @if ($ongkir != '')
                <h3>Rincian Ongkir</h3>
                @foreach ($ongkir as $item)
                    <div>
                        <label for="name">Nama: {{ $item['name'] }}</label>
                    </div>
                @endforeach
            @endif
        </div>
    </div> --}}
    
    
</div>
</div>
</div> 

<script> 
    const productPrice = {{ $product->price }}; 
</script>
<script src="{{ asset('js/halCheckout.js') }}"></script>