<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = ['alpha', 'sakit', 'izin'];

    protected function casts(): array
    {
        return [
            'alpha' => 'integer',
            'sakit' => 'integer',
            'izin' => 'integer',
        ];
    }

    /**
     * Get the classmember that owns the Absence
     */
    public function classmember(): BelongsTo
    {
        return $this->belongsTo(Classmember::class, 'classmember_id', 'id');
    }
}
