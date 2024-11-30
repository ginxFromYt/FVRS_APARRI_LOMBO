<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/chart.umd.js') }}"></script>
    <style>
        body {
           
            overflow: hidden; 
        }

        .container-text {
            color: white;
            font-size: 1.2rem;
            margin: 0;
            text-align: center;
        }

        .main-content {
            margin-left: 300px;
            padding: 20px;
        }

        .btn {
            display: flex;
            align-items: center;
            background-color: white;
            color: green;
            border: 1px solid green;
            padding: 10px;
            text-align: left;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .btn i {
            margin-right: 10px;
        }

        .btn:hover {
            background-color: #f0f0f0;
        }

        .box {
            border-radius: 15px;
            background: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            text-align: center;
        }

        .box-header {
            margin-bottom: 10px;
        }

        .box-header i {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        .box-header h4 {
            font-size: 1.25rem;
            font-weight: 700;
            color: white;
            margin-bottom: 10px;
        }

        .box-content {
            font-size: 2rem;
            font-weight: 700;
            color: white;
        }

        

        

        

        /* Adjust chart container size */
        .chart-container {
            width: 100%;
            max-width: 600px; /* Limit the width */
            margin: 0 auto; /* Center the chart */
        }

        .chart-container canvas {
            width: 100% !important;
            height: auto !important;
        }
    </style>

    <div class="row">
        <div class="col-lg-6 col-md-6 mb-4">
            <a href="{{ route('violation.barangays') }}" class="text-decoration-none">
                <div class="box bg-success d-flex flex-column h-100">
                    <div class="box-header">
                        <i class="fas fa-map-marker-alt"></i>
                        <h4>Barangay with Violators</h4>
                    </div>
                    <div class="box-content mt-auto">
                        <h2 class="card-text">
                            {{ \App\Models\Violator::distinct('address')->count('address') }}
                        </h2>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-6 col-md-6 mb-4">
            <div class="box bg-danger d-flex flex-column h-100">
                <div class="box-header">
                    <i class="fas fa-exclamation-circle"></i>
                    <h4>Total # of Violations</h4>
                </div>
                <div class="box-content mt-auto">
                    <h2 class="card-text">
                        {{ \App\Models\RecordViolation::distinct('violation')->count('violation') }}
                    </h2>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="row mb-4">
            <div class="col-lg-6">
                
                <div class="chart-container">
                    <canvas id="monthlyViolationsChart"></canvas>
                </div>
            </div>
            <div class="col-lg-6">
               
                <div class="chart-container">
                    <canvas id="yearlyViolationsChart"></canvas>
                </div>
            </div>
        </div>

        <script>
            // Monthly Violations Chart
            const monthlyData = @json($monthlyViolationsData);
            const monthlyLabels = Array.from({ length: 31 }, (_, i) => (i + 1).toString());

            const monthlyCounts = Array(31).fill(0);
            monthlyData.forEach(data => {
                const dayIndex = data.day - 1;
                monthlyCounts[dayIndex] = data.count;
            });

            const ctxMonthly = document.getElementById('monthlyViolationsChart').getContext('2d');
            const monthlyViolationsChart = new Chart(ctxMonthly, {
                type: 'line',
                data: {
                    labels: monthlyLabels,
                    datasets: [{
                        label: 'Monthly Violations',
                        data: monthlyCounts,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Days'
                            }
                            
                        }
                        
                    }
                }
            });

            // Yearly Violations Chart
            const yearlyData = @json($yearlyViolationsData);
            const yearlyLabels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

            const yearlyCounts = Array(12).fill(0);
            yearlyData.forEach(data => {
                const monthIndex = new Date(data.month + " 1").getMonth();
                yearlyCounts[monthIndex] = data.count;
            });

            const ctxYearly = document.getElementById('yearlyViolationsChart').getContext('2d');
            const yearlyViolationsChart = new Chart(ctxYearly, {
                type: 'bar',
                data: {
                    labels: yearlyLabels,
                    datasets: [{
                        label: 'Yearly Violations',
                        data: yearlyCounts,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1,
                        barThickness: 30
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Months'
                            }
                        }
                    }
                }
            });
        </script>
</x-app-layout>