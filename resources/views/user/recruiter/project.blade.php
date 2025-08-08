<x-landing-layout>

    <body class="bg-gray-100 text-gray-800 antialiased font-sans flex flex-col min-h-screen">
        <x-navbar class="w-full sticky top-0 z-20"></x-navbar>

        <main class="flex-1 p-4 md:p-8 overflow-y-auto pt-16">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-6 md:mb-8">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4 mt-10 sm:mb-0">All Project List
                    </h1>
                </div>

                <form id="projectFilterForm" method="GET" action="{{ route('recruiter.project') }}"
                    class="bg-white rounded-lg shadow-sm p-4 mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="search" class="sr-only">Search Projects</label>
                            <input type="text" id="search" name="search" placeholder="Search by project title..."
                                class="w-full bg-gray-50 rounded-md border border-gray-300 text-gray-800 py-2 px-3 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm"
                                value="{{ $oldSearch }}">
                        </div>

                        <div>
                            <label for="filter_status" class="sr-only">Filter by Status</label>
                            <select id="filter_status" name="status"
                                class="w-full bg-gray-50 rounded-md border border-gray-300 text-gray-800 py-2 px-3 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm">
                                <option value="" {{ empty($oldStatus) ? 'selected' : '' }}>All Status</option>
                                <option value="open" {{ $oldStatus === 'open' ? 'selected' : '' }}>Open</option>
                                <option value="draft" {{ $oldStatus === 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="in_progress" {{ $oldStatus === 'in_progress' ? 'selected' : '' }}>In
                                    Progress</option>
                                <option value="completed" {{ $oldStatus === 'completed' ? 'selected' : '' }}>Completed
                                </option>
                                <option value="closed" {{ $oldStatus === 'closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                        </div>

                        <div class="flex flex-col sm:flex-row md:flex-row items-stretch justify-end gap-2">
                            <button type="submit"
                                class="inline-flex items-center justify-center flex-grow px-4 py-2 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 transition-colors duration-200 text-sm">
                                Apply Filters
                            </button>
                            <a href="{{ route('recruiter.project') }}"
                                class="inline-flex items-center justify-center flex-grow ml-0 md:ml-2 px-4 py-2 bg-gray-200 text-gray-700 font-semibold rounded-md shadow-sm hover:bg-gray-300 transition-colors duration-200 text-sm">
                                Clear Filters
                            </a>
                        </div>
                    </div>
                </form>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($projects as $job)
                        <div onclick="showProjectDetailOverlay({{ $job->id }})"
                            class="bg-gray-50 border border-gray-200 rounded-lg p-5 hover:shadow-lg transition-shadow duration-200">
                            <h3 class="font-bold text-lg text-gray-900 mb-2">{{ $job->title }}</h3>
                            <p class="text-sm text-gray-600 mb-3">Posted:
                                {{ $job->created_at->format('M d, Y') }}
                                | {{ $job->applications_count ?? 0 }} Applicants</p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">{{ $job->category->name ?? 'N/A' }}</span>
                                <span
                                    class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full">{{ $job->subCategory->name ?? 'N/A' }}</span>
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        @if ($job->status === 'open') bg-green-100 text-green-800
                                        @elseif($job->status === 'draft') bg-yellow-100 text-yellow-800
                                        @elseif($job->status === 'closed') bg-red-100 text-red-800
                                        @else bg-gray-100 text-gray-800 @endif">
                                    {{ Str::title($job->status) }}
                                </span>
                            </div>
                            <div class="flex justify-end gap-3">
                                <div class="flex items-center gap-1.5" onclick="event.stopPropagation();">
                                    @if ($job->status === 'open' || $job->status === 'draft')
                                        <button title="Edit Project"
                                            onclick="event.preventDefault(); showEditProjectModal({{ $job->id }});"
                                            class="text-blue-600 hover:text-blue-800 transition-colors duration-200 p-1 rounded-full hover:bg-blue-50 flex items-center justify-center">
                                            <i class="fas fa-edit text-base"></i>
                                        </button>
                                    @elseif($job->status === 'in_progress')
                                        <form id="complete-form-{{ $job->id }}"
                                            action="{{ route('project.done', $job->id) }}" method="POST"
                                            onsubmit="event.preventDefault(); showCompleteProjectModal(this);"
                                            class="inline-block flex items-center justify-center">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" title="Mark as Complete"
                                                class="text-blue-600 hover:text-blue-800 transition-colors duration-200 p-1 rounded-full hover:bg-blue-50 flex items-center justify-center">
                                                <i class="fas fa-check-circle"></i>
                                            </button>
                                        </form>
                                    @else
                                        <button title="Can only edit Open or Draft jobs"
                                            class="text-gray-600 cursor-not-allowed transition-colors duration-200 p-1 rounded-full flex items-center justify-center">
                                            <i class="fas fa-edit text-base"></i>
                                        </button>
                                    @endif

                                    <form id="delete-form-{{ $job->id }}"
                                        action="{{ route('project.delete', $job->id) }}" method="POST"
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
                    @empty
                        <div class="col-span-full text-center py-8 text-gray-500">
                            <p class="mb-2">You haven't posted any Project yet.</p>
                            <button onclick="showAddProjectModal()"
                                class="text-blue-600 hover:underline font-semibold">Post your
                                first
                                Project now!</button>
                        </div>
                    @endforelse
                </div>
            </div>

            <button type="button" onclick="showAddProjectModal()"
                class="fixed bottom-6 right-6 lg:bottom-8 lg:right-8 z-40
                   inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-full shadow-lg
                   hover:bg-blue-700 transition-colors duration-200 text-base md:text-lg">
                <i class="fas fa-plus"></i>
            </button>

            @include('partials.project-detail-overlay')
            @include('partials.add-project-modal')
            @include('partials.edit-project-modal')
            @include('partials.delete-confirm-modal')
        </main>
    </body>
</x-landing-layout>
