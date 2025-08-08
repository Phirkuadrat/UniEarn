<x-landing-layout>

    <body class="bg-gray-100 text-gray-800 antialiased font-sans flex flex-col min-h-screen">
        <x-navbar class="w-full sticky top-0 z-20"></x-navbar>

        <main class="flex-1 p-4 md:p-8 overflow-y-auto pt-16">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-6 md:mb-8">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4 mt-10 sm:mb-0">All Applications
                    </h1>
                </div>

                <form id="portfolioFilterForm" method="GET" action="{{ route('recruiter.application') }}"
                    class="bg-white rounded-lg shadow-sm p-4 mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="search" class="sr-only">Search Projects</label>
                            <input type="text" id="search" name="search"
                                placeholder="Search by Project Name or Seeker Name..."
                                class="w-full bg-gray-50 rounded-md border border-gray-300 text-gray-800 py-2 px-3 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm"
                                value="{{ $oldSearch }}">
                        </div>

                        <select id="filter_status" name="status"
                            class="w-full bg-gray-50 rounded-md border border-gray-300 text-gray-800 py-2 px-3 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm">
                            <option value="" {{ empty($oldStatus) ? 'selected' : '' }}>All Status</option>
                            <option value="pending" {{ $oldStatus === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ $oldStatus === 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ $oldStatus === 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>

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

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
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
                                @forelse ($applications as $application)
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

                {{-- Pagination --}}
                @if ($applications->hasPages())
                    <div class="mt-8">
                        {{ $applications->links() }}
                    </div>
                @endif
            </div>

            @include('partials.approve-confirm-modal')
            @include('partials.reject-confirm-modal')
            @include('partials.seeker-profile')
        </main>
    </body>
</x-landing-layout>
