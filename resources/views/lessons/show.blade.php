<x-dashboard-layout>
    <x-slot name="title">Pembelajaran {{ $classroom->nama() }}</x-slot>
    <div
        class="relative mb-2 inline-flex items-center justify-center w-full h-10 gap-1 p-1 bg-background border rounded-lg select-none">
        @foreach($classrooms as $class)
            <a href="{{ route('lessons.show', $class) }}"
               class="relative {{ $class->id === $classroom->id ? 'bg-primary text-primary-foreground' : 'bg-muted text-muted-foreground' }} z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">
                {{ $class->nama() }}
            </a>
        @endforeach
    </div>
    <div class="flex flex-col-reverse gap-4 lg:flex-row">
        <x-card class="w-full">
            <x-slot name="header">
                <x-slot name="title">Aktif</x-slot>
                <x-slot name="description">Mapel aktif pada kelas {{ $classroom->nama() }}</x-slot>
            </x-slot>
            <x-table>
                <x-table.header>
                    <x-table.row>
                        <x-table.head>#</x-table.head>
                        <x-table.head>Mata Pelajaran</x-table.head>
                        <x-table.head>Guru</x-table.head>
                        <x-table.head/>
                    </x-table.row>
                </x-table.header>
                <x-table.body>
                    @forelse ($classroom->mapels->sortBy('id') as $mapel)
                        <x-table.row>
                            <x-table.cell>{{ $loop->iteration }}</x-table.cell>
                            <x-table.cell>{{ $mapel->nama }}</x-table.cell>
                            <x-table.cell>
                                @if($mapel->teachers()->where('classroom_id', $classroom->id)->exists())
                                    <x-badge class="cursor-pointer"
                                             x-data=""
                                             @click.prevent="$dispatch('open-modal', {name: 'select_teacher', teacher_id: {{$mapel->teachers()->where('classroom_id', $classroom->id)->first()->id}}, route: '{{ route('attach_teacher', [$classroom, $mapel]) }}'})"
                                    >
                                        {{$mapel->teachers()->where('classroom_id', $classroom->id)->first()->nama}}
                                    </x-badge>
                                @else
                                    <x-badge x-data="" class="cursor-pointer"
                                             @click.prevent="$dispatch('open-modal', {name: 'select_teacher', route: '{{ route('attach_teacher', [$classroom, $mapel]) }}'})"
                                             variant="danger">Belum Dipilih
                                    </x-badge>
                                @endif
                            </x-table.cell>
                            <x-table.cell>
                                <form action="{{ route('detach_mapel', [$classroom, $mapel]) }}" method="post">
                                    @csrf @method('DELETE')
                                    <x-button variant="secondary" size="sm">
                                        Nonaktifkan
                                    </x-button>
                                </form>
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
        @if($mapels->isNotEmpty())
            <x-card class="w-full">
                <x-slot name="header">
                    <x-slot name="title">Nonaktif</x-slot>
                    <x-slot name="description">Mapel yang tidak dipakai</x-slot>
                </x-slot>
                <x-table>
                    <x-table.header>
                        <x-table.row>
                            <x-table.head>#</x-table.head>
                            <x-table.head>Mata Pelajaran</x-table.head>
                            <x-table.head/>
                        </x-table.row>
                    </x-table.header>
                    <x-table.body>
                        @forelse ($mapels as $mapel)
                            <x-table.row>
                                <x-table.cell>{{ $loop->iteration }}</x-table.cell>
                                <x-table.cell>{{ $mapel->nama }}</x-table.cell>
                                <x-table.cell>
                                    <form action="{{ route('attach_mapel', [$classroom, $mapel]) }}" method="post">
                                        @csrf
                                        <x-button size="sm">
                                            Aktifkan
                                        </x-button>
                                    </form>
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
    <x-teacher-selection name="select_teacher"/>
</x-dashboard-layout>
