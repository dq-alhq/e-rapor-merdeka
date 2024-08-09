<div :class="imageUrl && 'border-primary'"
     x-init="imageUrl= ''"
     x-data="{imageUrl: '',
            selectFile(event) {
                const file = event.target.files[0]
                const reader = new FileReader()
                if (event.target.files.length < 1) {
                    return
                }
                reader.readAsDataURL(file)
                reader.onload = () => (this.imageUrl = reader.result)
            }}"
     class="flex justify-center items-center border-dashed rounded-md w-full h-full border-2 overflow-y-hidden">
    <template x-if="!imageUrl">
        <label for="post_image"
               class="space-y-1 text-xs text-muted-foreground cursor-pointer bg-background/50 backdrop-blur-[1px] text-center px-2 pt-5 pb-6 w-full">
            <svg aria-hidden="true" class="mx-auto size-10" fill="none" stroke="currentColor"
                 viewBox="0 0 48 48">
                <path
                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
            </svg>
            PNG, JPG, JPEG up to 2MB
        </label>
    </template>

    <template x-if="imageUrl">
        <div class="object-contain group relative">
            <div
                class="hidden group-hover:flex absolute justify-center items-center m-auto uppercase rounded-md bg-transparent h-full w-full hover:bg-foreground/50 hover:backdrop-blur-sm hover:cursor-pointer"
                @click="imageUrl = ''">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="size-10 text-white">
                    <path d="M3 6h18"/>
                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                    <line x1="10" x2="10" y1="11" y2="17"/>
                    <line x1="14" x2="14" y1="11" y2="17"/>
                </svg>
            </div>
            <img :src="imageUrl" alt="" :class="{ 'hidden': !imageUrl }">
        </div>
    </template>
    <input class="sr-only" id="post_image" type="file" accept="image/*" @change="selectFile" {{ $attributes }}>
    <input id="post_header_delete" name="post_header_delete" type="hidden"/>
</div>
