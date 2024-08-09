<x-dashboard-layout>
    <x-slot name="title">Data Ekstrakurikuler</x-slot>
    <div class="relative overflow-hidden bg-card text-card-foreground border rounded-lg shadow-sm">
        <img src="https://cdn.devdojo.com/images/august2023/wallpaper.jpeg"
             class="relative z-20 object-cover w-full h-32" alt="cover"/>
        <div
            class="absolute top-0 z-50 flex flex-col lg:flex-row items-center w-full -mt-6 lg:-mt-2 translate-y-24 px-7 -translate-x-0">
            <div
                class="w-28 h-28 p-3 rounded-full flex-shrink-0 justify-center flex items-center bg-background text-foreground text-xl font-bold shadow-lg">
                {{ $excul->code }}
            </div>
            <div class="lg:mt-6 mt-4 lg:ml-4 text-center lg:text-left">
                <h5 class="text-xl lg:text-lg font-bold leading-none tracking-tight">{{ $excul->nama }}</h5>
                <small
                    class="block mt-1 text-sm font-medium leading-none text-muted-foreground">{{ $excul->teacher->nama ?? 'Belum pilih wali kelas'}}</small>
            </div>
            <x-button variant="outline" href="{{ route('exculs.edit', $excul) }}"
                      class="absolute right-0 mr-4 lg:mt-6">
                Edit
            </x-button>
        </div>
        <div class="relative pb-6 p-7 mt-32 lg:mt-16 text-sm">
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
                    @forelse ($classmembers as $classmember)
                        <x-table.row>
                            <x-table.cell>{{ $loop->iteration }}</x-table.cell>
                            <x-table.cell>{{ $classmember->student->nama }}</x-table.cell>
                            <x-table.cell>{{ $classmember->student->nis }}</x-table.cell>
                            <x-table.cell>{{ $classmember->student->kelas_sekarang()->nama() }}</x-table.cell>
                            <x-table.cell class="text-right">
                                <x-dropdown class="w-48" align="left">
                                    <x-slot:trigger>
                                        <x-button variant="outline" size="icon" class="w-4 h-6">
                                            <x-lucide-more-vertical class="stroke-1 size-4 text-muted-foreground"/>
                                        </x-button>
                                    </x-slot:trigger>
                                    <x-slot:content>
                                        <x-dropdown.link :href="route('students.show', $classmember->student)">
                                            <x-lucide-eye/>
                                            Lihat
                                        </x-dropdown.link>
                                        <x-dropdown.link :href="route('students.edit', $classmember->student)">
                                            <x-lucide-edit/>
                                            Edit
                                        </x-dropdown.link>
                                        <x-dropdown.link x-data=""
                                                         @click.prevent="$dispatch('open-modal', {name: 'confirm-delete', title: '{{ $classmember->student->nama }}', route: '{{ route('students.destroy', $classmember->student) }}'})"
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
        </div>
    </div>
</x-dashboard-layout>
