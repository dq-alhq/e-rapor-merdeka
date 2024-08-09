<?php

namespace App\Models;

use App\Enums\RaporDescription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rapor extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'classmember_id',
        'nas_score',
        'sts_score',
        'sas_score',
        'tuntas',
        'catatan',
        'predikat',
        'accepted',
    ];

    protected function casts(): array
    {
        return [
            'nas_score' => 'float',
            'sts_score' => 'float',
            'sas_score' => 'float',
            'tuntas' => 'boolean',
            'catatan' => 'string',
            'predikat' => RaporDescription::class,
            'accepted' => 'boolean',
        ];
    }

    /**
     * Get the lesson that owns the Rapor
     */
    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }

    /**
     * Get the classmember that owns the Rapor
     */
    public function classmember(): BelongsTo
    {
        return $this->belongsTo(Classmember::class, 'classmember_id', 'id');
    }
}
