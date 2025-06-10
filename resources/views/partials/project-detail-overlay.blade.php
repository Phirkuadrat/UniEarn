<div id="projectDetailOverlay" class="fixed inset-0 bg-black bg-opacity-75 z-[200] hidden overflow-hidden">
    <div class="absolute top-0 bottom-0 right-0 bg-white rounded-l-2xl shadow-2xl
                transform translate-x-full transition-transform duration-500 ease-out
                w-[90vw] md:w-[70vw] lg:w-[50vw] flex flex-col p-4 sm:p-6 lg:p-8"
        id="project-detail-content">

        <div class="flex justify-between items-center pb-4 mb-4 border-b border-gray-200 flex-shrink-0">
            <h3 id="project-overlay-title" class="text-xl sm:text-2xl font-bold text-gray-900">Project Details</h3>
            <button type="button" class="text-gray-500 hover:text-gray-700 focus:outline-none"
                onclick="hideProjectDetailOverlay()">
                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <div id="project-overlay-loading-spinner" class="flex-1 flex items-center justify-center text-blue-600 hidden">
            <i class="fas fa-spinner fa-spin fa-3x"></i>
        </div>

        <div id="project-overlay-actual-content" class="flex-1 overflow-y-auto pr-2 custom-scrollbar hidden">
            {{-- Informasi Perusahaan/Pemosting --}}
            <div class="mb-6 flex items-center">
                <img id="detail-project-company-logo" src="" alt="Company Logo"
                    class="w-12 h-12 rounded-full object-contain mr-3 border border-gray-200 p-1 hidden">

                <div id="detail-project-company-logo-placeholder-div"
                    class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center mr-3">
                    <i class="fas fa-building text-gray-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-700 text-sm">Posted by</p>
                    <h4 id="detail-project-company-name" class="font-semibold text-lg text-gray-900"></h4>
                </div>
            </div>

            <h4 id="detail-project-title" class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2"></h4>
            <p id="detail-project-category" class="text-blue-600 text-base mb-4"></p>

            <div class="mb-6">
                <h5 class="font-semibold text-lg text-gray-800 mb-2">Description</h5>
                <p id="detail-project-description" class="text-gray-700 leading-relaxed"></p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                <div>
                    <h5 class="font-semibold text-lg text-gray-800 mb-2">Budget</h5>
                    <p id="detail-project-budget" class="text-gray-700 text-base flex items-center gap-1">
                        <i class="fas fa-money-bill-wave text-green-500"></i>
                    </p>
                </div>
                <div>
                    <h5 class="font-semibold text-lg text-gray-800 mb-2">Due Date</h5>
                    <p id="detail-project-due-date" class="text-gray-700 text-base flex items-center gap-1">
                        <i class="fas fa-calendar-alt text-blue-500"></i>
                    </p>
                </div>
            </div>
        </div>

        <div class="pt-4 mt-auto border-t border-gray-200 flex-shrink-0"> 
            <div id="detail-project-action-button">
                {{-- Tombol akan diisi oleh JavaScript berdasarkan role pengguna --}}
            </div>
        </div>

    </div>
</div>

