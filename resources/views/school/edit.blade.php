<x-dashboard-layout>
    <x-slot name="title">Edit Data Sekolah</x-slot>
    <form x-data='{ school_name: "{{ $school->nama }}", school_address: "{{$school->alamat}}" }'
          action="{{ route('school.update', $school) }}"
          method="POST" enctype="multipart/form-data"
          class="relative bg-card overflow-hidden text-card-foreground border rounded-lg shadow-sm">
        @csrf @method('PUT')
        <img src="https://cdn.devdojo.com/images/august2023/wallpaper.jpeg"
             class="relative z-20 object-cover w-full h-32" alt="cover"/>
        <div
            class="absolute top-0 z-50 flex flex-col lg:flex-row items-center w-full -mt-6 lg:-mt-2 translate-y-24 px-7 -translate-x-0">
            <div class="w-28 h-28 rounded-full flex-shrink-0 group">
                <div class="absolute size-28 transition">
                    <x-image-upload name="logo"/>
                </div>
                <img src="{{ asset($school->logo) }}"
                     class="w-full h-full rounded-full" alt="logo"/>
                <x-input-error :messages="$errors->get('logo')" class="mt-2 text-center block mb-4"/>
            </div>
            <div class="lg:mt-6 mt-4 ml-2 text-center lg:text-left">
                <h5 class="text-xl lg:text-lg font-bold leading-none tracking-tight" x-text="school_name"></h5>
                <small
                    class="block mt-1 text-sm font-medium leading-none text-muted-foreground"
                    x-text="school_address"></small>
            </div>
            <x-button variant="success" type="submit" class="absolute right-0 mr-4 lg:mt-6">
                Simpan
            </x-button>
        </div>
        <div class="relative pb-6 p-7 mt-28 lg:mt-20 text-sm">
            <div class="grid gap-4 lg:gap-2">
                <x-item-list label="Nama Sekolah :">
                    <x-input x-model="school_name" name="nama" :value="$school->nama"/>
                    <x-input-error :messages="$errors->get('nama')"/>
                </x-item-list>
                <x-item-list label="Jenjang / Fase :">
                    <x-select class="w-full" name="jenjang">
                        @foreach(\App\Enums\Level::cases() as $level)
                            <option {{ $level == $school->jenjang ? 'selected' : '' }}
                                    value="{{ $level }}">{{ $level->label() }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('jenjang')"/>
                </x-item-list>
                <x-item-list label="Kepala Sekolah :">
                    <x-select class="w-full" name="kepsek_id">
                        @foreach(\App\Models\Teacher::query()->select('id','nama')->get() as $teacher)
                            <option {{ $teacher->id == $school->kepsek_id ? 'selected' : '' }}
                                    value="{{ $teacher->id }}">{{ $teacher->nama }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('kepsek_id')"/>
                </x-item-list>
                <x-item-list label="NPSN :">
                    <x-input name="npsn" :value="$school->npsn"/>
                    <x-input-error :messages="$errors->get('npsn')"/>
                </x-item-list>
                <x-item-list label="NSS/NIS/NDS :">
                    <div class="flex items-start w-full gap-2">
                        <div class="grid w-full gap-1">
                            <x-input name="nss" :value="$school->nss"/>
                            <x-input-error :messages="$errors->get('nss')"/>
                        </div>
                        <div class="grid w-full gap-1">
                            <x-input name="nis" :value="$school->nis"/>
                            <x-input-error :messages="$errors->get('nis')"/>
                        </div>
                        <div class="grid w-full gap-1">
                            <x-input name="nds" :value="$school->nds"/>
                            <x-input-error :messages="$errors->get('nds')"/>
                        </div>
                    </div>
                </x-item-list>
                <x-item-list label="Alamat :">
                    <x-input-location name="village_id" value="{{ $school->village_id }}"/>
                    <x-input-error :messages="$errors->get('village_id')"/>
                </x-item-list>
                <x-item-list label="Jalan :">
                    <x-input x-model="school_address" name="alamat" :value="$school->alamat"/>
                    <x-input-error :messages="$errors->get('alamat')"/>
                </x-item-list>
                <x-item-list label="Kode Pos :">
                    <x-input name="kode_pos" :value="$school->kode_pos"/>
                </x-item-list>
                <x-item-list label="Telepon :">
                    <x-input name="telepon" :value="$school->telepon"/>
                </x-item-list>
            </div>
        </div>
    </form>
</x-dashboard-layout>
