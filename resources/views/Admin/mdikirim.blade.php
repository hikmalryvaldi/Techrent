<x-header>Pesanan</x-header>

<body style="height: 100%;">
    {{-- Navbar --}}
    <x-sidebar></x-sidebar>

    <style>
        body {
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
        }
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
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .controls {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            align-items: center;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        button:disabled {
            cursor: not-allowed;
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

    {{-- Menu Pesanan --}}
    <div class="p-4 my-16 sm:ml-64">
        <div class="mx-auto p-8 bg-gray-100 rounded-lg shadow-lg">
            <h2 class="text-black text-2xl font-bold">Pesanan</h2>

            {{-- Menu Pesanan --}}
            <x-menuPesanan></x-menuPesanan>

            <div>
                {{-- search --}}
                <x-searchPesanan></x-searchPesanan>

                {{-- Table Head Pesanan --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                    @endif
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th colspan="6" class="px-6 py-3 text-center text-2xl font-bold text-gray-700 dark:text-gray-200">
                                    Daftar Pesanan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                            <tr class="bg-gray-100 dark:bg-gray-800">
                                <td colspan="6" class="px-6 py-4 font-bold text-lg text-gray-900 dark:text-white relative">
                                    ID Transaksi: {{ $transaction->transaction_id }}
                                    <br>
                                    <span class="text-xs font-extralight text-gray-900 dark:text-white"> Nama Pemesan: {{ $transaction->user->nama }}</span>
                                    <button type="button"
                                        class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 toggle-table"
                                        data-target="table-{{ $transaction->id }}" data-id="{{ $transaction->transaction_id }}">
                                        <!-- SVG icon with initial rotation 0deg -->
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 transition-transform duration-300 transform rotate-0">
                                            <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- Tabel Detail (Default Tersembunyi) -->
                            <tr id="table-{{ $transaction->id }}" class="detail-table hidden transition-all duration-300 ease-in-out">
                                <td colspan="6" class="p-0 overflow-hidden">
                                    <div class="overflow-x-auto max-h-0 transition-all duration-300 ease-in-out">
                                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="p-4">No</th>
                                                    <th scope="col" class="px-6 py-3">Produk</th>
                                                    <th scope="col" class="px-6 py-3">Harga Satuan</th>
                                                    <th scope="col" class="px-6 py-3">Jumlah</th>
                                                    <th scope="col" class="px-6 py-3">Subtotal</th>
                                                    <th scope="col" class="px-6 py-3">Jasa Kirim</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $totalHarga = 0; @endphp
                                                @foreach($transaction->transactionItems as $index => $item)
                                                @php
                                                    $subtotal = $item->product->price * $item->quantity;
                                                    $totalHarga += $subtotal;
                                                @endphp
                                                <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
                                                    <td class="p-4">{{ $index + 1 }}</td>
                                                    <td class="px-6 py-4">{{ $item->product->product_name }}</td>
                                                    <td class="px-6 py-4">Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
                                                    <td class="px-6 py-4">{{ $item->quantity }}</td>
                                                    <td class="px-6 py-4">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                                    <td class="px-6 py-4">Gojek/Gosen</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr class="bg-gray-50 dark:bg-gray-700">
                                                    <td colspan="5" class="px-6 py-4 text-right font-bold text-gray-900 dark:text-white">
                                                        Total Harga: Rp {{ number_format($totalHarga, 0, ',', '.') }}
                                                    </td>
                                                    <td class="px-6 py-4 text-right">
                                                        <button type="button" id="simulate"
                                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 open-modal"
                                                            data-user-lat="{{ $transaction->user->latitude }}"  data-user-long="{{ $transaction->user->longitude }}" data-modal-target="#default-modal" data-id="{{ $transaction->transaction_id }}">
                                                            Lihat Perjalanan
                                                        </button>
                                                    </td>                                                    
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                    {{-- Modal --}}
                    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 w-full h-full bg-gray-900 bg-opacity-50 flex items-center justify-center">
                        <div class="relative w-full max-w-2xl md:h-auto">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <div class="flex justify-between items-center p-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Konfirmasi Pesanan
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 7.586l4.293-3.293a1 1 0 111.414 1.414l-5 5a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <div class="p-6 space-y-6" id="simulationModal">
                                    <div id="map" class="bg-gray-700 border border-gray-600 rounded-lg p-4"></div>
                                    <div id="status" class="hidden"></div>
                                </div>
                                <div class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button data-modal-hide="default-modal" type="button" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                        Tutup
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

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
                                const targetModal = document.querySelector(button.getAttribute("data-modal-target"));
                                targetModal.classList.remove('hidden');
                                targetModal.classList.add('flex');  // Make sure the modal is displayed
                            });
                        });

                        // Close modal
                        const modalCloseButtons = document.querySelectorAll("[data-modal-hide]");
                        modalCloseButtons.forEach(button => {
                            button.addEventListener('click', () => {
                                const targetModal = document.querySelector("#default-modal");
                                targetModal.classList.add('hidden');
                                targetModal.classList.remove('flex');  // Hide the modal again
                            });
                        });
                    });
                </script>
                
                <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js"></script>
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
                            // Initialize map inside the modal
                            this.map = L.map('map').setView([-6.914744, 107.609810], 13);

                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '© OpenStreetMap contributors'
                            }).addTo(this.map);
                        }

                        setupEventListeners() {
                            const simulateButton = document.getElementById('simulate');
                            const resetButton = document.getElementById('reset');
                            const closeModalButton = document.getElementById('closeModal');

                            simulateButton.addEventListener('click', () => {
                                this.showModal();
                                this.startSimulation();
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

                        startSimulation() {
                if (this.isSimulating) return;
                this.isSimulating = true;

                this.updateStatus('Simulation starting...');

                const startPoint = this.generateRandomPoint();
                const endPoint = this.generateRandomPoint();

                this.clearMap();

                // Add markers for start, end, and delivery
                this.startMarker = L.marker(startPoint).addTo(this.map).bindPopup('Start Location').openPopup();
                this.endMarker = L.marker(endPoint).addTo(this.map).bindPopup('Destination').openPopup();
                this.deliveryMarker = L.marker(startPoint).addTo(this.map).bindPopup('Delivery in Progress');

                // Create routing control for the route between start and end
                const routing = L.Routing.control({
                    waypoints: [
                        L.latLng(startPoint[0], startPoint[1]),
                        L.latLng(endPoint[0], endPoint[1])
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

                // Initially draw a polyline from start to end
                this.routeLine = L.polyline([startPoint, endPoint], { color: 'blue', weight: 4 }).addTo(this.map);
            }


            animateDelivery() {
                if (this.currentRouteIndex >= this.fullRoute.length) {
                    this.completeDelivery();
                    return;
                }

                // Get the current position from the route (current position of delivery vehicle)
                const currentPos = this.fullRoute[this.currentRouteIndex];

                // Move the delivery marker to the current position
                this.deliveryMarker.setLatLng(currentPos);

                // Update the polyline (from the current delivery position to the destination)
                const updatedRoute = this.fullRoute.slice(this.currentRouteIndex, this.fullRoute.length);

                // Update the polyline to extend from the delivery marker to the destination
                if (this.routeLine) {
                    this.routeLine.setLatLngs(updatedRoute);
                }

                // Check if delivery reached the destination
                const destination = this.fullRoute[this.fullRoute.length - 1];
                if (this.isNearDestination(currentPos, destination)) {
                    // Change the popup text for the destination marker
                    if (this.endMarker) {
                        this.endMarker.setPopupContent('Delivery Complete');
                        this.endMarker.openPopup();
                    }
                }

                // Move to the next position
                this.currentRouteIndex++;

                // Continue the animation
                setTimeout(() => this.animateDelivery(), 200);
            }

            // Helper function to check if delivery is near the destination
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

                        generateRandomPoint() {
                            const center = this.map.getCenter();
                            const lat = center.lat + (Math.random() * 0.1 - 0.05);
                            const lng = center.lng + (Math.random() * 0.1 - 0.05);
                            return [lat, lng];
                        }
                    }

                    document.addEventListener('DOMContentLoaded', () => {
                        new DeliverySimulation();
                    });
                </script>

            </div>
        </div>
    </div>
</body>
