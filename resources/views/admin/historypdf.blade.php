<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Violation History Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 2rem;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Violation History Report</h1>
    </div>

    <table>
        <thead>
            <tr>
                <th>Violator</th>
                <th>Sex</th>
                <th>Address</th>
                <th>Violation</th>
                <th>Location</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($histories as $history)
                <tr>
                    <td>{{ $history->violator }}</td>
                    <td>{{ $history->sex }}</td>
                    <td>{{ $history->address }}</td>
                    <td>{{ $history->violation }}</td>
                    <td>{{ $history->location }}</td>
                    <td>{{ $history->date_of_violation }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
