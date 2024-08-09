<?php

namespace App\Enums;

enum MapelType: string
{
    case A = 'agama';
    case B = 'umum';
    case C = 'mulok';

    public function label(): string
    {
        return match ($this) {
            self::A => 'Pendidikan Agama',
            self::B => 'Umum',
            self::C => 'Muatan Lokal',
        };
    }
}
