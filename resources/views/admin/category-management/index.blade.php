<x-admin-layout>
    <div class="p-6 h-[100vh]">
        {{-- Page Title --}}
        <h1 class="text-2xl font-semibold mb-4">Category Management</h1>

        {{-- Add Category Button --}}
        <div class="mb-6">
            <button onclick="openModal()"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                + Add Category
            </button>
        </div>

        {{-- User Table --}}
        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-lg font-semibold text-black mb-4">User List</h2>
            <div class="overflow-x-auto">
                <table id="categories-table" class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-3xl p-8 relative">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Add New Category</h2>

            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Category Name --}}
                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-1">Category Name</label>
                        <input type="text" name="name" id="name"
                            class="w-full px-4 py-2 border border-gray-800 rounded-lg focus:outline-none focus:ring focus:border-blue-400"
                            required>
                    </div>

                    {{-- Image Upload --}}
                    <div>
                        <label for="image" class="block text-gray-700 font-medium mb-1">Category Image</label>
                        <input type="file" name="image" id="image"
                            class="w-full h-11 border border-gray-800 rounded-lg px-4 py-2 text-sm text-gray-700 file:bg-gray-100 file:border-0 file:mr-3 file:py-1 file:px-4 file:rounded-lg"
                            required>
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="mt-8 flex justify-end gap-3">
                    <button type="button" onclick="closeModal()"
                        class="px-5 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg text-gray-800 font-medium">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium">
                        Save Category
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl p-6">
            <h2 class="text-xl font-semibold mb-4">Edit Category</h2>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit-id">
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1" for="edit-name">Name</label>
                    <input type="text" id="edit-name" name="name"
                        class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1" for="edit-image">Image</label>
                    <input type="file" id="edit-image" name="image" class="w-full border px-4 py-2 rounded-lg">
                    <img id="preview-image" src="" class="w-24 mt-2 rounded">
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeEditModal()"
                        class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-700 rounded-lg">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            function openModal() {
                document.getElementById('addModal').classList.remove('hidden');
            }

            function closeModal() {
                document.getElementById('addModal').classList.add('hidden');
            }

            function openEditModal(id, name, imageUrl) {
                document.getElementById('edit-id').value = id;
                document.getElementById('edit-name').value = name;
                document.getElementById('preview-image').src = imageUrl;

                const form = document.getElementById('editForm');
                form.action = `/category/${id}`;

                document.getElementById('editModal').classList.remove('hidden');
            }

            function closeEditModal() {
                document.getElementById('editModal').classList.add('hidden');
            }

            $('#categories-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('category.data') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        render: function(data, type, row) {
                            return `<img src="${data}" alt="${row.name}" class="w-16 h-16 object-cover rounded-lg">`;
                        },
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        </script>
    @endpush

</x-admin-layout>
