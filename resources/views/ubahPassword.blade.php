<x-header>Ubah Password</x-header>

<body>
    <x-navbar :isRegistrationPage="true"></x-navbar>


    <div class="max-w-4xl mx-auto py-12 px-6 sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">

            <div class="border-t border-gray-200">
                <div class="flex justify-between items-center px-6 py-4 bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-900">Ubah Password</h3>
                </div>

                <div class="p-6 space-y-4">

                    <div class="grid grid-cols-1 gap-4">

                        {{-- Password lama --}}
                        <div class="flex items-center gap-2 -mt-3">
                            <label
                                class="input input-bordered flex items-center w-full sm:w-[50%] mt-2 -ml-1 gap-2 bg-[#282828] text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#ffffff"
                                        d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z" />
                                </svg>
                                <input type="password" class="input-field w-full" placeholder="Password Saat Ini"
                                    required>
                            </label>

                        </div>

                        {{-- Password baru --}}
                        <div class="flex items-center gap-2 mt-8">
                            <label
                                class="input input-bordered flex items-center w-full sm:w-[50%] mt-2 -ml-1 gap-2 bg-[#282828] text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#ffffff"
                                        d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z" />
                                </svg>
                                <input type="password" class="input-field w-full" placeholder="Password Baru" required>
                            </label>

                        </div>

                        {{-- Konfirmasi password --}}
                        <div class="flex items-center gap-2 mt-8">
                            <label
                                class="input input-bordered flex items-center w-full sm:w-[50%] mt-2 -ml-1 gap-2 bg-[#282828] text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#ffffff"
                                        d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z" />
                                </svg>
                                <input type="text" class="input-field w-full" placeholder="Masukkan Lagi Password"
                                    required>
                            </label>

                        </div>





                        {{-- TOMBOL --}}
                        <div class="flex justify-start flex-wrap md:justify-end gap-4 p-6">

                            <a href="/profile"
                                class="inline-block px-6 py-2 text-white bg-gray-500 hover:bg-gray-600 rounded-md">
                                Kembali
                            </a>


                            <a href="#"
                                class="inline-block px-6 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-md">
                                Ubah Password
                            </a>
                        </div>
                    </div>
                </div>
            </div>
</body>
