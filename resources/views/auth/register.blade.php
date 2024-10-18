<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            {{-- <x-authentication-card-logo /> --}}
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Form Header -->
            <div class="flex flex-col justify-center mx-auto text-center mb-6 gap-3">
                <h1 class="text-3xl font-bold text-indigo-800">Daftar Sekarang</h1>
                <p class="text-sm text-gray-500">Perhatikan dan isi kolom dengan hati-hati!</p>
            </div>       

            <!-- Informasi Pribadi -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-white p-8 shadow-lg rounded-xl">
                <!-- Column 1 -->
                <div class="space-y-6">
                    <div class="h-full p-6 bg-gray-50 rounded-lg mb-4 shadow-sm">
                        <h1 class="text-xl font-bold text-indigo-700 mb-4">Informasi Pribadi</h1>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-label for="name" value="{{ __('Nama Lengkap') }}" class="text-gray-700 font-semibold"/>
                                <x-input id="name" class="block mt-1 w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            </div>

                            <div>
                                <x-label for="jenis_kelamin" :value="__('Jenis Kelamin')" class="text-gray-700 font-semibold" />
                                <div class="mt-1 flex gap-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" class="form-radio text-indigo-600" name="jenis_kelamin" value="1" {{ old('jenis_kelamin') == '1' ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">{{ __('Laki-laki') }}</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" class="form-radio text-indigo-600" name="jenis_kelamin" value="0" {{ old('jenis_kelamin') == '0' ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">{{ __('Perempuan') }}</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <div>
                                <x-label for="nip" value="{{ __('NIP') }}" class="text-gray-700 font-semibold" />
                                <x-input id="nip" class="block mt-1 w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" type="text" name="nip" :value="old('nip')" required autofocus autocomplete="nip" />
                            </div>

                            <div>
                                <x-label for="role" :value="__('Bidang')" class="text-gray-700 font-semibold" />
                                <select id="role" class="block mt-1 w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" name="role" required autofocus>
                                    <option value="" disabled selected>Pilih bidang</option>
                                    @foreach($roles as $role)
                                        <option id="{{ $role->slug }}" value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="lkInput" style="display:none">
                                <x-label for="lembaga_konservasi" value="{{ __('Conservation Institution') }}" class="text-gray-700 font-semibold" />
                                <x-input id="lembaga_konservasi" class="block mt-1 w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" type="text" name="lembaga_konservasi" :value="old('lembaga_konservasi')" autofocus autocomplete="lembaga_konservasi" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="space-y-6">
                    <div class="p-6 bg-gray-50 rounded-lg shadow-sm">
                        <h1 class="text-xl font-bold text-indigo-700 mb-4">Akun Anda</h1>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-label for="username" value="{{ __('Username') }}" class="text-gray-700 font-semibold" />
                                <x-input id="username" class="block mt-1 w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                            </div>

                            <div>
                                <x-label for="no_telepon" value="{{ __('Nomor HP') }}" class="text-gray-700 font-semibold" />
                                <x-input id="no_telepon" class="block mt-1 w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" type="text" name="no_telepon" :value="old('no_telepon')" minlength="15" placeholder="ex: 62801-2345-6789" required autofocus autocomplete="no_telepon" />
                            </div>
                        </div>

                        <div class="mt-6">
                            <x-label for="email" value="{{ __('Email') }}" class="text-gray-700 font-semibold" />
                            <x-input id="email" class="block mt-1 w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autocomplete="email" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <div>
                                <x-label for="password" value="{{ __('Kata Sandi') }}" class="text-gray-700 font-semibold" />
                                <x-input id="password" class="block mt-1 w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" type="password" name="password" required autocomplete="new-password" />
                            </div>

                            <div>
                                <x-label for="password_confirmation" value="{{ __('Konfirmasi Kata Sandi') }}" class="text-gray-700 font-semibold" />
                                <x-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Address Details -->
            <div class="mt-8 p-6 bg-gray-50 rounded-lg shadow-lg ">
                <h1 class="text-xl font-bold text-indigo-700">Detail Alamat</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                    <div>
                        <x-label for="kode_pos" value="{{ __('Kode Pos') }}" class="text-gray-700 font-semibold" />
                        <x-input id="kode_pos" class="block mt-1 w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" type="text" name="kode_pos" :value="old('kode_pos')" required autofocus autocomplete="kode_pos" oninput="searchPostalCode()" />
                    </div>
                    <div>
                        <x-label for="provinsi" value="{{ __('Provinsi') }}" class="text-gray-700 font-semibold" />
                        <x-input id="provinsi" class="block mt-1 w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" type="text" name="provinsi" :value="old('provinsi')" required autofocus autocomplete="provinsi" />
                    </div>
                    <div>
                        <x-label for="kabupaten" value="{{ __('Kota/Kabupaten') }}" class="text-gray-700 font-semibold" />
                        <x-input id="kabupaten" class="block mt-1 w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" type="text" name="kabupaten" :value="old('kabupaten')" required autofocus autocomplete="kabupaten" />
                    </div>
                    <div>
                        <x-label for="kecamatan" value="{{ __('Kecamatan') }}" class="text-gray-700 font-semibold" />
                        <x-input id="kecamatan" class="block mt-1 w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" type="text" name="kecamatan" :value="old('kecamatan')" required autofocus autocomplete="kecamatan" />
                    </div>
                    <div>
                        <x-label for="kelurahan" value="{{ __('Kelurahan') }}" class="text-gray-700 font-semibold" />
                        <x-input id="kelurahan" class="block mt-1 w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" type="text" name="kelurahan" :value="old('kelurahan')" required autofocus autocomplete="kelurahan" />
                    </div>
                </div>
                <div class="mt-4">
                    <x-label for="alamat_lengkap" value="{{ __('Alamat Lengkap') }}" class="text-gray-700 font-semibold" />
                    <x-input id="alamat_lengkap" class="block mt-1 w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" type="text" name="alamat_lengkap" :value="old('alamat_lengkap')" required autofocus autocomplete="address" />
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-6">
                <x-label for="terms">
                    <div class="flex items-center">
                        <x-checkbox name="terms" id="terms" required />

                        <div class="ml-2 text-gray-700">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="blank" href="'.route('terms.show').'" class="underline text-sm text-indigo-600 hover:text-indigo-800">'._('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="blank" href="'.route('policy.show').'" class="underline text-sm text-indigo-600 hover:text-indigo-800">'._('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-label>
            </div>
            @endif

            <!-- Register Button -->
            <div class="flex flex-col items-center justify-center mt-4 gap-4">
                <x-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-md transition duration-150">
                    {{ __('Daftar') }}
                </x-button>
                <a class="italic text-sm text-indigo-600 hover:text-indigo-800" href="{{ route('login') }}">
                    {{ __('Sudah pernah daftar? Masuk disini') }}
                </a>
            </div>         
        </form>

        <script src="{{ asset('js/register.js') }}"></script>
    </x-authentication-card>
</x-guest-layout>