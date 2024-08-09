<x-dashboard-layout>
    <x-slot name="title">Anggota Kelas {{ $classroom->nama() }}</x-slot>
    <div
        class="relative mb-2 inline-flex items-center justify-center w-full h-10 gap-1 p-1 bg-white border rounded-lg select-none">
        @foreach($classrooms as $class)
            <a href="{{ route('classmembers.show', $class) }}"
               class="relative {{ $class->id === $classroom->id ? 'bg-primary text-primary-foreground' : 'bg-muted text-muted-foreground' }} z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">
                {{ $class->nama() }}
            </a>
        @endforeach
    </div>
    <div class="flex flex-col gap-4 lg:flex-row">
        <x-card class="w-full">
            <x-slot name="header">
                <x-slot name="title">Aktif</x-slot>
                <x-slot name="description">Siswa terdaftar di kelas {{ $classroom->nama() }}</x-slot>
            </x-slot>
            <x-table>
                <x-table.header>
                    <x-table.row>
                        <x-table.head>#</x-table.head>
                        <x-table.head>Nama</x-table.head>
                        <x-table.head>Kelas</x-table.head>
                        <x-table.head/>
                    </x-table.row>
                </x-table.header>
                <x-table.body>
                    @forelse ($classroom->students as $student)
                        <x-table.row>
                            <x-table.cell>{{ $loop->iteration }}</x-table.cell>
                            <x-table.cell>{{ $student->nama }}</x-table.cell>
                            <x-table.cell>
                                {{ $student->kelas_sekarang()->nama() }}
                            </x-table.cell>
                            <x-table.cell>
                                <form action="{{ route('detach_classmember', [$classroom, $student]) }}" method="post">
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
        <x-card class="w-full">
            <x-slot name="header">
                <x-slot name="title">Nonaktif</x-slot>
                <x-slot name="description">Siswa yang belum memiliki kelas</x-slot>
            </x-slot>
            <x-table>
                <x-table.header>
                    <x-table.row>
                        <x-table.head>#</x-table.head>
                        <x-table.head>Nama</x-table.head>
                        <x-table.head/>
                    </x-table.row>
                </x-table.header>
                <x-table.body>
                    @forelse ($students as $student)
                        <x-table.row>
                            <x-table.cell>{{ $loop->iteration }}</x-table.cell>
                            <x-table.cell>{{ $student->nama }}</x-table.cell>
                            <x-table.cell>
                                <form action="{{ route('attach_classmember', [$classroom, $student]) }}" method="post">
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
    </div>
</x-dashboard-layout>
