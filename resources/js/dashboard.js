import Chart from 'chart.js/auto';

const ctx2 = document.getElementById('projectChart');
if (ctx2) {
    const labels = JSON.parse(ctx2.dataset.labels);
    const data = JSON.parse(ctx2.dataset.data);
    const colors = JSON.parse(ctx2.dataset.colors);

    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                label: 'Projects',
                data: data,
                backgroundColor: colors,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                    responsive: false,
                }
            }
        },
    });
}

const ctx3 = document.getElementById('seekerRecruiterChart');
if (ctx3) {
    const totalRecruiters = parseInt(ctx3.dataset.totalRecruiters) || 0;
    const totalSeekers = parseInt(ctx3.dataset.totalSeekers) || 0;

    new Chart(ctx3, {
        type: 'pie',
        data: {
            labels: ['Seeker', 'Recruiter'],
            datasets: [{
                label: 'Total',
                data: [totalSeekers, totalRecruiters],
                backgroundColor: [
                    '#FF6384',
                    '#36A2EB'
                ],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                    responsive: false,
                }
            }
        },
    });
}

const userPerMonthCanvas = document.getElementById('userPerMonth');
if (userPerMonthCanvas) {
    const chartLabelsFromBackend = JSON.parse(userPerMonthCanvas.dataset.labels);
    const chartDataFromBackend = JSON.parse(userPerMonthCanvas.dataset.data);

    console.log('userLabels:', chartLabelsFromBackend);
    console.log('userData:', chartDataFromBackend);

    new Chart(userPerMonthCanvas, {
        type: 'bar',
        data: {
            labels: chartLabelsFromBackend,
            datasets: [{
                label: 'Total User',
                data: chartDataFromBackend,
                backgroundColor: '#1892C8',
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += context.parsed.y + ' users';
                            }
                            return label;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            if (Number.isInteger(value)) {
                                return value;
                            }
                        }
                    }
                }
            }
        }
    });
}
