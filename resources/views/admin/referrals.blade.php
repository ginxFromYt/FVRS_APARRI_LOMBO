<!DOCTYPE html>
<html lang="en">
<head>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('fontawesome-free-5.15.4-web/css/all.min.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Referrals</title>
    <style>
        body {
            font-family: 'Merriweather', serif;
            font-weight: bold; /* Bold text */
        }
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
        h1, h2, h3, h4 {
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
        .modal-dialog {
            max-width: 900px;
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
        .additional-info {
            display: inline-block;
            margin-left: 15px;
            vertical-align: top;
        }
        .main-content {
            margin-left: 300px; 
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="thin-container">
    <h5 class="container-text text-white">Municipal Agriculture Office-Aparri</h5>
</div>
  
<div class="container-fluid">
    <div class="control-panel">
        <div class="control-panel-header text-center">
            <img src="{{ asset('img/maologo.jpg') }}" alt="Logo" class="rounded-circle" style="width: 100px; height: 100px;">
            <h2 class="control-panel-title" style="font-size: 1.25rem; ">Referrals</h2>
        </div>

        <a href="{{ route('dashboard') }}" class="btn mb-2" style="display: flex; align-items: center; background-color: white; color: green; border: 1px solid green; padding: 10px; text-align: left;">
            <i class="fas fa-tachometer-alt" style="color: green; margin-right: 10px;"></i> Dashboard
        </a>

        <a href="{{ route('admin.report') }}" class="btn mb-2" style="display: flex; align-items: center; background-color: white; color: green; border: 1px solid green; padding: 10px; text-align: left;">
            <i class="fas fa-file-alt" style="color: green; margin-right: 10px;"></i> Maritime Reports
        </a>

        <a href="{{ route('admin.referrals') }}" class="btn mb-2" style="display: flex; align-items: center; background-color: white; color: green; border: 1px solid green; padding: 10px; text-align: left;">
            <i class="fas fa-share-square" style="color: green; margin-right: 10px;"></i> View Referrals
        </a>

        <a href="{{ route('violation.record') }}" class="btn mb-2" style="display: flex; align-items: center; background-color: white; color: green; border: 1px solid green; padding: 10px; text-align: left;">
            <i class="fas fa-plus-square" style="color: green; margin-right: 10px;"></i> Record a Violation
        </a>

        <a href="{{ route('violation.list') }}" class="btn mb-2" style="display: flex; align-items: center; background-color: white; color: green; border: 1px solid green; padding: 10px; text-align: left;">
            <i class="fas fa-list" style="color: green; margin-right: 10px;"></i> List of Records
        </a>

        
             <!-- New "History" navigation link -->
             <a href="{{ route('admin.history') }}" class="btn">
            <i class="fas fa-history"></i> History
        </a>
</div>
    <div class="main-content">
        <div class="container mt-4">
            <div class="table-responsive">
                <table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <!-- <th>Referral ID</th> -->
            <th>Referral Date</th>
            <th>Violation</th>
            <th>Time</th>
            <th>Date of Violation</th>
            <th>Location</th>
            <th>Complainant</th>
            <th>Violator</th>
            <th>Piece of Evidence</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($referrals as $index => $referral)
        <tr>
            <td>{{ $index + 1 }}</td>
            <!-- <td>{{ $referral->id }}</td> -->
            <td>{{ $referral->date }}</td>
            <td>{{ $referral->violation }}</td>
            <td>{{ $referral->time }}</td>
            <td>{{ $referral->date_of_violation }}</td>
            <td>{{ $referral->location }}</td>
            <td>{{ $referral->complainant }}</td>
            <td>{{ $referral->violator }}</td>
            <td>{{ $referral->piece_of_evidence }}</td>
            <td>
                <!-- View Button -->
                <button class="btn btn-success view-referral"
                        data-referral-id="{{ $referral->id }}" 
                        data-referral-date="{{ $referral->date }}"
                        data-referral-violation="{{ $referral->violation }}"
                        data-referral-time="{{ $referral->time }}"
                        data-referral-date-of-violation="{{ $referral->date_of_violation }}"
                        data-referral-location="{{ $referral->location }}"
                        data-referral-complainant="{{ $referral->complainant }}"
                        data-referral-violator="{{ $referral->violator }}"
                        data-referral-piece-of-evidence="{{ $referral->piece_of_evidence }}"
                        data-report-age="{{ $referral->report->age }}"
                        data-report-birthdate="{{ $referral->report->birthdate }}"
                        data-report-status="{{ $referral->report->status }}"
                        data-report-educationalbackground="{{ $referral->report->educationalbackground }}"
                        data-report-resident="{{ $referral->report->resident }}">
                    View
                </button>
                

    
    <!-- Print Button -->
    <button class="btn btn-warning print-referral"
            data-referral-id="{{ $referral->id }}">
        Print
    </button>

                 <!-- Record Button (Form for Redirect) -->
                 <form action="{{ url('/record-violation') }}" method="GET" style="display:inline;">
                    <button type="submit" class="btn btn-primary">
                        Record
                    </button>
                </form>

            

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

            </div>
        </div>
    </div>
    <div class="modal fade" id="referralModal" tabindex="-1" role="dialog" aria-labelledby="referralModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body letter-content" id="referralDetails"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
    // View Referral Button
    $('.view-referral').click(function() {
        var referralDate = $(this).data('referral-date');
        var referralViolation = $(this).data('referral-violation');
        var referralTime = $(this).data('referral-time');
        var referralDateOfViolation = $(this).data('referral-date-of-violation');
        var referralLocation = $(this).data('referral-location');
        var referralComplainant = $(this).data('referral-complainant');
        var referralViolator = $(this).data('referral-violator');
        var referralPieceOfEvidence = $(this).data('referral-piece-of-evidence');
        var age = $(this).data('report-age');
        var birthdate = $(this).data('report-birthdate');
        var status = $(this).data('report-status');
        var education = $(this).data('report-educationalbackground');
        var resident = $(this).data('report-resident');

        var referralDetails = `
            <div class="letter-header">
                <img src="{{ asset('img/police.jpg') }}" alt="Logo">
                <div class="header-text">
                    <p>Republic of the Philippines</p>
                    <p>NATIONAL POLICE COMMISSION</p>
                    <p>Philippine National Police, Maritime Group</p>
                    <p>Regional Maritime Unit 2</p>
                    <p>Aparri Maritime Law Enforcement Team</p>
                    <p>Brgy. Punta Aparri</p>
                    <p>Email: macanayaaparri39@yahoo.com  Hotline: 09670017335</p>
                </div>
                <img src="{{ asset('img/maritime.jpg') }}" alt="Logo">
            </div>

            <p>${referralDate}</p>

            <p class="compact">MRS. MARITES L. ROBINION</p>
            <p class="compact">Municipal Agriculturist</p>
            <p class="compact">Municipal Agriculturist Office</p>
            <p>Aparri, Cagayan</p>

            <p>Greetings:</p>

            <p>I have the honor to refer your office for administrative proceedings, the record of investigation related to the case for ${referralViolation} Committed at about ${referralTime} of ${referralDateOfViolation} at Municipal Waters of Aparri, Cagayan.</p>

            <p>Complainant: ${referralComplainant}</p>

            <p>Violator:</p>

            <ul>
                <li>${referralViolator}, Age: ${age}, Birthdate: ${birthdate}, Status: ${status}, Educational Background: ${education}, Resident: ${resident}</li>
            </ul>

            <p>Piece of Evidence: ${referralPieceOfEvidence}</p>

            <p>Facts of the Case: Personnel of Aparri MLET led by PSMS Herold D Alviar, conducted seaborne patrol operation along seawaters of Cagayan River Brgy. ${referralLocation}, Aparri, Cagayan, the team intercepted (1) One motorized fishing banca without necessary license/permit for the Violation of Section 33 of Aparri Municipal Ordinance No. 2015-152 (Unauthorized Fishing Activities) of Aparri, Cagayan.</p>

            <p>Enclosures:</p>
            <ul>
                <li>Spot Report</li>
                <li>Turn-over Receipt</li>
                <li>Others to be presented later</li>
            </ul>

            <p>This violation of Municipal Ordinance will be presented to you by PMSg Herold D Alviar Investigator-On-Case of this Office for your appropriate action and disposition.</p>

            <p>PSMS Herold D Alviar</p>
            <p>Investigator PNCO</p>
        `;

        $('#referralDetails').html(referralDetails);
        $('#referralModal').modal('show');
    });

    // Print Referral Button
    $('.print-referral').click(function() {
        var referralDate = $(this).data('referral-date');
        var referralViolation = $(this).data('referral-violation');
        var referralTime = $(this).data('referral-time');
        var referralDateOfViolation = $(this).data('referral-date-of-violation');
        var referralLocation = $(this).data('referral-location');
        var referralComplainant = $(this).data('referral-complainant');
        var referralViolator = $(this).data('referral-violator');
        var referralPieceOfEvidence = $(this).data('referral-piece-of-evidence');
        var age = $(this).data('report-age');
        var birthdate = $(this).data('report-birthdate');
        var status = $(this).data('report-status');
        var education = $(this).data('report-educationalbackground');
        var resident = $(this).data('report-resident');

        var referralDetails = `
            <div class="letter-header">
                <img src="{{ asset('img/police.jpg') }}" alt="Logo">
                <div class="header-text">
                    <p>Republic of the Philippines</p>
                    <p>NATIONAL POLICE COMMISSION</p>
                    <p>Philippine National Police, Maritime Group</p>
                    <p>Regional Maritime Unit 2</p>
                    <p>Aparri Maritime Law Enforcement Team</p>
                    <p>Brgy. Punta Aparri</p>
                    <p>Email: macanayaaparri39@yahoo.com  Hotline: 09670017335</p>
                </div>
                <img src="{{ asset('img/maritime.jpg') }}" alt="Logo">
            </div>

            <p>${referralDate}</p>

            <p class="compact">MRS. MARITES L. ROBINION</p>
            <p class="compact">Municipal Agriculturist</p>
            <p class="compact">Municipal Agriculturist Office</p>
            <p>Aparri, Cagayan</p>

            <p>Greetings:</p>

            <p>I have the honor to refer your office for administrative proceedings, the record of investigation related to the case for ${referralViolation} Committed at about ${referralTime} of ${referralDateOfViolation} at Municipal Waters of Aparri, Cagayan.</p>

            <p>Complainant: ${referralComplainant}</p>

            <p>Violator:</p>

            <ul>
                <li>${referralViolator}, Age: ${age}, Birthdate: ${birthdate}, Status: ${status}, Educational Background: ${education}, Resident: ${resident}</li>
            </ul>

            <p>Piece of Evidence: ${referralPieceOfEvidence}</p>

            <p>Facts of the Case: Personnel of Aparri MLET led by PSMS Herold D Alviar, conducted seaborne patrol operation along seawaters of Cagayan River Brgy. ${referralLocation}, Aparri, Cagayan, the team intercepted (1) One motorized fishing banca without necessary license/permit for the Violation of Section 33 of Aparri Municipal Ordinance No. 2015-152 (Unauthorized Fishing Activities) of Aparri, Cagayan.</p>

            <p>Enclosures:</p>
            <ul>
                <li>Spot Report</li>
                <li>Turn-over Receipt</li>
                <li>Others to be presented later</li>
            </ul>

            <p>This violation of Municipal Ordinance will be presented to you by PMSg Herold D Alviar Investigator-On-Case of this Office for your appropriate action and disposition.</p>

            <p>PSMS Herold D Alviar</p>
            <p>Investigator PNCO</p>
        `;

        var printWindow = window.open('', '_blank');
        printWindow.document.write('<html><head><title>Print Referral</title>');
        printWindow.document.write('<link rel="stylesheet" href="">');
        printWindow.document.write('</head><body>');
        printWindow.document.write(referralDetails);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    });
});

    </script>
</body>
</html>
