@props(['perPage' => ['10', '20', '50', '100']])
<form id="page-option"
    {{ $attributes->twMerge("flex flex-col justify-center gap-2 sm:flex-row sm:justify-between sm:items-center") }}>
    <div class="w-20">
        <x-select name="per_page" id="per_page" @change="document.getElementById('page-option').submit()">
            @foreach($perPage as $value)
                <option
                    {{ request('per_page') === $value ? 'selected' : '' }} value="{{ $value }}">{{ $value }}</option>
            @endforeach
        </x-select>
    </div>
    <div>
        <x-input id="search" aria-labelledby="search" type="search" name="search"
                 placeholder="Search..."
                 @keydown.enter="event.preventDefault(); document.getElementById('page-option').submit()"
                 value="{{ request('search') }}"/>
    </div>
</form>
