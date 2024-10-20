<!DOCTYPE html>
<html lang="en">
<head>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('fontawesome-free-5.15.4-web/css/all.min.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incident Reports</title>
    <style>
        body {
            font-family: 'Merriweather', serif;
            font-weight: bold;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow: hidden; 
        }

        .container {
            max-width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
            white-space: nowrap; 
            overflow: hidden; 
            text-overflow: ellipsis; 
        }

        th {
            background-color: orange; 
            color: white; 
        }

        table th:nth-child(1), table td:nth-child(1) {
            width: 50px;
        }

        table th:nth-child(2), table td:nth-child(2) {
            width: 150px;
        }

        table th:nth-child(3), table td:nth-child(3) {
            width: 150px;
        }

        table th:nth-child(4), table td:nth-child(4),
        table th:nth-child(5), table td:nth-child(5),
        table th:nth-child(6), table td:nth-child(6),
        table th:nth-child(7), table td:nth-child(7),
        table th:nth-child(8), table td:nth-child(8),
        table th:nth-child(9), table td:nth-child(9),
        table th:nth-child(10), table td:nth-child(10),
        table th:nth-child(11), table td:nth-child(11),
        table th:nth-child(12), table td:nth-child(12),
        table th:nth-child(13), table td:nth-child(13) {
            width: 100px;
        }

        .btn-referral {
            display: inline-block;
            padding: 4px 8px;
            margin: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.5;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            background-color: orange; 
            border: 1px solid transparent;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-referral:hover {
            background-color: darkorange; 
        }

        .btn-container {
            text-align: center;
            vertical-align: middle;
        }

        .control-panel {
            width: 300px;
            background-color: lightblue; 
            border-right: 1px solid #0d6efd;
            position: fixed;
            top: 0;
            left: 0; 
            height: 100%;
            padding: 20px;
            padding-top: 80px; 
            transition: left 0.3s ease-in-out;
            z-index: 1000;
        }

        .control-panel-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .control-panel-header img {
            width: 50px; 
            height: 50px; 
            border-radius: 50%;
            margin-right: 15px;
        }

        .control-panel-header h2 {
            color: blue;
            font-weight: bold;
            font-size: 24px; 
            margin-top: 10px;
        }

       
        .control-panel a.btn {
            display: block;
            margin-bottom: 15px;
            color: #007bff; 
            text-decoration: none;
            font-size: 20px;
            border: 1px solid #007bff; 
            background-color: white; 
            padding: 11px;
            border-radius: 5px;
            text-align: left; 
            position: relative; 
        }

        .control-panel a.btn i {
            margin-right: 10px;
            color: #007bff; 
        }

        .control-panel a.btn.active {
            background-color: #007bff; 
            color: white; 
            border-color: #007bff; 
        }

        .control-panel a.btn.active i {
            color: white;
        }

        .container-content {
            margin-left: 300px; 
            padding: 20px;
            padding-top: 80px; 
            max-height: calc(100vh - 80px); 
            overflow-y: auto; 
            transition: margin-left 0.3s ease-in-out;
        }

        .thin-container {
            background-color: gray;
            height: 40px;
            width: 100%;
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
    </style>
</head>
<body>

    <div class="thin-container">
        <h5 class="container-text">Maritime Police Aparri</h5>
    </div>
    <div class="control-panel" id="controlPanel">
        <div class="control-panel-header">
            <img src="{{ asset('img/1.jpg') }}" alt="Logo" class="logo-main">
            <h2 class="control-panel-title">Maritime Reports</h2>
        </div>

        <a href="{{ route('dashboard') }}" class="btn" onclick="setActiveLink(this)">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        
        <a href="{{ route('users.myreports') }}" class="btn" onclick="setActiveLink(this)">
            <i class="fas fa-file-alt"></i> Reports
        </a>
        
    <a href="{{ route('turnover.display') }}" class="btn">
     <i class="fas fa-check-circle"></i> Turnover Receipt
    </a>

    <a href="" class="btn">
        <i class="fas fa-check-circle"></i> Resolved Reports
    </a>

    <a href="" class="btn">
        <i class="fas fa-times-circle"></i> Cancelled Reports
    </a>

        <a href="" class="btn" onclick="setActiveLink(this)">
            <i class="fas fa-file-contract"></i> Terms and Conditions
        </a>


        <a href="{{ route('profile.edit') }}" class="btn" onclick="setActiveLink(this)">
            <i class="fas fa-user"></i> Profile
        </a>
    </div>

    <div class="container-content">
        <div class="container my-4">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name of Banca</th>
                            <th>Name of Skipper</th>
                            <th>Age</th>
                            <th>Birthdate</th>
                            <th>Status</th>
                            <th>Educational Background</th>
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
                        @foreach($myreports as $report)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $report->nameofbanca }}</td>
                            <td>{{ $report->nameofskipper }}</td>
                            <td>{{ $report->age }}</td>
                            <td>{{ $report->birthdate }}</td>
                            <td>{{ $report->status }}</td>
                            <td>{{ $report->educationalbackground }}</td>
                            <td>{{ $report->resident }}</td>
                            <td>{{ $report->violation }}</td>
                            <td>{{ $report->engine }}</td>
                            <td>{{ $report->engineno }}</td>
                            <td>{{ $report->gridcoordinate }}</td>
                            <td>{{ $report->amount }}</td>
                            <td class="btn-container">
                                <a href="{{ route('addReferral', ['id' => $report->id]) }}" class="btn btn-referral">Submit Referral</a>
                                
                                <a href="{{ route('turnoverReceiptForm', ['id' => $report->id]) }}" class="btn btn-secondary">Turnover Receipt</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function setActiveLink(element) {
            document.querySelectorAll('.control-panel a.btn').forEach(function(link) {
                link.classList.remove('active');
            });


            element.classList.add('active');
        }
    </script>

    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>
</html>
