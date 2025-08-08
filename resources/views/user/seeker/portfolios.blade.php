<x-landing-layout>

    <body class="bg-gray-100 text-gray-800 antialiased font-sans flex flex-col min-h-screen">
        <x-navbar class="w-full sticky top-0 z-20"></x-navbar>

        <main class="flex-1 p-4 md:p-8 overflow-y-auto pt-16">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-6 md-mb-8">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-10">My Portfolios</h1>
                </div>

                <form id="portfolioFilterForm" method="GET" action="{{ route('seeker.portfolios') }}"
                    class="bg-white rounded-lg shadow-sm p-4 mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
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
                            <a href="{{ route('seeker.portfolios') }}"
                                class="inline-flex items-center justify-center flex-grow ml-0 md:ml-2 px-4 py-2 bg-gray-200 text-gray-700 font-semibold rounded-md shadow-sm hover:bg-gray-300 transition-colors duration-200 text-sm">
                                Clear Filters
                            </a>
                        </div>
                    </div>
                </form>


                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
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

                                    @if ($portfolio->link)
                                        <a href="{{ $portfolio->link }}" target="_blank" title="View Project"
                                            class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center gap-1"
                                            onclick="event.stopPropagation();">
                                            Visit <i class="fas fa-external-link-alt text-xs ml-1"></i>
                                        </a>
                                    @else
                                        <span class="text-gray-500 text-sm flex items-center gap-1">
                                            No Link <i class="fas fa-link-slash text-xs ml-1 opacity-70"></i>
                                        </span>
                                    @endif


                                    <div class="flex items-center gap-1.5" onclick="event.stopPropagation();">

                                        <a href="#" title="Edit Project"
                                            onclick="event.preventDefault(); showEditPortfolioModal({{ $portfolio->id }});"
                                            class="text-blue-600 hover:text-blue-800 transition-colors duration-200 p-1 rounded-full hover:bg-blue-50 flex items-center justify-center">
                                            <i class="fas fa-edit text-base"></i>
                                        </a>


                                        <form id="delete-form-{{ $portfolio->id }}"
                                            action="" method="POST"
                                            {{-- {{ route('portfolio.delete', $portfolio->id) }} --}}
                                            onsubmit="event.preventDefault(); showDeleteConfirmModal(this);"
                                            class="inline-block flex items-center justify-center">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Delete Project"
                                                class="text-red-600 hover:text-red-800 transition-colors duration-200 bg-transparent border-none p-1 rounded-full hover:bg-red-50 cursor-pointer focus:outline-none flex items-center justify-center">
                                                <i class="fas fa-trash-alt text-base"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div
                            class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden transform hover:scale-[1.02] hover:shadow-xl transition-all duration-300 flex items-center justify-center text-center p-6 min-h-[200px] cursor-pointer col-span-full">
                            <button type="button" onclick="showAddPortfolioModal()"
                                class="text-blue-600 hover:text-blue-800 flex flex-col items-center">
                                <i class="fas fa-plus-circle text-3xl md:text-4xl mb-3"></i>
                                <span class="font-bold text-lg md:text-xl">Add Your First Project</span>
                                <span class="text-gray-500 text-sm mt-1">Showcase your amazing work here!</span>
                            </button>
                        </div>
                    @endforelse
                </div>

            </div>

        </main>

        <button type="button" onclick="showAddPortfolioModal()"
            class="fixed bottom-6 right-6 lg:bottom-8 lg:right-8 z-40
                   inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-full shadow-lg
                   hover:bg-blue-700 transition-colors duration-200 text-base md:text-lg">
            <i class="fas fa-plus"></i>
        </button>

        @include('partials.portfolio-detail-overlay')
        @include('partials.edit-portfolio-modal')
        @include('partials.add-portfolio-modal')
    </body>

    <script>
        function fetchCategories() {
            const categorySelect = document.getElementById('category_id');
            const oldSelectedCategoryId = '{{ old('category_id', '') }}';

            categorySelect.innerHTML = '<option value="">Loading Categories...</option>';

            fetch('/categories/get')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    categorySelect.innerHTML = '<option value="">All Category</option>';
                    data.forEach(category => {
                        const option = document.createElement('option');
                        option.value = category.id;
                        option.textContent = category.name;
                        if (category.id == oldSelectedCategoryId) {
                            option.selected = true;
                        }
                        categorySelect.appendChild(option);
                    });
                    if (oldSelectedCategoryId) {
                        const oldSubCategoryId = '{{ old('sub_category_id', '') }}';
                        fetchSubCategories(oldSelectedCategoryId, oldSubCategoryId);
                    }
                })
                .catch(error => {
                    console.error('Error fetching categories:', error);
                    categorySelect.innerHTML = '<option value="">Failed to load categories</option>';
                });
        }
    </script>
</x-landing-layout>
