<!DOCTYPE html>
<html>

<head>
    <title>Referral Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }



        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table,
        .table th,
        .table td {
            border: 1px solid black;
        }

        .table th,
        .table td {
            padding: 8px;
            text-align: left;
        }

        .logo {
            height: 50px;
        }

        .content {
            margin-top: 20px;
        }

        .footer {
            margin-top: 40px;
        }


        .header {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .header td {
            vertical-align: middle;
            text-align: center;
            padding: 10px;
        }

        .header img {
            width: 100px;
            /* Adjust size as needed */
        }

        .header h3 {
            margin: 0;
            font-size: 16px;
        }

        .header p {
            margin: 0;
            font-size: 12px;
        }

        .span {
            margin-left: 30px;
        }
    </style>
</head>

<body>
    <table class="header">
        <tr>
            <td style="width: 20%; text-align: left;">
                <img src="img/police.jpg" alt="Police Logo">
            </td>
            <td style="width: 60%; text-align: center;">
                <h3>Republic of the Philippines<br>
                    NATIONAL POLICE COMMISSION<br>
                    Philippine National Police, Maritime Group<br>
                    Regional Maritime Unit 2<br>
                    Aparri Maritime Law Enforcement Team</h3>
                <p>Brgy. Punta Aparri | Email: macanayaaparri39@yahoo.com | Hotline: 09670017335</p>
            </td>
            <td style="width: 20%; text-align: right;">
                <img src="img/maritime.jpg" alt="Maritime Logo">
            </td>
        </tr>
    </table>

    @foreach ($referal as $data)
    @endforeach
    <div class="content">
        {{--  <h4>Referral Records</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Referral Date</th>
                    <th>Violation</th>
                    <th>Time</th>
                    <th>Date of Violation</th>
                    <th>Location</th>
                    <th>Complainant</th>
                    <th>Violator</th>
                    <th>Piece of Evidence</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2024-10-19</td>
                    <td></td>
                    <td>18:55:00</td>
                    <td>2024-10-19</td>
                    <td>asasas</td>
                    <td>asasa</td>
                    <td>qw qwqw</td>
                    <td>asasas</td>
                </tr>
                <!-- Add other rows here -->
            </tbody>
        </table>  --}}

        <h4>Referral Letter</h4>
        <p>2024-10-21</p>

        <p>MRS. MARITES L. ROBINION<br>Municipal Agriculturist<br>Municipal Agriculturist Office<br>Aparri, Cagayan</p>

        <p>Greetings:</p>

        <p>I have the honor to refer your office for administrative proceedings, the record of investigation related to
            the case for Section 33 of Municipal Ordinance No. 2015-152 committed at about {{ $data->time }} of
            {{ $data->date_of_violation }} at
            Municipal Waters of Aparri, Cagayan.</p>

        <p>Complainant: PCMS Oliver Rivera (Team Leader)<br>

            Violator: <br> <span class="span">{{ $data->violator }}</span>, {{ $data->report->age }} years old, DOB
            {{ $data->report->birthdate }},
            {{ $data->report->status }},
            {{ $data->report->educationalbackground }},
            {{ $data->report->resident }}
        </p>

        <p>Piece of Evidence: One Motorized Fishing Banca <span>"</span>
            <span style="font-weight: 800;">{{ $data->piece_of_evidence }}</span><span>"</span>
        </p>

        <p>Facts of the Case Personnel of Aparri MLET led by PSMS Herold D Alviar, conducted a seaborne patrol operation
            along seawaters
            of Cagayan River Brgy. dada, Aparri, Cagayan. The team intercepted (1) one motorized fishing banca without
            necessary license/permit for the violation of Section 33 of Aparri Municipal Ordinance No. 2015-152
            (Unauthorized Fishing Activities) of Aparri, Cagayan.</p>

        <h4>Enclosures</h4>
        <ul>
            <li>Spot Report</li>
            <li>Turn-over Receipt</li>
            <li>Others to be presented later</li>
        </ul>

        <p>This violation of Municipal Ordinance will be presented to you by PMSg Herold D Alviar, Investigator-On-Case
            of this Office, for your appropriate action and disposition.</p>

        <p>PSMS Herold D Alviar<br>Investigator PNCO</p>
    </div>
</body>

</html>
