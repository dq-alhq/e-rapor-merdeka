<x-dashboard-layout>
    <x-slot name="title">Data Kelas</x-slot>
    <x-card>
        <x-slot:header>
            <x-slot:title>Kelas</x-slot:title>
            <x-slot:description>Kelas pada
                Tapel {{ session('tapel')->nama() }}
                Semester {{ session('tapel')->semester == 1 ? 'Ganjil' : 'Genap' }}</x-slot:description>
            <x-slot:actions>
                <x-button href="{{ route('classrooms.create') }}">Tambah Kelas
                </x-button>
            </x-slot:actions>
        </x-slot:header>
        <x-slot:content>
            <x-table class="mt-10">
                <x-table.header>
                    <x-table.row>
                        <x-table.head>#</x-table.head>
                        <x-table.head>Kelas</x-table.head>
                        <x-table.head>Wali Kelas</x-table.head>
                        <x-table.head>Jumlah Siswa</x-table.head>
                        <x-table.head class="w-0"></x-table.head>
                    </x-table.row>
                </x-table.header>
                <x-table.body>
                    @forelse ($classrooms as $classroom)
                        <x-table.row>
                            <x-table.cell>{{ $classrooms->firstItem() -1  + $loop->iteration }}</x-table.cell>
                            <x-table.cell>{{ $classroom->nama() }}</x-table.cell>
                            <x-table.cell>
                                @if($classroom->wali)
                                    {{ $classroom->wali->nama }}
                                @else
                                    <x-badge href="{{ route('classrooms.edit', $classroom) }}" variant="danger">Belum
                                        dipilih
                                    </x-badge>
                                @endif
                            </x-table.cell>
                            <x-table.cell>{{ $classroom->students()->count() }}</x-table.cell>
                            <x-table.cell class="text-right">
                                <x-dropdown class="w-48" align="left">
                                    <x-slot:trigger>
                                        <x-button variant="outline" size="icon" class="w-4 h-6">
                                            <x-lucide-more-vertical class="stroke-1 size-4 text-muted-foreground"/>
                                        </x-button>
                                    </x-slot:trigger>
                                    <x-slot:content>
                                        <x-dropdown.link :href="route('classrooms.show', $classroom)">
                                            <x-lucide-eye/>
                                            Lihat
                                        </x-dropdown.link>
                                        <x-dropdown.link :href="route('classrooms.edit', $classroom)">
                                            <x-lucide-edit/>
                                            Edit
                                        </x-dropdown.link>
                                        <x-dropdown.link x-data=""
                                                         @click.prevent="$dispatch('open-modal', {name: 'confirm-delete', title: '{{ $classroom->nama() }}', route: '{{ route('classrooms.destroy', $classroom) }}'})"
                                        >
                                            <x-lucide-trash/>
                                            Hapus
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
        {{ $classrooms->links() }}
    </div>
    <x-delete-confirm name="confirm-delete"/>
</x-dashboard-layout>
