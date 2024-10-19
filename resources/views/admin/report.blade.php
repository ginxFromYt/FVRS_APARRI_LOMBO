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
                            <th>Educational Background</th>
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
                                <td>{{ $report->educationalbackground }}</td>
                                <td>{{ $report->resident }}</td>
                                <td>{{ $report->violation }}</td>
                                <td>{{ $report->engine }}</td>
                                <td>{{ $report->engineno }}</td>
                                <td>{{ $report->gridcoordinate }}</td>
                                <td>{{ $report->amount }}</td>
                                <td>
                                    <button class="btn btn-danger view-feedback"
                                        data-nameofbanca="{{ $report->nameofbanca }}"
                                        data-nameofskipper="{{ $report->nameofskipper }}" data-age="{{ $report->age }}"
                                        data-birthdate="{{ $report->birthdate }}" data-status="{{ $report->status }}"
                                        data-educationalbackground="{{ $report->educationalbackground }}"
                                        data-resident="{{ $report->resident }}"
                                        data-violation="{{ $report->violation }}" data-engine="{{ $report->engine }}"
                                        data-engineno="{{ $report->engineno }}"
                                        data-gridcoordinate="{{ $report->gridcoordinate }}"
                                        data-amount="{{ $report->amount }}"
                                        data-date_of_violation="{{ $report->referrals->isNotEmpty() ? $report->referrals->first()->date_of_violation : 'N/A' }}"
                                        data-time="{{ $report->referrals->isNotEmpty() ? $report->referrals->first()->time : 'N/A' }}">
                                        View
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body" id="feedbackDetails">
                    <div class="header-section">
                        <img src="{{ asset('img/police.jpg') }}" alt="Logo">
                        <div class="org-info">
                            <p>Republic of the Philippines</p>
                            <p>NATIONAL POLICE COMMISSION</p>
                            <h5>Philippine National Police, Maritime Group</h5>
                            <h5>Regional Maritime Unit 2</h5>
                            <h5>Aparri Maritime Law Enforcement Team</h5>
                            <p>Brgy. Punta Aparri, Cagayan</p>
                            <p>Email: macanayaaparri39@yahoo.com Hotline: 09357373202</p>
                        </div>
                        <img src="{{ asset('img/maritime.jpg') }}" alt="Logo">

                    </div>
                    <div id="memorandumTemplate">
                        <p><strong>MEMORANDUM</strong></p>
                        <p>FOR: C, RMU2 (Attn: Invest/OPN Section)</p>
                        <p>FROM: Team Leader, Aparri MLET</p>
                        <p id="subjectLine">SUBJECT: Spot Report re Violation of Section 33 Municipal Ordinance No.
                            2015-152
                            (Unauthorized fishing activities) of Aparri, Cagayan against <span
                                id="skipperNameSubject"></span></p>
                        <p>DATE: <span id="reportDate"></span></p>
                        <p>2. In connection with the above references please be informed that on <span
                                id="dateOfViolationSubject"></span> at about <span id="timeSubject"></span> personnel of
                            Aparri MLET led by PSMS Herold D Alviar, conducted seaborne patrol operation along Cagayan
                            River
                            of Brgy. Macanaya, Minanga, Punta, Sanja and Bisagu Aparri, Cagayan which resulted to the
                            apprehension of One (1) Motorized Fishing Banca for Violation of Section 33 Municipal
                            Ordinance
                            No. 2015-152 (Unauthorized fishing activities) of Aparri, Cagayan in relation to EO.305.</p>
                    </div>

                    <table class="report-table">

                        <tr>
                            <th>Name of Banca:</th>
                            <td id="modalNameOfBanca"></td>
                        </tr>
                        <tr>
                            <th>Name of Skipper:</th>
                            <td id="modalNameOfSkipper"></td>
                        </tr>
                        <tr>
                            <th>Age:</th>
                            <td id="modalAge"></td>
                        </tr>
                        <tr>
                            <th>Birthdate:</th>
                            <td id="modalBirthdate"></td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td id="modalStatus"></td>
                        </tr>
                        <tr>
                            <th>Educational Background:</th>
                            <td id="modalEducationalBackground"></td>
                        </tr>
                        <tr>
                            <th>Resident:</th>
                            <td id="modalResident"></td>
                        </tr>
                        <tr>
                            <th>Violation:</th>
                            <td id="modalViolation"></td>
                        </tr>
                        <tr>
                            <th>Engine:</th>
                            <td id="modalEngine"></td>
                        </tr>
                        <tr>
                            <th>Engine No.:</th>
                            <td id="modalEngineNo"></td>
                        </tr>
                        <tr>
                            <th>Grid Coordinate:</th>
                            <td id="modalGridCoordinate"></td>
                        </tr>
                        <tr>
                            <th>Estimated Amount of Banca:</th>
                            <td id="modalAmount"></td>
                        </tr>
                    </table>
                    <p>3. The apprehended motorized Fishing bancas and boat skippers were brought to Aparri MLET for
                        documentation and prior to referred to Municipal Agriculturist Office for Proper Disposition.
                        (See
                        attached photos).</p>
                    <p>4. For information.</p>
                    <p>JESSIE R LIGUTAN</p>
                    <p>Police Captain</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="printContent()">Print</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).on("click", ".view-feedback", function() {
            var bancaName = $(this).data('nameofbanca');
            var skipperName = $(this).data('nameofskipper');
            var age = $(this).data('age');
            var birthdate = $(this).data('birthdate');
            var status = $(this).data('status');
            var education = $(this).data('educationalbackground');
            var resident = $(this).data('resident');
            var violation = $(this).data('violation');
            var engine = $(this).data('engine');
            var engineNo = $(this).data('engineno');
            var gridCoordinate = $(this).data('gridcoordinate');
            var amount = $(this).data('amount');
            var date_of_violation = $(this).data('date_of_violation');
            var time = $(this).data('time');

            $('#modalNameOfBanca').text(bancaName);
            $('#modalNameOfSkipper').text(skipperName);
            $('#modalAge').text(age);
            $('#modalBirthdate').text(birthdate);
            $('#modalStatus').text(status);
            $('#modalEducationalBackground').text(education);
            $('#modalResident').text(resident);
            $('#modalViolation').text(violation);
            $('#modalEngine').text(engine);
            $('#modalEngineNo').text(engineNo);
            $('#modalGridCoordinate').text(gridCoordinate);
            $('#modalAmount').text(amount);

            $('#skipperNameSubject').text(skipperName);
            $('#dateOfViolationSubject').text(date_of_violation);
            $('#timeSubject').text(time);

            var today = new Date();
            var day = today.getDate().toString().padStart(2, '0');
            var month = (today.getMonth() + 1).toString().padStart(2, '0');
            var year = today.getFullYear();
            var formattedDate = month + '/' + day + '/' + year;

            $('#reportDate').text(formattedDate);

            $('#feedbackModal').modal('show');
        });

        function printContent() {
            var printContents = document.getElementById("feedbackDetails").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
            location.reload(); // reload the page to restore any JavaScript functionality
        }
    </script>
</x-app-layout>
