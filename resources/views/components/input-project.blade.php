@props(['disabled' => false, 'value' => null])
<div class="grid grid-cols-1 lg:grid-cols-3 items-center gap-2 w-full"
     x-data="{ dimensions: [], dimension_id: 0, dimension: '', elements: [], element_id: 0, element: '', subelements: [], subelement_id: 1, subelement: '' }"
     x-init="subelement_id=@js($value); axios.post('/subelement/' + @js($value)).then(response => {subelement = response.data.subelement, dimension = response.data.dimension, element = response.data.element}); axios.post('/dimensions').then(response => dimensions = response.data)">
    <select
        {{ $disabled ? 'disabled' : '' }}
        class="flex h-10 w-full appearance-none transition duration-200 rounded-md border border-input bg-background px-3 py-2 text-sm placeholder:text-muted-foreground focus:outline-none focus:border-primary/70 focus:ring focus:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
        x-model="dimension_id"
        @click="elements=[]; element=''; subelements=[]; subelement_id=0; axios.post('/elements/' + dimension_id).then(response => elements = response.data)"
        @change="elements=[]; element=''; subelements=[]; subelement_id=0; axios.post('/elements/' + dimension_id).then(response => elements = response.data)">
        <template x-for="dimension in dimensions">
            <option :value="dimension.id" :selected="dimension == dimension.deskripsi"
                    x-text="dimension.deskripsi"></option>
        </template>
    </select>
    <template x-if="elements.length > 0 || element != ''">
        <select
            class="flex h-10 w-full transition appearance-none duration-200 rounded-md border border-input bg-background px-3 py-2 text-sm placeholder:text-muted-foreground focus:outline-none focus:border-primary/70 focus:ring focus:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
            x-model="element_id"
            @change="subelements=[]; subelement_id=0;axios.post('/subelements/' + element_id).then(response => subelements = response.data)">
            <template x-if="element != ''">
                <option :value="element_id" selected
                        x-text="element"></option>
            </template>
            <template x-for="element in elements">
                <option :value="element.id"
                        x-text="element.deskripsi"></option>
            </template>
        </select>
    </template>
    <template x-if="subelements.length > 0 || subelement_id > 0">
        <select {{ $attributes }}
                class="flex h-10 w-full transition appearance-none duration-200 rounded-md border border-input bg-background px-3 py-2 text-sm placeholder:text-muted-foreground focus:outline-none focus:border-primary/70 focus:ring focus:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
                x-model="subelement_id">
            <template x-if="subelement_id > 0">
                <option :value="subelement_id" selected x-text="subelement"></option>
            </template>
            <template x-for="subelement in subelements">
                <option :value="subelement.id" x-text="subelement.deskripsi"></option>
            </template>
        </select>
    </template>
</div>
