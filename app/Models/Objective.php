<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Objective extends Model
{
    use HasFactory;
    protected $fillable = [
        'competence_id',
        'capaian',
    ];

    public function competence(): BelongsTo
    {
        return $this->belongsTo(Competence::class, 'competence_id', 'id');
    }
}
