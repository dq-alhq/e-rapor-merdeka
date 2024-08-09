<?php

namespace App\Enums;

enum Grade: int
{
    case I = 1;
    case II = 2;
    case III = 3;
    case IV = 4;
    case V = 5;
    case VI = 6;
    case VII = 7;
    case VIII = 8;
    case IX = 9;
    case X = 10;
    case XI = 11;
    case XII = 12;

    public function label(): string
    {
        return match ($this) {
            self::I => 'I',
            self::II => 'II',
            self::III => 'III',
            self::IV => 'IV',
            self::V => 'V',
            self::VI => 'VI',
            self::VII => 'VII',
            self::VIII => 'VIII',
            self::IX => 'IX',
            self::X => 'X',
            self::XI => 'XI',
            self::XII => 'XII',
        };
    }
}
