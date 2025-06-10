<div id="addProjectModal"
    class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-[100] p-4 hidden">
    <div class="bg-white rounded-lg shadow-xl p-4 sm:p-6 w-full max-w-sm sm:max-w-md md:max-w-lg mx-auto relative
                transform transition-all duration-300 scale-95 opacity-0
                flex flex-col max-h-[90vh] overflow-hidden"
        id="project-modal-content">

        <button type="button"
            class="absolute top-3 right-3 sm:top-4 sm:right-4 text-gray-400 hover:text-gray-600 focus:outline-none"
            onclick="hideAddProjectModal()">
            <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4 sm:mb-6 text-center flex-shrink-0">Post New Project
        </h3>

        <div class="flex-grow overflow-y-auto pr-2 custom-scrollbar">
            <form action="{{ route('project.store') }}" method="POST" class="space-y-3 sm:space-y-4">
                @csrf

                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                <div>
                    <label for="project_title" class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Project
                        Title</label>
                    <input type="text" id="project_title" name="title" placeholder="e.g., Mobile App UI/UX Design"
                        class="w-full bg-white rounded-md border border-gray-300 text-sm sm:text-base text-gray-800 py-2 px-3 sm:py-2.5 sm:px-4 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('title') border-red-500 @enderror"
                        value="{{ old('title') }}" required>
                    @error('title')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                    <div>
                        <label for="category_id"
                            class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Category</label>
                        <select id="category_id" name="category_id" required
                            class="w-full bg-white rounded-md border border-gray-300 text-sm sm:text-base text-gray-800 py-2 px-3 sm:py-2.5 sm:px-4 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('category_id') border-red-500 @enderror">
                            <option value="">Select Category</option>
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="sub_category_id"
                            class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Sub-Category</label>
                        <select id="sub_category_id" name="sub_category_id"
                            class="w-full bg-white rounded-md border border-gray-300 text-sm sm:text-base text-gray-800 py-2 px-3 sm:py-2.5 sm:px-4 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('sub_category_id') border-red-500 @enderror">
                            <option value="">Select Sub-Category</option>
                        </select>
                        @error('sub_category_id')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="project_description"
                        class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Description</label>
                    <textarea id="project_description" name="description" rows="4"
                        placeholder="Detailed description of the project requirements and tasks."
                        class="w-full bg-white rounded-md border border-gray-300 text-sm sm:text-base text-gray-800 py-2 px-3 sm:py-2.5 sm:px-4 focus:outline-none focus:ring-1 focus:ring-blue-500 resize-y @error('description') border-red-500 @enderror"
                        required>{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="project_budget"
                        class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Budget (Rupiah)</label>
                    <input type="number" id="project_budget" name="budget" placeholder="e.g., 5000000"
                        class="w-full bg-white rounded-md border border-gray-300 text-sm sm:text-base text-gray-800 py-2 px-3 sm:py-2.5 sm:px-4 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('budget') border-red-500 @enderror"
                        value="{{ old('budget') }}" step="any" min="0" required>
                    @error('budget')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="project_due_date" class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Due
                        Date</label>
                    <input type="date" id="project_due_date" name="due_date"
                        class="w-full bg-white rounded-md border border-gray-300 text-sm sm:text-base text-gray-800 py-2 px-3 sm:py-2.5 sm:px-4 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('due_date') border-red-500 @enderror"
                        value="{{ old('due_date') }}" required>
                    @error('due_date')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="project_status"
                        class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Status</label>
                    <select id="project_status" name="status"
                        class="w-full bg-white rounded-md border border-gray-300 text-sm sm:text-base text-gray-800 py-2 px-3 sm:py-2.5 sm:px-4 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('status') border-red-500 @enderror"
                        required>
                        <option value="">Select Status</option>
                        <option value="Open" {{ old('status') == 'Open' ? 'selected' : '' }}>Open</option>
                        <option value="Closed" {{ old('status') == 'Closed' ? 'selected' : '' }}>Draft</option>
                        </option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-6 rounded-md transition-colors duration-200 text-sm sm:text-base flex-shrink-0 mt-4">
                    Post Project
                </button>
            </form>
        </div>
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .custom-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: #888 #f1f1f1;
    }
</style>

<script>
    const addProjectModal = document.getElementById('addProjectModal');
    const projectModalContent = document.getElementById('project-modal-content');

    function showAddProjectModal() {
        addProjectModal.classList.remove('hidden');
        setTimeout(() => {
            projectModalContent.classList.remove('scale-95', 'opacity-0');
            projectModalContent.classList.add('scale-100', 'opacity-100');
        }, 50);
    }

    function hideAddProjectModal() {
        projectModalContent.classList.remove('scale-100', 'opacity-100');
        projectModalContent.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            addProjectModal.classList.add('hidden');
            document.querySelector('#addProjectModal form').reset();
            document.getElementById('project_sub_category_id').innerHTML =
                '<option value="">Select Sub-Category</option>';
            document.querySelectorAll('#addProjectModal .border-red-500').forEach(el => {
                el.classList.remove('border-red-500');
            });
            document.querySelectorAll('#addProjectModal p.text-red-500.text-xs.italic').forEach(el => {
                el.remove();
            });
        }, 300);
    }

    document.addEventListener('DOMContentLoaded', function() {
        fetchCategories();
    });


    function fetchCategories() {
        const categorySelect = document.getElementById('category_id');
        const oldSelectedCategoryId = '{{ old('category_id', '') }}';

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
                    if (category.id == oldSelectedCategoryId) {
                        option.selected = true;
                    }
                    categorySelect.appendChild(option);
                });
                if (oldSelectedCategoryId) {
                    const oldSubCategoryId = '{{ old('sub_category_id', '') }}';
                    fetchSubCategories(oldSelectedCategoryId, oldSubCategoryId);
                }
            })
            .catch(error => {
                console.error('Error fetching categories:', error);
                categorySelect.innerHTML = '<option value="">Failed to load categories</option>';
            });
    }

    function fetchSubCategories(categoryId, selectedSubCategoryId = null) {
        const subCategorySelect = document.getElementById('sub_category_id');
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
                console.error('Error fetching sub-categories:', error);
                subCategorySelect.innerHTML = '<option value="">Failed to load sub-categories</option>';
            });
    }

    document.getElementById('category_id').addEventListener('change', function() {
        fetchSubCategories(this.value);
    });

    document.addEventListener('DOMContentLoaded', function() {
        @if ($errors->any() && (old('from_add_project_modal') || session('from_add_project_modal')))
            showAddProjectModal();
            const oldProjectCategoryId = '{{ old('category_id', '') }}';
            fetchCategoriesForProject(oldProjectCategoryId);
            if (oldProjectCategoryId) {
                const oldProjectSubCategoryId = '{{ old('sub_category_id', '') }}';
                fetchSubCategoriesForProject(oldProjectCategoryId, oldProjectSubCategoryId);
            }
        @endif
    });
</script>
