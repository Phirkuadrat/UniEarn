<x-app-layout> {{-- Asumsi Anda menggunakan layout ini --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aplikasi Proyek Saya') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 md:p-8">

                <h3 class="text-2xl font-bold text-[#3674B5] mb-6">Daftar Aplikasi Proyek</h3>

                @if($applications->count() > 0)
                    <div class="overflow-x-auto bg-[#F2FAFC] p-4 rounded-lg">
                        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Proyek</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori Proyek</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status Lamaran</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pesan Anda</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($applications as $application)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $application->project_title }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $application->project_category }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $statusClass = '';
                                            if (strtolower($application->status) == 'pending') $statusClass = 'bg-yellow-100 text-yellow-800';
                                            elseif (strtolower($application->status) == 'accepted') $statusClass = 'bg-green-100 text-green-800';
                                            elseif (strtolower($application->status) == 'rejected') $statusClass = 'bg-red-100 text-red-800';
                                            else $statusClass = 'bg-gray-100 text-gray-800';
                                        @endphp
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }}">
                                            {{ ucfirst($application->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-600">{{ Str::limit($application->message, 60) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ url('#lihat-proyek/' . $application->project_id) }}" <!-- Ganti dengan route('projects.show', $application->project_id) -->
                                           class="text-blue-500 hover:text-blue-700 hover:underline">
                                           Detail Proyek
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                     <div class="bg-[#F2FAFC] p-6 rounded-lg text-center">
                        <p class="text-gray-600">Anda belum memiliki aplikasi proyek.</p>
                    </div>
                @endif
                <div class="mt-6">
                    <a href="{{ route('seeker.index') }}" class="text-blue-500 hover:text-blue-700 hover:underline">&larr; Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>