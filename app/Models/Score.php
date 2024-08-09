<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Score extends Model
{
    use HasFactory;

    protected $fillable = ['lesson_id', 'competence_id', 'classmember_id', 'score'];

    protected function casts(): array
    {
        return [
            'score' => 'float',
        ];
    }

    /**
     * Get the lesson that owns the Score
     */
    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }

    /**
     * Get the competence that owns the Score
     */
    public function competence(): BelongsTo
    {
        return $this->belongsTo(Competence::class, 'competence_id', 'id');
    }

    /**
     * Get the classmember that owns the Score
     */
    public function classmember(): BelongsTo
    {
        return $this->belongsTo(Classmember::class, 'classmember_id', 'id');
    }
}
