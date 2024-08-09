<?php

namespace App\Enums;

enum Religion: int
{
    case ISLAM = 1;
    case KRISTEN = 2;
    case KATHOLIK = 3;
    case HINDU = 4;
    case BUDHA = 5;
    case KHONGHUCU = 6;

    public function label(): string
    {
        return match ($this) {
            self::ISLAM => 'Islam',
            self::KRISTEN => 'Kristen',
            self::KATHOLIK => 'Katolik',
            self::HINDU => 'Hindu',
            self::BUDHA => 'Budha',
            self::KHONGHUCU => 'Khonghucu',
        };
    }
}
