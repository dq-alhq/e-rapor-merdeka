<x-dashboard-layout>
    <x-slot name="title">Mapping Mapel</x-slot>

    <div class="flex flex-col-reverse gap-4 lg:flex-row">
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
                        @forelse ($mapped_mapels->sortBy('mapping.order') as $mapel)
                            @if ($mapel->mapping->kelompok->value  == $type->value)
                                <x-table.row>
                                    <x-table.cell>{{ $mapel->mapping->order }}</x-table.cell>
                                    <x-table.cell class="w-full">{{ $mapel->nama }}</x-table.cell>
                                    <x-table.cell>
                                        {{ $mapel->code }}
                                    </x-table.cell>
                                     <x-table.cell class="flex flex-col items-center justify-center">
                                         @if($mapel->mapping->order !== $mapel->mapping->mapel->mapping->min('order'))
                                             <form action="{{ route('mappings.update', $mapel->mapping->id) }}" method="post">
                                                 @csrf @method('PUT')
                                                 <input type="hidden" value="decrease" name="order">
                                                 <button type="submit" class="text-foreground focus:outline-none transition border rounded-t-sm px-1 py-0.5 hover:bg-primary hover:text-primary-foreground active:brightness-90"><x-lucide-chevron-up class="size-3"/></button>
                                             </form>
                                         @else
                                             <button disabled class="border bg-muted rounded-t-sm px-1 py-0.5 text-muted-foreground pointer-events-none"><x-lucide-chevron-up class="size-3"/></button>
                                         @endif
                                         @if($mapel->mapping->order !== $mapel->mapping->mapel->mapping->max('order'))
                                                 <form action="{{ route('mappings.update', $mapel->mapping->id) }}" method="post">
                                                     @csrf @method('PUT')
                                                     <input type="hidden" value="increase" name="order">
                                                     <button type="submit" class="text-foreground focus:outline-none transition border rounded-b-sm px-1 py-0.5 hover:bg-primary hover:text-primary-foreground active:brightness-90"><x-lucide-chevron-down class="size-3"/></button>
                                                 </form>
                                         @else
                                                 <button disabled class="border bg-muted rounded-b-sm px-1 py-0.5 text-muted-foreground pointer-events-none"><x-lucide-chevron-down class="size-3"/></button>
                                         @endif
                                     </x-table.cell>
                                     <x-table.cell>
                                        <form action="{{ route('mappings.destroy', $mapel->mapping->id) }}" method="post">
                                            @csrf @method('DELETE')
                                            <x-button variant="danger" size="sm">
                                                <x-lucide-trash/>
                                            </x-button>
                                        </form>
                                    </x-table.cell>
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
        @if($unmapped_mapels->isNotEmpty())
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
                            <x-table.cell>{{ $mapel->code }}</x-table.cell>
                             <x-table.cell class="flex flex-row gap-1">
                                @foreach (\App\Enums\MapelType::cases() as $type)
                                <form action="{{ route('mappings.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="kelompok" value="{{ $type->value }}">
                                    <input type="hidden" name="mapel_id" value="{{ $mapel->id }}">
                                    <x-button size="sm" variant="primary">
                                        {{ str($type->value)->upper() }}
                                    </x-button>
                                </form>
                                @endforeach
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
        </x-card>
        @endif
    </div>
    <x-delete-confirm name="confirm-delete" />
</x-dashboard-layout>
