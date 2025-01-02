<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Delivery Simulation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css" />
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
            background: white;
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
            background-color: #cccccc;
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
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Delivery Simulation</h1>
        <div class="controls">
            <button id="simulate">Start Simulation</button>
            <button id="reset">Reset</button>
            <input type="text" id="address" placeholder="Current delivery address..." readonly />
        </div>
        <div id="status" class="status">Status: Ready to simulate</div>
    </div>

    <!-- Modal -->
    <div id="simulationModal" class="modal">
        <div class="modal-content">
            <h2>Delivery Simulation</h2>
            <div id="map"></div>
            <button id="closeModal">Close</button>
        </div>
    </div>

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
</body>
</html>
