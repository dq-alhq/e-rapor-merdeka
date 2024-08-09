<label {{ $attributes->twMerge("grid lg:grid-cols-4 gap-2 items-center") }}>
    <div class="lg:col-span-1 text-muted-foreground">{{ $label ?? '' }}</div>
    <div class="lg:col-span-3 grid gap-1">{{ $slot ?? '' }}</div>
</label>
