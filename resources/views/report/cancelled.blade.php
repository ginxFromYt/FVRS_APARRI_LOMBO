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
            font-family: 'Merriweather', serif;
            background-color: #f4f4f4;
        }

        .table-wrapper {
            margin-left: 320px;
            margin-right: 10px;
            margin-top: 5px;
            height: calc(100% - 60px);
            overflow-y: auto;
            overflow-x: hidden;
        }

        .table {
            width: calc(100% - 20px);
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
        }

        .table-header th {
            background-color: blue;
            color: white;
            position: sticky;
            top: 0;
            z-index: 1;
            box-shadow: inset 0 1px 0 rgba(0, 0, 0, 0.1);
        }

        th {
            width: 10%;
        }

        td img {
            max-width: 80px;
            height: auto;
        }

        /* Control Panel Styles */
        .control-panel {
            position: fixed;
            left: 0;
            top: 0;
            width: 300px;
            height: 100%;
            background-color: lightblue;
            padding: 20px;
            padding-top: 80px;
            box-shadow: rgba(0, 123, 255, 0.8) 0px 0px 15px;
            z-index: 1000;
            transition: left 0.3s ease;
            font-family: 'Merriweather', serif;
            font-weight: bold;
        }

        .control-panel-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .control-panel-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .control-panel-header h2 {
            color: blue;
            font-weight: bold;
            font-size: 24px;
            margin-top: 0;
        }

        .control-panel a {
            width: 90%;
            margin: 10px 0;
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: blue;
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .control-panel a i {
            margin-right: 10px;
        }

        .control-panel a:hover {
            background-color: #ddd;
            color: blue;
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
    </style>
</head>

<body>

    <!-- Toggle Button -->
    <div class="toggle-button" id="toggleButton">
        <i class="fas fa-bars"></i>
    </div>

    <!-- Control Panel -->
    @extends('layouts.Users.navigation')

    <div class="container table-wrapper">
        <h1>Cancelled Reports</h1>

        <div id="success-message" class="alert alert-success" style="display: none;"></div>

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
    </script>
</body>

</html>
