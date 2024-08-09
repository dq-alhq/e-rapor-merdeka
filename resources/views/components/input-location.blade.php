@props(['disabled' => false, 'value' => null])
<div class="grid grid-cols-2 lg:grid-cols-4 items-center gap-2 w-full"
     x-data="{ provinces: [], province_id: 0, province_name: '', regencies: [], regency_id: 0, regency_name: '', districts: [], district_id: 0, district_name: '', villages: [], village_id: 0, village_name: '' }"
     x-init="village_id=@js($value); axios.post('/village/' + @js($value)).then(response => {village_name = response.data.village, province_name = response.data.province, regency_name = response.data.regency, district_name = response.data.district}); axios.post('/provinces').then(response => provinces = response.data)">
    <select
        {{ $disabled ? 'disabled' : '' }}
        class="flex h-10 w-full appearance-none transition duration-200 rounded-md border border-input bg-background px-3 py-2 text-sm placeholder:text-muted-foreground focus:outline-none focus:border-primary/70 focus:ring focus:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
        x-model="province_id"
        @click="regencies=[]; regency_name=''; districts=[]; district_name=''; villages=[]; village_id=0; axios.post('/regencies/' + province_id).then(response => regencies = response.data)"
        @change="regencies=[]; regency_name=''; districts=[]; district_name=''; villages=[]; village_id=0; axios.post('/regencies/' + province_id).then(response => regencies = response.data)">
        <template x-for="province in provinces">
            <option :value="province.id" :selected="province_name == province.name"
                    x-text="province.name.toLowerCase().replace(/\b\w/g, function(char) { return char.toUpperCase(); })"></option>
        </template>
    </select>
    <template x-if="regencies.length > 0 || regency_name != ''">
        <select
            class="flex h-10 w-full transition appearance-none duration-200 rounded-md border border-input bg-background px-3 py-2 text-sm placeholder:text-muted-foreground focus:outline-none focus:border-primary/70 focus:ring focus:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
            x-model="regency_id"
            @change="districts=[]; district_name=''; villages=[]; village_id=0;axios.post('/districts/' + regency_id).then(response => districts = response.data)">
            <template x-if="regency_name != ''">
                <option :value="regency_id" selected
                        x-text="regency_name.replace('KAB. ','').toLowerCase().replace(/\b\w/g, function(char) { return char.toUpperCase(); })"></option>
            </template>
            <template x-for="regency in regencies">
                <option :value="regency.id"
                        x-text="regency.name.replace('KAB. ','').toLowerCase().replace(/\b\w/g, function(char) { return char.toUpperCase(); })"></option>
            </template>
        </select>
    </template>
    <template x-if="districts.length > 0 || district_name != ''">
        <select
            class="flex h-10 w-full transition appearance-none duration-200 rounded-md border border-input bg-background px-3 py-2 text-sm placeholder:text-muted-foreground focus:outline-none focus:border-primary/70 focus:ring focus:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
            x-model="district_id"
            @change="villages=[]; village_id=0;axios.post('/villages/' + district_id).then(response => villages = response.data)">
            <template x-if="district_name != ''">
                <option :value="district_id" selected x-text="district_name"></option>
            </template>
            <template x-for="district in districts">
                <option :value="district.id" x-text="district.name"></option>
            </template>
        </select>
    </template>
    <template x-if="villages.length > 0 || village_id > 0">
        <select {{ $attributes }}
                class="flex h-10 w-full transition appearance-none duration-200 rounded-md border border-input bg-background px-3 py-2 text-sm placeholder:text-muted-foreground focus:outline-none focus:border-primary/70 focus:ring focus:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
                x-model="village_id">
            <template x-if="village_id > 0">
                <option :value="village_id" selected x-text="village_name"></option>
            </template>
            <template x-for="village in villages">
                <option :value="village.id" x-text="village.name"></option>
            </template>
        </select>
    </template>
</div>
