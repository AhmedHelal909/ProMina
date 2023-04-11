<?php

namespace App\Enum;

class GuardEnum
{

    public const WEB        = 'web';
    public const CUSTOMER     = 'customer';
    public const DELIVERY   = 'delivery';

    /**
     * @param string $value
     * @return array
     */
    public static function getList(string $value = ''): array
    {
        return [
            self::CUSTOMER    => 'customer',
            self::WEB       => 'web',
            self::DELIVERY  => 'delivery',
        ];
    }


    public static function getKeyList(): array
    {
        return array_keys(self::getList());
    }
    public static function getValueList(): array
    {
        return array_values(self::getList());
    }

    /**
     * @return string
     */
    public static function getWeb(): string
    {
        return self::WEB;
    }

    /**
     * @return string
     */
    public static function getCustomer(): string
    {
        return self::CUSTOMER;
    }
    public static function getDelivery(): string
    {
        return self::DELIVERY;
    }
}
