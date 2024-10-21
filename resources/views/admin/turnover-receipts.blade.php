<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnover Receipts</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Optional: Link to your CSS file -->
</head>
<body>
    <x-app-layout>
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-semibold mb-4">Turnover Receipts</h1>

            @if($turnoverreceipts->isEmpty())
                <p class="text-gray-500">No turnover receipts available.</p>
            @else
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">#</th>
                            <th class="py-2 px-4 border-b">Municipal Agriculturist</th>
                            <th class="py-2 px-4 border-b">Date of Violation</th>
                            <th class="py-2 px-4 border-b">Time of Violation</th>
                            <th class="py-2 px-4 border-b">Name of Violation</th>
                            <th class="py-2 px-4 border-b">Name of Skipper</th>
                            <th class="py-2 px-4 border-b">Name of Banca</th>
                            <th class="py-2 px-4 border-b">Investigator PNCO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($turnoverreceipts as $receipt)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td> <!-- Display row number -->
                                <td class="py-2 px-4 border-b">{{ $receipt->municipal_agriculturist }}</td>
                                <td class="py-2 px-4 border-b">{{ $receipt->date_of_violation }}</td>
                                <td class="py-2 px-4 border-b">{{ $receipt->time_of_violation }}</td>
                                <td class="py-2 px-4 border-b">{{ $receipt->name_of_violation }}</td>
                                <td class="py-2 px-4 border-b">{{ $receipt->name_of_skipper }}</td>
                                <td class="py-2 px-4 border-b">{{ $receipt->name_of_banca }}</td>
                                <td class="py-2 px-4 border-b">{{ $receipt->investigator_pnco }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </x-app-layout>
</body>
</html>
