<!-- Overlay -->
<div id="overlay" class="fixed inset-0 z-40 hidden bg-black bg-opacity-50 md:hidden"></div>

<!-- Sidebar -->
<aside id="sidebar"
    class="justify-between text-gray-800 fixed inset-y-0 left-0 z-50 w-60 px-4 py-6 m-3 space-y-6 transition-transform duration-300 ease-in-out 
    transform -translate-x-full bg-[#1B3C53] rounded-lg md:translate-x-0 md:relative md:block">
    <div class="flex items-center justify-center p-3 bg-white border shadow-sm py- rounded-xl">
        <a href="" class="flex items-center space-x-4 group">
            <img src="img/logo-txt-removebg.png" class="transition-transform duration-300 group-hover:scale-110"
                alt="ERP Logo">
        </a>
    </div>




    <nav class="mt-10 space-y-1">
        <a href="{{ route('weituodan.index') }}"
            class="block py-2 px-4 text-md rounded-lg hover:bg-[#2d729b] text-white">
            {{-- <i class="mr-2 fa-solid fa-envelope"></i>  --}}
            Work Flow
        </a>
        <a href="{{ route('billCreateRule.index') }}"
            class="block py-2 px-4 text-md rounded-lg hover:bg-[#2d729b] text-white">
            {{-- <i class="mr-2 fa-solid fa-envelope"></i>  --}}
            Bill Create Rule
        </a>
        <a href="{{ route('billNOKey.index') }}"
            class="block py-2 px-4 text-md rounded-lg hover:bg-[#2d729b] text-white">
            {{-- <i class="mr-2 fa-solid fa-envelope"></i>  --}}
            Bill No Key
        </a>
        <a href="{{ route('cangKuJiBenXinXi.index') }}"
            class="block py-2 px-4 text-md rounded-lg hover:bg-[#2d729b] text-white">
            {{-- <i class="mr-2 fa-solid fa-envelope"></i>  --}}
            Factory Information
        </a>
        <a href="{{ route('caoZuoRiZhi.index') }}"
            class="block py-2 px-4 text-md rounded-lg hover:bg-[#2d729b] text-white">
            {{-- <i class="mr-2 fa-solid fa-envelope"></i>  --}}
            Operation Log
        </a>
        {{-- <a href="{{ route('customManage.index') }}"
            class="block py-2 px-4 text-md rounded-lg hover:bg-[#2d729b] text-white">
            Customer Management
        </a>
        <a href="{{ route('businessDetail.index') }}"
            class="block py-2 px-4 text-md rounded-lg hover:bg-[#2d729b] text-white">
            Business Management
        </a> --}}

        {{-- @auth
            <div class="px-4 py-2 mb-2">
                <i class="mr-1 fa-solid fa-user"></i> Hello, {{ Auth::user()->name }}
            </div>
            <form action="" method="POST" class="px-4">
                @csrf
                <button type="submit" class="text-red-400 hover:underline">
                    <i class="mr-1 fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        @endauth --}}
    </nav>
</aside>
