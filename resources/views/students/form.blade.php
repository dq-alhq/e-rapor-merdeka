<x-dashboard-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <form x-data='{ student_name: "{{ $student->nama }}", student_nis: "{{$student->nis}}" }'
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
                <img src="{{ asset($student->photo) }}"
                     class="w-full h-full rounded-full" alt="photo"/>
                <x-input-error :messages="$errors->get('photo')" class="mt-2 text-center block mb-4"/>
            </div>
            <div class="lg:mt-6 mt-4 ml-2 text-center lg:text-left">
                <h5 class="text-xl lg:text-lg font-bold leading-none tracking-tight" x-text="student_name"></h5>
                <small
                    class="block mt-1 text-sm font-medium leading-none text-muted-foreground"
                    x-text="student_nis"></small>
            </div>
            <div
                class="absolute mt-16 flex justify-between w-full px-2 lg:w-auto lg:mt-6 lg:right-0 lg:justify-end gap-2">
                <x-button variant="secondary" size="icon" type="button"
                          href="{{ route('students.index') }}">
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
                    <x-input name="nama" x-model="student_name" :value="$student->nama"/>
                    <x-input-error :messages="$errors->get('nama')"/>
                </x-item-list>
                <x-item-list label="NIS :">
                    <x-input name="nis" :value="$student->nis"/>
                    <x-input-error :messages="$errors->get('nis')"/>
                </x-item-list>
                <x-item-list label="Jenis Kelamin :">
                    <div class="flex items-center gap-6">
                        <label for="L" class="inline-flex items-center gap-2">
                            <x-radio id="L" name="gender" value="L" :checked="$student->gender == 'L'"/>
                            <span class="text-sm text-muted-foreground">Laki-laki</span>
                        </label>
                        <label for="P" class="inline-flex items-center gap-2">
                            <x-radio id="P" name="gender" value="P" :checked="$student->gender == 'P'"/>
                            <span class="text-sm text-muted-foreground">Perempuan</span>
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('gender')"/>
                </x-item-list>
                <x-item-list label="Tempat Lahir :">
                    <x-input name="tempat_lahir" :value="$student->tempat_lahir"/>
                    <x-input-error :messages="$errors->get('tempat_lahir')"/>
                </x-item-list>
                <x-item-list label="Tanggal Lahir :">
                    <x-input name="tanggal_lahir" type="date"
                             :value="$student->tanggal_lahir ? $student->tanggal_lahir->format('Y-m-d') : date('Y-m-d')"/>
                    <x-input-error :messages="$errors->get('tanggal_lahir')"/>
                </x-item-list>
                <x-item-list label="NISN :">
                    <x-input name="nisn" :value="$student->nisn"/>
                    <x-input-error :messages="$errors->get('nisn')"/>
                </x-item-list>
                <x-item-list label="NIK :">
                    <x-input name="nik" type="number" :value="$student->nik"/>
                    <x-input-error :messages="$errors->get('nik')"/>
                </x-item-list>
                <x-item-list label="Jalan :">
                    <x-input name="alamat" :value="$student->alamat"/>
                    <x-input-error :messages="$errors->get('alamat')"/>
                </x-item-list>
                <x-item-list label="Alamat :">
                    <x-input-location name="village_id" value="{{ $student->village_id }}"/>
                    <x-input-error :messages="$errors->get('village_id')"/>
                </x-item-list>
                <x-item-list label="No. Telepon :">
                    <x-input name="telepon" :value="$student->telepon"/>
                    <x-input-error :messages="$errors->get('village_id')"/>
                </x-item-list>
                <x-item-list label="Agama">
                    <x-select name="agama">
                        @foreach(\App\Enums\Religion::cases() as $religion)
                            <option
                                {{ $religion == $student->agama ? 'selected' : '' }} value="{{ $religion }}">{{ $religion->label() }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('agama')"/>
                </x-item-list>
                <x-item-list label="Anak Ke / Status">
                    <div class="flex items-center gap-2">
                        <x-input name="anak_ke" :value="$student->anak_ke"/>
                        <x-select name="status_anak">
                            @foreach(\App\Enums\ChildStatus::cases() as $status)
                                <option
                                    {{ $status == $student->status_anak ? 'selected' : '' }} value="{{ $status }}">{{ $status->label() }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <x-input-error :messages="$errors->get('anak_ke')"/>
                    <x-input-error :messages="$errors->get('status_anak')"/>
                </x-item-list>
                <x-item-list label="Ayah / Pekerjaan">
                    <div class="flex items-center gap-2">
                        <x-input name="ayah" :value="$student->ayah"/>
                        <x-select name="pekerjaan_ayah">
                            @foreach(\App\Enums\ParentJob::cases() as $parentJob)
                                <option
                                    {{ $parentJob == $student->pekerjaan_ayah ? 'selected' : '' }} value="{{ $parentJob }}">{{ $parentJob->label() }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <x-input-error :messages="$errors->get('ayah')"/>
                    <x-input-error :messages="$errors->get('pekerjaan_ayah')"/>
                </x-item-list>
                <x-item-list label="Ibu / Pekerjaan">
                    <div class="flex items-center gap-2">
                        <x-input name="ibu" :value="$student->ibu"/>
                        <x-select name="pekerjaan_ibu">
                            @foreach(\App\Enums\ParentJob::cases() as $parentJob)
                                <option
                                    {{ $parentJob == $student->pekerjaan_ibu ? 'selected' : '' }} value="{{ $parentJob }}">{{ $parentJob->label() }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <x-input-error :messages="$errors->get('ibu')"/>
                    <x-input-error :messages="$errors->get('pekerjaan_ibu')"/>
                </x-item-list>
                <x-item-list label="Wali / Pekerjaan">
                    <div class="flex items-center gap-2">
                        <x-input name="wali" :value="$student->wali"/>
                        <x-select name="pekerjaan_wali">
                            @foreach(\App\Enums\ParentJob::cases() as $parentJob)
                                <option
                                    {{ $parentJob == $student->pekerjaan_wali ? 'selected' : '' }} value="{{ $parentJob }}">{{ $parentJob->label() }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <x-input-error :messages="$errors->get('wali')"/>
                    <x-input-error :messages="$errors->get('pekerjaan_wali')"/>
                </x-item-list>
            </div>
        </div>
    </form>
</x-dashboard-layout>
