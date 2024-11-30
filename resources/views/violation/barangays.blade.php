<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Import Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            
        }
        
        h2 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #343a40;
        }
        .table-container {
            display: flex;
            justify-content: space-between;
        }
        .left-table, .right-table {
            width: 48%; /* Adjust width to fit both tables */
        }
        .table {
            border-radius: 0.5rem;
            overflow: hidden;
            margin: auto; /* Center the table */
        }
        .table thead {
            background-color: #28a745;
            color: white;
        }
        .btn-primary {
            margin-top: 20px;
        }
        #violatorsTable {
            margin-top: 30px;
        }

        .back-button {
            position: fixed;
            top: 20px;     /* Adjust to move it from the top */
            right: 20px;   /* Adjust to move it from the right */
            z-index: 1000; /* Ensures the button is above other content */
        }
    </style>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Barangays with Violations') }}
            </h2>
        </x-slot>

        <div class="">
            <div class="container">
                @if($barangays->isEmpty())
                    <div class="alert alert-info text-center">No barangays with violations found.</div>
                @else
                    <div class="table-container">
                        <!-- Left Table -->
                        <div class="left-table">
                            <h2 class="text-center">Barangays with Violations</h2>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Barangay Address</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($barangays as $barangay)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $barangay->address }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-success view-violators" data-barangay="{{ $barangay->address }}">
                                                    <i class="fas fa-eye"></i> View Violators
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Right Table (Violators Table) -->
                        <div class="right-table" id="violatorsTable"></div>
                    </div>
                @endif
            </div>
        </div>
    </x-app-layout>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('click', '.view-violators', function() {
            const barangay = $(this).data('barangay');
            
            // Make an AJAX request to fetch violators for this barangay
            $.ajax({
                url: '/violators/' + encodeURIComponent(barangay), // AJAX request to the controller method
                method: 'GET',
                success: function(response) {
                    let violatorsTable = ` 
                        <h3>Violators in ${barangay}</h3>
                        <table class="table table-striped table-bordered" id="violatorsTable">
                            <thead>
                                <tr>
                                    <th>Name of Skipper</th>
                                    <th>Number of Violations</th>
                                    <th>Violation</th>
                                    <th>Compensation</th>
                                </tr>
                            </thead>
                            <tbody>
                    `;
                    
                    if (response.length === 0) {
                        violatorsTable += '<tr><td colspan="4" class="text-center">No violators found.</td></tr>';
                    } else {
                        response.forEach(violator => {
                            const violationCount = violator.violations.length; // Number of violations per violator

                            violator.violations.forEach((violation, index) => {
                                const violationLabel = `${index + 1}${index === 0 ? 'st' : (index === 1 ? 'nd' : (index === 2 ? 'rd' : 'th'))} violation`;

                                violatorsTable += `
                                    <tr>
                                        ${index === 0 ? `<td rowspan="${violationCount}">${violator.name_of_skipper}</td>` : ''}
                                        <td>${violationLabel}</td>
                                        <td>${violation.violation}</td>
                                        <td>${violation.compensation}</td>
                                    </tr>
                                `;
                            });
                        });
                    }

                    violatorsTable += `</tbody></table>`;
                    
                    // Append the table to the div
                    $('#violatorsTable').html(violatorsTable);
                },
                error: function() {
                    $('#violatorsTable').html('<div class="alert alert-danger">Error loading violators.</div>');
                }
            });
        });
    </script>
</body>
</html>
