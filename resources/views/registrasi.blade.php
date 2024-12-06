<!DOCTYPE html>
<html lang="en" class="bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>Registrasi</title>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white items-center">
    <x-navbar></x-navbar>

    <div class="bungkus bg-[#454545] w-full h-[650px] flex justify-center items-center mt-16">
        <!-- Logo di sebelah kiri -->
        <div class="hidden md:flex flex-col w-1/2 justify-center items-center ">
            <img src="{{ asset('img/navbar/LogoPutih.png') }}" alt="Logo Perusahaan" class="w-[40%]">
            <h1>ahmad mulia huda</h1>
        </div>

        <!-- Form Registrasi di sebelah kanan -->
        <div class="flex flex-col items-center mx-3 justify-center">
            <div class=" bg-white rounded-lg p-7 overflow-hidden w-full">
            <div class="w-full max-w-sm space-y-6">
                <div x-data="{
                    tabSelected: @if(session()->has('success')) 2 @elseif (session()->has('loginError')) 2 @else 1 @endif, //Pengecekkan jika user baru beres register maka tab berpindah ke login
                    tabId: $id('tabs'),
                    tabButtonClicked(tabButton){
                        this.tabSelected = tabButton.id.replace(this.tabId + '-', '');
                        this.tabRepositionMarker(tabButton);
                    },
                    tabRepositionMarker(tabButton){
                        this.$refs.tabMarker.style.width=tabButton.offsetWidth + 'px';
                        this.$refs.tabMarker.style.height=tabButton.offsetHeight + 'px';
                        this.$refs.tabMarker.style.left=tabButton.offsetLeft + 'px';
                    },
                    tabContentActive(tabContent){
                        return this.tabSelected == tabContent.id.replace(this.tabId + '-content-', '');
                    }
                }"
                x-init="tabRepositionMarker($refs.tabButtons.children[@if(session()->has('success')) 1 @elseif (session()->has('loginError')) 1 @else 0 @endif]);" class="relative w-full max-w-sm">
                
                    <div x-ref="tabButtons" class="relative inline-grid items-center justify-center w-full h-10 grid-cols-2 p-1 text-gray-500 bg-gray-100 rounded-lg select-none">
                        <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button" class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">Registrasi</button>
                        <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button" class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">Login</button>
                        <div x-ref="tabMarker" class="absolute left-0 z-10 w-1/2 h-full duration-300 ease-out" x-cloak><div class="w-full h-full bg-white rounded-md shadow-sm"></div></div>
                    </div>
                    <div class="relative w-full mt-2 content">
                        <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative">
                            <!-- Tab Content 1 - Account -->
                            <div class="border rounded-lg shadow-sm bg-card text-neutral-900">
                                <div class="flex flex-col space-y-1.5 p-6">
                                    <h3 class="text-lg font-semibold leading-none tracking-tight">Registrasi</h3>
                                    <p class="text-sm text-neutral-500">Lakukan Pembuatan Akun Anda Di sini</p>
                                </div>
                                <div class="p-6 pt-0 space-y-2">
                                    <form action="/registrasi" method="post">
                                    @csrf
                                        <div class="space-y-1">
                                            <label class="text-sm font-medium leading-none" for="nama">Nama</label>
                                            <input type="text" placeholder="Masukan Nama Lengkap" name="nama" id="nama" value="{{ old('nama') }}" class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 @error('nama') is-invalid @enderror" />
                                            @error('nama')
                                                <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                                            <input type="email" placeholder="Masukan Email" id="email" name="email" value="{{ old('email') }}"
                                                class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 @error('email') is-invalid @enderror">
                                            @error('email')
                                                <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                                            <input type="password" id="password" name="password" 
                                                placeholder="Password" class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 @error('password') is-invalid @enderror">
                                            @error('password')
                                                <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col sm:flex-row sm:space-x-2">
                                            <button type="Google" class="w-full  mt-2 sm:w-[50%] bg-white text-black p-3 border border-black shadow-md hover:bg-white focus:outline-none focus:ring-2 flex items-center justify-center">
                                                <img src="img/RegistrasiLogin/Google.png" alt="Icon" class="w-8 h-8 mr-1" />Google
                                            </button>
                                            <button type="Google" class="w-full mt-2 sm:w-[50%] bg-white text-black p-3 ml-0 sm:ml-2 border border-black shadow-md hover:bg-white focus:outline-none focus:ring-2 flex items-center justify-center">
                                                <img src="img/RegistrasiLogin/Facebook.png" alt="Icon" class="w-8 h-8 mr-1" />Facebook
                                            </button>
                                        </div>
                                    
                                        <button type="submit"
                                        class="w-[40%] my-5 bg-blue-500 text-white p-3 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Daftar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative" x-cloak>
                            <!-- Tab Content 2 - Password -->
                            
                            <div class="border rounded-lg shadow-sm p-12 bg-card text-neutral-900">

                                @if(session()->has('success'))
                                <div class="mb-4 text-sm text-green-800 rounded-lg dark:text-green-400" role="alert">
                                    <span class="font-medium">{{ session('success') }}
                                </div>
                                @endif

                                @if(session()->has('loginError'))
                                <div class="mb-4 text-sm text-red-800 rounded-lg dark:text-red-400" role="alert">
                                    <span class="font-medium">{{ session('loginError') }}
                                </div>
                                @endif

                                <form action="/login" method="post">
                                @csrf
                                    <div class="flex  flex-col space-y-1.5">
                                        <h3 class="text-lg font-semibold leading-none tracking-tight">Login</h3>
                                        <p class="text-sm text-neutral-500">Masukan Akun Email Anda Disini</p>
                                    </div>
                                    <div class=" space-y-2">
                                        <div class="space-y-1"><label class="text-sm font-medium leading-none" for="email">Email</label><input type="email" placeholder="Masukan Akun Email" name="email" id="email" class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400  @error('email') is-invalid @enderror" value="{{ old('email') }}" required/></div>
                                        @error('email')
                                            <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                        <div class="space-y-1"><label class="text-sm font-medium leading-none" for="password">Password</label><input type="password" placeholder="Password" name="password" id="password" class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 @error('password') is-invalid @enderror" required/></div>
                                        @error('password')
                                            <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="flex items-center">
                                        <button type="submit" class="w-[40%] my-2 bg-blue-500 text-white p-3 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Masuk</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer class="w-full"></x-footer>

</body>

</html>
