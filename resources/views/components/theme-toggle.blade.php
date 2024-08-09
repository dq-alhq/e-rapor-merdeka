<x-button {{ $attributes->twMerge('flex-shrink-0') }} type="button" size="icon" variant="outline"
          @click="darkMode=!darkMode">
    <x-lucide-sun class="block size-4 dark:hidden"/>
    <x-lucide-moon class="hidden size-4 dark:block"/>
</x-button>
