<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <title>Halaman Home</title>
</head>

<body style="height: 10000px; background-color: #F9F0E6">

    {{-- Navbar --}}

    <div class="navbar bg-[#969696] h-12">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li>
                        <div class="form-control">
                            <input type="text" placeholder="Search"
                                class="input input-bordered h-8 w-40 md:w-100% bg-white" />
                        </div>
                    </li>
                    <li><a>Akun</a></li>
                    <li>
                        <a href=""></a>
                    </li>
                    <li><a>Keranjang</a></li>
                </ul>
            </div>
            <a class="btn btn-ghost text-xl"><span style="color: white; font-size: 40px">
                    Tech</span><span class="text-[#5C5570] -ml-2" style="font-size: 40px">
                    Rent</span></a>
        </div>
        <div class="navbar-center hidden lg:flex text-black">
            <ul class="menu menu-horizontal px-1">
                <li><a class="text-2xl">Kamera</a></li>
                <li>
                    <a class="text-2xl" href="">Playstation</a>
                </li>
                <li><a class="text-2xl">Speaker</a></li>
                <li><a class="text-2xl" href="">Lensa</a></li>
            </ul>
        </div>
        <div class="navbar-end hidden lg:flex">
            <div class="form-control">
                <input type="text" placeholder="Search" class="input input-bordered h-8 w-24 md:w-auto bg-white" />
            </div>
            <button class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5"
                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#FFFFFF"
                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                </svg>
            </button>
            <button class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="21"
                    viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#FFFFFF"
                        d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                </svg>
            </button>

        </div>
    </div>

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
            <div class="carousel-item">
                <img src="https://image.shutterstock.com/image-photo/camera-lens-on-black-gray-260nw-2512231733.jpg"
                    alt="Slide 1" class="w-full h-[850px] object-cover">
                <div class="absolute inset-0 flex items-center justify-start bg-black bg-opacity-50">
                    <div class="text-left text-white ml-40">
                        <h2 class="text-[40px] font-bold">Canon EOS R</h2>
                        <button class="mt-10 px-6 py-2 bg-white text-black font-semibold rounded hover:bg-gray-300">
                            Sewa Sekarang
                        </button>
                    </div>
                </div>
            </div>
            <div class="carousel-item hidden">
                <img src="https://via.placeholder.com/1920x500" alt="Slide 2" class="w-full h-[850px]">
                <div class="absolute inset-0 flex items-center justify-start bg-black bg-opacity-50">
                    <div class="text-left text-white ml-40">
                        <h2 class="text-[40px] font-bold">Nikon Z6</h2>
                        <button class="mt-10 px-6 py-2 bg-white text-black font-semibold rounded hover:bg-gray-300">
                            Sewa Sekarang
                        </button>
                    </div>
                </div>
            </div>
            <div class="carousel-item hidden">
                <img src="https://via.placeholder.com/1920x500" alt="Slide 3" class="w-full h-[850px]">
                <div class="absolute inset-0 flex items-center justify-start bg-black bg-opacity-50">
                    <div class="text-left text-white ml-40">
                        <h2 class="text-[40px] font-bold">Sony A7 III</h2>
                        <button class="mt-10 px-6 py-2 bg-white text-black font-semibold rounded hover:bg-gray-300">
                            Sewa Sekarang
                        </button>
                    </div>
                </div>
            </div>
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

            <img src="{{ asset('img/speaker.png') }}" alt="" class="h-full object-cover rounded-lg">
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
                        <img src="{{ asset('img/hand-holding.jpg') }}" alt=""
                            class="w-full h-full object-cover rounded-lg">
                    </div>
                </div>

                <div
                    class="card2 h-[300px] w-[200px] rounded-lg flex flex-col items-center mb-4 shadow-lg transform transition duration-300 hover:scale-105">
                    <div class="relative w-full h-full overflow-hidden">
                        <p class="absolute top-10 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl font-bold shadow-sm"
                            style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                            Konsol</p>
                        <img src="{{ asset('img/joystickjpg.jpg') }}" alt=""
                            class="w-full h-full object-cover rounded-lg" style="object-position: 20% 30%;">
                    </div>
                </div>

                <div
                    class="card3 h-[300px] w-[200px] rounded-lg flex flex-col items-center mb-4 shadow-lg transform transition duration-300 hover:scale-105">
                    <div class="relative w-full h-full overflow-hidden">
                        <p
                            class="absolute top-10 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl font-bold">
                            Lensa</p>
                        <img src="{{ asset('img/images.jpeg') }}" alt=""
                            class="w-full h-full object-cover rounded-lg">
                    </div>
                </div>
                <div
                    class="card4 h-[300px] w-[200px] rounded-lg flex flex-col items-center mb-4 shadow-lg transform transition duration-300 hover:scale-105">
                    <div class="relative w-full h-full overflow-hidden">
                        <p class="absolute top-10 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl font-bold "
                            style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5)";>
                            Speaker</p>
                        <img src="{{ asset('img/speaker.jpg') }}" alt=""
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
                <div class="card1 h-[400px] w-64 bg-[#C8C4CA] rounded-xl flex flex-col items-center mb-2 shadow-xl">
                    <div class="cardimg h-64 w-[90%] bg-white bg-opacity-70 mt-6 rounded-xl overflow-hidden">
                        <img src="{{ asset('img/ps5.png') }}" alt="" class="w-full h-full object-contain">
                    </div>
                    <p class="text-black text-center text-xl font-bold mt-4">PlayStation 5</p>
                    <button
                        class="mt-4 mb-4 px-6 py-2 bg-gray-200 text-black font-semibold rounded-xl shaodw-lg  hover:bg-gray-300 hover:scale-105 transform transition duration-300">
                        Sewa Sekarang
                    </button>
                </div>
                <div class="card2 h-[400px] w-64 bg-[#C8C4CA] rounded-xl flex flex-col items-center mb-2 shadow-xl">
                    <div class="cardimg h-64 w-[90%] bg-white bg-opacity-70 mt-6 rounded-xl overflow-hidden">
                        <img src="{{ asset('img/sony.png') }}" alt="" class="w-full h-full object-contain">
                    </div>
                    <p class="text-black text-center text-xl font-bold mt-4">Sony Alpha 7 Mark III</p>
                    <button
                        class="mt-4 mb-4 px-6 py-2 bg-gray-200 text-black font-semibold rounded-xl shaodw-lg  hover:bg-gray-300 hover:scale-105 transform transition duration-300">
                        Sewa Sekarang
                    </button>
                </div>
                <div class="card3 h-[400px] w-64 bg-[#C8C4CA] rounded-xl flex flex-col items-center mb-4 shadow-xl">
                    <div class="cardimg h-64 w-[90%] bg-white bg-opacity-70 mt-6 rounded-xl overflow-hidden">
                        <img src="{{ asset('img/speaker.png') }}" alt=""
                            class="w-full h-full object-contain">
                    </div>
                    <p class="text-black text-center text-xl font-bold mt-4">Polytron Paspro</p>
                    <button
                        class="mt-4 mb-4 px-6 py-2 bg-gray-200 text-black font-semibold rounded-xl shaodw-lg  hover:bg-gray-300 hover:scale-105 transform transition duration-300">
                        Sewa Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>


    </div>


    </div>

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
