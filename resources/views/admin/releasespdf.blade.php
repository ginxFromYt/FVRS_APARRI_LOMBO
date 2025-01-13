<!DOCTYPE html>
<html>
<head>
    <title>Release Paper</title>
    <style>


        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table, .table th, .table td {
            border: 1px solid black;
        }

        .table th, .table td {
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

        .page-break {
            page-break-before: always;
        }

        .evidence-title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
        }

        /* Center and add spacing to evidence images */
        .evidence-container {
            text-align: center;
            margin: 20px 0;
        }

        .evidence-image {
            width: 60%;
            height: auto;
            max-width: 600px;
            margin: 10px auto;
            display: inline-block;
        }

        h3 {
    text-align: center;
}

        body {
            font-family: "Times New Roman", Times, serif;
        }

        

    </style>
</head>

<body>
    <table class="header">
        <tr>
            <td style="width: 20%; text-align: left;">
                <img src="img/republika ng pilipinas.jpg" alt="Police Logo">
            </td>
            <td style="width: 60%; text-align: center;">
                <p>Republic of the Philippines</p>
                    <p>Province of Cagayan</p>
                    <p><strong> MUNICIPAL GOVERNMENT OF APARRI </strong></p><br>
                   <h3><strong>OFFICE OF THE MUNICIPAL AGRICULTURIST</strong></h3>
                   <div style="border-top: 2px solid black; width: 100%; margin-top: 0.1in;"></div>
            </td>

          
            <td style="width: 20%; text-align: right;">
                <img src="img/aparrilogo.jpg" alt="Maritime Logo">
            </td>
        </tr>

    </table>

    
    
    @foreach ($releases as $release)
        <h3 style="text-align: center;">Release Paper</h3>
        <p style="text-align: center;">
        {{ \Carbon\Carbon::parse($release->date_of_release)->format('F j, Y') }}<br>
        </p>

        <p style="text-indent: 80px;">
        <strong>{{$release->name_of_skipper}}</strong> from barangay {{$release->address	}} Aparri, Cagayan with reported violation under
        {{$release->violation}}  apprehended by the PNP-Maritime last  {{ \Carbon\Carbon::parse($release->date_of_release)->format('F j, Y') }}
         at about {{ \Carbon\Carbon::parse($release->time_of_violation)->format('g:i A') }} along the municipal water boundaries
        Aparri,Cagayan is hereby released after the conduct of {{$release-> compensation}} at barangay {{$release->address}} Aparri, Cagayan.
    </p><br>
    <br>
    <br>

    Prepared by:<br>
<br>
<br>
<br>
    <strong>{{$release->agricultural_technologist}}</strong><br>
    Agricultural Technologist
<br><br><br>
    
Noted by:<br><br><br>


<strong>{{$release->municipal_agriculturist}}</strong>		
<br>
Municipal Agriculturist
    @endforeach
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


    <footer style="position: left; bottom: 0; width: 100%; text-align: center;">
    <img src="img/image.png" alt="Footer Image" style="display: block; margin: 0 auto; width: 100%; height: auto;">
</footer>

</body>
</html>
