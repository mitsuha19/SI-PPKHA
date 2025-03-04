<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" id="registerForm">
        @csrf

        <!-- Nama -->
        <div>
            <x-input-label for="nama" :value="__('Nama')" />
            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>

        <!-- NIM -->
        <div class="mt-4">
            <x-input-label for="nim" :value="__('NIM')" />
            <x-text-input id="nim" class="block mt-1 w-full" type="text" name="nim" :value="old('nim')" required autocomplete="off" />
            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
        </div>

        <!-- Username -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="prodi" :value="__('Program Studi')" />
            <select id="prodi" name="prodi" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="" disabled {{ old('prodi') ? '' : 'selected' }}>Pilih Program Studi</option>
                <option value="S1 Informatika" {{ old('prodi') === 'S1 Informatika' ? 'selected' : '' }}>S1 Informatika</option>
                <option value="S1 Sistem Informasi" {{ old('prodi') === 'S1 Sistem Informasi' ? 'selected' : '' }}>S1 Sistem Informasi</option>
                <option value="S1 Teknik Elektro" {{ old('prodi') === 'S1 Informatika' ? 'selected' : '' }}>S1 Teknik Elektro</option>
            </select>
            <x-input-error :messages="$errors->get('prodi')" class="mt-2" />
        </div>

        <!-- Tahun Lulus -->
        <div class="mt-4">
            <x-input-label for="tahun_lulus" :value="__('Tahun Lulus')" />
            <x-text-input id="tahun_lulus" class="block mt-1 w-full" type="number" name="tahun_lulus" :value="old('tahun_lulus')" required autocomplete="off" />
            <x-input-error :messages="$errors->get('tahun_lulus')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- reCAPTCHA -->
        <div>
            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
            <x-input-error :messages="$errors->get('g-recaptcha-response')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4" type="button" onclick="onClick(event)">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    @push('scripts')
        {{-- <script>
            function onSubmit(token) {
            document.getElementById("registerForm").submit();
            }
        </script> --}}
        <script>
        function onClick(e) {
            e.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {action: 'register'}).then(function(token) {
                    document.getElementById('g-recaptcha-response').value = token;
                    document.getElementById("registerForm").submit();
            });
            });
        }
    </script>
@endpush
</x-guest-layout>