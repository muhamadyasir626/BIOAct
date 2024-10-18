<x-guest-layout>
    <x-authentication-card class="w-1/2 mx-auto p-6 bg-white shadow-lg rounded-lg">
        <x-slot name="logo">
            {{-- <x-authentication-card-logo /> --}}
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Input -->
            <div class="block mt-4">
                <x-label for="email" value="{{ __('Email') }}" class="text-gray-700 font-semibold" />
                <x-input id="email" class="block mt-1 w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <!-- Action Button -->
            <div class="flex items-center justify-end mt-6 gap-4">
                <x-button type="button" onclick="window.location.href='{{ route('login') }}'" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-md transition duration-150">
                    {{ __('Back') }}
                </x-button>
                <x-button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-md transition duration-150">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
            
        </form>
    </x-authentication-card>
</x-guest-layout>
