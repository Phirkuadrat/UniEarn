<x-landing-layout>

    <body>
        <x-navbar></x-navbar>

        <header style="background-image: url('{{ asset('storage/categories/softwaredev.png') }}')"
            class="relative bg-center bg-cover text-white">

            <div class="absolute inset-0 bg-gradient-to-r from-blue-700/60 to-primary/60"></div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 sm:py-32">

                <div
                    class="max-w-4xl mx-auto text-center bg-black/30 backdrop-blur-md p-8 sm:p-12 rounded-2xl border border-white/20">

                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight mb-4 drop-shadow-md">
                        {{-- {{ $category->name }} --}}
                        nama kategori
                    </h1>

                    <p class="text-lg md:text-xl max-w-3xl mx-auto mb-0 text-gray-200">
                        sub-kategori sub-kategori sub-kategori sub-kategori sub-kategori sub-kategori sub-kategori sub-kategori
                    </p>

                    {{-- <div class="flex justify-center">
                        <a href="#projects"
                            class="bg-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-blue-500 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            See All Projects
                        </a>
                    </div> --}}

                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="bg-white">

            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <!-- Featured Projects Section -->
                <section class="mb-10">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">Featured Projects</h2>
                        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                            Discover exciting projects that match your skills and interests
                        </p>
                    </div>

                    <!-- Projects Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Project Card 1 -->
                        <div
                            class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                            <!-- Project Image/Thumbnail -->
                            <div class="relative h-48 bg-gradient-to-r from-cyan-500 to-blue-500">
                                <!-- Category Badge -->
                                <div
                                    class="absolute top-4 right-4 bg-white text-blue-600 px-3 py-1 rounded-full text-xs font-semibold shadow-sm">
                                    Web Development
                                </div>
                                <!-- Project Status -->
                                <div
                                    class="absolute bottom-4 left-4 bg-white bg-opacity-90 text-blue-600 px-3 py-1 rounded-full text-xs font-medium">
                                    <i class="fas fa-circle-check mr-1 text-green-500"></i> On Going
                                </div>
                            </div>

                            <!-- Project Details -->
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="text-xl font-bold text-gray-900">E-Commerce Platform</h3>
                                    <div class="flex items-center">
                                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                                        <span class="text-gray-700 font-medium">4.8</span>
                                    </div>
                                </div>

                                <p class="text-gray-500 text-sm mb-3">
                                    <i class="fas fa-tag mr-2 text-blue-500"></i> Full Stack Development
                                </p>

                                <p class="text-gray-600 mb-4 line-clamp-2">
                                    Build a complete e-commerce solution with product management, payment gateway
                                    integration, and customer dashboard.
                                </p>

                                <!-- Project Metadata -->
                                <div class="flex flex-wrap gap-2 mb-5">
                                    <span
                                        class="inline-flex items-center bg-green-50 text-green-700 px-3 py-1 rounded-full text-xs">
                                        <i class="fas fa-money-bill-wave mr-1"></i> Budget: Rp500K
                                    </span>
                                    <span
                                        class="inline-flex items-center bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-xs">
                                        <i class="fas fa-calendar-day mr-1"></i> Due: July 10, 2024
                                    </span>
                                </div>

                                <!-- Action Button -->
                                <div class="flex justify-between items-center">
                                    <a href="#"
                                        class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center text-sm">
                                        View Details <i class="fas fa-arrow-right ml-2 text-xs"></i>
                                    </a>
                                    <button
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                        Apply Now
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Project Card 2 -->
                        <div
                            class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                            <div class="relative h-48 bg-gradient-to-r from-purple-500 to-pink-500">
                                <div
                                    class="absolute top-4 right-4 bg-white text-purple-600 px-3 py-1 rounded-full text-xs font-semibold shadow-sm">
                                    Mobile App
                                </div>
                                <div
                                    class="absolute bottom-4 left-4 bg-white bg-opacity-90 text-purple-600 px-3 py-1 rounded-full text-xs font-medium">
                                    <i class="fas fa-circle-check mr-1 text-green-500"></i> On Going
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="text-xl font-bold text-gray-900">Fitness Tracker App</h3>
                                    <div class="flex items-center">
                                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                                        <span class="text-gray-700 font-medium">4.5</span>
                                    </div>
                                </div>

                                <p class="text-gray-500 text-sm mb-3">
                                    <i class="fas fa-tag mr-2 text-purple-500"></i> React Native
                                </p>

                                <p class="text-gray-600 mb-4 line-clamp-2">
                                    Develop a cross-platform fitness app with workout tracking, nutrition logging, and
                                    progress analytics.
                                </p>

                                <div class="flex flex-wrap gap-2 mb-5">
                                    <span
                                        class="inline-flex items-center bg-green-50 text-green-700 px-3 py-1 rounded-full text-xs">
                                        <i class="fas fa-money-bill-wave mr-1"></i> Budget: Rp750K
                                    </span>
                                    <span
                                        class="inline-flex items-center bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-xs">
                                        <i class="fas fa-calendar-day mr-1"></i> Due: Aug 15, 2024
                                    </span>
                                </div>

                                <div class="flex justify-between items-center">
                                    <a href="#"
                                        class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center text-sm">
                                        View Details <i class="fas fa-arrow-right ml-2 text-xs"></i>
                                    </a>
                                    <button
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                        Apply Now
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Project Card 3 -->
                        <div
                            class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                            <div class="relative h-48 bg-gradient-to-r from-orange-500 to-yellow-500">
                                <div
                                    class="absolute top-4 right-4 bg-white text-orange-600 px-3 py-1 rounded-full text-xs font-semibold shadow-sm">
                                    UI/UX Design
                                </div>
                                <div
                                    class="absolute bottom-4 left-4 bg-white bg-opacity-90 text-orange-600 px-3 py-1 rounded-full text-xs font-medium">
                                    <i class="fas fa-circle-check mr-1 text-green-500"></i> On Going
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="text-xl font-bold text-gray-900">Banking App Redesign</h3>
                                    <div class="flex items-center">
                                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                                        <span class="text-gray-700 font-medium">4.9</span>
                                    </div>
                                </div>

                                <p class="text-gray-500 text-sm mb-3">
                                    <i class="fas fa-tag mr-2 text-orange-500"></i> Mobile UI/UX
                                </p>

                                <p class="text-gray-600 mb-4 line-clamp-2">
                                    Redesign the user interface and experience for a mobile banking application to
                                    improve
                                    usability and engagement.
                                </p>

                                <div class="flex flex-wrap gap-2 mb-5">
                                    <span
                                        class="inline-flex items-center bg-green-50 text-green-700 px-3 py-1 rounded-full text-xs">
                                        <i class="fas fa-money-bill-wave mr-1"></i> Budget: Rp600K
                                    </span>
                                    <span
                                        class="inline-flex items-center bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-xs">
                                        <i class="fas fa-calendar-day mr-1"></i> Due: July 30, 2024
                                    </span>
                                </div>

                                <div class="flex justify-between items-center">
                                    <a href="#"
                                        class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center text-sm">
                                        View Details <i class="fas fa-arrow-right ml-2 text-xs"></i>
                                    </a>
                                    <button
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                        Apply Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- View More Button -->
                    <div class="text-center mt-10">
                        <button
                            class="inline-flex items-center px-6 py-3 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition-colors">
                            View All Projects
                            <i class="fas fa-chevron-down ml-2"></i>
                        </button>
                    </div>
                </section>
            </main>
        </div>

        <div class="bg-third">
            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <!-- Featured Portfolios Section -->
                <section class="mb-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">Featured Portfolios</h2>
                        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                            Explore work from our talented community of professionals
                        </p>
                    </div>

                    <!-- Portfolios Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Portfolio Card 1 -->
                        <div
                            class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                            <div class="relative h-48 bg-gradient-to-r from-indigo-500 to-blue-400">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                                    <button class="bg-white text-blue-600 px-4 py-2 rounded-full font-medium">
                                        View Portfolio
                                    </button>
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="flex items-center mb-4">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Doe"
                                        class="w-12 h-12 rounded-full mr-4">
                                    <div>
                                        <h3 class="font-bold text-gray-900">John Doe</h3>
                                        <p class="text-gray-500 text-sm">Web Developer</p>
                                    </div>
                                </div>

                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span class="bg-blue-50 text-blue-700 px-2 py-1 rounded text-xs">HTML/CSS</span>
                                    <span class="bg-blue-50 text-blue-700 px-2 py-1 rounded text-xs">JavaScript</span>
                                    <span class="bg-blue-50 text-blue-700 px-2 py-1 rounded text-xs">React</span>
                                </div>

                                <p class="text-gray-600 mb-4 line-clamp-2">
                                    Specializing in building responsive web applications with modern JavaScript
                                    frameworks.
                                </p>

                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                                        <span class="text-gray-700 font-medium mr-2">4.8</span>
                                        <span class="text-gray-500 text-sm">(42 reviews)</span>
                                    </div>
                                    <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                        View Profile
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Portfolio Card 2 -->
                        <div
                            class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                            <div class="relative h-48 bg-gradient-to-r from-pink-500 to-rose-400">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                                    <button class="bg-white text-pink-600 px-4 py-2 rounded-full font-medium">
                                        View Portfolio
                                    </button>
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="flex items-center mb-4">
                                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Jane Smith"
                                        class="w-12 h-12 rounded-full mr-4">
                                    <div>
                                        <h3 class="font-bold text-gray-900">Jane Smith</h3>
                                        <p class="text-gray-500 text-sm">UI/UX Designer</p>
                                    </div>
                                </div>

                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span class="bg-pink-50 text-pink-700 px-2 py-1 rounded text-xs">Figma</span>
                                    <span class="bg-pink-50 text-pink-700 px-2 py-1 rounded text-xs">Adobe XD</span>
                                    <span class="bg-pink-50 text-pink-700 px-2 py-1 rounded text-xs">Prototyping</span>
                                </div>

                                <p class="text-gray-600 mb-4 line-clamp-2">
                                    Creating intuitive and beautiful user experiences for web and mobile applications.
                                </p>

                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                                        <span class="text-gray-700 font-medium mr-2">4.9</span>
                                        <span class="text-gray-500 text-sm">(37 reviews)</span>
                                    </div>
                                    <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                        View Profile
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Portfolio Card 3 -->
                        <div
                            class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                            <div class="relative h-48 bg-gradient-to-r from-green-500 to-teal-400">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                                    <button class="bg-white text-green-600 px-4 py-2 rounded-full font-medium">
                                        View Portfolio
                                    </button>
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="flex items-center mb-4">
                                    <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Alex Johnson"
                                        class="w-12 h-12 rounded-full mr-4">
                                    <div>
                                        <h3 class="font-bold text-gray-900">Alex Johnson</h3>
                                        <p class="text-gray-500 text-sm">Mobile Developer</p>
                                    </div>
                                </div>

                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span class="bg-green-50 text-green-700 px-2 py-1 rounded text-xs">Flutter</span>
                                    <span class="bg-green-50 text-green-700 px-2 py-1 rounded text-xs">Dart</span>
                                    <span class="bg-green-50 text-green-700 px-2 py-1 rounded text-xs">Firebase</span>
                                </div>

                                <p class="text-gray-600 mb-4 line-clamp-2">
                                    Building cross-platform mobile applications with Flutter for startups and
                                    enterprises.
                                </p>

                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                                        <span class="text-gray-700 font-medium mr-2">4.7</span>
                                        <span class="text-gray-500 text-sm">(28 reviews)</span>
                                    </div>
                                    <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                        View Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- View More Button -->
                    <div class="text-center mt-10">
                        <button
                            class="inline-flex items-center px-6 py-3 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition-colors">
                            View All Portfolios
                            <i class="fas fa-chevron-down ml-2"></i>
                        </button>
                    </div>
                </section>
            </main>
        </div>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Call to Action Section -->
            <section class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl p-12 text-center text-white">
                <div class="max-w-3xl mx-auto">
                    <h2 class="text-3xl font-bold mb-4">Ready to Start Your Next Project?</h2>
                    <p class="text-lg mb-8 opacity-90">
                        Join thousands of professionals finding exciting opportunities and growing their careers.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <button
                            class="bg-white text-blue-600 px-6 py-3 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                            Browse Projects
                        </button>
                        <button
                            class="bg-transparent border-2 border-white px-6 py-3 rounded-lg font-medium hover:bg-white hover:text-blue-600 transition-colors">
                            Create Portfolio
                        </button>
                    </div>
                </div>
            </section>
        </main>


        <x-footer></x-footer>
    </body>
</x-landing-layout>
