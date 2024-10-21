<!DOCTYPE html>
<html lang="en">
<head>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('fontawesome-free-5.15.4-web/css/all.min.css') }}" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Referral</title>
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
        }

        .title {
            margin-top: 20px;
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

        h5, h2 {
            color: white;
        }

        /* Button Styling */
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

        .submit-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
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
            <h2 class="control-panel-title">Submit Referral</h2>
        </div>

        <!-- Dashboard Link -->
        <a href="{{ route('dashboard') }}" class="btn">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        
        <!-- Spot Reports Link -->
        <a href="{{ route('users.myreports') }}" class="btn">
            <i class="fas fa-file-alt"></i> Spot Reports
        </a>

        
        <!-- Terms and Conditions Link -->
        <a href="#" class="btn">
            <i class="fas fa-file-contract"></i> Terms and Conditions
        </a>

        <!-- Profile Link -->
        <a href="{{ route('profile.edit') }}" class="btn">
            <i class="fas fa-user"></i> Profile
        </a>
    </div>

    <!-- Toggle button -->
    <button class="toggle-button" onclick="toggleControlPanel()">
        <i class="fas fa-bars"></i> <!-- Large icon in black -->
    </button>

    <!-- Form container for referral submission -->
    <div class="container">
        <div class="form-container">
            <h5 class="text-center text-primary">Violator {{ $report->nameofskipper }}</h5>
            <form action="{{ route('storeReferral') }}" method="POST">
                @csrf
                <input type="hidden" name="report_id" value="{{ $report->id }}">

                <!-- Date (auto-filled with current date) -->
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" readonly required>
                </div>

                <div class="form-group">
                    <label for="violation">Violation</label>
                    <input type="text" class="form-control" name="violation" value="{{ $report->violation }}" readonly>
                </div>

                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" class="form-control" id="time" name="time" required>
                </div>

                <div class="form-group">
                    <label for="date_of_violation">Date of Violation</label>
                    <input type="date" class="form-control" id="date_of_violation" name="date_of_violation" required>
                </div>

                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" required>
                </div>

                <div class="form-group">
                    <label for="complainant">Complainant</label>
                    <input type="text" class="form-control" id="complainant" name="complainant" required>
                </div>

                <div class="form-group">
                    <label for="piece_of_evidence">Piece of Evidence</label>
                    <textarea class="form-control" id="piece_of_evidence" name="piece_of_evidence" required></textarea>
                </div>

                <div class="form-group">
                    <label for="attach_evidence">Attach Evidence (Upload Photo)</label>
                    <input type="file" class="form-control" id="attach_evidence" name="attach_evidence[]" accept="image/*" multiple>
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

        // Set the date input field to today's date
        document.addEventListener("DOMContentLoaded", function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById("date").value = today;
        });
    </script>

    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>
</html>
