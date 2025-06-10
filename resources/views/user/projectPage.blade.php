<x-landing-layout>

    <body>
        <x-navbar></x-navbar>

        {{-- Header Dinamis --}}
        <header class="bg-gradient-to-r from-primary to-blue-600 text-white py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mt-20">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $headerTitle }}</h1>
                <p class="text-xl max-w-3xl mx-auto mb-8 opacity-90">
                    {{ $headerDescription }}
                </p>
                <div class="flex justify-center space-x-4">
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-7xl  mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <form id="projectFilterForm" method="GET" action="{{ route('project.page') }}"
                class="bg-white rounded-lg shadow-sm p-4 mb-8 border border-collapse">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div>
                        <label for="search" class="sr-only">Search Projects</label>
                        <input type="text" id="search" name="search"
                            placeholder="Search by title or description..."
                            class="w-full bg-gray-50 rounded-md border border-gray-300 text-gray-800 py-2 px-3 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm"
                            value="{{ $oldSearch }}">
                    </div>

                    <div>
                        <label for="filter_category" class="sr-only">Filter by Category</label>
                        <select id="filter_category" name="category"
                            class="w-full bg-gray-50 rounded-md border border-gray-300 text-gray-800 py-2 px-3 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $oldCategory == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col sm:flex-row md:flex-row items-stretch justify-end gap-2">
                        <button type="submit"
                            class="inline-flex items-center justify-center flex-grow px-4 py-2 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 transition-colors duration-200 text-sm">
                            Apply Filters
                        </button>
                        <a href="{{ route('project.page') }}"
                            class="inline-flex items-center justify-center flex-grow ml-0 md:ml-2 px-4 py-2 bg-gray-200 text-gray-700 font-semibold rounded-md shadow-sm hover:bg-gray-300 transition-colors duration-200 text-sm">
                            Clear Filters
                        </a>
                    </div>
                </div>
            </form>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                @forelse ($projects as $project)
                    <div onclick="showProjectDetailOverlay({{ $project->id }})"
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

                            <!-- Category and description -->
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

                        <!-- Footer with details and CTA -->
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

                            <div class="mt-4">
                                @guest
                                    <span
                                        class="w-full bg-gray-200 text-gray-700 font-semibold py-2.5 rounded-md text-sm text-center block cursor-not-allowed"
                                        title="Login to Apply">
                                        Apply Now <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                    </span>
                                @else
                                    @if (Auth::user()->isSeeker() && $project->status === 'Open')
                                        <a href="{{ route('seeker.apply.project', $project->id) }}"
                                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-md text-sm text-center block transition-colors duration-200">
                                            Apply Now <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                        </a>
                                    @elseif (Auth::user()->isRecruiter())
                                        <a href="{{ route('recruiter.jobs.applicants', $project->id) }}"
                                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-md text-sm text-center block transition-colors duration-200">
                                            View Applicants <i class="fas fa-users ml-1 text-xs"></i>
                                        </a>
                                    @else
                                        <span
                                            class="w-full bg-gray-200 text-gray-700 font-semibold py-2.5 rounded-md text-sm text-center block cursor-not-allowed">
                                            Status: {{ $project->status }}
                                        </span>
                                    @endif
                                @endguest
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16 bg-white rounded-xl shadow-sm border border-gray-200">
                        <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-search text-gray-400 text-2xl"></i>
                        </div>
                        <h4 class="text-gray-700 font-medium text-lg mb-2">No projects found</h4>
                        <p class="text-gray-500 max-w-md mx-auto">Try adjusting your search filters or check back later
                            for new opportunities.</p>
                    </div>
                @endforelse
            </div>

            @include('partials.project-detail-overlay')
        </main>

        <x-footer></x-footer>
    </body>
</x-landing-layout>
