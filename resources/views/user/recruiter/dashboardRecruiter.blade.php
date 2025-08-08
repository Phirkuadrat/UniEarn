<x-landing-layout>

    <body class="bg-gray-100 text-gray-800 antialiased font-sans flex flex-col min-h-screen">
        <x-navbar class="w-full sticky top-0 z-20"></x-navbar>

        <div class="flex-1 flex flex-col pt-12 md:pt-16 sm:pt-20">

            <main class="flex-1 p-4 md:p-8 overflow-y-auto">
                <div class="max-w-7xl mx-auto">
                    <div
                        class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white p-6 rounded-lg shadow-md mb-8 flex flex-col sm:flex-row items-center sm:text-left text-center">
                        @if ($recruiter->company_logo)
                            <img src="{{ Storage::url($recruiter->company_logo) }}"
                                alt="{{ $recruiter->company_name }} Logo"
                                class="w-20 h-20 object-contain bg-white rounded-full p-2 border-2 border-white mb-4 sm:mb-0 sm:mr-4">
                        @else
                            <div
                                class="w-20 h-20 rounded-full bg-blue-400 flex items-center justify-center text-3xl text-white mb-4 sm:mb-0 sm:mr-4">
                                <i class="fas fa-building"></i>
                            </div>
                        @endif
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold mb-1">{{ $recruiter->company_name ?? 'Your Company Name' }}
                            </h2>
                            <p class="text-blue-100 text-sm md:text-base mb-2">
                                @if ($recruiter->company_website)
                                    <a href="{{ $recruiter->company_website }}" target="_blank"
                                        class="hover:underline text-blue-100">
                                        {{ $recruiter->company_website }}
                                    </a>
                                @else
                                    No website provided.
                                @endif
                            </p>
                            <p class="text-blue-100 text-sm md:text-base mb-3">
                                {{ $recruiter->company_address ?? 'No address provided.' }}
                                @if ($recruiter->company_phone)
                                    &bull; {{ $recruiter->company_phone }}
                                @endif
                            </p>
                            <a href=""
                                class="inline-flex items-center px-4 py-2 bg-white text-blue-700 font-semibold rounded-full shadow-md hover:bg-blue-100 transition-colors duration-200 text-sm">
                                <i class="fas fa-edit mr-2"></i> Edit Company Profile
                            </a>
                        </div>
                    </div>

                    {{-- Summary Cards --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div
                            class="bg-white p-6 rounded-lg shadow-md border border-blue-100 flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700">Total Project Listings</h3>
                                <p class="text-4xl font-bold text-gray-900 mt-2">{{ $totalJobListings ?? 0 }}</p>
                            </div>
                            <div class="bg-blue-50 p-3 rounded-full text-blue-600">
                                <i class="fas fa-briefcase text-2xl"></i>
                            </div>
                        </div>
                        <div
                            class="bg-white p-6 rounded-lg shadow-md border border-green-100 flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700">Total Applications</h3>
                                <p class="text-4xl font-bold text-gray-900 mt-2">{{ $totalApplications ?? 0 }}</p>
                            </div>
                            <div class="bg-green-50 p-3 rounded-full text-green-600">
                                <i class="fas fa-users text-2xl"></i>
                            </div>
                        </div>
                        <div
                            class="bg-white p-6 rounded-lg shadow-md border border-purple-100 flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700">Pending Reviews</h3>
                                <p class="text-4xl font-bold text-gray-900 mt-2">{{ $pendingReviews ?? 0 }}</p>
                            </div>
                            <div class="bg-purple-50 p-3 rounded-full text-purple-600">
                                <i class="fas fa-hourglass-half text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Recent Applications --}}
                    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                        <div class="flex justify-between items-center mb-5">
                            <h2 class="text-2xl font-bold text-gray-800">Recent Applications</h2>
                            <a href="{{ route('recruiter.application') }}"
                                class="text-blue-600 font-semibold hover:underline text-sm md:text-base">View
                                All &rarr;</a>
                        </div>
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
                                            Project Title
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
                                    @forelse ($recentApplications as $application)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $application->user->name ?? 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                {{ $application->Project->title ?? 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                @if ($application->status === 'pending') bg-yellow-100 text-yellow-800
                                                @elseif($application->status === 'approved') bg-green-100 text-green-800
                                                @else bg-red-100 text-red-800 @endif">
                                                    {{ Str::upper($application->status) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                {{ $application->created_at->format('M d, Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center justify-end space-x-2">
                                                    {{-- Tombol View Seeker Profile --}}
                                                    <button type="button"
                                                        onclick="showSeekerProfileOverlay({{ $application->user_id }})"
                                                        class="text-blue-600 hover:text-blue-800 p-1 rounded-full"
                                                        title="View Seeker Profile">
                                                        <i class="fas fa-eye"></i>
                                                    </button>

                                                    @if ($application->status === 'pending')
                                                        {{-- Tombol Approve --}}
                                                        <form id="approve-form-{{ $application->id }}"
                                                            action="{{ route('application.approve', $application->id) }}"
                                                            method="POST"
                                                            onsubmit="event.preventDefault(); showApproveConfirmModal(this);"
                                                            class="inline-block">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="text-green-600 hover:text-green-800 focus:outline-none p-1 rounded-full"
                                                                title="Approve Application">
                                                                <i class="fas fa-check-circle"></i>
                                                            </button>
                                                        </form>

                                                        <form id="reject-form-{{ $application->id }}"
                                                            action="{{ route('application.reject', $application->id) }}"
                                                            method="POST"
                                                            onsubmit="event.preventDefault(); showRejectConfirmModal(this);"
                                                            class="inline-block">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="text-red-600 hover:text-red-800 focus:outline-none p-1 rounded-full"
                                                                title="Reject Application">
                                                                <i class="fas fa-times-circle"></i>
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if ($application->status === 'approved' && $application->project->status === 'completed_pending_review')
                                                        <button type="button"
                                                            onclick="showReviewSeekerModal(
                    {{ $application->user->seeker->id }},
                    '{{ $application->user->name }}',
                    {{ $application->id }},
                    {{ $application->project_id }} )"
                                                            class="text-yellow-600 hover:text-yellow-400 transition-colors duration-200 p-1 rounded-full">
                                                            <i class="fas fa-star" aria-hidden="true"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5"
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">No
                                                recent applications.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Your Active Project Listings --}}
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex justify-between items-center mb-5">
                            <h2 class="text-2xl font-bold text-gray-800">Your Active Project Listings</h2>
                            <a href="{{ route('recruiter.project') }}"
                                class="text-blue-600 font-semibold hover:underline text-sm md:text-base">View
                                All &rarr;</a>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @forelse ($activeJobListings as $job)
                                <div onclick="showProjectDetailOverlay({{ $job->id }})"
                                    class="border border-gray-200 rounded-lg p-5 hover:shadow-lg transition-shadow duration-200">
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

                </div>
            </main>
        </div>

        @include('partials.project-detail-overlay')
        @include('partials.seeker-profile')
        @include('partials.apply-confirm-modal')
        @include('partials.approve-confirm-modal')
        @include('partials.reject-confirm-modal')
        @include('partials.add-project-modal')
        @include('partials.edit-project-modal')
        @include('partials.delete-confirm-modal')

    </body>
</x-landing-layout>
