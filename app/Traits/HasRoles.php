<?php

namespace App\Traits;

use App\Models\Classroom;
use App\Models\Excul;
use App\Models\Mapel;
use App\Models\School;

trait HasRoles
{
    public function isStudent(): bool
    {
        return $this->student()->count() > 0;
    }

    public function isTeacher(): bool
    {
        return $this->teacher()->count() > 0;
    }

    public function isKepsek(): bool
    {
        return $this->isTeacher() && $this->teacher()->first()->id === School::latest()->first()->kepsek_id;
    }

    public function isAdmin(): bool
    {
        return $this->isKepsek() || $this->id === 1;
    }

    public function isWali(Classroom $classroom): bool
    {
        return $this->isTeacher() && $this->teacher()->first()->id === $classroom->wali_id;
    }

    public function isPengajar(Mapel $mapel): bool
    {
        return $this->isTeacher() && $this->teacher()->mapels()->where('id', $mapel->id)->exists();
    }

    public function isMengajarKelas(Classroom $classroom): bool
    {
        return $this->isTeacher() && $this->teacher()->classrooms()->where('id', $classroom->id)->exists();
    }

    public function isPembinaExcul(Excul $excul): bool
    {
        return $this->isTeacher() && $this->teacher()->exculs()->where('id', $excul->id)->exists();
    }

    public function isClassmember(Classroom $classroom): bool
    {
        return $this->isStudent() && $this->student()->classrooms()->where('id', $classroom->id)->exists();
    }

    public function isExculmember(Excul $excul): bool
    {
        return $this->isStudent() && $this->student()->exculs()->where('id', $excul->id)->exists();
    }

    public function role(): string
    {
        if ($this->isKepsek()) {
            return 'Kepala Sekolah';
        } elseif ($this->isAdmin()) {
            return 'Admin';
        } elseif ($this->isTeacher()) {
            return 'Guru';
        } elseif ($this->isStudent()) {
            return 'Siswa';
        } else {
            return 'Tamu';
        }
    }
}
