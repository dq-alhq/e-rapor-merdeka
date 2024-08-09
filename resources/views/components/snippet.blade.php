@props(['text'=>''])
<div class="flex items-center justify-between border px-2 rounded-md bg-[#22272e] text-sm">
    <pre><code class="language-php rounded-sm">{{ $text }}</code></pre>
    <div x-data="{
        copyText: '{{ $text }}',
        copyNotification: false,
        copyToClipboard() {
            navigator.clipboard
                ? navigator.clipboard.writeText(this.copyText)
                : (function() { const textarea = document.createElement('textarea'); textarea.value = this.copyText; document.body.appendChild(textarea); textarea.select(); document.execCommand('copy'); document.body.removeChild(textarea); })(this.copyText);
            this.copyNotification = true;
            let that = this;
            setTimeout(function(){
                that.copyNotification = false;
            }, 3000);
        }
    }" class="relative z-20 flex items-center">
        <div x-show="copyNotification" x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-x-2" x-transition:enter-end="opacity-100 translate-x-0"
             x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-x-0"
             x-transition:leave-end="opacity-0 translate-x-2" class="absolute left-0" x-cloak>
            <div
                class="px-3 h-7 -ml-1.5 items-center flex text-xs bg-success border-r border-success -translate-x-full text-success-foreground rounded">
                <span>Copied!</span>
                <div
                    class="absolute right-0 inline-block h-full -mt-px overflow-hidden translate-x-3 -translate-y-2 top-1/2">
                    <div class="w-3 h-3 origin-top-left transform rotate-45 bg-success border border-transparent"></div>
                </div>
            </div>
        </div>
        <x-button @click="copyToClipboard();" variant="ghost" size="icon">
            <x-lucide-clipboard-check class="text-success" x-show="copyNotification"/>
            <x-lucide-copy class="text-muted-foreground" x-show="!copyNotification"/>
        </x-button>
    </div>
</div>
