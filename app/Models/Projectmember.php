<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Projectmember extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'classmember_id'];

    /**
     * Get the project that owns the Projectmember
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    /**
     * Get the classmember that owns the Projectmember
     */
    public function classmember(): BelongsTo
    {
        return $this->belongsTo(Classmember::class, 'classmember_id', 'id');
    }

    /**
     * Get all of the projectmembers for the Projectmember
     */
    public function projectmembers(): HasMany
    {
        return $this->hasMany(Projectmember::class, 'project_id', 'id');
    }
}
