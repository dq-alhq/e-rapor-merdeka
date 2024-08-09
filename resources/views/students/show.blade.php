<x-dashboard-layout>
    <x-slot name="title">Data Siswa</x-slot>
    <div class="relative overflow-hidden bg-card text-card-foreground border rounded-lg shadow-sm">
        <img src="https://cdn.devdojo.com/images/august2023/wallpaper.jpeg"
             class="relative z-20 object-cover w-full h-32" alt="cover"/>
        <div
            class="absolute top-0 z-50 flex flex-col lg:flex-row items-center w-full -mt-6 lg:-mt-2 translate-y-24 px-7 -translate-x-0">
            <div class="w-28 h-28 p-1 rounded-full flex-shrink-0">
                <img src="{{ asset($student->photo ?? 'images/default.png') }}"
                     class="w-full h-full rounded-full"
                     alt="logo"/>
            </div>
            <div class="lg:mt-6 mt-4 ml-2 text-center lg:text-left">
                <h5 class="text-xl lg:text-lg font-bold leading-none tracking-tight">{{ $student->nama }}</h5>
                <small
                    class="block mt-1 text-sm font-medium leading-none text-muted-foreground">{{ $student->nis }}
                    | {{ $student->kelas_sekarang()->rombel }}
                    - {{ session('tapel')->tapel .'/'. session('tapel')->tapel +1 }}
                    ({{session('tapel')->semester == 1 ? 'Ganjil' : 'Genap'}})</small>
            </div>
            <x-button variant="outline" href="{{ route('students.edit', $student) }}"
                      class="absolute right-0 mr-4 lg:mt-6">
                Edit
            </x-button>
        </div>
        <div class="relative pb-6 p-7 mt-32 lg:mt-16 text-sm">
            <div class="grid gap-4 lg:gap-2">
                <x-item-list label="Nama Lengkap :">{{ $student->nama }}</x-item-list>
                <x-item-list label="NIS :">{{ $student->nis }}</x-item-list>
                <x-item-list
                    label="Jenis Kelamin :">{{ $student->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</x-item-list>
                <x-item-list label="Tempat Lahir :">{{ $student->tempat_lahir }}</x-item-list>
                <x-item-list label="Tanggal Lahir :">{{ $student->tanggal_lahir->format('d F Y') }}</x-item-list>
                <x-item-list label="NISN :">{{ $student->nisn }}</x-item-list>
                <x-item-list label="NIK :">{{ $student->nik }}</x-item-list>
                <x-item-list label="Jalan :">{{ $student->alamat }}</x-item-list>
                <x-item-list label="Alamat :">{{ $student->alamatLengkap() }}</x-item-list>
                <x-item-list label="Agama :">{{ $student->agama->label() }}</x-item-list>
                <x-item-list label="Status Dalam Keluarga :">{{ $student->status_anak->label() }}</x-item-list>
                <x-item-list label="Anak Ke :">{{ $student->anak_ke }}</x-item-list>
                <x-item-list label="Nama Ayah :">{{ $student->ayah }}</x-item-list>
                <x-item-list label="Pekerjaan Ayah :">{{ $student->pekerjaan_ayah->label() }}</x-item-list>
                <x-item-list label="Nama Ibu :">{{ $student->ibu }}</x-item-list>
                <x-item-list label="Pekerjaan Ibu :">{{ $student->pekerjaan_ibu->label() }}</x-item-list>
                <x-item-list label="Wali :">{{ $student->wali }}</x-item-list>
                <x-item-list label="Pekerjaan Wali :">{{ $student->pekerjaan_wali->label() }}</x-item-list>
            </div>
        </div>
    </div>
</x-dashboard-layout>
