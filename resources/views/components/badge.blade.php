@props(['variant' => 'primary'])

@php
    $variantClasses = [
        'primary' => 'border-transparent bg-primary text-primary-foreground hover:bg-primary/80',
        'danger' => 'border-transparent bg-danger text-danger-foreground hover:bg-danger/80',
        'success' => 'border-transparent bg-success text-success-foreground hover:bg-success/80',
        'info' => 'border-transparent bg-info text-info-foreground hover:bg-info/80',
        'warning' => 'border-transparent bg-warning text-warning-foreground hover:bg-warning/80',
        'dark' => 'border-transparent bg-dark text-dark-foreground hover:bg-dark/80',
        'secondary' => 'border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80',
        'outline' => 'text-foreground border',
    ];

    $mergedClasses = "w-fit whitespace-nowrap select-none inline-flex items-center rounded-full border px-2.5 py-1 text-xs transition-colors focus:outline-none focus:ring focus:border-primary/70 focus:ring-ring gap-1 [&_svg]:size-3 font-semibold {$variantClasses[$variant]}";
@endphp

<{{ $attributes->has('href') ? 'a' : 'span' }} {{ $attributes->twMerge(['class' => $mergedClasses]) }}>
{{ $slot }}
</{{ $attributes->has('href') ? 'a' : 'span' }}>
