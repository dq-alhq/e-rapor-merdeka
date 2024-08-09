<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exculmember extends Model
{
    use HasFactory;

    protected $fillable = ['excul_id', 'classmember_id'];

    /**
     * Get the excul that owns the Exculmember
     */
    public function excul(): BelongsTo
    {
        return $this->belongsTo(Excul::class, 'excul_id', 'id');
    }

    /**
     * Get the classmember that owns the Exculmember
     */
    public function classmember(): BelongsTo
    {
        return $this->belongsTo(Classmember::class, 'classmember_id', 'id');
    }

    /**
     * Get all of the scores for the Exculmember
     */
    public function scores(): HasMany
    {
        return $this->hasMany(ExculScore::class, 'exculmember_id', 'id');
    }
}
