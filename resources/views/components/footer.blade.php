<div class="mt-24">
    <footer class="bg-gray-900 text-white py-8">
        <div class="container mx-auto px-4">
            <!-- Informasi dan Penawaran -->
            <div class="bg-gray-700 flex rounded-lg p-12 text-center max-w-3xl mx-auto">
                <h2 class="text-2xl font-bold mb-4">DAPATKAN INFORMASI DAN PENAWARAN DARI KAMI</h2>
                <div class="flex justify-center items-center space-x-2">
                    <div class="relative w-64">
                        <input type="email" placeholder=" Masukkan Email Anda "
                            class="bg-gray-800 text-white rounded-lg pl-10 pr-4 py-2 w-full focus:outline-none">
                        <span class="absolute left-3 top-2.5 text-gray-400">
                            <img src="{{ asset('img/email.png') }}" alt="BNI" class="h-5">
                        </span>
                    </div>
                    <button
                        class="bg-gray-300 text-gray-900 font-bold px-6 py-2 rounded-lg hover:bg-gray-400 transition">Kirim</button>
                </div>
            </div>

            <!-- Metode Pembayaran -->
            <div class="flex flex-wrap justify-center items-center mt-8 gap-4">
                <img src="{{ asset('img/mandiri.png') }}" alt="Mandiri" class="h-24">
                <img src="{{ asset('img/Bni.png') }}" alt="BNI" class="h-24">
                <img src="{{ asset('img/bca.png') }}" alt="BCA" class="h-24">
                <img src="{{ asset('img/Bri.png') }}" alt="BRI" class="h-24">
                <img src="{{ asset('img/dana.jpg') }}" alt="DANA" class="w-24 h-[70px] rounded-lg">
                <img src="{{ asset('img/QRIS.png') }}" alt="QRIS" class="h-10">
                <img src="{{ asset('img/ovo.jpg') }}" alt="OVO" class="w-24 h-[70px] rounded-lg">
            </div>

            <!-- Media Sosial -->
            <div class="flex justify-center mt-4 space-x-4">
                <a href="#" class="hover:opacity-75"><img src="{{ asset('img/Intagram.png') }}" alt="Instagram"
                        class="h-6"></a>
                <a href="#" class="hover:opacity-75"><img src="{{ asset('img/x.png') }}" alt="Twitter"
                        class="h-6"></a>
                <a href="#" class="hover:opacity-75"><img src="{{ asset('img/Facebook.png') }}" alt="Facebook"
                        class="h-6"></a>
            </div>

            <!-- Credit -->
            <div class="mt-8 text-center text-gray-400">
                © 2024 Electrorent squad
            </div>
        </div>
    </footer>

</div>
