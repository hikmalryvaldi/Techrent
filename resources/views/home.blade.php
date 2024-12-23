<x-header>Halaman Home</x-header>

<body style="height: 100%; background-color: #ffff">

    {{-- Navbar --}}

    <x-navbar></x-navbar>


    {{-- Promo --}}
    <div class="promo w-full bg-[#454545] py-3">
        <div class="container mx-auto text-center text-white">
            <p class="mb-1">Promosi tersedia untuk produk Sony A7 <a class="text-[#F0F398]"> Discount 20% </a>
            </p>
        </div>


    </div>
    <!-- Carousel -->
    <div class="relative w-full">
        <div class="carousell">
            @foreach ($carousels as $carousel)
                <div class="carousel-item">
                    <img src="{{ $carousel->image_path }}" alt="Slide 1" class="w-full h-[70%] object-cover">
                    <div class="absolute inset-0 flex items-center justify-start bg-opacity-50">
                        <div class="text-left  text-white  px-4 sm:px-8 md:px-16 ml-6 sm:ml-8 md:ml-40">
                            <!-- Ukuran font akan lebih kecil di perangkat mobile -->
                            <h1 class="text-sm sm:text-lg  md:text-3xl lg:text-4xl font-bold">
                                {{ $carousel->product_name }}</h1>
                            <button
                                class="mt-4 px-8 py-2 hidden sm:block bg-white text-black font-semibold rounded hover:bg-gray-300">
                                SEWA SEKARANG
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Navigation -->
        <button id="prev"
            class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-300">
            &lt;
        </button>
        <button id="next"
            class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-300">
            &gt;
        </button>
    </div>

    <!-- Banner -->
    <div class="flex-grow flex items-center justify-center mt-12 px-2">
        <div class="relative rounded-lg overflow-hidden w-[1375px] h-[320px]">
            <!-- Gambar pertama (background) -->
            <img src="{{ asset('img/halamanhome/Banner/BgSlogan.jpg') }}" alt="Background"
                class=" object-cover w-full h-auto rounded-lg">

            <!-- Teks Overlay -->
            <div
                class="absolute top-0 inset-0 flex items-center justify-center bg-opacity-50 sm:text-white  text-black">
                <p class=" text-xs sm:text-1xl md:text-2xl lg:text-3xl font-bold text-center">Dapatkan Teknologi Terbaru
                    Tanpa Membeli</p>
            </div>
        </div>
    </div>



    <div class="flex justify-center items-center mt-16 px-2 py-5">
        <div class="flex flex-col sm:flex-row sm:space-x-4 gap-4 mx-auto justify-center items-center flex-wrap">
            <!-- Card 1 -->
            <div class="rounded-lg overflow-hidden w-full sm:w-[320px] md:w-[350px] lg:w-[680px] max-w-full">
                <div class="relative">
                    <img src="{{ asset('img/halamanhome/NewProduk/Gimbal.jpg') }}" alt="Image"
                        class="w-full h-[200px] sm:h-[250px] md:h-[320px] object-cover">
                    <div class="absolute top-0 left-0 right-0 bottom-0  opacity-50"></div>
                </div>
                <div class="p-4 text-center">
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-800 mt-5 mb-2">SONY ALPHA 6400</h1>
                    <button
                        class="btn hover:scale-105 bg-black text-white hover:bg-black hover:text-white px-8 sm:px-12 py-2 rounded-lg text-xs sm:text-sm md:text-md lg:text-lg mt-6 transition duration-300">
                        SEWA SEKARANG
                    </button>
                </div>
            </div>

            <!-- Card 2 -->
            <div
                class="rounded-lg overflow-hidden w-full sm:w-[320px] md:w-[350px] lg:w-[680px]  xl:w-[650px] 2xl:w-[680px] max-w-full">
                <div class="relative">
                    <img src="{{ asset('img/halamanhome/NewProduk/Canon.jpg') }}" alt="Image"
                        class="w-full h-[200px] sm:h-[250px] md:h-[320px] object-cover">
                    <div class="absolute top-0 left-0 right-0 bottom-0"></div>
                </div>
                <div class="p-4 text-center">
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-800 mt-5 mb-2">CANON EOS 90D</h1>
                    <button
                        class="btn hover:scale-105 bg-black text-white hover:bg-black hover:text-white px-8 sm:px-12 py-2 rounded-lg text-xs sm:text-sm md:text-md lg:text-lg mt-6 transition duration-300">
                        SEWA SEKARANG
                    </button>
                </div>
            </div>
        </div>
    </div>








    {{-- Kategori --}}
    <div class="flex justify-center items-center">
        <div class="barang mt-12 w-[94%] ">
            <p class="font-bold text-center text-4xl text-black">MEMINJAM SESUAI KEBUTUHAN</p>
            <div class="cards flex flex-wrap justify-around  mt-10">

                <div
                    class="card1 h-[300px] w-[300px] rounded-lg flex flex-col items-center mb-4 shadow-lg transform transition duration-300 hover:scale-105">
                    <div class="relative w-full h-full overflow-hidden">
                        <p
                            class="absolute top-5 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl font-bold">
                            KAMERA</p>
                        <img src="{{ asset('img/halamanhome/kategori/kamera.jpg') }}" alt=""
                            class="w-full h-full object-cover rounded-lg">
                    </div>
                </div>

                <div
                    class="card2 h-[300px] w-[300px] rounded-lg flex flex-col items-center mb-4 shadow-lg transform transition duration-300 hover:scale-105">
                    <div class="relative w-full h-full overflow-hidden">
                        <p
                            class="absolute top-5 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl font-bold">
                            LENSA</p>
                        <img src="{{ asset('img/halamanhome/kategori/Lensa.jpg') }}" alt=""
                            class="w-full h-full object-cover rounded-lg" style="object-position: 20% 30%;">
                    </div>
                </div>

                <div
                    class="card3 h-[300px] w-[300px] rounded-lg flex flex-col items-center mb-4 shadow-lg transform transition duration-300 hover:scale-105">
                    <div class="relative w-full h-full overflow-hidden">
                        <p
                            class="absolute top-5 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl font-bold">
                            CONSOL</p>
                        <img src="{{ asset('img/halamanhome/kategori/Playstation.jpg') }}" alt=""
                            class="w-full h-full object-cover rounded-lg">
                    </div>
                </div>
                <div
                    class="card4 h-[300px] w-[300px] rounded-lg flex flex-col items-center mb-4 shadow-lg transform transition duration-300 hover:scale-105">
                    <div class="relative w-full h-full overflow-hidden">
                        <p
                            class="absolute top-5 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl font-bold">
                            SPEAKER</p>
                        <img src="{{ asset('img/halamanhome/kategori/Sound.jpg') }}" alt=""
                            class="w-full h-full object-cover rounded-lg">
                    </div>
                </div>




            </div>
        </div>
    </div>

    <!-- Persegi Panjang -->

    <div class="flex-grow flex items-center justify-center mt-24 px-3">
        <div class="relative rounded-lg overflow-hidden w-[1375px] h-[320px]">
            <!-- Gambar pertama (background) -->
            <img src="{{ asset('img/BgProduk.png') }}" alt="Background" class=" object-cover rounded-lg">

            <!-- Teks Overlay -->
            <div
                class="absolute inset-0 flex flex-col items-center justify-center sm:text-white mt-8 sm:mt-0 text-black bg-opacity-50">
                <p class="text-1xl font-bold text-center">SONY ALPA + TRIPOD</p>
                <h1 class="text-5xl font-bold text-center">SAVE UP TO 30%</h1>
                <button
                    class="btn hover:scale-105 bg-white text-black hover:bg-white hover:text-black px-4 py-2 rounded-lg text-xs sm:text-sm md:text-md lg:text-lg mt-6 transition duration-300">
                    SEWA SEKARANG
                </button>
            </div>
        </div>
    </div>

    {{-- Barang unggulan --}}
    <div class="flex justify-center items-center">
        <div class="barang mt-40 w-[80%]">

            <p class="font-bold text-center text-4xl text-black">BARANG UNGGULAN</p>

            <div class="cards flex flex-wrap justify-center gap-[110px] mt-10">
                @foreach ($topProducts as $topProduct)
                    <div class="card1 h-[400px] w-64 bg-[#C8C4CA] rounded-xl flex flex-col items-center mb-2 shadow-xl">
                        <div class="cardimg h-64 w-[90%] bg-white bg-opacity-70 mt-6 rounded-xl overflow-hidden">
                            @foreach($topProduct->images as $image)
                                <img src="{{ $image->image_path1 }}" alt="Image of {{ $topProduct->name }}" class="w-full h-full object-contain">>
                            @endforeach
                        </div>
                        <p class="text-black text-center text-xl font-bold mt-4">
                            {{ $topProduct->product_name }}</p>
                        <button
                            class="mt-4 mb-4 px-6 py-2 bg-gray-200 text-black font-semibold rounded-xl shaodw-lg  hover:bg-gray-300 hover:scale-105 transform transition duration-300">
                            SEWA SEKARANG
                        </button>
                    </div>
                @endforeach
                {{-- <div class="card2 h-[400px] w-64 bg-[#C8C4CA] rounded-xl flex flex-col items-center mb-2 shadow-xl">
                    <div class="cardimg h-64 w-[90%] bg-white bg-opacity-70 mt-6 rounded-xl overflow-hidden">
                        <img src="{{ asset('img/halamanhome/barangunggulan/sony.png') }}" alt=""
                            class="w-full h-full object-contain">
                    </div>
                    <p class="text-black text-center text-xl font-bold mt-4">Sony Alpha 7 Mark III</p>
                    <button
                        class="mt-4 mb-4 px-6 py-2 bg-gray-200 text-black font-semibold rounded-xl shaodw-lg  hover:bg-gray-300 hover:scale-105 transform transition duration-300">
                        Sewa Sekarang
                    </button>
                </div>
                <div class="card3 h-[400px] w-64 bg-[#C8C4CA] rounded-xl flex flex-col items-center mb-4 shadow-xl">
                    <div class="cardimg h-64 w-[90%] bg-white bg-opacity-70 mt-6 rounded-xl overflow-hidden">
                        <img src="{{ asset('img/halamanhome/promo/speaker.png') }}" alt=""
                            class="w-full h-full object-contain">
                    </div>
                    <p class="text-black text-center text-xl font-bold mt-4">Polytron Paspro</p>
                    <button
                        class="mt-4 mb-4 px-6 py-2 bg-gray-200 text-black font-semibold rounded-xl shaodw-lg  hover:bg-gray-300 hover:scale-105 transform transition duration-300">
                        Sewa Sekarang
                    </button>
                </div> --}}
            </div>
        </div>
    </div>


    </div>


    </div>



    {{-- FAQ --}}

    <div class="mt-24">
        <h1 class="font-bold text-center text-4xl text-black">FREQUENTLY ASKED QUESTION</h1>
        <div class="flex justify-center mt-10">
            <div class="w-[66%] flex flex-col">
                <!-- Accordion Item 1 -->
                <div class="collapse collapse-arrow bg-base-200">
                    <input type="checkbox" id="collapse1" class="hidden peer" />
                    <label for="collapse1" class="collapse-title text-xl font-medium cursor-pointer">Click to open
                        this one and close others</label>
                    <div
                        class="collapse-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-96 peer-checked:overflow-auto">
                        <p>hello</p>
                    </div>
                </div>

                <!-- Accordion Item 2 -->
                <div class="collapse collapse-arrow bg-base-200 mt-3">
                    <input type="checkbox" id="collapse2" class="hidden peer" />
                    <label for="collapse2" class="collapse-title text-xl font-medium cursor-pointer">Click to open
                        this one and close others</label>
                    <div
                        class="collapse-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-96 peer-checked:overflow-auto">
                        <p>hello</p>
                    </div>
                </div>

                <!-- Accordion Item 3 -->
                <div class="collapse collapse-arrow bg-base-200 mt-3">
                    <input type="checkbox" id="collapse3" class="hidden peer" />
                    <label for="collapse3" class="collapse-title text-xl font-medium cursor-pointer">Click to open
                        this one and close others</label>
                    <div
                        class="collapse-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-96 peer-checked:overflow-auto">
                        <p>hello</p>
                    </div>
                </div>
            </div>
        </div>
    </div>






    {{-- footer --}}
    <x-footer></x-footer>


    <script>
        const carouselItems = document.querySelectorAll('.carousel-item');
        let currentIndex = 0;

        function showSlide(index) {
            carouselItems.forEach((item, i) => {
                item.classList.toggle('hidden', i !== index);
            });
        }

        // Tombol "prev" tidak akan mempengaruhi carousel, hanya dibiarkan ada
        document.getElementById('prev').addEventListener('click', () => {
            // Tidak ada perubahan posisi untuk tombol "prev"
            // Bisa mengosongkan atau melakukan logika lain jika diperlukan
        });

        // Tombol "next" akan menggeser carousel ke slide berikutnya
        document.getElementById('next').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % carouselItems.length; // Hanya maju
            showSlide(currentIndex);
        });

        // Auto-slide setiap 5 detik
        setInterval(() => {
            currentIndex = (currentIndex + 1) % carouselItems.length; // Hanya maju
            showSlide(currentIndex);
        }, 5000);

        // Inisialisasi carousel
        showSlide(currentIndex);
    </script>



</body>

</html>
