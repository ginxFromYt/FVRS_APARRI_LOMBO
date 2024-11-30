<!DOCTYPE html>
<html lang="en">

<head>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('fontawesome-free-5.15.4-web/css/all.min.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        th {
            background-color: orange;
            color: white;
        }

        table th:nth-child(1),
        table td:nth-child(1) {
            width: 50px;
        }

        .btn-referral {
            display: inline-block;
            padding: 4px 8px;
            font-size: 14px;
            font-weight: 400;
            text-align: center;
            cursor: pointer;
            background-color: blue;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-referral:hover {
            background-color: darkorange;
        }

        .container-content {
            margin-left: 250px;
            padding: 20px;
            padding-top: 80px;
            max-height: calc(100vh - 80px);
            overflow-y: auto;
            transition: margin-left 0.3s ease-in-out;
        }

        .thin-container {
            background-color: gray;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            z-index: 1001;
        }

        h5, h2 {
            color: white;
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
            transform: translateX(-100%);
        }

        /* Style for toggle button */
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

    <div class="container-content" id="mainContent">
        <div class="table-responsive">

        <h3 class="font-weight-bold mb-2">List of Spot Reports</h3>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name of Banca</th>
                        <th>Name of Skipper</th>
                        <th>Age</th>
                        <th>Birthdate</th>
                        <th>Status</th>
                        <th>Religion</th>
                        <th>Educational Background</th>
                        <th>Occupation</th>
                        <th>Barangay</th>
                        <th>Violation</th>
                        <th>Engine</th>
                        <th>Engine No.</th>
                        <th>Grid Coordinate</th>
                        <th>Estimated Amount of Banca</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($myreports as $report)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $report->nameofbanca }}</td>
                            <td>{{ $report->nameofskipper }}</td>
                            <td>{{ $report->age }}</td>
                            <td>{{ $report->birthdate }}</td>
                            <td>{{ $report->status }}</td>
                            <td>{{ $report->religion }}</td>
                            <td>{{ $report->educationalbackground }}</td>
                            <td>{{ $report->occupation }}</td>
                            <td>{{ $report->resident }}</td>
                            <td>{{ $report->violation }}</td>
                            <td>{{ $report->engine }}</td>
                            <td>{{ $report->engineno }}</td>
                            <td>{{ $report->gridcoordinate }}</td>
                            <td>{{ $report->amount }}</td>
                            <td class="btn-container">
                                <a href="{{ route('addReferral', ['id' => $report->id]) }}" class="btn btn-referral">Submit Referral</a>
                                <a href="{{ route('turnoverReceiptForm', ['id' => $report->id]) }}" class="btn btn-referral">Turnover Receipt</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function togglePanel() {
            const panel = document.getElementById('controlPanel');
            const mainContent = document.getElementById('mainContent');
            panel.classList.toggle('hidden');
            mainContent.style.marginLeft = panel.classList.contains('hidden') ? '0' : '250px';
        }
    </script>

    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>

</html>
