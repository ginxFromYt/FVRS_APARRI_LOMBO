<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancelled Reports</title>
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
            background-color: #f4f4f4;
        }

        .table-wrapper {
            margin-left: 250px;
            margin-right: 10px;
            margin-top: 5px;
            height: calc(100% - 60px);
            overflow-y: auto;
            overflow-x: hidden;
            transition: margin-left 0.3s ease, width 0.3s ease; /* Smooth transition */
        }

        .table-wrapper.expanded {
            margin-left: auto;
            margin-right: auto;
            width: 90%; /* Expand width to center when navigation is hidden */
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            border: 1px solid #ccc;
            padding: 6px;
            text-align: left;
            box-sizing: border-box;
            vertical-align: top; /* Ensures all cells align well even with wrapped text */
        }

        .table-header th {
            background-color: blue;
            color: white;
            position: sticky;
            top: 0;
            z-index: 1;
            box-shadow: inset 0 1px 0 rgba(0, 0, 0, 0.1);
        }

        /* Limit width for the Information column */
        .table td:nth-child(4) {
            max-width: 200px; /* Adjust as needed */
            white-space: normal;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        th {
            width: 10%;
        }

        td img {
            max-width: 80px;
            height: auto;
        }

        .logout-btn {
            background-color: #fff;
            color: blue;
            border-radius: 5px;
            padding: 10px;
            width: 90%;
            border: none;
            cursor: pointer;
            text-align: left;
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
    <div class="container table-wrapper" id="tableWrapper">
        <div id="success-message" class="alert alert-success" style="display: none;"></div>

        <h3 class="mb-2">List of Cancelled Reports</h3>

        <table class="table table-bordered">
            <thead class="table-header">
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Information</th>
                    <th>Photo</th>
                    <!-- <th>Cancelled At</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $datas)
                    <tr>
                        <!-- <td>{{ $datas->id }}</td> -->
                        <td>{{ $datas->name }}</td>
                        <td>{{ $datas->address }}</td>
                        <td>{{ $datas->contact_number }}</td>
                        <td>{{ $datas->information }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $datas->photo) }}" alt="User Photo" class="img-fluid" style="max-width: 80px;">
                        </td>
                        <!-- <td>{{ $datas->cancelled_at }}</td> -->
                    </tr>
                @endforeach
            </tbody>
        </table>
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
    </script>
</body>

</html>

