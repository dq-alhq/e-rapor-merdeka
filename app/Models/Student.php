<?php

namespace App\Models;

use App\Enums\ChildStatus;
use App\Enums\ParentJob;
use App\Enums\Religion;
use App\Observers\StudentObserver;
use App\Traits\HasLocations;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy([StudentObserver::class])]
class Student extends Model
{
    use HasFactory, HasLocations;

    protected $fillable = [
        'user_id',
        'aktif',
        'nama',
        'nis',
        'nisn',
        'nik',
        'gender',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat',
        'village_id',
        'anak_ke',
        'status_anak',
        'telepon',
        'ayah',
        'pekerjaan_ayah',
        'ibu',
        'pekerjaan_ibu',
        'wali',
        'pekerjaan_wali',
        'photo',
//        'tahun_masuk',
//        'asal_sekolah'
    ];

    protected function casts(): array
    {
        return [
            'tanggal_lahir' => 'date',
            'aktif' => 'boolean',
            'status_anak' => ChildStatus::class,
            'agama' => Religion::class,
            'pekerjaan_ayah' => ParentJob::class,
            'pekerjaan_ibu' => ParentJob::class,
            'pekerjaan_wali' => ParentJob::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function kelas_sekarang()
    {
        return $this->classrooms()->whereBelongsTo(Tapel::find(session('tapel')->id))->first();
    }


    public function classrooms(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class, 'classmembers', 'student_id', 'classroom_id');
    }

    public function classmembers(): HasMany
    {
        return $this->hasMany(Classmember::class, 'student_id', 'id');
    }

    public function exculs(): BelongsToMany
    {
        return $this->belongsToMany(Excul::class, 'exculmembers', 'classmember_id', 'excul_id');
    }
}
