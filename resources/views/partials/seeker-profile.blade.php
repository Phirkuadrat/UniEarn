<div id="seekerProfileOverlay" class="fixed inset-0 bg-black bg-opacity-75 z-[250] hidden overflow-hidden">
    {{-- z-index lebih tinggi dari modal lain --}}
    <div class="absolute top-0 bottom-0 right-0 bg-white rounded-l-2xl shadow-2xl
                transform translate-x-full transition-transform duration-500 ease-out
                w-[95vw] md:w-[80vw] lg:w-[60vw] xl:w-[50vw] flex flex-col p-4 sm:p-6 lg:p-8"
        {{-- Lebar responsif --}} id="seeker-profile-content">
        <div class="flex justify-between items-center pb-4 mb-4 border-b border-gray-200 flex-shrink-0">
            <div class="flex items-center gap-3">
                {{-- Foto Profil Seeker --}}
                <img id="seeker-profile-pic-overlay" src="" alt="Seeker Profile"
                    class="w-12 h-12 rounded-full object-cover border-2 border-gray-200 hidden">
                <div id="seeker-profile-pic-placeholder-overlay"
                    class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                    <i class="fas fa-user text-blue-600 text-xl"></i>
                </div>
                <div>
                    <h3 id="seeker-name-overlay" class="text-xl sm:text-2xl font-bold text-gray-900 leading-tight"></h3>
                    <p id="seeker-email-overlay" class="text-sm text-gray-600"></p>
                </div>
            </div>
            <button type="button" class="text-gray-500 hover:text-gray-700 focus:outline-none"
                onclick="hideSeekerProfileOverlay()">
                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <div id="seeker-profile-loading-spinner" class="flex-1 flex items-center justify-center text-blue-600 hidden">
            <i class="fas fa-spinner fa-spin fa-3x"></i>
        </div>

        <div id="seeker-profile-actual-content" class="flex-1 overflow-y-auto pr-2 custom-scrollbar hidden">
            {{-- Bagian Informasi Kontak --}}
            <div class="mb-6 border-b border-gray-200 pb-4">
                <h4 class="font-semibold text-lg text-gray-800 mb-2">Contact Information</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-2 gap-x-4 text-gray-700 text-sm">
                    <p class="flex items-center"><i class="fas fa-envelope mr-2 text-blue-500"></i> <span
                            id="seeker-overlay-contact-email"></span></p>
                    <p class="flex items-center"><i class="fas fa-phone mr-2 text-blue-500"></i> <span
                            id="seeker-overlay-contact-phone"></span></p>
                    <p class="flex items-start col-span-full"><i
                            class="fas fa-map-marker-alt mr-2 mt-1 text-blue-500"></i> <span
                            id="seeker-overlay-contact-address"></span></p>
                </div>
            </div>

            {{-- Bagian Bio/Tentang Saya --}}
            <div class="mb-6 border-b border-gray-200 pb-4">
                <h4 class="font-semibold text-lg text-gray-800 mb-2">About Me</h4>
                <p id="seeker-bio-overlay" class="text-gray-700 leading-relaxed"></p>
            </div>

            {{-- Bagian Portofolio --}}
            <div class="mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="font-semibold text-lg text-gray-800">My Portfolio</h4>
                    {{-- Link ke halaman portofolio penuh (jika ada) --}}
                    <a id="seeker-full-portfolio-link" href="#"
                        class="text-blue-600 hover:underline text-sm hidden">View All &rarr;</a>
                </div>
                <div id="seeker-portfolio-grid-overlay" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Item portofolio akan di-inject di sini --}}
                </div>
                <p id="seeker-portfolio-empty-message" class="text-gray-500 text-sm text-center py-4 hidden">No
                    portfolio items available.</p>
            </div>

            {{-- Anda dapat menambahkan bagian lain seperti skill, pendidikan, pengalaman di sini --}}

        </div>
    </div>
</div>

