<x-header>auth</x-header>

<body class="bg-white items-center">
    <x-navbar :isRegistrationPage="true"></x-navbar>

    <div class="bungkus bg-[#454545] w-full h-[700px] flex justify-center items-center mt-16">
        <!-- Logo di sebelah kiri -->
        <div class="hidden md:flex flex-col w-1/2 justify-center items-center ">
            <img src="{{ asset('img/navbar/LogoPutih.png') }}" alt="Logo Perusahaan" class="w-[40%]">
            <h1>Teknologi Canggih, Harga Terjangkau,
                Sewa Sekarang!</h1>
        </div>

        <!-- Form Registrasi di sebelah kanan -->
        <div
            class="flex flex-col w-full md:w-1/2 items-center justify-center px-4 py-6 bg-white rounded-lg shadow-md mr-6 md:mr-0 max-w-md">

            <div class="flex justify-around w-[80%] mb-6 space-x-4">
                <button id="loginBtn"
                    class="btn btn-outline btn-primary w-1/2 py-2 text-lg font-semibold text-blue-500 hover:bg-blue-100 rounded-lg focus:outline-none">
                    Login
                </button>
                <button id="registerBtn"
                    class="btn btn-outline btn-primary w-1/2 py-2 text-lg font-semibold text-blue-500 hover:bg-blue-100 rounded-lg focus:outline-none">
                    Daftar
                </button>
            </div>


            <!-- Form Login -->
            <div id="loginForm" class="form-container w-full">
                <div class="flex justify-center items-center">
                    @if (session()->has('success'))
                        <div class="mb-4 text-sm text-green-800 rounded-lg dark:text-green-400" role="alert"><span
                                class="font-medium">{{ session('success') }}</div>
                    @endif
                    @if (session()->has('loginError'))
                        <div class="mb-4 text-sm text-red-800 rounded-lg dark:text-red-400" role="alert"><span
                                class="font-medium">{{ session('loginError') }}</div>
                    @endif
                    @if (session()->has('emailTerdaftar'))
                        <div class="mb-4 text-sm text-red-800 rounded-lg dark:text-red-400" role="alert"><span
                                class="font-medium">{{ session('emailTerdaftar') }}</div>
                    @endif
                </div>

                <form action="{{ route('login') }}" method="POST" class="space-y-6" autocomplete="off">
                    @csrf
                    <div class="relative">
                        <label for="loginEmail" class="block text-sm font-medium text-gray-700">Email:</label>
                        <input type="text" id="loginEmail" name="email" novalidate
                            class="mt-1 block w-full pl-10 pr-4 py-2 border rounded-md shadow-sm bg-white text-black"
                            placeholder="Masukkan Email" novalidate>

                        <i class="fas fa-envelope absolute left-3 top-2/3 transform -translate-y-1/2 text-gray-500"></i>
                    </div>

                    <!-- Input Password -->
                    <div class="relative">
                        <label for="loginPassword" class="block text-sm font-medium text-gray-700">Password:</label>
                        <input type="password" id="loginPassword" name="password"
                            class="input-password mt-1 block w-full pl-10 pr-4 py-2 border rounded-md shadow-sm text-black bg-white"
                            placeholder="Masukkan Password" required>

                        <i class="fas fa-lock absolute left-3 top-2/3 transform -translate-y-1/2 text-gray-500"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor"
                            class="icon-show hidden w-8 absolute right-3 top-2/3 transform -translate-y-1/2 cursor-pointer text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor"
                            class="icon-hide w-8 absolute right-3 top-2/3 transform -translate-y-1/2 cursor-pointer text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>

                    </div>

                    {{-- lupa password --}}
                    <div class="text-center">
                        <a href="/lupaPassword" class="text-blue-500 hover:text-blue-700">Lupa password ? klik
                            disini</a>
                    </div>

                    <button type="submit"
                        class="w-full py-3 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Login</button>

                    <h2 class="flex justify-center text-black">Atau login dengan</h2>

                    <!-- Opsi Login dengan Facebook dan Google -->
                    <div class="flex justify-center items-center space-x-4 mt-2">
                        <!-- Login with Facebook -->
                        <a href="{{ route('auth.redirection', 'facebook') }}" class="text-blue-600 hover:text-blue-700">
                            <i class="fab fa-facebook-f text-2xl"></i>
                        </a>
                        <!-- Login with Google -->
                        <a href="{{ route('auth.redirection', 'google') }}" class="text-red-600 hover:text-red-700">
                            <i class="fab fa-google text-2xl"></i>
                        </a>

                        <!-- Login with X -->
                        <a href="auth/redirection/twitter" class="text-gray-600 hover:text-blue-700">
                            <i class="fab fa-twitter text-2xl"></i>
                        </a>
                        <!-- Login dengan GitHub -->
                        <a href="{{ route('auth.redirection', 'github') }}" class="text-gray-600 hover:text-black">
                            <i class="fab fa-github text-2xl"></i>
                        </a>
                    </div>
                </form>
                <div class="mt-2 text-center">
                    <a href="/" class="text-blue-500 hover:text-blue-700">Kembali ke Home</a>
                </div>
            </div>


            <!-- Form Register -->
            <div id="registerForm" class="form-container w-full hidden">
                <form action="{{ route('register') }}" method="POST" class="space-y-6" autocomplete="off">
                    @csrf
                    <div class="relative">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama"
                            class="mt-1 block w-full pl-10 pr-4 py-2 border rounded-md shadow-sm bg-white text-black"
                            placeholder="Masukkan Nama Lengkap" value="{{ old('nama') }}">
                        <!-- Ikon Nama -->
                        <i class="fas fa-user absolute left-3 top-2/3 transform -translate-y-1/2 text-gray-500"></i>
                        @error('nama')
                            <p class="absolute text-sm text-red-500 mt-1 mb-4 left-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative">
                        <label for="loginEmail" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="loginEmail" name="email"
                            class="mt-1 block w-full pl-10 pr-4 py-2 border rounded-md shadow-sm bg-white text-black"
                            placeholder="Masukkan Email" value="{{ old('email') }}">

                        <i
                            class="fas fa-envelope absolute left-3 top-2/3 transform -translate-y-1/2 text-gray-500"></i>
                        @error('email')
                            <p class="absolute text-sm text-red-500 mt-1 mb-4 left-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative">
                        <label for="loginPhone" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                        <input type="tel" id="loginPhone" name="phone"
                            class="mt-1 block w-full pl-10 pr-4 py-2 border rounded-md shadow-sm bg-white text-black"
                            placeholder="Masukkan Nomor HP" value="{{ old('phone') }}">

                        <i
                            class="fas fa-phone-alt absolute left-3 top-2/3 transform -translate-y-1/2 text-gray-500"></i>
                        @error('phone')
                            <p class="absolute text-sm text-red-500 mt-1 mb-4 left-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative">
                        <label for="loginPassword" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="loginPassword" name="password"
                            class="input-password mt-1 block w-full pl-10 pr-4 py-2 border rounded-md shadow-sm text-black bg-white"
                            placeholder="Masukkan Password">

                        <i class="fas fa-lock absolute left-3 top-2/3 transform -translate-y-1/2 text-gray-500"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor"
                            class="icon-show hidden w-8 absolute right-3 top-2/3 transform -translate-y-1/2 cursor-pointer text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor"
                            class="icon-hide w-8 absolute right-3 top-2/3 transform -translate-y-1/2 cursor-pointer text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                        @error('password')
                            <p class="absolute text-sm text-red-500 mt-1 mb-4 left-0">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="relative">
                        <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Konfirmasi
                            Password</label>
                        <input type="password" id="confirmPassword" name="confirm_password"
                            class="input-password mt-1 block w-full pl-10 pr-4 py-2 border rounded-md shadow-sm text-black bg-white"
                            placeholder="Konfirmasi Password">

                        <i class="fas fa-lock absolute left-3 top-2/3 transform -translate-y-1/2 text-gray-500"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor"
                            class="icon-show hidden w-8 absolute right-3 top-2/3 transform -translate-y-1/2 cursor-pointer text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor"
                            class="icon-hide w-8 absolute right-3 top-2/3 transform -translate-y-1/2 cursor-pointer text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                        @error('confirm_password')
                            <p class="absolute text-sm text-red-500 mt-1 mb-4 left-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full py-3 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Daftar</button>

                </form>
                <div class="mt-4 text-center">
                    <a href="/" class="text-blue-500 hover:text-blue-700">Kembali ke Home</a>
                </div>
            </div>

        </div>

    </div>

    <x-footer class="w-full"></x-footer>
    <script>
        const iconShow = document.querySelectorAll('.icon-show');
        const iconHide = document.querySelectorAll('.icon-hide');
        const inputPassword = document.querySelectorAll('.input-password');

        for (let i = 0; i < iconShow.length; i++) {
            iconShow[i].addEventListener('click', function() {
                iconShow[i].classList.add('hidden');
                iconHide[i].classList.remove('hidden');
                inputPassword[i].type = 'password';
            });
        }

        for (let i = 0; i < iconHide.length; i++) {
            iconHide[i].addEventListener('click', function() {
                iconHide[i].classList.add('hidden');
                iconShow[i].classList.remove('hidden');
                inputPassword[i].type = 'text';
            })
        }
        document.addEventListener("DOMContentLoaded", function() {
            // Menampilkan form login secara default
            const loginForm = document.getElementById("loginForm");
            const registerForm = document.getElementById("registerForm");

            // Tombol navigasi
            const loginBtn = document.getElementById("loginBtn");
            const registerBtn = document.getElementById("registerBtn");

            // Fungsi untuk menampilkan form login
            function showLoginForm() {
                loginForm.classList.remove("hidden");
                registerForm.classList.add("hidden");
            }

            // Fungsi untuk menampilkan form registrasi
            function showRegisterForm() {
                registerForm.classList.remove("hidden");
                loginForm.classList.add("hidden");
            }

            // Set default form yang tampil adalah login

            // showLoginForm();
            var sessionSuccess = @json(session()->has('registrasiError'));

            if (sessionSuccess) {
                // Menjalankan showLoginForm jika session success ada
                showRegisterForm();
            } else {
                showLoginForm();
            }


            // Event listeners untuk tombol
            loginBtn.addEventListener("click", showLoginForm);
            registerBtn.addEventListener("click", showRegisterForm);
        });
    </script>

    {{-- @if (session()->has('registrasiError'))
    <script>
        showRegisterForm();
    </script>
    @else
    <script>
        showLoginForm();
    </script>
    @endif --}}


</body>

</html>
