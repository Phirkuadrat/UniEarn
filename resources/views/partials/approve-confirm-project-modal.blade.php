<div id="completeProjectModal"
    class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-[100] p-4 hidden">
    <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-sm mx-auto relative transform transition-all duration-300 scale-95 opacity-0"
        id="complete-project-modal-content">
        <button type="button" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 focus:outline-none"
            onclick="hideCompleteProjectModal()">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 text-blue-600">
                {{-- Warna biru untuk selesai --}}
                <i class="fas fa-clipboard-check text-2xl"></i> {{-- Icon untuk selesai proyek --}}
            </div>
            <h3 class="mt-5 text-lg leading-6 font-bold text-gray-900">Confirm Project Completion</h3>
            <div class="mt-2">
                <p class="text-sm text-gray-500">
                    Are you sure you want to mark this project as complete?
                    This action will change the project status to 'Completed'.
                    This action might not be easily undone.
                </p>
            </div>
        </div>

        <div class="mt-6 flex justify-end gap-3">
            <button type="button" onclick="hideCompleteProjectModal()"
                class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:text-sm transition-colors duration-200">
                Cancel
            </button>
            <button type="button" id="confirmCompleteProjectButton"
                class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:text-sm transition-colors duration-200">
                Complete Project
            </button>
        </div>
    </div>
</div>

<script>
    const completeProjectModal = document.getElementById('completeProjectModal');
    const completeProjectModalContent = document.getElementById('complete-project-modal-content');
    let currentCompleteProjectForm = null;

    function showCompleteProjectModal(formElement) {
        currentCompleteProjectForm = formElement;
        completeProjectModal.classList.remove('hidden');
        setTimeout(() => {
            completeProjectModalContent.classList.remove('scale-95', 'opacity-0');
            completeProjectModalContent.classList.add('scale-100', 'opacity-100');
        }, 50);
    }

    function hideCompleteProjectModal() {
        completeProjectModalContent.classList.remove('scale-100', 'opacity-100');
        completeProjectModalContent.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            completeProjectModal.classList.add('hidden');
            currentCompleteProjectForm = null;
        }, 300);
    }

    document.getElementById('confirmCompleteProjectButton').addEventListener('click', function() {
        if (currentCompleteProjectForm) {
            currentCompleteProjectForm.submit();
        }
        hideCompleteProjectModal();
    });

    completeProjectModal.addEventListener('click', function(event) {
        if (event.target === completeProjectModal) {
            hideCompleteProjectModal();
        }
    });
</script>
