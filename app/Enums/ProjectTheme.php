<?php

namespace App\Enums;

enum ProjectTheme: int
{
    case A = 1;
    case B = 2;
    case C = 3;
    case D = 4;
    case E = 5;
    case F = 6;
    case G = 7;
    case H = 8;
    case I = 9;

    public function label(): string
    {
        return match ($this) {
            self::A => 'Gaya Hidup Berkelanjutan',
            self::B => 'Kearifan Lokal',
            self::C => 'Bhineka Tunggal Ika',
            self::D => 'Bangunlah Jiwa dan Raganya',
            self::E => 'Suara Demokrasi',
            self::F => 'Berekayasa dan Berteknologi untuk Membangun NKRI',
            self::G => 'Kewirausahaan',
            self::H => 'Kebekerjaan',
            self::I => 'Budaya Kerja'
        };
    }
}
