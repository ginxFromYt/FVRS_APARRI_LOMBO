<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Reports</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Custom styles to adjust table width and appearance */
        html,
        body {
            height: 100%;
            margin: 0;
            overflow: hidden;
            font-family: 'Merriweather', serif;
            background-color: #f4f4f4;
        }

        .table-wrapper {
            margin-left: 290px;
            margin-right: 10px;
            /* Reduced space on the right side */
            margin-top: 5px;
            /* Further reduced space above the table */
            height: calc(100% - 60px);
            /* Adjust height to fit below header, less space for table */
            overflow-y: auto;
            /* Enable vertical scrolling if needed */
            overflow-x: hidden;
            /* Disable horizontal scrolling */
            transition: margin-left 0.3s ease, width 0.3s ease;
        }

        .table-wrapper.expanded {
            margin-left: auto;
            margin-right: auto;
            width: 80%; /* Adjust to desired width */
        }

        .table {
            width: calc(100% - 20px);
            /* Full width minus padding for left/right space */
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            border: 1px solid #ccc;
            padding: 6px;
            /* Further reduced padding for table cells */
            text-align: left;
            box-sizing: border-box;
        }

        .table-header th {
            background-color: blue;
            /* Changed header background color to blue */
            color: white;
            position: sticky;
            top: 0;
            z-index: 1;
            box-shadow: inset 0 1px 0 rgba(0, 0, 0, 0.1);
        }

        th {
            width: 10%;
            /* Slightly increase width for better balance */
        }

        td img {
            max-width: 80px;
            height: auto;
        }

        .logout-btn {
            background-color: #fff;
            /* Set background color to white */
            color: blue;
            /* Set text color to blue */
            border-radius: 5px;
            /* Match other links */
            padding: 10px;
            width: 90%;
            /* Match width of other links */
            border: none;
            /* Remove border for consistency */
            cursor: pointer;
            /* Change cursor to pointer */
            text-align: left;
            /* Align text to the left */
        }

        .action-btn {
            width: 80px;
            /* Reduced width */
            height: 30px;
            /* Reduced height */
            font-size: 12px;
            /* Smaller font size */
            margin-right: 5px;
            /* Reduced space between buttons */
        }

        .see-more {
            color: blue;
            cursor: pointer;
            text-decoration: underline;
        }

        .toggle-button {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 1002;
            font-size: 20px;
            color: #333;
            background-color: lightgray;
            border: none;
            cursor: pointer;
        }

        /* Navigation panel styling */
        #controlPanel {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            background-color: lightgray;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        #controlPanel.hidden {
            transform: translateX(-100%); /* Hide the panel */
        }
    </style>
</head>

<body>

    <!-- Toggle Button -->
    <button class="toggle-button" onclick="togglePanel()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navigation Panel -->
    <div id="controlPanel">
        @include('layouts.Users.navigation')
    </div>

    <div>
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table Wrapper -->
        <div id="tableWrapper" class="table-wrapper">
            <table class="table table-bordered">
                <thead class="table-header">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th>Details of the Violation</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($userreports)
                        @foreach ($userreports as $index => $report)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ htmlspecialchars($report->name) }}</td>
                                <td>{{ htmlspecialchars($report->address) }}</td>
                                <td>{{ htmlspecialchars($report->contact_number) }}</td>
                                <td>
                                    <!-- Show "See More" link if details are long -->
                                    @if (strlen($report->information) > 50)
                                        {{ substr(htmlspecialchars($report->information), 0, 50) }}...
                                        <span class="see-more"
                                            data-details="{{ htmlspecialchars($report->information) }}">See More</span>
                                    @else
                                        {{ htmlspecialchars($report->information) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($report->photo)
                                        <a href="#" class="photo-link"
                                            data-photo="{{ asset('storage/' . $report->photo) }}">
                                            <img src="{{ asset('storage/' . $report->photo) }}" alt="User Photo">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <!-- Resolved button with check icon -->
                                    <form action="{{ route('report.resolved', $report->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn" style="border:none; background:none;">
                                            <i class="fas fa-check-circle text-success"></i>
                                        </button>
                                    </form>

                                    <!-- Cancelled button with times icon -->
                                    <form action="{{ route('report.cancelled', $report->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn" style="border:none; background:none;">
                                            <i class="fas fa-times-circle text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <div class="">
                            <h1>No user reports found.</h1>
                        </div>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Viewing Violation Details -->
    <div class="modal fade" id="violationDetailsModal" tabindex="-1" role="dialog"
        aria-labelledby="violationDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="violationDetailsModalLabel">Violation Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="violationDetailsContent"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script for Bootstrap and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function togglePanel() {
            const panel = document.getElementById('controlPanel');
            const tableWrapper = document.getElementById('tableWrapper');
            panel.classList.toggle('hidden');
            tableWrapper.classList.toggle('expanded');
        }

        // Show violation details in a modal
        document.querySelectorAll('.see-more').forEach(item => {
            item.addEventListener('click', function() {
                const details = this.getAttribute('data-details');
                document.getElementById('violationDetailsContent').innerText = details;
                $('#violationDetailsModal').modal('show');
            });
        });
    </script>

</body>

</html>
