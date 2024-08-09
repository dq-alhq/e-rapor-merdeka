<div x-data="{ expanded: false }" class="grid gap-2">
    <div {{ $attributes->twMerge('flex items-center justify-between w-full gap-4 px-3 py-2 text-left border rounded cursor-pointer bg-popover hover:bg-accent focus-visible:bg-accent focus-visible:outline-none') }}
        @click="expanded = ! expanded" :aria-expanded="expanded ? 'true' : 'false'">
        {{ $trigger }}
        <svg class="transition size-4" :class="expanded ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus">
            <path d="M5 12h14" />
            <path d="M12 5v14" />
        </svg>
    </div>
    <div x-collapse x-show="expanded">
        {{ $slot }}
    </div>
</div>
