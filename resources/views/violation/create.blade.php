<x-app-layout>

    <style>
        body {
            font-family: 'Merriweather', serif;
            font-weight: bold;
            margin: 0;
            padding: 0;
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

        h5,
        h2 {
            color: white;
        }

        .violator {
            margin-top: 15px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>

    <div class="container mt-5">
        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('violation.store') }}" method="POST" class="bg-white p-4 rounded shadow">
            @csrf

            <div class="form-group">
                <label for="violation">Violation:</label>
                <input type="text" name="violation" value="{{ $referrals->violation }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="location">Location of Incident:</label>
                <input type="text" name="location" value="{{ $referrals->location }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="date_of_violation">Date of Violation:</label>
                <input type="date" name="date_of_violation" value="{{ $referrals->date_of_violation }}"
                    class="form-control" required>
            </div>

            <div class="form-group">
                <label for="time_of_violation">Time of Violation:</label>
                <input type="text" name="time_of_violation" value="{{ $referrals->time }}" class="form-control "
                    required>
            </div>


            <h3 class="mt-4">Violator Information</h3>

            <div id="violator-fields">
                <div class="violator">
                    <div class="form-group">
                        <label for="violator">Violator:</label>
                        <input type="text" value="{{ $referrals->violator }}" name="violators[0][violator]"
                            class="form-control" placeholder="Enter full name" required>
                    </div>

                    <div class="form-group">
                        <label for="sex">Sex:</label>
                        <select name="violators[0][sex]" class="form-control" required>
                            <option value="" disabled selected>Select a sex</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address">Address of Violator:</label>
                        <input type="text" value="{{ $referrals->report->resident }}" name="violators[0][address]"
                            class="form-control" required>
                    </div>
                </div>
            </div>

            <!-- <button type="button" id="add-violator" class="btn btn-secondary mt-2">Add Another Violator</button> -->
            <button type="submit" class="btn btn-success mt-3">Submit</button>
        </form>
    </div>

    <script>
        let violatorCount = 1; // Start from 1 since we already have one violator input
        document.getElementById('add-violator').addEventListener('click', function() {
            const violatorDiv = document.createElement('div');
            violatorDiv.classList.add('violator', 'mt-3');
            violatorDiv.innerHTML = `
                <div class="form-group">
                    <label for="violator">Violator:</label>
                    <input type="text" value="referrals->violator" name="violators[${violatorCount}][violator]" class="form-control" placeholder="Enter full name" required>
                </div>
                <div class="form-group">
                    <label for="sex">Sex:</label>
                    <select name="violators[${violatorCount}][sex]" class="form-control" required>
                        <option value="" disabled selected>Select a sex</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Address of Violator:</label>
                    <input type="text" name="violators[${violatorCount}][address]" class="form-control" required>
                </div>
            `;
            document.getElementById('violator-fields').appendChild(violatorDiv);
            violatorCount++;
        });
    </script> -->
</x-app-layout>
