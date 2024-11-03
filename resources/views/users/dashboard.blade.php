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
    .center-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
    }
    .toggle-button {
        position: fixed;
        top: 20px;
        left: 10px;
        z-index: 1100;
        cursor: pointer;
        
        
    }
    .notification-box {
        position: fixed;
        top: 10px;
        right: 10px;
        padding: 10px;
        display: inline-flex;
        align-items: center;
        z-index: 1200;
    }

    .notification-box .badge {
        margin-left: 1px;
    }
</style>
    </head>

    <body>

        <div class="container-content">
            <div class="notification-box">
                <!-- Notification Button -->
                <a href="{{ route('report.userreports') }}"  style="margin: 0; padding: 0;">
                    <i class="fas fa-bell"></i>
                    <span id="notificationCount" class="badge bg-danger">{{ \App\Models\UserReport::count() }}</span>
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
                        {{ __('Submit a Report') }}
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

