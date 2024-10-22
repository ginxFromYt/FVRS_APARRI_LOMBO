<!DOCTYPE html>
<html>

<head>
    <title>Spot Report</title>
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
                <p>Brgy. Punta Aparri | Email: macanayaaparri39@yahoo.com |<br> Hotline: 09670017335</p>
            </td>
            <td style="width: 20%; text-align: right;">
                <img src="img/maritime.jpg" alt="Maritime Logo">
            </td>
        </tr>
    </table>

    {{-- Fetch only the first report --}}
    @if ($reports->first())
        @php
            $data = $reports->first();
        @endphp

        <div class="content">
           
            <p><strong>MEMORANDUM</strong></p>
                        <p>FOR: C, RMU2 <br>(Attn: Invest/OPN Section)</p>
                        <p>FROM: Team Leader, Aparri MLET</p>
                        <p id="subjectLine">SUBJECT:<strong>Spot Report re Violation of {{ $data->violation }}
                            (Unauthorized fishing activities) of Aparri, Cagayan against  {{ $data->nameofskipper }}</strong></p><br>
                        
                            
                            @foreach ($data->referrals as $referral)
                            <div style="width: 100%;">
                <span >DATE: {{ \Carbon\Carbon::parse($referral->date)->format('F j, Y') }}</span>
            </div>
            <hr style="border: 1px solid black; margin: 0;">

            
          <p>1. References:<br>
          a. Implementation of E.O. 305 (Boat Registration of 3GT and below to Municipal/City Government); and acted on the Letter from the Office of the Municipal Mayor thru Mrs. Marites L. Robinion,Municipal Agriculturist, Aparri, Cagayan dated Juned 8, 2020 and <br>
          b. PNP P.A.T.R.O.L Plan 2030/MG P.A.T.R.O.L Plan 2030
          </p>

        <p>2. In connection with the above references please be informed that on 
                            {{ \Carbon\Carbon::parse($referral->date_of_violation)->format('F j, Y') }} at about {{ \Carbon\Carbon::parse($referral->time)->format('g:i A') }} personnel of
                            Aparri MLET led by PSMS Herold D Alviar, conducted seaborne patrol operation along Cagayan
                            River
                            of Brgy. Macanaya, Minanga, Punta, Sanja and Bisagu Aparri, Cagayan which resulted to the
                            apprehension of One (1) Motorized Fishing Banca for Violation of {{ $data->violation }} of Aparri, Cagayan in relation to EO.305.</p>

                            <p>A. Name of Banca : {{$data->nameofbanca}}<br>
                            Skipper: {{$data->nameofskipper}}, {{$data->age}} years old, DOB {{$data->birthdate}}, {{$data->status}},RELIGION,{{$data->educationalbackground}},HANAPBUHAY, and resident of Brgy. {{$data->resident}}, Aparri, Cagayan <br>
                            Engine: {{$data->engine}}<br>
                            Engine no. : {{$data->engineno}}<br>
                            Grid Coordinate :  {{$data->gridcoordinate}}<br>
                            Estimated Amount of Banca: ({{$data->amount}})</p>

                            @endforeach
                    </div>
        
           
         
        </div>
        
    @else
        <p>No reports available.</p>
    @endif
</body>

</html>
