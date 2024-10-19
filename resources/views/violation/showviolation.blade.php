@extends('layouts.Admin.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1>Violation Details</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Violation</th>
                            <th>Location</th>
                            <th>Date of Violation</th>
                            <th>Time of Violation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $violation->violation }}</td>
                            <td>{{ $violation->location }}</td>
                            <td>{{ $violation->dateofviolation }}</td>
                            <td>{{ $violation->timeofviolation }}</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                @if($violation->violators->isNotEmpty())
                    <h2>Violator Details</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Extension</th>
                                <th>Sex</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($violation->violators as $violator)
                            <tr>
                                <td>{{ $violator->firstname }}</td>
                                <td>{{ $violator->middlename }}</td>
                                <td>{{ $violator->lastname }}</td>
                                <td>{{ $violator->extension }}</td>
                                <td>{{ $violator->sex }}</td>
                                <td>{{ $violator->address }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                <br>
                <a href="{{ route('violation.edit', ['violation' => $violation->id]) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
