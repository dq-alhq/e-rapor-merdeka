<x-dashboard-layout>
    <x-slot name="title">Profile</x-slot>
    <div class="container space-y-6">
        @include('profile.partials.update-profile-information-form')
        @include('profile.partials.update-password-form')
        @include('profile.partials.delete-user-form')
    </div>
</x-dashboard-layout>
