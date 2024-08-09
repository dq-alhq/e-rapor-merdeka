@props(['active'])

@php
    $classes = $active ?? false ? 'text-foreground bg-accent' : 'text-muted-foreground hover:text-foreground';
@endphp

<a
    {{ $attributes->twMerge(
        'px-4 py-2 inline-flex items-center [&_svg]:size-4 w-full gap-x-2 transition duration-200 text-sm font-medium tracking-tight hover:bg-accent rounded-lg',
        $classes,
    ) }}>
    {{ $slot }}
</a>
