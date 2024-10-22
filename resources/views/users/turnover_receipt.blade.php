<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnover Receipt</title>
    <!-- Include Bootstrap CSS -->
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnover Receipt</title>
    <!-- Include Bootstrap CSS -->
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('fontawesome-free-5.15.4-web/css/all.min.css') }}" rel="stylesheet">

    <style>
        /* Control Panel Styling */
        body {
            font-family: 'Merriweather', serif;
            font-weight: bold;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .control-panel {
            position: fixed;
            top: 40px;
            left: 0;
            width: 300px;
            height: calc(100% - 10px);
            background-color: lightblue;
            color: #0d6efd;
            padding: 20px;
            border-right: 1px solid #0d6efd;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        /* Hide the control panel when not visible */
        .control-panel.hidden {
            transform: translateX(-100%);
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

        /* Style for each link with a white background */
        .btn {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            color: #0d6efd;
            text-align: left;
            background-color: white;
            padding: 10px;
            text-decoration: none;
            border: 1px solid #0d6efd;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn i {
            margin-right: 10px;
            color: #0d6efd;
        }

        .btn:hover {
            background-color: #0d6efd;
            color: white;
        }

        /* Form Container Styling */
        .form-container {
            border: 1px solid #0d6efd;
            padding: 20px;
            margin-top: 50px;
            margin-left: 300px;
            max-width: 600px;
            height: calc(100vh - 10px);
            box-sizing: border-box;
        }

        .submit-container {
            margin-top: 10px;
            display: flex;
            justify-content: center;
        }

        /* Toggle button */
        .toggle-button {
            font-size: 15px;
            color: gray;
            border: none;
            padding: 5px 10px;
            position: fixed;
            top: 15px;
            left: 15px;
            cursor: pointer;
            z-index: 1100;
            background-color: transparent;
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

        h5 {
            color: white;
        }

        .btn-orange {
            background-color: orange;
            color: white;
            border: 1px solid orange;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-orange:hover {
            background-color: darkorange;
        }

    </style>
</head>
<body>
    <div class="thin-container">
        <h5 class="container-text">Maritime Police Aparri</h5>
    </div>

    <!-- Left-side control panel -->
    <div id="controlPanel" class="control-panel">
        <div class="control-panel-header">
            <img src="{{ asset('img/1.jpg') }}" alt="Logo" class="logo-main">
            <h2 class="control-panel-title">Turnover Receipt</h2>
        </div>
    <!-- Control Panel -->
    @extends('layouts.Users.navigation')

    </div>

    <!-- Toggle button -->
    <button class="toggle-button" onclick="toggleControlPanel()">
        <i class="fas fa-bars"></i> <!-- Large icon in black -->
    </button>

    <!-- Form container for turnover receipt submission -->
    <div class="container">
        <div class="form-container">
            <h2 class="text-center text-primary">Turnover Receipt Form</h2>
            <form action="{{ route('turnover.store') }}" method="POST">
                @csrf

                <input type="hidden" name="report_id" value="{{ $report->id }}"> 
                <div class="form-group">
                    <label for="municipal_agriculturist">Municipal Agriculturist</label>
                    <input type="text" class="form-control" name="municipal_agriculturist" required>
                </div>

                <div class="form-group">
                    <label for="date_of_violation">Date of Violation</label>
                    <input type="date" class="form-control" name="date_of_violation" value="{{ $referral->date_of_violation	 }}"required>
                </div>

                <div class="form-group">
                    <label for="time_of_violation">Time of Violation</label>
                    <input type="time" class="form-control" name="time_of_violation" value="{{ $referral->time	 }}" required>
                </div>

                <div class="form-group">
                    <label for="name_of_violation">Name of Violation</label>
                    <input type="text" class="form-control" name="name_of_violation" value="{{ $report->violation }}" readonly>
                </div>


                <div class="form-group">
                    <label for="name_of_skipper">Name of Skipper</label>
                    <input type="text" class="form-control" name="name_of_skipper" value="{{ $report->nameofskipper }}" required>
                </div>

                <div class="form-group">
                    <label for="name_of_banca">Name of Banca</label>
                    <input type="text" class="form-control" name="name_of_banca" value="{{ $report->nameofbanca }}" required>
                </div>

                <div class="form-group">
                    <label for="investigator_pnco">Investigator PNCO</label>
                    <input type="text" class="form-control" name="investigator_pnco" required>
                </div>

                <div class="submit-container">
                    <button type="submit" class="btn btn-orange" style="width: 5rem;">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleControlPanel() {
            var controlPanel = document.getElementById("controlPanel");
            controlPanel.classList.toggle("hidden");
        }
    </script>

    <!-- Include Bootstrap JS -->
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>
</html>
</head>


