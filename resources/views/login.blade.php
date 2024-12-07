<x-header>Login</x-header>

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
                <form action="#" method="POST" class="space-y-6" autocomplete="off">

                    <div class="relative">
                        <label for="loginEmail" class="block text-sm font-medium text-gray-700">Email:</label>
                        <input type="email" id="loginEmail" name="email"
                            class="mt-1 block w-full pl-10 pr-4 py-2 border rounded-md shadow-sm bg-white text-black"
                            placeholder="Masukkan Email">

                        <i class="fas fa-envelope absolute left-3 top-2/3 transform -translate-y-1/2 text-gray-500"></i>
                    </div>

                    <!-- Input Password -->
                    <div class="relative">
                        <label for="loginPassword" class="block text-sm font-medium text-gray-700">Password:</label>
                        <input type="password" id="loginPassword" name="password"
                            class="mt-1 block w-full pl-10 pr-4 py-2 border rounded-md shadow-sm text-black bg-white"
                            placeholder="Masukkan Password" required>

                        <i class="fas fa-lock absolute left-3 top-2/3 transform -translate-y-1/2 text-gray-500"></i>
                    </div>


                    <button type="submit"
                        class="w-full py-3 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Login</button>
                    <!-- Opsi Login dengan Facebook dan Google -->
                    <div class="flex items-center space-x-4 mt-2">
                        <!-- Login with Facebook -->
                        <a href="#"
                            class="w-full flex items-center justify-center py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            <i class="fab fa-facebook-f mr-2"></i> Login dengan Facebook
                        </a>
                    </div>

                    <div class="flex items-center space-x-4 mt-2">
                        <!-- Login with Google -->
                        <a href="#"
                            class="w-full flex items-center justify-center py-3 bg-red-600 text-white rounded-lg hover:bg-red-700">
                            <i class="fab fa-google mr-2"></i> Login dengan Google
                        </a>
                    </div>
                </form>
                <div class="mt-2 text-center">
                    <a href="/" class="text-blue-500 hover:text-blue-700">Kembali ke Home</a>
                </div>
            </div>


            <!-- Form Register -->
            <div id="registerForm" class="form-container w-full hidden">
                <form action="#" method="POST" class="space-y-6" autocomplete="off">
                    <div class="relative">
                        <label for="fullName" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" id="fullName" name="full_name"
                            class="mt-1 block w-full pl-10 pr-4 py-2 border rounded-md shadow-sm bg-white text-black"
                            placeholder="Masukkan Nama Lengkap" required>
                        <!-- Ikon Nama -->
                        <i class="fas fa-user absolute left-3 top-2/3 transform -translate-y-1/2 text-gray-500"></i>
                    </div>
                    <div class="relative">
                        <label for="loginEmail" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="loginEmail" name="email"
                            class="mt-1 block w-full pl-10 pr-4 py-2 border rounded-md shadow-sm bg-white text-black"
                            placeholder="Masukkan Email">

                        <i class="fas fa-envelope absolute left-3 top-2/3 transform -translate-y-1/2 text-gray-500"></i>
                    </div>
                    <div class="relative">
                        <label for="loginPhone" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                        <input type="tel" id="loginPhone" name="phone"
                            class="mt-1 block w-full pl-10 pr-4 py-2 border rounded-md shadow-sm bg-white text-black"
                            placeholder="Masukkan Nomor HP" required>

                        <i
                            class="fas fa-phone-alt absolute left-3 top-2/3 transform -translate-y-1/2 text-gray-500"></i>
                    </div>
                    <div class="relative">
                        <label for="loginPassword" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="loginPassword" name="password"
                            class="mt-1 block w-full pl-10 pr-4 py-2 border rounded-md shadow-sm text-black bg-white"
                            placeholder="Masukkan Password" required>

                        <i class="fas fa-lock absolute left-3 top-2/3 transform -translate-y-1/2 text-gray-500"></i>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="relative">
                        <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Konfirmasi
                            Password</label>
                        <input type="password" id="confirmPassword" name="confirm_password"
                            class="mt-1 block w-full pl-10 pr-4 py-2 border rounded-md shadow-sm text-black bg-white"
                            placeholder="Konfirmasi Password" required>

                        <i class="fas fa-lock absolute left-3 top-2/3 transform -translate-y-1/2 text-gray-500"></i>
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
            showLoginForm();

            // Event listeners untuk tombol
            loginBtn.addEventListener("click", showLoginForm);
            registerBtn.addEventListener("click", showRegisterForm);
        });
    </script>

</body>

</html>
