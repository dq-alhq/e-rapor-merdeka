@props(['name', 'show' => false, 'maxWidth' => '2xl', 'route' => null])

@php
    $maxWidth = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
    ][$maxWidth];
@endphp
<template x-teleport="body">
    <div x-data="{ show: @js($show), route: '#', teacher_id: '' }" x-init="$watch('show', value => { if (value) { document.body.classList.add('overflow-y-hidden'); } else { document.body.classList.remove('overflow-y-hidden'); }
    })"
         @open-modal.window="$event.detail.name == '{{ $name }}' ? show = true : null"
         @close-modal.window="$event.detail.name == '{{ $name }}' ? show = false : null"
         @close.stop="show = false" @keydown.escape.window="show = false" x-show="show"
         class="fixed inset-0 z-50 overflow-y-auto"
         style="display: {{ $show ? 'block' : 'none' }};">
        <div x-show="show" class="fixed inset-0 transition-all transform"
             @click='show=true'
             x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="absolute inset-0 bg-black/90"></div>
        </div>

        <div x-show="show"
             class="relative left-[50%] top-[50%] z-50 grid w-full max-w-lg translate-x-[-50%] translate-y-[-50%] gap-4 border bg-background p-6 shadow-lg duration-200 sm:rounded-lg"
             x-transition:enter="ease-out duration-200" x-transition:enter-start="opacity-0 sm:scale-95"
             x-transition:enter-end="opacity-100 sm:scale-100" x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 sm:scale-100" x-transition:leave-end="opacity-0 sm:scale-95">
            <form :action="route" method="POST" @open-modal.window="route = $event.detail.route">
                @csrf @method('PATCH')
                <h2 class="text-lg font-medium">
                    Pilih Guru
                </h2>
                <p class="mt-1 text-sm text-muted-foreground">
                    Silakan pilih guru yang bersangkutan
                </p>

                <div class="mt-4">
                    <x-select id="teacher_id" class="w-full" name="teacher_id"
                              @open-modal.window="teacher_id = $event.detail.teacher_id">
                        <option disabled value="">Pilih Guru</option>
                        @foreach (\App\Models\Teacher::query()->select('id','nama')->get() as $teacher)
                            <option :selected="teacher_id == {{ $teacher->id }}"
                                    value="{{ $teacher->id }}">{{ $teacher->nama }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('teacher_id')"/>
                </div>

                <div class="flex justify-end mt-6">
                    <x-button type="button" variant="secondary" @click="$dispatch('close')">
                        Cancel
                    </x-button>

                    <x-button class="ms-3">
                        Simpan
                    </x-button>
                </div>
            </form>
        </div>
    </div>

</template>
