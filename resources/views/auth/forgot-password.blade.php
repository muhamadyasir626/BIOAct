<x-guest-layout>
    <x-authentication-card class="w-1/2 mx-auto p-6 bg-white shadow-lg rounded-lg">
        <x-slot name="logo">
            {{-- <x-authentication-card-logo /> --}}
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Lupa kata sandi anda? Jangan khawatir, tuliskan email anda dan kami akan mengirim link untuk melakukan reset kata sandi.') }}
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
                    <svg class="h-5 w-5 text-white mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    {{ __('Kembali') }}
                </x-button>
                <x-button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-md transition duration-150">
                    {{ __('Kirim link reset password') }}
                </x-button>
            </div>
            
        </form>
    </x-authentication-card>
</x-guest-layout>
