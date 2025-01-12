<x-header>Profile</x-header>
<!-- Tab 2: BARANG OTW CUST -->

<body>

    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            padding: 20px;
            border-radius: 8px;
            max-width: 800px;
            width: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        #map {
            height: 500px;
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .controls {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            align-items: center;
        }

        #address {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .status {
            padding: 10px;
            margin-top: 10px;
            border-radius: 4px;
        }
    </style>

    <x-navbar :isRegistrationPage="true"></x-navbar>
    <div class="max-w-4xl mx-auto mt-10 p-5" x-data="tabs()" x-cloak>
        <!-- Tabs Navigation -->
        <div class="flex border-b">
            <a class="px-4 py-2 text-sm font-medium border-b-2" href="/profile">
                Informasi Pribadi
            </a>
            <a href="/user/perlukirim" class="px-4 py-2 text-sm font-medium border-b-2">
                Barang Sedang Dikirim
            </a>
            {{-- <a class="px-4 py-2 text-sm font-medium border-b-2 border-blue-500 text-blue-500">
                Barang Sedang Dikembalikan
            </a> --}}
            <a class="px-4 py-2 text-sm font-medium border-b-2">
                Barang Yang Telah Disewa
            </a>
        </div>


        <div class="mt-5">

            <div class="space-y-6 bg-white p-5 rounded text-gray-500">
                <h2 class="text-lg font-bold">Barang Sedang Dikirimin</h2>
                <!-- Tabel Barang yang Sedang Dikirim -->
                <div class="overflow-x-auto">
                    @if ($transactions->isEmpty())
                        <p>Tidak ada transaksi yang ditemukan.</p>
                    @else
                        <table class="table-auto w-full border-collapse border border-gray-200 rounded-lg">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left border border-gray-200">Produk</th>
                                    <th class="px-4 py-2 text-center border border-gray-200">Tanggal Pengiriman</th>
                                    <th class="px-4 py-2 text-center border border-gray-200">Status Pengiriman</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <!-- Contoh Data Transaksi 1 -->
                                    <tr class="bg-gray-100">
                                        <td colspan="2" class="px-4 py-2 border border-gray-200 text-left font-bold">
                                            No Transaksi: 12345</td> <!-- Display Transaction ID -->
                                        <td class="px-4 py-2 border border-gray-200 text-center">
                                            <button type="button" id="simulate"
                                                class="px-2 py-1 text-white bg-blue-600 hover:bg-blue-700 rounded-md"
                                                data-user-lat="{{ $transaction->user->latitude }}"
                                                data-user-long="{{ $transaction->user->longitude }}"
                                                data-modal-target="#default-modal"
                                                data-id="{{ $transaction->transaction_id }}">
                                                Lihat Perjalanan
                                            </button>
                                        </td>
                                    </tr>
                                    @foreach ($transaction->transactionItems as $item)
                                        <tr class="bg-gray-50">
                                            <td class="px-4 py-2 border border-gray-200">
                                                {{ $item->product->product_name }}</td>
                                            <td class="px-4 py-2 border text-center border-gray-200">
                                                {{ $transaction->created_at }}</td>
                                            <td class="px-4 py-2 border text-center border-gray-200">
                                                {{ $transaction->status_pengiriman }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>

                    @endif

                    {{-- Modal --}}
                    <div id="default-modal" tabindex="-1" aria-hidden="true"
                        class="hidden fixed inset-0 z-50 w-full h-full bg-gray-900 bg-opacity-50 flex items-center justify-center">
                        <div class="relative w-full max-w-2xl md:h-auto">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <div
                                    class="flex justify-between items-center p-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Konfirmasi Pesanan
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="default-modal">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 7.586l4.293-3.293a1 1 0 111.414 1.414l-5 5a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <div class="p-6 space-y-6" id="simulationModal">
                                    <div id="map" class="bg-gray-700 border border-gray-600 rounded-lg p-4"></div>
                                    <div id="status" class="hidden"></div>
                                </div>
                                <div
                                    class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <form method="POST" action="/transactions/update-status/selesai">
                                        @csrf
                                        <input type="hidden" name="transaction_id" id="modal-transaction-id"
                                            value="">
                                        <button data-modal-hide="default-modal" type="submit"
                                            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Selesai
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const openModalButtons = document.querySelectorAll('.open-modal');
                    const transactionIdInput = document.getElementById('modal-transaction-id');

                    openModalButtons.forEach(button => {
                        button.addEventListener('click', () => {
                            const transactionId = button.getAttribute('data-id');
                            transactionIdInput.value = transactionId; // Set value input hidden
                        });
                    });
                });
            </script>
            <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const buttons = document.querySelectorAll('.toggle-table');

                    buttons.forEach(button => {
                        button.addEventListener('click', () => {
                            const targetId = button.getAttribute('data-target');
                            const targetRow = document.getElementById(targetId);
                            const contentDiv = targetRow.querySelector('div');
                            const svgIcon = button.querySelector('svg');

                            if (targetRow) {
                                if (targetRow.classList.contains('hidden')) {
                                    targetRow.classList.remove('hidden');
                                    contentDiv.style.maxHeight = contentDiv.scrollHeight + 'px';
                                    svgIcon.classList.remove('rotate-0');
                                    svgIcon.classList.add('rotate-180');
                                } else {
                                    contentDiv.style.maxHeight = contentDiv.scrollHeight + 'px';
                                    requestAnimationFrame(() => {
                                        contentDiv.style.maxHeight = '0';
                                    });
                                    setTimeout(() => targetRow.classList.add('hidden'), 300);
                                    svgIcon.classList.remove('rotate-180');
                                    svgIcon.classList.add('rotate-0');
                                }
                            }
                        });
                    });

                    // Open modal
                    const modalButtons = document.querySelectorAll("[data-modal-target]");
                    modalButtons.forEach(button => {
                        button.addEventListener('click', () => {
                            const targetModal = document.querySelector(button.getAttribute(
                                "data-modal-target"));
                            targetModal.classList.remove('hidden');
                            targetModal.classList.add('flex'); // Make sure the modal is displayed
                        });
                    });

                    // Close modal
                    const modalCloseButtons = document.querySelectorAll("[data-modal-hide]");
                    modalCloseButtons.forEach(button => {
                        button.addEventListener('click', () => {
                            const targetModal = document.querySelector("#default-modal");
                            targetModal.classList.add('hidden');
                            targetModal.classList.remove('flex'); // Hide the modal again
                        });
                    });
                });
            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js">
            </script>
            <script>
                class DeliverySimulation {
                    constructor() {
                        this.map = null;
                        this.startMarker = null;
                        this.endMarker = null;
                        this.deliveryMarker = null;
                        this.deliveryInterval = null;
                        this.isSimulating = false;
                        this.routeLine = null;
                        this.fullRoute = [];
                        this.currentRouteIndex = 0;

                        this.initialize();
                        this.setupEventListeners();
                    }

                    initialize() {
                        // Initialize map with the center of Bandung
                        this.map = L.map('map').setView([-6.914744, 107.609810], 13);

                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '© OpenStreetMap contributors'
                        }).addTo(this.map);
                    }

                    setupEventListeners() {
                        const simulateButton = document.getElementById('simulate');
                        const resetButton = document.getElementById('reset');
                        const closeModalButton = document.getElementById('closeModal');

                        simulateButton.addEventListener('click', (event) => {
                            const targetButton = event.currentTarget;
                            const userLat = parseFloat(targetButton.getAttribute('data-user-lat'));
                            const userLong = parseFloat(targetButton.getAttribute('data-user-long'));

                            if (isNaN(userLat) || isNaN(userLong)) {
                                alert('Invalid destination coordinates.');
                                return;
                            }

                            const destination = [userLat, userLong];

                            // Hardcoding the center of Bandung as the starting point
                            const startPoint = [-6.914744, 107.609810];

                            this.showModal();
                            this.startSimulation(startPoint, destination);
                        });

                        resetButton.addEventListener('click', () => this.resetSimulation());
                        closeModalButton.addEventListener('click', () => this.hideModal());
                    }

                    showModal() {
                        const modal = document.getElementById('simulationModal');
                        modal.style.display = 'flex';
                        this.map.invalidateSize(); // Recalculate map size when modal is visible
                    }

                    hideModal() {
                        const modal = document.getElementById('simulationModal');
                        modal.style.display = 'none';
                    }

                    startSimulation(startPoint, destination) {
                        if (this.isSimulating) return;
                        this.isSimulating = true;

                        this.updateStatus('Simulation starting...');

                        this.clearMap();

                        // Custom icon for the delivery marker
                        const motorIcon = L.icon({
                            iconUrl: '/img/driver.png', // Ganti dengan URL gambar motor Anda
                            iconSize: [60, 60], // Ukuran ikon (lebar, tinggi)
                            iconAnchor: [20, 40], // Titik jangkar pada ikon
                            popupAnchor: [0, -40] // Lokasi popup relatif terhadap ikon
                        });

                        // Add markers for start, end, and delivery
                        this.startMarker = L.marker(startPoint).addTo(this.map).bindPopup('Start Location').openPopup();
                        this.endMarker = L.marker(destination).addTo(this.map).bindPopup('Destination').openPopup();
                        this.deliveryMarker = L.marker(startPoint, {
                            icon: motorIcon
                        }).addTo(this.map).bindPopup('Delivery in Progress');

                        // Create routing control for the route between start and destination
                        const routing = L.Routing.control({
                            waypoints: [
                                L.latLng(startPoint[0], startPoint[1]),
                                L.latLng(destination[0], destination[1])
                            ],
                            routeWhileDragging: false,
                            show: false
                        });

                        routing.on('routesfound', (e) => {
                            const coordinates = e.routes[0].coordinates;
                            this.fullRoute = coordinates.map(coord => [coord.lat, coord.lng]);
                            this.currentRouteIndex = 0;
                            this.animateDelivery();
                            this.map.removeControl(routing);
                        });

                        routing.addTo(this.map);

                        // Initially draw a polyline from start to destination
                        this.routeLine = L.polyline([startPoint, destination], {
                            color: 'blue',
                            weight: 4
                        }).addTo(this.map);
                    }

                    animateDelivery() {
                        if (this.currentRouteIndex >= this.fullRoute.length) {
                            this.completeDelivery();
                            return;
                        }

                        const currentPos = this.fullRoute[this.currentRouteIndex];
                        this.deliveryMarker.setLatLng(currentPos);

                        const updatedRoute = this.fullRoute.slice(this.currentRouteIndex, this.fullRoute.length);
                        if (this.routeLine) {
                            this.routeLine.setLatLngs(updatedRoute);
                        }

                        const destination = this.fullRoute[this.fullRoute.length - 1];
                        if (this.isNearDestination(currentPos, destination)) {
                            if (this.endMarker) {
                                this.endMarker.setPopupContent('Delivery Complete');
                                this.endMarker.openPopup();
                            }
                        }

                        this.currentRouteIndex++;
                        setTimeout(() => this.animateDelivery(), 200);
                    }

                    isNearDestination(currentPos, destination) {
                        const threshold = 0.0005; // Adjust this value to allow for a small error margin
                        const latDiff = Math.abs(currentPos[0] - destination[0]);
                        const lngDiff = Math.abs(currentPos[1] - destination[1]);
                        return latDiff < threshold && lngDiff < threshold;
                    }

                    completeDelivery() {
                        this.isSimulating = false;
                        this.updateStatus('Delivery completed!');
                    }

                    resetSimulation() {
                        this.clearMap();
                        this.isSimulating = false;
                        this.updateStatus('Ready to simulate');
                        this.currentRouteIndex = 0;
                        this.fullRoute = [];
                    }

                    clearMap() {
                        if (this.startMarker) this.map.removeLayer(this.startMarker);
                        if (this.endMarker) this.map.removeLayer(this.endMarker);
                        if (this.deliveryMarker) this.map.removeLayer(this.deliveryMarker);
                        if (this.routeLine) this.map.removeLayer(this.routeLine);
                    }

                    updateStatus(message) {
                        document.getElementById('status').textContent = `Status: ${message}`;
                    }
                }

                document.addEventListener('DOMContentLoaded', () => {
                    new DeliverySimulation();
                });
            </script>


</body>
