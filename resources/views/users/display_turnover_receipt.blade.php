<!DOCTYPE html>
<html lang="en">
<head>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('fontawesome-free-5.15.4-web/css/all.min.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Turnover Receipt</title>
    <style>
        body {
            font-family: 'Merriweather', serif;
            font-weight: bold;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
        }
        .container {
            margin: 50px auto;
            max-width: 800px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h2 {
            color: #007bff;
            text-align: center;
        }
        .receipt-info {
            margin-bottom: 20px;
        }
        .receipt-info label {
            font-weight: bold;
        }
        .receipt-info p {
            margin: 5px 0;
        }
        .btn-container {
            text-align: center;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<table>
    <thead>
        <tr>
            <th>Municipal Agriculturist</th>
            <th>Date of Violation</th>
            <th>Time of Violation</th>
            <th>Violation</th>
            <th>Skipper</th>
            <th>Banca</th>
            <th>Investigator PNCO</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($receipts as $receipt)
        <tr>
            <td>{{ $receipt->municipal_agriculturist }}</td>
            <td>{{ $receipt->date_of_violation }}</td>
            <td>{{ $receipt->time_of_violation }}</td>
            <td>{{ $receipt->name_of_violation }}</td>
            <td>{{ $receipt->name_of_skipper }}</td>
            <td>{{ $receipt->name_of_banca }}</td>
            <td>{{ $receipt->investigator_pnco }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
