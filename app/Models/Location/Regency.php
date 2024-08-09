<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Regency extends Model
{
    public $timestamps = false;

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function district(): HasMany
    {
        return $this->hasMany(District::class, 'regency_id', 'id');
    }

    public function villages(): HasManyThrough
    {
        return $this->hasManyThrough(Village::class, District::class, 'regency_id', 'district_id', 'id', 'id');
    }
}
