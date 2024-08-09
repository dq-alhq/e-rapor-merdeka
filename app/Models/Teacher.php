<?php

namespace App\Models;

use App\Observers\TeacherObserver;
use App\Traits\HasLocations;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy(TeacherObserver::class)]
class Teacher extends Model
{
    use HasFactory, HasLocations;

    protected $fillable = [
        'user_id',
        'nama',
        'nip',
        'gender',
        'tempat_lahir',
        'tanggal_lahir',
        'nuptk',
        'nik',
        'alamat',
        'village_id',
        'photo',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_lahir' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function mapels(): BelongsToMany
    {
        return $this->belongsToMany(Mapel::class, 'lessons', 'teacher_id', 'mapel_id');
    }

    public function classrooms(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class, 'lessons', 'teacher_id', 'classroom_id');
    }

    public function exculs(): HasMany
    {
        return $this->hasMany(Excul::class, 'teacher_id', 'id');
    }

    public function wali(): HasMany
    {
        return $this->hasMany(Classroom::class, 'wali_id', 'id');
    }
}
