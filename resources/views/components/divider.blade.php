<div class="inline-flex relative items-center w-full justify-left">
    <hr {{ $attributes->twMerge('w-full h-px my-4 border-muted-foreground') }}>
    <span class="absolute px-3 ms-2 text-muted-foreground bg-background">{{ $slot ?? '' }}</span>
</div>
