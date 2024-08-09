@props(['side' => 'bottom', 'text' => 'It is a tooltip'])

@php
    switch ($side) {
        case 'top':
            $position = '-top-8 left-1/2 -translate-x-1/2';
            break;
        case 'left':
            $position = 'top-1/2 right-full -translate-y-1/2 mr-2';
            break;
        case 'right':
            $position = 'top-1/2 left-full -translate-y-1/2 ml-2';
            break;
        case 'bottom':
        default:
            $position = '-bottom-8 left-1/2 -translate-x-1/2';
            break;
    }
@endphp

<div x-data="{ show: false }" class="relative w-fit">
    <div class="peer" @mouseenter="show = true" @mouseleave="show = false">
        {{ $slot }}
    </div>
    <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" x-show="show"
        class="absolute {{ $position }} w-fit z-50 px-2 py-1 text-sm text-center text-popover bg-foreground transition-all ease-in-out rounded-md whitespace-nowrap"
        role="tooltip">
        {{ $text }}
    </div>
</div>
