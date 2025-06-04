{{-- <div>
    <header class="bg-[#1892C8] backdrop-blur-md text-white py-3 text-xl shadow-2xl">
        <div class="mx-14 px-4 py-4 flex justify-between align-middle items-center-safe">
            <a href="{{ route('landing') }}" class="flex items-center">
                <h1 class="text-4xl font-extrabold hover:underline hover:underline-offset-1">uniEarn</h1>
            </a>
            <nav class="space-x-5 flex items-center justify-center font-semibold">


                <a href="" class="hover:text-2xl hover:text-cyan-200">Jadi Rekruter</a>
                <a href="#tentang" class="hover:text-2xl hover:text-cyan-200">Tentang Kami</a>
                {{-- <a href="" class="hover:underline hover:text-2xl hover:text-cyan-200">Overview</a> --}}
                <a href="{{ route('seekerPage') }}" class="hover:text-2xl hover:text-cyan-200">Jadi Seeker</a>
                <a href="{{ route('recuiterPage') }}" class="hover:text-2xl hover:text-cyan-200">Jadi Rekruter</a>
                <a href="" class="hover:text-2xl hover:text-cyan-200">Tentang Kami</a>

                <a href="{{ route('login') }}" class="hover:text-2xl hover:text-cyan-300">Login to Join</a>
            </nav>
        </div>
    </header>
</div> --}}

<nav class="bg-gradient-to-t from-white to-[#e4f8ff] shadow-md fixed w-full z-10">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="flex items-center">
                    <svg class="h-8 w-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                    </svg>
                    <span class="ml-2 text-xl font-bold text-[#3674B5]">uniEarn</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-gray-700 hover:text-blue-600 font-medium">Beranda</a>
                <a href="#lowongan" class="text-gray-700 hover:text-blue-600 font-medium">Lowongan</a>
                <a href="#event" class="text-gray-700 hover:text-blue-600 font-medium">Event</a>
                <a href="#tips" class="text-gray-700 hover:text-blue-600 font-medium">Tips Karir</a>
                <a href="#perusahaan" class="text-gray-700 hover:text-blue-600 font-medium">Perusahaan</a>
            </div>

            <!-- Auth Buttons -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium">Masuk</a>
                <a href="{{ route('register') }}" class="bg-[#3674B5] text-white px-4 py-2 rounded-lg hover:bg-[#2a5a8a] transition">Daftar</a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-700 hover:text-blue-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-white shadow-lg">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Beranda</a>
            <a href="#lowongan" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Lowongan</a>
            <a href="#event" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Event</a>
            <a href="#tips" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Tips Karir</a>
            <a href="#perusahaan" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Perusahaan</a>
            <div class="border-t border-gray-200 pt-2">
                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Masuk</a>
                <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-[#3674B5] hover:bg-[#2a5a8a] mx-3">Daftar</a>
            </div>
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
