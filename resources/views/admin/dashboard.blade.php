<x-admin-layout>
    {{-- Atribut data-* untuk mengirim data ke JS dengan aman --}}
    <div id="analyticsSection"
        data-user-labels='@json($userLabels)'
        data-user-data='@json($userData)'
        data-projects-by-category='@json($projectsByCategory)'
        data-total-seekers='@json($totalSeekers)'
        data-total-recruiters='@json($totalRecruiters)'>

        <img id="watermarkLogo" src="{{ asset('assets/1.svg') }}" style="display:none;" />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                {{-- ========================================================== --}}
                {{-- PERUBAHAN 1: Tambahkan ID pada div pembungkus konten --}}
                {{-- ========================================================== --}}
                <div id="dashboard-content" class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-3xl font-semibold">Dashboard</h3>
                        {{-- Tombol ini tidak perlu diubah, karena sudah memanggil fungsi yang benar --}}
                        <button id="pdf-button" onclick="exportPDF()" title="Export to PDF" class="text-gray-600 hover:text-red-600 transition-colors flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                        </button>
                    </div>

                    {{-- Konten lainnya tidak perlu diubah --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-white border rounded-xl shadow p-5">
                            <div class="mt-4 text-gray-600 text-sm">Projects</div>
                            <div class="text-2xl font-bold">{{ $totalProjects }}</div>
                        </div>
                        <div class="bg-white border rounded-xl shadow p-5">
                            <div class="mt-4 text-gray-600 text-sm">Recruiter</div>
                            <div class="text-2xl font-bold">{{ $totalRecruiters }}</div>
                        </div>
                        <div class="bg-white border rounded-xl shadow p-5">
                            <div class="mt-4 text-gray-600 text-sm">Seeker</div>
                            <div class="text-2xl font-bold">{{ $totalSeekers }}</div>
                        </div>
                        <div class="bg-white border rounded-xl shadow p-5">
                            <div class="mt-4 text-gray-600 text-sm">Total Users</div>
                            <div class="text-2xl font-bold">{{ $totalRecruiters + $totalSeekers }}</div>
                        </div>
                    </div>
                    <div class="mt-8 mb-10">
                        <h3 class="text-lg font-semibold mb-5">New User Per Month</h3>
                        <canvas id="userPerMonth" style="width: 100%; height: 300px;"></canvas>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-6">
                            <div class="bg-white border rounded-xl shadow p-4 flex flex-col lg:flex-row items-center justify-center gap-6">
                                <div>
                                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Project by Categories</h3>
                                    <ul id="project-list" class="space-y-2 text-sm"></ul>
                                </div>
                                <div class="w-48 h-48 relative">
                                    <canvas id="projectChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white border rounded-xl shadow p-4 flex flex-col lg:flex-row items-center justify-center gap-6">
                            <div>
                                <h3 class="text-lg font-semibold mb-4 text-gray-800">Seeker vs Recruiter</h3>
                                <ul id="svr-list" class="space-y-2 text-sm"></ul>
                            </div>
                            <div class="w-48 h-48 relative">
                                <canvas id="seekerRecruiterChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white border rounded-xl shadow p-5 mt-6">
                        <h3 class="text-lg font-semibold mb-4">Detail Data</h3>
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left font-medium text-gray-700">No</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-700">Kategori</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-700">Jumlah Project</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($projectsByCategory as $index => $category)
                                <tr>
                                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2">{{ $category->name }}</td>
                                    <td class="px-4 py-2">{{ $category->projects_count }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-2 text-center text-gray-500">Data tidak ditemukan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

{{-- ========================================================== --}}
{{-- PERUBAHAN 2: Ganti seluruh @push('scripts') dengan ini --}}
{{-- ========================================================== --}}
@push('scripts')
{{-- Library untuk membuat PDF --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
{{-- Library untuk Chart --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // FUNGSI UNTUK EXPORT PDF
    async function exportPDF() {
        const pdfButton = document.getElementById('pdf-button');
        const originalButtonContent = pdfButton.innerHTML;
        const dashboardContent = document.getElementById('dashboard-content');

        if (!dashboardContent) {
            console.error('Elemen #dashboard-content tidak ditemukan!');
            return;
        }

        // Tampilkan status loading pada tombol
        pdfButton.disabled = true;
        pdfButton.innerHTML = `
            <svg class="animate-spin h-5 w-5 mr-3" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>Downloading...</span>`;

        // PENTING: Matikan animasi chart sementara agar tidak blank di PDF
        Chart.defaults.animation = false;

        try {
            const canvas = await html2canvas(dashboardContent, {
                scale: 2, // Meningkatkan resolusi gambar
                useCORS: true
            });

            const imgData = canvas.toDataURL('image/png');
            const {
                jsPDF
            } = window.jspdf;

            // Kalkulasi dimensi PDF (A4)
            const pdf = new jsPDF('p', 'mm', 'a4');
            const pdfWidth = pdf.internal.pageSize.getWidth();
            const pdfHeight = pdf.internal.pageSize.getHeight();
            const canvasWidth = canvas.width;
            const canvasHeight = canvas.height;
            const ratio = canvasWidth / canvasHeight;
            const imgWidth = pdfWidth;
            const imgHeight = pdfWidth / ratio;

            let heightLeft = imgHeight;
            let position = 0;

            pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
            heightLeft -= pdfHeight;

            // Handle jika konten lebih dari satu halaman
            while (heightLeft > 0) {
                position = heightLeft - imgHeight;
                pdf.addPage();
                pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pdfHeight;
            }

            pdf.save('dashboard-report.pdf');

        } catch (error) {
            console.error('Gagal membuat PDF:', error);
            alert('Maaf, terjadi kesalahan saat membuat file PDF.');
        } finally {
            // PENTING: Nyalakan kembali animasi chart setelah selesai
            Chart.defaults.animation = true;

            // Kembalikan tombol ke keadaan semula
            pdfButton.disabled = false;
            pdfButton.innerHTML = originalButtonContent;
        }
    }

    // FUNGSI UNTUK INISIALISASI CHART (tetap sama)
    document.addEventListener('DOMContentLoaded', function() {
        const dataContainer = document.getElementById('analyticsSection');
        if (!dataContainer) return;

        const userLabels = JSON.parse(dataContainer.dataset.userLabels || '[]');
        const userData = JSON.parse(dataContainer.dataset.userData || '[]');
        const projectsByCategory = JSON.parse(dataContainer.dataset.projectsByCategory || '[]');
        const totalSeekers = JSON.parse(dataContainer.dataset.totalSeekers || '0');
        const totalRecruiters = JSON.parse(dataContainer.dataset.totalRecruiters || '0');

        // Chart 1: New User Per Month
        const userPerMonthCtx = document.getElementById('userPerMonth').getContext('2d');
        new Chart(userPerMonthCtx, {
            type: 'line',
            data: {
                labels: userLabels,
                datasets: [{
                    label: 'New Users',
                    data: userData,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Chart 2: Project by Categories
        const projectChartCtx = document.getElementById('projectChart').getContext('2d');
        const projectLabels = projectsByCategory.map(cat => cat.name);
        const projectData = projectsByCategory.map(cat => cat.projects_count);
        const projectList = document.getElementById('project-list');
        const projectColors = ['#A855F7', '#EC4899', '#3B82F6', '#F97316', '#14B8A6'];

        if (projectList) {
            projectList.innerHTML = '';
            // Hanya tampilkan legenda untuk kategori yang punya proyek
            projectsByCategory.forEach((cat, index) => {
                if (cat.projects_count > 0) {
                    const li = document.createElement('li');
                    li.innerHTML = `<span class="inline-block w-3 h-3 rounded-full mr-2" style="background-color: ${projectColors[index % projectColors.length]}"></span> ${cat.name} – ${cat.projects_count}`;
                    projectList.appendChild(li);
                }
            });
        }
        new Chart(projectChartCtx, {
            type: 'doughnut',
            data: {
                labels: projectLabels,
                datasets: [{
                    data: projectData,
                    backgroundColor: projectColors,
                    hoverOffset: 4
                }]
            }
        });

        // Chart 3: Seeker vs Recruiter
        const seekerRecruiterCtx = document.getElementById('seekerRecruiterChart').getContext('2d');
        const svR_labels = ['Seeker', 'Recruiter'];
        const svR_data = [totalSeekers, totalRecruiters];
        const svrList = document.getElementById('svr-list');
        const svR_colors = ['#6366F1', '#F43F5E'];

        if (svrList) {
            svrList.innerHTML = '';
            svR_labels.forEach((label, index) => {
                const li = document.createElement('li');
                li.innerHTML = `<span class="inline-block w-3 h-3 rounded-full mr-2" style="background-color: ${svR_colors[index % svR_colors.length]}"></span> ${label} – ${svR_data[index]}`;
                svrList.appendChild(li);
            });
        }
        new Chart(seekerRecruiterCtx, {
            type: 'pie',
            data: {
                labels: svR_labels,
                datasets: [{
                    data: svR_data,
                    backgroundColor: svR_colors,
                    hoverOffset: 4
                }]
            }
        });
    });
</script>
@endpush