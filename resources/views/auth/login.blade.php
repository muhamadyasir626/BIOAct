    <x-guest-layout>
        <x-authentication-card>
            <x-slot name="logo">
                {{-- <x-authentication-card-logo /> --}}
            </x-slot>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="flex flex-col justify-center mx-auto text-center mb-6 gap-3" style="width: 340px;">
                    <h1 class="text-xl text-indigo-700 font-bold" style="font-weight: 700">Masuk</h1>
                    <x-validation-errors class="mb-4" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" class="text-gray-700 font-semibold" />
                    <x-input id="email" class="block mt-1 w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="relative mt-4 mb-4">
                    <x-label for="email" value="{{ __('Kata sandi') }}" class="text-gray-700 font-semibold" />
                    <x-input id="password" 
                        class=" absolute block mt-1 w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500 pr-10" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="new-password" />
                    <button type="button" id="togglePassword" class="absolute inset-y-0 mt-4 me-2 right-0 flex items-center pr-3">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12s2.5-4 9-4 9 4 9 4-2.5 4-9 4-9-4-9-4z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>

                <!-- Remember Me Checkbox -->
                <div class="block mt-4" style="margin-top: 50px">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" class="text-indigo-600" />
                        <span class="ms-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
                    </label>
                </div>

                <div class="flex flex-col items-center justify-between gap-4" style="margin-top: 20px">
                    <x-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-md transition duration-150">
                        {{ __('Masuk') }}
                    </x-button>                
                    <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                        {{ __('Belum punya akun?') }} 
                        <span class="hover-text" style="text-decoration: underline;">{{ __('Daftar disini') }}</span>
                    </a>
                    
                    <style>
                        .hover-text:hover {
                            color: #4338ca; 
                        }
                    </style>                                      
                    <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Lupa kata sandi?') }}
                    </a>
                </div>
            </form>
            <script src="{{ asset('js/login.js') }}"></script>
        </x-authentication-card>
    </x-guest-layout>
