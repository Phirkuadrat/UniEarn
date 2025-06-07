<x-admin-layout>
    <div class="p-6 sm:p-8 lg:p-10 min-h-screen">
        {{-- Page Title --}}
        <h1 class="text-3xl font-extrabold text-gray-800 mb-6 border-b-2 border-blue-500 pb-2">Sub Category Management
        </h1>

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

        {{-- Add SubCategory Button --}}
        <div class="mb-8">
            <button onclick="openModal()"
                class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-bold rounded-xl shadow-lg hover:bg-blue-700 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Add New Sub Category
            </button>
        </div>

        {{-- Category List Table --}}
        <div class="bg-white p-6 rounded-2xl shadow-xl overflow-hidden">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Category List</h2>
            <div class="overflow-x-auto">
                <table id="categories-table" class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tl-lg">
                                Image
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Category
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Sub Category
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tr-lg">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Add SubCategory Modal --}}
    <div id="addModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden p-4">
        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg p-8 relative transform transition-all sm:scale-100 sm:opacity-100"
            style="opacity: 0; transform: translateY(-20px);">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-3">Add New Sub Category</h2>
            <button onclick="closeModal()"
                class="absolute top-5 right-5 text-gray-500 hover:text-gray-800 transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <form action="{{ route('subcategory.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-5">
                @csrf
                <div>
                    <label for="category_name" class="block text-gray-700 font-medium mb-2 text-sm">Select
                        Category</label>
                    <select name="category_id" id="category_name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition"
                        required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="name" class="block text-gray-700 font-medium mb-2 text-sm">Sub Category Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition"
                        required>
                </div>

                <div>
                    <label for="image" class="block text-gray-700 font-medium mb-2 text-sm">Sub Category
                        Image</label>
                    <input type="file" name="image" id="image"
                        class="w-full text-gray-700 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 file:cursor-pointer transition duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                        required>
                </div>

                <div class="pt-4 flex justify-end gap-3">
                    <button type="button" onclick="closeModal()"
                        class="px-5 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-gray-800 font-medium transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Save Category
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Edit Category Modal --}}
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden p-4">
        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg p-8 relative transform transition-all sm:scale-100 sm:opacity-100"
            style="opacity: 0; transform: translateY(-20px);"> 
            <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-3">Edit Category</h2>
            <button type="button" onclick="closeEditModal()"
                class="absolute top-5 right-5 text-gray-500 hover:text-gray-800 transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <form id="editForm" method="POST" enctype="multipart/form-data"
                action="{{ route('subcategory.update', ['id' => ':id']) }}" class="space-y-5"> 
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit-id">
                <div>
                    <label for="edit-category_name" class="block text-gray-700 font-medium mb-2 text-sm">Select
                        Category</label>
                    <select name="category_id" id="edit-category_name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition"
                        required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2 text-sm" for="edit-name">Name</label>
                    <input type="text" id="edit-name" name="name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2 text-sm" for="edit-image">Image</label>
                    <input type="file" id="edit-image" name="image"
                        class="w-full text-gray-700 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 file:cursor-pointer transition duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
                    <img id="preview-image" src=""
                        class="w-24 h-24 object-cover mt-4 rounded-lg shadow-sm border border-gray-200">
                </div>
                <div class="pt-4 flex justify-end gap-3">
                    <button type="button" onclick="closeEditModal()"
                        class="px-5 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-gray-800 font-medium transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-5 py-2 bg-blue-600 text-white hover:bg-blue-700 rounded-lg font-medium transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            // Add Modal
            function openModal() {
                const modal = document.getElementById('addModal');
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.querySelector('div > div').style.opacity = '1';
                    modal.querySelector('div > div').style.transform = 'translateY(0)';
                }, 10);
            }

            function closeModal() {
                const modal = document.getElementById('addModal');
                modal.querySelector('div > div').style.opacity = '0';
                modal.querySelector('div > div').style.transform = 'translateY(-20px)';
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }

            // Edit Modal
            function openEditModal(id, name, imageUrl, categoryId) {
                const modal = document.getElementById('editModal');
                document.getElementById('edit-id').value = id;
                document.getElementById('edit-name').value = name;
                document.getElementById('preview-image').src = imageUrl;

                const categorySelect = document.getElementById('edit-category_name');
                categorySelect.value = categoryId; 

                const form = document.getElementById('editForm');
                const routeTemplate = '{{ route('subcategory.update', ['id' => ':id']) }}';
                form.setAttribute('action', routeTemplate.replace(':id', id));

                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.querySelector('div > div').style.opacity = '1';
                    modal.querySelector('div > div').style.transform = 'translateY(0)';
                }, 10);
            }

            function closeEditModal() {
                const modal = document.getElementById('editModal');
                modal.querySelector('div > div').style.opacity = '0';
                modal.querySelector('div > div').style.transform = 'translateY(-20px)';
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }


            // Datable Initializationsss
            $('#categories-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('subcategory.data') }}',
                columns: [{
                        data: 'image',
                        name: 'image',
                        render: function(data, type, row) {
                            return `<img src="${data}" alt="${row.name}" class="w-16 h-16 object-cover rounded-lg shadow-sm">`;
                        },
                        orderable: false,
                        searchable: false,
                        className: 'px-6 py-4 whitespace-nowrap'
                    },
                    {
                        data: 'category_id',
                        name: 'category_id',
                        className: 'px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'
                    },

                    {
                        data: 'subcategory',
                        name: 'subcategory',
                        className: 'px-6 py-4 whitespace-nowrap text-sm text-gray-700'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false,
                        className: 'px-6 py-4 whitespace-nowrap text-right text-sm font-medium'
                    }
                ],
            });
        </script>
    @endpush
</x-admin-layout>
