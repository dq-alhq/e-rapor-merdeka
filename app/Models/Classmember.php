<?php

namespace App\Models;

use App\Enums\RegistrationType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classmember extends Model
{
    use HasFactory;

    protected $fillable = [
        'classroom_id',
        'student_id',
        'jenis_registrasi',
    ];

    protected function casts(): array
    {
        return [
            'jenis_registrasi' => RegistrationType::class,
        ];
    }

    /**
     * Get the student that owns the Classmember
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    /**
     * Get the classroom that owns the Classmember
     */
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'classroom_id', 'id');
    }

    /**
     * Get all of the exculmembers for the Classmember
     */
    public function exculmembers(): HasMany
    {
        return $this->hasMany(Exculmember::class, 'classmember_id', 'id');
    }

    /**
     * Get all of the exculs for the Classmember
     */
    public function exculs(): BelongsToMany
    {
        return $this->belongsToMany(Excul::class, 'exculmembers', 'classmember_id', 'excul_id');
    }

    /**
     * Get all of the projectmembers for the Classmember
     */
    public function projectmembers(): HasMany
    {
        return $this->hasMany(Projectmember::class, 'classmember_id', 'id');
    }

    /**
     * Get all of the scores for the Classmember
     */
    public function scores(): HasMany
    {
        return $this->hasMany(Score::class, 'classmember_id', 'id');
    }
}
