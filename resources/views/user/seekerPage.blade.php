<x-landing-layout>

    <body>
        <x-navbar></x-navbar>

        <!-- Hero Section -->
        <section
            style="background-image: url('{{ asset('images/heroforseeker.webp') }}')"
            class="bg-cover bg-center py-48 justify-start items-center flex">
            {{-- <section class="bg-[url({{asset('images/fotoHero.webp')}})] bg-cover bg-center py-48 justify-end items-center flex"> --}}
            <div
                class="mx-32 w-auto max-w-3xl text-start text-clip bg-white bg-opacity-70 rounded-lg py-9 px-8 shadow-lg">
                <h1 class="text-6xl font-bold mb-4 text-[#3674B5]">Kamu mencari kerja?</h1>
                <h2 class="text-7xl font-bold mb-4 text-black">Jadilah Seeker!</h2>
                <p class="text-4xl text-gray-600 mb-6">kembangkan potensimu dengan kami.</p>
                {{-- <button></button> --}}

            </div>
        </section>

        <!-- Fitur -->
        <section id="fitur" class="py-16 bg-[#F2FAFC]">
            <div class=" mx-auto px-4">
                <h3 class="text-3xl font-bold text-center mb-10">Siapakah Kamu?</h3>
                <div class="flex mx-56 justify-center items-center">
                    <div class="flex overflow-x-auto space-x-6 p-4 scroll-smooth snap-x snap-mandatory">
                        <div style="background-image: url('{{ asset('images/bidang1.webp') }}')"
                            class="flex justify-center items-end pb-5 bg-cover bg-center w-64 h-64 rounded-lg shadow-lg hover:scale-105 transition-transform duration-300 hover:cursor-pointer">
                            <h1 class="text-3xl font-bold text-center text-white">Programmer</h1>
                        </div>
                        <div style="background-image: url('{{ asset('images/bidang2.webp') }}')"
                            class="flex justify-center items-end pb-5 bg-cover bg-center w-64 h-64 rounded-lg shadow-lg hover:scale-105 transition-transform duration-300 hover:cursor-pointer">
                            <h1 class="text-3xl font-bold text-center text-white">Data Analyst</h1>
                        </div>
                        <div style="background-image: url('{{ asset('images/bidang3.webp') }}')"
                            class="flex justify-center items-end pb-5 bg-cover bg-center w-64 h-64 rounded-lg shadow-lg hover:scale-105 transition-transform duration-300 hover:cursor-pointer">
                            <h1 class="text-3xl font-bold text-center text-white hover:">Designer</h1>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section id="mitra" class="py-16 bg-white">
            <div class="mx-auto px-4 max-w-7xl">
                <h3 class="text-3xl font-bold text-center mb-10">Mitra Terfavorit</h3>
                <div class="flex justify-center items-center space-x-6">
                    <div class="flex flex-col min-w-48 max-w-56 h-56 bg-[#FCFEFC] px-8 py-10 rounded-sm shadow-md">
                        <div class="flex flex-row mb-4 items-center">
                            <img src="{{ asset('images/Power-BI-Logo-PNG_001.png') }}" alt="Mitra 1"
                                class="w-10 h-10 object-cover">
                            <div class="ml-4">
                                <h4 class="text-xl font-semibold">Perusahaan</h4>
                            </div>
                        </div>
                        <p class="text-gray-600 text-ellipsis ">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="flex flex-col min-w-48 max-w-56 h-56 bg-[#FCFEFC] px-8 py-10 rounded-sm shadow-md">
                        <div class="flex flex-row mb-4 items-center">
                            <img src="{{ asset('images/Power-BI-Logo-PNG_001.png') }}" alt="Mitra 1"
                                class="w-10 h-10 object-cover">
                            <div class="ml-4">
                                <h4 class="text-xl font-semibold">Perusahaan</h4>
                            </div>
                        </div>
                        <p class="text-gray-600 text-ellipsis ">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="flex flex-col min-w-48 max-w-56 h-56 bg-[#FCFEFC] px-8 py-10 rounded-sm shadow-md">
                        <div class="flex flex-row mb-4 items-center">
                            <img src="{{ asset('images/Power-BI-Logo-PNG_001.png') }}" alt="Mitra 1"
                                class="w-10 h-10 object-cover">
                            <div class="ml-4">
                                <h4 class="text-xl font-semibold">Perusahaan</h4>
                            </div>
                        </div>
                        <p class="text-gray-600 text-ellipsis ">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="flex flex-col min-w-48 max-w-56 h-56 bg-[#FCFEFC] px-8 py-10 rounded-sm shadow-md">
                        <div class="flex flex-row mb-4 items-center">
                            <img src="{{ asset('images/Power-BI-Logo-PNG_001.png') }}" alt="Mitra 1"
                                class="w-10 h-10 object-cover">
                            <div class="ml-4">
                                <h4 class="text-xl font-semibold">Perusahaan</h4>
                            </div>
                        </div>
                        <p class="text-gray-600 text-ellipsis ">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section id="kontak" class="py-16 bg-[#F2FAFC]">
            <div class="mx-auto px-4 max-w-7xl">
                <h3 class="text-3xl font-bold text-center mb-10">Bergabunglah Bersama Kami</h3>
                <div class="flex justify-center">
                    <a href="{{ route('register') }}"
                        class="bg-blue-500 text-white px-7 py-3 rounded-lg hover:bg-[#3D90D7] transition duration-300">Daftar
                        Sekarang</a>
                </div>
            </div>
        </section>
    </body>
</x-landing-layout>
