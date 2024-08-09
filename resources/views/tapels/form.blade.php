<x-dashboard-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <x-card>
        <x-slot:header>
            <x-slot:title>Tahun Pelajaran</x-slot:title>
            <x-slot:description>{{ $title }}</x-slot:description>
        </x-slot:header>
        <x-slot:content>
            <form method="post" action="{{ $action }}">
                @csrf @method($method)

                <div class="space-y-2">
                    <x-item-list label="Tahun Pelajaran :">
                        <x-select name="tapel" class="w-full">
                            @for($i = date('Y'); $i <= (date('Y') + 10); $i++)
                                <option
                                    {{ $tapel->tapel == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i.'/'.($i+1) }}</option>
                            @endfor
                        </x-select>
                        <x-input-error :messages="$errors->get('tapel')" class="mt-2"/>
                    </x-item-list>

                    <x-item-list label="Semester :">
                        <div class="flex items-center gap-6 my-1.5">
                            <label for="ganjil" class="inline-flex items-center gap-2">
                                <x-radio id="ganjil" name="semester" :checked="$tapel->semester == 1" value="1"/>
                                <span class="text-sm text-muted-foreground">Ganjil</span>
                            </label>
                            <label for="genap" class="inline-flex items-center gap-2">
                                <x-radio id="genap" name="semester" :checked="$tapel->semester == 2" value="2"/>
                                <span class="text-sm text-muted-foreground">Genap</span>
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('semester')"/>
                    </x-item-list>

                    <x-item-list label="Tempat Rapor :">
                        <x-input name="tempat_rapor" :value="$tapel->tempat_rapor"/>
                        <x-input-error :messages="$errors->get('tempat_rapor')"/>
                    </x-item-list>
                    <x-item-list label="Tanggal Rapor :">
                        <x-input type="date" name="tanggal_rapor"
                                 :value="$tapel->tanggal_rapor ? $tapel->tanggal_rapor->format('Y-m-d') : date('Y-m-d')"/>
                        <x-input-error :messages="$errors->get('tanggal_rapor')"/>
                    </x-item-list>
                </div>

                <div class="flex justify-end mt-6">
                    <x-button type="button" variant="secondary" href="{{ route('tapels.index') }}">
                        Cancel
                    </x-button>

                    <x-button class="ms-3" variant="primary">
                        Simpan
                    </x-button>
                </div>
            </form>
        </x-slot:content>
    </x-card>
</x-dashboard-layout>
