<x-dashboard-layout>
    <x-slot name='title'>Users</x-slot>
    <x-card>
        <x-slot:header>
            <x-slot:title>User</x-slot:title>
            <x-slot:description>Daftar User</x-slot:description>
        </x-slot:header>
        <x-slot:content>
            <x-page-option class="px-6"/>
            <x-table class="mt-5">
                <x-table.header>
                    <x-table.row>
                        <x-table.head>#</x-table.head>
                        <x-table.head>Name</x-table.head>
                        <x-table.head>Role</x-table.head>
                        <x-table.head class="w-0"></x-table.head>
                    </x-table.row>
                </x-table.header>
                <x-table.body>
                    @forelse ($users as $user)
                        <x-table.row>
                            <x-table.cell>{{ $users->firstItem() - 1 + $loop->iteration }}</x-table.cell>
                            <x-table.cell>{{ $user->name }}</x-table.cell>
                            <x-table.cell>{{ $user->role() }}</x-table.cell>
                            <x-table.cell class="text-right">
                                <x-dropdown class="w-48" align="left">
                                    <x-slot name="trigger">
                                        <x-button variant="outline" size="icon" class="w-4 h-6">
                                            <x-lucide-more-vertical class="stroke-1 size-4 text-muted-foreground"/>
                                        </x-button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown.link :href="route('profile.edit')">
                                            <x-lucide-eye/>
                                            Lihat
                                        </x-dropdown.link>
                                        <x-dropdown.link x-data=""
                                                         @click.prevent="$dispatch('open-modal', {name: 'confirm-reset', title: '{{ $user->name }}', route: '{{ route('users.reset_password', $user) }}'})"
                                        >
                                            <x-lucide-key-round/>
                                            Reset Password
                                        </x-dropdown.link>
                                    </x-slot>
                                </x-dropdown>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="5" class="py-8 text-xl font-semibold text-center">Tidak
                                ditemukan
                            </x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-table.body>
            </x-table>
        </x-slot:content>
    </x-card>
    <div class="py-4">
        {{ $users->links() }}
    </div>
    <x-reset-password-confirm name="confirm-reset"/>
</x-dashboard-layout>
