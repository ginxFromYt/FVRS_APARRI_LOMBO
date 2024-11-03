<x-app-layout>

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            overflow: hidden;
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

        .table-wrapper {
            position: relative;
            max-height: calc(100% - 40px);
            /* Adjust height considering the header */
            overflow: auto;
            padding-top: 50px;
            /* Add space for the thin-container */
        }

        .table-scroll {
            max-height: 100%;
            overflow-y: auto;
            border: 1px solid #ccc;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table th,
        table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
            box-sizing: border-box;
        }

        .table-header th {
            background-color: green;
            color: white;
            position: sticky;
            top: 0;
            z-index: 1;
            box-shadow: inset 0 1px 0 rgba(0, 0, 0, 0.1);
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

        h2,
        h5 {
            color: white;
        }

        .no-records {
            text-align: center;
            color: #666;
            padding: 20px;
        }
        .table-title {
            font-size: 1.75rem;
            color: black;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>

    <div class="table-container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Table displaying violation histories -->
        <div class="table-wrapper">
        <h2 class="table-title">History of Violations</h2>
            <div class="table-scroll">
                <table class="table">
                
                    <thead class="table-header">
                        <tr>
                            <th>Violation</th>
                            <th>Location</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Violator</th> <!-- Updated to reflect single violator field -->
                            <th>Sex</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($histories) && $histories->isEmpty())
                            <tr>
                                <td colspan="7" class="no-records">No records found.</td>
                            </tr>
                        @else
                            @foreach ($histories as $history)
                                <tr>
                                    <td>{{ $history->violation }}</td>
                                    <td>{{ $history->location }}</td>
                                    <td>{{ $history->date_of_violation }}</td>
                                    <td>{{ $history->time_of_violation }}</td>
                                    <td>{{ $history->violator }}</td> 
                                    <td>{{ $history->sex }}</td>
                                    <td>{{ $history->address }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>