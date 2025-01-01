<div class="mt-24">
    <footer class="bg-gray-900 text-white py-8">
        <div class="container mx-auto px-4">
            <!-- Informasi dan Penawaran -->
            <div
                class="bg-gray-700 flex flex-col sm:flex-row items-center rounded-lg p-6 sm:p-12 text-center max-w-3xl mx-auto space-y-4 sm:space-y-0">
                <h2 class="text-lg sm:text-2xl font-bold">DAPATKAN INFORMASI DAN PENAWARAN DARI KAMI</h2>
                <div class="w-full">
                    <form action="/addemail" method="post"
                        class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4">
                        @csrf
                        <div class="relative flex-grow w-full">
                            <input type="email" name="email" placeholder="Masukkan Email Anda"
                                class="bg-gray-800 text-white rounded-lg pl-12 pr-4 py-2 w-full focus:outline-none">
                            <span class="absolute left-3 top-2.5 text-gray-400">
                                <img src="{{ asset('img/email.png') }}" alt="Email Icon" class="h-5 w-7">
                            </span>
                        </div>
                        <button type="submit"
                            class="bg-gray-300 text-gray-900 font-bold px-6 py-2 rounded-lg hover:bg-gray-400 transition w-full sm:w-auto">
                            Kirim
                        </button>
                    </form>
                </div>
            </div>




            <!-- Metode Pembayaran -->
            <div class="flex flex-wrap justify-center items-center mt-8 gap-4">
                <img src="{{ asset('img/mandiri.png') }}" alt="Mandiri" class="h-24 object-contain">
                <img src="{{ asset('img/bni.png') }}" alt="BNI" class="h-24 object-contain">
                <img src="{{ asset('img/bca.png') }}" alt="BCA" class="h-24 object-contain">
                <img src="{{ asset('img/bri.png') }}" alt="BRI" class="h-24 object-contain">
                <img src="{{ asset('img/qris.png') }}" alt="QRIS" class="h-24 object-contain">
                <img src="{{ asset('img/ovo.png') }}" alt="OVO" class="h-24 object-contain">
                <img src="{{ asset('img/Dana.png') }}" alt="Dana" class="h-24 object-contain">
            </div>

            <!-- Media Sosial -->
            <div class="flex justify-center mt-4 space-x-4">
                <a href="#" class="hover:opacity-75"><img src="{{ asset('img/instagram.png') }}" alt="Instagram"
                        class="h-6 object-contain"></a>
                <a href="#" class="hover:opacity-75"><img src="{{ asset('img/x.png') }}" alt="Twitter"
                        class="h-6 object-contain"></a>
                <a href="#" class="hover:opacity-75"><img src="{{ asset('img/facebook.png') }}" alt="Facebook"
                        class="h-6 object-contain"></a>
            </div>

            <!-- Credit -->
            <div class="mt-8 text-center text-gray-400">
                Copyright © 2024 Techrent
            </div>
        </div>
    </footer>
</div>

{{-- Menampilkan popup jika ada pesan sukses --}}
@if (session('success'))
    <script>
        window.onload = function() {
            alert("{{ session('success') }}");
        };
    </script>
@endif
