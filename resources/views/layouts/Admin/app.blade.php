<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Capstone') }}</title>

        <!-- Fonts -->
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])


        <!-- bootstrap v5.3.2 -->
        <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
        

    </head>
    <body class="font-sans antialiased">
        <div>

            <!-- renders here the navigation -->
            @include('layouts.Admin.navigation')

            {{-- <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-black shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            <!-- Page Content -->
            <main>
                <!-- starts to render the blade content -->
                @yield('content')
            </main>
        </div>
    </body>

    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"> </script>
</html>
