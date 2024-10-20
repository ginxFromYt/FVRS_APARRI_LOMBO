<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Barangays with Violations</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        h2 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #343a40;
        }
        .table {
            border-radius: 0.5rem;
            overflow: hidden;
            max-width: 600px; /* Limit the table width */
            margin: auto; /* Center the table */
        }
        .table thead {
            background-color: #28a745;
            color: white;
        }
        .btn-primary {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Barangays with Violations</h2>

    @if($barangays->isEmpty())
        <div class="alert alert-info text-center">No barangays with violations found.</div>
    @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Barangay Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangays as $barangay)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $barangay->address }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="text-center">
        <a href="{{ route('dashboard') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>
    </div>
</div>

</body>
</html>
