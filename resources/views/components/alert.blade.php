@props(['title' => 'Alert', 'description' => 'Alert Description', 'type' => 'outline'])
@php
    switch ($type) {
        case 'danger':
            $classes = 'text-danger';
            $border = 'border-danger';
            break;
        case 'success':
            $classes = 'text-success';
            $border = 'border-success';
            break;
        case 'warning':
            $classes = 'text-warning';
            $border = 'border-warning';
            break;
        case 'info':
            $classes = 'text-primary';
            $border = 'border-primary';
            break;
        case 'outline':
        default:
            $classes = 'text-card-foreground';
            $border = 'border-border';
            break;
    }
@endphp

<div
    class="relative w-full rounded-lg border {{ $border }} bg-card p-3 [&>svg]:absolute [&>svg]:{{ $classes }} [&>svg]:left-4 [&>svg]:top-4 [&>svg+div]:translate-y-[-3px] [&:has(svg)]:pl-11 {{ $classes }}">
    <x-lucide-info class="size-4"/>
    <h5 class="mb-1 font-medium leading-none tracking-tight">{{ $title }}</h5>
    <div class="text-sm opacity-70">{{ $description }}</div>
</div>

