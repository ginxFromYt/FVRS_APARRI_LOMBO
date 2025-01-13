<x-app-layout>
<head></head>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            overflow: hidden;
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
            overflow: auto;
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
            margin-top: 0%;
            margin-bottom: 10px;
        }

        /* Style for pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .pagination li {
            margin: 0 5px;
            list-style-type: none;
        }

        .pagination a {
            text-decoration: none;
            color: black;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .pagination a:hover {
            background-color: #ddd;
        }

        .pagination .active a {
            background-color: green;
            color: white;
            border: none;
        }
    </style>

    <!-- Table displaying violation histories -->
    <div class="table-wrapper">
        <h2 class="table-title">History of Violations</h2>
        
        <div class="table-scroll">
            <table class="table">
                <thead class="table-header">
                    <tr>
                        <th>Violator</th>
                        <th>Sex</th>
                        <th>Address</th>
                        <th>Violation</th>
                        <th>Location</th>
                        <th>Date</th>
                        <!-- <th>Time</th> -->
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
                                <td>{{ $history->violator }}</td>
                                <td>{{ $history->sex }}</td>
                                <td>{{ $history->address }}</td>
                                <td>{{ $history->violation }}</td>
                                <td>{{ $history->location }}</td>
                                <td>{{ $history->date_of_violation }}</td>
                                <!-- <td>{{ $history->time_of_violation }}</td> -->
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
              <!-- Button to download PDF -->
          <div style="margin-bottom: 15px; text-align: center;">
            <a href="{{ route('history.download-pdf') }}" class="btn btn-primary">Download History</a>
        </div>
        </div>

        <!-- Pagination Links -->
        <div class="pagination">
            {{ $histories->links() }}
        </div>
    </div>
</x-app-layout>
