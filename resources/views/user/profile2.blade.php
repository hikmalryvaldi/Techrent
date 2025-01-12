<x-header>Profile</x-header>
<!-- Tab 2: BARANG OTW CUST -->

<body>

    <x-navbar :isRegistrationPage="true"></x-navbar>
    <div class="max-w-4xl mx-auto mt-10 p-5" x-data="tabs()" x-cloak>
        <!-- Tabs Navigation -->
        <div class="flex border-b">
            <a href="/profile" class="px-4 py-2 text-sm font-medium border-b-2">
                Informasi Pribadi
            </a>
            <a class="px-4 py-2 text-sm font-medium border-b-2 border-blue-500 text-blue-500 cursor-pointer">
                Barang Sedang Dikirim
            </a>
            <a class="px-4 py-2 text-sm font-medium border-b-2 cursor-pointer">
                Barang Yang Telah Disewaa
            </a>
        </div>


        <div class="mt-5">

            <div class="space-y-6 bg-white p-5 rounded text-gray-500">
                <h2 class="text-lg font-bold">Barang Sedang Dikirim</h2>
                <!-- Tabel Barang yang Sedang Dikirim -->
                <div class="overflow-x-auto">
                    @if ($transactions->isEmpty())
                        <p>Tidak ada transaksi yang ditemukan.</p>
                    @else
                        <table class="table-auto w-full border-collapse border border-gray-200 rounded-lg">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left border border-gray-200">Produk</th>
                                    <th class="px-4 py-2 text-center border border-gray-200 ">Tanggal Pengiriman</th>
                                    <th class="px-4 py-2 text-center border border-gray-200">Status Pengiriman</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <!-- Contoh Data Transaksi 1 -->
                                    <tr class="bg-gray-100">
                                        <td colspan="3" class="px-4 py-2 border border-gray-200 text-left font-bold">
                                            No Transaksi: {{ $transaction->transaction_id }}</td>
                                        <!-- Display Transaction ID -->
                                    </tr>
                                    @foreach ($transaction->transactionItems as $item)
                                        <tr class="bg-gray-50">
                                            <td class="px-4 py-2 border border-gray-200">
                                                {{ $item->product->product_name }}</td>
                                            <td class="px-4 py-2 border border-gray-200 text-center">
                                                {{ $transaction->created_at }}</td>
                                            <td class="px-4 py-2 border border-gray-200 text-center">
                                                {{ $transaction->status_pengiriman }}</td> <!-- Empty for button -->
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    @endif




                </div>
            </div>
</body>
