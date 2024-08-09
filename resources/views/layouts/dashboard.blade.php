@extends('layouts.base', ['title' => $title ?? null])
@section('content')
    <div class="grid min-h-screen w-full md:grid-cols-[280px_1fr]">

        <!-- Responsive Sidebar (Drawer) -->
        <x-drawer name="navigation" class="md:hidden z-[999]">
            <x-sidebar/>
        </x-drawer>

        <!-- Sidebar -->
        <div class="sticky top-0 hidden max-h-screen overflow-auto border-r md:block">
            <x-sidebar/>
        </div>
        <div class="flex flex-col w-full overflow-auto">
            <header class="flex container items-center gap-2 border-b bg-background h-[60px]">
                <x-button x-data="" x-on:click.prevent="$dispatch('open-drawer', 'navigation')" variant="outline"
                          size="icon" class="inline-flex border-border md:hidden">
                    <x-lucide-menu class="w-6 h-6"/>
                </x-button>
                <div class="pl-2 mr-auto text-xl font-semibold border-l-2 md:border-none md:pl-4">
                    @isset($title)
                        <h3>{{ $title }}</h3>
                    @endisset
                </div>
                <x-theme-toggle/>
                <x-dropdown class="w-48" align="right">
                    <x-slot name="trigger">
                        <div class="p-2 border rounded-full size-10">
                            <x-lucide-user-circle class="stroke-1 text-muted-foreground"/>
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Profile -->
                        <x-dropdown.label>
                            <span class="text-xs font-semibold">{{ Auth::user()->name }}</span>
                            <span class="text-xs">{{ Auth::user()->role() }}</span>
                        </x-dropdown.label>
                        <hr/>
                        <x-dropdown.link :href="route('profile.edit')">
                            <x-lucide-settings-2 class="mr-2"/>
                            Profil
                        </x-dropdown.link>
                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                            @csrf
                            <x-dropdown.link x-data=""
                                             @click.prevent="document.getElementById('logout-form').submit();">
                                <x-lucide-log-out class="mr-2"/>
                                Log Out
                            </x-dropdown.link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </header>
            <main class="container py-4 ">
                {{ $slot }}
            </main>
        </div>
    </div>
@endsection
