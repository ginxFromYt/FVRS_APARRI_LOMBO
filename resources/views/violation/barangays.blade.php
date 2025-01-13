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
            width: 48%;
        }
        .table {
            border-radius: 0.5rem;
            overflow: hidden;
            margin: auto;
        }
        .table thead {
            background-color: #28a745;
            color: white;
        }
        .btn-primary {
            margin-top: 20px;
        }
        .back-button {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }

        /* Hidden columns */
        .hidden-column {
            display: none;
        }

        .action-btn-container {
            display: flex;
            align-items: center;
        }

        .action-btn-container .btn {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Barangays with Violations') }}
            </h1>
        </x-slot>

        <div class="container">
            @if($barangays->isEmpty())
                <div class="alert alert-info text-center">No barangays with violations found.</div>
            @else
                <div class="table-container">
                    <!-- Left Table -->
                    <div class="left-table">
                        <h1 class="text-center">Barangays with Violations</h1>
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
                                <th class="hidden-column">Number of Violations</th>
                                <th class="hidden-column">Violation</th>
                                <th class="hidden-column">Compensation</th>
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

                            // Determine color based on the violation index (0-based)
                            let violationColor = '';
                            if (index === 0) {
                                violationColor = 'background-color: yellow;';
                            } else if (index === 1) {
                                violationColor = 'background-color: green; color: white;';
                            } else if (index === 2) {
                                violationColor = 'background-color: red; color: white;';
                            }

                            violatorsTable += `
                                <tr style="${violationColor}">
                                    ${index === 0 ? `<td rowspan="${violationCount}">${violator.name_of_skipper}
                                        <div class="action-btn-container">
                                            <button class="btn btn-success" id="toggleViolations">Show Violations</button>
                                        </div></td>` : ''}
                                    <td class="hidden-column">${violationLabel}</td>
                                    <td class="hidden-column">${violation.violation}</td>
                                    <td class="hidden-column">${violation.compensation}</td>
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

    // Toggle the visibility of the additional columns when the button is clicked
    $(document).on('click', '#toggleViolations', function() {
        const isHidden = $('.hidden-column').first().is(':hidden');
        if (isHidden) {
            $('.hidden-column').show();
            $(this).text('Hide Violations');
        } else {
            $('.hidden-column').hide();
            $(this).text('Show Violations');
        }
    });
</script>

</body>
</html>
