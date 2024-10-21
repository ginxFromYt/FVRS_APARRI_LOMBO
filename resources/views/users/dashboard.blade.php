@can('user-access')
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Capstone') }}</title>

        <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
        <link href="{{ asset('fontawesome-free-5.15.4-web/css/all.min.css') }}" rel="stylesheet">

        <style>
            body {
                font-family: 'Merriweather', serif;
                font-weight: bold;
            }

            .container-content {
                background-image: url('img/maritime2.jpg');
                background-size: cover;
                background-position: center;
                height: 100vh;
                transition: margin-left 0.3s ease;
                margin-left: 0;
                padding-top: 60px;
                /* Added padding to accommodate the notification bar */
            }

            .control-panel-visible .container-content {
                margin-left: 300px;
            }

            .center-container {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100%;
            }

            .control-panel {
                position: fixed;
                left: -300px;
                top: 0;
                width: 300px;
                height: 100%;
                background-color: lightblue;
                padding: 20px;
                padding-top: 80px;
                box-shadow: rgba(0, 123, 255, 0.8) 0px 0px 15px;
                z-index: 1000;
                transition: left 0.3s ease;
                font-family: 'Merriweather', serif;
                font-weight: bold;
            }

            .control-panel.visible {
                left: 0;
            }

            .control-panel-header img {
                width: 100px;
                height: 100px;
            }

            .control-panel-header h2 {
                color: blue;
                font-weight: bold;
                font-size: 24px;
                margin-top: 10px;
            }

            .control-panel a {
                width: 90%;
                margin: 10px 0;
                padding: 10px;
                text-decoration: none;
                font-size: 18px;
                color: black;
                background-color: #fff;
                display: flex;
                align-items: center;
                justify-content: flex-start;
                border-radius: 5px;
                transition: background-color 0.3s;
            }

            .control-panel a i {
                margin-right: 10px;
            }

            .control-panel a:hover {
                background-color: #ddd;
            }

            .toggle-button {
                position: fixed;
                top: 20px;
                left: 10px;
                z-index: 1100;
                cursor: pointer;
                color: gray;
                padding: 15px;
                border-radius: 5px;
                font-size: 20px;
            }

            .toggle-button i {
                font-size: 24px;
                color: black;
            }

            .control-panel-header {
                display: flex;
                align-items: center;
                margin-bottom: 20px;
            }

            .control-panel-header img {
                border-radius: 50%;
                margin-right: 15px;
                width: 40px;
                height: 40px;
            }

            .control-panel-header h2 {
                margin: 0;
                font-family: 'Merriweather', serif;
                font-size: 24px;
                font-weight: bold;
                color: Blue;
            }

            .control-panel .btn {
                display: flex;
                align-items: center;
                justify-content: flex-start;
                width: 100%;
                margin-bottom: 10px;
                background-color: white;
                color: #0d6efd;
                border: 1px solid #0d6efd;
            }

            .control-panel .btn i {
                margin-right: 10px;
                color: #0d6efd;
            }

            .control-panel .btn:hover {
                background-color: #0d6efd;
                color: white;
            }

            .control-panel .btn:hover i {
                color: white;
            }

            .logo-main {
                width: 200px;
                height: 200px;
            }

            /* Notification Box Styles */
            .notification-box {
                position: fixed;
                /* Change to fixed to position it relative to the viewport */
                top: 10px;
                /* Distance from the top */
                right: 10px;
                /* Distance from the right */
                padding: 10px;
                display: inline-flex;
                align-items: center;
                z-index: 1200;
                /* Ensure it's above other elements */
            }

            .notification-box .badge {
                margin-left: 5px;
                /* Space between the icon and the count */
            }
        </style>
    </head>

    <body>

        <div class="container-content">
            <div class="notification-box">
                <!-- Notification Button -->
                <a href="{{ route('report.userreports') }}" class="btn" style="margin: 0; padding: 0;">
                    <i class="fas fa-bell"></i>
                    <span id="notificationCount" class="badge bg-success">{{ \App\Models\UserReport::count() }}</span>
                    <!-- Total count of reports -->
                </a>
            </div>

            <div class="center-container">
                <img src="{{ asset('img/1.jpg') }}" alt="Logo" class="logo-main rounded-circle mb-3">

                <p class="text-center mt-4"
                    style="font-family: 'Merriweather', serif; font-size: 20px; color: white; background-color: rgba(0, 0, 0, 0.7); border: 2px solid navy; padding: 20px; border-radius: 15px; max-width: 600px; margin: 0 auto;">
                    Welcome to the <strong>Fisherfolks Violations Records System</strong>.<br>
                    As part of our efforts to preserve maritime safety and integrity, please ensure to report any violations
                    you observe.
                </p>

                <div class="text-center mt-4" style="font-family: 'Poetsen One', serif;">
                    <x-nav-link :href="route('users.report')" :active="request()->routeIs('users.report.create')" class="btn btn-danger">
                        <i class="fas fa-flag mr-2"></i>
                        {{ __('Report Now!') }}
                    </x-nav-link>
                </div>
            </div>
        </div>

      

    <!-- Control Panel -->
    @extends('layouts.Users.navigation')

        <div class="d-flex align-items-center mt-3">
            <button class="toggle-button" onclick="toggleControlPanel()">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <script>
            function toggleControlPanel() {
                var controlPanel = document.getElementById("controlPanel");
                var body = document.body;

                controlPanel.classList.toggle("visible");
                body.classList.toggle("control-panel-visible");
            }
        </script>

        <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
    </body>

    </html>
@endcan
