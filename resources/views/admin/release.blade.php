<x-app-layout>
    <style>
       

        .form-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: black;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }
    </style>

    <div class="container">
        <div class="form-container">
            <h2 class="form-title">Release Paper Form</h2>

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

            
            <form action="{{ route('admin.release', $report->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Skipper Name -->
                <div class="form-group mb-3">
                    <label for="skipper_name">Skipper Name</label>
                    <input type="text" name="skipper_name" id="skipper_name" class="form-control" value="{{ $report->nameofskipper }}" required>
                </div>

                <!-- Address -->
                <div class="form-group mb-3">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $report->resident }}" required>
                </div>

                <!-- Violation -->
                <div class="form-group mb-3">
                    <label for="violation">Violation</label>
                    <input type="text" name="violation" id="violation" class="form-control" value="{{ $report->violation }}" required>
                </div>

                <!-- Date of Violation -->
                <div class="form-group mb-3">
                    <label for="date_of_violation">Date of Violation</label>
                    <input type="date" name="date_of_violation" id="date_of_violation" class="form-control" value="{{ $referral->date_of_violation }}" required>
                </div>

                <!-- Time of Violation -->
                <div class="form-group mb-3">
                    <label for="time_of_violation">Time of Violation</label>
                    <input type="time" name="time_of_violation" id="time_of_violation" class="form-control" value="{{ $referral->time }}" required>
                </div>

                <!-- Date of Release -->
                <div class="form-group mb-3">
                    <label for="date_of_release">Date of Release</label>
                    <input type="date" name="date_of_release" id="date_of_release" class="form-control" value="{{ $report->date_of_release }}" required>
                </div>

                <!-- Compensation -->
                <div class="form-group mb-3">
                    <label for="compensation">Compensation</label>
                    <input type="text" name="compensation" id="compensation" class="form-control" value="{{ $report->compensation }}" >
                </div>

                <!-- Agricultural Technologist -->
                <div class="form-group mb-3">
                    <label for="agricultural_technologist">Agricultural Technologist</label>
                    <input type="text" name="agricultural_technologist" id="agricultural_technologist" class="form-control" value="{{ $report->agricultural_technologist }}" required>
                </div>

                <!-- Municipal Agriculturist -->
                <div class="form-group mb-3">
                    <label for="municipal_agriculturist">Municipal Agriculturist</label>
                    <input type="text" name="municipal_agriculturist" id="municipal_agriculturist" class="form-control" value="{{ $report->municipal_agriculturist }}" required>
                </div>

                <!-- Photo -->
                <div class="form-group mb-3">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit Release Paper</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
