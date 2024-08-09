<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tapel extends Model
{
    use HasFactory;

    protected $fillable = [
        'tapel',
        'semester',
        'tanggal_rapor',
        'tempat_rapor',
    ];

    protected function casts(): array
    {
        return [
            'tapel' => 'integer',
            'tanggal_rapor' => 'date',
        ];
    }

    public function nama(): string
    {
        return $this->tapel . '/' . $this->tapel + 1;
    }

    /**
     * Get all of the classroom for the Tapel
     */
    public function classroom(): HasMany
    {
        return $this->hasMany(Classroom::class, 'tapel_id', 'id');
    }
}
