<div class="flex flex-shrink-0 items-center border-b px-4 h-[60px] lg:px-6">
    <a href="/" class="flex items-center justify-center w-full gap-2 font-semibold">
        <x-lucide-graduation-cap class="size-6 stroke-success"/>
        <span class="text-success">{{ \App\Models\School::latest()->first()->nama }}</span>
    </a>
</div>

<div class="flex h-[calc(100vh-12rem)] overflow-auto py-2 scroll-smooth scroll">
    <nav class="flex flex-col items-start w-full gap-1 px-2 text-sm lg:px-4">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <x-lucide-gauge/>
            Dashboard
        </x-nav-link>
        <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
            <x-lucide-users/>
            Data User
        </x-nav-link>
        <x-divider>Master Data</x-divider>
        <x-nav-link :href="route('school.index')" :active="request()->routeIs('school.*')">
            <x-lucide-graduation-cap/>
            Sekolah
        </x-nav-link>
        <x-nav-link :href="route('teachers.index')" :active="request()->routeIs('teachers.*')">
            <x-lucide-user/>
            Guru
        </x-nav-link>
        <x-nav-link :href="route('students.index')" :active="request()->routeIs('students.*')">
            <x-lucide-users/>
            Siswa
        </x-nav-link>
        <x-nav-link :href="route('tapels.index')" :active="request()->routeIs('tapels.*')">
            <x-lucide-calendar/>
            Tahun Pelajaran
        </x-nav-link>
        <x-nav-link :href="route('classrooms.index')" :active="request()->routeIs('classrooms.*')">
            <x-lucide-blocks/>
            Kelas
        </x-nav-link>
        <x-nav-link :href="route('classmembers.index')" :active="request()->routeIs('classmembers.*')">
            <x-lucide-users-2/>
            Anggota Kelas
        </x-nav-link>
        <x-nav-link :href="route('mapels.index')" :active="request()->routeIs('mapels.*')">
            <x-lucide-book-marked/>
            Mata Pelajaran
        </x-nav-link>
        <x-nav-link :href="route('mappings.index')" :active="request()->routeIs('mapping.*')">
            <x-lucide-book-key/>
            Mapping Mapel
        </x-nav-link>
        <x-nav-link :href="route('exculs.index')" :active="request()->routeIs('exculs.*')">
            <x-lucide-swatch-book/>
            Ekstrakurikuler
        </x-nav-link>
        <x-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.*')">
            <x-lucide-server-cog/>
            Proyek P5
        </x-nav-link>
        <x-divider>Pembelajaran</x-divider>
        <x-nav-link :href="route('lessons.index')" :active="request()->routeIs('lessons.*')">
            <x-lucide-book-open-check/>
            Pembelajaran
        </x-nav-link>
        <x-nav-link :href="route('exculmembers.index')" :active="request()->routeIs('exculmembers.*')">
            <x-lucide-clipboard-pen/>
            Pembelajaran Ekstrakurikuler
        </x-nav-link>
        <x-nav-link :href="route('competences.index')" :active="request()->routeIs('competences.*')">
            <x-lucide-crosshair/>
            Lingkup Materi
        </x-nav-link>
    </nav>
</div>

<div class="mt-auto h-[80px] p-4 space-y-1">
    <x-card class="flex flex-row items-center gap-2 p-2 mb-2 border">
        <div class="p-2 border rounded-full size-10">
            <x-lucide-user-circle class="stroke-1 text-muted-foreground"/>
        </div>
        <div class="flex flex-col gap-0.5">
            <div class="text-xs font-semibold">{{ Auth::user()->name }}</div>
            <div class="text-xs">{{ Auth::user()->role() }}</div>
        </div>
    </x-card>

    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
            <x-lucide-log-out/>
            {{ __('Log Out') }}
        </x-nav-link>
    </form>
</div>
