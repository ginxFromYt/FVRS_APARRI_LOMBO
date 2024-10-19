<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('fontawesome-free-5.15.4-web/css/all.min.css') }}" rel="stylesheet">
    <title>Record Violation</title>

    <style>
        body {
            font-family: 'Merriweather', serif;
            font-weight: bold;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .control-panel {
            width: 300px;
            background-color: green;
            border-right: 1px solid green;
            position: fixed;
            top: 40px;
            left: 0;
            height: calc(100% - 40px);
            padding: 20px;
            transition: transform 0.3s ease-in-out;
            z-index: 1000;
        }

        .control-panel .btn {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 100%;
            margin-bottom: 10px;
            background-color: white;
            color: green;
            border: 1px solid green;
        }

        .control-panel .btn i {
            margin-right: 10px;
            color: green;
        }

        .thin-container {
            background-color: black;
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

        .form-container {
            margin-left: 300px;
            margin-top: 60px;
            padding: 20px;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-height: 500px;
            overflow-y: auto;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input, form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form button {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background-color: darkgreen;
        }

        .violator {
            margin-top: 15px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="thin-container">
        <h5 class="container-text">Municipal Agriculture Office-Aparri</h5>
    </div>

    <!-- Control Panel -->
    <div class="control-panel">
        <div class="control-panel-header text-center">
            <img src="{{ asset('img/maologo.jpg') }}" alt="Logo" class="rounded-circle" style="width: 100px; height: 100px;">
            <h2 class="control-panel-title" style="font-size: 1.25rem;">Record Violations</h2>
        </div>

        <!-- Links -->
        <a href="{{ route('dashboard') }}" class="btn mb-2">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <a href="{{ route('admin.report') }}" class="btn mb-2">
            <i class="fas fa-file-alt"></i> Maritime Reports
        </a>
        <a href="{{ route('admin.referrals') }}" class="btn mb-2">
            <i class="fas fa-share-square"></i> View Referrals
        </a>
        <a href="{{ route('violation.record') }}" class="btn mb-2">
            <i class="fas fa-plus-square"></i> Record a Violation
        </a>
        <a href="{{ route('violation.list') }}" class="btn mb-2">
            <i class="fas fa-list"></i> List of Records
        </a>

        <!-- New "History" navigation link -->
        <a href="{{ route('admin.history') }}" class="btn">
            <i class="fas fa-history"></i> History
        </a>
    </div>

    <!-- Form -->
   <!-- Form -->
<div class="form-container">
    <form action="{{ route('violation.store') }}" method="POST">
        @csrf

        <label for="violation">Violation:</label>
        <select name="violation" id="violation" required>
            <option value="" disabled selected>Select a violation</option>
            <option value="Illegal fishing">Section 33 (Unauthorized Fishing Activities)</option>
            <option value="Unauthorized docking">Unauthorized Docking</option>
            <option value="Overfishing">Overfishing</option>
        </select>

        <label for="location">Location of Incident:</label>
        <input type="text" name="location" required>

        <label for="date_of_violation">Date of Violation:</label>
        <input type="date" name="date_of_violation" required>

        <label for="time_of_violation">Time of Violation:</label>
        <input type="time" name="time_of_violation" required>

        <label for="referral">Select Referral:</label>
        <select name="referral_id" id="referral" required>
            <option value="" disabled selected>Select a referral</option>
            @foreach($referrals as $referral)
                <option value="{{ $referral->id }}">{{ $referral->name }}</option> <!-- Adjust based on your referral attributes -->
            @endforeach
        </select>

        <h3>Violator Information</h3>
        
        <div id="violator-fields">
            <div class="violator">
                <label for="violator">Violator:</label>
                <input type="text" name="violators[0][violator]" placeholder="Enter full name" required>

                <label for="sex">Sex:</label>
                <select name="violators[0][sex]" required>
                    <option value="" disabled selected>Select a sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <label for="address">Address of Violator:</label>
                <input type="text" name="violators[0][address]" required>
            </div>
        </div>

        <button type="button" id="add-violator">Add Another Violator</button>
        <button type="submit">Submit</button>
    </form>
</div>


    <script>
        let violatorCount = 1; // Start from 1 since we already have one violator input
        document.getElementById('add-violator').addEventListener('click', function() {
            const violatorDiv = document.createElement('div');
            violatorDiv.classList.add('violator');
            violatorDiv.innerHTML = 
                <label for="violator">Violator:</label>
                <input type="text" name="violators[${violatorCount}][violator]" placeholder="Enter full name" required>
                <label for="sex">Sex:</label>
                <select name="violators[${violatorCount}][sex]" required>
                    <option value="" disabled selected>Select a sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <label for="address">Address of Violator:</label>
                <input type="text" name="violators[${violatorCount}][address]" required>
            ;
            document.getElementById('violator-fields').appendChild(violatorDiv);
            violatorCount++;
        });
    </script>
</body>
</html>