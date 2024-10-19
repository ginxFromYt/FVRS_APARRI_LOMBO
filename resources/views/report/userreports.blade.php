<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Reports</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Custom styles to adjust table width and appearance */
        html, body {
            height: 100%;
            margin: 0;
            overflow: hidden; 
            font-family: 'Merriweather', serif;
            background-color: #f4f4f4;
        }

        .table-wrapper {
            margin-left: 320px; /* Increased margin to start beside the control panel */
            margin-right: 10px; /* Reduced space on the right side */
            margin-top: 5px; /* Further reduced space above the table */
            height: calc(100% - 60px); /* Adjust height to fit below header, less space for table */
            overflow-y: auto; /* Enable vertical scrolling if needed */
            overflow-x: hidden; /* Disable horizontal scrolling */
        }

        .table {
            width: calc(100% - 20px); /* Full width minus padding for left/right space */
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            border: 1px solid #ccc;
            padding: 6px; /* Further reduced padding for table cells */
            text-align: left;
            box-sizing: border-box;
        }

        .table-header th {
            background-color: blue; /* Changed header background color to blue */
            color: white;
            position: sticky;
            top: 0; 
            z-index: 1; 
            box-shadow: inset 0 1px 0 rgba(0, 0, 0, 0.1); 
        }

        th {
            width: 10%; /* Slightly increase width for better balance */
        }

        td img {
            max-width: 80px;
            height: auto;
        }

        /* Control Panel Styles */
        .control-panel {
            position: fixed;
            left: 0; /* Set to 0 to be visible by default */
            top: 0;
            width: 300px;
            height: 100%;
            background-color: lightblue;
            padding: 20px;
            padding-top: 80px; /* Increased space above the logo */
            box-shadow: rgba(0, 123, 255, 0.8) 0px 0px 15px;
            z-index: 1000;
            transition: left 0.3s ease;
            font-family: 'Merriweather', serif;
            font-weight: bold;
        }

        .control-panel-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px; /* Space below the logo */
        }

        .control-panel-header img {
            width: 40px; /* Set the logo width to 40px */
            height: 40px; /* Set the logo height to 40px */
            border-radius: 50%; /* Make the logo rounded */
            margin-right: 10px; /* Add space between logo and text */
        }

        .control-panel-header h2 {
            color: blue;
            font-weight: bold;
            font-size: 24px;
            margin-top: 0; /* Remove the top margin */
        }

        .control-panel a {
            width: 90%;
            margin: 10px 0;
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: blue; /* Set link text color to blue */
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s; /* Added transition for color change */
        }

        .control-panel a i {
            margin-right: 10px;
        }

        .control-panel a:hover {
            background-color: #ddd;
            color: blue; /* Change text color to blue on hover */
        }

        .logout-btn {
            background-color: #fff; /* Set background color to white */
            color: blue; /* Set text color to blue */
            border-radius: 5px; /* Match other links */
            padding: 10px;
            width: 90%; /* Match width of other links */
            border: none; /* Remove border for consistency */
            cursor: pointer; /* Change cursor to pointer */
            text-align: left; /* Align text to the left */
        }

        .toggle-button {
            position: fixed;
            top: 20px;
            left: 10px;
            z-index: 1100;
            cursor: pointer;
            color: gray;
            padding: 15px;
            border-radius: 5px;
            font-size: 20px;
        }

        .toggle-button i {
            font-size: 24px;
            color: black;
        }

        /* Button Styles */
        .action-btn {
            width: 80px; /* Reduced width */
            height: 30px; /* Reduced height */
            font-size: 12px; /* Smaller font size */
            margin-right: 5px; /* Reduced space between buttons */
        }

        .see-more {
            color: blue;
            cursor: pointer;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Toggle Button -->
    <div class="toggle-button" id="toggleButton">
        <i class="fas fa-bars"></i>
    </div>

    <!-- Control Panel -->
    <div class="control-panel" id="controlPanel">
        <div class="control-panel-header">
            <img src="{{ asset('img/1.jpg') }}" alt="Logo">
            <h2>Maritime Panel</h2>
        </div>

        <a href="{{ route('dashboard') }}" class="btn">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>

        <a href="{{ route('users.myreports') }}" class="btn">
            <i class="fas fa-file-alt"></i> Spot Reports
        </a>

        <a href="" class="btn">
            <i class="fas fa-check-circle"></i> Resolved Reports
        </a>

        <a href="" class="btn">
            <i class="fas fa-times-circle"></i> Cancelled Reports
        </a>

        <a href="" class="btn">
            <i class="fas fa-file-contract"></i> Terms and Conditions
        </a>

        <a href="{{ route('profile.edit') }}" class="btn">
            <i class="fas fa-user"></i> Profile
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Log Out
            </button>
        </form>
    </div>

    <div>
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($userreports->isEmpty())
            <div class="alert alert-info">
                No user reports found.
            </div>
        @else
            <div class="table-wrapper">
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
                                        <span class="see-more" data-details="{{ htmlspecialchars($report->information) }}">See More</span>
                                    @else
                                        {{ htmlspecialchars($report->information) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($report->photo)
                                        <a href="#" class="photo-link" data-photo="{{ asset('storage/' . $report->photo) }}">
                                            <img src="{{ asset('storage/' . $report->photo) }}" alt="User Photo">
                                        </a>
                                    @endif
                                </td>

                                <td>
    <!-- Resolved Button -->
    <a href="{{ route('resolved.index') }}" class="btn btn-success">Resolved</a>
    
    <!-- Cancelled Button -->
    <a href="{{ route('cancelled.index') }}" class="btn btn-danger">Cancelled</a>
</td>

                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Modal for Viewing Violation Details -->
    <div class="modal fade" id="violationDetailsModal" tabindex="-1" role="dialog" aria-labelledby="violationDetailsModalLabel" aria-hidden="true">
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
        // Toggle Control Panel visibility
        const toggleButton = document.getElementById('toggleButton');
        const controlPanel = document.getElementById('controlPanel');

        toggleButton.addEventListener('click', () => {
            if (controlPanel.style.left === '0px') {
                controlPanel.style.left = '-300px'; // Hide control panel
            } else {
                controlPanel.style.left = '0px'; // Show control panel
            }
        });

        // Show violation details in a modal
        document.querySelectorAll('.see-more').forEach(item => {
            item.addEventListener('click', function() {
                const details = this.getAttribute('data-details');
                document.getElementById('violationDetailsContent').innerText = details;
                $('#violationDetailsModal').modal('show');
            });
        });

        // Show photo in a modal
        document.querySelectorAll('.photo-link').forEach(item => {
            item.addEventListener('click', function(event) {
                event.preventDefault();
                const photoSrc = this.getAttribute('data-photo');
                const imgElement = `<img src="${photoSrc}" class="img-fluid" alt="User Photo">`;
                document.getElementById('violationDetailsContent').innerHTML = imgElement;
                $('#violationDetailsModal').modal('show');
            });
        });
    </script>
</body>
</html>
