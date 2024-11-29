<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">

    <title>Halaman Home</title>
</head>

<body style="height: 10000px; background-color: #ECEEFF">

    {{-- Navbar --}}

    <div class="navbar bg-[#4A628A]">
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
                    <li><a>Item 1</a></li>
                    <li>
                        <a>Parent</a>
                        <ul class="p-2">
                            <li><a>Submenu 1</a></li>
                            <li><a>Submenu 2</a></li>
                        </ul>
                    </li>
                    <li><a>Item 3</a></li>
                </ul>
            </div>
            <a class="btn btn-ghost text-xl">daisyUI</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a>Kamera</a></li>
                <li>
                    <a href="">Playstation</a>
                </li>
                <li><a>Speaker</a></li>
                <li><a href="">Lensa</a></li>
            </ul>
        </div>
        <div class="navbar-end">
            <button class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
            <button class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="badge badge-xs badge-primary indicator-item"></span>
                </div>
            </button>
        </div>
    </div>


    <!-- Carousel -->
    <div class="relative w-full">
        <div class="carousell">
            <div class="carousel-item">
                <img src="https://image.shutterstock.com/image-photo/camera-lens-on-black-gray-260nw-2512231733.jpg"
                    alt="Slide 1" class="w-full h-[500px] object-cover">
                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="text-center text-white">
                        <h2 class="text-3xl font-bold">Canon EOS R</h2>
                        <button class="mt-4 px-6 py-2 bg-white text-black font-semibold rounded hover:bg-gray-300">
                            Sewa Sekarang
                        </button>
                    </div>
                </div>
            </div>
            <div class="carousel-item hidden">
                <img src="https://via.placeholder.com/1920x500" alt="Slide 2" class="w-full h-auto">
                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="text-center text-white">
                        <h2 class="text-3xl font-bold">Nikon Z6</h2>
                        <button class="mt-4 px-6 py-2 bg-white text-black font-semibold rounded hover:bg-gray-300">
                            Sewa Sekarang
                        </button>
                    </div>
                </div>
            </div>
            <div class="carousel-item hidden">
                <img src="https://via.placeholder.com/1920x500" alt="Slide 3" class="w-full h-auto">
                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="text-center text-white">
                        <h2 class="text-3xl font-bold">Sony A7 III</h2>
                        <button class="mt-4 px-6 py-2 bg-white text-black font-semibold rounded hover:bg-gray-300">
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
        <div class="w-[1000px] h-[300px] bg-[#4A628A] text-white flex items-center justify-evenly mt-8"
            style="box-shadow: 6px 6px gray">
            <div class="kata w-[400px]">
                <p class="text-4xl text-center font-bold">Dapatkan Teknologi Terbaru Tanpa Membeli</p>
            </div>

            <img src="{{ asset('img/speaker.png') }}" alt="" class="h-full object-cover rounded-lg">
        </div>
    </div>

    {{-- Barang unggulan --}}
    <div class="flex justify-center items-center">
        <div class="barang ml-20 mt-20 w-[80%]">
            <p class="font-bold text-4xl text-black">Barang Unggulan</p>
            <hr style="border: 0.3px solid #9397B4; margin-top: 10px;">

            <div class="cards flex flex-wrap justify-around space-x-4 mt-5">
                <div class="card1 h-[400px] w-64 bg-[#7AB2D3] rounded-lg flex flex-col items-center mb-4 shadow-lg">
                    <div class="cardimg h-64 w-[90%] bg-[#4A628A] mt-6 rounded-xl overflow-hidden">
                        <img src="{{ asset('img/ps5.png') }}" alt="" class="w-full h-full object-contain">
                    </div>
                    <p class="text-black text-center text-xl font-bold mt-4">PlayStation 5</p>
                    <button
                        class="mt-4 px-6 py-2 bg-gray-200 text-black font-semibold rounded-xl shaodw-lg  hover:bg-gray-300 transition duration-300">
                        Sewa Sekarang
                    </button>
                </div>

                <div class="card2 h-[400px] w-64 bg-[#7AB2D3] rounded-lg flex flex-col items-center mb-4 shadow-lg">
                    <div class="cardimg h-64 w-[90%] bg-[#4A628A] mt-6 rounded-xl overflow-hidden">
                        <img src="{{ asset('img/sony.png') }}" alt="" class="w-full h-full object-contain">
                    </div>
                    <p class="text-black text-center text-xl font-bold mt-4">Sony Alpha 7 Mark III</p>
                    <button
                        class="mt-4 px-6 py-2 bg-gray-200 text-black font-semibold rounded-xl shadow-lg hover:bg-gray-300 transition duration-300">
                        Sewa Sekarang
                    </button>
                </div>
                <div class="card3 h-[400px] w-64 bg-[#7AB2D3] rounded-lg flex flex-col items-center mb-4 shadow-lg">
                    <div class="cardimg h-64 w-[90%] bg-[#4A628A] mt-6 rounded-xl overflow-hidden">
                        <img src="{{ asset('img/speaker.png') }}" alt=""
                            class="w-full h-full object-contain">
                    </div>
                    <p class="text-black text-center text-xl font-bold mt-4">Polytron Paspro</p>
                    <a href="#"
                        class="mt-4 px-6 py-2 bg-gray-200 text-black font-semibold rounded-xl shadow-lg hover:bg-gray-300 transition duration-300 text-center inline-block">
                        Sewa Sekarang
                    </a>
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
