<x-form-section submit="updatePassword" class="bg-white shadow-md rounded-lg p-6">
    <x-slot name="title">
        <h2 class="text-lg font-semibold text-gray-700">{{ __('Ubah Kata Sandi') }}</h2>
    </x-slot>

    {{-- <x-slot name="description">
        <p class="text-sm text-gray-500">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
    </x-slot> --}}

    <x-slot name="form" class="space-y-6">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="{{ __('Kata sandi saat ini') }}" class="text-gray-700 font-medium" />
            <x-input id="current_password" type="password" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" wire:model="state.current_password" autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2 text-red-600" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="{{ __('Kata sandi baru') }}" class="text-gray-700 font-medium" />
            <x-input id="password" type="password" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" wire:model="state.password" autocomplete="new-password" />
            <x-input-error for="password" class="mt-2 text-red-600" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation" value="{{ __('Konfirmasi kata sandi') }}" class="text-gray-700 font-medium" />
            <x-input id="password_confirmation" type="password" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" wire:model="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2 text-red-600" />
        </div>
    </x-slot>

    <x-slot name="actions" class="space-x-2">
        <x-action-message class="me-3 mt-3 text-green-600" on="saved">
            {{ __('Tersimpan!') }}
        </x-action-message>

        <x-button class="bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 text-white">
            {{ __('Simpan') }}
        </x-button>
    </x-slot>
</x-form-section>
