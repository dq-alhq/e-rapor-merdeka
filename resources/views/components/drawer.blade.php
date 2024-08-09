@props(['name', 'show' => false, 'side' => 'left'])

@php
    switch ($side) {
        case 'left':
            $slideOver = 'left-0 inset-y-0 w-screen max-w-xs h-full';
            $transitionStart = '-translate-x-full';
            $transitionEnd = 'translate-x-0';
            break;
        case 'right':
            $slideOver = 'right-0 inset-y-0 w-screen max-w-xs h-full';
            $transitionStart = 'translate-x-full';
            $transitionEnd = 'translate-x-0';
            break;
        case 'bottom':
            $slideOver = 'bottom-0 inset-x-0 min-h-96 w-full';
            $transitionStart = 'translate-y-full';
            $transitionEnd = 'translate-y-0';
            break;
        case 'top':
            $slideOver = 'top-0 inset-x-0 min-h-96 w-full';
            $transitionStart = '-translate-y-full';
            $transitionEnd = 'translate-y-0';
            break;
    }
@endphp
<div {{ $attributes->twMerge('fixed inset-0 z-50 overflow-auto') }} x-data="{
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
        document.body.classList.add('overflow-hidden');
        {{ $attributes->has('focusable') ? 'setTimeout(() => firstFocusable().focus(), 100)' : '' }}
    } else {
        document.body.classList.remove('overflow-hidden');
    }
})"
     x-on:open-drawer.window="$event.detail == '{{ $name }}' ? show = true : null"
     x-on:close-drawer.window="$event.detail == '{{ $name }}' ? show = false : null" x-on:close.stop="show = false"
     @keydown.escape.window="show = false" @keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
     @keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show"
     style="display: {{ $show ? 'block' : 'none' }};">
    <div x-show="show" class="fixed inset-0 transition-all transform" @click="show=false"
         x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-black/90" x-transition.opacity.duration.600ms></div>
    </div>

    <div x-show="show"
         class="fixed {{ $slideOver }} overflow-auto flex flex-col gap-2 duration-200 border shadow-lg bg-background sm:rounded-lg"
         x-transition:enter="transform transition ease-in-out duration-300 sm:duration-400"
         x-transition:enter-start="{{ $transitionStart }}" x-transition:enter-end="{{ $transitionEnd }}"
         x-transition:leave="transform transition ease-in-out duration-300 sm:duration-400"
         x-transition:leave-start="{{ $transitionEnd }}" x-transition:leave-end="{{ $transitionStart }}">
        {{ $slot }}
        <x-lucide-x
            class="{{ $side == 'left' || $side == 'right' ? 'absolute' : 'hidden' }} transition-opacity rounded cursor-pointer size-4 opacity-70 ring-offset-background hover:opacity-100 active:outline-none active:ring-2 active:ring-ring active:ring-offset-2 disabled:pointer-events-none right-4 top-4"
            x-on:mouseup="show = false"/>
    </div>
</div>
