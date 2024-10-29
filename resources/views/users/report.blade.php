<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Violation Report Form</title>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Merriweather', serif;
            font-weight: bold;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            margin-left: 260px;
            height: 100vh;
            overflow-y: auto;
            padding-top: 20px; /* Adds a bit of padding at the top */
        }

        .card {
            max-width: 800px;
            margin: auto;
        }

        .card-body {
            overflow-y: auto;
            max-height: 90vh; /* Allows the content to be scrollable within the card */
        }

        .form-control {
            width: 100%;
            padding: 8px;
            margin-bottom: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-primary {
            background-color: #FFA500;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-primary:hover {
            background-color: #FF8C00;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 0px;
        }

        h5, h2 {
            color: white;
        }

        .toggle-button {
            position: fixed;
            top: 20px;
            left: 10px;
            z-index: 1100;
            cursor: pointer;
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
    </style>
</head>
<body>
    
    <div id="controlPanel">
        @extends('layouts.Users.navigation')
    </div>

    <div class="d-flex align-items-center mt-3">
        <button class="toggle-button" onclick="toggleControlPanel()">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('reports.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nameofbanca">Name of Banca</label>
                                <input type="text" class="form-control" id="nameofbanca" name="nameofbanca">
                            </div>
                            <div class="mb-3">
                                <label for="nameofskipper">Name of Skipper</label>
                                <input type="text" class="form-control" id="nameofskipper" name="nameofskipper">
                            </div>
                            <div class="mb-3">
                                <label for="birthdate">Date of Birth</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate" oninput="calculateAge()">
                            </div>
                            <div class="mb-3">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" name="age" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="" disabled selected>Choose here</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Divorced">Divorced</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="religion">Religion</label>
                                <input type="text" class="form-control" id="religion" name="religion">
                            </div>
                            <div class="mb-3">
                                <label for="educationalbackground">Educational Background</label>
                                <select class="form-control" id="educationalbackground" name="educationalbackground">
                                    <option value="" disabled selected>Choose here</option>
                                    <option value="Elementarygraduate">Elementary Graduate</option>
                                    <option value="Highschoolgraduate">High School Graduate</option>
                                    <option value="Shsgraduate">Senior High School Graduate</option>
                                    <option value="Collegegraduate">College Graduate</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="occupation">Occupation</label>
                                <input type="text" class="form-control" id="occupation" name="occupation">
                            </div>
                            <div class="mb-3">
                                <label for="resident">Barangay</label>
                                <select class="form-control" id="resident" name="resident">
                                    <option value="" disabled selected>Choose here</option>
                                    <!-- Options truncated for brevity -->
                                    <option value="Centro 15">Centro 15</option>
                                    <option value="Dodan">Dodan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="violation">Violation</label>
                                <select class="form-control" id="violation" name="violation">
                                    <option value="" disabled selected>Choose here</option>
                                    <option value="Section 33 of Municipal Ordinance No. 2015-152">Section 33 of Aparri Municipal Ordinance No.2015-152 (Unauthorized Fishing Activities)</option>
                                    <option value="other"></option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="engine">Engine</label>
                                <input type="text" class="form-control" id="engine" name="engine">
                            </div>
                            <div class="mb-3">
                                <label for="engineno">Engine No.</label>
                                <input type="text" class="form-control" id="engineno" name="engineno">
                            </div>
                            <div class="mb-3">
                                <label for="gridcoordinate">Grid Coordinate</label>
                                <input type="text" class="form-control" id="gridcoordinate" name="gridcoordinate">
                            </div>
                            <div class="mb-3">
                                <label for="amount">Estimate Amount of Banca</label>
                                <input type="text" class="form-control" id="amount" name="amount">
                            </div>
                        </div>
                    </div>
                    <div class="button-container">
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function calculateAge() {
            var birthdate = document.getElementById('birthdate').value;
            var birthDate = new Date(birthdate);
            var today = new Date();
            var age = today.getFullYear() - birthDate.getFullYear();
            var month = today.getMonth() - birthDate.getMonth();
            if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            document.getElementById('age').value = age;
        }

        function toggleControlPanel() {
            var controlPanel = document.getElementById("controlPanel");
            controlPanel.classList.toggle("hidden");
        }
    </script>

    <script src="/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
