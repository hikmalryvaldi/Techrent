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
            <div x-show="activeTab === 'tab1'" class="space-y-6 bg-white p-5 rounded">
                <h2 class="text-lg font-bold text-gray-500">Informasi Pribadi</h2>

                {{-- NAMA --}}
                <div class="flex items-center gap-2 w-full sm:w-[50%]">
                    <div class="flex items-center w-full bg-[#282828] text-white px-3 rounded h-10">
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512">
                            <path fill="#ffffff"
                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                        </svg>
                        <input type="text"
                            class="bg-transparent border-none w-full placeholder-white-100 text-white focus:outline-none h-full"
                            placeholder="Nama Lengkap" disabled>
                    </div>
                    <button class="p-2 rounded flex items-center justify-center h-10 w-10">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512">
                            <path fill="#282828"
                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0-17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                        </svg>
                    </button>
                </div>

                {{-- EMAIL --}}
                <div class="flex items-center gap-2 w-full sm:w-[50%]">
                    <div class="flex items-center w-full bg-[#282828] text-white px-3 rounded h-10">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512">
                            <path fill="#ffffff"
                                d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                        </svg>
                        <input type="text"
                            class="bg-transparent border-none w-full placeholder-white-100 text-white focus:outline-none h-full"
                            placeholder="Alamat Email" disabled>
                    </div>
                    <button class="p-2 rounded flex items-center justify-center h-10 w-10 ">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512">
                            <path fill="#282828"
                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0-17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                        </svg>
                    </button>
                </div>

                {{-- NOMOR TELEPON --}}
                <div class="flex items-center gap-2 w-full sm:w-[50%]">
                    <div class="flex items-center w-full bg-[#282828] text-white px-3 rounded h-10">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                        </svg>
                        <input type="text"
                            class="bg-transparent border-none w-full placeholder-white-100 text-white focus:outline-none h-full"
                            placeholder="Nomor Telepon" disabled>
                    </div>
                    <button class="p-2 rounded flex items-center justify-center h-10 w-10 ">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512">
                            <path fill="#282828"
                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0-17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                        </svg>
                    </button>
                </div>

                {{-- FROM BACKEND --}}
                <div id="map"></div>
                {{-- END FROM BACKEND --}}

                {{-- ALAMAT --}}
                <div class="flex flex-col gap-2 sm:w-[50%]">
                    <label for="address" class="text-sm font-medium text-gray-700">Alamat</label>
                    <textarea id="address" class="textarea textarea-bordered w-full bg-[#282828] text-white h-24 rounded" disabled></textarea>
                </div>

                {{-- GANTI PASSWORD --}}
                <div class="mt-10">
                    <a href="ubahPassword" class="text-blue-500">Ubah Password</a>
                </div>

                {{-- TOMBOL --}}
                <div class="flex justify-end gap-4 p-6">
                    <a href="/"
                        class="inline-block px-6 py-2 text-white bg-gray-500 hover:bg-gray-600 rounded-md">
                        Kembali
                    </a>
                    <a href="#"
                        class="inline-block px-6 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-md">
                        Ubah Data
                    </a>
                </div>
            </div>




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
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize the map when the DOM is fully loaded
        map = L.map('map').setView([-6.914744, 107.609810], 13); // Default center(London)

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map);

        // Create a marker variable
        var marker;

        // When the user clicks on the map, place a marker
        map.on('click', function(e) {
            var latLng = e.latlng;

            // If there is an existing marker, remove it
            if (marker) {
                map.removeLayer(marker);
            }

            // Place a new marker at the clicked location
            marker = L.marker(latLng).addTo(map);

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
