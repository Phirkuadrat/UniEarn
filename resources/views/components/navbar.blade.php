<nav class="bg-gradient-to-t from-white to-[#e4f8ff] shadow-md fixed w-full z-10">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-2">
                    <img src="{{ asset('assets/uniearn.png') }}" alt="" class="max-h-9 m-0 p-0">
                    <span class="ml-2 text-xl font-bold text-[#3674B5] hover:underline">uniEarn</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                <a href="{{ route('project.page') }}" class="text-gray-700 hover:text-blue-600 font-medium">Project</a>
                <a href="{{ route('portofolio.page') }}" class="text-gray-700 hover:text-blue-600 font-medium">Portofolio</a>
            </div>

            <!-- Auth Buttons / Profile Dropdown -->
            @auth
                <!-- Profile Dropdown (Tampil jika user sudah login) -->
                <div class="hidden md:flex items-center ml-4 relative">
                    <button id="profile-menu-button" class="flex items-center space-x-2 focus:outline-none">
                        <span class="text-gray-700 font-medium">{{ auth()->user()->name }}</span>
                        <!-- Foto profil atau placeholder -->
                        @if (auth()->user()->profile_photo_path)
                            <img class="h-8 w-8 rounded-full object-cover"
                                src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}" alt="Profile Photo">
                        @else
                            <div
                                class="bg-secondary border border-collapse rounded-full w-8 h-8 flex items-center justify-center">
                                <i class="fa-solid fa-user"></i>
                            </div>
                        @endif
                        <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>


                    <!-- Dropdown Menu (Hidden by default) -->
                    <div id="profile-menu"
                        class="hidden absolute right-0 mt-48 w-48 bg-white rounded-lg shadow-lg py-1 z-50 border border-collapse">
                        <a href="{{ auth()->user()->is_recruiter ? route('recruiter.dashboard') : route('seeker.dashboard') }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</a>
                        <a href="{{ route('seeker.portfolios') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Portfolios</a>
                        <a href="" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Applications</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-red-100">Logout</button>
                        </form>
                    </div>
                </div>
            @else
            <!-- Tombol Masuk/Daftar (Tampil jika user belum login) -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium">Login</a>
                <a href="{{ route('register') }}"
                    class="bg-[#3674B5] text-white px-4 py-2 rounded-lg hover:bg-[#2a5a8a] transition">Register</a>
            </div>
            @endauth

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-700 hover:text-blue-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-white shadow-lg">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="/"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Home</a>
            <a href="{{ route('project.page') }}"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Project</a>
            <a href="{{ route('portofolio.page') }}"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Portofolio</a>

            @auth

            <!-- Menu untuk user yang sudah login (mobile) -->
            <div class="border-t border-gray-200 pt-2">
                <a href="{{ auth()->user()->is_recruiter ? route('recruiter.dashboard') : route('seeker.dashboard') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Dashboard</a>
                <a href="{{ route('profile.edit') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">My Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                        Logout
                    </button>
                </form>
            </div>
            @else
            <!-- Menu untuk user yang belum login (mobile) -->
            <div class="border-t border-gray-200 pt-2">
                <a href="{{ route('login') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Login</a>
                <a href="{{ route('register') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-white bg-[#3674B5] hover:bg-[#2a5a8a] mx-3">Register</a>
            </div>

            @endauth
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });

    // Profile dropdown toggle (hanya untuk desktop)
    const profileButton = document.getElementById('profile-menu-button');
    if (profileButton) {
        profileButton.addEventListener('click', function() {
            const menu = document.getElementById('profile-menu');
            menu.classList.toggle('hidden');
        });
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const profileButton = document.getElementById('profile-menu-button');
        const profileMenu = document.getElementById('profile-menu');

        if (profileButton && profileMenu) {
            const isClickInsideButton = profileButton.contains(event.target);
            const isClickInsideMenu = profileMenu.contains(event.target);

            if (!isClickInsideButton && !isClickInsideMenu && !profileMenu.classList.contains('hidden')) {
                profileMenu.classList.add('hidden');
            }
        }
    });
</script>
