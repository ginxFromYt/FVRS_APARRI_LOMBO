{{-- resources/views/violation/editrecordviolation.blade.php --}}
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
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .control-panel {
            width: 250px;
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
            margin-left: 280px; 
            padding: 40px 20px;
        }

        .form-box {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 0.25rem;
            border: 1px solid #ced4da;
            padding: 0.75rem;
        }

        .btn-success {
            background-color: green;
            border-color: green;
        }

        .btn-success:hover {
            background-color: darkgreen;
            border-color: darkgreen;
        }
    </style>
</head>
<body>

    <!-- Top Bar -->
    <div class="thin-container">
        <h5 class="container-text">Municipal Agriculture Office-Aparri</h5>
    </div>

    <!-- Control Panel -->
    <div class="control-panel">
        <!-- Control Panel Header -->
        <div class="control-panel-header text-center">
            <img src="{{ asset('img/maologo.jpg') }}" alt="Logo" class="rounded-circle" style="width: 100px; height: 100px;">
            <h2 class="control-panel-title" style="font-size: 1.25rem;">Add Violations</h2>
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
    </div>

    <div class="form-container">
        <div class="form-box">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('violation.update', $violation->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="violation">Violation</label>
                    <input type="text" name="violation" class="form-control" value="{{ $violation->violation }}" required>
                </div>

                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" class="form-control" value="{{ $violation->location }}" required>
                </div>

                <div class="form-group">
                    <label for="date_of_violation">Date of Violation</label>
                    <input type="date" name="date_of_violation" class="form-control" value="{{ $violation->date_of_violation }}" required>
                </div>

                <div class="form-group">
                    <label for="time_of_violation">Time of Violation</label>
                    <input type="time" name="time_of_violation" class="form-control" value="{{ $violation->time_of_violation }}" required>
                </div>

                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $violation->first_name }}" required>
                </div>

                <div class="form-group">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" name="middle_name" class="form-control" value="{{ $violation->middle_name }}">
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{ $violation->last_name }}" required>
                </div>

                <div class="form-group">
                    <label for="extension_name">Extension Name</label>
                    <input type="text" name="extension_name" class="form-control" value="{{ $violation->extension_name }}">
                </div>

                <div class="form-group">
                    <label for="sex">Sex</label>
                    <select name="sex" class="form-control" required>
                        <option value="Male" {{ $violation->sex == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $violation->sex == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ $violation->address }}" required>
                </div>

                <button type="submit" class="btn btn-success mt-3">Update Record</button>
            </form>
        </div>
    </div> 
</body>
</html>
