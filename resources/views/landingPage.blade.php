<x-landing-layout>

    <body class="bg-white text-gray-800 scroll-smooth">

        <!-- Header -->
        <x-navbar></x-navbar>

        <!-- Hero Section (Modifikasi) -->
        <section style="background-image: url('{{ asset('images/fotoHero.webp') }}')"
            class="bg-cover bg-center py-32 flex items-center h-screen">
            <div class="container mx-auto px-4 text-center md:text-right">
                <div class="bg-white bg-opacity-80 rounded-xl shadow-md text-clip px-8 py-14 inline-block max-w-4xl">
                    <h1 class="text-3xl md:text-5xl font-bold text-[#3674B5] mb-2">uniEarn akan membantumu</h1>
                    <h1 class="text-4xl md:text-6xl font-bold text-black mb-2">Selamat Datang Seeker</h1>
                    <p class="text-xl md:text-2xl text-gray-700 mb-8">kembangkan potensimu dengan kami.</p>

                    <div class="bg-transparent rounded-xl p-1">
                        <div class="flex flex-col md:flex-row gap-2">
                            <input type="text" placeholder="Posisi/Jurusan"
                                class="flex-1 px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500">

                            <select class="px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option>Lokasi</option>
                                <option>Jakarta</option>
                                <option>Bandung</option>
                                <option>Surabaya</option>
                                <option>Remote</option>
                            </select>

                            <select class="px-6 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option>Jenis Pekerjaan</option>
                                <option>Magang</option>
                                <option>Part-time</option>
                                <option>Freelance</option>
                                <option>Proyek</option>
                            </select>

                            <button
                                class="bg-[#3674B5] text-white px-6 py-3 rounded-lg justify-between hover:bg-[#2a5a8a] transition">
                                Cari Lowongan
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>

                    {{-- <div class="mt-6 flex flex-wrap justify-center md:justify-end gap-4">
                        <button
                            class="bg-white border border-[#3674B5] text-[#3674B5] px-6 py-2 rounded-lg hover:bg-blue-50">
                            Upload CV
                        </button>
                        <button class="bg-[#FF9E1B] text-white px-6 py-2 rounded-lg hover:bg-[#e08a15]">
                            Daftar Sekarang
                        </button>
                    </div> --}}
                </div>
            </div>
        </section>

        <!-- Kategori Pekerjaan -->
        <section class="py-16 bg-[#FCFEFC]">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-4">Temukan Bidang Kerja Populer</h2>
                <p class="text-gray-600 text-center mb-12 max-w-2xl mx-auto">Pilih bidang pekerjaan yang sesuai dengan
                    kebutuhan dan jadwal kuliahmu</p>

                <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                    <!-- Developer -->
                    <div
                        class="bg-white rounded-xl shadow-lg text-center hover:shadow-xl transition cursor-pointer hover:scale-105 duration-300">
                        <img src="{{ asset('images/bidang1.webp') }}" class="w-full h-40 object-cover rounded-t-lg"
                            alt="">
                        <div class="py-6">
                            <h3 class="font-semibold text-lg">Software Developer</h3>
                            <p class="text-sm text-gray-500 mt-1">Front-end Developer, Back-end Developer, Full-stack
                                Developer</p>
                        </div>
                    </div>
                    <!-- Desain -->
                    <div
                        class="bg-white rounded-xl shadow-lg text-center hover:shadow-xl transition cursor-pointer hover:scale-105 duration-300">
                        <img src="{{ asset('images/bidang2.webp') }}" class="w-full h-40 object-cover rounded-t-lg"
                            alt="">
                        <div class="py-6">
                            <h3 class="font-semibold text-lg">Desain & Kreatif</h3>
                            <p class="text-sm text-gray-500 mt-1">UI/UX Designer, Graphic Designer,Illustrator</p>
                        </div>
                    </div>
                    <!-- Marketing -->
                    <div
                        class="bg-white rounded-xl shadow-lg text-center hover:shadow-xl transition cursor-pointer hover:scale-105 duration-300">
                        <img src="{{ asset('images/bidang3.webp') }}" class="w-full h-40 object-cover rounded-t-lg"
                            alt="">
                        <div class="py-6">
                            <h3 class="font-semibold text-lg">Pemasaran & Komunikasi</h3>
                            <p class="text-sm text-gray-500 mt-1">Digital Marketing, Social Media Specialist, SEO
                                Specialist</p>
                        </div>
                    </div>
                    <!-- Data analis -->
                    <div
                        class="bg-white rounded-xl shadow-lg text-center hover:shadow-xl transition cursor-pointer hover:scale-105 duration-300">
                        <img src="{{ asset('images/bidang3.webp') }}" class="w-full h-40 object-cover rounded-t-lg"
                            alt="">
                        <div class="py-6">
                            <h3 class="font-semibold text-lg">Data & Analisis</h3>
                            <p class="text-sm text-gray-500 mt-1">Data Analyst, Data Scientist, Business Intelligence
                            </p>
                        </div>
                    </div>
                    <!-- Manajemen -->
                    <div
                        class="bg-white rounded-xl shadow-lg text-center hover:shadow-xl transition cursor-pointer hover:scale-105 duration-300">
                        <img src="{{ asset('images/bidang3.webp') }}" class="w-full h-40 object-cover rounded-t-lg"
                            alt="">
                        <div class="py-6">
                            <h3 class="font-semibold text-lg">Bisnis & Manajemen</h3>
                            <p class="text-sm text-gray-500 mt-1">Business Development, Project Management, Human
                                Resources (HR)</p>
                        </div>
                    </div>
                    <!-- Pendidikan -->
                    <div
                        class="bg-white rounded-xl shadow-lg text-center hover:shadow-xl transition cursor-pointer hover:scale-105 duration-300">
                        <img src="{{ asset('images/bidang3.webp') }}" class="w-full h-40 object-cover rounded-t-lg"
                            alt="">
                        <div class="py-6">
                            <h3 class="font-semibold text-lg">Pendidikan & Pelatihan</h3>
                            <p class="text-sm text-gray-500 mt-1">Tutor / Pengajar Online, Content Creator Edukasi,
                                Mentor Bootcamp</p>
                        </div>
                    </div>
                    <!-- UMKM -->
                    <div
                        class="bg-white rounded-xl shadow-lg text-center hover:shadow-xl transition cursor-pointer hover:scale-105 duration-300">
                        <img src="{{ asset('images/bidang3.webp') }}" class="w-full h-40 object-cover rounded-t-lg"
                            alt="">
                        <div class="py-6">
                            <h3 class="font-semibold text-lg">E-commerce & UMKM</h3>
                            <p class="text-sm text-gray-500 mt-1">Admin Toko Online, Marketplace Specialist, Customer
                                Service</p>
                        </div>
                    </div>
                    <!-- Teknik -->
                    <div
                        class="bg-white rounded-xl shadow-lg text-center hover:shadow-xl transition cursor-pointer hover:scale-105 duration-300">
                        <img src="{{ asset('images/bidang3.webp') }}" class="w-full h-40 object-cover rounded-t-lg"
                            alt="">
                        <div class="py-6">
                            <h3 class="font-semibold text-lg">Teknik & Engineering</h3>
                            <p class="text-sm text-gray-500 mt-1">Mechanical Engineer, Electrical Engineer, Civil
                                Engineer</p>
                        </div>
                    </div>
                    <!-- Pertanian -->
                    <div
                        class="bg-white rounded-xl shadow-lg text-center hover:shadow-xl transition cursor-pointer hover:scale-105 duration-300">
                        <img src="{{ asset('images/bidang3.webp') }}" class="w-full h-40 object-cover rounded-t-lg"
                            alt="">
                        <div class="py-6">
                            <h3 class="font-semibold text-lg">Lingkungan & Pertanian</h3>
                            <p class="text-sm text-gray-500 mt-1">Agribisnis, Ahli Lingkungan, Teknologi Pangan</p>
                        </div>
                    </div>
                    <!-- Sains -->
                    <div
                        class="bg-white rounded-xl shadow-lg text-center hover:shadow-xl transition cursor-pointer hover:scale-105 duration-300">
                        <img src="{{ asset('images/bidang3.webp') }}" class="w-full h-40 object-cover rounded-t-lg"
                            alt="">
                        <div class="py-6">
                            <h3 class="font-semibold text-lg">Kesehatan & Sains</h3>
                            <p class="text-sm text-gray-500 mt-1">Analis Kesehatan, Asisten Apoteker, Peneliti Lab</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Kategori Pekerjaan -->
        <section class="py-16 bg-[#F2FAFC]">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-4">Temukan Berdasarkan Kategori</h2>
                <p class="text-gray-600 text-center mb-12 max-w-2xl mx-auto">Pilih jenis pekerjaan yang sesuai dengan
                    kebutuhan dan jadwal kuliahmu</p>

                <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                    <!-- Magang -->
                    <div
                        class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition cursor-pointer">
                        <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg">Magang</h3>
                        <p class="text-sm text-gray-500 mt-1">120+ Lowongan</p>
                    </div>

                    <!-- Part-Time -->
                    <div
                        class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition cursor-pointer">
                        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg">Part-Time</h3>
                        <p class="text-sm text-gray-500 mt-1">85+ Lowongan</p>
                    </div>

                    <!-- Freelance -->
                    <div
                        class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition cursor-pointer">
                        <div
                            class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg">Freelance</h3>
                        <p class="text-sm text-gray-500 mt-1">64+ Proyek</p>
                    </div>

                    <!-- Beasiswa -->
                    <div
                        class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition cursor-pointer">
                        <div
                            class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg">Beasiswa</h3>
                        <p class="text-sm text-gray-500 mt-1">32+ Program</p>
                    </div>

                    <!-- Volunteer -->
                    <div
                        class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition cursor-pointer">
                        <div class="bg-pink-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg">Volunteer</h3>
                        <p class="text-sm text-gray-500 mt-1">28+ Kegiatan</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Lowongan Rekomendasi -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h2 class="text-3xl font-bold">Rekomendasi untuk Kamu</h2>
                        <p class="text-gray-600">Lowongan yang cocok dengan jurusan dan minatmu</p>
                    </div>
                    <a href="#" class="text-blue-600 font-semibold hover:underline">Lihat Semua</a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Lowongan 1 -->
                    <div
                        class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-bold text-xl">Web Developer Magang</h3>
                                    <p class="text-gray-600">PT. Tech Innovasi</p>
                                </div>
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fa-solid fa-building fa-2xl text-[#7a7f81]"></i>
                                </div>
                                {{-- <img src="{{ asset('images/company-logo1.png') }}" alt="Company Logo"
                                    class="w-12 h-12 object-contain"> --}}
                            </div>

                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">Magang</span>
                                <span class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full">IT</span>
                                <span
                                    class="bg-purple-100 text-purple-800 text-xs px-3 py-1 rounded-full">Remote</span>
                            </div>

                            <div class="mt-4 space-y-2">
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    <span>Rp3-4jt/bulan</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>Jakarta</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span>Deadline: 30 Juni 2023</span>
                                </div>
                            </div>

                            <div class="mt-6 flex justify-between items-center">
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">
                                    Lamar Sekarang
                                </button>
                                <button class="text-gray-500 hover:text-blue-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Lowongan 2 -->
                    <div
                        class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-bold text-xl">Web Developer Magang</h3>
                                    <p class="text-gray-600">PT. Tech Innovasi</p>
                                </div>
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fa-solid fa-building fa-2xl text-[#7a7f81]"></i>
                                </div>
                                {{-- atau --}}
                                {{-- <img src="{{ asset('images/company-logo1.png') }}" alt="Company Logo"
                                    class="w-12 h-12 object-contain"> --}}
                            </div>

                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">Magang</span>
                                <span class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full">IT</span>
                                <span
                                    class="bg-purple-100 text-purple-800 text-xs px-3 py-1 rounded-full">Remote</span>
                            </div>

                            <div class="mt-4 space-y-2">
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    <span>Rp3-4jt/bulan</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>Jakarta</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span>Deadline: 30 Juni 2023</span>
                                </div>
                            </div>

                            <div class="mt-6 flex justify-between items-center">
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">
                                    Lamar Sekarang
                                </button>
                                <button class="text-gray-500 hover:text-blue-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Lowongan 3 -->
                    <div
                        class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-bold text-xl">Web Developer Magang</h3>
                                    <p class="text-gray-600">PT. Tech Innovasi</p>
                                </div>
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fa-solid fa-building fa-2xl text-[#7a7f81]"></i>
                                </div>
                                {{-- <img src="{{ asset('images/company-logo1.png') }}" alt="Company Logo"
                                    class="w-12 h-12 object-contain"> --}}
                            </div>

                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">Magang</span>
                                <span class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full">IT</span>
                                <span
                                    class="bg-purple-100 text-purple-800 text-xs px-3 py-1 rounded-full">Remote</span>
                            </div>

                            <div class="mt-4 space-y-2">
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    <span>Rp3-4jt/bulan</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>Jakarta</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span>Deadline: 30 Juni 2023</span>
                                </div>
                            </div>

                            <div class="mt-6 flex justify-between items-center">
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">
                                    Lamar Sekarang
                                </button>
                                <button class="text-gray-500 hover:text-blue-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Perusahaan Mitra -->
        <section class="py-16 bg-[#F2FAFC]">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold mb-4">Perusahaan Mitra Kami</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">Perusahaan-perusahaan yang aktif merekrut mahasiswa
                        melalui platform kami</p>
                </div>

                <div class="xl:px-96">
                    <div class="grid grid-cols-2 md:grid-cols-7 gap-3 md:gap-2 sm:gap-5 items-center ">

                        <div class="flex justify-center p-0">
                            <img src="{{ asset('assets/Google.svg') }}" alt="Gojek"
                                class="max-w-full max-h-16 object-contain p-0">
                        </div>

                        <!-- Gojek - Versi yang diperbaiki -->
                        <div class="flex justify-center p-0">
                            <img src="{{ asset('assets/Gojek.svg') }}" alt="Gojek"
                                class="max-w-full max-h-16 object-contain p-0">
                        </div>

                        <!-- Perusahaan lain -->
                        <div class="flex justify-center">
                            <i class="fa-brands fa-microsoft fa-2xl text-4xl text-blue-600"></i>
                        </div>

                        <div class="flex justify-center">
                            <i class="fa-brands fa-apple fa-2xl text-4xl text-gray-800"></i>
                        </div>

                        <div class="flex justify-center">
                            <i class="fa-brands fa-amazon fa-2xl text-4xl text-yellow-600"></i>
                        </div>

                        <div class="flex justify-center p-0">
                            <img src="{{ asset('assets/Sinarmas.svg') }}" alt="Gojek"
                                class="max-w-full max-h-16 object-contain p-0">
                        </div>

                        <div class="flex justify-center p-0">
                            <img src="{{ asset('assets/Samsung.svg') }}" alt="Gojek"
                                class="max-w-full max-h-16 object-contain p-0">
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonial Mahasiswa -->
        <section class="py-16 bg-gradient-to-r from-indigo-50 to-blue-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold mb-4">Kisah Sukses Mahasiswa</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">Pengalaman langsung dari mahasiswa yang telah
                        mendapatkan pekerjaan melalui platform kami</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Testimonial 1 -->
                    <div class="bg-white rounded-xl shadow-lg p-6 relative">
                        <div
                            class="absolute -top-4 left-6 bg-blue-500 text-white w-8 h-8 rounded-full flex items-center justify-center">
                            <i class="fa-regular fa-comment"></i>
                        </div>
                        <div class="flex items-center mb-4">
                            <img src="{{ asset('images/bidang3.webp') }}" alt="Student"
                                class="w-12 h-12 rounded-full object-cover">
                            <div class="ml-4">
                                <h4 class="font-semibold">Ani Wijaya</h4>
                                <p class="text-sm text-gray-600">Teknik Informatika - Universitas Indonesia</p>
                            </div>
                        </div>
                        <p class="text-gray-700 italic">
                            "Magang di Gojek sebagai Frontend Developer membantu saya menerapkan ilmu kampus
                            di dunia nyata. Timnya sangat supportive untuk mahasiswa!"
                        </p>
                        <div class="mt-4 flex text-yellow-400">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="bg-white rounded-xl shadow-lg p-6 relative">
                        <div
                            class="absolute -top-4 left-6 bg-blue-500 text-white w-8 h-8 rounded-full flex items-center justify-center">
                            <i class="fa-regular fa-comment"></i>
                        </div>
                        <div class="flex items-center mb-4">
                            {{-- <img src="{{ asset('images/bidang1.webp') }}" alt="Student"
                                class="w-12 h-12 rounded-full object-cover"> --}}
                            {{-- atau --}}
                            <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-user fa-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold">Ade Hermawan Saputra</h4>
                                <p class="text-sm text-gray-600">Teknik Mesin - Universitas Terbuka</p>
                            </div>
                        </div>
                        <p class="text-gray-700 italic">
                            "Magang di Sinarmas sebagai Mechine Engiener membantu saya menerapkan ilmu kampus
                            di dunia nyata. Timnya sangat supportive untuk mahasiswa!"
                        </p>
                        <div class="mt-4 flex text-yellow-400">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Final CTA -->
        <section class="py-16 bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
            <div class="container mx-auto px-4 text-center">
                <h3 class="text-3xl md:text-4xl font-bold mb-4">Siap Memulai Karir Pertamamu?</h3>
                <p class="text-xl mb-8 max-w-2xl mx-auto">Daftar sekarang dan dapatkan rekomendasi lowongan personal!
                </p>

                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <button
                        class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition text-lg">
                        Daftar Gratis
                    </button>
                    {{-- <button
                        class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition text-lg">
                        Download Aplikasi
                    </button> --}}
                </div>

                <div class="mt-8 flex flex-wrap justify-center gap-4 text-blue-200">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>Gratis untuk Mahasiswa</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>Proses Lamar 1-Klik</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>Notifikasi Lowongan Instan</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <x-footer></x-footer>


        <script>
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });

            // Add event listener to the navbar links
            const navbarLinks = document.querySelectorAll('.navbar a');
            navbarLinks.forEach(link => {
                link.addEventListener('click', () => {
                    navbarLinks.forEach(navLink => navLink.classList.remove('active'));
                    link.classList.add('active');
                });
            });
        </script>

    </body>

</x-landing-layout>