<script>
    const projectDetailOverlay = document.getElementById('projectDetailOverlay');
    const projectDetailContent = document.getElementById('project-detail-content');
    const projectOverlayLoadingSpinner = document.getElementById('project-overlay-loading-spinner');
    const projectOverlayActualContent = document.getElementById('project-overlay-actual-content');

    // Elemen-elemen untuk diisi di overlay
    const detailProjectCompanyLogo = document.getElementById('detail-project-company-logo');
    const detailProjectCompanyLogoPlaceholderDiv = document.getElementById(
        'detail-project-company-logo-placeholder-div');
    const detailProjectCompanyName = document.getElementById('detail-project-company-name');
    const detailProjectTitle = document.getElementById('detail-project-title');
    const detailProjectCategory = document.getElementById('detail-project-category');
    const detailProjectDescription = document.getElementById('detail-project-description');
    const detailProjectBudget = document.getElementById('detail-project-budget');
    const detailProjectDueDate = document.getElementById('detail-project-due-date');
    const detailProjectLink = document.getElementById('detail-project-link');
    const detailProjectActionButtonContainer = document.getElementById('detail-project-action-button');


    function showProjectDetailOverlay(projectId) {
        projectDetailOverlay.classList.remove('hidden');
        projectOverlayLoadingSpinner.classList.remove('hidden');
        projectOverlayActualContent.classList.add('hidden');

        setTimeout(() => {
            projectDetailContent.classList.remove('translate-x-full');
        }, 50);

        fetch(`/project/${projectId}/details`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                populateProjectDetailOverlay(data);
                projectOverlayLoadingSpinner.classList.add('hidden');
                projectOverlayActualContent.classList.remove('hidden');
            })
            .catch(error => {
                console.error('Error fetching project details:', error);
                projectOverlayLoadingSpinner.classList.add('hidden');
                hideProjectDetailOverlay();
                showNotificationPopup('error', 'Error', error.message || 'Failed to load project details.');
            });
    }

    function hideProjectDetailOverlay() {
        projectDetailContent.classList.add('translate-x-full');
        setTimeout(() => {
            projectDetailOverlay.classList.add('hidden');
            detailProjectCompanyLogo.src = '';
            detailProjectCompanyLogo.classList.add('hidden');
            if (detailProjectCompanyLogoPlaceholderDiv) {
                detailProjectCompanyLogoPlaceholderDiv.classList.remove('hidden');
            }
            detailProjectCompanyName.textContent = '';
            detailProjectTitle.textContent = '';
            detailProjectCategory.textContent = '';
            detailProjectDescription.textContent = '';
            detailProjectBudget.innerHTML = '';
            detailProjectDueDate.innerHTML = '';
            detailProjectLink.href = '#';
            detailProjectLink.innerHTML = '';
            detailProjectActionButtonContainer.innerHTML = '';
            const placeholderLogo = document.getElementById('detail-project-company-logo').nextElementSibling;
            if (placeholderLogo && placeholderLogo.classList.contains('fa-building')) {
                placeholderLogo.parentElement.classList.add('hidden');
            }
        }, 500);
    }

    function formatRupiah(angka, prefix = 'Rp ') {
        if (angka === null || angka === undefined || angka === '') return '';
        var number_string = angka.toString().replace(/[^,\d]/g, ''),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return rupiah ? prefix + rupiah : '';
    }

    function populateProjectDetailOverlay(data) {
        const companyLogoImg = document.getElementById('detail-project-company-logo');
        const companyLogoPlaceholder = companyLogoImg.nextElementSibling;
        if (data.recruiter && data.recruiter.company_logo) {
            detailProjectCompanyLogo.src = data.recruiter.company_logo;
            detailProjectCompanyLogo.classList.remove('hidden'); // Tampilkan gambar logo
            if (detailProjectCompanyLogoPlaceholderDiv) {
                detailProjectCompanyLogoPlaceholderDiv.classList.add('hidden'); // Sembunyikan placeholder
            }
        } else {
            detailProjectCompanyLogo.src = ''; // Kosongkan src untuk jaga-jaga
            detailProjectCompanyLogo.classList.add('hidden'); // Sembunyikan gambar logo
            if (detailProjectCompanyLogoPlaceholderDiv) {
                detailProjectCompanyLogoPlaceholderDiv.classList.remove('hidden'); // Tampilkan placeholder
            }
        }
        detailProjectCompanyName.textContent = data.recruiter.company_name || data.recruiter.user.name ||
            'Unknown Company';

        detailProjectTitle.textContent = data.title;
        let categoryText = data.category_name || 'N/A';
        if (data.sub_category_name) {
            categoryText += ` / ${data.sub_category_name}`;
        }
        detailProjectCategory.textContent = categoryText;
        detailProjectDescription.textContent = data.description;

        detailProjectBudget.innerHTML =
            `<i class="fas fa-money-bill-wave text-green-500 mr-1"></i> ${formatRupiah(data.budget)}`;
        detailProjectDueDate.innerHTML =
            `<i class="fas fa-calendar-alt text-blue-500 mr-1"></i> ${new Date(data.due_date).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}`;

        let actionButtonHtml = '';
        const userIsLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
        const userRole = "{{ Auth::check() ? Auth::user()->role : '' }}";
        const projectId = data.id;

        if (userIsLoggedIn) {
            if (userRole === 'seeker' && data.status === 'Open') {
                actionButtonHtml = `
                    <a href="/seeker/apply/project/${projectId}"
                       class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-md text-sm text-center block transition-colors duration-200">
                        Apply Now <i class="fas fa-arrow-right ml-1 text-xs"></i>
                    </a>`;
            } else if (userRole === 'recruiter') {
                actionButtonHtml = `
                    <a href="/recruiter/jobs/${projectId}/applicants"
                       class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-md text-sm text-center block transition-colors duration-200">
                        View Applicants <i class="fas fa-users ml-1 text-xs"></i>
                    </a>`;
            } else {
                actionButtonHtml = `
                    <span class="w-full bg-gray-200 text-gray-700 font-semibold py-2.5 rounded-md text-sm text-center block cursor-not-allowed">
                        Status: ${data.status}
                    </span>`;
            }
        } else {
            actionButtonHtml = `
                <span class="w-full bg-gray-200 text-gray-700 font-semibold py-2.5 rounded-md text-sm text-center block cursor-not-allowed"
                      title="Login to Apply">
                    Login to Apply <i class="fas fa-arrow-right ml-1 text-xs"></i>
                </span>`;
        }
        detailProjectActionButtonContainer.innerHTML = actionButtonHtml;
    }
</script>
