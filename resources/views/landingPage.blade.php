@extends('layout.app')

<body class="bg-white text-gray-800 font-[montserrat] scroll-smooth">

    <!-- Header -->
    <x-navbar></x-navbar>

    <!-- Hero Section -->
    <section class="bg-[url({{ asset('images/fotoHero.webp') }})] bg-cover bg-center py-96">
        <div class="mx-32 px-4 text-end ">
            <h1 class="text-6xl font-bold mb-4 text-black">Selamat Datang Mahasiswa</h1>
            <h2 class="text-7xl font-bold mb-4 text-black">Man jadda wa jada</h2>
            <p class="text-4xl text-gray-600 mb-6">kembangkan potensimu dengan kami.</p>
            {{-- <input type="text" placeholder="masukan bidangmu" class="border border-gray-300 rounded-xl px-6 py-1.5">
            <a href="#kontak" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 ">Cari</a> --}}
            <div class="relative inline-block md:w-1/2 w-full">
                <input type="text" placeholder="masukan bidangmu"
                    class="border border-gray-300 rounded-xl px-6 py-1.5 pr-20 hover:border-blue-500 focus:outline-none focus:ring-blue-500 focus:ring-2 md:w-1/2 w-full">
                <a href="#kontak"
                    class="absolute right-0 top-1/2 -translate-y-1/2 bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-[3D90D7]">Cari</a>
            </div>

        </div>
    </section>

    <!-- Fitur -->
    <section id="fitur" class="py-16 bg-[#FCFEFC]">
        <div class=" mx-auto px-4">
            <h3 class="text-3xl font-bold text-center mb-10">Bidang Kerja Populer</h3>
            <div class="flex overflow-x-auto space-x-6 p-4 scroll-smooth snap-x snap-mandatory">
                <div
                    class="min-w-[280px] max-w-sm snap-center flex-shrink-0 bg-gray-50 rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/bidang1.webp') }}" class="w-full h-40 object-cover rounded-t-lg"
                        alt="">
                    <div class="p-6">
                        <h4 class="text-xl text-center font-semibold mb-2">Program Developer</h4>
                        <p class="text-pretty text-gray-600 ">Pengembangan website, pengembangan software, pengembangan game.</p>
                    </div>
                </div>
                <div
                    class="min-w-[280px] snap-center flex-shrink-0 bg-gray-50 rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/bidang2.webp') }}" class="w-full h-40 object-cover rounded-t-lg"
                        alt="">
                    <div class="p-6">
                        <h4 class="text-xl text-center font-semibold mb-2">Data Analis</h4>
                        <p class="text-gray-600">Machine learning, deep learning, bisnis intelijen.</p>
                    </div>
                </div>
                <div
                    class="min-w-[280px] snap-center flex-shrink-0 bg-gray-50 rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/bidang3.webp') }}" class="w-full h-40 object-cover rounded-t-lg"
                        alt="">
                    <div class="p-6">
                        <h4 class="text-xl text-center font-semibold mb-2">Desainer Grafis</h4>
                        <p class="text-gray-600">Illustrator, desain poster, desain produk.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section id="testimoni" class="py-16 bg-[#F2FAFC]">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold mb-4">Apa Kata Mereka</h3>
            <p class="text-gray-700 mb-6">Kami telah membantu banyak mahasiswa dalam mengembangkan karir mereka.</p>
            <div class="flex space-x-6">
                <div class="bg-white shadow-lg rounded-lg p-6 flex-1">
                    <p class="text-gray-600">"uniEarn membantu saya menemukan pekerjaan impian saya!"</p>
                    <p class="mt-4 font-semibold">- Andi</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 flex-1">
                    <p class="text-gray-600">"Saya sangat puas dengan layanan yang diberikan."</p>
                    <p class="mt-4 font-semibold">- Budi</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 flex-1">
                    <p class="text-gray-600">"uniEarn adalah platform yang sangat membantu."</p>
                    <p class="mt-4 font-semibold">- Citra</p>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA -->
    <section class="py-16 bg-[FCFEFC]">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold mb-4">Siap Bergabung?</h3>
            <p class="text-gray-700 mb-6">Daftar sekarang dan mulai perjalanan karir Anda bersama kami!</p>
            <a href="#kontak"
                class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition duration-300">Daftar
                Sekarang</a>
        </div>
    </section>
    <!-- FAQ -->
    <section id="faq" class="py-16 bg-[#F2FAFC]">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold mb-4">Pertanyaan yang Sering Diajukan</h3>
            <p class="text-gray-700 mb-6">Berikut adalah beberapa pertanyaan yang sering diajukan oleh pengguna kami.</p>
            <div class="space-y-4">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h4 class="text-xl font-semibold">Apa itu uniEarn?</h4>
                    <p class="text-gray-600">uniEarn adalah platform yang membantu mahasiswa dalam mengembangkan karir
                        mereka.</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h4 class="text-xl font-semibold">Bagaimana cara mendaftar?</h4>
                    <p class="text-gray-600">Anda dapat mendaftar melalui halaman pendaftaran di website kami.</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h4 class="text-xl font-semibold">Apakah ada biaya untuk menggunakan uniEarn?</h4>
                    <p class="text-gray-600">Tidak, layanan kami gratis untuk semua pengguna.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog -->
    <section id="blog" class="py-16 bg-[#FCFEFC]">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold mb-4">Blog Terbaru</h3>
            <p class="text-gray-700 mb-6">Dapatkan tips dan informasi terbaru seputar dunia kerja dan karir.</p>
            <div class="flex space-x-6">
                <div class="bg-white shadow-lg rounded-lg p-6 flex-1">
                    <h4 class="text-xl font-semibold">5 Tips Sukses dalam Wawancara Kerja</h4>
                    <p class="text-gray-600">Pelajari cara mempersiapkan diri untuk wawancara kerja agar sukses.</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 flex-1">
                    <h4 class="text-xl font-semibold">Cara Menulis CV yang Menarik</h4>
                    <p class="text-gray-600">Tips dan trik untuk menulis CV yang menarik perhatian perekrut.</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 flex-1">
                    <h4 class="text-xl font-semibold">Menghadapi Tantangan di Tempat Kerja</h4>
                    <p class="text-gray-600">Cara menghadapi tantangan dan stres di tempat kerja.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang -->
    <section id="tentang" class="py-16 bg-[F2FAFC]">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold mb-4">Tentang Kami</h3>
            <p class="text-gray-700">Kami adalah tim profesional yang berkomitmen untuk memberikan solusi digital
                terbaik dan inovatif bagi bisnis Anda.</p>
        </div>
    </section>

    <!-- Kontak -->
    <section id="kontak" class="py-16 bg-[FCFEFC]">
        <div class="max-w-2xl mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold mb-4">Hubungi Kami</h3>
            <p class="mb-6 text-gray-600">Siap bekerja sama? Kirim email ke <a href="mailto:info@brandku.com"
                    class="text-blue-600 underline">info@brandku.com</a></p>
        </div>
    </section>

    <!-- Footer -->
    <x-footer></x-footer>

</body>
