<x-app-layout>

    <body class="bg-[#F2FAFC]">

        <div class="max-w-7xl mx-auto px-4 py-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-6">Project List</h1>

            <!-- Tombol Tambah Project -->
            <div class="fixed bottom-6 right-6">
                <button class="bg-blue-600 text-white px-5 py-3 rounded-full shadow-lg hover:bg-blue-700 transition duration-300"
                    onclick="openCreateModal()">
                    + Create Project
                </button>
            </div>

            <!-- Table Project -->
            <div class="overflow-x-auto bg-white shadow rounded-lg">
                <table class="w-full table-auto border-collapse">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="py-3 px-6 text-left">No</th>
                            <th class="py-3 px-6 text-left">Title</th>
                            <th class="py-3 px-6 text-left">Category</th>
                            <th class="py-3 px-6 text-left">Status</th>
                            <th class="py-3 px-6 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- BACKEND: Loop data projects --}}
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-6">1</td>
                            <td class="py-3 px-6">Website Kasir</td>
                            <td class="py-3 px-6">Programmer</td>
                            <td class="py-3 px-6">Open</td>
                            <td class="py-3 px-6 flex space-x-2">
                                <button onclick="openDetailModal()">
                                    <svg class="w-5 h-5 text-blue-600 hover:text-blue-800" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 3a7 7 0 100 14A7 7 0 0010 3zm0 12a5 5 0 110-10 5 5 0 010 10z" />
                                        <path d="M10 8a1 1 0 100 2 1 1 0 000-2zm-1 4h2v1h-2v-1z" />
                                    </svg>
                                </button>
                                <button onclick="openEditModal()">
                                    <svg class="w-5 h-5 text-green-600 hover:text-green-800" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M17.414 2.586a2 2 0 010 2.828L8.414 14.414l-4.95 1.414 1.414-4.95 9-9a2 2 0 012.828 0zM4 16h12v2H4v-2z" />
                                    </svg>
                                </button>
                                <button onclick="deleteProject()">
                                    <svg class="w-5 h-5 text-red-600 hover:text-red-800" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H3a1 1 0 100 2h1v11a2 2 0 002 2h8a2 2 0 002-2V6h1a1 1 0 100-2h-2V3a1 1 0 00-1-1H6zm2 4a1 1 0 012 0v8a1 1 0 11-2 0V6zm4 0a1 1 0 10-2 0v8a1 1 0 102 0V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        {{-- BACKEND: Akhir loop --}}
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Detail -->
        <div id="detailModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 max-w-lg w-full shadow-xl">
                <h2 class="text-2xl font-bold mb-4">Project Details</h2>
                <div class="space-y-2">
                    <p><strong>Title:</strong> Website Kasir</p>
                    <p><strong>Category:</strong> Programmer</p>
                    <p><strong>Description:</strong> Sistem kasir untuk minimarket</p>
                    <p><strong>File:</strong> <a href="#" class="text-blue-600 underline">kasir_doc.pdf</a></p>
                    <p><strong>Deadline:</strong> 2025-12-31 23:59</p>
                    <p><strong>Status:</strong> Open</p>
                </div>
                <div class="flex justify-end mt-6">
                    <button class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400" onclick="closeDetailModal()">Close</button>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div id="editModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 max-w-lg w-full shadow-xl">
                <h2 class="text-2xl font-bold mb-4">Edit Project</h2>
                <form method="POST" action="#">
                    @csrf
                    <div class="mb-3">
                        <label class="block mb-1">Title</label>
                        <input type="text" name="edit_title" id="edit_title" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div class="mb-3">
                        <label class="block mb-1">Description</label>
                        <textarea name="edit_description" id="edit_description" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block mb-1">File URI</label>
                        <input type="text" name="edit_file_uri" id="edit_file_uri" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div class="mb-3">
                        <label class="block mb-1">Category</label>
                        <select name="edit_category" id="edit_category" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
                            <option value="Programmer">Programmer</option>
                            <option value="Designer">Designer</option>
                            <option value="Analyst">Analyst</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="block mb-1">Deadline</label>
                        <input type="datetime-local" name="edit_deadline" id="edit_deadline" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Status</label>
                        <select name="edit_status" id="edit_status" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
                            <option value="Open">Open</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Done">Done</option>
                        </select>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400" onclick="closeEditModal()">Cancel</button>
                        <button type="button" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700" onclick="updateProject()">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Create -->
        <div id="createModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 max-w-lg w-full shadow-xl">
                <h2 class="text-2xl font-bold mb-4">Create Project</h2>
                <form method="POST" action="#">
                    @csrf
                    <div class="mb-3">
                        <label class="block mb-1">Title</label>
                        <input type="text" name="title" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div class="mb-3">
                        <label class="block mb-1">Description</label>
                        <textarea name="description" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block mb-1">File URI</label>
                        <input type="text" name="file_uri" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div class="mb-3">
                        <label class="block mb-1">Category</label>
                        <input type="text" name="category" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div class="mb-3">
                        <label class="block mb-1">Deadline</label>
                        <input type="datetime-local" name="deadline" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Status</label>
                        <select name="status" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
                            <option value="Open">Open</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Done">Done</option>
                        </select>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400" onclick="closeCreateModal()">Cancel</button>
                        <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700" onclick="saveProject()">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Notifikasi -->
        <div id="notif" class="fixed top-6 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-4 py-2 rounded shadow-lg hidden">
            <span id="notifMessage"></span>
        </div>

        <script>
            function openDetailModal() {
                document.getElementById('detailModal').classList.remove('hidden');
            }

            function closeDetailModal() {
                document.getElementById('detailModal').classList.add('hidden');
            }

            function openEditModal() {
                document.getElementById('edit_title').value = 'Website Kasir';
                document.getElementById('edit_description').value = 'Sistem kasir untuk minimarket';
                document.getElementById('edit_file_uri').value = 'kasir_doc.pdf';
                document.getElementById('edit_category').value = 'Programmer';
                document.getElementById('edit_deadline').value = '2025-12-31T23:59';
                document.getElementById('edit_status').value = 'Open';
                document.getElementById('editModal').classList.remove('hidden');
            }

            function closeEditModal() {
                document.getElementById('editModal').classList.add('hidden');
            }

            function updateProject() {
                closeEditModal();
                showNotif("Project berhasil diupdate.");
            }

            function openCreateModal() {
                document.getElementById('createModal').classList.remove('hidden');
            }

            function closeCreateModal() {
                document.getElementById('createModal').classList.add('hidden');
            }

            function saveProject() {
                closeCreateModal();
                showNotif("Project berhasil dibuat.");
            }

            function deleteProject() {
                showNotif("Project telah dihapus.");
            }

            function showNotif(message) {
                const notif = document.getElementById('notif');
                document.getElementById('notifMessage').innerText = message;
                notif.classList.remove('hidden');
                notif.classList.add('animate-bounce');

                setTimeout(() => {
                    notif.classList.add('hidden');
                    notif.classList.remove('animate-bounce');
                }, 2000);
            }
        </script>

    </body>

</x-app-layout>