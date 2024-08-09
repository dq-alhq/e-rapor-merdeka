<x-dashboard-layout>
    <x-slot name="title">Data Siswa</x-slot>
    <x-card>
        <x-slot:header>
            <x-slot:title>Siswa</x-slot:title>
            <x-slot:description>Data siswa yang terdaftar</x-slot:description>
            <x-slot:actions>
                <x-button href="{{ route('students.create') }}">Tambah Siswa</x-button>
            </x-slot:actions>
        </x-slot:header>
        <x-slot:content>
            <x-page-option class="px-6"/>
            <x-table class="mt-10">
                <x-table.header>
                    <x-table.row>
                        <x-table.head>#</x-table.head>
                        <x-table.head>Nama</x-table.head>
                        <x-table.head>NIS</x-table.head>
                        <x-table.head>Kelas</x-table.head>
                        <x-table.head class="w-0"></x-table.head>
                    </x-table.row>
                </x-table.header>
                <x-table.body>
                    @forelse ($students as $student)
                        <x-table.row>
                            <x-table.cell>{{ $students->firstItem() -1  + $loop->iteration }}</x-table.cell>
                            <x-table.cell>{{ $student->nama }}</x-table.cell>
                            <x-table.cell>{{ $student->nis }}</x-table.cell>
                            <x-table.cell>{{ $student->kelas_sekarang()->nama() }}</x-table.cell>
                            <x-table.cell class="text-right">
                                <x-dropdown class="w-48" align="left">
                                    <x-slot:trigger>
                                        <x-button variant="outline" size="icon" class="w-4 h-6">
                                            <x-lucide-more-vertical class="stroke-1 size-4 text-muted-foreground"/>
                                        </x-button>
                                    </x-slot:trigger>
                                    <x-slot:content>
                                        <x-dropdown.link :href="route('students.show', $student)">
                                            <x-lucide-eye/>
                                            Lihat
                                        </x-dropdown.link>
                                        <x-dropdown.link :href="route('students.edit', $student)">
                                            <x-lucide-edit/>
                                            Edit
                                        </x-dropdown.link>
                                        <x-dropdown.link x-data=""
                                                         @click.prevent="$dispatch('open-modal', {name: 'confirm-delete', title: '{{ $student->nama }}', route: '{{ route('students.destroy', $student) }}'})"
                                        >
                                            <x-lucide-trash/>
                                            Keluarkan
                                        </x-dropdown.link>
                                    </x-slot:content>
                                </x-dropdown>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="5" class="py-8 text-xl font-semibold text-center">
                                Tidak ditemukan
                            </x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-table.body>
            </x-table>
        </x-slot:content>
    </x-card>
    <div class="py-8">
        {{ $students->links() }}
    </div>

    <x-delete-confirm name="confirm-delete"/>
</x-dashboard-layout>
