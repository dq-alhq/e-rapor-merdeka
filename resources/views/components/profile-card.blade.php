@props(['src' => "images/default.png", 'alt' => 'Default Image', 'href' => '#', 'title' => 'Profile'])
<div {{ $attributes->twMerge("flex items-center max-w-2xl overflow-hidden bg-card border rounded-lg shadow-sm") }}>
    <img src="{{ $src }}" alt="{{ $alt }}"
         class="object-cover size-20 aspect-square rounded"/>
    <div class="p-4">
        <h5 class="font-bold leading-none tracking-tight mb-2">
            {{ $title }}
        </h5>
        {{ $slot }}
    </div>
</div>
