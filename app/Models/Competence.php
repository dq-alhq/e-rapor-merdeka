<?php

namespace App\Models;

use App\Enums\Grade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = [
        'mapel_id',
        'tingkat',
        'semester',
        'code',
        'materi',
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

    public function objectives(): HasMany
    {
        return $this->hasMany(Objective::class, 'competence_id');
    }
}
