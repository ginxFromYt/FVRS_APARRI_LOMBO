<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnover Receipts</title>
    <link rel="stylesheet" href=""> 
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            overflow: hidden;
            font-family: 'Merriweather', serif;
            background-color: #f4f4f4;
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
            z-index: 1001;
        }

        .table-wrapper {
            position: relative;
            max-height: calc(100% - 40px);
            overflow: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table th,
        table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
            box-sizing: border-box;
        }

        .table-header th {
            background-color: #D3D3D3;
            color: #333;
            position: sticky;
            top: 0;
            z-index: 1;
            box-shadow: inset 0 1px 0 rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: black;
            border-color: black;
            color: white;
        }

        .btn-primary:hover {
            background-color: #333;
            border-color: #333;
        }

        h2 {
            color: black;
            text-align: center;
            font-size: 1.75rem;
            margin-bottom: 20px;
        }

        .no-records {
            text-align: center;
            color: #666;
            padding: 20px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .pagination a {
            padding: 10px 15px;
            margin: 0 5px;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
            color: #333;
            text-decoration: none;
        }

        .pagination a.active {
            background-color: black;
            color: white;
            border-color: black;
        }

        .pagination a:hover {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>
<x-app-layout>
    
    <div class="table-wrapper">
        <h2>Turn Over Receipts</h2>

        @if($turnoverreceipts->isEmpty())
            <p class="no-records">No turnover receipts available.</p>
        @else
            <table>
                <thead class="table-header">
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
                        <tr>
                            <td>{{ $loop->iteration + ($turnoverreceipts->currentPage() - 1) * $turnoverreceipts->perPage() }}</td>
                            <td>{{ $receipt->municipal_agriculturist }}</td>
                            <td>{{ $receipt->date_of_violation }}</td>
                            <td>{{ $receipt->time_of_violation }}</td>
                            <td>{{ $receipt->name_of_violation }}</td>
                            <td>{{ $receipt->name_of_skipper }}</td>
                            <td>{{ $receipt->name_of_banca }}</td>
                            <td>{{ $receipt->investigator_pnco }}</td>
                            <td>
                            <a href="{{ route('admin.receiptpdf', ['id' => encrypt($receipt->id)]) }}" class="btn btn-warning" target="_blank">
                                Download PDF
                            </a>

                                <br>
                                <!-- 
                                <a href="{{ route('admin.receiptpdf', $receipt->id) }}" class="btn btn-primary" target="_blank">
                                    Release Paper
                                </a> 
                                -->

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Add pagination links -->
            <div class="pagination">
                {{ $turnoverreceipts->links() }} <!-- This generates pagination links -->
            </div>
        @endif
        
    </div>
</x-app-layout>

</body>
</html>
