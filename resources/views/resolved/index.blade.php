<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolved Reports</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Include the same styles as your user reports here */
    </style>
</head>
<body>

    <!-- Control Panel -->
    <div class="control-panel" id="controlPanel">
        <div class="control-panel-header">
            <img src="{{ asset('img/1.jpg') }}" alt="Logo">
            <h2>Maritime Panel</h2>
        </div>
        <!-- Control Panel Links -->
        <a href="{{ route('dashboard') }}" class="btn"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="{{ route('users.myreports') }}" class="btn"><i class="fas fa-file-alt"></i> Spot Reports</a>
        <a href="{{ route('resolved.index') }}" class="btn"><i class="fas fa-check-circle"></i> Resolved Reports</a>
        <a href="{{ route('cancelled.index') }}" class="btn"><i class="fas fa-times-circle"></i> Cancelled Reports</a>
        <a href="{{ route('profile.edit') }}" class="btn"><i class="fas fa-user"></i> Profile</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Log Out</button>
        </form>
    </div>

    <div>
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($resolvedReports->isEmpty())
            <div class="alert alert-info">No resolved reports found.</div>
        @else
            <div class="table-wrapper">
                <table class="table table-bordered">
                    <thead class="table-header">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact Number</th>
                            <th>Details of the Violation</th>
                            <th>Photo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resolvedReports as $index => $report)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ htmlspecialchars($report->name) }}</td>
                                <td>{{ htmlspecialchars($report->address) }}</td>
                                <td>{{ htmlspecialchars($report->contact_number) }}</td>
                                <td>
                                    @if (strlen($report->information) > 50)
                                        {{ substr(htmlspecialchars($report->information), 0, 50) }}...
                                        <span class="see-more" data-details="{{ htmlspecialchars($report->information) }}">See More</span>
                                    @else
                                        {{ htmlspecialchars($report->information) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($report->photo)
                                        <a href="#" class="photo-link" data-photo="{{ asset('storage/' . $report->photo) }}">
                                            <img src="{{ asset('storage/' . $report->photo) }}" alt="User Photo">
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Include the same modal and scripts as your user reports here -->
</body>
</html>
