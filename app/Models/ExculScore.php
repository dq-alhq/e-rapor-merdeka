<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExculScore extends Model
{
    use HasFactory;

    protected $fillable = ['exculmember_id', 'score'];

    protected function casts(): array
    {
        return [
            'score' => 'integer',
        ];
    }

    /**
     * Get the exculemember that owns the ExculScore
     */
    public function exculemember(): BelongsTo
    {
        return $this->belongsTo(Exculmember::class, 'exculmember_id', 'id');
    }
}
