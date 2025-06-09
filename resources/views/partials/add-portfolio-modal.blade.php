<div id="addPortfolioModal"
    class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-[100] p-4 hidden">
    <div class="bg-white rounded-lg shadow-xl p-4 sm:p-6 w-full max-w-sm sm:max-w-md md:max-w-lg mx-auto relative
                transform transition-all duration-300 scale-95 opacity-0
                flex flex-col max-h-[90vh] overflow-hidden"
        id="modal-content">

        <button type="button"
            class="absolute top-3 right-3 sm:top-4 sm:right-4 text-gray-400 hover:text-gray-600 focus:outline-none"
            onclick="hideAddPortfolioModal()">
            <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4 sm:mb-6 text-center flex-shrink-0">Add New Portfolio
        </h3>

        <div class="flex-grow overflow-y-auto pr-2 custom-scrollbar">
            <form action="{{ route('portfolio.store') }}" method="POST" class="space-y-3 sm:space-y-4"
                enctype="multipart/form-data">
                @csrf

                <div>
                    <label for="title" class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Project
                        Title</label>
                    <input type="text" id="title" name="title" placeholder="e.g., E-commerce Website Redesign"
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
                    <label for="description"
                        class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Description</label>
                    <textarea id="description" name="description" rows="3"
                        placeholder="Briefly describe your project, technologies used, and your role."
                        class="w-full bg-white rounded-md border border-gray-300 text-sm sm:text-base text-gray-800 py-2 px-3 sm:py-2.5 sm:px-4 focus:outline-none focus:ring-1 focus:ring-blue-500 resize-y @error('description') border-red-500 @enderror"
                        required>{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="link" class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Project Link
                        (Optional)</label>
                    <input type="url" id="link" name="link" placeholder="e.g., https://yourproject.com"
                        class="w-full bg-white rounded-md border border-gray-300 text-sm sm:text-base text-gray-800 py-2 px-3 sm:py-2.5 sm:px-4 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('link') border-red-500 @enderror"
                        value="{{ old('link') }}">
                    @error('link')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="images" class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Project
                        Images (Max
                        5)</label>
                    <input type="file" id="images" name="images[]" multiple accept="image/*"
                        class="w-full text-gray-800 text-xs sm:text-sm file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs sm:file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer @error('images') border-red-500 @enderror @error('images.*') border-red-500 @enderror">
                    <p class="text-xs text-gray-500 mt-1">PNG, JPG, JPEG, GIF, SVG (max 2MB per image)</p>
                    <div id="image-preview" class="mt-2 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2">
                    </div>
                    @error('images')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                    @error('images.*')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-6 rounded-md transition-colors duration-200 text-sm sm:text-base flex-shrink-0 mt-4">
                    Save Project
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
    const addPortfolioModal = document.getElementById('addPortfolioModal');
    const modalContent = document.getElementById('modal-content');

    function showAddPortfolioModal() {
        addPortfolioModal.classList.remove('hidden');
        setTimeout(() => {
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }, 50);
    }

    function hideAddPortfolioModal() {
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            addPortfolioModal.classList.add('hidden');
            document.querySelector('#addPortfolioModal form').reset();
            document.getElementById('image-preview').innerHTML = ''; 
            document.getElementById('sub_category_id').innerHTML =
                '<option value="">Select Sub-Category </option>';
            document.querySelectorAll('#addPortfolioModal .border-red-500').forEach(el => {
                el.classList.remove('border-red-500');
            });
            document.querySelectorAll('#addPortfolioModal p.text-red-500.text-xs.italic').forEach(el => {
                el.remove();
            });
            const imageInput = document.getElementById('images');
            if (imageInput) {
                imageInput.value = ''; 
            }
        }, 300);
    }

    document.getElementById('images').addEventListener('change', function(event) {
        const previewContainer = document.getElementById('image-preview');
        previewContainer.innerHTML = '';

        const files = event.target.files;
        if (files.length > 5) {
            alert('You can only upload a maximum of 4 images.');
            this.value = '';
            return;
        }

        Array.from(files).forEach(file => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgDiv = document.createElement('div');
                    imgDiv.className = 'relative group';
                    imgDiv.innerHTML = `
                        <img src="${e.target.result}" class="w-full h-20 sm:h-24 object-cover rounded-md border border-gray-200">
                        <button type="button" class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 sm:w-6 sm:h-6 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity" onclick="removeImage(this, '${file.name}')">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    previewContainer.appendChild(imgDiv);
                };
                reader.readAsDataURL(file);
            }
        });
    });

    function removeImage(button, fileName) {
        const input = document.getElementById('images');
        let files = Array.from(input.files);

        files = files.filter(file => file.name !== fileName);

        const dataTransfer = new DataTransfer();
        files.forEach(file => dataTransfer.items.add(file));
        input.files = dataTransfer.files;

        button.parentElement.remove();
    }

    document.addEventListener('DOMContentLoaded', function() {
        fetchCategories();
    });


    function fetchCategories() {
        const categorySelect = document.getElementById('category_id');
        const oldSelectedCategoryId = '{{ old('category_id', '') }}'; // Ambil old input

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
</script>