<script>
    const seekerProfileOverlay = document.getElementById('seekerProfileOverlay');
    const seekerProfileContent = document.getElementById('seeker-profile-content');
    const seekerProfileLoadingSpinner = document.getElementById('seeker-profile-loading-spinner');
    const seekerProfileActualContent = document.getElementById('seeker-profile-actual-content');

    // Elemen-elemen Header
    const seekerProfilePicOverlay = document.getElementById('seeker-profile-pic-overlay');
    const seekerProfilePicPlaceholderOverlay = document.getElementById('seeker-profile-pic-placeholder-overlay');
    const seekerNameOverlay = document.getElementById('seeker-name-overlay');
    const seekerEmailOverlay = document.getElementById('seeker-email-overlay'); // Email di header

    // Elemen Konten (Detail)
    const seekerBioOverlay = document.getElementById('seeker-bio-overlay');
    const seekerPortfolioGridOverlay = document.getElementById('seeker-portfolio-grid-overlay');
    const seekerPortfolioEmptyMessage = document.getElementById('seeker-portfolio-empty-message');
    const seekerFullPortfolioLink = document.getElementById('seeker-full-portfolio-link');

    // Elemen Kontak Detail (baru)
    const seekerOverlayContactEmail = document.getElementById('seeker-overlay-contact-email');
    const seekerOverlayContactPhone = document.getElementById('seeker-overlay-contact-phone');
    const seekerOverlayContactAddress = document.getElementById('seeker-overlay-contact-address');


    function showSeekerProfileOverlay(user) {
        seekerProfileOverlay.classList.remove('hidden');
        seekerProfileLoadingSpinner.classList.remove('hidden');
        seekerProfileActualContent.classList.add('hidden');

        setTimeout(() => {
            seekerProfileContent.classList.remove('translate-x-full');
        }, 50);

        fetch(`/recruiter/seekers/${user}/profile`) 
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                populateSeekerProfileOverlay(data);
                seekerProfileLoadingSpinner.classList.add('hidden');
                seekerProfileActualContent.classList.remove('hidden');
            })
            .catch(error => {
                console.error('Error fetching seeker profile details:', error);
                seekerProfileLoadingSpinner.classList.add('hidden');
                hideSeekerProfileOverlay();
                // Asumsikan showNotificationPopup tersedia secara global
                // showNotificationPopup('error', 'Error', error.message || 'Failed to load seeker profile.');
            });
    }

    function hideSeekerProfileOverlay() {
        seekerProfileContent.classList.add('translate-x-full');
        setTimeout(() => {
            seekerProfileOverlay.classList.add('hidden');
            // Reset semua konten
            seekerProfilePicOverlay.src = '';
            seekerProfilePicOverlay.classList.add('hidden');
            seekerProfilePicPlaceholderOverlay.classList.remove(
            'hidden'); // Pastikan placeholder terlihat saat reset
            seekerNameOverlay.textContent = '';
            seekerEmailOverlay.textContent = '';
            seekerBioOverlay.textContent = '';
            seekerPortfolioGridOverlay.innerHTML = '';
            seekerPortfolioEmptyMessage.classList.add('hidden');
            seekerFullPortfolioLink.classList.add('hidden');
            seekerFullPortfolioLink.href = '#';

            // Reset elemen kontak detail
            seekerOverlayContactEmail.textContent = '';
            seekerOverlayContactPhone.textContent = '';
            seekerOverlayContactAddress.textContent = '';
        }, 500);
    }

    function populateSeekerProfileOverlay(data) {
        // Isi Header Profil
        if (data.profile_picture) {
            seekerProfilePicOverlay.src = data.profile_picture;
            seekerProfilePicOverlay.classList.remove('hidden');
            seekerProfilePicPlaceholderOverlay.classList.add('hidden');
        } else {
            seekerProfilePicOverlay.classList.add('hidden');
            seekerProfilePicPlaceholderOverlay.classList.remove('hidden');
        }
        seekerNameOverlay.textContent = data.name;
        seekerEmailOverlay.textContent = data.email; // Email di header

        // Isi Bagian Bio
        seekerBioOverlay.textContent = data.bio || 'This seeker has not provided a bio yet.';

        // Isi Bagian Kontak Detail
        seekerOverlayContactEmail.textContent = data.email;
        seekerOverlayContactPhone.textContent = data.phone || 'Not provided';
        seekerOverlayContactAddress.textContent = data.address || 'Not provided';


        // Isi Item Portofolio
        seekerPortfolioGridOverlay.innerHTML = ''; // Bersihkan item sebelumnya
        if (data.portfolios && data.portfolios.length > 0) {
            seekerPortfolioEmptyMessage.classList.add('hidden');
            seekerFullPortfolioLink.classList.remove('hidden');
            // Asumsi Anda memiliki route untuk daftar portofolio penuh per seeker
            seekerFullPortfolioLink.href = `/seeker/portfolios?seeker_id=${data.id}`; // Sesuaikan route ini

            data.portfolios.forEach(portfolio => {
                const portfolioCardHtml = `
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden cursor-pointer hover:shadow-md transition-shadow" onclick="event.stopPropagation(); showPortfolioDetail(<span class="math-inline">\{portfolio\.id\}\);"\>
<img src\="</span>{portfolio.images && portfolio.images.length > 0 ? portfolio.images[0].image_path : 'https://via.placeholder.com/200x120/E0F2F7/2196F3?text=No+Image'}"
                             alt="<span class="math-inline">\{portfolio\.title\}" class\="w\-full h\-24 object\-cover"\>
<div class\="p\-3"\>
<h5 class\="font\-semibold text\-sm text\-gray\-900 line\-clamp\-1"\></span>{portfolio.title}</h5>
                            <p class="text-xs text-gray-600 line-clamp-2"><span class="math-inline">\{portfolio\.description\}</p\>
<p class\="text\-xs text\-blue\-600 mt\-2"\></span>{portfolio.category_name} ${portfolio.sub_category_name ? '/ ' + portfolio.sub_category_name : ''}</p>
                        </div>
                    </div>
                `;
                seekerPortfolioGridOverlay.insertAdjacentHTML('beforeend', portfolioCardHtml);
            });
        } else {
            seekerPortfolioEmptyMessage.classList.remove('hidden');
            seekerFullPortfolioLink.classList.add('hidden');
        }
    }
</script>
