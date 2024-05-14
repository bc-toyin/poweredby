<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" x-data="app()">
        @csrf

        <!-- First Name -->
        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" x-model="first_name" @input="formPass()" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" x-model="last_name" @input="formPass()" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" x-model="email" @input="formPass()" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            x-model="password"
                            @input="formPass()"
                            required autocomplete="new-password" />

            <div class="flex -mx-1 mt-3">
                <template x-for="(v,i) in 5">
                    <div class="w-1/5 px-1">
                        <div class="h-2 rounded-xl transition-colors" :class="i<passwordScore?(passwordScore<=2?'bg-red-400':(passwordScore<=4?'bg-yellow-400':'bg-green-500')):'bg-gray-200'"></div>
                    </div>
                </template>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            x-model="password_confirmation"
                            @input="formPass()"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 disabled:opacity-50 ms-4 disabled:opacity-50" :disabled="btnDisabled">{{ __('Register') }}</button>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
    <script>
        function app() {
            return {
                showPasswordField: true,
                passwordScore: 0,
                first_name: '{{ old("first_name") }}',
                last_name: '{{ old("last_name") }}',
                email: '{{ old("email") }}',
                password: '',
                password_confirmation: '',
                btnDisabled: true,
                chars: {
                    lower: 'abcdefghijklmnopqrstuvwxyz',
                    upper: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
                    numeric: '0123456789',
                    symbols: '!"#$%&\'()*+,-./:;<=>?@[\\]^_`{|}~'
                },
                charsLength: 12,
                checkStrength: function() {
                    if(!this.password) return this.passwordScore = 0;
                    this.passwordScore = zxcvbn(this.password).score + 1;
                },
                shuffleArray(array) {
                    for (let i = array.length - 1; i > 0; i--) {
                        const j = Math.floor(Math.random() * (i + 1));
                        [array[i], array[j]] = [array[j], array[i]];
                    }
                    return array;
                },
                formPass() {
                    this.checkStrength();

                    if (this.first_name.trim() != '' && this.last_name.trim() != '' && this.email.trim() != '' && this.password.trim() != '' && this.password_confirmation.trim() != '' && this.passwordScore >= 3 && this.password == this.password_confirmation) {
                        this.btnDisabled = false;
                    } else {
                        this.btnDisabled = true;
                    }
                }
            }
        }
    </script>
</x-guest-layout>
