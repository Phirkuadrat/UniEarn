<div id="editProjectModal"
    class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-[100] p-4 hidden">
    <div class="bg-white rounded-lg shadow-xl p-4 sm:p-6 w-full max-w-sm sm:max-w-md md:max-w-lg mx-auto relative
                transform transition-all duration-300 scale-95 opacity-0
                flex flex-col max-h-[90vh] overflow-hidden"
        id="edit-project-modal-content">

        <button type="button"
            class="absolute top-3 right-3 sm:top-4 sm:right-4 text-gray-400 hover:text-gray-600 focus:outline-none"
            onclick="hideEditProjectModal()">
            <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4 sm:mb-6 text-center flex-shrink-0">Edit Project</h3>

        <div class="flex-grow overflow-y-auto pr-2 custom-scrollbar">
            <form id="editProjectForm" action="" method="POST" class="space-y-3 sm:space-y-4">
                @csrf
                @method('PUT') {{-- Penting untuk operasi update --}}

                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                <div>
                    <label for="edit_project_title"
                        class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Project Title</label>
                    <input type="text" id="edit_project_title" name="title"
                        placeholder="e.g., Mobile App UI/UX Design"
                        class="w-full bg-white rounded-md border border-gray-300 text-sm sm:text-base text-gray-800 py-2 px-3 sm:py-2.5 sm:px-4 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('title') border-red-500 @enderror"
                        value="{{ old('title') }}" required> {{-- value akan diisi oleh JS --}}
                    @error('title')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                    <div>
                        <label for="edit_project_category_id"
                            class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Category</label>
                        <select id="edit_project_category_id" name="category_id" required
                            class="w-full bg-white rounded-md border border-gray-300 text-sm sm:text-base text-gray-800 py-2 px-3 sm:py-2.5 sm:px-4 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('category_id') border-red-500 @enderror">
                            <option value="">Select Category</option>
                            {{-- Opsi akan diisi oleh JavaScript --}}
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="edit_project_sub_category_id"
                            class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Sub-Category</label>
                        <select id="edit_project_sub_category_id" name="sub_category_id"
                            class="w-full bg-white rounded-md border border-gray-300 text-sm sm:text-base text-gray-800 py-2 px-3 sm:py-2.5 sm:px-4 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('sub_category_id') border-red-500 @enderror">
                            <option value="">Select Sub-Category (Optional)</option>
                            {{-- Opsi akan diisi oleh JavaScript --}}
                        </select>
                        @error('sub_category_id')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="edit_project_description"
                        class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Description</label>
                    <textarea id="edit_project_description" name="description" rows="4"
                        placeholder="Detailed description of the project requirements and tasks."
                        class="w-full bg-white rounded-md border border-gray-300 text-sm sm:text-base text-gray-800 py-2 px-3 sm:py-2.5 sm:px-4 focus:outline-none focus:ring-1 focus:ring-blue-500 resize-y @error('description') border-red-500 @enderror"
                        required>{{ old('description') }}</textarea> {{-- value akan diisi oleh JS --}}
                    @error('description')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="edit_project_budget"
                        class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Budget</label>
                    {{-- Label sederhana --}}
                    <input type="number" id="edit_project_budget" name="budget" placeholder="e.g., 5000000"
                        class="w-full bg-white rounded-md border border-gray-300 text-sm sm:text-base text-gray-800 py-2 px-3 sm:py-2.5 sm:px-4 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('budget') border-red-500 @enderror"
                        value="{{ old('budget') }}" step="any" min="0" required> {{-- type="number" --}}
                    @error('budget')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="edit_project_due_date"
                        class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Due Date</label>
                    <input type="date" id="edit_project_due_date" name="due_date"
                        class="w-full bg-white rounded-md border border-gray-300 text-sm sm:text-base text-gray-800 py-2 px-3 sm:py-2.5 sm:px-4 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('due_date') border-red-500 @enderror"
                        value="{{ old('due_date') }}" required> {{-- value akan diisi oleh JS --}}
                    @error('due_date')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="edit_project_status"
                        class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Status</label>
                    <select id="edit_project_status" name="status"
                        class="w-full bg-white rounded-md border border-gray-300 text-sm sm:text-base text-gray-800 py-2 px-3 sm:py-2.5 sm:px-4 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('status') border-red-500 @enderror"
                        required>
                        <option value="">Select Status</option>
                        <option value="open">Open</option>
                        <option value="draft">Draft</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-6 rounded-md transition-colors duration-200 text-sm sm:text-base flex-shrink-0 mt-4">
                    Save Changes
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    const editProjectModal = document.getElementById('editProjectModal');
    const editProjectModalContent = document.getElementById('edit-project-modal-content');
    let currentEditProjectId = null;
    let editProjectForm = document.getElementById('editProjectForm');

    function showEditProjectModal(projectId) {
        currentEditProjectId = projectId;
        editProjectForm.action = `/project/${projectId}`;
        fetchProjectData(projectId);
        editProjectModal.classList.remove('hidden');
        setTimeout(() => {
            editProjectModalContent.classList.remove('scale-95', 'opacity-0');
            editProjectModalContent.classList.add('scale-100', 'opacity-100');
        }, 50);
    }

    function hideEditProjectModal() {
        editProjectModalContent.classList.remove('scale-100', 'opacity-100');
        editProjectModalContent.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            editProjectModal.classList.add('hidden');
            resetEditProjectModal();
        }, 300);
    }

    function resetEditProjectModal() {
        editProjectForm.reset();
        document.getElementById('edit_project_sub_category_id').innerHTML =
            '<option value="">Select Sub-Category (Optional)</option>';
        document.querySelectorAll('#editProjectModal .border-red-500').forEach(el => {
            el.classList.remove('border-red-500');
        });
        document.querySelectorAll('#editProjectModal p.text-red-500.text-xs.italic').forEach(el => {
            el.remove();
        });
        document.getElementById('edit_project_budget').value = '';
    }

    function fetchProjectData(projectId) {
        fetch(`/project/${projectId}/edit-data`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                populateEditProjectForm(data);
            })
            .catch(error => {
                console.error('Error fetching project data:', error);
            });
    }

    function populateEditProjectForm(data) {
        document.getElementById('edit_project_title').value = data.title;
        document.getElementById('edit_project_description').value = data.description;
        document.getElementById('edit_project_due_date').value = data.due_date;

        document.getElementById('edit_project_budget').value = data.budget;

        const statusSelect = document.getElementById('edit_project_status');
        Array.from(statusSelect.options).forEach(option => {
            if (option.value === data.status) {
                option.selected = true;
            } else {
                option.selected = false;
            }
        });

        fetchCategoriesForProjectEdit(data.category_id);
        if (data.sub_category_id) {
            fetchSubCategoriesForProjectEdit(data.category_id, data
                .sub_category_id); 
        } else {
            document.getElementById('edit_project_sub_category_id').innerHTML =
                '<option value="">Select Sub-Category (Optional)</option>';
        }
    }


    function fetchCategoriesForProjectEdit(selectedCategoryId) {
        const categorySelect = document.getElementById('edit_project_category_id');
        categorySelect.innerHTML = '<option value="">Loading Categories...</option>';

        fetch('/categories/get')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                categorySelect.innerHTML = '<option value="">Select Category</option>';
                data.forEach(category => {
                    const option = document.createElement('option');
                    option.value = category.id;
                    option.textContent = category.name;
                    if (category.id == selectedCategoryId) {
                        option.selected = true;
                    }
                    categorySelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching categories for project edit:', error);
                categorySelect.innerHTML = '<option value="">Failed to load categories</option>';
            });
    }

    function fetchSubCategoriesForProjectEdit(categoryId, selectedSubCategoryId = null) {
        const subCategorySelect = document.getElementById('edit_project_sub_category_id');
        subCategorySelect.innerHTML = '<option value="">Loading Sub-Categories...</option>';

        if (!categoryId) {
            subCategorySelect.innerHTML = '<option value="">Select Sub-Category (Optional)</option>';
            return;
        }

        fetch(`/sub-categories/get?category_id=${categoryId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                subCategorySelect.innerHTML = '<option value="">Select Sub-Category (Optional)</option>';
                data.forEach(subCategory => {
                    const option = document.createElement('option');
                    option.value = subCategory.id;
                    option.textContent = subCategory.name;
                    if (subCategory.id == selectedSubCategoryId) {
                        option.selected = true;
                    }
                    subCategorySelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching sub-categories for project edit:', error);
                subCategorySelect.innerHTML = '<option value="">Failed to load sub-categories</option>';
            });
    }

    document.getElementById('edit_project_category_id').addEventListener('change', function() {
        fetchSubCategoriesForProjectEdit(this.value);
    });

    document.addEventListener('DOMContentLoaded', function() {
        @if ($errors->any() && (old('from_add_project_modal') || session('from_add_project_modal')))
            showAddProjectModal();
            const oldAddProjectCategoryId = '{{ old('category_id', '') }}';
            if (oldAddProjectCategoryId) {
                fetchCategoriesForProject(oldAddProjectCategoryId);
                const oldAddProjectSubCategoryId = '{{ old('sub_category_id', '') }}';
                if (oldAddProjectSubCategoryId) {
                    fetchSubCategoriesForProject(oldAddProjectCategoryId, oldAddProjectSubCategoryId);
                }
            }
        @endif

        @if ($errors->any() && session('from_edit_project_modal') && session('project_id_for_edit'))
            const projectIdToEdit = {{ session('project_id_for_edit') }};
            showEditProjectModal(projectIdToEdit);

            const oldEditProjectCategoryId = '{{ old('category_id', '') }}';
            if (oldEditProjectCategoryId) {
                fetchCategoriesForProjectEdit(
                    oldEditProjectCategoryId);
                const oldEditProjectSubCategoryId = '{{ old('sub_category_id', '') }}';
                if (oldEditProjectSubCategoryId) {
                    fetchSubCategoriesForProjectEdit(oldEditProjectCategoryId,
                        oldEditProjectSubCategoryId);
                }
            }
        @endif
    });
</script>
