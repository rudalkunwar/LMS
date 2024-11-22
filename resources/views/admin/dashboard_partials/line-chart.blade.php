<div class="w-full max-w-full h-[70vh] overflow-hidden lg:h-[60vh] md:h-[50vh] sm:h-[40vh]">
    <canvas id="lineChart"></canvas>
</div>

@push('script')
    <script>
        // Ensure Chart.js is included
        if (typeof Chart !== 'undefined') {
            // Data for the line chart
            const data = {
                labels: ["January", "February", "March", "April", "May", "June"],
                datasets: [{
                        label: "Revenue",
                        data: [65, 59, 80, 81, 56, 55],
                        borderColor: "rgba(75, 192, 192, 1)",
                        backgroundColor: "rgba(75, 192, 192, 0.2)",
                        tension: 0.4, // Smooth curves
                    },
                    {
                        label: "Sales",
                        data: [28, 48, 40, 19, 86, 27],
                        borderColor: "rgba(153, 102, 255, 1)",
                        backgroundColor: "rgba(153, 102, 255, 0.2)",
                        tension: 0.4, // Smooth curves
                    },
                ],
            };

            // Configurations for the chart
            const config = {
                type: "line",
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false, 
                    plugins: {
                        legend: {
                            display: true,
                            position: "top",
                        },
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: "Months",
                            },
                        },
                        y: {
                            title: {
                                display: true,
                                text: "Value",
                            },
                            beginAtZero: true,
                        },
                    },
                },
            };

            // Render the chart after DOM is ready
            window.addEventListener('load', () => {
                const ctx = document.getElementById("lineChart").getContext("2d");
                const lineChart = new Chart(ctx, config);
            });
        } else {
            console.error("Chart.js is not loaded");
        }
    </script>
@endpush
