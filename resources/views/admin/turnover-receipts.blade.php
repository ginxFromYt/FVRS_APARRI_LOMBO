<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnover Receipts</title>
    <link rel="stylesheet" href=""> 
    <style>
        body, h1, table, th, td, a, .table-title {
            font-family: 'Merriweather', serif;
        }
        /* Style for table headers */
        th {
            background-color: #D3D3D3; /* Gray background */
            color: #333; /* Dark text for contrast */
            padding: 8px 12px;
            text-align: left;
            white-space: nowrap; /* Prevent text wrapping */
        }
        /* Style for table cells */
        td {
            padding: 8px 12px;
            border-bottom: 1px solid #ddd;
        }
        /* Scrollable table container */
        .table-container {
            max-height: 400px; /* Adjust height as needed */
            overflow-y: auto;
            border: 1px solid #ddd;
        }
        .table-title {
            font-size: 1.75rem;
            color: black;
            text-align: center;
            margin-bottom: 20px;
        }
        
    </style>
</head>
<body>
    <x-app-layout>
        <div class="container mx-auto p-4">
        <h2 class="table-title">Turn Over Receipts</h2>

            @if($turnoverreceipts->isEmpty())
                <p class="text-gray-500">No turnover receipts available.</p>
            @else
                <div class="table-container">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Municipal Agriculturist</th>
                                <th>Date of Violation</th>
                                <th>Time of Violation</th>
                                <th>Name of Violation</th>
                                <th>Name of Skipper</th>
                                <th>Name of Banca</th>
                                <th>Investigator PNCO</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($turnoverreceipts as $receipt)
                                <tr class="hover:bg-gray-100">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $receipt->municipal_agriculturist }}</td>
                                    <td>{{ $receipt->date_of_violation }}</td>
                                    <td>{{ $receipt->time_of_violation }}</td>
                                    <td>{{ $receipt->name_of_violation }}</td>
                                    <td>{{ $receipt->name_of_skipper }}</td>
                                    <td>{{ $receipt->name_of_banca }}</td>
                                    <td>{{ $receipt->investigator_pnco }}</td>
                                    <td>
                                        <a href="{{ route('admin.receiptpdf', $receipt->id) }}" class="btn btn-warning" target="_blank">
                                            Download PDF
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </x-app-layout>
</body>
</html>
