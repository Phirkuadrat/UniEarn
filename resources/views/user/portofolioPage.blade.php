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
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <form id="projectFilterForm" method="GET" action="{{ route('portofolio.page') }}"
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

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
                {{-- @foreach ($portofolios as $porto) --}}
                @forelse ($portfolios as $portfolio)
                    <div onclick="showPortfolioDetail({{ $portfolio->id }})"
                        class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden transform hover:scale-[1.02] hover:shadow-xl transition-all duration-300 group cursor-pointer relative">

                        <div class="w-full h-40 md:h-48 overflow-hidden bg-gray-200">
                            <img src="{{ $portfolio->images->first() ? Storage::url($portfolio->images->first()->image_path) : 'https://via.placeholder.com/400x250/E0F2F7/2196F3?text=No+Image' }}"
                                alt="{{ $portfolio->title }}"
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                        </div>


                        <div class="p-4 md:p-5">
                            <h3 class="font-bold text-lg md:text-xl text-gray-900 mb-1 leading-tight">
                                {{ $portfolio->title }}</h3>
                            <p class="text-sm text-blue-600 mb-3">
                                {{ $portfolio->category->name ?? 'Category' }}
                                @if ($portfolio->subCategory)
                                    / {{ $portfolio->subCategory->name }}
                                @endif
                            </p>

                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $portfolio->description }}</p>


                            <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                                <div class="flex items-center">
                                    @if ($portfolio->user->seeker->profile_picture)
                                        <img src="{{ Storage::url($portfolio->user->seeker->profile_picture) }}"
                                            alt="{{ $portfolio->user->seeker->profile_picture }} Profile Picture"
                                            class="w-10 h-10 rounded-full object-cover mr-3 border-2 border-white shadow-sm">
                                    @else
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-50 to-gray-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-user text-gray-500"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="text-gray-800 font-medium text-sm">
                                            {{ $portfolio->user->name ?? 'Unknown' }}
                                        </p>
                                        <p class="text-gray-500 text-xs">
                                            {{ $portfolio->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16 bg-white rounded-xl shadow-sm border border-gray-200">
                        <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-search text-gray-400 text-2xl"></i>
                        </div>
                        <h4 class="text-gray-700 font-medium text-lg mb-2">No Portfolio found</h4>
                        <p class="text-gray-500 max-w-md mx-auto">Try adjusting your search filters or check back later
                            for new show case.</p>
                    </div>
                @endforelse
            </div>

            @include('partials.portfolio-detail-guest-overlay')
        </main>

        <x-footer></x-footer>
    </body>
</x-landing-layout>
