<x-app-layout>

    <style>
        body {
            font-family: 'Merriweather', serif;
            font-weight: bold;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .control-panel {
            width: 300px;
            background-color: green;
            border-right: 1px solid #dee2e6;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            padding: 20px;
            padding-top: 60px;
            z-index: 1000;
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
            left: 0;
            z-index: 1100;
        }

        .control-panel-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .control-panel-title {
            margin-left: 10px;
            color: white;
            font-size: 1.25rem;
        }

        .logo-main {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }

        .btn {
            display: flex;
            align-items: center;
            background-color: white;
            color: green;
            border: 1px solid green;
            padding: 10px;
            margin-bottom: 10px;
            text-decoration: none;
        }

        .btn i {
            color: green;
            margin-right: 10px;
        }


        .modal-content {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .modal-dialog {
            max-width: 80%;
            margin: 30px auto;
        }

        .modal-body {
            max-height: 70vh;
            overflow-y: auto;
        }

        .modal-header,
        .modal-footer {
            padding: 0;
            border: none;
        }

        .header-section {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            width: 100%;
            background: white;
            position: relative;
        }

        .header-section img {
            height: 100px;
            margin: 0 20px;
        }

        .header-section .org-info {
            flex: 1;
        }

        .header-section .org-info h5,
        .header-section .org-info p {
            margin: 0;
        }

        .report-table {
            width: 100%;
            border-collapse: collapse;
        }

        .report-table th,
        .report-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table-responsive {
            max-height: 70vh;
            overflow-y: auto;
        }

        .report-table th {
            background-color: white;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: white;
            border: 2px solid red;
            color: red;
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            font-size: 18px;
            cursor: pointer;
            font-weight: bold;
        }

        .modal-header,
        .modal-footer {
            padding: 0;
            border: none;
        }
    </style>

    <div class="container-content">
        <div class="container mt-4">
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
</x-app-layout>
