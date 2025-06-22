<div id="reviewSeekerModal"
    class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-[100] p-4 hidden">
    <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md mx-auto relative transform transition-all duration-300 scale-95 opacity-0"
        id="review-seeker-modal-content">
        <button type="button" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 focus:outline-none"
            onclick="hideReviewSeekerModal()">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100 text-yellow-600">
                <i class="fas fa-star text-2xl"></i>
            </div>
            <h3 class="mt-5 text-lg leading-6 font-bold text-gray-900">Rate and Review Seeker</h3>
            <p class="text-sm text-gray-500 mt-2">You are reviewing: <span id="seekerNameForReview"
                    class="font-semibold text-gray-700"></span></p>
        </div>

        <form id="reviewSeekerForm" action="" method="POST" class="mt-6">
            @csrf

            <input type="hidden" name="seeker_id" id="reviewSeekerId">
            <input type="hidden" name="application_id" id="reviewApplicationId">
            <input type="hidden" name="id_project" id="id_project">

            <div class="mb-4">
                <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">Rating:</label>
                <div class="flex justify-center space-x-1" id="starRatingContainer">
                    <i class="far fa-star text-3xl text-gray-300 cursor-pointer hover:text-yellow-400 transition-colors duration-200"
                        data-rating="1"></i>
                    <i class="far fa-star text-3xl text-gray-300 cursor-pointer hover:text-yellow-400 transition-colors duration-200"
                        data-rating="2"></i>
                    <i class="far fa-star text-3xl text-gray-300 cursor-pointer hover:text-yellow-400 transition-colors duration-200"
                        data-rating="3"></i>
                    <i class="far fa-star text-3xl text-gray-300 cursor-pointer hover:text-yellow-400 transition-colors duration-200"
                        data-rating="4"></i>
                    <i class="far fa-star text-3xl text-gray-300 cursor-pointer hover:text-yellow-400 transition-colors duration-200"
                        data-rating="5"></i>
                    <input type="hidden" name="rating" id="ratingInput" value="0" required>
                </div>
                @error('rating')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="review" class="block text-sm font-medium text-gray-700 mb-2">Your Review:</label>
                <textarea name="review" id="reviewText" rows="5"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                    placeholder="Write your review here..." required></textarea>
                @error('review')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="hideReviewSeekerModal()"
                    class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:text-sm transition-colors duration-200">
                    Cancel
                </button>
                <button type="submit"
                    class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:text-sm transition-colors duration-200">
                    Submit Review
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const reviewSeekerModal = document.getElementById('reviewSeekerModal');
    const reviewSeekerModalContent = document.getElementById('review-seeker-modal-content');
    const reviewSeekerForm = document.getElementById('reviewSeekerForm');
    const seekerNameForReview = document.getElementById('seekerNameForReview');
    const reviewSeekerIdInput = document.getElementById('reviewSeekerId');
    const reviewApplicationIdInput = document.getElementById('reviewApplicationId');
    const reviewJobIdInput = document.getElementById('id_project');
    const ratingInput = document.getElementById('ratingInput');
    const starRatingContainer = document.getElementById('starRatingContainer');
    let currentRating = 0;

    function showReviewSeekerModal(seekerId, seekerName, applicationId, jobId) {
        seekerNameForReview.textContent = seekerName;
        reviewSeekerIdInput.value = seekerId;
        reviewApplicationIdInput.value = applicationId;
        reviewJobIdInput.value = jobId;

        reviewSeekerForm.action = `/reviews/${jobId}`;

        currentRating = 0;
        ratingInput.value = 0;
        document.getElementById('reviewText').value = '';
        updateStarRating();

        reviewSeekerModal.classList.remove('hidden');
        setTimeout(() => {
            reviewSeekerModalContent.classList.remove('scale-95', 'opacity-0');
            reviewSeekerModalContent.classList.add('scale-100', 'opacity-100');
        }, 50);
    }

    function hideReviewSeekerModal() {
        reviewSeekerModalContent.classList.remove('scale-100', 'opacity-100');
        reviewSeekerModalContent.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            reviewSeekerModal.classList.add('hidden');
        }, 300);
    }

    starRatingContainer.addEventListener('click', function(e) {
        if (e.target.tagName === 'I') {
            const clickedRating = parseInt(e.target.dataset.rating);
            currentRating = clickedRating;
            ratingInput.value = currentRating;
            updateStarRating();
        }
    });

    starRatingContainer.addEventListener('mouseover', function(e) {
        if (e.target.tagName === 'I') {
            const hoverRating = parseInt(e.target.dataset.rating);
            updateStarRating(hoverRating);
        }
    });

    starRatingContainer.addEventListener('mouseout', function() {
        updateStarRating();
    });

    function updateStarRating(hoverRating = null) {
        const stars = starRatingContainer.querySelectorAll('i');
        stars.forEach(star => {
            const rating = parseInt(star.dataset.rating);
            if (hoverRating !== null) {
                if (rating <= hoverRating) {
                    star.classList.remove('far', 'text-gray-300');
                    star.classList.add('fas', 'text-yellow-500');
                } else {
                    star.classList.remove('fas', 'text-yellow-500');
                    star.classList.add('far', 'text-gray-300');
                }
            } else {
                if (rating <= currentRating) {
                    star.classList.remove('far', 'text-gray-300');
                    star.classList.add('fas', 'text-yellow-500');
                } else {
                    star.classList.remove('fas', 'text-yellow-500');
                    star.classList.add('far', 'text-gray-300');
                }
            }
        });
    }

    reviewSeekerModal.addEventListener('click', function(event) {
        if (event.target === reviewSeekerModal) {
            hideReviewSeekerModal();
        }
    });
</script>
