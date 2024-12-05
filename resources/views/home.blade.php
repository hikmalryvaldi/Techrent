<x-header>Halaman Home</x-header>

<body style="height: 100%; background-color: #F9F0E6">

    {{-- Navbar --}}

    <x-navbar></x-navbar>


    {{-- Promo --}}
    <div class="promo w-full bg-[#313131] py-3">
        <div class="container mx-auto text-center text-white">
            <p class="mb-1">Dapatkan diskon 20% untuk penyewaan kamera pertama Anda. Jangan lewatkan kesempatan ini!
            </p>
        </div>


    </div>

    <!-- Carousel -->
    <div class="relative w-full">
        <div class="carousell">
            @foreach ($carousels as $carousel)
                <div class="carousel-item">
                    <img src="{{ $carousel->image_path }}" alt="Slide 1" class="w-full h-[850px] object-cover">
                    <div class="absolute inset-0 flex items-center justify-start bg-black bg-opacity-50">
                        <div class="text-left text-white ml-40">
                            <h2 class="text-[40px] font-bold">{{ $carousel->product_name }}</h2>
                            <button class="mt-10 px-6 py-2 bg-white text-black font-semibold rounded hover:bg-gray-300">
                                Sewa Sekarang
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

    <br><br>

    <!-- Persegi Panjang -->

    <div class="flex-grow flex items-center justify-center">
        <div class="w-[1000px] h-[300px] bg-[#637188] text-white flex items-center justify-evenly mt-10"
            style="box-shadow: 6px 6px gray">
            <div class="kata w-[400px]">
                <p class="text-4xl text-center font-bold">Dapatkan Teknologi Terbaru Tanpa Membeli</p>
            </div>
            <img src="{{ asset('img/halamanhome/promo/speaker.png') }}" alt=""
                class="h-full object-cover rounded-lg">
        </div>
    </div>


    {{-- Kategori --}}
    <div class="flex justify-center items-center">
        <div class="barang mt-20 w-[1000px]">
            <p class="font-bold text-center text-4xl text-black">Meminjam Sesuai Kebutuhan</p>
            <div class="cards flex flex-wrap justify-around space-x-4 mt-10">

                <div
                    class="card1 h-[300px] w-[200px] rounded-lg flex flex-col items-center mb-4 shadow-lg transform transition duration-300 hover:scale-105">
                    <div class="relative w-full h-full overflow-hidden">
                        <p
                            class="absolute top-10 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl font-bold">
                            Kamera</p>
                        <img src="{{ asset('img/halamanhome/kategori/hand-holding.jpg') }}" alt=""
                            class="w-full h-full object-cover rounded-lg">
                    </div>
                </div>

                <div
                    class="card2 h-[300px] w-[200px] rounded-lg flex flex-col items-center mb-4 shadow-lg transform transition duration-300 hover:scale-105">
                    <div class="relative w-full h-full overflow-hidden">
                        <p class="absolute top-10 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl font-bold shadow-sm"
                            style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                            Konsol</p>
                        <img src="{{ asset('img/halamanhome/kategori/joystickjpg.jpg') }}" alt=""
                            class="w-full h-full object-cover rounded-lg" style="object-position: 20% 30%;">
                    </div>
                </div>

                <div
                    class="card3 h-[300px] w-[200px] rounded-lg flex flex-col items-center mb-4 shadow-lg transform transition duration-300 hover:scale-105">
                    <div class="relative w-full h-full overflow-hidden">
                        <p
                            class="absolute top-10 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl font-bold">
                            Lensa</p>
                        <img src="{{ asset('img/halamanhome/kategori/images.jpeg') }}" alt=""
                            class="w-full h-full object-cover rounded-lg">
                    </div>
                </div>
                <div
                    class="card4 h-[300px] w-[200px] rounded-lg flex flex-col items-center mb-4 shadow-lg transform transition duration-300 hover:scale-105">
                    <div class="relative w-full h-full overflow-hidden">
                        <p class="absolute top-10 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl font-bold "
                            style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5)";>
                            Speaker</p>
                        <img src="{{ asset('img/halamanhome/kategori/speaker.jpg') }}" alt=""
                            class="w-full h-full object-cover rounded-lg">
                    </div>
                </div>




            </div>
        </div>
    </div>

    {{-- Barang unggulan --}}
    <div class="flex justify-center items-center">
        <div class="barang mt-40 w-[80%]">

            <p class="font-bold text-center text-4xl text-black">Barang Unggulan</p>

            <div class="cards flex flex-wrap justify-center gap-[110px] mt-10">
                @foreach ($topProduct->slice(0, 3) as $product)
                    <div class="card1 h-[400px] w-64 bg-[#C8C4CA] rounded-xl flex flex-col items-center mb-2 shadow-xl">
                        <div class="cardimg h-64 w-[90%] bg-white bg-opacity-70 mt-6 rounded-xl overflow-hidden">
                            <img src="{{ $product->image_path }}" alt="" class="w-full h-full object-contain">
                        </div>
                        <p class="text-black text-center text-xl font-bold mt-4">
                            {{ $product->product_name }}</p>
                        <button
                            class="mt-4 mb-4 px-6 py-2 bg-gray-200 text-black font-semibold rounded-xl shaodw-lg  hover:bg-gray-300 hover:scale-105 transform transition duration-300">
                            Sewa Sekarang
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
        <h1 class="font-bold text-center text-4xl text-black">Frequently asked question</h1>
        <div class=" flex justify-center mt-10">

            <div class="w-[66%] flex flex-col">
                <div class="collapse collapse-arrow bg-base-200 ">
                    <input type="checkbox" class="peer" />
                    <div class="collapse-title text-xl font-medium">Click to open this one and close others</div>
                    <div class="collapse-content peer-checked:block hidden">
                        <p>hello</p>
                    </div>
                </div>
                <div class="collapse collapse-arrow bg-base-200 mt-3">
                    <input type="checkbox" class="peer" />
                    <div class="collapse-title text-xl font-medium">Click to open this one and close others</div>
                    <div class="collapse-content peer-checked:block hidden">
                        <p>hello</p>
                    </div>
                </div>
                <div class="collapse collapse-arrow bg-base-200 mt-3">
                    <input type="checkbox" class="peer" />
                    <div class="collapse-title text-xl font-medium">Click to open this one and close others</div>
                    <div class="collapse-content peer-checked:block hidden">
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

        document.getElementById('prev').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + carouselItems.length) % carouselItems.length;
            showSlide(currentIndex);
        });

        document.getElementById('next').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % carouselItems.length;
            showSlide(currentIndex);
        });

        // Initialize carousel
        showSlide(currentIndex);
    </script>


</body>

</html>
