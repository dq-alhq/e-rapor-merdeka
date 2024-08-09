<div class="relative w-full overflow-auto">
    <table {{ $attributes->twMerge('table overflow-auto w-full whitespace-nowrap text-sm') }}>
        {{ $slot }}
    </table>
</div>
