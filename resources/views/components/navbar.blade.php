@if ($isRegistrationPage)
    <div class="navbar bg-[#B4BEC9] h-12 w-full fixed top-0 left-0 z-10">
        <div class="navbar-start">
            <a href="/"><img src="{{ asset('img/navbar/LogoPutih.png') }}" class="max-h-20 h-auto w-auto hidden sm:block"
                    alt=""></a>
        </div>
    </div>
@else
    <div class="navbar bg-[#282828] h-12">
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
            <a ><img src="{{ asset('img/navbar/LogoPutih.png') }}" class="max-h-20 h-auto w-auto " alt=""></a>
        </div>
        <div class="navbar-center hidden lg:flex text-black">
            <ul class="menu menu-horizontal px-1">
                <li><a class="text-xl text-white font-bold">KAMERA</a></li>
                <li>
                    <a class="text-xl text-white font-bold" href="">PLAYSTATION</a>
                </li>
                <li><a class="text-xl text-white font-bold" href="">SPEAKER</a></li>
                <li><a class="text-xl text-white font-bold" href="">LENSA</a></li>
            </ul>
        </div>
        <div class="navbar-end hidden lg:flex">
            <div class="form-control">
                <input type="text" placeholder="Search" class="input input-bordered h-8 w-24 md:w-auto bg-white" />
            </div>
            <a class="btn btn-ghost btn-circle ml-5">
               <img src="{{ asset ('img/navbar/keranjang.png') }}" class="max-h-20 h-auto w-auto" alt="">
            </a>
            <a class="btn btn-ghost btn-circle" href="registrasi">
                <img src="{{asset('img/navbar/profile.png') }}" class="max-h-20 h-auto w-auto" alt="">
            </a>

        </div>
    </div>
@endif
