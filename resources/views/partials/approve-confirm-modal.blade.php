<div id="approveConfirmModal"
    class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-[100] p-4 hidden">
    <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-sm mx-auto relative transform transition-all duration-300 scale-95 opacity-0"
        id="approve-modal-content">
        <button type="button" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 focus:outline-none"
            onclick="hideApproveConfirmModal()">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 text-green-600">
                <i class="fas fa-check-circle text-2xl"></i> {{-- Icon untuk Approve --}}
            </div>
            <h3 class="mt-5 text-lg leading-6 font-bold text-gray-900">Approve Application</h3>
            <div class="mt-2">
                <p class="text-sm text-gray-500">Are you sure you want to approve this application? This action will
                    mark it as accepted, and automatically reject all other applications for this project.</p>
            </div>
        </div>

        <div class="mt-6 flex justify-end gap-3">
            <button type="button" onclick="hideApproveConfirmModal()"
                class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:text-sm transition-colors duration-200">
                Cancel
            </button>
            <button type="button" id="confirmApproveButton"
                class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none sm:text-sm transition-colors duration-200">
                Approve
            </button>
        </div>
    </div>
</div>

<script>
    const approveConfirmModal = document.getElementById('approveConfirmModal');
    const approveModalContent = document.getElementById('approve-modal-content');
    let currentApproveForm = null;

    function showApproveConfirmModal(formElement) {
        currentApproveForm = formElement;
        approveConfirmModal.classList.remove('hidden');
        setTimeout(() => {
            approveModalContent.classList.remove('scale-95', 'opacity-0');
            approveModalContent.classList.add('scale-100', 'opacity-100');
        }, 50);
    }

    function hideApproveConfirmModal() {
        approveModalContent.classList.remove('scale-100', 'opacity-100');
        approveModalContent.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            approveConfirmModal.classList.add('hidden');
            currentApproveForm = null;
        }, 300);
    }

    document.getElementById('confirmApproveButton').addEventListener('click', function() {
        if (currentApproveForm) {
            currentApproveForm.submit();
        }
        hideApproveConfirmModal();
    });

    approveConfirmModal.addEventListener('click', function(event) {
        if (event.target === approveConfirmModal) {
            hideApproveConfirmModal();
        }
    });
</script>
