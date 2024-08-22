<x-dashboard-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-card>
        <x-slot:header>
            <x-slot:title>{{$title}} {{ $mapel->nama }}</x-slot:title>
            <x-slot:description>Untuk Tingkat {{ $grade->label() }}</x-slot:description>
        </x-slot:header>
        <x-slot:content>
            <form method="post" action="{{ $action }}">
                @csrf @method($method)
                <input type="hidden" name="mapel_id" value="{{ $mapel->id }}">
                <input type="hidden" name="tingkat" value="{{ $grade->value }}">
                <div class="space-y-2">
                    <x-item-list label="Semester :">
                        <div class="flex items-center gap-6 my-1.5">
                            <label for="ganjil" class="inline-flex items-center gap-2">
                                <x-radio id="ganjil" name="semester" :checked="$competence->semester == 1" value="1"/>
                                <span class="text-sm text-muted-foreground">Ganjil</span>
                            </label>
                            <label for="genap" class="inline-flex items-center gap-2">
                                <x-radio id="genap" name="semester" :checked="$competence->semester == 2" value="2"/>
                                <span class="text-sm text-muted-foreground">Genap</span>
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('semester')"/>
                    </x-item-list>
                    <x-item-list label="Kode :">
                        <x-input name="code" :value="$competence->code"/>
                        <x-input-error :messages="$errors->get('code')" class="mt-2"/>
                    </x-item-list>
                    <x-item-list label="Materi :">
                        <x-input name="materi" :value="$competence->materi"/>
                        <x-input-error :messages="$errors->get('materi')" class="mt-2"/>
                    </x-item-list>
                </div>

                <div class="flex justify-end mt-6">
                    <x-button type="button" variant="secondary" href="{{ route('competences.index') }}">
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
