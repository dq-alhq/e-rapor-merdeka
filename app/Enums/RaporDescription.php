<?php

namespace App\Enums;

enum RaporDescription: int
{
    case A = 1;
    case B = 2;
    case C = 3;
    case D = 4;

    public function label(): string
    {
        return match ($this) {
            self::A => 'Baik Sekali',
            self::B => 'Baik',
            self::C => 'Cukup',
            self::D => 'Kurang',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::A => 'Sangat Berkembang',
            self::B => 'Berkembang Sesuai Harapan',
            self::C => 'Mulai Berkembang',
            self::D => 'Belum Berkembang',
        };
    }
}
