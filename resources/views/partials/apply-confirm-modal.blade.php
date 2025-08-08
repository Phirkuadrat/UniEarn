<div id="applyConfirmModal"
    class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-[100] p-4 hidden">
    <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-sm mx-auto relative transform transition-all duration-300 scale-95 opacity-0"
        id="apply-modal-content">
        <button type="button" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 focus:outline-none"
            onclick="hideApplyConfirmModal()">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 text-blue-600">
                <i class="fas fa-paper-plane text-2xl"></i>
            </div>
            <h3 class="mt-5 text-lg leading-6 font-bold text-gray-900">Confirm Application</h3>
            <div class="mt-2">
                <p class="text-sm text-gray-500">Are you sure you want to apply for this project? You will not be able
                    to undo this application directly.</p>
            </div>
        </div>

        <div class="mt-6 flex justify-end gap-3">
            <button type="button" onclick="hideApplyConfirmModal()"
                class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:text-sm transition-colors duration-200">
                Cancel
            </button>
            <button type="button" id="confirmApplyButton"
                class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:text-sm transition-colors duration-200">
                Confirm Apply
            </button>
        </div>
    </div>
</div>

<script>
    const applyConfirmModal = document.getElementById('applyConfirmModal');
    const applyModalContent = document.getElementById('apply-modal-content');
    let currentApplyForm = null; 

    function showApplyConfirmModal(formElement) {
        currentApplyForm = formElement; // Simpan referensi form
        applyConfirmModal.classList.remove('hidden');
        setTimeout(() => {
            applyModalContent.classList.remove('scale-95', 'opacity-0');
            applyModalContent.classList.add('scale-100', 'opacity-100');
        }, 50);
    }

    function hideApplyConfirmModal() {
        applyModalContent.classList.remove('scale-100', 'opacity-100');
        applyModalContent.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            applyConfirmModal.classList.add('hidden');
            currentApplyForm = null; // Reset referensi form
        }, 300);
    }

    // Event listener untuk tombol "Confirm Apply" di dalam modal konfirmasi
    document.getElementById('confirmApplyButton').addEventListener('click', function() {
        if (currentApplyForm) {
            currentApplyForm.submit(); // Submit form yang disimpan
        }
        hideApplyConfirmModal(); // Sembunyikan modal
    });

    // Optional: Tutup modal jika mengklik di luar area konten modal
    applyConfirmModal.addEventListener('click', function(event) {
        if (event.target === applyConfirmModal) {
            hideApplyConfirmModal();
        }
    });
</script>
