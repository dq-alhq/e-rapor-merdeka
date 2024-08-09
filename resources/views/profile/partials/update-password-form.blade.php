<x-card>
    <x-slot name='header'>
        <x-slot name="title">
            {{ __('Update Password') }}
        </x-slot>
        <x-slot name="description">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </x-slot>
    </x-slot>

    <x-slot name='content'>
        <form method="post" action="{{ route('password.update') }}" class="grid gap-y-6">
            @csrf
            @method('put')

            <div>
                <x-label for="update_password_current_password" :value="__('Current Password')" />
                <x-input id="update_password_current_password" name="current_password" type="password"
                    class="block w-full mt-1" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            <div>
                <x-label for="update_password_password" :value="__('New Password')" />
                <x-input id="update_password_password" name="password" type="password" class="block w-full mt-1"
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <div>
                <x-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                <x-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                    class="block w-full mt-1" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center gap-4">
                <x-button>{{ __('Save') }}</x-button>

                @if (session('status') === 'password-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-muted-foreground">{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </x-slot>
</x-card>
