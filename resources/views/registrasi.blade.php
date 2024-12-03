<!DOCTYPE html>
<html lang="en" class="bg-white">

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
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <title>Registrasi</title>
</head>

<body class="bg-white h-screen flex items-center justify-center pt-16">
    <x-navbar :isRegistrationPage="true"></x-navbar>

    <div
        class="bungkus bg-[#B4BEC9] w-full md:w-[1200px] h-auto md:h-[700px] rounded-xl flex justify-center items-center">
        <div class="flex flex-col md:flex-row bg-white rounded-lg overflow-hidden w-full max-w-5xl">
            <!-- Logo di sebelah kiri -->
            <div class="w-full md:w-1/2 bg-[#B4BEC9] block items-center justify-start p-8"
                style="margin-left: -30px flex-direction: column; align-items: flex-start;">
                <img src="{{ asset('img/navbar/Logo.png') }}" alt="Logo Perusahaan" class="max-w-full max-h-full">
                <!-- Kalimat tambahan di bawah gambar -->
                <div class="text-center mt-4 text-lg font-semibold text-gray-700">
                    Teknologi Canggih, Harga Terjangkau, <br>
                    Sewa Sekarang!
                </div>
            </div>


            <!-- Form Registrasi di sebelah kanan -->
            <div class="w-full md:w-1/2 p-6 flex items-center justify-center">
                <div class="w-full max-w-sm space-y-6">
                    <h2 class="text-3xl font-semibold text-gray-800 text-center">Registrasi</h2>
                    <form action="#" method="POST" class="space-y-4">
                        <div class="relative">
                            <label for="nama" class="block text-sm font-medium text-black">Nama</label>
                            <input type="text" id="nama" name="nama" placeholder="Full Name" required
                                class="w-full p-3 pl-10 border text-black border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                            <span class="absolute left-3 top-[65%] transform -translate-y-1/2 text-gray-400">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        <div class="relative">
                            <label for="email" class="block text-sm font-medium text-black">Email</label>
                            <input type="email" id="email" name="email" required placeholder="Email"
                                class="w-full p-3 pl-10 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-black">
                            <span class="absolute left-3 top-[65%] transform -translate-y-1/2 text-gray-400">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>

                        <div class="relative">
                            <label for="phone" class="block text-sm font-medium text-black">Nomor HP</label>
                            <input type="tel" id="phone" name="phone" required placeholder="Nomor HP"
                                class="w-full p-3 pl-10 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-black">
                            <span class="absolute left-3 top-[65%] transform -translate-y-1/2 text-gray-400">
                                <i class="fas fa-phone-alt"></i>
                            </span>
                        </div>

                        <div class="relative">
                            <label for="password" class="block text-sm font-medium text-black">Password</label>
                            <input type="password" id="password" name="password" required placeholder="Password"
                                class="w-full p-3 pl-10 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-black">
                            <span class="absolute left-3 top-[65%] transform -translate-y-1/2 text-gray-400">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>

                        <div class="relative">
                            <label for="confirmpassword" class="block text-sm font-medium text-black">Ulangi
                                Password</label>
                            <input type="password" id="confirmpassword" name="confirmpassword" required
                                placeholder="Ulangi Password"
                                class="w-full p-3 pl-10 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-black">
                            <span class="absolute left-3 top-[65%] transform -translate-y-1/2 text-gray-400">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-500 text-white p-3 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Daftar</button>
                    </form>
                    <div class="text-center mt-4">
                        <p class="text-sm text-gray-600">Sudah punya akun?</p>
                        <div class="flex justify-center space-x-4">
                            <!-- Link ke halaman login -->
                            <a href="/login" class="text-blue-500 hover:underline">Masuk ke Akun</a>
                            <!-- Link ke halaman utama -->
                            <a href="/" class="text-blue-500 hover:underline">Kembali ke Beranda</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>




</body>



</html>
