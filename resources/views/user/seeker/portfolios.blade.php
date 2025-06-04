<x-app-layout> {{-- Asumsi Anda menggunakan layout ini --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Portofolio Saya') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 md:p-8">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-[#3674B5]">Daftar Portofolio</h3>
                    <a href="{{ url('#tambah-portfolio') }}" <!-- Ganti dengan route('portfolios.create') jika sudah ada -->
                       class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                        Tambah Portofolio Baru
                    </a>
                </div>

                @if($portfolios->count() > 0)
                    <div class="overflow-x-auto bg-[#F2FAFC] p-4 rounded-lg">
                        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi Singkat</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($portfolios as $portfolio)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $portfolio->title }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-600">{{ Str::limit($portfolio->description, 80) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $portfolio->category }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ url('#edit-portfolio/' . $portfolio->id) }}" <!-- Ganti dengan route('portfolios.edit', $portfolio->id) -->
                                           class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                        <button onclick="return confirm('Apakah Anda yakin ingin menghapus portofolio ini?');" class="text-red-600 hover:text-red-900">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="bg-[#F2FAFC] p-6 rounded-lg text-center">
                        <p class="text-gray-600">Anda belum memiliki portofolio. Silakan tambahkan portofolio baru.</p>
                    </div>
                @endif
                 <div class="mt-6">
                    <a href="{{ route('seeker.index') }}" class="text-blue-500 hover:text-blue-700 hover:underline">&larr; Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>