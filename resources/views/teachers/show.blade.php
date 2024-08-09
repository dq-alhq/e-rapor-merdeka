<x-dashboard-layout>
    <x-slot name="title">Data Guru</x-slot>
    <div class="relative overflow-hidden bg-card text-card-foreground border rounded-lg shadow-sm">
        <img src="https://cdn.devdojo.com/images/august2023/wallpaper.jpeg"
             class="relative z-20 object-cover w-full h-32" alt="cover"/>
        <div
            class="absolute top-0 z-50 flex flex-col lg:flex-row items-center w-full -mt-6 lg:-mt-2 translate-y-24 px-7 -translate-x-0">
            <div class="w-28 h-28 p-1 rounded-full flex-shrink-0">
                <img src="{{ asset($teacher->photo ?? 'images/default.png') }}"
                     class="w-full h-full rounded-full"
                     alt="logo"/>
            </div>
            <div class="lg:mt-6 mt-4 ml-2 text-center lg:text-left">
                <h5 class="text-xl lg:text-lg font-bold leading-none tracking-tight">{{ $teacher->nama }}</h5>
                <small
                    class="block mt-1 text-sm font-medium leading-none text-muted-foreground">{{ $teacher->nuptk }}</small>
            </div>
            <div class="absolute mt-16 flex justify-between w-full px-2 lg:mt-6 lg:right-0 lg:justify-end gap-2">
                <x-button variant="secondary" size="icon" type="button"
                          href="{{ url()->previous() ?? route('teachers.index') }}">
                    <x-lucide-arrow-left/>
                </x-button>
                <x-button variant="success" href="{{ route('teachers.edit', $teacher) }}">
                    Edit
                </x-button>
            </div>
        </div>
        <div class="relative pb-6 p-7 mt-32 lg:mt-16 text-sm">
            <div class="grid gap-4 lg:gap-2">
                <x-item-list label="Nama Lengkap :">{{ $teacher->nama }}</x-item-list>
                <x-item-list label="NIP :">{{ $teacher->nip }}</x-item-list>
                <x-item-list
                    label="Jenis Kelamin :">{{ $teacher->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</x-item-list>
                <x-item-list label="Tempat Lahir :">{{ $teacher->tempat_lahir }}</x-item-list>
                <x-item-list label="Tanggal Lahir :">{{ $teacher->tanggal_lahir->format('d F Y') }}</x-item-list>
                <x-item-list label="NUPTK :">{{ $teacher->nuptk }}</x-item-list>
                <x-item-list label="NIK :">{{ $teacher->nik }}</x-item-list>
                <x-item-list label="Jalan :">{{ $teacher->alamat }}</x-item-list>
                <x-item-list label="Alamat :">{{ $teacher->alamatLengkap() }}</x-item-list>
            </div>
        </div>
    </div>
</x-dashboard-layout>
