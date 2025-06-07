<x-landing-layout>
    <x-navbar></x-navbar> 
{{-- Asumsi Anda menggunakan layout ini --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Seeker') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 md:p-8">
                <h3 class="text-2xl font-bold text-[#3674B5] mb-6">Selamat Datang, {{ $userName ?? 'Seeker' }}!</h3>

                <p class="text-gray-700 mb-4">
                    Ini adalah halaman dashboard utama Anda. Dari sini, Anda dapat mengelola portofolio dan melihat status aplikasi proyek Anda.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-[#F2FAFC] p-6 rounded-lg shadow">
                        <h4 class="text-lg font-semibold text-gray-700">Total Portofolio</h4>
                        <p class="text-3xl font-bold text-[#3674B5]">{{ $summary['totalPortfolios'] ?? 0 }}</p>
                    </div>
                    <div class="bg-[#F2FAFC] p-6 rounded-lg shadow">
                        <h4 class="text-lg font-semibold text-gray-700"> Aplikasi Proyek</h4>
                        <p class="text-3xl font-bold text-[#3674B5]">{{ $summary['totalApplications'] ?? 0 }}</p>
                    </div>
                    <div class="bg-[#F2FAFC] p-6 rounded-lg shadow">
                        <h4 class="text-lg font-semibold text-gray-700">Aplikasi Diterima</h4>
                        <p class="text-3xl font-bold text-green-500">{{ $summary['acceptedApplications'] ?? 0 }}</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <p class="text-gray-700">
                        Gunakan navigasi untuk mengakses halaman portofolio dan aplikasi proyek Anda.
                    </p>
                    <div>
                        <a href="{{ route('seeker.portfolios') }}"
                           class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out mr-2">
                            Lihat Portofolio Saya
                        </a>
                        <a href="{{ route('seeker.applications') }}"
                           class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                            Lihat Aplikasi Proyek Saya
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>


</x-landing-layout>
