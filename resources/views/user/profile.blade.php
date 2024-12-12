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

    <div class="max-w-4xl mx-auto py-12 px-6 sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">

            <div class="border-t border-gray-200">
                <div class="flex justify-between items-center px-6 py-4 bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-900">Informasi Pribadi</h3>
                </div>

                <div class="p-6 space-y-4">

                    <div class="grid grid-cols-1 gap-4">

                        {{-- NAMA --}}
                        <div class="flex items-center gap-2 -mt-3">
                            <label
                                class="input input-bordered flex items-center w-full sm:w-[50%] mt-2 -ml-1 gap-2 bg-[#282828] text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#ffffff"
                                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                </svg>
                                <input type="text" class="input-field w-full" placeholder="Nama Lengkap" disabled>
                            </label>
                            <button class="mt-2 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#282828"
                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                </svg>
                            </button>
                        </div>

                        {{-- EMAIL --}}
                        <div class="flex items-center gap-2 mt-8">
                            <label
                                class="input input-bordered flex items-center w-full sm:w-[50%] mt-2 -ml-1 gap-2 bg-[#282828] text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#ffffff"
                                        d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                                </svg>
                                <input type="text" class="input-field w-full" placeholder="Email" disabled>
                            </label>
                            <button class="mt-2 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#282828"
                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                </svg>
                            </button>
                        </div>

                        {{-- NO HP --}}
                        <div class="flex items-center gap-2 mt-8">
                            <label
                                class="input input-bordered flex items-center w-full sm:w-[50%] mt-2 -ml-1 gap-2 bg-[#282828] text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#ffffff"
                                        d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                                </svg>
                                <input type="text" class="input-field w-full" placeholder="Nomor HP" disabled>
                            </label>
                            <button class="mt-2 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#282828"
                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                </svg>
                            </button>
                        </div>

                        {{-- FROM BACKEND --}}
                        <div id="map"></div>
                        {{-- END FROM BACKEND --}}

                        {{-- Alamat --}}
                        <div class="flex items-center gap-2 mt-8 -ml-2 sm:w-[50%] w-full">
                            <textarea placeholder="Alamat" class="textarea textarea-bordered textarea-lg w-full max-w-xs bg-[#282828] text-white"
                                disabled id="address"></textarea>
                            <button class="mt-2 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#282828"
                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                </svg>
                            </button>
                        </div>


                        {{-- Ganti Password --}}
                        <div class="mt-10">
                            <a href="ubahPassword" class="text-blue-500">Ubah Password</a>
                        </div>
                    </div>
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
        </div>
    </div>
</body>

{{-- FROM BACKEND --}}
<script>
    // Initialize the map
    var map = L.map('map').setView([ -6.914744, 107.609810], 13);  // Default center (London)

    // Add OpenStreetMap tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Create a marker variable
    var marker;

    // When the user clicks on the map, place a marker
    map.on('click', function(e) {
        // Get the clicked position (lat, lon)
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
        var url = `https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lon}&format=json`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                // Get the address from the API response
                var address = data.display_name;
                // Set the address in the input field
                document.getElementById('address').value = address;
            })
            .catch(error => {
                console.error('- Error saat menerima alamat -', error);
                document.getElementById('address').value = 'Address not found';
            });
    }
</script>
{{-- END FROM BACKEND --}}