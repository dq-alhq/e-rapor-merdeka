@props(['disabled' => false, 'value' => null])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->twMerge(
    'flex min-h-[60px] w-full transition duration-200 rounded-md border border-input bg-background px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:border-primary/70 focus-visible:ring focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50',
) !!}>{{ $value ?? $slot }}</textarea>
