<x-app-layout>
<head></head>
    <style>
        body {
            font-family: 'Merriweather', serif;
        }

        .report-table {
            table-layout: auto;
            width: 100%;
            white-space: nowrap; /* Prevents wrapping of text */
        }

        .report-table th {
            background-color: #28a745; /* Green color for the table header */
            color: white; /* White text for contrast */
            text-align: center;
            vertical-align: middle;
            padding: 10px;
        }

        .report-table td {
            text-align: center;
            vertical-align: middle;
        }

        .table-responsive {
            overflow-x: auto; 
        }
        .table-title {
            font-size: 1.75rem;
            color: black;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
        <div class="container-fluid">
            <div class="container-content">
                <div class="container mt-4">
                <h2 class="table-title">Spot Reports</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered report-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name of Banca</th>
                                    <th>Name of Skipper</th>
                                    <th>Age</th>
                                    <th>Birthdate</th>
                                    <th>Status</th>
                                    <th>Religion</th>
                                    <th>Educational Background</th>
                                    <th>Occupation</th>
                                    <th>Resident</th>
                                    <th>Violation</th>
                                    <th>Engine</th>
                                    <th>Engine No.</th>
                                    <th>Grid Coordinate</th>
                                    <th>Estimated Amount of Banca</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($myreports as $report)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $report->nameofbanca }}</td>
                                        <td>{{ $report->nameofskipper }}</td>
                                        <td>{{ $report->age }}</td>
                                        <td>{{ $report->birthdate }}</td>
                                        <td>{{ $report->status }}</td>
                                        <td>{{ $report->religion }}</td>
                                        <td>{{ $report->educationalbackground }}</td>
                                        <td>{{ $report->occupation }}</td>
                                        <td>{{ $report->resident }}</td>
                                        <td>{{ $report->violation }}</td>
                                        <td>{{ $report->engine }}</td>
                                        <td>{{ $report->engineno }}</td>
                                        <td>{{ $report->gridcoordinate }}</td>
                                        <td>{{ $report->amount }}</td>
                                        <td>
                                            <a href="{{ route('admin.spotpdf', $report->id) }}" class="btn btn-primary"
                                                    target="_blank">
                                                    Download PDF
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</x-app-layout>
