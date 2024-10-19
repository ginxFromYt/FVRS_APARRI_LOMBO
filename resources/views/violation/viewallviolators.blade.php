<!-- resources/views/violation/viewallviolators.blade.php -->

@extends('layouts.Admin.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1>All Violators</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Extension</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($violators as $violator)
                        <tr>
                            <td>{{ $violator->firstname }}</td>
                            <td>{{ $violator->middlename }}</td>
                            <td>{{ $violator->lastname }}</td>
                            <td>{{ $violator->extension }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
