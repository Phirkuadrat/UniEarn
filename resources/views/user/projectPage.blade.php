<x-landing-layout>

    <body>
        <x-navbar></x-navbar>

        <header class="bg-gradient-to-r from-primary to-secondary text-white py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mt-20">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Available Projects</h1>
                <p class="text-xl max-w-3xl mx-auto mb-8 opacity-90">
                    Explore various project categories—from tech, design, and writing to research—all designed
                    specifically for students like you.
                </p>
                <div class="flex justify-center space-x-4">
                    {{-- <button
                        class="bg-transparent border-2 border-white px-6 py-3 rounded-lg font-medium hover:bg-white hover:text-primary transition">
                        <i class="fas fa-envelope mr-2"></i>Contact Me
                    </button> --}}
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <h2 class="text-3xl font-bold text-center mb-10">Featured Projects</h2>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
                <!-- Project Card 1 -->
                <div
                    class="project-card bg-white rounded-xl overflow-hidden border border-collapse hover:-translate-y-1 transition-all duration-300 ease-in-out shadow-lg">
                    <div class="h-48 bg-gradient-to-r from-cyan-500 to-blue-500 relative">
                        <div
                            class="absolute top-4 right-4 bg-white text-primary px-3 py-1 rounded-full text-sm font-medium">
                            'category'
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-bold text-dark">project name</h3>
                            <div class="flex space-x-2">
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm mb-3">
                            <i class="fas fa-tag mr-2"></i> sub category
                        </p>
                        <p class="text-gray-600 mb-4">
                            description: lorem ipsum dolor sit amet.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="tech-tag bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                <i class="fa-solid fa-money-bill-wave"></i>
                                budget: 500k</span>
                            <span class="tech-tag bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-sm">
                                <i class="fa-solid fa-calendar-days"></i>
                                due date: july 10 2024</span>
                            <span class="tech-tag bg-yellow-50 text-yellow-600 px-3 py-1 rounded-full text-sm">
                                <i class="fa-solid fa-circle-check"></i>
                                status: on going</span>
                        </div>
                        <a href="#"
                            class="text-primary font-medium inline-flex items-center hover:text-secondary">
                            View Project Details <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
                <!-- Project Card 2 -->
                <div
                    class="project-card bg-white rounded-xl overflow-hidden border border-collapse hover:-translate-y-1 transition-all duration-300 ease-in-out shadow-lg">
                    <div class="h-48 bg-gradient-to-r from-cyan-500 to-blue-500 relative">
                        <div
                            class="absolute top-4 right-4 bg-white text-primary px-3 py-1 rounded-full text-sm font-medium">
                            'category'
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-bold text-dark">project name</h3>
                            <div class="flex space-x-2">
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm mb-3">
                            <i class="fas fa-tag mr-2"></i> sub category
                        </p>
                        <p class="text-gray-600 mb-4">
                            description: lorem ipsum dolor sit amet.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="tech-tag bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                <i class="fa-solid fa-money-bill-wave"></i>
                                budget: 500k</span>
                            <span class="tech-tag bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-sm">
                                <i class="fa-solid fa-calendar-days"></i>
                                due date: july 10 2024</span>
                            <span class="tech-tag bg-yellow-50 text-yellow-600 px-3 py-1 rounded-full text-sm">
                                <i class="fa-solid fa-circle-check"></i>
                                status: on going</span>
                        </div>
                        <a href="#"
                            class="text-primary font-medium inline-flex items-center hover:text-secondary">
                            View Project Details <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
                <!-- Project Card 3 -->
                <div
                    class="project-card bg-white rounded-xl overflow-hidden border border-collapse hover:-translate-y-1 transition-all duration-300 ease-in-out shadow-lg">
                    <div class="h-48 bg-gradient-to-r from-cyan-500 to-blue-500 relative">
                        <div
                            class="absolute top-4 right-4 bg-white text-primary px-3 py-1 rounded-full text-sm font-medium">
                            'category'
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-bold text-dark">project name</h3>
                            <div class="flex space-x-2">
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm mb-3">
                            <i class="fas fa-tag mr-2"></i> sub category
                        </p>
                        <p class="text-gray-600 mb-4">
                            description: lorem ipsum dolor sit amet.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="tech-tag bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                <i class="fa-solid fa-money-bill-wave"></i>
                                budget: 500k</span>
                            <span class="tech-tag bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-sm">
                                <i class="fa-solid fa-calendar-days"></i>
                                due date: july 10 2024</span>
                            <span class="tech-tag bg-yellow-50 text-yellow-600 px-3 py-1 rounded-full text-sm">
                                <i class="fa-solid fa-circle-check"></i>
                                status: on going</span>
                        </div>
                        <a href="#"
                            class="text-primary font-medium inline-flex items-center hover:text-secondary">
                            View Project Details <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Project Card 2 -->
                {{-- <div class="project-card bg-white rounded-xl">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-r from-cyan-500 to-blue-500"></div>
                        <div class="absolute top-4 right-4">
                            <span class="border rounded-full p-2 bg-white text-blue-600">Web Development</span>
                        </div>
                        <div class="absolute bottom-4 left-4">
                            <span class="status-badge bg-blue-100 text-blue-800">
                                <i class="fas fa-circle text-[8px] mr-1"></i> On Going
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-dark">E-Commerce Dashboard</h3>
                            <div class="flex items-center gap-1">
                                <i class="fas fa-star text-yellow-400"></i>
                                <span class="text-gray-700 font-medium">4.8</span>
                            </div>
                        </div>

                        <p class="text-gray-500 text-sm mb-3">
                            <i class="fas fa-tag mr-2"></i> Admin Panel & Analytics
                        </p>

                        <p class="text-gray-600 mb-4">
                            Build a comprehensive dashboard for e-commerce businesses with real-time analytics and
                            inventory management.
                        </p>

                        <div class="mb-4">
                            <div class="flex justify-between text-sm text-gray-600 mb-1">
                                <span>Progress</span>
                                <span>65%</span>
                            </div>
                            <div class="progress-bar bg-gray-200">
                                <div class="progress-fill bg-primary" style="width: 65%"></div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="tag bg-green-100 text-green-800">
                                <i class="fas fa-money-bill-wave"></i> Budget: 500k
                            </span>
                            <span class="tag bg-blue-100 text-blue-800">
                                <i class="fas fa-calendar-day"></i> Due: July 10, 2024
                            </span>
                            <span class="tag bg-purple-100 text-purple-800">
                                <i class="fas fa-users"></i> Team: 3 Members
                            </span>
                        </div>

                        <div class="flex justify-between items-center">
                            <a href="#"
                                class="text-primary font-medium inline-flex items-center hover:text-secondary">
                                View Details <i class="fas fa-arrow-right ml-2 text-xs"></i>
                            </a>
                            <button
                                class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:bg-secondary transition">
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div> --}}


            </div>

            <!-- Call to Action -->
            <div class="mt-16 bg-gradient-to-r from-primary to-blue-600 rounded-2xl p-8 text-center text-white">
                <h2 class="text-3xl font-bold mb-4">Find Your Next Project, Simply.</h2>
                <p class="max-w-2xl mx-auto mb-6 text-lg opacity-90">
                    Browse flexible projects that let you gain valuable experience and earn income on your own terms.
                </p>
                <div class="flex justify-center space-x-4">
                </div>
            </div>


        </main>

        <x-footer></x-footer>
    </body>
</x-landing-layout>
