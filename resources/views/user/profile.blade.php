<x-header>Profile</x-header>
{{-- FROM BACKEND --}}
<style>
    #map {
        height: 200px;
        width: 300px;
    }

    [x-cloak] {
        display: none;
    }
</style>
{{-- END FROM BACKEND --}}

<body>
    <x-navbar :isRegistrationPage="true"></x-navbar>
    <div class="max-w-4xl mx-auto mt-10 p-5" x-data="tabs()" x-cloak>
        <!-- Tabs Navigation -->
        <div class="flex border-b">
            <button class="px-4 py-2 text-sm font-medium border-b-2"
                :class="activeTab === 'tab1' ? 'border-blue-500 text-blue-500' : 'text-gray-500 border-transparent'"
                @click="setActive('tab1')">
                Informasi Pribadi
            </button>
            <button class="px-4 py-2 text-sm font-medium border-b-2"
                :class="activeTab === 'tab2' ? 'border-blue-500 text-blue-500' : 'text-gray-500 border-transparent'"
                @click="setActive('tab2')">
                Barang Sedang Dikirim
            </button>
            <button class="px-4 py-2 text-sm font-medium border-b-2"
                :class="activeTab === 'tab3' ? 'border-blue-500 text-blue-500' : 'text-gray-500 border-transparent'"
                @click="setActive('tab3')">
                Barang Sedang Dikembalikan
            </button>
            <button class="px-4 py-2 text-sm font-medium border-b-2"
                :class="activeTab === 'tab4' ? 'border-blue-500 text-blue-500' : 'text-gray-500 border-transparent'"
                @click="setActive('tab4')">
                Barang Yang Telah Disewa
            </button>
        </div>

        <!-- Tabs Content -->
        <div class="mt-5">
            <!-- Tab 1: Informasi Pribadi -->
            @if(session('success'))
    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
      <span class="font-medium">{{ session("success") }}
    </div>
    @endif
    <div x-show="activeTab === 'tab1'" class="space-y-6 bg-white p-5 rounded">
        <h2 class="text-lg font-bold text-gray-500">Informasi Pribadi</h2>
    
        <form action="{{ route('update') }}" method="POST" class="space-y-6">
            @method('PUT')
            @csrf
            {{-- NAMA --}}
            <div class="flex items-center gap-2 w-full sm:w-[50%]">
                <div class="flex items-center w-full bg-[#282828] text-white px-3 rounded h-10">
                    <input type="text" name="nama" class="bg-transparent border-none w-full placeholder-white-100 text-white focus:outline-none h-full"
                        placeholder="Nama Lengkap" value="{{ old('nama', $user->nama) }}">
                </div>
            </div>

            {{-- EMAIL --}}
            <div class="flex items-center gap-2 w-full sm:w-[50%]">
                <div class="flex items-center w-full bg-[#282828] text-white px-3 rounded h-10">
                    <input type="email" name="email" class="bg-transparent border-none w-full placeholder-white-100 text-white focus:outline-none h-full"
                        placeholder="Alamat Email" value="{{ old('email', $user->email) }}">
                </div>
            </div>
            
            {{-- NOMOR TELEPON --}}
            <div class="flex items-center gap-2 w-full sm:w-[50%]">
                <div class="flex items-center w-full bg-[#282828] text-white px-3 rounded h-10">
                    <input type="text" name="phone" class="bg-transparent border-none w-full placeholder-white-100 text-white focus:outline-none h-full"
                        placeholder="Nomor Telepon" value="{{ old('phone', $user->phone) }}">
                </div>
            </div>

            {{-- FROM BACKEND --}}
            <div id="map"></div>
            {{-- END FROM BACKEND --}}

             {{-- ALAMAT --}}
             <div class="flex flex-col gap-2 sm:w-[50%]">
                <label for="address" class="text-sm font-medium text-gray-700">Alamat</label>
                <textarea id="address" name="address" class="textarea textarea-bordered w-full bg-[#282828] text-white h-24 rounded"></textarea>
            </div>

            {{-- LATITUDE --}}
            <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude', $user->latitude ?? '') }}">

            {{-- LONGITUDE --}}
            <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude', $user->longitude ?? '') }}">

            {{-- GANTI PASSWORD --}}
            <div class="mt-10">
                <a href="ubahPassword" class="text-blue-500">Ubah Password</a>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
            </div>
        </form>
        
    </div>
    
            {{-- end --}}

            <!-- Tab 2: BARANG OTW CUST -->
            <div x-show="activeTab === 'tab2'" class="space-y-6 bg-white p-5 rounded text-gray-500">
                <h2 class="text-lg font-bold">Barang Sedang Dikirim</h2>
                <!-- Tabel Barang yang Sedang Dikirim -->
                <div class="overflow-x-auto">
                    <table class="table-auto w-full border-collapse border border-gray-200 rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left border border-gray-200">No</th>
                                <th class="px-4 py-2 text-left border border-gray-200">Nama Barang</th>
                                <th class="px-4 py-2 text-left border border-gray-200">Tanggal Pengiriman</th>
                                <th class="px-4 py-2 text-left border border-gray-200">Kurir</th>
                                <th class="px-4 py-2 text-center border border-gray-200">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Contoh Data Barang -->
                            <tr>
                                <td class="px-4 py-2 border border-gray-200 text-center">1</td>
                                <td class="px-4 py-2 border border-gray-200">Kamera DSLR Canon 5D</td>
                                <td class="px-4 py-2 border border-gray-200">2024-01-10</td>
                                <td class="px-4 py-2 border border-gray-200">JNE</td>
                                <td class="px-4 py-2 border border-gray-200 text-center">
                                    <button class="px-2 py-1 text-white bg-blue-600 hover:bg-blue-700 rounded-md">
                                        Lihat Perjalanan
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 border border-gray-200 text-center">2</td>
                                <td class="px-4 py-2 border border-gray-200">Lensa Sony 85mm</td>
                                <td class="px-4 py-2 border border-gray-200">2024-02-12</td>
                                <td class="px-4 py-2 border border-gray-200">SiCepat</td>
                                <td class="px-4 py-2 border border-gray-200 text-center">
                                    <button class="px-2 py-1 text-white bg-blue-600 hover:bg-blue-700 rounded-md">
                                        Lihat Perjalanan
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Tab3: BARANG SEDANG DIKEMBALIKAN --}}
            <div x-show="activeTab === 'tab3'" class="space-y-6 bg-white p-5 rounded text-gray-500">
                <h2 class="text-lg font-bold">Barang Sedang Dikirim</h2>
                <!-- Tabel Barang yang Sedang Dikirim -->
                <div class="overflow-x-auto">
                    <table class="table-auto w-full border-collapse border border-gray-200 rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left border border-gray-200">No</th>
                                <th class="px-4 py-2 text-left border border-gray-200">Nama Barang</th>
                                <th class="px-4 py-2 text-left border border-gray-200">Tanggal Pengiriman</th>
                                <th class="px-4 py-2 text-left border border-gray-200">Kurir</th>
                                <th class="px-4 py-2 text-center border border-gray-200">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Contoh Data Barang -->
                            <tr>
                                <td class="px-4 py-2 border border-gray-200 text-center">1</td>
                                <td class="px-4 py-2 border border-gray-200">Kamera DSLR Canon Eos 1300D</td>
                                <td class="px-4 py-2 border border-gray-200">2024-12-26</td>
                                <td class="px-4 py-2 border border-gray-200">Shopee Express</td>
                                <td class="px-4 py-2 border border-gray-200 text-center">
                                    <button class="px-2 py-1 text-white bg-blue-600 hover:bg-blue-700 rounded-md">
                                        Lihat Perjalanan
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 border border-gray-200 text-center">2</td>
                                <td class="px-4 py-2 border border-gray-200">Lensa Fix Yongnuo 18mm</td>
                                <td class="px-4 py-2 border border-gray-200">2024-12-26</td>
                                <td class="px-4 py-2 border border-gray-200">SiLambat</td>
                                <td class="px-4 py-2 border border-gray-200 text-center">
                                    <button class="px-2 py-1 text-white bg-blue-600 hover:bg-blue-700 rounded-md">
                                        Lihat Perjalanan
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tab 4: Barang Dikembalikan -->
            <div x-show="activeTab === 'tab4'" class="space-y-2 bg-white p-5 rounded text-gray-500">
                <h2 class="text-lg font-bold">Barang yang telah disewa</h2>
                <!-- Tabel Barang yang Pernah Disewa -->
                <div class="overflow-x-auto">
                    <table class="table-auto w-full border-collapse border border-gray-200 rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left border border-gray-200">No</th>
                                <th class="px-4 py-2 text-left border border-gray-200">Nama Barang</th>
                                <th class="px-4 py-2 text-left border border-gray-200">Tanggal Sewa</th>
                                <th class="px-4 py-2 text-left border border-gray-200">Tanggal Kembali</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-4 py-2 border border-gray-200 text-center">1</td>
                                <td class="px-4 py-2 border border-gray-200">Kamera DSLR Canon 5D</td>
                                <td class="px-4 py-2 border border-gray-200">2024-01-01</td>
                                <td class="px-4 py-2 border border-gray-200">2024-01-05</td>

                            </tr>
                            <tr>
                                <td class="px-4 py-2 border border-gray-200 text-center">2</td>
                                <td class="px-4 py-2 border border-gray-200">Lensa Sony 85mm</td>
                                <td class="px-4 py-2 border border-gray-200">2024-02-10</td>
                                <td class="px-4 py-2 border border-gray-200">2024-02-15</td>

                            </tr>
                            <tr>
                                <td class="px-4 py-2 border border-gray-200 text-center">3</td>
                                <td class="px-4 py-2 border border-gray-200">Kamera GoPro Hero 10</td>
                                <td class="px-4 py-2 border border-gray-200">2024-03-01</td>
                                <td class="px-4 py-2 border border-gray-200">2024-03-03</td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    // Initialize the map
    var map;
    var marker;
    var initialLat = {{ old('latitude', $user->latitude) ?: -6.914744 }};  // Default to a fallback latitude
    var initialLon = {{ old('longitude', $user->longitude) ?: 107.609810 }};  // Default to a fallback longitude

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize the map when the DOM is fully loaded
        map = L.map('map').setView([initialLat, initialLon], 13); // Use initialLat and initialLon for default center

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map);

        // Check if there is a saved marker (if latitude and longitude are available)
        if (initialLat && initialLon) {
            // Set the marker at the stored coordinates
            marker = L.marker([initialLat, initialLon]).addTo(map);
            // Optionally, zoom into the marker's position
            map.setView([initialLat, initialLon], 13);
            // Call the function to update the address field based on the initial coordinates
            getAddressFromLatLng({ lat: initialLat, lng: initialLon });
        }

        // When the user clicks on the map, place a marker and update latitude and longitude
        map.on('click', function(e) {
            var latLng = e.latlng;

            // If there is an existing marker, remove it
            if (marker) {
                map.removeLayer(marker);
            }

            // Place a new marker at the clicked location
            marker = L.marker(latLng).addTo(map);

            // Update the hidden latitude and longitude inputs with the new coordinates
            document.getElementById('latitude').value = latLng.lat;
            document.getElementById('longitude').value = latLng.lng;

            // Call geocoding service to get the address for the clicked location
            getAddressFromLatLng(latLng);
        });

        // Function to get address from lat/lng using Nominatim API
        function getAddressFromLatLng(latLng) {
            var lat = latLng.lat;
            var lon = latLng.lng;

            // Use Nominatim API to reverse geocode the coordinates
            const url = `https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lon}&format=json`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    // Get the address from the API response
                    const address = data.display_name;
                    // Set the address in the input field
                    document.getElementById('address').value = address;
                })
                .catch(error => {
                    console.error('-Error saat menerima alamat -', error);
                    document.getElementById('address').value = 'Address not found';
                });
        }
    });

    function tabs() {
        return {
            activeTab: 'tab1', // Default active tab
            setActive(tab) {
                this.activeTab = tab;

                if (tab === 'tab1' && typeof map !== 'undefined') {
                    setTimeout(() => {
                        map.invalidateSize();
                    }, 200);
                }
            },
        };
    }
</script>
