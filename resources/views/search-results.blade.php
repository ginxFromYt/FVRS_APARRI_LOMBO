<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h2 {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .result-count {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Search Results</h2>

        <div class="result-count">
            @if ($searchResults->isEmpty())
                <p>No results found.</p>
            @else
                <p>Found {{ $searchResults->total() }} result(s).</p>
            @endif
        </div>

        @if (!$searchResults->isEmpty())
        <table>
            <thead>
                <tr>
                    <th>Violation</th>
                    <th>Location</th>
                    <th>Date of Violation</th>
                    <th>Time of Violation</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Extension</th>
                    <th>Sex</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($searchResults as $result)
                <tr>
                    <td>{{ $result->violation['violation'] }}</td>
                    <td>{{ $result->location }}</td>
                    <td>{{ $result->dateofviolation }}</td>
                    <td>{{ $result->timeofviolation }}</td>
                    <td>{{ $result->firstname }}</td>
                    <td>{{ $result->middlename }}</td>
                    <td>{{ $result->lastname }}</td>
                    <td>{{ $result->extension }}</td>
                    <td>{{ $result->sex }}</td>
                    <td>{{ $result->address }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $searchResults->links() }}
        @endif
    </div>
</body>
</html>
