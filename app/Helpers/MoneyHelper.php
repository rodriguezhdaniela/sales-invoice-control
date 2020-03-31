<?php


namespace App\Helpers;

class MoneyHelper
{
    public static function format($value, $locale): string
    {
        setLocale(LC_MONETARY, $locale);
        return money_format('%.2n', $value);
    }
}
