<x-header>Cek Status barang</x-header>


<body>
    <x-navbar :isRegistrationPage="true"></x-navbar>

    <div class="max-w-4xl mx-auto mt-10 p-5" x-data="tabs()" x-cloak>
        <!-- Tabs Navigation -->
        <div class="flex border-b">
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
            <!-- Kembali Button -->
            <div class="mb-4">
                <a href="/profile" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                    Kembali ke Profil
                </a>
            </div>
            <!-- Tab 1: Informasi Pribadi -->
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">
                    <span class="font-medium">{{ session('success') }}
                </div>
            @endif

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
    function tabs() {
        return {
            activeTab: 'tab2', // Default active tab
            setActive(tab) {
                this.activeTab = tab;

                if (tab === 'tab2' && typeof map !== 'undefined') {
                    setTimeout(() => {
                        map.invalidateSize();
                    }, 200);
                }
            },
        };
    }
</script>
