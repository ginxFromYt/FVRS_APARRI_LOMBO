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

        .form-container {
    border: 1px solid #0d6efd;
    padding: 20px;
    margin-top: 50px;
    margin-left: 400px;
    max-width: 500px;
    /* Removed the height setting */
    max-height: 80vh; /* Set a maximum height */
    overflow-y: auto; /* Add scrolling if content exceeds max height */
    box-sizing: border-box;
}


        .submit-container {
            margin-top: 10px;
            display: flex;
            justify-content: center;
        }

        .thin-container {
            background-color: gray;
            height: 40px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            height: auto;
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
                    <input type="date" class="form-control" name="date_of_violation" value="{{ $referral->date_of_violation  }}"required>
                </div>

                <div class="form-group">
                    <label for="time_of_violation">Time of Violation</label>
                    <input type="time" class="form-control" name="time_of_violation" value="{{ $referral->time   }}" required>
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
                    <input type="text" class="form-control" name="investigator_pnco" value="{{ $referral->investigator_pnco }}" required>
                </div>

                <div class="submit-container">
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
    </script>

    <!-- Include Bootstrap JS -->
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>
</html>
</head>

