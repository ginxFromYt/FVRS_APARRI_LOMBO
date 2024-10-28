<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Capstone') }}</title>

    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('fontawesome-free-5.15.4-web/css/all.min.css') }}" rel="stylesheet">
    <style>
        .welcome-text {
            color: black;
            font-family: 'Times New Roman', serif;
            font-weight: bold;
            font-size: 40px;
            margin-top: 300px;
            text-align: center;
        }
        .slogan-text {
            color: blue; /* Changed color to blue */
            font-family: 'Dancing Script', cursive;
            font-size: 24px;
            text-align: center;
            margin-top: 10px;
        }
        body {
            background-image: url('img/walll.jpg');
            background-size: cover; 
            background-position: center; 
            height: 100vh;
            display: flex;
        }
        .left-part, .right-part {
            width: 50%;
            height: 100%;
        }
        .left-part {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            background-color: white;
        }
        .right-part {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: transparent;
            padding: 20px;
        }
        .btn-login, .btn-register, .btn-report {
            font-family: 'Roboto', sans-serif;
            font-weight: 500;
            padding: 8px 15px;  /* Adjusted padding for smaller buttons */
            width: 100px;  /* Adjusted width for smaller buttons */
        }
        .btn-login {
            background-color: orange;
            color: white;
        }
        .btn-register {
            background-color: darkgreen;
            color: white;
        }
        .btn-report {
            background-color: red;
            color: white;
            padding: 5px 10px;
            font-size: 12px;
            display: inline-flex;
            align-items: center;
        }
        .btn-login:hover, .btn-register:hover, .btn-report:hover {
            opacity: 0.8;
        }
        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }
        .logo img {
            max-width: 250px;
            height: auto;
            position: absolute;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
        }
        .toggle-box {
            display: none;
            position: absolute;
            top: 50px;
            left: 10px;
            width: 150px;  /* Adjusted width for smaller toggle box */
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            text-align: center;
        }
        .toggle-box .btn {
            margin-bottom: 10px;
            width: 100%;
        }
        .toggle-btn {
            position: absolute;
            top: 10px;
            left: 10px;
        }
        .report-container {
            text-align: center;
        }
        .news-card {
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
            width: 100%;
        }
        .news-title {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .news-content {
            font-size: 14px;
            line-height: 1.5;
        }
        .report-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }
        .report-section span {
            font-size: 14px;
        }
        .btn-report i {
            margin-right: 10px;
        }
    </style>
</head>
<body class="antialiased">

<div class="left-part">
    <button class="toggle-btn" id="toggleButton">
        <i class="fas fa-bars"></i>
    </button>

    <div class="toggle-box" id="toggleBox">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-success">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-login">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
                <!-- @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-register">
                        <i class="fas fa-user-plus"></i> Register
                    </a>
                @endif -->
            @endauth
        @endif
    </div>

    <div class="logo">
        <img src="{{ asset('img/pagelogo.jpg') }}" alt="Logo" class="img-fluid">
    </div>

    <div class="welcome-text">Fisherfolks Violation Records System</div>
    <div class="slogan-text">"Preserving the Seas, Protecting Our Future"</div>
</div>

<div class="right-part">
    <div class="news-card">
        <div class="news-title">Makakabuti sa Pangingisda</div>
        <div class="news-content">
            Ang wastong pangingisda ay hindi lamang nakatutulong sa ekonomiya kundi nag-aambag din sa
            pagpapanatili ng balanse sa ating mga ecosystem. Narito ang ilang mga tip upang maiwasan ang
            mga paglabag sa mga regulasyon:
            <ul>
                <li>Gumamit ng wastong kagamitan at teknik sa pangingisda.</li>
                <li>Sumunod sa mga itinalagang panahon ng pangingisda.</li>
                <li>Iwasan ang overfishing upang mapanatili ang mga populasyon ng isda.</li>
            </ul>
        </div>
    </div>

    <div class="news-card">
        <div class="news-title">Pag-iingat sa Kalikasan</div>
        <div class="news-content">
            Sa pamamagitan ng tamang pangingisda, maaari tayong makatulong sa pagpapanatili ng kalikasan. Huwag gumamit ng mga bawal na kagamitan sa pangingisda tulad ng mga dinamita, at huwag mangisda sa mga marine protected areas.
        </div>
    </div>

    <div class="news-card">
        <div class="news-title">Responsableng Pangingisda</div>
        <div class="news-content">
            Ang responsableng pangingisda ay nagtataguyod ng masaganang buhay ng dagat at mas mataas na kita sa hinaharap. Panatilihin ang kalinisan ng karagatan at iwasan ang paggamit ng mga bawal na teknolohiya.
        </div>
        <div class="report-section">
            <span>Do you have a report to submit? / Mayroon ka bang ulat na isusumite?</span>
            <a href="{{ url('/report') }}" class="btn btn-report">
                <i class="fas fa-file-alt"></i> Click Here
            </a>
        </div>
    </div>
</div>

<script>
    const toggleButton = document.getElementById('toggleButton');
    const toggleBox = document.getElementById('toggleBox');
    toggleButton.addEventListener('click', () => {
        toggleBox.style.display = toggleBox.style.display === 'none' ? 'block' : 'none';
    });
</script>

</body>
</html>
