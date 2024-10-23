<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
                        <!-- Page Title -->
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ubah Profil') }}
            </h2>
        </div>
    </x-slot>

    <!-- Back Button -->
    <a href="{{ route('login') }}" class="mt-6 ms-6 inline-flex items-center text-sm font-semibold bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-6 rounded-md transition duration-150 ease-in-out shadow-md">
        <svg class="h-5 w-5 text-white mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        {{ __('Kembali') }}
    </a>

    <div class="">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            <div class="mb-6"> <!-- Margin bottom 6 -->
                @livewire('profile.update-profile-information-form')
            </div>
                {{-- <x-section-border /> --}}
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                {{-- <x-section-border /> --}}
            @endif

            {{-- @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif --}}
        </div>
    </div>
</x-app-layout>
