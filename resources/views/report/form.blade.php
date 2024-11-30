<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incident Report Form</title>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Merriweather', serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 80%;
            padding: 20px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #fff;
            padding: 20px;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #FFA500;
            color: white;
            padding: 10px;
            width: auto;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            display: block;
            margin: 0 auto;
        }

        .btn-primary:hover {
            background-color: #FF8C00;
        }

        .optional-text {
            font-size: 12px;
            color: gray;
        }

        .alert {
            margin-bottom: 15px;
        }

        .note {
            margin-bottom: 20px;
            font-size: 14px;
            color: #555;
            text-align: center;
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>Incident Report Form</h3>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }} <br>
                    Your report has been successfully submitted to the Maritime Police.
                </div>
                @endif

                <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- Left side of the form -->
                        <div class="col-md-6">
                            <!-- Name of reporter -->
                            <label for="name">Name of reporter (optional):</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="You may choose to remain anonymous">
                            <p class="optional-text">You can leave this blank if you prefer not to provide your name.</p>

                            <!-- Address of reporter -->
                            <label for="address">Address of reporter (optional):</label>
                            <input type="text" id="address" name="address" class="form-control" placeholder="Optional">
                            <p class="optional-text">Providing your address is optional.</p>

                            <!-- Contact number -->
                            <label for="contact_number">Contact Number of reporter (required):</label>
                            <input type="text" id="contact_number" name="contact_number" class="form-control"
                                placeholder="Enter your contact number" required>
                            <p class="optional-text">Enter your contact number so we can reach you for further details.</p>
                        </div>

                        <!-- Right side of the form -->
                        <div class="col-md-6">
                            <!-- Information about the violator -->
                            <label for="information">Details about the report (required):</label>
                            <textarea id="information" name="information" class="form-control" rows="5"
                                placeholder="Describe the incident..." required></textarea>

                            <!-- Photo upload -->
                            <label for="photo">Upload supporting photo (optional):</label>
                            <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
                        </div>
                    </div>

                    <!-- Note -->
                    <p class="note">The maritime authorities will contact you within 24 hours regarding the report you
                        submitted.If you don't hear back within 24 hours, please consider your report canceled or invalid. Thank you!</p>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary">Submit Report</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
