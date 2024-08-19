<x-dashboard-layout>
    <x-slot name="title">Mapping Mapel</x-slot>

    <div class="flex flex-col gap-4 lg:flex-row">
        <x-card class="w-full">
            <x-slot name="header">
                <x-slot name="title">Aktif</x-slot>
                <x-slot name="description">Mapel yang dipakai</x-slot>
            </x-slot>
            <x-table>
                <x-table.header>
                    <x-table.row>
                        <x-table.head>#</x-table.head>
                        <x-table.head>Mata Pelajaran</x-table.head>
                        <x-table.head>Kode</x-table.head>
                        <x-table.head />
                    </x-table.row>
                </x-table.header>
            </x-table>
            @foreach (\App\Enums\MapelType::cases() as $type)
                <x-table>
                    <x-table.row class="bg-success">
                        <x-table.head class="text-center text-success-foreground">{{ $type->label() }}</x-table.head>
                    </x-table.row>
                </x-table>
                <x-table>
                    <x-table.body>
                        @forelse ($mapped_mapels as $mapel)
                            @if ($mapel->mapping->kelompok == $type->value)
                                <x-table.row>
                                    <x-table.cell>{{ $loop->iteration }}</x-table.cell>
                                    <x-table.cell>{{ $mapel->nama }}</x-table.cell>
                                    <x-table.cell>
                                        {{ $mapel->kode }}
                                    </x-table.cell>
                                    {{-- <x-table.cell>
                                    <form action="{{ route('mappings.destroy', $mapel) }}" method="post">
                                        @csrf @method('DELETE')
                                        <x-button variant="secondary" size="sm">
                                            Nonaktifkan
                                        </x-button>
                                    </form>
                                </x-table.cell> --}}
                                </x-table.row>
                            @endif
                        @empty
                            <x-table.row>
                                <x-table.cell colspan="5" class="py-8 text-xl font-semibold text-center">
                                    Tidak ditemukan
                                </x-table.cell>
                            </x-table.row>
                        @endforelse
                    </x-table.body>
                </x-table>
            @endforeach
        </x-card>
        <x-card class="w-full">
            <x-slot name="header">
                <x-slot name="title">Nonaktif</x-slot>
                <x-slot name="description">Mapel yang tidak dipakai</x-slot>
            </x-slot>
            <x-table>
                <x-table.header>
                    <x-table.row>
                        <x-table.head>#</x-table.head>
                        <x-table.head>Mapel</x-table.head>
                        <x-table.head>Kode</x-table.head>
                        <x-table.head />
                    </x-table.row>
                </x-table.header>
                <x-table.body>
                    @forelse ($unmapped_mapels as $mapel)
                        <x-table.row>
                            <x-table.cell>{{ $loop->iteration }}</x-table.cell>
                            <x-table.cell>{{ $mapel->nama }}</x-table.cell>
                            <x-table.cell>{{ $mapel->kode }}</x-table.cell>
                            {{-- <x-table.cell>
                                <form action="{{ route('mappings.update', $mapel) }}" method="post">
                                    @csrf @method('PUT')
                                    <x-button size="sm">
                                        Aktifkan
                                    </x-button>
                                </form>
                            </x-table.cell> --}}
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
        </x-card>
    </div>
    <x-delete-confirm name="confirm-delete" />
</x-dashboard-layout>
