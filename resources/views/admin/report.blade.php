<x-app-layout>
<head>
    <style>
        .report-table {
            table-layout: auto;
            width: 100%;
            white-space: nowrap;
        }

        .report-table th {
            background-color: #28a745;
            color: white;
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

        .pagination {
            justify-content: center;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .action-buttons .btn {
            width: 100%;
        }
    </style>
</head>

<div class="container-fluid">
    <div class="container-content">
        <div class="container mt-2">
            <h2 class="table-title">Spot Reports</h2>
            <div class="table-responsive">
                <table class="table table-bordered report-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name of Banca</th>
                            <th>Name of Skipper</th>
                            <th>Resident</th>
                            <th>Violation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($myreports as $report)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $report->nameofbanca }}</td>
                                <td>{{ $report->nameofskipper }}</td>
                                <td>{{ $report->resident }}</td>
                                <td>{{ $report->violation }}</td>
                                <td>
                                   
                                <a href="{{ route('admin.release', ['id' => encrypt($report->id)]) }}" class="btn btn-warning mb-2">
                                    Release Violator
                                </a>
                                <br>
                                <a href="{{ route('admin.spotpdf', ['id' => encrypt($report->id)]) }}" class="btn btn-primary mb-2" target="_blank">
                                    Download PDF
                                </a>
                                <br>
                                <a href="{{ route('admin.release', ['id' => encrypt($report->id)])}}" class="btn btn-success mt-2">
                                    Release Paper
                                </a>
                                                    

                                    </td>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal for Report Details -->
                            <div class="modal fade" id="reportDetailsModal-{{ $report->id }}" tabindex="-1" role="dialog" aria-labelledby="reportDetailsModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="reportDetailsModalLabel">Report Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><b>Name of Banca:</b> {{ $report->nameofbanca }}</p>
                                            <p><b>Name of Skipper:</b> {{ $report->nameofskipper }}</p>
                                            <p><b>Age:</b> {{ $report->age }}</p>
                                            <p><b>Birthdate:</b> {{ $report->birthdate }}</p>
                                            <p><b>Status:</b> {{ $report->status }}</p>
                                            <p><b>Religion:</b> {{ $report->religion }}</p>
                                            <p><b>Educational Background:</b> {{ $report->educationalbackground }}</p>
                                            <p><b>Occupation:</b> {{ $report->occupation }}</p>
                                            <p><b>Resident:</b> {{ $report->resident }}</p>
                                            <p><b>Violation:</b> {{ $report->violation }}</p>
                                            <p><b>Engine:</b> {{ $report->engine }}</p>
                                            <p><b>Engine No.:</b> {{ $report->engineno }}</p>
                                            <p><b>Grid Coordinate:</b> {{ $report->gridcoordinate }}</p>
                                            <p><b>Estimated Amount of Banca:</b> {{ $report->amount }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper">
                    {{ $myreports->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</x-app-layout>
