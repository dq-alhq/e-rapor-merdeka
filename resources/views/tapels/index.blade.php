<x-dashboard-layout>
    <x-slot name="title">Data Tahun Pelajaran</x-slot>
    <x-card>
        <x-slot:header>
            <x-slot:title>Tahun Pelajaran</x-slot:title>
            <x-slot:description>Data tahun pelajaran yang dibuat</x-slot:description>
            <x-slot:actions>
                <x-button href="{{ route('tapels.create') }}">Tambah Tahun
                    Pelajaran
                </x-button>
            </x-slot:actions>
        </x-slot:header>
        <x-slot:content>
            <x-page-option class="px-6"/>
            <x-table class="mt-10">
                <x-table.header>
                    <x-table.row>
                        <x-table.head>#</x-table.head>
                        <x-table.head>Tahun Pelajaran</x-table.head>
                        <x-table.head>Semester</x-table.head>
                        <x-table.head>Tempat, Tanggal Rapor</x-table.head>
                        <x-table.head class="w-0"></x-table.head>
                    </x-table.row>
                </x-table.header>
                <x-table.body>
                    @forelse ($tapels as $tapel)
                        <x-table.row>
                            <x-table.cell>{{ $tapels->firstItem() -1  + $loop->iteration }}</x-table.cell>
                            <x-table.cell>{{ $tapel->nama() }}</x-table.cell>
                            <x-table.cell>{{ $tapel->semester == 1 ? 'Ganjil' : 'Genap' }}</x-table.cell>
                            <x-table.cell>{{ $tapel->tempat_rapor ? $tapel->tempat_rapor .', '. $tapel->tanggal_rapor->isoFormat('d MMMM Y') : 'Belum ditentukan' }}</x-table.cell>
                            <x-table.cell class="text-right">
                                @if(session('tapel')->id === $tapel->id)
                                    <x-badge>Sedang Aktif</x-badge>
                                @else
                                    <x-dropdown class="w-48" align="left">
                                        <x-slot:trigger>
                                            <x-button variant="outline" size="icon" class="w-4 h-6">
                                                <x-lucide-more-vertical class="stroke-1 size-4 text-muted-foreground"/>
                                            </x-button>
                                        </x-slot:trigger>
                                        <x-slot:content>
                                            <x-dropdown.link :href="route('tapels.edit', $tapel)">
                                                <x-lucide-edit class="mr-2"/>
                                                Edit
                                            </x-dropdown.link>
                                            <x-dropdown.link x-data=""
                                                             @click.prevent="$dispatch('open-modal', {name: 'confirm-delete', title: '{{ $tapel->nama() }}', route: '{{ route('tapels.destroy', $tapel) }}'})"
                                            >
                                                <x-lucide-trash/>
                                                Hapus
                                            </x-dropdown.link>
                                        </x-slot:content>
                                    </x-dropdown>
                                @endif
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
        {{ $tapels->links() }}
    </div>
    <x-delete-confirm name="confirm-delete"/>
</x-dashboard-layout>
