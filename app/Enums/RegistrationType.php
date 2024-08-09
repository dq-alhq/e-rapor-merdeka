<?php

namespace App\Enums;

enum RegistrationType: int
{
    case BARU = 1;
    case PINDAHAN = 2;
    case NAIK = 3;
    case LANJUT = 4;
    case MENGULANG = 5;

    public function label(): string
    {
        return match ($this) {
            self::BARU => 'Siswa Baru',
            self::PINDAHAN => 'Pindahan',
            self::NAIK => 'Naik Kelas',
            self::LANJUT => 'Lanjutan Semester',
            self::MENGULANG => 'Mengulang',
        };
    }
}
