@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {{ $attributes->twMerge('flex h-10 w-full appearance-none transition duration-200 rounded-md border border-input bg-background px-3 py-2 text-sm placeholder:text-muted-foreground focus:outline-none focus:border-primary/70 focus:ring focus:ring-ring disabled:cursor-not-allowed disabled:opacity-50') }}>
    {{ $slot }}
</select>
