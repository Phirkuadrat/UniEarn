<x-admin-layout>
    <div class="p-6 h-[100vh]">
        {{-- Page Title --}}
        <h1 class="text-3xl font-extrabold text-gray-800 mb-6 border-b-2 border-blue-500 pb-2">User Management</h1>
        
        {{-- Stat Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div class="bg-white rounded-2xl shadow p-4 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-medium text-black">Total Seeker</h2>
                    <p class="text-3xl font-bold text-black">{{ $seekerCount }}</p>
                </div>
                <div class="text-blue-600 dark:text-blue-400">
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow p-4 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-medium text-black">Total Recruiter</h2>
                    <p class="text-3xl font-bold text-black">{{ $recruiterCount }}</p>
                </div>
                <div class="text-green-600 dark:text-green-400">
                </div>
            </div>
        </div>

        {{-- User Table --}}
        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-lg font-semibold text-black mb-4">User List</h2>
            <div class="overflow-x-auto">
                <table id="users-table" class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registered</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function() {
                $('#users-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('user.data') }}',
                    columns: [{
                            data: 'id',
                            name: 'Id'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                    ]
                });
            });
        </script>
    @endpush
</x-admin-layout>
