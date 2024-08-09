@props([
    'variant' => 'primary',
    'size' => 'md',
])

@php
    $variantClasses = [
        'primary' => 'bg-primary text-primary-foreground hover:bg-primary/80 active:bg-primary/90',
        'danger' => 'bg-danger text-danger-foreground hover:bg-danger/80 active:bg-danger/90',
        'success' => 'bg-success text-success-foreground hover:bg-success/80 active:bg-success/90',
        'warning' => 'bg-warning text-warning-foreground hover:bg-warning/80 active:bg-warning/90',
        'info' => 'bg-info text-info-foreground hover:bg-info/80 active:bg-info/90',
        'dark' => 'bg-dark text-dark-foreground hover:bg-dark/80 active:bg-dark/90',
        'secondary' => 'bg-secondary text-secondary-foreground hover:bg-secondary/80 active:bg-secondary/90',
        'outline' =>
            'border bg-transparent text-foreground hover:bg-accent/80 hover:text-accent-foreground active:bg-accent',
        'ghost' => 'hover:bg-accent/90 active:bg-accent hover:text-accent-foreground',
        'link' => 'text-primary underline-offset-4 hover:underline',
    ];

    $sizeClasses = [
        'md' => 'px-4 py-2 text-sm',
        'sm' => 'px-3 py-1.5 text-sm',
        'lg' => 'px-5 py-3 text-lg',
        'icon' => 'w-10 h-10',
    ];

    $mergedClasses = "inline-flex items-center gap-2 justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none disabled:pointer-events-none disabled:opacity-50 [&_svg]:size-4 {$sizeClasses[$size]} {$variantClasses[$variant]}";
@endphp

<{{ $attributes->has('href') ? 'a' : 'button' }} {{ $attributes->twMerge($mergedClasses) }}>
{{ $slot }}
</{{ $attributes->has('href') ? 'a' : 'button' }}>
