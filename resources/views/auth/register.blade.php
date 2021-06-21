<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <p class="text-white mb-2.5">Nome</p>

                <x-input id="name" class="w-full block" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Surname -->
            <div>
                <p class="text-white mb-2.5">Cognome</p>

                <x-input id="surname" class="w-full block" type="text" name="surname" :value="old('surname')" required autofocus />
            </div>

            <!-- Codice Fiscale -->
            <div>
                <p class="text-white mb-2.5">Codice fiscale</p>

                <x-input maxlength="16" id="cf" class="w-full block" type="text" name="cf" :value="old('cf')" required autofocus />
            </div>


            <!-- Email Address -->
            <div>
                <p class="text-white mb-2.5">Email</p>

                <x-input id="email" class="w-full block" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div>
                <p class="text-white mb-2.5">Password</p>

                <x-input id="password" class="w-full block"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div>
                <p class="text-white mb-2.5">Conferma Password</p>

                <x-input id="password_confirmation" class="w-full block"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-white hover:text-blue-500" href="{{ route('login') }}">
                    {{ __('Già registrato?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Registra') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
