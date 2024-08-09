<?php

namespace App\Enums;

enum ParentJob: int
{
    case TIDAK = 1;
    case NELAYAN = 2;
    case PETANI = 3;
    case PETERNAK = 4;
    case PNS = 5;
    case SWASTA = 6;
    case PEDAGANG = 7;
    case PENGUSAHA = 8;
    case WIRASWASTA = 9;
    case WIRAUSAHA = 10;
    case BURUH = 11;
    case PENSIUN = 12;

    public function label(): string
    {
        return match ($this) {
            self::TIDAK => 'Tidak Bekerja',
            self::NELAYAN => 'Nelayan',
            self::PETANI => 'Petani',
            self::PETERNAK => 'Peternak',
            self::PNS => 'PNS/TNI/Polri',
            self::SWASTA => 'Karyawan Swasta',
            self::PEDAGANG => 'Pedagang',
            self::PENGUSAHA => 'Pengusaha',
            self::WIRASWASTA => 'Wiraswasta',
            self::WIRAUSAHA => 'Wirausaha',
            self::BURUH => 'Buruh',
            self::PENSIUN => 'Pensiunan',
        };
    }
}
