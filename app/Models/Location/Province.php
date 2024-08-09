<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Province extends Model
{
    public $timestamps = false;

    public function regencies(): HasMany
    {
        return $this->hasMany(Regency::class, 'province_id', 'id');
    }

    public function districts(): HasManyThrough
    {
        return $this->hasManyThrough(District::class, Regency::class, 'province_id', 'regency_id', 'id', 'id');
    }
}
