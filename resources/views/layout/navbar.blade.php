<nav id="mainNavbar"
    class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-6 py-3 rounded-lg shadow-sm transition-all duration-500 bg-[#FFF8F0]/90 backdrop-blur-sm">
    <!-- KIRI: Logo -->
    <div class="flex items-center p-2 space-x-2 border rounded-lg bg-[#FDFDFD]/90 shadow-sm transition-all duration-500">
        <img src="/logo/logo-wed-nobg.png" alt="Logo" class="w-auto h-10">
    </div>

    <!-- TENGAH: Menu -->
    <div class="flex space-x-2 text-sm font-semibold text-[#4A4A4A]">
        <a href="{{ route('landing') }}#home"
            class="relative overflow-hidden rounded-lg inline-flex items-center px-5 py-2.5 transition-all duration-300
                text-[#4A4A4A] bg-[#FDFDFD]/90 hover:bg-[#F8E9DF]">
            Home
        </a>

        <a href="#"
            class="relative overflow-hidden rounded-lg inline-flex items-center px-5 py-2.5 transition-all duration-300
                text-[#4A4A4A] bg-[#FDFDFD]/90 hover:bg-[#F8E9DF]">
            Invitation
        </a>

        {{-- Tombol Undangan Digital --}}
        <div class="relative">
            <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
                type="button"
                class="inline-flex items-center px-5 py-2.5 text-sm font-medium rounded-lg transition-all duration-300
                    {{ Request::is('undangan*') ? 'text-white bg-[#EEC9B7] shadow-sm' : 'text-[#4A4A4A] bg-[#FDFDFD] hover:bg-[#F8E9DF]' }}">
                Undangan Digital
                <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>

            <div id="dropdownHover" class="z-10 hidden bg-[#FDFDFD] divide-y divide-gray-100 rounded-lg shadow w-44">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownHoverButton">
                    <li>
                        @guest
                            <!-- Jika BELUM login -->
                            <a href="{{ url('/login') }}"
                                class="block px-4 py-2 hover:bg-[#F8E9DF] hover:text-[#4A4A4A]">Wedding</a>
                            </a>
                        @endguest

                        @auth
                            <!-- Jika SUDAH login -->
                            <a href="{{ route('clientWed.index') }}"
                                class="block px-4 py-2 hover:bg-[#F8E9DF] hover:text-[#4A4A4A]">Wedding</a>
                            </a>
                        @endauth

                        {{-- <a href="{{ route('clientWed.index') }}"
                            class="block px-4 py-2 hover:bg-[#F8E9DF] hover:text-[#4A4A4A]">Wedding</a> --}}
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- KANAN: Tombol Login -->
    <div>
        @guest
            <!-- Jika BELUM login -->
            <a href="{{ url('/login') }}"
                class="flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-[#4A4A4A] bg-[#FDFDFD]/90 rounded-lg hover:bg-[#F8E9DF] focus:outline-none focus:ring-2 focus:ring-[#EEC9B7]">
                <i class="fa-solid fa-user text-[#4A4A4A]"></i>
                <span>Login</span>
            </a>
        @endguest

        @auth
            <!-- Jika SUDAH login -->
            <div class="relative inline-block text-left">
                <!-- Tombol Dropdown -->
                <button id="userMenuButton"
                    class="flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-[#4A4A4A] bg-[#FDFDFD]/90 rounded-lg hover:bg-[#F8E9DF] focus:outline-none focus:ring-2 focus:ring-[#EEC9B7]">
                    <i class="fa-solid fa-user-check text-[#4A4A4A]"></i>
                    <span>{{ Auth::user()->name }}</span>
                    <i class="text-xs fa-solid fa-chevron-down"></i>
                </button>

                <!-- Menu Dropdown -->
                <div id="userDropdown"
                    class="absolute right-0 hidden w-40 mt-2 bg-white border border-gray-100 rounded-lg shadow-md">
                    <a href="{{ url('/settings') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#F8E9DF] rounded-t-lg">
                        <i class="mr-2 fa-solid fa-gear"></i>Setting
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-[#F8E9DF] rounded-b-lg">
                            <i class="mr-2 fa-solid fa-right-from-bracket"></i>Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Script Dropdown -->
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const userMenuButton = document.getElementById('userMenuButton');
                    const userDropdown = document.getElementById('userDropdown');

                    userMenuButton.addEventListener('click', () => {
                        userDropdown.classList.toggle('hidden');
                    });

                    // Klik di luar dropdown -> tutup
                    document.addEventListener('click', (e) => {
                        if (!userMenuButton.contains(e.target) && !userDropdown.contains(e.target)) {
                            userDropdown.classList.add('hidden');
                        }
                    });
                });
            </script>
        @endauth
    </div>



</nav>
