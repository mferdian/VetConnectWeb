<!-- Modern Navbar -->
<nav class="sticky top-0 z-50 border-b border-gray-100 shadow-lg bg-white/95 backdrop-blur-md">
    <div class="container flex flex-wrap items-center justify-between px-6 py-4 mx-auto">
        <!-- Enhanced Logo -->
        <div class="flex items-center space-x-3">
            <div class="relative">
                <div class="absolute w-4 h-4 bg-green-400 rounded-full -top-1 -right-1 animate-pulse"></div>
            </div>
            <h1 class="text-2xl font-bold text-transparent bg-gradient-to-r from-gray-700 to-emerald-700 bg-clip-text">
                Vet<span class="text-emerald-600">Connect</span>
            </h1>
        </div>

        <!-- Mobile Menu Button -->
        <button type="button"
            class="relative p-2 ml-auto text-gray-600 transition-all duration-300 rounded-xl md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-emerald-500"
            id="menu-toggle">
            <div class="space-y-1.5">
                <span class="block w-6 h-0.5 bg-current transform transition-transform duration-300"
                    id="line1"></span>
                <span class="block w-6 h-0.5 bg-current transform transition-transform duration-300"
                    id="line2"></span>
                <span class="block w-6 h-0.5 bg-current transform transition-transform duration-300"
                    id="line3"></span>
            </div>
        </button>

        <!-- Enhanced Desktop Menu -->
        <ul class="flex-col hidden w-full mt-4 text-gray-600 md:flex md:flex-row md:w-auto md:space-x-8 md:items-center md:mt-0"
            id="menu">
            <li><a class="relative block py-2 font-medium text-gray-700 transition-all duration-300 hover:text-emerald-600 group"
                    href="{{ route('home') }}">
                    Home
                    <span
                        class="absolute bottom-0 left-0 w-0 h-0.5 bg-emerald-600 transition-all duration-300 group-hover:w-full"></span>
                </a></li>
            <li><a class="relative block py-2 font-medium text-gray-700 transition-all duration-300 hover:text-emerald-600 group"
                    href="{{ route('doctor') }}">
                    Doctors
                    <span
                        class="absolute bottom-0 left-0 w-0 h-0.5 bg-emerald-600 transition-all duration-300 group-hover:w-full"></span>
                </a></li>
            <li><a class="relative block py-2 font-medium text-gray-700 transition-all duration-300 hover:text-emerald-600 group"
                    href="{{ route('aplication') }}">
                    Aplikasi
                    <span
                        class="absolute bottom-0 left-0 w-0 h-0.5 bg-emerald-600 transition-all duration-300 group-hover:w-full"></span>
                </a></li>
            <li><a class="relative block py-2 font-medium text-gray-700 transition-all duration-300 hover:text-emerald-600 group"
                    href="{{ route('articles') }}">
                    Articles
                    <span
                        class="absolute bottom-0 left-0 w-0 h-0.5 bg-emerald-600 transition-all duration-300 group-hover:w-full"></span>
                </a></li>
        </ul>

        <!-- Enhanced Auth Section -->
        @guest
            <div class="items-center hidden gap-3 md:flex">
                <a class="px-5 py-2.5 text-sm font-medium text-emerald-700 transition-all duration-300 border-2 border-emerald-600 rounded-xl hover:bg-emerald-50 hover:shadow-md"
                    href="{{ route('login') }}">
                    Login
                </a>
                <a class="px-5 py-2.5 text-sm font-medium text-white transition-all duration-300 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-xl hover:from-emerald-700 hover:to-teal-700 hover:shadow-lg transform hover:-translate-y-0.5"
                    href="{{ route('register') }}">
                    Register
                </a>
            </div>
        @endguest

        <!-- Enhanced User Profile Section -->
        @auth
            <div class="items-center hidden space-x-4 md:flex">
                <!-- Enhanced User Dropdown -->
                <div class="relative group">
                    <button
                        class="flex items-center gap-3 px-4 py-2.5 transition-all duration-300 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md hover:border-emerald-200 group-hover:bg-gray-50">
                        <!-- Enhanced Profile Photo -->
                        <div class="relative">
                            @if (Auth::user()->profile_photo)
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo"
                                    class="object-cover w-10 h-10 rounded-xl ring-2 ring-emerald-200">
                            @else
                                <div
                                    class="flex items-center justify-center w-10 h-10 font-semibold text-white shadow-md rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @endif
                            <div
                                class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-green-400 border-2 border-white rounded-full">
                            </div>
                        </div>

                        <div class="text-left">
                            <div class="text-sm font-medium text-gray-900">{{ explode(' ', Auth::user()->name)[0] }}</div>
                            <div class="text-xs text-gray-500">Online</div>
                        </div>

                        <svg class="w-4 h-4 text-gray-400 transition-transform duration-300 group-hover:rotate-180"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <!-- Enhanced Dropdown Menu -->
                    <div
                        class="absolute right-0 invisible transition-all duration-300 transform translate-y-2 opacity-0 group-hover:visible group-hover:opacity-100 group-hover:translate-y-0 w-72">
                        <div class="mt-2 overflow-hidden bg-white border border-gray-100 shadow-xl rounded-2xl">
                            <!-- User Info Header -->
                            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-emerald-50 to-teal-50">
                                <div class="flex items-center space-x-3">
                                    @if (Auth::user()->profile_photo)
                                        <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo"
                                            class="object-cover w-12 h-12 shadow-md rounded-xl ring-2 ring-white">
                                    @else
                                        <div
                                            class="flex items-center justify-center w-12 h-12 font-semibold text-white shadow-md rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600">
                                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-semibold text-gray-900">{{ Auth::user()->name }}</div>
                                        <div class="text-sm text-gray-600">{{ Auth::user()->email }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Items -->
                            <!-- Menu Items -->
                            <div class="py-2">
                                @auth
                                    <a href="{{ route('profile') }}"
                                        class="flex items-center px-6 py-3 text-sm text-gray-700 transition-all duration-200 hover:bg-emerald-50 hover:text-emerald-700">
                                        <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        My Profile
                                    </a>
                                    <a href="{{ route('profile.edit') }}"
                                        class="flex items-center px-6 py-3 text-sm text-gray-700 transition-all duration-200 hover:bg-emerald-50 hover:text-emerald-700">
                                        <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit Profile
                                    </a>
                                    <a href="{{ route('myorder.index') }}"
                                        class="flex items-center px-6 py-3 text-sm text-gray-700 transition-all duration-200 hover:bg-emerald-50 hover:text-emerald-700">
                                        <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                        My Orders
                                    </a>
                                    <a href="{{ route('history') }}"
                                        class="flex items-center px-6 py-3 text-sm text-gray-700 transition-all duration-200 hover:bg-emerald-50 hover:text-emerald-700">
                                        <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        History
                                    </a>
                                @endauth
                            </div>


                            <!-- Logout Section -->
                            @auth
                                <div class="border-t border-gray-100">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="flex items-center w-full px-6 py-3 text-sm text-red-600 transition-all duration-200 hover:bg-red-50">
                                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            Sign Out
                                        </button>
                                    </form>
                                </div>
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        @endauth
    </div>

    <!-- Enhanced Mobile Menu -->
    <div class="hidden px-6 py-4 border-t border-gray-100 md:hidden bg-white/95 backdrop-blur-md" id="mobile-menu">
        <ul class="space-y-3">
            <li><a class="block py-2 text-gray-700 transition-colors hover:text-emerald-600"
                    href="{{ route('home') }}">Home</a></li>
            <li><a class="block py-2 text-gray-700 transition-colors hover:text-emerald-600"
                    href="{{ route('doctor') }}">Doctors</a></li>
            <li><a class="block py-2 text-gray-700 transition-colors hover:text-emerald-600"
                    href="{{ route('aplication') }}">Aplikasi</a></li>
            <li><a class="block py-2 text-gray-700 transition-colors hover:text-emerald-600"
                    href="{{ route('articles') }}">Articles</a></li>
        </ul>

        @guest
            <div class="flex flex-col gap-3 pt-4 mt-6 border-t border-gray-200">
                <a class="px-4 py-2.5 text-center text-sm font-medium text-emerald-700 border-2 border-emerald-600 rounded-xl hover:bg-emerald-50"
                    href="{{ route('login') }}">Login</a>
                <a class="px-4 py-2.5 text-center text-sm font-medium text-white bg-gradient-to-r from-emerald-600 to-teal-600 rounded-xl"
                    href="{{ route('register') }}">Get Started</a>
            </div>
        @endguest

        @auth
            <div class="pt-4 mt-6 border-t border-gray-200">
                <div class="flex items-center mb-4 space-x-3">
                    @if (Auth::user()->profile_photo)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo"
                            class="object-cover w-10 h-10 rounded-xl">
                    @else
                        <div
                            class="flex items-center justify-center w-10 h-10 font-semibold text-white rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    @endif
                    <div>
                        <div class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="space-y-2">
                    @auth
                        <a href="{{ route('profile') }}" class="block py-2 text-sm text-gray-700 hover:text-emerald-600">My
                            Profile</a>
                        <a href="{{ route('profile.edit') }}"
                            class="block py-2 text-sm text-gray-700 hover:text-emerald-600">Edit Profile</a>
                        <a href="{{ route('myorder.index') }}"
                            class="block py-2 text-sm text-gray-700 hover:text-emerald-600">My Orders</a>
                        <a href="{{ route('history') }}"
                            class="block py-2 text-sm text-gray-700 hover:text-emerald-600">History</a>

                        <form method="POST" action="{{ route('logout') }}" class="pt-2 border-t border-gray-200">
                            @csrf
                            <button type="submit" class="block w-full py-2 text-sm text-left text-red-600">Sign Out</button>
                        </form>
                    @endauth
                </div>
            </div>
        @endauth
    </div>
</nav>

<!-- Enhanced Mobile Menu Script -->
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const line1 = document.getElementById('line1');
    const line2 = document.getElementById('line2');
    const line3 = document.getElementById('line3');

    menuToggle.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');

        // Animate hamburger to X
        if (mobileMenu.classList.contains('hidden')) {
            line1.style.transform = 'rotate(0deg) translate(0, 0)';
            line2.style.opacity = '1';
            line3.style.transform = 'rotate(0deg) translate(0, 0)';
        } else {
            line1.style.transform = 'rotate(45deg) translate(6px, 6px)';
            line2.style.opacity = '0';
            line3.style.transform = 'rotate(-45deg) translate(6px, -6px)';
        }
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        if (!menuToggle.contains(event.target) && !mobileMenu.contains(event.target)) {
            mobileMenu.classList.add('hidden');
            line1.style.transform = 'rotate(0deg) translate(0, 0)';
            line2.style.opacity = '1';
            line3.style.transform = 'rotate(0deg) translate(0, 0)';
        }
    });
</script>
