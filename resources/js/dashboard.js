import Chart from 'chart.js/auto';

const ctx = document.getElementById('userPerMonth');
if (ctx) {
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Total'],
            datasets: [{
                label: 'Total User',
                data: [10, 20, 4, 5, 12, 23, 12, 5, 19, 14, 23, 21, 22],
                backgroundColor: ['#1892C8'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                }
            }
        }
    });
}

const ctx2 = document.getElementById('projectChart');
if (ctx2) {
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Project A', 'Project B', 'Project C'],
            datasets: [{
                label: 'Projects',
                data: [300, 50, 100],
                backgroundColor: [
                    '#FF6384',
                    '#36A2EB',
                    '#FFCE56'
                ],
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
    new Chart(ctx3, {
        type: 'pie',
        data: {
            labels: ['Seeker', 'Recruiter'],
            datasets: [{
                label: 'Total',
                data: [34, 25],
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