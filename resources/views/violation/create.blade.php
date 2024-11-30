<x-app-layout>

    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .form-container {
            
            max-height: 500px; /* Limit height for scrollbar */
            overflow-y: auto; /* Enable vertical scroll */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
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
        .table-title {
            font-size: 1.75rem;
            color: black;
            text-align: center;
            margin-bottom: 20px;
        }
        
    </style>

    <div class="container mt-2">
    <h2 class="table-title">Record a Violations</h2>
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
             <div class="form-container">
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
    </script> 
</x-app-layout>
