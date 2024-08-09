@props(['name', 'show' => false, 'maxWidth' => '2xl'])

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

    <div x-data="{
        show: @js($show),
        focusables() {
            // All focusable element types...
            let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'
            return [...$el.querySelectorAll(selector)]
                // All non-disabled elements...
                .filter(el => !el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) - 1 },
    }" x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('overflow-y-hidden');
            {{ $attributes->has('focusable') ? 'setTimeout(() => firstFocusable().focus(), 100)' : '' }}
        } else {
            document.body.classList.remove('overflow-y-hidden');
        }
    })"
         x-on:open-modal.window="$event.detail == '{{ $name }}' ? show = true : null"
         x-on:close-modal.window="$event.detail == '{{ $name }}' ? show = false : null"
         x-on:close.stop="show = false" @keydown.escape.window="show = false"
         @keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
         @keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" class="fixed inset-0 z-50 overflow-y-auto"
         style="display: {{ $show ? 'block' : 'none' }};">
        <div x-show="show" class="fixed inset-0 transition-all transform"
             {{ $attributes->has('alert') ? '@click=show=true' : '@click=show=false' }}
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
            {{ $slot }}
            <x-lucide-x
                class="{{ $attributes->has('alert') ? 'hidden' : 'absolute' }} transition-opacity rounded cursor-pointer size-4 right-4 top-4 opacity-70 ring-offset-background hover:opacity-100 active:outline-none active:ring-2 active:ring-ring active:ring-offset-2 disabled:pointer-events-none"
                x-on:mouseup="show = false"/>
        </div>
    </div>

</template>
