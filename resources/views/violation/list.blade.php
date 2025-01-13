<x-app-layout>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            overflow: hidden;
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
            padding-top: 50px;
        }

        .table-scroll {
            max-height: 100%;
            overflow-y: auto;
            border: 1px solid #ccc;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
            box-sizing: border-box;
        }

        .table-header th {
            background-color: green;
            color: white;
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

        h2, h5 {
            color: white;
        }

        /* Add a smoother transition for the collapsible content */
        .collapse {
            transition: all 0.5s ease-in-out;
        }

        /* This will ensure the collapsible content stays open until clicked again */
        .collapse.show {
            opacity: 1;
            visibility: visible;
            height: auto; /* Ensures content is fully expanded */
        }

        .collapse:not(.show) {
            opacity: 0;
            visibility: hidden;
            height: 0;
        }
    </style>

    <div class="table-container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row mb-2">
            <div class="col-lg-4">
                <form method="GET" action="{{ route('violation.search') }}" class="d-flex mb-4">
                    <input type="text" name="query" class="form-control me-2" placeholder="Search Violators"
                        aria-label="Search Violators">
                    <button type="submit" class="btn btn-outline-success">Search</button>
                </form>
            </div>
        </div>

        <div class="table-scroll">
            <table class="table">
                <thead class="table-header">
                    <tr>
                        <th>Violation</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($violations as $violation)
                        <tr>
                            <td>{{ $violation->violation }}</td>
                            <td>{{ $violation->location }}</td>
                            <td>{{ $violation->date_of_violation }}</td>
                            <td>{{ $violation->time_of_violation }}</td>
                            <td>
                            
                            
                                <button class="btn btn-primary" data-bs-toggle="collapse"
                                    data-bs-target="#violators{{ $violation->id }}" aria-expanded="false">
                                    View Violators
                                </button>
                                <form action="{{ route('violation.finish', $violation->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Resolved Violation</button>
                                </form>
                              
                            </td>
                        </tr>
                        <tr class="collapse" id="violators{{ $violation->id }}">
                            <td colspan="5">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Violator</th>
                                            <th>Sex</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($violation->violators as $violator)
                                            <tr>
                                                <td>{{ $violator->violator }}</td>
                                                <td>{{ $violator->sex }}</td>
                                                <td>{{ $violator->address }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $violations->links() }}
        </div>
    </div>

    <script src="/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Optional: Reset the collapse state when another button is clicked
        document.querySelectorAll('.btn-primary').forEach(button => {
            button.addEventListener('click', function () {
                const target = this.getAttribute('data-bs-target');
                const otherCollapses = document.querySelectorAll('.collapse.show');

                otherCollapses.forEach(collapse => {
                    if (collapse.id !== target.substring(1)) {
                        collapse.classList.remove('show');
                    }
                });
            });
        });
    </script>
</x-app-layout>
