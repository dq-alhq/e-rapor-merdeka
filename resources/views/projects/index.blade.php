<x-dashboard-layout>
    <x-slot name="title">Data Proyek P5</x-slot>
    <x-card>
        <x-slot:header>
            <x-slot:title>Proyek P5</x-slot:title>
            <x-slot:description>Data proyek P5 pada tahun pelajaran {{ session('tapel')->nama() }}</x-slot:description>
            <x-slot:actions>
                <x-button href="{{ route('projects.create') }}">Tambah Proyek P5</x-button>
            </x-slot:actions>
        </x-slot:header>
        <x-slot:content>
            <div class="grid gap-6 p-6">
                @foreach($projects as $project)
                    <x-card class="overflow-auto">
                        <x-slot:header>
                            <x-slot:title>
                                <x-dropdown class="w-48 font-normal" align="top">
                                    <x-slot:trigger>
                                        {{ $project->kegiatan }}
                                    </x-slot:trigger>
                                    <x-slot:content>
                                        <x-dropdown.link :href="route('projects.show', $project)">
                                            <x-lucide-eye/>
                                            Lihat
                                        </x-dropdown.link>
                                        <x-dropdown.link :href="route('projects.edit', $project)">
                                            <x-lucide-edit/>
                                            Edit
                                        </x-dropdown.link>
                                        <x-dropdown.link x-data=""
                                                         @click.prevent="$dispatch('open-modal', {name: 'confirm-delete', title: '{{ $project->kegiatan }}', route: '{{ route('projects.destroy', $project) }}'})"
                                        >
                                            <x-lucide-trash/>
                                            Hapus
                                        </x-dropdown.link>
                                    </x-slot:content>
                                </x-dropdown>
                            </x-slot:title>
                            <x-slot:description>{{ $project->deskripsi }}</x-slot:description>
                            <x-slot:actions>
                                <x-badge>{{ $project->tema->label() }}</x-badge>
                            </x-slot:actions>
                        </x-slot:header>
                        <x-slot:content>
                            <x-table>
                                <x-table.header>
                                    <x-table.head>#</x-table.head>
                                    <x-table.head>Sub-Elemen</x-table.head>
                                    <x-table.head>Elemen</x-table.head>
                                    <x-table.head>Dimensi</x-table.head>
                                </x-table.header>
                                <x-table.body>
                                    <x-table.row>
                                        <x-table.cell>1</x-table.cell>
                                        <x-table.cell>{{ $project->sub1->deskripsi }}</x-table.cell>
                                        <x-table.cell>{{ $project->sub1->element->deskripsi }}</x-table.cell>
                                        <x-table.cell>{{ $project->sub1->element->dimension->deskripsi }}</x-table.cell>
                                    </x-table.row>
                                    <x-table.row>
                                        <x-table.cell>2</x-table.cell>
                                        <x-table.cell>{{ $project->sub2->deskripsi }}</x-table.cell>
                                        <x-table.cell>{{ $project->sub2->element->deskripsi }}</x-table.cell>
                                        <x-table.cell>{{ $project->sub2->element->dimension->deskripsi }}</x-table.cell>
                                    </x-table.row>
                                    <x-table.row>
                                        <x-table.cell>3</x-table.cell>
                                        <x-table.cell>{{ $project->sub3->deskripsi }}</x-table.cell>
                                        <x-table.cell>{{ $project->sub3->element->deskripsi }}</x-table.cell>
                                        <x-table.cell>{{ $project->sub3->element->dimension->deskripsi }}</x-table.cell>
                                    </x-table.row>
                                </x-table.body>
                            </x-table>
                        </x-slot:content>
                    </x-card>
                @endforeach
            </div>
        </x-slot:content>
    </x-card>
    <div class="py-8">
        {{ $projects->links() }}
    </div>
    <x-delete-confirm name="confirm-delete"/>
</x-dashboard-layout>
