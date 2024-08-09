<?php

namespace App\Enums;

enum ChildStatus: int
{
    case KANDUNG = 1;
    case ANGKAT = 2;
    case TIRI = 3;

    public function label(): string
    {
        return match ($this) {
            self::KANDUNG => 'Anak Kandung',
            self::ANGKAT => 'Anak Angkat',
            self::TIRI => 'Anak Tiri',
        };
    }
}
