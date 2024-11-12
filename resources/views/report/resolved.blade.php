<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolved Reports</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            overflow: hidden;
            font-family: 'Merriweather', serif;
            background-color: #f4f4f4;
        }

        .table-wrapper {
            margin-left: 250px;
            margin-top: 5px;
            height: calc(100% - 60px);
            overflow-y: auto;
            overflow-x: hidden;
            transition: margin 0.3s ease;
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

    <button class="toggle-button" onclick="togglePanel()">
        <i class="fas fa-bars"></i>
    </button>

    <div id="controlPanel">
        @include('layouts.Users.navigation')
    </div>

    <div id="tableWrapper" class="container table-wrapper">
        <div id="success-message" class="alert alert-success" style="display: none;"></div>

        <h3 class="mb-2">List of Resolved Reports</h3>

        <table class="table table-bordered">
            <thead class="table-header">
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Information</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $datas)
                    <tr>
                        <td>{{ $datas->name }}</td>
                        <td>{{ $datas->address }}</td>
                        <td>{{ $datas->contact_number }}</td>
                        <td>{{ $datas->information }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $datas->photo) }}" alt="User Photo" class="img-fluid" style="max-width: 80px;">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function togglePanel() {
            const panel = document.getElementById('controlPanel');
            const tableWrapper = document.getElementById('tableWrapper');
            panel.classList.toggle('hidden');
            
            if (panel.classList.contains('hidden')) {
                tableWrapper.style.marginLeft = 'auto';
                tableWrapper.style.marginRight = 'auto';
                tableWrapper.style.width = '80%';
            } else {
                tableWrapper.style.marginLeft = '250px';
                tableWrapper.style.marginRight = '10px';
                tableWrapper.style.width = 'calc(100% - 260px)';
            }
        }
    </script>
</body>

</html>
