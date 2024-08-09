<x-dashboard-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <x-card>
        <x-slot:header>
            <x-slot:title>Ekstrakurikuler</x-slot:title>
            <x-slot:description>{{ $title }}</x-slot:description>
        </x-slot:header>
        <x-slot:content>
            <form method="post" action="{{ $action }}">
                @csrf @method($method)

                <div class="space-y-2">
                    <x-item-list label="Ekstrakurikuler :">
                        <x-input name="nama" :value="$excul->nama"/>
                        <x-input-error :messages="$errors->get('nama')" class="mt-2"/>
                    </x-item-list>
                    <x-item-list label="Kode :">
                        <x-input name="code" :value="$excul->code"/>
                        <x-input-error :messages="$errors->get('code')" class="mt-2"/>
                    </x-item-list>
                </div>

                <div class="flex justify-end mt-6">
                    <x-button type="button" variant="secondary" href="{{ route('exculs.index') }}">
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
