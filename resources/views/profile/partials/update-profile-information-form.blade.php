<x-card>
    <x-slot name="header">
        <x-slot name="title">
            {{ __('Profile Information') }}
        </x-slot>
        <x-slot name="description">
            {{ __("Update your account's profile information and email address.") }}
        </x-slot>
    </x-slot>

    <x-slot name="content">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="grid gap-y-6">
            @csrf
            @method('patch')

            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name', $user->name)"
                    required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" name="email" type="email" class="block w-full mt-1" :value="old('email', $user->email)"
                    required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="mt-2 text-sm text-danger">
                            {{ __('Your email address is unverified.') }}
                        </p>
                        <button form="send-verification"
                            class="text-sm outline-none text-muted-foreground hover:text-foreground">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 text-sm font-medium text-success">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <x-button>{{ __('Save') }}</x-button>

                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-muted-foreground">{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </x-slot>
</x-card>
