<?php

namespace App\Enums;

enum Level: string
{
    case SD_A = 'A';
    case SD_B = 'B';
    case SD_C = 'C';
    case SMP = 'D';
    case SMA_E = 'E';
    case SMA_F = 'F';

    public function label(): string
    {
        return match ($this) {
            self::SD_A => __('SD Kelas 1 - 2'),
            self::SD_B => __('SD Kelas 3 - 4'),
            self::SD_C => __('SD Kelas 5 - 6'),
            self::SMP => __('SMP'),
            self::SMA_E => __('SMA Kelas 10'),
            self::SMA_F => __('SMA Kelas 11 - 12'),
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::SD_A => 'SD Kelas 1 - 2',
            self::SD_B => 'SD Kelas 3 - 4',
            self::SD_C => 'SD Kelas 5 - 6',
            self::SMP => 'SMP',
            self::SMA_E => 'SMA Kelas 10',
            self::SMA_F => 'SMA Kelas 11 - 12',
        };
    }
}
