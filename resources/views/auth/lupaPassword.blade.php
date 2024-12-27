<x-header>Lupa Password</x-header>

<body>
    <x-navbar :isRegistrationPage="true"></x-navbar>

    <div class="max-w-4xl mx-auto py-12 px-6 sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">

            <div class="border-b border-gray-200">
                <div class="px-6 py-4 bg-[#282828] text-white">
                    <h3 class="text-lg font-semibold">Lupa Password</h3>
                </div>

                <div class="p-6 flex justify-start">
                    <div class="w-full sm:w-[50%]">
                        @if (session('success'))
                            <div class="alert alert-success bg-green-100 text-green-700 rounded-md p-3 mb-4">
                                {{ session('success') }}</div>
                        @endif
                        @if (session('otpSalah'))
                            <div class="alert alert-danger bg-red-100 text-red-700 rounded-md p-3 mb-4">
                                {{ session('otpSalah') }}</div>
                        @endif

                        <form action="{{ route('send.otp') }}" method="POST" class="mb-6">
                            @csrf
                            <div class="mb-4">
                                <label for="email"
                                    class="form-label block text-sm font-medium text-gray-700">Masukkan Email</label>
                                <div class="relative">
                                    <!-- Ikon Email -->
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                            viewBox="0 0 512 512">
                                            <path fill="#282828"
                                                d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                                        </svg>
                                    </span>
                                    <!-- Input -->
                                    <input value="{{ old('email') }}" type="email"
                                        class="form-control mt-1 block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-600 focus:border-blue-600 text-black"
                                        id="email" name="email" required>
                                </div>
                            </div>

                            <button type="submit"
                                class="sm:w-[30%] bg-blue-600 text-white font-medium py-2 px-4 rounded-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue focus:ring-offset-2">Kirim
                                OTP</button>
                        </form>

                        <form action="{{ route('verify.otp') }}" method="POST" class="mt-3">
                            @csrf
                            <div class="mb-4">
                                <label for="otp" class="form-label block text-sm font-medium text-gray-700">Kode
                                    OTP</label>
                                <input type="text"
                                    class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-600 focus:border-blue-600 text-black"
                                    id="otp" name="otp" required>

                            </div>
                            <input type="hidden" name="email" value="{{ old('email') }}">
                            <button type="submit"
                                class="w-full bg-blue-600 text-white font-medium py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 sm:w-[40%]">Verifikasi
                                OTP</button>
                        </form>
                    </div>

                    {{-- Password baru --}}
                    {{-- <div class="flex items-center gap-2 mt-8">
                            <label
                                class="input input-bordered flex items-center w-full sm:w-[50%] mt-2 -ml-1 gap-2 bg-[#282828] text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#ffffff"
                                        d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z" />
                                </svg>
                                <input type="password" class="input-field w-full" placeholder="Password Baru" id="newpassword" name="newpassword" required>
                            </label>

                        </div> --}}

                    {{-- Konfirmasi password --}}
                    {{-- <div class="flex items-center gap-2 mt-8">
                            <label
                                class="input input-bordered flex items-center w-full sm:w-[50%] mt-2 -ml-1 gap-2 bg-[#282828] text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#ffffff"
                                        d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z" />
                                </svg>
                                <input type="text" class="input-field w-full" placeholder="Masukkan Lagi Password"
                                id="confirm_newpassword" name="confirm_newpassword" required>
                            </label>

                        </div> --}}





                    {{-- TOMBOL --}}
                    <div class="flex justify-start flex-wrap md:justify-end gap-4 p-6">

                        {{-- <a href="/profile"
                                class="inline-block px-6 py-2 text-white bg-gray-500 hover:bg-gray-600 rounded-md">
                                Kembali
                            </a> --}}



                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
