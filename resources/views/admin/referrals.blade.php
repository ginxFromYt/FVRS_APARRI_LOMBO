<x-app-layout>
    <style>
        .control-panel {
            width: 300px;
            background-color: green;
            border-right: 1px solid green;
            position: fixed;
            top: 40px;
            left: 0;
            height: calc(100% - 40px);
            padding: 20px;
            transition: transform 0.3s ease-in-out;
            z-index: 1000;
        }

        .control-panel .btn {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 100%;
            margin-bottom: 10px;
            background-color: white;
            color: green;
            border: 1px solid green;
        }

        .control-panel .btn i {
            margin-right: 10px;
            color: green;
        }

        .thin-container {
            background-color: black;
            height: 40px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h1,
        h2,
        h3,
        h4 {
            font-size: 1.5rem;
            color: white;
        }

        .letter-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .letter-header img {
            width: 100px;
            height: auto;
        }

        .letter-header .header-text {
            flex-grow: 1;
            text-align: center;
            margin: 0 20px;
        }

        .letter-header .header-text p {
            margin: 0;
            line-height: 0;
        }

        .letter-content {
            white-space: pre-line;
            font-family: Arial, sans-serif;
        }

        .letter-content .compact {
            margin: 0;
            line-height: 0;
        }


        .additional-info {
            display: inline-block;
            margin-left: 15px;
            vertical-align: top;
        }

        /* Table styling */
        .referrals-table th {
            background-color: #28a745;
            /* Green color for the table header */
            color: white;
            /* White text for contrast */
            text-align: center;
            vertical-align: middle;
            padding: 10px;
        }

        table th,
        table td {
            white-space: nowrap;
        }

        /* Title styling */
        .table-title {
            font-size: 1.75rem;
            color: black;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Existing CSS */
        .control-panel {
            /* styles here */
        }

        .modal-content {
            background-color: #f9f9f9;
        }
    </style>
    <div class="container-fluid">
        <div class="main-content">
            <div class="container mt-4">
                <h2 class="table-title">Referrals</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <!-- <th>#</th> -->
                                <!-- <th>Referral Date</th> -->
                                <th>Violation</th>
                                <th>Time</th>
                                <th>Date of Violation</th>
                                <th>Location</th>
                                <!-- <th>Complainant</th>
                                <th>Investigator PNCO</th> -->
                                <th>Violator</th>
                                <!-- <th>Piece of Evidence</th> -->
                                <!-- <th>Attached Evidences</th> -->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($referrals as $index => $referral)
                                <tr>
                                    <!-- <td>{{ $index + 1 + ($referrals->currentPage() - 1) * $referrals->perPage() }}</td> -->
                                    <!-- <td>{{ $referral->date }}</td> -->
                                    <td>{{ $referral->violation }}</td>
                                    <td>{{ $referral->time }}</td>
                                    <td>{{ $referral->date_of_violation }}</td>
                                    <td>{{ $referral->location }}</td>
                                    <!-- <td>{{ $referral->complainant }}</td>
                                    <td>{{ $referral->investigator_pnco }}</td> -->
                                    <td>{{ $referral->violator }}</td>
                                    <!-- <td>{{ $referral->piece_of_evidence }}</td> -->
                                    <!-- <td>
                                        @if ($referral && !empty($referral->image) && is_array($referral->image))
<img src="{{ asset(str_replace('public/', 'storage/', $referral->image[0])) }}"
                                                 alt="Image" style="width: 100px; height: 70px;">
@else
<p>No images found.</p>
@endif
                                    </td> -->
                                    <td>
                                        <!-- <button class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#viewModal{{ $referral->id }}">
                                            View Details
                                        </button> -->

                                        <a href="{{ route('admin.referralpdf', ['id' => encrypt($referral->id)]) }}"
                                            class="btn btn-primary" target="_blank">
                                            View
                                        </a>
                                        <form
                                            action="{{ route('admin.violation.edits', ['id' => encrypt($referral->id)]) }}"
                                            method="GET" style="display:inline;">
                                            <button type="submit" class="btn btn-success">
                                                Record
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="viewModal{{ $referral->id }}" tabindex="-1"
                                    aria-labelledby="modalLabel{{ $referral->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel{{ $referral->id }}">Referral
                                                    Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Referral Date:</strong> {{ $referral->date }}</p>
                                                <p><strong>Violation:</strong> {{ $referral->violation }}</p>
                                                <p><strong>Time:</strong> {{ $referral->time }}</p>
                                                <p><strong>Date of Violation:</strong>
                                                    {{ $referral->date_of_violation }}</p>
                                                <p><strong>Location:</strong> {{ $referral->location }}</p>
                                                <p><strong>Complainant:</strong> {{ $referral->complainant }}</p>
                                                <p><strong>Investigator PNCO:</strong>
                                                    {{ $referral->investigator_pnco }}</p>
                                                <p><strong>Violator:</strong> {{ $referral->violator }}</p>
                                                <p><strong>Piece of Evidence:</strong>
                                                    {{ $referral->piece_of_evidence }}</p>
                                                <p><strong>Attached Evidences:</strong></p>
                                                <div class="row">
                                                    @if ($referral && is_array($referral->image))
                                                        @foreach ($referral->image as $image)
                                                            <div class="col-md-6 mb-3">
                                                                <a href="{{ asset(str_replace('public/', 'storage/', $image)) }}"
                                                                    target="_blank">
                                                                    <img src="{{ asset(str_replace('public/', 'storage/', $image)) }}"
                                                                        alt="Image" class="img-fluid img-thumbnail"
                                                                        style="max-width: 100%; height: auto;">
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    @elseif (is_string($referral->image))
                                                        <div class="col-md-6 mb-3">
                                                            <a href="{{ asset(str_replace('public/', 'storage/', $referral->image)) }}"
                                                                target="_blank">
                                                                <img src="{{ asset(str_replace('public/', 'storage/', $referral->image)) }}"
                                                                    alt="Image" class="img-fluid img-thumbnail"
                                                                    style="max-width: 100%; height: auto;">
                                                            </a>
                                                        </div>
                                                    @else
                                                        <p>No images found.</p>
                                                    @endif
                                                </div>

                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $referrals->links() }}
                </div>
            </div>
        </div>
    </div>
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</x-app-layout>
