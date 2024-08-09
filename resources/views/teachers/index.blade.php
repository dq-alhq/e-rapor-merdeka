<x-dashboard-layout>
    <x-slot name="title">Data Guru</x-slot>
    <x-card>
        <x-slot name="header">
            <x-slot name="title">Guru</x-slot>
            <x-slot name="description">Data guru yang mengajar</x-slot>
            <x-slot name="actions">
                <x-button href="{{ route('teachers.create') }}">Tambah Guru</x-button>
            </x-slot>
        </x-slot>
        <x-slot name="content">
            <x-page-option :perPage="['9','18','36','72']"/>
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4 mt-6">
                @foreach($teachers as $teacher)
                    <x-dropdown align="right">
                        <x-slot name="trigger">
                            <x-profile-card src="{{ asset($teacher->photo ?? 'images/default.png') }}"
                                            :href="route('teachers.show', $teacher)"
                                            :title="$teacher->nama">
                                <div class="text-sm">
                                    {{ $teacher->nuptk }}
                                </div>
                            </x-profile-card>
                        </x-slot>
                        <x-slot:content>
                            <x-dropdown.link :href="route('teachers.show', $teacher)">
                                <x-lucide-eye/>
                                Lihat
                            </x-dropdown.link>
                            <x-dropdown.link :href="route('teachers.edit', $teacher)">
                                <x-lucide-edit/>
                                Edit
                            </x-dropdown.link>
                            <x-dropdown.link x-data=""
                                             @click.prevent="$dispatch('open-modal', {name: 'confirm-delete', title: '{{ $teacher->nama }}', route: '{{ route('teachers.destroy', $teacher) }}'})"
                            >
                                <x-lucide-trash/>
                                Hapus
                            </x-dropdown.link>
                        </x-slot:content>
                    </x-dropdown>
                @endforeach
            </div>
        </x-slot>
    </x-card>
    <div class="py-8">
        {{ $teachers->links() }}
    </div>

    <x-delete-confirm name="confirm-delete"/>
</x-dashboard-layout>
