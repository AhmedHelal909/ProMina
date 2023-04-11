<?php

namespace App\Enum;

class OfferEnum
{

    public const OFFER_ADMIN      = 1;
    public const OFFER_VENDOR     = 2;

    /**
     * @param string $value
     * @return array
     */
    public static function getList(string $value = ''): array
    {
        $enumerationTranslation = 'site.offer_setting_.';
        return [
            self::OFFER_ADMIN => __($enumerationTranslation . self::OFFER_ADMIN),
            self::OFFER_VENDOR => __($enumerationTranslation . self::OFFER_VENDOR),
        ];
    }


    public static function getKeyList(): array
    {
        return array_keys(self::getList());
    }

    /**
     * @return string
     */
    public static function getAdmin(): string
    {
        return self::OFFER_ADMIN;
    }

    /**
     * @return string
     */
    public static function getVendor(): string
    {
        return self::OFFER_VENDOR;
    }
}
