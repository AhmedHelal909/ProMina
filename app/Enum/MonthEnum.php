<?php

namespace App\Enum;

class MonthEnum
{

    public const JANUARY      = 1;
    public const FEBRUARY     = 2;
    public const MARCH        = 3;
    public const APRIL        = 4;
    public const MAY          = 5;
    public const JUNE         = 6;
    public const JULY         = 7;
    public const AUGUST       = 8;
    public const SEPTEMBER    = 9;
    public const OCTOBER      = 10;
    public const NOVEMBER     = 11;
    public const DECEMBER     = 12;

    /**
     * @param string $value
     * @return array
     */
    public static function getList(string $value = ''): array
    {
        $enumerationTranslation = 'site.month_.';
        return [
            self::JANUARY => __($enumerationTranslation . self::JANUARY),
            self::FEBRUARY => __($enumerationTranslation . self::FEBRUARY),
            self::MARCH => __($enumerationTranslation . self::MARCH),
            self::APRIL => __($enumerationTranslation . self::APRIL),
            self::MAY => __($enumerationTranslation . self::MAY),
            self::JUNE => __($enumerationTranslation . self::JUNE),
            self::JULY => __($enumerationTranslation . self::JULY),
            self::AUGUST => __($enumerationTranslation . self::AUGUST),
            self::SEPTEMBER => __($enumerationTranslation . self::SEPTEMBER),
            self::OCTOBER => __($enumerationTranslation . self::OCTOBER),
            self::NOVEMBER => __($enumerationTranslation . self::NOVEMBER),
            self::DECEMBER => __($enumerationTranslation . self::DECEMBER),
        ];
    }


    public static function getKeyList(): array
    {
        return array_keys(self::getList());
    }
    public static function getJanuary(): string
    {
        return self::JANUARY;
    }
    public static function getFebruary(): string
    {
        return self::FEBRUARY;
    }
    public static function getMarch(): string
    {
        return self::MARCH;
    }
    public static function getApril(): string
    {
        return self::APRIL;
    }
    public static function getMay(): string
    {
        return self::MAY;
    }
    public static function getJune(): string
    {
        return self::JUNE;
    }
    public static function getJuly(): string
    {
        return self::JULY;
    }
    public static function getAugust(): string
    {
        return self::AUGUST;
    }
    public static function getSeptember(): string
    {
        return self::SEPTEMBER;
    }
    public static function getOctober(): string
    {
        return self::OCTOBER;
    }
    public static function getNovember(): string
    {
        return self::NOVEMBER;
    }
    public static function getDecember(): string
    {
        return self::DECEMBER;
    }
   


}
