<?php

namespace App\Traits;

use App\Models\Location\Village;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasLocations
{
    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }

    public function desa(): string
    {
        return str($this->village->name)->title();
    }

    public function kecamatan(): string
    {
        return str($this->village->district->name)->title();
    }

    public function kabupaten(): string
    {
        return str($this->village->district->regency->name)->replace('KAB. ', '')->title();

    }

    public function provinsi(): string
    {
        return str($this->village->district->regency->province->name)->title();
    }

    public function alamatLengkap(): string
    {
        return $this->desa() . ', ' . $this->kecamatan() . ', ' . $this->kabupaten() . ', ' . $this->provinsi();
    }
}
