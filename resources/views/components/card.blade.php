<div {{ $attributes->twMerge('rounded-lg border bg-card text-card-foreground shadow-sm') }}>
    @isset($header)
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            @isset($title)
                <div class="flex flex-col space-y-1.5 p-6">
                    <h3 class="text-2xl font-semibold leading-none tracking-tight">
                        {{ $title }}
                    </h3>
                @endisset
                @isset($description)
                    <div class="text-sm text-muted-foreground">
                        {{ $description }}
                    </div>
                </div>
            @endisset
            @isset($actions)
                <div class="flex items-center p-6 pt-0">
                    {{ $actions }}
                </div>
            @endisset
        </div>
    @endisset


    @isset($content)
        <div
            class="p-6 pt-0 [&:has(.table)]:p-0 [&_th:first-child]:pl-6 [&_td:first-child]:pl-6 [&_th:last-child]:pr-6 [&_td:last-child]:pr-6">
            {{ $content }}
        </div>
    @else
        {{ $slot }}
    @endisset

    @isset($footer)
        <div class="flex items-center p-6 pt-0">
            {{ $footer }}
        </div>
    @endisset
</div>
