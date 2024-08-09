<?php

namespace App\Models;

use App\Enums\Grade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = [
        'mapel_id',
        'tingkat',
        'semester',
        'kode',
        'capaian',
    ];

    protected function casts(): array
    {
        return [
            'tingkat' => Grade::class,
        ];
    }

    /**
     * Get the mapel that owns the Competence
     */
    public function mapel(): BelongsTo
    {
        return $this->belongsTo(Mapel::class, 'mapel_id', 'id');
    }
}
