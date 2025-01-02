<x-header>Profile</x-header>
{{-- FROM BACKEND --}}
<style>
    #map {
        height: 200px;
        width: 300px;
    }
</style>
{{-- END FROM BACKEND --}}

<body>
    <x-navbar :isRegistrationPage="true"></x-navbar>
    <div class="max-w-4xl mx-auto mt-10 p-5">
        <!-- Tabs Navigation -->
        <div class="flex border-b">
            <h3 class="pb-2 text-lg strong text-black">Informasi Pribadi</h3>
        </div>

        <!-- Tabs Content -->
        <div class="mt-5">
            <!-- Tab 1: Informasi Pribadi -->
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">
                    <span class="font-medium">{{ session('success') }}
                </div>
            @endif
            <div class="space-y-6 bg-white p-5 rounded">
                <h2 class="text-lg font-bold text-gray-500">Informasi Pribadi</h2>

                <form action="{{ route('update') }}" method="POST" class="space-y-6">
                    @method('PUT')
                    @csrf
                    {{-- NAMA --}}
                    <div class="flex items-center gap-2 w-full sm:w-[50%]">
                        <div class="flex items-center w-full bg-[#282828] text-white px-3 rounded h-10">
                            <input type="text" name="nama"
                                class="bg-transparent border-none w-full placeholder-white-100 text-white focus:outline-none h-full"
                                placeholder="Nama Lengkap" value="{{ old('nama', $user->nama) }}">
                        </div>
                    </div>

                    {{-- EMAIL --}}
                    <div class="flex items-center gap-2 w-full sm:w-[50%]">
                        <div class="flex items-center w-full bg-[#282828] text-white px-3 rounded h-10">
                            <input type="email" name="email"
                                class="bg-transparent border-none w-full placeholder-white-100 text-white focus:outline-none h-full"
                                placeholder="Alamat Email" value="{{ old('email', $user->email) }}">
                        </div>
                    </div>

                    {{-- NOMOR TELEPON --}}
                    <div class="flex items-center gap-2 w-full sm:w-[50%]">
                        <div class="flex items-center w-full bg-[#282828] text-white px-3 rounded h-10">
                            <input type="text" name="phone"
                                class="bg-transparent border-none w-full placeholder-white-100 text-white focus:outline-none h-full"
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
                    <input type="hidden" id="latitude" name="latitude"
                        value="{{ old('latitude', $user->latitude ?? '') }}">

                    {{-- LONGITUDE --}}
                    <input type="hidden" id="longitude" name="longitude"
                        value="{{ old('longitude', $user->longitude ?? '') }}">

                    {{-- GANTI PASSWORD --}}
                    <div class="mt-10">
                        <a href="ubahPassword" class="text-blue-500">Ubah Password</a>
                    </div>

                    {{-- PERTOMBOLAN --}}
                    <div class="flex justify-between items-center">
                        <!-- Tombol Kembali -->
                        <a href="/" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Kembali ke
                            Halaman</a>

                        <!-- Tombol Cek Status Barang dan Simpan -->
                        <div class="flex items-center space-x-4">
                            <a href="statusBarang" class="text-blue-500 hover:underline">Cek Status Barang</a>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
                        </div>
                    </div>
                </form>

            </div>

            {{-- end --}}
        </div>
    </div>
</body>

<script>
    // Initialize the map
    var map;
    var marker;
    var initialLat = {{ old('latitude', $user->latitude) ?: -6.914744 }}; // Default to a fallback latitude
    var initialLon = {{ old('longitude', $user->longitude) ?: 107.60981 }}; // Default to a fallback longitude

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize the map when the DOM is fully loaded
        map = L.map('map').setView([initialLat, initialLon],
            13); // Use initialLat and initialLon for default center

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
            getAddressFromLatLng({
                lat: initialLat,
                lng: initialLon
            });
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
</script>
