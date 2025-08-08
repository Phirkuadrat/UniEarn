<x-landing-layout>

    <body class="bg-white text-gray-800 scroll-smooth">

        <!-- Header -->
        <x-navbar></x-navbar>

        @auth
            @if (Auth::user()->isUnassigned())
                @include('partials.role-selection-modal')
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const modal = document.getElementById('roleSelectionModal');
                        if (modal) {
                            modal.classList.remove('hidden');
                        }
                    });
                </script>
            @endif
        @endauth

        <!-- Hero Section (Modifikasi) -->
        <section style="background-image: url('{{ asset('images/fotoHero.webp') }}')" class="bg-cover bg-center">
            <div class="bg-black bg-opacity-20">
                <div class="container mx-auto px-4 flex items-center min-h-screen justify-center md:justify-end">
                    <div class="w-full md:w-3/4 lg:w-2/3 xl:w-1/2">
                        <div
                            class="bg-white bg-opacity-75 backdrop-blur-sm rounded-2xl shadow-xl p-8 md:p-12 text-center md:text-right">

                            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-black tracking-tight mb-4">
                                Hello, Future Leader!
                            </h1>

                            <h2 class="text-2xl md:text-4xl font-bold text-[#3674B5] tracking-tight mb-6">
                                Your Next Chapter, Powered by uniEarn.
                            </h2>

                            <p class="text-lg md:text-xl text-gray-800 mb-8 max-w-2xl mx-auto md:mx-0">
                                Unlock your potential. We connect you to the skills and jobs for a meaningful career.
                            </p>

                            <form class="flex flex-col sm:flex-row gap-3 mb-6" method="GET" action="{{ route('project.page') }}">
                                <input type="text" id="search" name="search"
                                    placeholder="Search Projects, Jobs Or Internship..."
                                    class="w-full bg-gray-50 rounded-md border border-gray-300 text-gray-800 py-2 px-3 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm">

                                <button type="submit"
                                    class="bg-[#3674B5] text-white px-6 py-3 rounded-lg font-semibold flex items-center justify-center gap-2 hover:bg-[#2a5a8a] transition-transform transform hover:scale-105">
                                    <span>Search</span>
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 bg-white">
            <div class="container mx-auto p-12">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-4">Discover In-Demand Career
                    Paths</h2>
                <p class="text-lg text-gray-700 text-center mb-12 max-w-3xl mx-auto">
                    Select fields that align with your abilities and college timetable, and find projects to build your
                    portfolio.
                </p>

                <div class="swiper category-carousel">
                    <div class="swiper-wrapper px-4 pb-12">
                        @foreach ($categories as $category)
                            <div class="swiper-slide h-[300px]">
                                <a href="{{ route('project.page', ['category' => $category->id]) }}"
                                    class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden transform hover:scale-[1.03] hover:shadow-xl transition-all duration-300 group cursor-pointer flex flex-col h-full">

                                    <div class="w-full h-40 relative overflow-hidden bg-gray-200 flex-shrink-0">
                                        <img src="{{ asset('storage/' . $category->image) }}"
                                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
                                            alt="{{ $category->name }}">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent">
                                        </div>
                                        <h3
                                            class="absolute bottom-4 left-4 right-4 font-bold text-xl text-white text-left z-10 leading-tight">
                                            {{ $category->name }}
                                        </h3>
                                    </div>

                                    <div class="p-4 pt-3 flex-grow flex flex-col justify-between">
                                        <div>
                                            <p
                                                class="text-sm text-gray-600 mb-2 leading-tight flex items-center min-h-[2.5rem] line-clamp-2">
                                                <i class="fas fa-cubes mr-2 text-blue-400 flex-shrink-0"></i>
                                                <span class="flex-grow">
                                                    @forelse ($category->subCategories->take(3) as $sub)
                                                        <span class="inline-block whitespace-nowrap">
                                                            {{ $sub->name }}
                                                        </span>
                                                        @if (!$loop->last)
                                                            ,
                                                        @endif
                                                    @empty
                                                        <span class="text-gray-400 italic">No subcategories
                                                            listed</span>
                                                    @endforelse
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-button-next text-blue-600 hover:text-blue-800 transition-colors duration-200">
                    </div>
                    <div class="swiper-button-prev text-blue-600 hover:text-blue-800 transition-colors duration-200">
                    </div>
                    <div class="swiper-pagination mt-4 text-gray-600"></div>
                </div>
            </div>
        </section>

        <!-- Menapa UniEarn -->
        <section class="py-16 bg-[#F2FAFC]">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold mb-4">Why Choose uniEarn?</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">A platform specifically for students, designed to help
                        you find job opportunities that fit your class schedule and career interests</p>
                </div>

                <div class="p-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div
                        class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-xl mb-2">Specifically for Students</h3>
                        <p class="text-gray-600">Our platform is designed specifically for student needs with flexible
                            jobs that fit class schedules</p>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-xl mb-2">Verified Job Vacancies</h3>
                        <p class="text-gray-600">All job vacancies go through a strict verification process to ensure
                            the security and credibility of the company</p>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-xl mb-2">Easy Application Process</h3>
                        <p class="text-gray-600">The "Instant Apply" feature allows you to apply with just one click
                            using your uploaded CV</p>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-xl mb-2">Flexible with Your Schedule</h3>
                        <p class="text-gray-600">Jobs with flexible working hours that can be adjusted to your class and
                            exam schedules</p>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="bg-pink-100 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-xl mb-2">Digital Portfolio</h3>
                        <p class="text-gray-600">Create a professional portfolio to showcase your projects and
                            achievements to companies</p>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-xl mb-2">Student Community</h3>
                        <p class="text-gray-600">Join the student community to share experiences and get career support
                        </p>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-xl mb-2">Continuous Learning</h3>
                        <p class="text-gray-600">Access to webinars, workshops, and resources to develop your
                            professional skills</p>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="bg-teal-100 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-xl mb-2">No Hidden Fees</h3>
                        <p class="text-gray-600">100% free for students. No registration fees or commissions from your
                            earnings</p>
                    </div>
                </div>

                <div class="mt-16 bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-8 text-white">
                    <div class="max-w-4xl mx-auto text-center">
                        <h3 class="text-2xl font-bold mb-6">Join 50,000+ Students Who Have Already Benefited</h3>

                        <div class="flex flex-col md:flex-row justify-center items-center gap-6">
                            <div class="text-center">
                                <div class="text-4xl font-bold">4.8/5</div>
                                <div class="flex justify-center mt-2">
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                                <p class="mt-1 text-blue-100">User Rating</p>
                            </div>

                            <div class="h-12 w-px bg-blue-400 hidden md:block"></div>

                            <div class="text-center">
                                <div class="text-4xl font-bold">10,000+</div>
                                <p class="mt-2 text-blue-100">Available Vacancies</p>
                            </div>

                            <div class="h-12 w-px bg-blue-400 hidden md:block"></div>

                            <div class="text-center">
                                <div class="text-4xl font-bold">250+</div>
                                <p class="mt-2 text-blue-100">Partner Companies</p>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-center">
                            <a href="{{ route('register') }}"
                                class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition text-lg">
                                Register Now - It's Free!
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Lowongan Rekomendasi -->
        <section class="p-16 py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h2 class="text-3xl font-bold">Recommended For You</h2>
                        <p class="text-gray-600">Project Lowongan yang cocok dengan jurusan dan minatmu</p>
                    </div>
                    <a href="{{ route('project.page') }}" class="text-blue-600 font-semibold hover:underline">Lihat
                        Semua</a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($projects as $project)
                        <div
                            class="bg-white rounded-xl shadow-md hover:shadow-xl border border-gray-100 overflow-hidden transform hover:-translate-y-1 transition-all duration-300 cursor-pointer flex flex-col h-full">

                            <div class="p-6 pb-0 flex-grow">
                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-xl font-bold text-gray-900 leading-tight line-clamp-2">
                                        {{ $project->title }}
                                    </h3>
                                </div>

                                @if ($project->user)
                                    <div class="flex items-center mb-4">
                                        @if ($project->user->recruiter->company_logo)
                                            <img src="{{ Storage::url($project->user->recruiter->company_logo) }}"
                                                alt="{{ $project->user->recruiter->company_name }} Logo"
                                                class="w-10 h-10 rounded-full object-cover mr-3 border-2 border-white shadow-sm">
                                        @else
                                            <div
                                                class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-50 to-gray-100 flex items-center justify-center mr-3">
                                                <i class="fas fa-building text-gray-500"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <p class="text-gray-800 font-medium text-sm">
                                                {{ $project->user->recruiter->company_name ?? ($project->user->name ?? 'Unknown Company') }}
                                            </p>
                                            <p class="text-gray-500 text-xs">
                                                {{ $project->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                @endif

                                <div class="mb-4">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full bg-blue-50 text-blue-600 text-xs font-medium">
                                        <i class="fas fa-tag mr-1 text-xs"></i>
                                        {{ $project->category->name ?? 'N/A' }}
                                        @if ($project->subCategory)
                                            / {{ $project->subCategory->name }}
                                        @endif
                                    </span>
                                </div>

                                <p class="text-gray-600 mb-4 line-clamp-3 text-sm leading-relaxed">
                                    {{ $project->description }}
                                </p>
                            </div>

                            <div class="p-6 pt-0">
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span
                                        class="inline-flex items-center bg-green-50 text-green-700 px-3 py-1 rounded-full text-xs">
                                        <i class="fas fa-money-bill-wave mr-1"></i>
                                        Rp {{ number_format($project->budget, 0, ',', '.') }}
                                    </span>
                                    <span
                                        class="inline-flex items-center bg-purple-50 text-purple-700 px-3 py-1 rounded-full text-xs">
                                        <i class="fas fa-clock mr-1"></i>
                                        {{ \Carbon\Carbon::parse($project->due_date)->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div
                            class="col-span-full text-center py-16 bg-white rounded-xl shadow-sm border border-gray-200">
                            <div
                                class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-search text-gray-400 text-2xl"></i>
                            </div>
                            <h4 class="text-gray-700 font-medium text-lg mb-2">No projects found</h4>
                            <p class="text-gray-500 max-w-md mx-auto">Try adjusting your search filters or check back
                                later
                                for new opportunities.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Perusahaan Mitra -->
        <section class="py-16 bg-[#F2FAFC]">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold mb-4">Our Partner Companies</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">Companies that are actively recruiting students through
                        our platform</p>
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
        <section class="pb-24 bg-gradient-to-r from-indigo-50 to-blue-50">
            <div class="container mx-auto p-12">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold mb-4">Student Success Stories</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">First-hand experiences from students who have
                        found jobs through our platform</p>
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

                    <!-- Testimonial 2 -->
                    <div class="bg-white rounded-xl shadow-lg p-6 relative">
                        <div
                            class="absolute -top-4 left-6 bg-blue-500 text-white w-8 h-8 rounded-full flex items-center justify-center">
                            <i class="fa-regular fa-comment"></i>
                        </div>
                        <div class="flex items-center mb-4">
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
