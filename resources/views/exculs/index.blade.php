<x-dashboard-layout>
    <x-slot name="title">Data Ekstrakurikuler</x-slot>
    <x-card>
        <x-slot:header>
            <x-slot:title>Ekstrakurikuler</x-slot:title>
            <x-slot:description>Data ekstrakurikuler yang diajarkan</x-slot:description>
            <x-slot:actions>
                <x-button href="{{ route('exculs.create') }}">Tambah Ekstrakurikuler
                </x-button>
            </x-slot:actions>
        </x-slot:header>
        <x-slot:content>
            <x-page-option class="px-6"/>
            <x-table class="mt-10">
                <x-table.header>
                    <x-table.row>
                        <x-table.head>#</x-table.head>
                        <x-table.head>Ekstrakurikuler</x-table.head>
                        <x-table.head>Kode</x-table.head>
                        <x-table.head>Pembina</x-table.head>
                        <x-table.head>Jumlah Siswa</x-table.head>
                        <x-table.head class="w-0"></x-table.head>
                    </x-table.row>
                </x-table.header>
                <x-table.body>
                    @forelse ($exculs as $excul)
                        <x-table.row>
                            <x-table.cell>{{ $exculs->firstItem() -1  + $loop->iteration }}</x-table.cell>
                            <x-table.cell>{{ $excul->nama }}</x-table.cell>
                            <x-table.cell>{{ $excul->code }}</x-table.cell>
                            <x-table.cell>
                                @if($excul->teacher)
                                    <x-badge class="cursor-pointer"
                                             x-data=""
                                             @click.prevent="$dispatch('open-modal', {name: 'select_teacher', teacher_id: {{$excul->teacher->id}}, route: '{{ route('exculs.pembina', $excul) }}'})"
                                    >
                                        {{ $excul->teacher->nama }}
                                    </x-badge>
                                @else
                                    <x-badge x-data="" class="cursor-pointer"
                                             @click.prevent="$dispatch('open-modal', {name: 'select_teacher', route: '{{ route('exculs.pembina', $excul) }}'})"
                                             variant="danger">
                                        Belum Dipilih
                                    </x-badge>
                                @endif
                            </x-table.cell>
                            <x-table.cell>{{ $excul->classmembers()->count() }}</x-table.cell>
                            <x-table.cell class="text-right">
                                <x-dropdown class="w-48" align="left">
                                    <x-slot:trigger>
                                        <x-button variant="outline" size="icon" class="w-4 h-6">
                                            <x-lucide-more-vertical class="stroke-1 size-4 text-muted-foreground"/>
                                        </x-button>
                                    </x-slot:trigger>
                                    <x-slot:content>
                                        <x-dropdown.link :href="route('exculs.show', $excul)">
                                            <x-lucide-eye/>
                                            Lihat
                                        </x-dropdown.link>
                                        <x-dropdown.link :href="route('exculs.edit', $excul)">
                                            <x-lucide-edit/>
                                            Edit
                                        </x-dropdown.link>
                                        <x-dropdown.link x-data=""
                                                         @click.prevent="$dispatch('open-modal', {name: 'confirm-delete', title: '{{ $excul->nama }}', route: '{{ route('exculs.destroy', $excul) }}'})"
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
        {{ $exculs->links() }}
    </div>
    <x-delete-confirm name="confirm-delete"/>
    <x-teacher-selection name="select_teacher"/>
</x-dashboard-layout>
