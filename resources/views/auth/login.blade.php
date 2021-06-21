<x-guest-layout>
    <x-auth-card>

        <x-slot name="logo">

            <div class="h-48 flex flex-wrap content-center">
                <a href="/" class="object-fill h-48 w-full">
                    <img src="{{asset('logo/logo.svg')}}" class="w-auto h-20"/>                </a>
            </div>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div >
                <p class="text-white">Email</p>

                <x-input id="email" class="w-full block" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <p class="text-white">Password</p>

                <x-input id="password" class="block w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-white">{{ __('Remember me') }}</span>
                </label>
            </div>



            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-white hover:text-blue-500" href="{{ route('register') }}">
                    {{ __('Non sei registrato?') }}
                    </a>

                <x-button class="ml-3 w-28 lg:w-20">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>

    </x-auth-card>
</x-guest-layout>
