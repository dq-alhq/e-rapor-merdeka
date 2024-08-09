<x-dashboard-layout>
    <x-slot name="title">Data Mata Pelajaran</x-slot>
    <x-card>
        <x-slot:header>
            <x-slot:title>Mata Pelajaran</x-slot:title>
            <x-slot:description>Data mata pelajaran yang diajarkan</x-slot:description>
            <x-slot:actions>
                <x-button href="{{ route('mapels.create') }}">Tambah Mata
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
                        <x-table.head>Mata Pelajaran</x-table.head>
                        <x-table.head>Kode</x-table.head>
                        <x-table.head class="w-0"></x-table.head>
                    </x-table.row>
                </x-table.header>
                <x-table.body>
                    @forelse ($mapels as $mapel)
                        <x-table.row>
                            <x-table.cell>{{ $mapels->firstItem() -1  + $loop->iteration }}</x-table.cell>
                            <x-table.cell>{{ $mapel->nama }}</x-table.cell>
                            <x-table.cell>{{ $mapel->code }}</x-table.cell>
                            <x-table.cell class="text-right">
                                <x-dropdown class="w-48" align="left">
                                    <x-slot:trigger>
                                        <x-button variant="outline" size="icon" class="w-4 h-6">
                                            <x-lucide-more-vertical class="stroke-1 size-4 text-muted-foreground"/>
                                        </x-button>
                                    </x-slot:trigger>
                                    <x-slot:content>
                                        <x-dropdown.link :href="route('mapels.edit', $mapel)">
                                            <x-lucide-edit/>
                                            Edit
                                        </x-dropdown.link>
                                        <x-dropdown.link x-data=""
                                                         @click.prevent="$dispatch('open-modal', {name: 'confirm-delete', title: '{{ $mapel->nama }}', route: '{{ route('mapels.destroy', $mapel) }}'})"
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
        {{ $mapels->links() }}
    </div>
    <x-delete-confirm name="confirm-delete"/>
</x-dashboard-layout>
