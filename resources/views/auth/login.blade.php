<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-label for="username" value="Username" />
            <x-input id="username" class="block w-full mt-1" type="text" name="username" required autofocus
                autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" value="Password" />

            <x-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Tahun Pelajaran -->
        <div class="mt-4">
            <x-label for="tapel" value="Tahun Pelajaran" />

            <select id="tapel" class="block w-full mt-1 choice" name="tapel" required>
                @foreach ($tapels as $tapel)
                    <option value="{{ $tapel->id }}">{{ $tapel->tapel }} -
                        {{ $tapel->semester == 1 ? 'Ganjil' : 'Genap' }}</option>
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('tapel')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between mt-4">
            <label for="remember" class="inline-flex items-center gap-2">
                <x-checkbox id="remember" name="remember" />
                <span class="text-sm text-muted-foreground">Ingat saya!</span>
            </label>
            @if (Route::has('password.request'))
                <a class="text-sm outline-none text-muted-foreground hover:text-foreground"
                    href="{{ route('password.request') }}">
                    Lupa Password?
                </a>
            @endif
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button class="w-full">
                {{ __('Log in') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>
