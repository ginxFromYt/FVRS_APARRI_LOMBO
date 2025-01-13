<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        .container {
            margin-top: 30px;
        }

        .card {
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
        }

        .card-body h2 {
            font-size: 2.5rem;
            color: #dc3545;
        }

        .table-container {
            margin-top: 5px;
        }

        th {
            background-color: #28a745;
            color: white;
            border-top: 2px solid #1e7e34;
            border-bottom: 2px solid #1e7e34;
        }

        td {
            background-color: #f8f9fa;
        }

        .table {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        .table th,
        .table td {
            vertical-align: middle;
            padding: 12px;
        }

        .month {
            width: 200px;
        }

        .violation-count {
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
        }

        .violation-count-month {
            color: #28a745;
        }

        .violation-count-year {
            color: #17a2b8;
        }

        .left-column,
        .right-column {
            padding-right: 15px;
        }

        .table-container {
            padding-top: 20px;
        }

        /* Hover effect on table rows */
        .table tbody tr:hover {
            background-color: #e9f7e7;
        }

        .table-striped tbody tr:nth-child(odd) {
            background-color: #f1f9f3;
        }
    </style>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Violation Summary') }}
            </h1>
        </x-slot>

        <div class="container">
            <div class="row">
                <!-- Left Column: Monthly Violations Table -->
                <div class="col-lg-6 col-md-12 left-column">
                    <div class="card">
                        <div class="card-header">
                            Monthly Violations (January - December)
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="month">Month</th>
                                        <th class="text-center">Number of Violations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(range(1, 12) as $month)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::create()->month($month)->format('F') }}</td>
                                        <td class="violation-count violation-count-month text-center" 
                                            data-month="{{ $month }}"
                                            onclick="showViolations('month', {{ $month }})">
                                            {{ \App\Models\RecordViolation::whereMonth('date_of_violation', $month)->count() }}
                                        </td>
                                    </tr>
                                    <tr id="violations-month-{{ $month }}" style="display:none;">
                                        <td colspan="2">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Violation</th>
                                                        <th>Location</th>
                                                        <th>Date of Violation</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="violations-month-body-{{ $month }}"></tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Yearly Violations Table -->
                <div class="col-lg-6 col-md-12 right-column">
                    <div class="card">
                        <div class="card-header">
                            Yearly Violations
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Year</th>
                                        <th class="text-center">Number of Violations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $years = \App\Models\RecordViolation::selectRaw('year(date_of_violation) as year')
                                        ->distinct()
                                        ->orderBy('year', 'desc')
                                        ->pluck('year');
                                    @endphp
                                    @foreach($years as $year)
                                    <tr>
                                        <td>{{ $year }}</td>
                                        <td class="violation-count violation-count-year text-center"
                                            data-year="{{ $year }}"
                                            onclick="showViolations('year', {{ $year }})">
                                            {{ \App\Models\RecordViolation::whereYear('date_of_violation', $year)->count() }}
                                        </td>
                                    </tr>
                                    <tr id="violations-year-{{ $year }}" style="display:none;">
                                        <td colspan="2">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Violation</th>
                                                        <th>Location</th>
                                                        <th>Date of Violation</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="violations-year-body-{{ $year }}"></tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <!-- jQuery and Bootstrap JS for table interactivity -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Function to show violations when month or year count is clicked
        function showViolations(type, identifier) {
            let tableRow = $('#violations-' + type + '-' + identifier);
            let tableBody = $('#violations-' + type + '-body-' + identifier);
            
            // Toggle the visibility of the violations table
            if (tableRow.is(':visible')) {
                tableRow.hide();
            } else {
                tableRow.show();
                tableBody.empty(); // Clear the previous data
                
                // Fetch violations based on type (month or year)
                let url = (type === 'month') 
                    ? '/violations/month/' + identifier
                    : '/violations/year/' + identifier;

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        response.forEach(function(violation) {
                            // Format the date for monthly violations (Day only)
                            let date = (type === 'month') 
                                ? new Date(violation.date_of_violation).getDate()  // Only Day
                                : new Date(violation.date_of_violation).toLocaleString('default', { month: 'long' }); // Only month

                            tableBody.append('<tr><td>' + violation.violation + '</td><td>' + violation.location + '</td><td>' + date + '</td></tr>');
                        });
                    },
                    error: function() {
                        alert('Error fetching violations.');
                    }
                });
            }
        }
    </script>
</body>

</html>
