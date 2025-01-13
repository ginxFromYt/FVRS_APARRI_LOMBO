<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Release Papers</title>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('fontawesome-free-5.15.4-web/css/all.min.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            flex-grow: 1;
            padding: 20px;
            margin-left: 150px; /* Space for the control panel */
            transition: margin-left 0.3s ease;
            overflow-y: auto;
            display: flex;
            justify-content: center; /* Centering the content horizontally */
        }

        .table-container {
            width: 100%;
            max-width: 1000px; /* Maximum width of the table */
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden; /* Remove horizontal scroll */
        }

        .table-title {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            word-wrap: break-word;
            table-layout: fixed; /* Ensures even distribution of columns */
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f1f1f1;
            color: #333;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            padding: 10px 10px;
            color: white;
            border: none;
            cursor: pointer;
            text-align: center;
        }

        .btn-primary:hover {
            background-color: #218838;
        }

        .photo-img {
            width: 100px;
            height: auto;
            border-radius: 5px;
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
            transform: translateX(-100%);
        }

        .table-responsive {
            display: flex;
            justify-content: center; /* Center the table horizontally */
            align-items: center;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                margin-left: 0; /* Adjust margin for smaller screens */
            }
        }
    </style>
</head>
<body>

    <button class="toggle-button" onclick="togglePanel()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navigation Panel -->
    <div id="controlPanel">
        @include('layouts.Users.navigation')
    </div>

    <div class="container">
        <div class="table-container">
            <h2 class="table-title">Release Papers</h2>

            <!-- Wrapper for responsive table -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Skipper Name</th>
                            <th>Address</th>
                            <th>Violation</th>
                            <th>Date of Violation</th>
                            <!-- <th>Time of Violation</th> -->
                            <th>Date of Release</th>
                            <th>Compensation</th>
                            <!-- <th>Agricultural Technologist</th>
                            <th>Municipal Agriculturist</th>
                            <th>Photo</th> -->
                            <!-- <th>Actions</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Iterate through each release and display its details in a row -->
                        @foreach($releases as $release)
                            <tr>
                                <td>{{ $release->name_of_skipper }}</td>
                                <td>{{ $release->address }}</td>
                                <td>{{ $release->violation }}</td>
                                <td>{{ $release->date_of_violation }}</td>
                                <!-- <td>{{ $release->time_of_violation }}</td> -->
                                <td>{{ $release->date_of_release }}</td>
                                <td>{{ $release->compensation }}</td>
                                <!-- <td>{{ $release->agricultural_technologist }}</td>
                                <td>{{ $release->municipal_agriculturist }}</td> -->
                                <!-- <td>
                                    @if($release->photo)
                                        <img class="photo-img" src="{{ asset('storage/photos/' . $release->photo) }}" alt="Release Photo">
                                    @else
                                        No Photo
                                    @endif
                                </td> -->
                                <!-- <td>

                                
                                
                                <a href="{{ route('releasepapers.pdf', ['id' => encrypt($release->id)]) }}" class="btn btn-primary" target="_blank">
                                    <i class="fas fa-file-pdf"></i> Download PDF
                                </a>

                                </td> -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function togglePanel() {
            const panel = document.getElementById('controlPanel');
            const container = document.querySelector('.container');
            panel.classList.toggle('hidden');
            if (panel.classList.contains('hidden')) {
                container.style.marginLeft = '0'; // Remove margin when control panel is hidden
            } else {
                container.style.marginLeft = '250px'; // Restore margin when control panel is visible
            }
        }
    </script>

    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>
</html>
