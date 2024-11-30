<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Moon+Dance&family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
        <style>
            
        </style>
    <div class="container">
        <div class="text-center mb-2">
            <img src="{{ asset('img/logodouble.png') }}" alt="Logo" class="w-25 h-25 mx-auto mb-1 rounded-full">
            <h3 class="text-success">Login</h3>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-3 p-6 rounded-md"> 
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full py-3 px-4 rounded-md focus:outline-none focus:border-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full py-3 px-4 rounded-md focus:outline-none focus:border-indigo-500"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }} <br>
                    </a>
                @endif 
            </div>
            <div class="flex items-center justify-center mt-3">
                <x-primary-button class="bg-success px-6 py-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</x-guest-layout>
