<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <title>Violators</title>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Violators</h2>

    @if($violators->isEmpty())
        <div class="alert alert-info text-center">No violators found for this barangay.</div>
    @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name of Skipper</th>
                    <th>Address</th>
                    <th>Violation</th>
                    <th>Compensation</th>
                </tr>
            </thead>
            <tbody>
                @foreach($violators as $violator)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $violator->name_of_skipper }}</td>
                        <td>{{ $violator->address }}</td>
                        <td>{{ $violator->violation }}</td>
                        <td>{{ $violator->compensation }}</td>
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
