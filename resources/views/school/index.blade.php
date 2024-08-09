<x-dashboard-layout>
    <x-slot name="title">Data Sekolah</x-slot>
    <div class="relative overflow-hidden bg-card text-card-foreground border rounded-lg shadow-sm">
        <img src="https://cdn.devdojo.com/images/august2023/wallpaper.jpeg"
             class="relative z-20 object-cover w-full h-32" alt="cover"/>
        <div
            class="absolute top-0 z-50 flex flex-col lg:flex-row items-center w-full -mt-6 lg:-mt-2 translate-y-24 px-7 -translate-x-0">
            <div class="w-28 h-28 p-1 rounded-full flex-shrink-0">
                <img src="{{ asset($school->logo ?? 'images/kemdikbud.png') }}"
                     class="w-full h-full rounded-full"
                     alt="logo"/>
            </div>
            <div class="lg:mt-6 mt-4 lg:ml-2 text-center lg:text-left">
                <h5 class="text-xl lg:text-lg font-bold leading-none tracking-tight">{{ $school->nama }}</h5>
                <small
                    class="block mt-1 text-sm font-medium leading-none text-muted-foreground">{{ $school->alamat }}</small>
            </div>
            <x-button variant="outline" href="{{ route('school.edit', $school) }}"
                      class="absolute right-0 mr-4 lg:mt-6">
                Edit
            </x-button>
        </div>
        <div class="relative pb-6 p-7 mt-32 lg:mt-16 text-sm">
            <div class="grid gap-4 lg:gap-2">
                <x-item-list label="Nama Sekolah :">{{ $school->nama }}</x-item-list>
                <x-item-list label="Kepala Sekolah :">{{ $school->kepsek->nama }}</x-item-list>
                <x-item-list label="Jenjang / Fase :">{{ $school->jenjang->label() }}
                    / {{ $school->jenjang }}</x-item-list>
                <x-item-list label="NPSN :">{{ $school->npsn }}</x-item-list>
                <x-item-list label="NSS/NIS/NDS :">{{ $school->nss }}/{{ $school->nds }}
                    /{{ $school->nis }}</x-item-list>
                <x-item-list label="Jalan :">{{ $school->alamat }}</x-item-list>
                <x-item-list label="Alamat :">{{ $school->alamatLengkap() }}</x-item-list>
                <x-item-list label="Kode Pos :">{{ $school->kode_pos }}</x-item-list>
                <x-item-list label="Telepon :">{{ $school->telepon }}</x-item-list>
            </div>
        </div>
    </div>
</x-dashboard-layout>
