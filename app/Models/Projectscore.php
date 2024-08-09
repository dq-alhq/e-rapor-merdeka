<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Projectscore extends Model
{
    use HasFactory;

    protected $fillable = ['projectmember_id', 'score_1', 'score_2', 'score_3'];

    protected function casts(): array
    {
        return [
            'score_1' => 'float',
            'score_2' => 'float',
            'score_3' => 'float',
        ];
    }

    /**
     * Get the projectmember that owns the Projectscore
     */
    public function projectmember(): BelongsTo
    {
        return $this->belongsTo(Projectmember::class, 'projectmember_id', 'id');
    }
}
