<x-dashboard-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <x-card>
        <x-slot:header>
            <x-slot:title>Projeye P5</x-slot:title>
            <x-slot:description>{{ $title }}</x-slot:description>
        </x-slot:header>
        <x-slot:content>
            <form method="post" action="{{ $action }}">
                @csrf @method($method)

                <div class="space-y-2">
                    <x-item-list label="Tema :">
                        <x-select class="w-full" name="tema">
                            @foreach(\App\Enums\ProjectTheme::cases() as $theme)
                                <option {{ $theme == $project->tema ? 'selected' : '' }}
                                        value="{{ $theme }}">{{ $theme->label() }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error :messages="$errors->get('tema')" class="mt-2"/>
                    </x-item-list>
                    <x-item-list label="Kegiatan :">
                        <x-input name="kegiatan" :value="$project->kegiatan"/>
                        <x-input-error :messages="$errors->get('kegiatan')" class="mt-2"/>
                    </x-item-list>
                    <x-item-list label="Deskripsi :">
                        <x-textarea name="deskripsi" :value="$project->deskripsi"/>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2"/>
                    </x-item-list>
                    <x-item-list label="Sub Element 1 :">
                        <x-input-project name="subelement_1" value="{{ $project->subelement_1 ?? 1 }}"/>
                        <x-input-error :messages="$errors->get('subelement_1')" class="mt-2"/>
                    </x-item-list>
                    <x-item-list label="Sub Element 2 :">
                        <x-input-project name="subelement_2" value="{{ $project->subelement_2 ?? 1 }}"/>
                        <x-input-error :messages="$errors->get('subelement_2')" class="mt-2"/>
                    </x-item-list>
                    <x-item-list label="Sub Element 3 :">
                        <x-input-project name="subelement_3" value="{{ $project->subelement_3 ?? 1 }}"/>
                        <x-input-error :messages="$errors->get('subelement_3')" class="mt-2"/>
                    </x-item-list>
                </div>

                <div class="flex justify-end mt-6">
                    <x-button type="button" variant="secondary" href="{{ route('projects.index') }}">
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
