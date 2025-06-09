<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Portfolio | Job Seeker</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#1e40af',
                        accent: '#60a5fa',
                        dark: '#1f2937',
                        light: '#f9fafb',
                        success: '#10b981',
                        warning: '#f59e0b',
                        info: '#06b6d4'
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            min-height: 100vh;
        }

        .project-card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
            overflow: hidden;
        }

        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.2);
        }

        .status-badge {
            font-size: 0.75rem;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
        }

        .category-badge {
            font-weight: 500;
            border-radius: 9999px;
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
        }

        .tag {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .progress-bar {
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: 4px;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-briefcase text-primary text-2xl mr-2"></i>
                        <span class="font-bold text-xl text-dark">ProjectPortfolio</span>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-gray-500 hover:text-primary">Home</a>
                    <a href="#" class="text-primary font-medium">Projects</a>
                    <a href="#" class="text-gray-500 hover:text-primary">Clients</a>
                    <a href="#" class="text-gray-500 hover:text-primary">About</a>
                    <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-secondary transition">Post a Project</button>
                </div>
                <div class="md:hidden flex items-center">
                    <button class="text-gray-500">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Page Header -->
        <div class="mb-12 text-center">
            <h1 class="text-4xl font-bold text-dark mb-4">Available Projects</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Browse through our curated list of projects. Find opportunities that match your skills and expertise.
            </p>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-xl p-6 shadow-sm mb-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h2 class="text-lg font-semibold text-dark mb-2">Filter Projects</h2>
                    <div class="flex flex-wrap gap-2">
                        <button class="px-4 py-2 rounded-full bg-primary text-white text-sm font-medium">All Projects</button>
                        <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200">Web Development</button>
                        <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200">Mobile Apps</button>
                        <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200">UI/UX Design</button>
                        <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200">Data Science</button>
                    </div>
                </div>

                <div class="flex gap-3">
                    <div class="relative">
                        <select class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option>Sort by: Newest</option>
                            <option>Sort by: Budget</option>
                            <option>Sort by: Deadline</option>
                        </select>
                        <i class="fas fa-sort absolute left-3 top-3 text-gray-500"></i>
                    </div>

                    <div class="relative">
                        <input type="text" placeholder="Search projects..." class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-500"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl p-6 shadow-sm flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-primary mr-4">
                    <i class="fas fa-layer-group text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Total Projects</p>
                    <p class="text-2xl font-bold text-dark">142</p>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-success mr-4">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Completed</p>
                    <p class="text-2xl font-bold text-dark">86</p>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-warning mr-4">
                    <i class="fas fa-sync-alt text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">In Progress</p>
                    <p class="text-2xl font-bold text-dark">42</p>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm flex items-center">
                <div class="p-3 rounded-full bg-red-100 text-red-500 mr-4">
                    <i class="fas fa-hourglass-half text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Urgent Hiring</p>
                    <p class="text-2xl font-bold text-dark">14</p>
                </div>
            </div>
        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Project Card 1 -->
            <div class="project-card bg-white rounded-xl">
                <div class="relative">
                    <div class="h-48 bg-gradient-to-r from-cyan-500 to-blue-500"></div>
                    <div class="absolute top-4 right-4">
                        <span class="category-badge bg-white text-blue-600">Web Development</span>
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
                        Build a comprehensive dashboard for e-commerce businesses with real-time analytics and inventory management.
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
                        <a href="#" class="text-primary font-medium inline-flex items-center hover:text-secondary">
                            View Details <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </a>
                        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:bg-secondary transition">
                            Apply Now
                        </button>
                    </div>
                </div>
            </div>

            <!-- Project Card 2 -->
            <div class="project-card bg-white rounded-xl">
                <div class="relative">
                    <div class="h-48 bg-gradient-to-r from-violet-500 to-purple-600"></div>
                    <div class="absolute top-4 right-4">
                        <span class="category-badge bg-white text-purple-600">Mobile App</span>
                    </div>
                    <div class="absolute bottom-4 left-4">
                        <span class="status-badge bg-yellow-100 text-yellow-800">
                            <i class="fas fa-circle text-[8px] mr-1"></i> Planning
                        </span>
                    </div>
                </div>

                <div class="p-6">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-xl font-bold text-dark">Fitness Tracker App</h3>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-star text-yellow-400"></i>
                            <span class="text-gray-700 font-medium">4.5</span>
                        </div>
                    </div>

                    <p class="text-gray-500 text-sm mb-3">
                        <i class="fas fa-tag mr-2"></i> Health & Wellness
                    </p>

                    <p class="text-gray-600 mb-4">
                        Create a mobile application to track workouts, set fitness goals, and monitor progress with charts.
                    </p>

                    <div class="mb-4">
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span>Progress</span>
                            <span>25%</span>
                        </div>
                        <div class="progress-bar bg-gray-200">
                            <div class="progress-fill bg-warning" style="width: 25%"></div>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="tag bg-green-100 text-green-800">
                            <i class="fas fa-money-bill-wave"></i> Budget: 750k
                        </span>
                        <span class="tag bg-blue-100 text-blue-800">
                            <i class="fas fa-calendar-day"></i> Due: Aug 15, 2024
                        </span>
                        <span class="tag bg-purple-100 text-purple-800">
                            <i class="fas fa-users"></i> Team: 4 Members
                        </span>
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="#" class="text-primary font-medium inline-flex items-center hover:text-secondary">
                            View Details <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </a>
                        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:bg-secondary transition">
                            Apply Now
                        </button>
                    </div>
                </div>
            </div>

            <!-- Project Card 3 -->
            <div class="project-card bg-white rounded-xl">
                <div class="relative">
                    <div class="h-48 bg-gradient-to-r from-rose-500 to-pink-600"></div>
                    <div class="absolute top-4 right-4">
                        <span class="category-badge bg-white text-pink-600">UI/UX Design</span>
                    </div>
                    <div class="absolute bottom-4 left-4">
                        <span class="status-badge bg-green-100 text-green-800">
                            <i class="fas fa-circle text-[8px] mr-1"></i> Completed
                        </span>
                    </div>
                </div>

                <div class="p-6">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-xl font-bold text-dark">Banking App Interface</h3>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-star text-yellow-400"></i>
                            <span class="text-gray-700 font-medium">5.0</span>
                        </div>
                    </div>

                    <p class="text-gray-500 text-sm mb-3">
                        <i class="fas fa-tag mr-2"></i> Finance & Security
                    </p>

                    <p class="text-gray-600 mb-4">
                        Design a modern banking interface with focus on user experience, security, and seamless transactions.
                    </p>

                    <div class="mb-4">
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span>Progress</span>
                            <span>100%</span>
                        </div>
                        <div class="progress-bar bg-gray-200">
                            <div class="progress-fill bg-success" style="width: 100%"></div>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="tag bg-green-100 text-green-800">
                            <i class="fas fa-money-bill-wave"></i> Budget: 350k
                        </span>
                        <span class="tag bg-blue-100 text-blue-800">
                            <i class="fas fa-calendar-day"></i> Due: June 5, 2024
                        </span>
                        <span class="tag bg-purple-100 text-purple-800">
                            <i class="fas fa-users"></i> Team: 2 Members
                        </span>
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="#" class="text-primary font-medium inline-flex items-center hover:text-secondary">
                            View Details <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </a>
                        <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm cursor-not-allowed" disabled>
                            Completed
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-12">
            <nav class="flex items-center space-x-1">
                <button class="p-2 rounded-lg bg-white border border-gray-300 text-gray-600 hover:bg-gray-50">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="px-4 py-2 rounded-lg bg-primary text-white font-medium">1</button>
                <button class="px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-600 hover:bg-gray-50">2</button>
                <button class="px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-600 hover:bg-gray-50">3</button>
                <button class="px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-600 hover:bg-gray-50">4</button>
                <button class="p-2 rounded-lg bg-white border border-gray-300 text-gray-600 hover:bg-gray-50">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </nav>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-briefcase text-primary text-2xl mr-2"></i>
                        <span class="font-bold text-xl">ProjectPortfolio</span>
                    </div>
                    <p class="text-gray-400">
                        Connecting talented professionals with exciting project opportunities worldwide.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">For Professionals</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-primary transition">Browse Projects</a></li>
                        <li><a href="#" class="hover:text-primary transition">How It Works</a></li>
                        <li><a href="#" class="hover:text-primary transition">Success Stories</a></li>
                        <li><a href="#" class="hover:text-primary transition">Membership Plans</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">For Clients</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-primary transition">Post a Project</a></li>
                        <li><a href="#" class="hover:text-primary transition">Browse Talent</a></li>
                        <li><a href="#" class="hover:text-primary transition">Pricing</a></li>
                        <li><a href="#" class="hover:text-primary transition">Enterprise Solutions</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-start"><i class="fas fa-envelope mt-1 mr-2 text-sm"></i> contact@projectportfolio.com</li>
                        <li class="flex items-start"><i class="fas fa-phone mt-1 mr-2 text-sm"></i> +1 (555) 123-4567</li>
                        <li class="flex items-start"><i class="fas fa-map-marker-alt mt-1 mr-2 text-sm"></i> San Francisco, CA</li>
                    </ul>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-500">
                <p>&copy; 2023 ProjectPortfolio. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Simple filter button functionality
        document.querySelectorAll('.filter-btn').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(btn => {
                    btn.classList.remove('bg-primary', 'text-white');
                    btn.classList.add('bg-gray-100', 'text-gray-700');
                });
                this.classList.remove('bg-gray-100', 'text-gray-700');
                this.classList.add('bg-primary', 'text-white');
            });
        });
    </script>
</body>
</html>
