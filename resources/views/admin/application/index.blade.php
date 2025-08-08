<x-admin-layout>
    <div class="p-6 h-[100vh]">
        {{-- Page Title --}}
        <h1 class="text-3xl font-extrabold text-gray-800 mb-6 border-b-2 border-blue-500 pb-2">Application User</h1>

        {{-- Success Message --}}
        @if (session('success'))
            <div
                class="fixed top-14 right-10 z-50 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded-lg shadow-lg">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif

        {{-- Error Message --}}
        @if (session('error'))
            <div
                class="fixed top-14 right-10 z-50 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-lg shadow-lg">
                <strong>{{ session('error') }}</strong>
            </div>
        @endif

        {{-- Application List Table --}}
        <div class="bg-white p-6 rounded-2xl shadow-xl overflow-hidden">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Application List</h2>
            <div class="overflow-x-auto">
<table id="application-table" class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tl-lg">
                                Applicant Name
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Project Title
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tr-lg">
                                Applied On
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    </tbody>
                </table>
            </div>
        </div>

        @include('partials.seeker-profile')
    </div>

    <script>
        $(document).ready(function() {
            $('#application-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('application.data') }}',
                columns: [{
                        data: 'applicant_name',
                        name: 'applicant_name'
                    },
                    {
                        data: 'project_title',
                        name: 'project_title'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'applied_on',
                        name: 'applied_on'
                    }
                ],
            });
        });
    </script>
</x-admin-layout>
