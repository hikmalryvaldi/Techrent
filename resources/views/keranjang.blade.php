<x-header>Keranjang</x-header>

<body>
    <x-navbar :isRegistrationPage="true"></x-navbar>

    <!-- Keranjang Belanja -->
    <section class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Keranjang Barang</h1>

        <!-- Rincian Identitas Pembeli -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
            <div class="flex items-center space-x-3">
                <!-- Ikon SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="15" viewBox="0 0 384 512"
                    class="text-gray-800">
                    <path
                        d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                </svg>
                <!-- Teks Heading -->
                <h2 class="text-xl font-semibold text-gray-800">Alamat Pengiriman</h2>
            </div>
            <div class="space-y-4">
                <!-- Nama -->
                <div>
                    <p class="text-gray-700 font-semibold mt-3">Nama Lengkap:</p>
                    <p class="text-gray-800">[{{ Auth::user()->nama }}]</p>
                </div>
                <!-- Nomor Telepon -->
                <div>
                    <p class="text-gray-700 font-semibold">Nomor Telepon:</p>
                    <p class="text-gray-800">[{{ Auth::user()->phone }}]</p>
                </div>
                <!-- Alamat -->
                <div>
                    <p class="text-gray-700 font-semibold">Alamat:</p>
                    <p class="text-gray-800">[{{ Auth::user()->phone }}]</p>
                </div>
            </div>
        </div>

        <!-- Daftar Produk di Keranjang -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="space-y-6">
                <!-- Produk 1 -->
                @foreach ($produkYangDipilih as $cartItem)
                <div class="border-b pb-4">
                    <div
                        class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-4">
                        <img src="https://via.placeholder.com/80" alt="Produk 1"
                            class="w-20 h-20 object-cover rounded-md">
                        <div class="flex flex-col w-full">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $cartItem->product_name }}</h3>
                            <p class="text-gray-600">Deskripsi produk.</p>
                            <div class="flex justify-between mt-2 w-full">
                                <div class="flex items-center space-x-2">
                                    <button class="bg-gray-300 text-gray-800 px-2 py-1 rounded-full">-</button>
                                    <span class="text-gray-700">{{ $cartItem->quantity }}</span>
                                    <button class="bg-gray-300 text-gray-800 px-2 py-1 rounded-full">+</button>
                                </div>
                                <div class="flex flex-col text-right">
                                    <p class="text-gray-700">Durasi: 6 Hari</p>
                                    <p class="text-gray-700 font-semibold">Rp {{ number_format($cartItem->price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Dropdown Voucher -->
            <div class="mt-6">
                <label for="voucher" class="block text-gray-700 font-semibold mb-2">Pilih Voucher untuk
                    Keranjang:</label>
                <select id="voucher" name="voucher"
                    class="bg-gray-200 border border-gray-400 text-gray-800 rounded-lg px-4 py-2 w-full hover:bg-gray-300 focus:ring focus:ring-blue-500">
                    <option value="">-- Pilih Voucher --</option>
                    <option value="voucher1">Voucher Diskon 10%</option>
                    <option value="voucher2">Voucher Gratis Ongkir</option>
                    <option value="voucher3">Voucher Cashback</option>
                </select>
            </div>
        </div>

        <!-- Rincian Pembayaran -->
        <div class="bg-white p-6 rounded-lg shadow-lg mt-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Rincian Pembayaran</h2>
            <div class="space-y-2">
                <!-- Subtotal Produk -->
                <div class="flex justify-between">
                    <p class="text-gray-700">Subtotal Produk:</p>
                    {{-- <p class="text-gray-800 font-semibold">Rp {{number_format($totalPrice, 0, ',', '.')}}</p> --}}
                </div>
                {{-- <!-- Subtotal Pengiriman -->
                <div class="flex justify-between">
                    <p class="text-gray-700">Subtotal Pengiriman:</p>
                    <p class="text-gray-800 font-semibold">Rp 20.000</p>
                </div>
                <!-- Voucher Diskon -->
                <div class="flex justify-between">
                    <p class="text-gray-700">Voucher Diskon:</p>
                    <p class="text-gray-800 font-semibold">- Rp 25.000</p>
                </div> --}}
                <hr class="my-2 border-gray-300">
                <!-- Total Pembayaran -->
                <div class="flex justify-between text-lg font-semibold">
                    <p class="text-gray-800">Total Pembayaran:</p>
                    <p class="text-red-600">Rp {{ number_format($gross_amount, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        {{-- Midtrans Transaksi --}}

        {{-- Midtrans Transaksi --}}
        <form id="payment-form">
            @csrf
            {{-- <label for="gross_amount">Gross Amount:</label> --}}
            <input type="hidden" value="123123" id="gross_amount" name="gross_amount" readonly>

            {{-- <label for="first_name">First Name:</label> --}}
            <input type="hidden" id="first_name" name="first_name" value="john" required>
            <input type="hidden" id="last_name" name="last_name" value="johnlast" required>
            <input type="hidden" id="email" name="email" value="johnlast@gmail.com" required>
            <input type="hidden" id="phone" name="phone" value="504968787" required>
          

        <!-- Total dan Checkout -->
        <div class="mt-6 flex flex-col sm:flex-row justify-end items-center space-y-4 sm:space-y-0">
            <div class="tombol">
                <a href="/"
                    class="bg-gray-700 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-gray-800 transition mr-2">Kembali</a>
                <button href="#" type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition">Checkout</button>
            </div>
        </div>

        </form>
        
        

        {{-- <form id="payment-form">
            @csrf
            <label for="gross_amount">Gross Amount:</label>
            <input type="number" value="{{ $totalPrice }}" id="gross_amount" name="gross_amount" readonly>

            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="John" required>
          
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="Doe" required>
          
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="johndoe@example.com" required>
          
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="08123456789" required>
          
            <button type="submit">Pay Now</button>
          </form> --}}
        
        
        
        
    </section>
    
    
<script>
    fetch('/payment/notification', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken, // CSRF token jika diperlukan
    },
    body: JSON.stringify({
        // Data yang dikirim ke server (jika ada)
    })
})
.then(response => response.json())
.then(data => {
    // Log ke console setelah menerima respons dari server
    console.log("Midtrans Notification:", data.message); // Output: Notification received
})
.catch(error => {
    console.error('Error:', error);
});

</script>
    <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>

        <script type="text/javascript">
            document.querySelector('#payment-form').addEventListener('submit', function(event) {
                event.preventDefault(); 
          
                let csrfToken = document.querySelector('input[name="_token"]').value;
          
                fetch('/payment', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken, 
                    },
                    body: JSON.stringify({
                        gross_amount: document.querySelector('#gross_amount').value,
                        first_name: document.querySelector('#first_name').value,
                        last_name: document.querySelector('#last_name').value,
                        email: document.querySelector('#email').value,
                        phone: document.querySelector('#phone').value,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.snap_token) {
          
                        snap.pay(data.snap_token, {
                            onSuccess: function(result) {
                                console.log('Payment Success:', result);
                                alert('Payment Success! Transaction ID: ' + result.transaction_id);
                            },
                            onPending: function(result) {
                                console.log('Payment Pending:', result);
                                alert('Payment Pending! Please complete the payment.');
                            },
                            onError: function(result) {
                                console.error('Payment Error:', result);
                                alert('Payment Error! Please try again.');
                            },
                            onClose: function() {
                                console.log('Payment popup closed.');
                                alert('You closed the payment popup.');
                            }
                        });
                    } else {
                        alert('Failed to retrieve Snap Token');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while processing the payment.');
                });
            });
          </script>
        
    

</body>
