!DOCTYPE html>
<html>

<head>
    <title>Turnover Receipt Report</title>
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
                <p>Brgy. Punta Aparri | Email: macanayaaparri39@yahoo.com |<br> Hotline: 09670017335</p>
            </td>
            <td style="width: 20%; text-align: right;">
                <img src="img/maritime.jpg" alt="Maritime Logo">
            </td>
        </tr>
    </table>


    <p>Marites L. Robinion, RA., MSCS <br>
        Municipal Agriculturist
    </p><br>


    <p>Madam:</p><br>
    <p>Greetings of Peace!</p>

    <p>This referes to the apprehension conducted by operatives Aparri MLET on
        {{ \Carbon\Carbon::parse($receipt->date_of_violation)->format('jS \\d\\a\\y \\o\\f F Y') }} at about
        {{ \Carbon\Carbon::parse($receipt->time_of_violation)->format('g:i A') }}
        at the Municipality Waters of Aparri Cagayan for <strong>{{ $receipt->name_of_violation }}</strong> .</p>

    <p>In this connection, this unit respectfully turn over the following Motorized Fishing Banca's and Fishing
        Paraphernalia's of apprehendeed fisher folks violator to wit.</p>

    <table class="table">
        <thead>
            <tr>
                <th>Owner/Skipper</th>
                <th>Name of Fishing Vessel</th>
                <th>Fishing Paraphernalia</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $receipt->name_of_skipper }}</td>
                <td> <strong>"{{ $receipt->name_of_banca }}" </strong> </td>
                <td></td>
            </tr>
        </tbody>

    </table><br>

    <p style="text-align: right;">
        Turned over by:<br>
        <strong>{{ $receipt->investigator_pnco }}</strong><br>
        Investigator PNCO
    </p>
    <hr style="border: 1px solid black; margin: 0;"><br>


    <strong>
        <p style="text-align: center;">ACCEPTANCE RECEIPT</p>
    </strong><br>

    <p>I hereby acknowledge receipt of the above-mentioned Units/Items this
        {{ \Carbon\Carbon::now()->format('jS \\d\\a\\y \\o\\f F Y') }} at the Municipal Agriculturist Office, Aparri,
        Cagayan.</p><br>

    <p style="text-align: right;">Received by:</p><br>

    <div style="text-align: right; margin: 0;">
        <p><span style="border-top: 1px solid black; width: 30%; display: inline-block; margin-right: 5px;"></p>
        <span style="display: inline-block;">Signature Over Printed Name</span>
    </div>


</body>

</html>
