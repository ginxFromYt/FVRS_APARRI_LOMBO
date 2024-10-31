<x-app-layout>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Moon+Dance&family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">

    <head>
        <style>
            body {
                font-family: 'Merriweather', serif;
            }
            .registration-container {
                background-color: white; /* Set the background color to white */
                padding: 20px; /* Reduced padding for smaller top and bottom */
                border-radius: 8px; /* Round the corners */
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
                max-width: 400px; /* Limit the width of the box */
                margin: auto; /* Center the box */
                overflow: hidden; /* Remove scrollbar */
                margin-top: 20px; /* Add some space above the container */
            }
            .logo {
                width: 50px; /* Adjust logo size */
                height: auto; /* Maintain aspect ratio */
            }
            .register-title {
                font-size: 20px; /* Adjust register text size */
            }
            .button-container {
                display: flex; 
                justify-content: space-between; /* Compress button and text */
                align-items: center; /* Center the items vertically */
                margin-top: 10px; /* Reduced margin for button area */
            }
            .register-link {
                font-size: 12px; /* Smaller link size */
            }
        </style>
    </head>

    <div class="registration-container"> <!-- Added container for registration -->
        <form method="POST" action="{{ route('admin.register.store') }}">
            @csrf

            <div class="text-center mb-2">
                <img src="{{ asset('img/pagelogo.jpg') }}" alt="Logo" class="logo mx-auto mb-2">
                <h1 class="text-success register-title">Register</h1>
            </div>
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-2">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-2">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-2">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="button-container mt-2">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md register-link" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-primary-button class="bg-success px-4 py-1"> <!-- Adjusted button padding -->
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</x-app-layout>
