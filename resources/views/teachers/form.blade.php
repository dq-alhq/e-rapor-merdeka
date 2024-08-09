<x-dashboard-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <form x-data='{ teacher_name: "{{ $teacher->nama }}", teacher_nuptk: "{{$teacher->nuptk}}" }'
          action="{{ $action }}" method="POST" enctype="multipart/form-data"
          class="relative bg-card overflow-hidden text-card-foreground border rounded-lg shadow-sm">
        @csrf @method($method)
        <img src="https://cdn.devdojo.com/images/august2023/wallpaper.jpeg"
             class="relative z-20 object-cover w-full h-32" alt="cover"/>
        <div
            class="absolute top-0 z-20 flex flex-col lg:flex-row items-center w-full -mt-6 lg:-mt-2 translate-y-24 px-7 -translate-x-0">
            <div class="w-28 h-28 rounded-full flex-shrink-0 group">
                <div class="absolute size-28 transition">
                    <x-image-upload name="photo"/>
                </div>
                <img src="{{ asset($teacher->photo) }}"
                     class="w-full h-full rounded-full" alt="photo"/>
                <x-input-error :messages="$errors->get('photo')" class="mt-2 text-center block mb-4"/>
            </div>
            <div class="lg:mt-6 mt-4 ml-2 text-center lg:text-left">
                <h5 class="text-xl lg:text-lg font-bold leading-none tracking-tight" x-text="teacher_name"></h5>
                <small
                    class="block mt-1 text-sm font-medium leading-none text-muted-foreground"
                    x-text="teacher_nuptk"></small>
            </div>
            <div class="absolute mt-16 flex justify-between w-full px-2 lg:mt-6 lg:right-0 lg:justify-end gap-2">
                <x-button variant="secondary" size="icon" type="button"
                          href="{{ url()->previous() ?? route('teachers.index') }}">
                    <x-lucide-arrow-left/>
                </x-button>
                <x-button variant="success" type="submit">
                    Simpan
                </x-button>
            </div>
        </div>
        <div class="relative pb-6 p-7 mt-28 lg:mt-20 text-sm">
            <div class="grid gap-4 lg:gap-2">
                <x-item-list label="Nama Lengkap :">
                    <x-input name="nama" x-model="teacher_name" :value="$teacher->nama"/>
                    <x-input-error :messages="$errors->get('nama')"/>
                </x-item-list>
                <x-item-list label="NIP :">
                    <x-input name="nip" :value="$teacher->nip"/>
                    <x-input-error :messages="$errors->get('nip')"/>
                </x-item-list>
                <x-item-list label="Jenis Kelamin :">
                    <div class="flex items-center gap-6">
                        <label for="L" class="inline-flex items-center gap-2">
                            <x-radio id="L" name="gender" value="L" :checked="$teacher->gender == 'L'"/>
                            <span class="text-sm text-muted-foreground">Laki-laki</span>
                        </label>
                        <label for="P" class="inline-flex items-center gap-2">
                            <x-radio id="P" name="gender" value="P" :checked="$teacher->gender == 'P'"/>
                            <span class="text-sm text-muted-foreground">Perempuan</span>
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('gender')"/>
                </x-item-list>
                <x-item-list label="Tempat Lahir :">
                    <x-input name="tempat_lahir" :value="$teacher->tempat_lahir"/>
                    <x-input-error :messages="$errors->get('tempat_lahir')"/>
                </x-item-list>
                <x-item-list label="Tanggal Lahir :">
                    <x-input name="tanggal_lahir" type="date"
                             :value="$teacher->tanggal_lahir ? $teacher->tanggal_lahir->format('Y-m-d') : date('Y-m-d')"/>
                    <x-input-error :messages="$errors->get('tanggal_lahir')"/>
                </x-item-list>
                <x-item-list label="NUPTK :">
                    <x-input x-model="teacher_nuptk" name="nuptk" :value="$teacher->nuptk"/>
                    <x-input-error :messages="$errors->get('nuptk')"/>
                </x-item-list>
                <x-item-list label="NIK :">
                    <x-input name="nik" type="number" :value="$teacher->nik"/>
                    <x-input-error :messages="$errors->get('nik')"/>
                </x-item-list>
                <x-item-list label="Alamat :">
                    <x-input-location name="village_id" value="{{ $teacher->village_id }}"/>
                </x-item-list>
                <x-item-list label="Jalan :">
                    <x-input name="alamat" :value="$teacher->alamat"/>
                </x-item-list>
            </div>
        </div>
    </form>
</x-dashboard-layout>
