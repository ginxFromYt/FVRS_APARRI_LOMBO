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
      
        <p>{{ \Carbon\Carbon::now()->format('F j, Y') }}</p>


        <p>MRS. MARITES L. ROBINION<br>Municipal Agriculturist<br>Municipal Agriculturist Office<br>Aparri, Cagayan</p>

        <p>Greetings:</p>

        <p>I have the honor to refer your office for administrative proceedings, the record of investigation related to
            the case for {{ $data->violation}} at about {{ \Carbon\Carbon::parse($data->time)->format('g:i A') }}
            of {{ \Carbon\Carbon::parse($data->date_of_violation)->format('F j, Y') }} at
            Municipal Waters of Aparri, Cagayan.</p>

       <span>Complainant: {{ $data->complainant}}</span><br>
        <p>   Violator: <br> <span class="span">1. <strong>{{ $data->violator }}</strong></span>, {{ $data->report->age }} years old, DOB
        {{ \Carbon\Carbon::parse($data->report->birthdate)->format('F j, Y') }},
            {{ $data->report->status }},
            {{ $data->report->educationalbackground }}, of Brgy. {{ $data->report->resident }}, Aparri, Cagayan.
        </p>

        <p><span class="span">Piece of Evidence: One Motorized Fishing Banca "<strong>{{ $data->piece_of_evidence }}</strong>"</span> </p>

        <p>Facts of the Case Personnel of Aparri MLET led by {{ $data->report->turnoverReceipts->first()->investigator_pnco ?? 'N/A' }}, conducted a seaborne patrol operation
            along seawaters
            of Cagayan River Brgy. Macanaya, Punta, Sanja and Bisagu, Aparri, Cagayan, the team intercepted (1) One motorized fishing banca without
            necessary license/permit for the violation of {{$data->violation}} of Aparri, Cagayan.</p>

        <h4>Enclosures</h4>
        <ul>
            <li>Spot Report</li>
            <li>Turn-over Receipt</li>
            <li>Others to be presented later</li>
        </ul>

        <p>This violation of Municipal Ordinance will be presented to you by {{ $data->report->turnoverReceipts->first()->investigator_pnco}} Investigator-On-Case
            of this Office, for your appropriate action and disposition.</p>

         <p style="text-align: right;"> 
    <strong>{{ $data->report->turnoverReceipts->first()->investigator_pnco}}</strong><br>
    Investigator PNCO</p> 


</body>

</html>
