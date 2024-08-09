<?php

namespace App\Models;

use App\Enums\Level;
use App\Traits\HasLocations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class School extends Model
{
    use HasLocations;

    protected $fillable = [
        'nama',
        'jenjang',
        'npsn',
        'nss',
        'nds',
        'nis',
        'alamat',
        'village_id',
        'kode_pos',
        'telepon',
        'logo',
        'kepsek_id',
    ];

    protected function casts(): array
    {
        return [
            'jenjang' => Level::class
        ];
    }

    /**
     * Get the village that owns the School
     */
    public function village(): BelongsTo
    {
        return $this->belongsTo(Location\Village::class, 'village_id', 'id');
    }

    /**
     * Get the kepsek that owns the School
     */
    public function kepsek(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'kepsek_id', 'id');
    }
}
