<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Nama Lengkap') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-label for="nip" value="{{ __('NIP') }}" />
                <x-input id="nip" class="block mt-1 w-full" type="text" name="nip" :value="old('nip')" required autofocus autocomplete="nip" />
            </div>
            
            <div>
                <x-label for="gender" :value="__('Jenis Kelamin')" />

                <div class="mt-1">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="gender" value="1" {{ old('gender') == 'Laki-laki' ? 'checked' : '' }}>
                        <span class="ml-2">{{ __('Laki-laki') }}</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="gender" value="0" {{ old('gender') == 'Perempuan' ? 'checked' : '' }}>
                        <span class="ml-2">{{ __('Perempuan') }}</span>
                    </label>
                </div>
            </div>

            <div>
                <x-label for="username" value="{{ __('Username') }}" />
                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            </div>

            <div class="mt-4">
                <x-label for="no_telepon" value="{{ __('Nomor Telepon') }}" />
                <x-input id="no_telepon" class="block mt-1 w-full" type="text" name="no_telepon" :value="old('no_telepon')" minlength="15" placeholder="62801-2345-6789" required autofocus autocomplete="no_telepon" />
            </div>
            
            <div class="mt-4">
                <x-label for="kode_pos" value="{{ __('Kode Pos') }}" />
                <x-input id="kode_pos" class="block mt-1 w-full" type="text" name="kode_pos" :value="old('kode_pos')" required autofocus autocomplete="kode_pos" oninput="searchPostalCode()" />
            </div>            
            
            <div class="mt-4">
                <x-label for="provinsi" value="{{ __('Provinsi') }}" />
                <x-input id="provinsi" class="block mt-1 w-full" type="text" name="provinsi" :value="old('provinsi')" required autofocus autocomplete="provinsi" />
            </div>
            
            <div class="mt-4">
                <x-label for="kabupaten" value="{{ __('Kabupaten ') }}" />
                <x-input id="kabupaten" class="block mt-1 w-full" type="text" name="kabupaten" :value="old('kabupaten')" required autofocus autocomplete="kabupaten" />
            </div>
            
            <div class="mt-4">
                <x-label for="kecamatan" value="{{ __('Kecamatan') }}" />
                <x-input id="kecamatan" class="block mt-1 w-full" type="text" name="kecamatan" :value="old('kecamatan')" required autofocus autocomplete="kecamatan" />
            </div>
            
            <div class="mt-4">
                <x-label for="kelurahan" value="{{ __('Kelurahan') }}" />
                <x-input id="kelurahan" class="block mt-1 w-full" type="text" name="kelurahan" :value="old('kelurahan')" required autofocus autocomplete="kelurahan" />
            </div>

            <div>
                <x-label for="alamat_lengkap" value="{{ __('Alamat Lengkap') }}" />
                <x-input id="alamat_lengkap" class="block mt-1 w-full" type="text" name="alamat_lengkap" :value="old('alamat_lengkap')" required autofocus autocomplete="address" />
            </div>

            
            <div class="mt-4">
                <x-label for="role" :value="__('Bidang')" />
                <select id="role" class="block mt-1 w-full" name="role" required autofocus>
                    <option value="">Select Options</option>
                    @foreach($roles as $role)
                        <option id="{{ $role->slug }}" value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4" id="areaInput" style="display:none">
                <x-label for="area" value="{{ __('Wilayah') }}" />
                <select id="area" class="block mt-1 w-full" name="area" autofocus>
                    <option value="">Select Options</option>
                    @foreach($areas as $area)
                        <option id="{{ $area->slug }}" value="{{ $area->id }}">{{ $area->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4" id="lkInput" style="display:none">
                <x-label for="lembaga_konservasi" value="{{ __('Lembaga Konservasi') }}" />
                <x-input id="lembaga_konservasi" class="block mt-1 w-full" type="text" name="lembaga_konservasi" :value="old('lembaga_konservas')"  autofocus autocomplete="lembaga_konservasi" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
<script src="{{ asset('js/register.js') }}"></script>

    </x-authentication-card>
</x-guest-layout>

