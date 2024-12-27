<x-header>Ubah Password</x-header>

<body>
    <x-navbar :isRegistrationPage="true"></x-navbar>


    <div class="max-w-4xl mx-auto py-12 px-6 sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">

            <div class="border-t border-gray-200">
                <div class="flex justify-between items-center px-6 py-4 bg-[#282828]">
                    <h3 class="text-lg font-semibold text-white">Ubah Password</h3>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="p-6 space-y-4">

                    <div class="grid grid-cols-1 gap-4">

                        <form action="/updateLupaPassword" method="post">
                            @csrf
                            <input type="hidden" name="email" value="{{ session('email') }}">
                            {{-- Password baru --}}
                            <div class="mb-4">
                                <label for="newpassword" class="block text-sm font-medium text-gray-700 mb-1">Password
                                    Baru</label>
                                <div class="relative">
                                    <!-- Ikon Kunci -->
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                            viewBox="0 0 448 512">
                                            <path fill="#000000"
                                                d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z" />
                                        </svg>
                                    </span>
                                    <!-- Input -->
                                    <input type="password" id="newpassword" name="newpassword"
                                        class="mt-1 block sm:w-[40%] pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-600 focus:border-blue-600 text-black"
                                        placeholder="Password Baru" required>
                                </div>
                            </div>


                            {{-- Konfirmasi password --}}
                            <div class="mb-4">
                                <label for="confirm_newpassword"
                                    class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                                <div class="relative">
                                    <!-- Ikon Kunci -->
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                            viewBox="0 0 448 512">
                                            <path fill="#000000"
                                                d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z" />
                                        </svg>
                                    </span>
                                    <!-- Input -->
                                    <input type="password" id="confirm_newpassword" name="confirm_newpassword"
                                        class="mt-1 block sm:w-[40%] pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-600 focus:border-blue-600 text-black"
                                        placeholder="Masukkan Lagi Password" required>
                                </div>
                            </div>


                            {{-- TOMBOL --}}
                            <div class="flex justify-start flex-wrap md:justify-end gap-4 p-6">

                                <a href="/lupaPassword"
                                    class="inline-block px-6 py-2 text-white bg-gray-500 hover:bg-gray-600 rounded-md">
                                    Kembali
                                </a>


                                <button href="#" type="submit"
                                    class="inline-block px-6 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-md">
                                    Ubah Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</body>
