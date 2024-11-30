<!DOCTYPE html>
<html lang="en">
<head>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('fontawesome-free-5.15.4-web/css/all.min.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Referral</title>
    <style>
        /* Styling */
        body {
            font-weight: bold;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
        }

        .form-container {
            border: 1px solid #0d6efd;
            padding: 20px;
            margin-top: 100px;
            max-width: 1080px;
            width: 100%;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .btn-orange {
            background-color: orange;
            color: white;
            border: 1px solid orange;
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-orange:hover {
            background-color: darkorange;
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

        .content-wrapper {
            margin-left: 270px; /* Adjust margin to make room for the navigation panel */
            display: flex;
            justify-content: flex-start;
        }

        .submit-container {
            display: flex;          /* Use flexbox */
            justify-content: center; /* Center the button */
            margin-top: 15px;
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

    <!-- Navigation Panel -->
    <div id="controlPanel">
        @include('layouts.Users.navigation')
    </div>

<div class="content-wrapper">
    <div class="form-container">
        <h5 class="text-center font-weight-bold">Violator: {{ $report->nameofskipper }}</h5>
  
       <!-- Display Error Messages -->
       @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
        <form action="{{ route('storeReferral') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="report_id" value="{{ $report->id }}">
            <div class="row">
                <!-- Left half of the form -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
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
                </div>

                <!-- Right half of the form -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="complainant">Complainant</label>
                        <input type="text" class="form-control" id="complainant" name="complainant" required>
                    </div>
                    <div class="form-group">
                        <label for="investigator_pnco">Investigator PNCO</label>
                        <input type="text" class="form-control" id="investigator_pnco" name="investigator_pnco" required>
                    </div>
                    <div class="form-group">
                        <label for="piece_of_evidence">Piece of Evidence</label>
                        <textarea class="form-control" id="piece_of_evidence" name="piece_of_evidence" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Attach Evidence (Upload Photo)</label>
                        <input type="file" class="form-control" id="image" name="image[]" accept="image/*" multiple>
                    </div>
                </div>
            </div>
            <div class="submit-container mt-3">
                <button type="submit" class="btn btn-orange" style="width: 5rem;">Submit</button>
            </div>
        </form>
    </div>
</div>



<script>
    function togglePanel() {
            const panel = document.getElementById('controlPanel');
            const mainContent = document.getElementById('mainContent');
            panel.classList.toggle('hidden');
            mainContent.style.marginLeft = panel.classList.contains('hidden') ? '0' : '250px';
        }

        document.addEventListener('DOMContentLoaded', function() {
        const dateInput = document.getElementById('date');
        const today = new Date().toISOString().split('T')[0]; // Format: YYYY-MM-DD
        dateInput.value = today;
    });
</script>

<script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>
</html>

