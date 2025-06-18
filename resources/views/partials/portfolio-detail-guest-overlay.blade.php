<div id="portfolioDetailOverlay" class="fixed inset-0 bg-black bg-opacity-75 z-[200] hidden overflow-hidden">
    <div class="absolute bottom-0 left-0 right-0 bg-white rounded-t-2xl shadow-2xl
                transform translate-y-full transition-transform duration-500 ease-out
                h-[90vh] md:h-[95vh] flex flex-col p-4 sm:p-6 lg:p-8"
        id="portfolio-detail-content">
        <div class="flex justify-between items-center pb-4 mb-4 border-b border-gray-200 flex-shrink-0">
            <div class="flex items-center gap-3">
                <img id="overlay-user-profile-picture" src="" alt="User Profile"
                    class="w-10 h-10 rounded-full object-cover hidden">
                <div id="overlay-user-profile-picture-placeholder"
                    class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center hidden">
                    <i class="fas fa-user text-blue-600 text-lg"></i>
                </div>
                <div>
                    <h3 id="overlay-user-name" class="text-xl sm:text-2xl font-bold text-gray-900"></h3>
                    <p id="overlay-user-email" class="text-sm text-gray-600"></p> {{-- Ini akan jadi email user --}}
                </div>
            </div>
            <button type="button" class="text-gray-500 hover:text-gray-700 focus:outline-none"
                onclick="hidePortfolioDetail()">
                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <div id="overlay-loading-spinner" class="flex-1 flex items-center justify-center text-blue-600 hidden">
            <i class="fas fa-spinner fa-spin fa-3x"></i>
        </div>

        <div id="overlay-actual-content" class="flex-1 overflow-y-auto pr-2 custom-scrollbar hidden">
            <div class="mb-6 flex flex-col items-center"> {{-- Tambahkan flex flex-col items-center untuk menengahkan gambar jika tidak w-full --}}
                <img id="detail-main-image" src="" alt="Project Image"
                    class="w-full max-w-full h-auto max-h-[50vh] md:max-h-[65vh] object-contain rounded-lg mb-4">
                <div id="detail-thumbnails" class="flex space-x-2 overflow-x-auto pb-2 w-full justify-center">
                    {{-- w-full justify-center --}}
                </div>
            </div>

            <h4 id="detail-title" class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2"></h4>
            <p id="detail-category" class="text-blue-600 text-base mb-4"></p>

            <div class="mb-6">
                <h5 class="font-semibold text-lg text-gray-800 mb-2">Description</h5>
                <p id="detail-description" class="text-gray-700 leading-relaxed"></p>
            </div>

            <div class="mb-6">
                <h5 class="font-semibold text-lg text-gray-800 mb-2">Project Link</h5>
                <a id="detail-link" href="#" target="_blank"
                    class="text-blue-600 hover:underline flex items-center gap-2">
                    Visit Project <i class="fas fa-external-link-alt text-sm"></i>
                </a>
            </div>

            <div id="detail-additional-images" class="mb-6 hidden">
                <h5 class="font-semibold text-lg text-gray-800 mb-2">More Images</h5>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript untuk Overlay Detail Portofolio
    const portfolioDetailOverlay = document.getElementById('portfolioDetailOverlay');
    const portfolioDetailContent = document.getElementById('portfolio-detail-content');
    const overlayLoadingSpinner = document.getElementById('overlay-loading-spinner');
    const overlayActualContent = document.getElementById('overlay-actual-content');
    const overlayUserProfilePicture = document.getElementById('overlay-user-profile-picture');
    const overlayUserProfilePicturePlaceholder = document.getElementById('overlay-user-profile-picture-placeholder');
    const overlayUserName = document.getElementById('overlay-user-name');
    const overlayUserEmail = document.getElementById('overlay-user-email');

    const detailMainImage = document.getElementById('detail-main-image');
    const detailThumbnails = document.getElementById('detail-thumbnails');
    const detailTitle = document.getElementById('detail-title');
    const detailCategory = document.getElementById('detail-category');
    const detailDescription = document.getElementById('detail-description');
    const detailLink = document.getElementById('detail-link');
    const detailAdditionalImagesContainer = document.getElementById('detail-additional-images');
    const detailAdditionalImagesGrid = detailAdditionalImagesContainer.querySelector('div');


    function showPortfolioDetail(portfolioId) {
        portfolioDetailOverlay.classList.remove('hidden');
        overlayLoadingSpinner.classList.remove('hidden');
        overlayActualContent.classList.add('hidden');

        setTimeout(() => {
            portfolioDetailContent.classList.remove('translate-y-full');
        }, 50);

        fetch(`/portfolio/${portfolioId}/details`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                populatePortfolioDetail(data);
                overlayLoadingSpinner.classList.add('hidden');
                overlayActualContent.classList.remove('hidden');
            })
            .catch(error => {
                console.error('Error fetching portfolio details:', error);
                overlayLoadingSpinner.classList.add('hidden');
                hidePortfolioDetail();
            });
    }

    function hidePortfolioDetail() {
        portfolioDetailContent.classList.add('translate-y-full');
        setTimeout(() => {
            portfolioDetailOverlay.classList.add('hidden');
            detailMainImage.src = '';
            detailThumbnails.innerHTML = '';
            detailTitle.textContent = '';
            detailCategory.textContent = '';
            detailDescription.textContent = '';
            detailLink.href = '#';
            detailLink.innerHTML = '';
            detailAdditionalImagesContainer.classList.add('hidden');
            detailAdditionalImagesGrid.innerHTML = '';
            overlayUserProfilePicture.src = '';
            overlayUserProfilePicture.classList.add('hidden');
            overlayUserProfilePicturePlaceholder.classList.add('hidden');
            overlayUserName.textContent = '';
            overlayUserEmail.textContent = '';
        }, 500);
    }

    function populatePortfolioDetail(data) {
        detailTitle.textContent = data.title;
        overlayUserName.textContent = data.seeker_user_name;
        overlayUserEmail.textContent = data.seeker_user_email;

        let categoryText = data.category ? data.category : 'N/A';
        if (data.sub_category) {
            categoryText += ` / ${data.sub_category}`;
        }
        detailCategory.textContent = categoryText;
        detailDescription.textContent = data.description;

        if (data.seeker_profile_picture) {
            overlayUserProfilePicture.src = data.seeker_profile_picture;
            overlayUserProfilePicture.classList.remove('hidden');
            overlayUserProfilePicturePlaceholder.classList.add('hidden');
        } else {
            overlayUserProfilePicture.classList.add('hidden');
            overlayUserProfilePicturePlaceholder.classList.remove('hidden');
        }

        if (data.link) {
            detailLink.href = data.link;
            detailLink.innerHTML = `Visit Project <i class="fas fa-external-link-alt text-sm"></i>`;
        } else {
            detailLink.href = '#';
            detailLink.innerHTML = 'No external link';
        }

        detailThumbnails.innerHTML = '';
        detailAdditionalImagesGrid.innerHTML = '';
        detailAdditionalImagesContainer.classList.add('hidden');

        if (data.images && data.images.length > 0) {
            detailMainImage.src = data.images[0].image_path;

            if (data.images.length > 1) {
                detailThumbnails.classList.remove('hidden');
                data.images.forEach((image, index) => {
                    const thumbImg = document.createElement('img');
                    thumbImg.src = image.image_path;
                    thumbImg.alt = `Thumbnail ${index + 1}`;
                    thumbImg.className =
                        'w-16 h-16 object-cover rounded-md cursor-pointer border-2 border-transparent hover:border-blue-500 transition-colors duration-200';
                    thumbImg.onclick = () => detailMainImage.src = image.image_path;
                    detailThumbnails.appendChild(thumbImg);
                });
            } else {
                detailThumbnails.classList.add('hidden');
            }

            if (data.images.length > 1) {
                detailAdditionalImagesContainer.classList.remove('hidden');
                data.images.slice(1).forEach(image => {
                    const img = document.createElement('img');
                    img.src = image.image_path;
                    img.alt = data.title + ' image';
                    img.className = 'w-full h-32 object-cover rounded-lg shadow-sm';
                    detailAdditionalImagesGrid.appendChild(img);
                });
            }
        } else {
            detailMainImage.src = 'https://via.placeholder.com/600x400/E0F2F7/2196F3?text=No+Image';
            detailThumbnails.classList.add('hidden');
        }
    }
</script>
