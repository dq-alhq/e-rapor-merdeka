<x-dashboard-layout>
    <x-slot name="title">Dashboard</x-slot>
    <div class="container my-4 space-y-6">
        <x-alert>
            <x-slot name="title">{{ \App\Models\School::latest()->first()->nama }}</x-slot>
            <x-slot name="description">Tahun Pelajaran
                {{ session('tapel')->tapel }}/{{ session('tapel')->tapel + 1 }} Semester
                {{ session('tapel')->semester == 1 ? 'Ganjil' : 'Genap' }}</x-slot>
        </x-alert>
        <div class="grid gap-6 sm:grid-cols-2 2xl:grid-cols-4">
            <x-card class="p-4">
                <div class="flex flex-row gap-4">
                    <div class="w-20 h-full p-5 rounded text-primary-foreground bg-primary">
                        <x-lucide-user />
                    </div>
                    <div class="flex flex-col">
                        <h4 class="text-lg font-semibold">Jumlah Guru</h4>
                        <div class="font-bold xl:text-2xl">
                            {{ \App\Models\Teacher::count() }}
                        </div>
                    </div>
                </div>
            </x-card>
            <x-card class="p-4">
                <div class="flex flex-row gap-4">
                    <div class="w-20 h-full p-5 rounded text-success-foreground bg-success">
                        <x-lucide-users />
                    </div>
                    <div class="flex flex-col">
                        <h4 class="text-lg font-semibold">Jumlah Siswa</h4>
                        <div class="font-bold xl:text-2xl">
                            {{ \App\Models\Student::count() }}
                        </div>
                    </div>
                </div>
            </x-card>
            <x-card class="p-4">
                <div class="flex flex-row gap-4">
                    <div class="w-20 h-full p-5 rounded text-danger-foreground bg-danger">
                        <x-lucide-group />
                    </div>
                    <div class="flex flex-col">
                        <h4 class="text-lg font-semibold">Jumlah Kelas</h4>
                        <div class="font-bold xl:text-2xl">
                            {{ \App\Models\Classroom::whereTapelId(session('tapel')->id)->count() }}
                        </div>
                    </div>
                </div>
            </x-card>
            <x-card class="p-4">
                <div class="flex flex-row gap-4">
                    <div class="w-20 h-full p-5 rounded text-warning-foreground bg-warning">
                        <x-lucide-book-marked />
                    </div>
                    <div class="flex flex-col">
                        <h4 class="text-lg font-semibold">Jumlah Mapel</h4>
                        <div class="font-bold xl:text-2xl">
                            {{ \App\Models\Mapel::count() }}
                        </div>
                    </div>
                </div>
            </x-card>
        </div>

    </div>
</x-dashboard-layout>
