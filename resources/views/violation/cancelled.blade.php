<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancelled Reports</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <a href="{{ url('/dashboard') }}" class="btn btn-danger mb-3">Back to Dashboard</a>
        <h1>Cancelled Reports</h1>

        @if ($cancelledReports->isEmpty())
            <div class="alert alert-info">No cancelled reports found.</div>
        @else
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th>Information</th>
                        <th>Photo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cancelledReports as $index => $report)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ htmlspecialchars($report->name) }}</td>
                            <td>{{ htmlspecialchars($report->address) }}</td>
                            <td>{{ htmlspecialchars($report->contact_number) }}</td>
                            <td>{{ htmlspecialchars($report->information) }}</td>
                            <td>
                                @if ($report->photo)
                                    <img src="{{ asset('storage/' . $report->photo) }}" alt="User Photo" class="img-thumbnail" width="80">
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
