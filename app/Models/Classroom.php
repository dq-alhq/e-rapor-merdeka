<?php

namespace App\Models;

use App\Enums\Grade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'tapel_id',
        'wali_id',
        'tingkat',
        'rombel',
    ];

    protected function casts(): array
    {
        return [
            'tingkat' => Grade::class,
        ];
    }

    public function nama(): string
    {
        return $this->rombel ? $this->tingkat->label() . ' - ' . $this->rombel : $this->tingkat->label();
    }

    /**
     * Get the tapel that owns the Classroom
     */
    public function tapel(): BelongsTo
    {
        return $this->belongsTo(Tapel::class, 'tapel_id', 'id');
    }

    /**
     * Get the wali that owns the Classroom
     */
    public function wali(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'wali_id', 'id');
    }

    /**
     * The students that belong to the Classroom
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'classmembers', 'classroom_id', 'student_id');
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'classroom_id', 'id');
    }

    public function mapels(): BelongsToMany
    {
        return $this->belongsToMany(Mapel::class, 'lessons', 'classroom_id', 'mapel_id');
    }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'lessons', 'classroom_id', 'teacher_id');
    }
}
