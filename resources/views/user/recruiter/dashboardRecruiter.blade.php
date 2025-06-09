<x-landing-layout>

    <body class="bg-gray-100 text-gray-800 antialiased font-sans flex min-h-screen">

        <x-navbar></x-navbar>

        <aside class="w-64 bg-white shadow-lg p-6 mt-16 flex flex-col justify-between">
            <div>
                <div class="text-2xl font-bold text-blue-700 mb-8 text-center">Recruiter Panel</div>
                <nav class="space-y-2">
                    <a href="{{ route('recruiter.dashboard') }}"
                        class="flex items-center p-3 rounded-lg text-blue-700 bg-blue-50 font-semibold hover:bg-blue-100 transition-colors duration-200">
                        <i class="fas fa-home mr-3"></i> Dashboard
                    </a>
                    <a href="" {{-- Anda perlu membuat route ini --}}
                        class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-colors duration-200">
                        <i class="fas fa-briefcase mr-3"></i> My Job Listings
                    </a>
                    <a href="" {{-- Anda perlu membuat route ini --}}
                        class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-colors duration-200">
                        <i class="fas fa-file-alt mr-3"></i> Applications
                    </a>
                    <a href="" {{-- Anda perlu membuat route ini --}}
                        class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-colors duration-200">
                        <i class="fas fa-building mr-3"></i> Company Profile
                    </a>
                    <a href="" {{-- Anda perlu membuat route ini --}}
                        class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-colors duration-200">
                        <i class="fas fa-cog mr-3"></i> Settings
                    </a>
                </nav>
            </div>
        </aside>

        <div class="flex-1 flex flex-col mt-16">
            <main class="flex-1 p-8 overflow-y-auto">
                <div class="max-w-7xl mx-auto">
                    <h1 class="text-4xl font-extrabold text-gray-900 mb-8">Recruiter Dashboard</h1>

                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white p-6 rounded-lg shadow-md mb-8">
                        <h2 class="text-2xl font-bold mb-2">Hello, {{ Auth::user()->name }}!</h2>
                        <p class="text-blue-100">Welcome to your dashboard. Let's find your next great hire.</p>
                        <div class="mt-4">
                            <a href=""
                                class="inline-flex items-center px-4 py-2 bg-white text-blue-700 font-semibold rounded-full shadow-md hover:bg-blue-100 transition-colors duration-200">
                                <i class="fas fa-plus-circle mr-2"></i> Post a New Job
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-white p-6 rounded-lg shadow-md border border-blue-100">
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="text-lg font-semibold text-gray-700">Total Job Listings</h3>
                                <div class="bg-blue-100 p-2 rounded-full text-blue-600">
                                    <i class="fas fa-briefcase text-xl"></i>
                                </div>
                            </div>
                            <p class="text-4xl font-bold text-gray-900">12</p> {{-- Ganti dengan data dinamis --}}
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-md border border-green-100">
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="text-lg font-semibold text-gray-700">Total Applications</h3>
                                <div class="bg-green-100 p-2 rounded-full text-green-600">
                                    <i class="fas fa-users text-xl"></i>
                                </div>
                            </div>
                            <p class="text-4xl font-bold text-gray-900">45</p> {{-- Ganti dengan data dinamis --}}
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-md border border-purple-100">
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="text-lg font-semibold text-gray-700">Pending Reviews</h3>
                                <div class="bg-purple-100 p-2 rounded-full text-purple-600">
                                    <i class="fas fa-hourglass-half text-xl"></i>
                                </div>
                            </div>
                            <p class="text-4xl font-bold text-gray-900">15</p> {{-- Ganti dengan data dinamis --}}
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-5">Recent Applications</h2>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Applicant Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Job Title
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Applied On
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            John Doe
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                            Web Developer (Intern)
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Pending
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                            June 5, 2025
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#" class="text-blue-600 hover:text-blue-900">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            Jane Smith
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                            UI/UX Designer (Part-Time)
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Reviewed
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                            June 3, 2025
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#" class="text-blue-600 hover:text-blue-900">View</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-5 text-right">
                            <a href="" class="text-blue-600 font-semibold hover:underline">View All Applications
                                &rarr;</a>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-2xl font-bold text-gray-800 mb-5">Your Active Job Listings</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div
                                class="border border-gray-200 rounded-lg p-5 hover:shadow-lg transition-shadow duration-200">
                                <h3 class="font-bold text-lg text-gray-900 mb-2">Social Media Specialist</h3>
                                <p class="text-sm text-gray-600 mb-3">Posted: May 20, 2025 | 10 Applicants</p>
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">Part-Time</span>
                                    <span
                                        class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full">Marketing</span>
                                    <span
                                        class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Remote</span>
                                </div>
                                <div class="flex justify-end gap-3">
                                    <a href="#" class="text-blue-600 hover:underline text-sm">Edit</a>
                                    <a href="#" class="text-red-600 hover:underline text-sm">Delete</a>
                                    <a href="#" class="text-gray-600 hover:underline text-sm">View
                                        Applicants</a>
                                </div>
                            </div>
                            <div
                                class="border border-gray-200 rounded-lg p-5 hover:shadow-lg transition-shadow duration-200">
                                <h3 class="font-bold text-lg text-gray-900 mb-2">Product Management Intern</h3>
                                <p class="text-sm text-gray-600 mb-3">Posted: June 1, 2025 | 5 Applicants</p>
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">Internship</span>
                                    <span
                                        class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded-full">Business</span>
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">Hybrid</span>
                                </div>
                                <div class="flex justify-end gap-3">
                                    <a href="#" class="text-blue-600 hover:underline text-sm">Edit</a>
                                    <a href="#" class="text-red-600 hover:underline text-sm">Delete</a>
                                    <a href="#" class="text-gray-600 hover:underline text-sm">View
                                        Applicants</a>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-right">
                            <a href="" class="text-blue-600 font-semibold hover:underline">View All Job
                                Listings &rarr;</a>
                        </div>
                    </div>

                </div>
            </main>
        </div>

    </body>
</x-landing-layout>


