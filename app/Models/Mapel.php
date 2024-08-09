<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'code'];

    /**
     * Get all of the mappings for the Mapel
     */
    public function mappings(): HasMany
    {
        return $this->hasMany(Mapping::class, 'mapel_id', 'id');
    }

    /**
     * Get all of the lessons for the Mapel
     */
    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'mapel_id', 'id');
    }

    /**
     * The classrooms that belong to the Mapel
     */
    public function classrooms(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class, 'lessons', 'mapel_id', 'classroom_id');
    }

    /**
     * The teachers that belong to the Mapel
     */
    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'lessons', 'mapel_id', 'teacher_id');
    }

    /**
     * Get all of the competences for the Mapel
     */
    public function competences(): HasMany
    {
        return $this->hasMany(Competence::class, 'mapel_id', 'id');
    }
}
