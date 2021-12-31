<?php

namespace App\Utilities;

class Currency
{
    public static function price_format_in_hezar_toman(int $amount): int
    {
        return $amount / 1000;
    }

    public static function price_format_in_million(int $amount): int
    {
        return $amount / 1000000;
    }

    public static function price_format_in_toman(int $rial): int
    {
        return $rial / 10;
    }

    public static function price_format_in_rial(int $toman): int
    {
        return $toman * 10;
    }
}