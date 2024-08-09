<x-dashboard-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <x-card>
        <x-slot:header>
            <x-slot:title>Kelas</x-slot:title>
            <x-slot:description>{{ $title }}</x-slot:description>
        </x-slot:header>
        <x-slot:content>
            <form method="post" action="{{ $action }}">
                @csrf @method($method)

                <div class="space-y-2">
                    <x-item-list label="Tahun Pelajaran :">
                        <x-select name="tapel_id" class="w-full" disabled>
                            <option value="{{ session('tapel')->id }}">{{ session('tapel')->tapel }}
                                /{{ session('tapel')->tapel + 1 }}
                                - {{ session('tapel')->semester == 1 ? 'Ganjil' : 'Genap' }}</option>
                        </x-select>
                        <x-input-error :messages="$errors->get('tapel_id')" class="mt-2"/>
                    </x-item-list>

                    <x-item-list label="Tingkat :">
                        <x-select name="tingkat" class="w-full">
                            @foreach($pilihan_tingkat as $tingkat)
                                <option
                                    {{ $tingkat == $classroom->tingkat ? 'selected' : '' }} value="{{ $tingkat }}">{{ $tingkat->name }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error :messages="$errors->get('tingkat')" class="mt-2"/>
                    </x-item-list>

                    <x-item-list label="Rombel :">
                        <x-input name="rombel" :value="$classroom->rombel"/>
                        <x-input-error :messages="$errors->get('rombel')"/>
                    </x-item-list>

                    <x-item-list label="Wali Kelas :">
                        <x-select name="wali_id" class="w-full">
                            @foreach(\App\Models\Teacher::query()->select('id','nama')->get() as $teacher)
                                <option
                                    {{ $classroom->wali_id == $teacher->id ? 'selected' : '' }} value="{{ $teacher->id }}">{{ $teacher->nama }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error :messages="$errors->get('wali_id')"/>
                    </x-item-list>
                </div>

                <div class="flex justify-end mt-6">
                    <x-button type="button" variant="secondary" href="{{ route('classrooms.index') }}">
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
