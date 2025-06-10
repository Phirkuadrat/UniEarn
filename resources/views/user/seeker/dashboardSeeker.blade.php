<x-landing-layout>

    <body class="bg-gray-100 text-gray-800 antialiased font-sans flex flex-col min-h-screen">
        <x-navbar class="w-full sticky top-0 z-20"></x-navbar>

        <div class="flex-1 flex flex-col pt-12 md:pt-16 sm:pt-20">
            <main class="flex-1 p-4 md:p-8 overflow-y-auto">
                <div class="max-w-7xl mx-auto">
                    <div
                        class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white p-5 md:p-6 rounded-lg shadow-md mb-6 md:mb-8 flex flex-col sm:flex-row items-center sm:text-left text-center">
                        @if (Auth::user()->seeker && Auth::user()->seeker->profile_picture)
                            <img src="{{ Storage::url(Auth::user()->seeker->profile_picture) }}" alt="Profile Picture"
                                class="w-20 h-20 rounded-full object-cover border-2 border-white mb-4 sm:mb-0 sm:mr-4">
                        @else
                            <div
                                class="w-20 h-20 rounded-full bg-blue-400 flex items-center justify-center text-3xl text-white mb-4 sm:mb-0 sm:mr-4">
                                <i class="fas fa-user"></i>
                            </div>
                        @endif
                        <div class="flex-1">
                            <h2 class="text-xl md:text-2xl font-bold mb-1">Hello, {{ Auth::user()->name }}!</h2>
                            <p class="text-blue-100 text-sm md:text-base mb-3">
                                {{ Auth::user()->seeker->bio ?? 'Complete your profile to unlock more opportunities.' }}
                            </p>
                            <a href="{{ route('profile.edit') }}"
                                class="inline-flex items-center px-3 py-1.5 md:px-4 md:py-2 bg-white text-blue-700 font-semibold rounded-full shadow-md hover:bg-blue-100 transition-colors duration-200 text-sm">
                                <i class="fas fa-edit mr-2"></i> Edit Profile
                            </a>
                        </div>
                    </div>

                    <div class="bg-white p-5 md:p-6 rounded-lg shadow-md mb-6 md:mb-8">
                        <div class="flex flex-col sm:flex-row justify-between items-center mb-4 md:mb-5 gap-3">
                            <h2 class="text-xl md:text-2xl font-bold text-gray-800">My Portfolio</h2>
                            <button type="button" onclick="showAddPortfolioModal()"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-full hover:bg-blue-700 transition-colors duration-200 text-sm">
                                <i class="fas fa-plus mr-2"></i> Add New Portfolio
                            </button>
                        </div>


                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                            @forelse ($portfolios as $portfolio)
                                <div onclick="showPortfolioDetail({{ $portfolio->id }})"
                                    class="border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-200 cursor-pointer">
                                    <img src="{{ $portfolio->images->first() ? Storage::url($portfolio->images->first()->image_path) : 'https://via.placeholder.com/400x250/E0F2F7/2196F3?text=No+Image' }}"
                                        alt="{{ $portfolio->title }}" class="w-full h-32 md:h-40 object-cover">
                                    <div class="p-3 md:p-4">
                                        <h3 class="font-bold text-base md:text-lg text-gray-900 mb-1">
                                            {{ $portfolio->title }}</h3>
                                        <p class="text-xs md:text-sm text-gray-600 mb-3">
                                            {{ $portfolio->category->name ?? 'N/A' }}
                                            @if ($portfolio->subCategory)
                                                - {{ $portfolio->subCategory->name }}
                                            @endif
                                        </p>
                                        <div class="flex justify-end items-center pt-3 border-gray-100">
                                            <div class="flex items-center gap-1.5">
                                                <a href="#" title="Edit Project"
                                                    onclick="event.preventDefault(); showEditPortfolioModal({{ $portfolio->id }});"
                                                    class="text-blue-600 hover:text-blue-800 transition-colors duration-200 p-1 rounded-full hover:bg-blue-50 flex items-center justify-center">
                                                    <i class="fas fa-edit text-base md:text-lg"></i>
                                                </a>

                                                <form action="{{ route('portfolio.delete', $portfolio->id) }}"
                                                    method="POST"
                                                    onsubmit="event.preventDefault(); showDeleteConfirmModal(this);"
                                                    class="inline-block flex items-center justify-center">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" title="Delete Project"
                                                        class="text-red-600 hover:text-red-800 transition-colors duration-200 bg-transparent border-none p-1 rounded-full hover:bg-red-50 cursor-pointer focus:outline-none flex items-center justify-center">
                                                        <i class="fas fa-trash-alt text-base md:text-lg"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div
                                    class="border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-200 flex items-center justify-center text-center p-4 min-h-[160px] cursor-pointer col-span-full">
                                    <button type="button" onclick="showAddPortfolioModal()"
                                        class="text-blue-600 hover:text-blue-800 flex flex-col items-center">
                                        <i class="fas fa-plus-circle text-2xl md:text-3xl mb-2"></i>
                                        <span class="font-semibold text-sm md:text-base">Add Your First Project</span>
                                    </button>
                                </div>
                            @endforelse
                        </div>
                        <div class="mt-4 md:mt-5 text-right">
                            <a href="{{ route('seeker.portfolios') }}"
                                class="text-blue-600 font-semibold hover:underline text-sm md:text-base">View All
                                &rarr;</a>
                        </div>
                    </div>


                    <div class="bg-white p-5 md:p-6 rounded-lg shadow-md">
                        <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-4 md:mb-5">My Applications</h2>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-4 py-2 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Job Title
                                        </th>
                                        <th scope="col"
                                            class="px-4 py-2 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Company
                                        </th>
                                        <th scope="col"
                                            class="px-4 py-2 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col"
                                            class="px-4 py-2 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Applied On
                                        </th>
                                        <th scope="col" class="relative px-4 py-2 md:px-6 md:py-3">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td
                                            class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            Junior Frontend Developer (Intern)
                                        </td>
                                        <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap text-sm text-gray-600">
                                            PT. Tech Innovasi
                                        </td>
                                        <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap text-sm">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Pending
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap text-sm text-gray-600">
                                            June 5, 2025
                                        </td>
                                        <td
                                            class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#" class="text-blue-600 hover:text-blue-900">View
                                                Details</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            UX Researcher (Part-Time)
                                        </td>
                                        <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap text-sm text-gray-600">
                                            Creative Solutions
                                        </td>
                                        <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap text-sm">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Interview Scheduled
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap text-sm text-gray-600">
                                            May 28, 2025
                                        </td>
                                        <td
                                            class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#" class="text-blue-600 hover:text-blue-900">View
                                                Details</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            Digital Marketing Intern
                                        </td>
                                        <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap text-sm text-gray-600">
                                            Global Marketing Co.
                                        </td>
                                        <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap text-sm">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Rejected
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap text-sm text-gray-600">
                                            April 15, 2025
                                        </td>
                                        <td
                                            class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#" class="text-blue-600 hover:text-blue-900">View
                                                Details</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 md:mt-5 text-right">
                            <a href=""
                                class="text-blue-600 font-semibold hover:underline text-sm md:text-base">View All
                                Applications &rarr;</a>
                        </div>
                    </div>

                </div>
            </main>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if ($errors->any())
                    showAddPortfolioModal();
                    const oldCategoryId = document.getElementById('category_id').value;
                    const oldSubCategoryId = '{{ old('sub_category_id', '') }}';
                    if (oldCategoryId && oldSubCategoryId) {
                        fetchSubCategories(oldCategoryId, oldSubCategoryId);
                    }
                @endif
            });
        </script>

        @include('partials.portfolio-detail-overlay')
        @include('partials.add-portfolio-modal')
        @include('partials.edit-portfolio-modal')
    </body>
</x-landing-layout>
