<x-header>Voucher Produk</x-header>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <x-sidebar></x-sidebar>

    <div
        class="bg-gray-50 p-8 rounded-lg shadow-lg w-full max-w-md md:max-w-lg lg:max-w-xl mx-4 sm:ml-64 sm:mx-8 lg:ml-64">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Buat Voucher</h2>
        <form action="#" method="POST" class="space-y-4">

            <!-- Nama Voucher -->
            <div>
                <label for="voucher_name" class="block text-gray-700 font-medium">Nama Voucher</label>
                <input type="text" id="voucher_name" name="voucher_name"
                    class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-indigo-200 focus:outline-none bg-gray-700 text-white">
            </div>


            {{-- Besaran diskon --}}
            <div>
                <label for="discount_value" class="block text-gray-700 font-medium">Besaran Potongan (%)</label>
                <input type="number" id="discount_value" name="discount_value"
                    class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-indigo-200 focus:outline-none bg-gray-700 text-white">
            </div>

            {{-- Total voucher --}}
            <div>
                <label for="total_vouchers" class="block text-gray-700 font-medium">Total Vouchers</label>
                <input type="number" id="total_vouchers" name="total_vouchers"
                    class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-indigo-200 focus:outline-none bg-gray-700 text-white">
            </div>

            <!-- Max Vouchers Per Orang -->
            <div>
                <label for="max_voucher_per_person" class="block text-gray-700 font-medium">Max Vouchers Per
                    User</label>
                <input type="number" id="max_voucher_per_person" name="max_voucher_per_person"
                    class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-indigo-200 focus:outline-none bg-gray-700 text-white">
            </div>

            <!-- Masa Berlaku -->
            <div>
                <label for="expiry_date" class="block text-gray-700 font-medium">Berlaku Sampai Dengan</label>
                <input type="date" id="expiry_date" name="expiry_date"
                    class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-indigo-200 focus:outline-none bg-gray-700 text-white">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 focus:ring focus:ring-indigo-200 focus:outline-none">
                    Buat Voucher
                </button>
            </div>
        </form>
    </div>

    {{-- speed dial  --}}
    <x-speedDeal></x-speedDeal>


    {{-- js --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
