<x-form-section submit="updateProfileInformation" class="bg-white shadow-md rounded-lg p-6">
    <x-slot name="title">
        <h2 class="text-lg font-semibold text-gray-700">{{ __('Ubah Nama dan Email') }}</h2>
    </x-slot>

    <x-slot name="description">
        {{-- <p class="text-sm text-gray-500">{{ __('Update your account\'s profile information and email address.') }}</p> --}}
    </x-slot>

    <x-slot name="form" class="space-y-6">
        <!-- Profile Photo -->
        {{-- @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4"> --}}
                <!-- Profile Photo File Input -->
                {{-- <input type="file" id="photo" class="hidden" wire:model.live="photo" x-ref="photo" x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);
                " />

                <x-label for="photo" value="{{ __('Photo') }}" class="text-gray-700 font-medium" /> --}}

                <!-- Current Profile Photo -->
                {{-- <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover shadow-lg ring-2 ring-indigo-500">
                </div> --}}

                <!-- New Profile Photo Preview -->
                {{-- <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center shadow-lg"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2 text-indigo-600 hover:bg-indigo-100" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2 text-red-600 hover:bg-red-100" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2 text-red-600" /> --}}
            {{-- </div>
        @endif --}}

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nama') }}" class="text-gray-700 font-medium" />
            <x-input id="name" type="text" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2 text-red-600" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" class="text-gray-700 font-medium" />
            <x-input id="email" type="email" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" wire:model="state.email" required autocomplete="username" />
            <x-input-error for="email" class="mt-2 text-red-600" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2 text-gray-500">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-indigo-600 hover:text-indigo-900" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions" class="space-x-2">
        <x-action-message class="me-3 mt-3 text-green-600" on="saved">
            {{ __('Tersimpan!') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo" class="bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 text-white">
            {{ __('Simpan') }}
        </x-button>
    </x-slot>
</x-form-section>
