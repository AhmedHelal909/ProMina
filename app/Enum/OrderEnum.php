<?php

namespace App\Enum;

class OrderEnum
{

    public const Approved            = 1;
    public const CANCELED            = 2;
    public const Contact             = 3;
    public const Pending             = 4;

    /**
     * @param string $value
     * @return array
     */
    public static function getList(string $value = ''): array
    {
        $enumerationTranslation = 'site.order_setting_.';
        return [
            self::Approved => __($enumerationTranslation . self::Approved),
            self::CANCELED => __($enumerationTranslation . self::CANCELED),
            self::Contact => __($enumerationTranslation . self::Contact),
            self::Pending => __($enumerationTranslation . self::Pending),
 
        ];
    }


    public static function getKeyList(): array
    {
        return array_keys(self::getList());
    }
    public static function getValue($key): string
    {
        return self::getList()[$key];
   
    }
    public static function getKey($key): string
    {
        return array_keys(self::getList())[$key];
   
    }
    
    public static function getApproved(): string
    {
        return self::Approved;
    }
    public static function getCanceled(): string
    {
        return self::CANCELED;
    }
    public static function getContact(): string
    {
        return self::Contact;
    }
    public static function getPending(): string
    {
        return self::Pending;
    }
   

}
