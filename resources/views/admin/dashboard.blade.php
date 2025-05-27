<x-admin-layout>
    <div id="analyticsSection">
        <img id="watermarkLogo" src="{{ asset('assets/1.svg') }}" style="display:none;" />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-3xl font-semibold">Dashboard</h3>

                        <!-- Icon Export PDF -->
                        <button onclick="exportPDF()" title="Export to PDF"
                            class="text-gray-600 hover:text-red-600 transition-colors">
                            <!-- Heroicon: Document Arrow Down -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                        </button>
                    </div>

                    {{-- Card --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Card 1 -->
                        <div class="bg-white border rounded-xl shadow p-5">
                            <div class="flex justify-between items-center">
                                <div class="bg-gray-100 p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />
                                    </svg>
                                </div>
                                <div class="text-green-600 text-sm font-semibold bg-green-100 px-2 py-1 rounded-lg">↑
                                    12%</div>
                            </div>
                            <div class="mt-4 text-gray-600 text-sm">Total revenue</div>
                            <div class="text-2xl font-bold">$53,900</div>
                        </div>

                        <!-- Card 2 -->
                        <div class="bg-white border rounded-xl shadow p-5">
                            <div class="flex justify-between items-center">
                                <div class="bg-gray-100 p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                    </svg>
                                </div>
                                <div class="text-red-600 text-sm font-semibold bg-red-100 px-2 py-1 rounded-lg">↓ 10%
                                </div>
                            </div>
                            <div class="mt-4 text-gray-600 text-sm">Projects</div>
                            <div class="text-2xl font-bold">95 <span class="text-gray-400 text-base">/ 100</span></div>
                        </div>

                        <!-- Card 3 -->
                        <div class="bg-white border rounded-xl shadow p-5">
                            <div class="flex justify-between items-center">
                                <div class="bg-gray-100 p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                    </svg>
                                </div>
                                <div class="text-green-600 text-sm font-semibold bg-green-100 px-2 py-1 rounded-lg">↑ 8%
                                </div>
                            </div>
                            <div class="mt-4 text-gray-600 text-sm">Recruiter</div>
                            {{-- <div class="text-2xl font-bold">1022 <span class="text-gray-400 text-base">/ 1300 Hrs</span>
                            </div> --}}
                        </div>

                        <!-- Card 4 -->
                        <div class="bg-white border rounded-xl shadow p-5">
                            <div class="flex justify-between items-center">
                                <div class="bg-gray-100 p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                    </svg>
                                </div>
                                <div class="text-green-600 text-sm font-semibold bg-green-100 px-2 py-1 rounded-lg">↑ 2%
                                </div>
                            </div>
                            <div class="mt-4 text-gray-600 text-sm">Seeker</div>
                            {{-- <div class="text-2xl font-bold">101 <span class="text-gray-400 text-base">/ 120</span></div> --}}
                        </div>
                    </div>

                    {{-- User/Month --}}
                    <div class="mt-6 mb-10">
                        <h3 class="text-lg font-semibold mb-5">New User Per Month</h3>
                        <canvas id="userPerMonth" width="300" height="100"></canvas>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- LEFT SIDE (CHARTS) -->
                        <div class="flex flex-col gap-6">
                            <!-- Project by Categories Chart -->
                            <div
                                class="bg-white border rounded-xl shadow p-4 flex flex-col lg:flex-row items-center justify-center gap-6">
                                <div>
                                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Project by Categories</h3>
                                    <ul class="space-y-2 text-sm">
                                        <li><span class="inline-block w-3 h-3 bg-purple-500 rounded-full mr-2"></span>
                                            Web Development – 40</li>
                                        <li><span class="inline-block w-3 h-3 bg-pink-500 rounded-full mr-2"></span>
                                            Mobile App – 30</li>
                                        <li><span class="inline-block w-3 h-3 bg-blue-500 rounded-full mr-2"></span>
                                            Data Science – 25</li>
                                    </ul>
                                </div>
                                <div class="w-48 h-48 relative">
                                    <canvas id="projectChart"></canvas>
                                </div>
                            </div>

                            <!-- Seeker vs Recruiter Chart -->
                            <div
                                class="bg-white border rounded-xl shadow p-4 flex flex-col lg:flex-row items-center justify-center gap-6">
                                <div>
                                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Seeker vs Recruiter</h3>
                                    <ul class="space-y-2 text-sm">
                                        <li><span class="inline-block w-3 h-3 bg-purple-500 rounded-full mr-2"></span>
                                            Seeker – 40</li>
                                        <li><span class="inline-block w-3 h-3 bg-pink-500 rounded-full mr-2"></span>
                                            Recruiter – 30</li>
                                    </ul>
                                </div>
                                <div class="w-48 h-48 relative">
                                    <canvas id="seekerRecruiterChart" class="absolute inset-0 w-full h-full"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- RIGHT SIDE (TABLE) -->
                        <div class="bg-white border rounded-xl shadow p-5">
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
                                    <tr>
                                        <td class="px-4 py-2">1</td>
                                        <td class="px-4 py-2">Web Development</td>
                                        <td class="px-4 py-2">40</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2">2</td>
                                        <td class="px-4 py-2">Mobile App</td>
                                        <td class="px-4 py-2">30</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2">3</td>
                                        <td class="px-4 py-2">Data Science</td>
                                        <td class="px-4 py-2">25</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

<script>
    async function exportPDF() {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF('p', 'pt', 'a4');

        const section = document.getElementById('analyticsSection');
        const canvas = await html2canvas(section, {
            scale: 2
        });
        const imgData = canvas.toDataURL('image/png');

        const pageWidth = doc.internal.pageSize.getWidth();
        const pageHeight = doc.internal.pageSize.getHeight();

        const imgWidth = pageWidth;
        const imgHeight = (canvas.height * imgWidth) / canvas.width;

        doc.addImage(imgData, 'PNG', 0, 0, imgWidth, imgHeight);

        const logoImg = new Image();
        logoImg.src = '{{ asset('assets/1.png') }}';
        logoImg.onload = function() {
            const logoWidth = pageWidth * 1.1;
            const logoHeight = pageHeight * 1.1;
            const centerX = (pageWidth - logoWidth) / 2;
            const centerY = (pageHeight - logoHeight) / 2;

            doc.setGState(new doc.GState({
                opacity: 0.1
            }));
            doc.addImage(logoImg, 'PNG', centerX, centerY, logoWidth, logoHeight);
            doc.save("analitik-dashboard.pdf");
        };
        logoImg.onerror = function() {
            doc.save("analitik-dashboard.pdf");
        };
    }
</script>
