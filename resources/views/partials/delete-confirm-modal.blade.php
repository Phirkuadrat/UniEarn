<div id="deleteConfirmModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-[100] p-4 hidden">
    <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-sm mx-auto relative transform transition-all duration-300 scale-95 opacity-0"
        id="delete-modal-content">
        <button type="button" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 focus:outline-none"
            onclick="hideDeleteConfirmModal()">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 text-red-600">
                <i class="fas fa-exclamation-triangle text-2xl"></i>
            </div>
            <h3 class="mt-5 text-lg leading-6 font-bold text-gray-900">Delete Project</h3>
            <div class="mt-2">
                <p class="text-sm text-gray-500">Are you sure you want to delete this project? This action cannot be undone.</p>
            </div>
        </div>

        <div class="mt-6 flex justify-end gap-3">
            <button type="button" onclick="hideDeleteConfirmModal()"
                class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:text-sm transition-colors duration-200">
                Cancel
            </button>
            <button type="button" id="confirmDeleteButton"
                class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:text-sm transition-colors duration-200">
                Delete
            </button>
        </div>
    </div>
</div>

<script>
    const deleteConfirmModal = document.getElementById('deleteConfirmModal');
    const deleteModalContent = document.getElementById('delete-modal-content');
    let currentDeleteForm = null; 

    function showDeleteConfirmModal(formElement) {
        currentDeleteForm = formElement; 
        deleteConfirmModal.classList.remove('hidden');
        setTimeout(() => {
            deleteModalContent.classList.remove('scale-95', 'opacity-0');
            deleteModalContent.classList.add('scale-100', 'opacity-100');
        }, 50);
    }

    function hideDeleteConfirmModal() {
        deleteModalContent.classList.remove('scale-100', 'opacity-100');
        deleteModalContent.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            deleteConfirmModal.classList.add('hidden');
            currentDeleteForm = null; 
        }, 300);
    }

    document.getElementById('confirmDeleteButton').addEventListener('click', function() {
        if (currentDeleteForm) {
            currentDeleteForm.submit(); 
        }
        hideDeleteConfirmModal(); 
    });

    deleteConfirmModal.addEventListener('click', function(event) {
        if (event.target === deleteConfirmModal) {
            hideDeleteConfirmModal();
        }
    });
</script>