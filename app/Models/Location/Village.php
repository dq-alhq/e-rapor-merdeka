<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Village extends Model
{
    public $timestamps = false;

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function regency(): HasOneThrough
    {
        return $this->hasOneThrough(Regency::class, District::class, 'id', 'id', 'district_id', 'regency_id');
    }
}
