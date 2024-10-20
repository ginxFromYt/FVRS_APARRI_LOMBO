<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <title>Edit Violation</title>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            font-family: 'Merriweather', serif;
            background-color: #f4f4f4;
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

        .container {
            padding-top: 60px; /* Add top padding to accommodate fixed header */
        }

        h2, h4, h5 {
            color: black;
        }

        .btn-primary {
            background-color: black;
            border-color: black;
            color: white;
        }

        .btn-primary:hover {
            background-color: #333;
            border-color: #333;
        }

        .alert-success {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="thin-container">
        <h1 class="text-white">Edit Violation</h1>
    </div>

    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('violation.update', $violation->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="violation" class="form-label">Violation</label>
                <input type="text" class="form-control" name="violation" value="{{ $violation->violation }}" required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" name="location" value="{{ $violation->location }}" required>
            </div>

            <div class="mb-3">
                <label for="date_of_violation" class="form-label">Date of Violation</label>
                <input type="date" class="form-control" name="date_of_violation" value="{{ $violation->date_of_violation }}" required>
            </div>

            <div class="mb-3">
                <label for="time_of_violation" class="form-label">Time of Violation</label>
                <input type="time" class="form-control" name="time_of_violation" value="{{ $violation->time_of_violation }}" required>
            </div>

            <h4>Violators</h4>
            <div id="violators">
                @foreach($violation->violators as $violator)
                    <div class="violator mb-3">
                        <h5>Violator {{ $loop->iteration }}</h5>
                        <input type="hidden" name="violators[{{ $loop->index }}][id]" value="{{ $violator->id }}">
                        
                        <div class="mb-2">
                            <label for="violator" class="form-label">Violator Name</label>
                            <input type="text" class="form-control" name="violators[{{ $loop->index }}][violator]" value="{{ $violator->violator }}" required>
                        </div>

                        <div class="mb-2">
                            <label for="sex" class="form-label">Sex</label>
                            <select class="form-select" name="violators[{{ $loop->index }}][sex]" required>
                                <option value="Male" {{ $violator->sex == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $violator->sex == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" name="violators[{{ $loop->index }}][address]" value="{{ $violator->address }}" required>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Update Violation</button>
        </form>
    </div>

    <script src="/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
