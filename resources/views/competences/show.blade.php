<x-dashboard-layout>
    <x-slot name="title">Lingkup Materi</x-slot>
    <div
        class="relative mb-2 inline-flex items-center justify-center w-full h-10 gap-1 p-1 bg-background border rounded-lg select-none">
        @foreach($tingkat as $t)
            <a href="{{ route('competences.show', [$t,1]) }}"
               class="relative {{ $t->value === $grade ? 'bg-primary text-primary-foreground' : 'bg-muted text-muted-foreground' }} z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">
                {{ $t->label() }}
            </a>
        @endforeach
    </div>
    <div class="flex flex-col lg:flex-row gap-2">
        <div
            class="relative mb-2 flex flex-row overflow-x-auto lg:flex-col items-center justify-start lg:justify-center gap-1 p-1 bg-background border rounded-lg select-none">
            @foreach(\App\Models\Mapel::get() as $m)
                <a href="{{ route('competences.show', [$grade, $m]) }}"
                   class="relative {{ $m->id === $mapel?->id ? 'bg-primary text-primary-foreground' : 'bg-muted text-muted-foreground' }} z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">
                    {{ $m->code }}
                </a>
            @endforeach
        </div>
       @if($mapel) <x-card class="w-full">
            <x-slot name="header">
                <x-slot name="title">Lingkup Materi</x-slot>
                <x-slot name="description">Pada Mapel {{ $mapel->nama }}</x-slot>
                <x-slot name="actions">
                    <x-button href="{{ route('competences.create', [$mapel, $grade]) }}" variant="success">Tambah Materi</x-button>
                </x-slot>
            </x-slot>
            <x-table>
                <x-table.header>
                    <x-table.row>
                        <x-table.head>Kode</x-table.head>
                        <x-table.head>Lingkup Materi</x-table.head>
                        <x-table.head>Tujuan Pembelajaran</x-table.head>
                        <x-table.head/>
                    </x-table.row>
                </x-table.header>
                <x-table.body>
                    <x-table.row class="[&_td]:hover:bg-success/80 text-center text-success-foreground [&_td]:bg-success">
                        <x-table.cell colspan="4">Semester Ganjil</x-table.cell>
                    </x-table.row>
                    @forelse ($competences->where('mapel_id',$mapel->id)->where('semester', 1) as $competence)
                        <x-table.row>
                            <x-table.cell>{{ $competence->code }}</x-table.cell>
                            <x-table.cell>{{ $competence->materi }}</x-table.cell>
                            <x-table.cell>
                                @foreach($competence->objectives as $objective)
                                    <x-table>
                                        <x-table.body>
                                            <x-table.row class="font-semibold">
                                                <x-table.cell class="w-6">
                                                    <span class="flex items-center gap-1">
                                                        <x-lucide-edit x-data=""
                                                            @click.prevent="$dispatch('open-modal', {name: 'input-objective', competence_id: {{$competence->id}}, objective_id: {{$objective->id}}, objective: '{{ $objective->capaian }}', route: '{{ route('objectives.store') }}'})"
                                                            class="size-4 transition hover:text-success cursor-pointer"/>
                                                        <x-lucide-trash-2 x-data=""
                                                          @click.prevent="$dispatch('open-modal', {name: 'delete-objective', title: 'Hapus {{ str($objective->capaian)->limit(20) }}', route: '{{ route('objectives.destroy', $objective) }}'})"
                                                          class="size-4 transition hover:text-danger cursor-pointer"/>
                                                    </span>
                                                </x-table.cell>
                                                <x-table.cell class="p-0 w-full">{{ $objective->capaian }}</x-table.cell>
                                            </x-table.row>
                                        </x-table.body>
                                    </x-table>
                                @endforeach
                                    <x-table>
                                        <x-table.body>
                                            <x-table.row class="font-semibold">
                                                <x-table.cell class="w-6">
                                                    <span class="flex items-center gap-1">
                                                <x-lucide-clipboard-plus x-data=""
                                                               @click.prevent="$dispatch('open-modal', {name: 'input-objective', competence_id: {{$competence->id}}, objective_id: '', objective: '', route: '{{ route('objectives.store') }}'})"
                                                               class="size-4 transition hover:text-primary cursor-pointer"/>
                                                    </span>
                                                </x-table.cell>
                                            </x-table.row>
                                        </x-table.body>
                                    </x-table>
                            </x-table.cell>
                            <x-table.cell class="text-right">
                                <x-button href="{{ route('competences.edit', $competence) }}" variant="success" size="icon">
                                    <x-lucide-edit/>
                                </x-button>
                                <x-button variant="danger" size="icon" x-data=""
                                                 @click.prevent="$dispatch('open-modal', {name: 'delete-materi', title: 'Hapus {{ $competence->materi }}', route: '{{ route('competences.destroy', $competence) }}'})"
                                >
                                    <x-lucide-trash/>
                                </x-button>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="5" class="py-8 text-xl font-semibold text-center">
                                Tidak ditemukan
                            </x-table.cell>
                        </x-table.row>
                    @endforelse
                    <x-table.row class="[&_td]:hover:bg-danger/80 text-center text-danger-foreground [&_td]:bg-danger">
                        <x-table.cell colspan="4">Semester Genap</x-table.cell>
                    </x-table.row>
                    @forelse ($competences->where('mapel_id',$mapel->id)->where('semester', 2) as $competence)
                        <x-table.row>
                            <x-table.cell>{{ $competence->code }}</x-table.cell>
                            <x-table.cell>{{ $competence->materi }}</x-table.cell>
                            <x-table.cell>
                                @foreach($competence->objectives as $objective)
                                    <x-table>
                                        <x-table.body>
                                            <x-table.row>
                                                <x-table.cell>{{ $loop->iteration }}. {{ $objective->capaian }}</x-table.cell>
                                            </x-table.row>
                                        </x-table.body>
                                    </x-table>
                                @endforeach
                            </x-table.cell>
                            <x-table.cell class="text-right">
                                <x-button href="{{ route('competences.edit', $competence) }}" variant="success" size="icon">
                                    <x-lucide-edit/>
                                </x-button>
                                <x-button variant="danger" size="icon" x-data=""
                                          @click.prevent="$dispatch('open-modal', {name: 'delete-materi', title: 'Hapus {{ $competence->materi }}', route: '{{ route('competences.destroy', $competence) }}'})"
                                >
                                    <x-lucide-trash/>
                                </x-button>
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
    <x-delete-confirm name="delete-materi"/>
    <x-delete-confirm name="delete-objective"/>
    <x-input-objective name="input-objective"/>
</x-dashboard-layout>
