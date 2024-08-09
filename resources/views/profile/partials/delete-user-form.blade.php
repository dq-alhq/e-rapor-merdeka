<x-card>
    <x-slot name='header'>
        <x-slot name="title">
            {{ __('Delete Account') }}
        </x-slot>
        <x-slot name="description">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </x-slot>
    </x-slot>

    <x-slot name="content">
        <x-button variant="danger" x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete Account') }}</x-button>

        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" alert focusable>
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-1 text-sm text-muted-foreground">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="mt-6">
                    <x-label for="password" value="{{ __('Password') }}" class="sr-only" />

                    <x-input id="password" name="password" type="password" class="block w-3/4 mt-1"
                        placeholder="{{ __('Password') }}" />

                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>

                <div class="flex justify-end mt-6">
                    <x-button type="button" variant="secondary" x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-button>

                    <x-button class="ms-3" variant="danger">
                        {{ __('Delete Account') }}
                    </x-button>
                </div>
            </form>
        </x-modal>
    </x-slot>
</x-card>
