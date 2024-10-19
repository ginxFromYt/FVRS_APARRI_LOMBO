@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Resolved Reports</h1>

    @if ($reports->isEmpty())
        <div class="alert alert-info">
            No resolved reports found.
        </div>
    @else
        <table class="table table-bordered">
            <thead>
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
                @foreach ($reports as $index => $report)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $report->name }}</td>
                        <td>{{ $report->address }}</td>
                        <td>{{ $report->contact_number }}</td>
                        <td>{{ $report->information }}</td>
                        <td>
                            @if ($report->photo)
                                <img src="{{ asset('storage/' . $report->photo) }}" alt="User Photo" class="img-thumbnail">
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
@endsection
