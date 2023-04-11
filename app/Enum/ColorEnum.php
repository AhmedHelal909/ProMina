<?php

namespace App\Enum;

class ColorEnum
{

    public const PENDING             = 1;
    public const ACCEPTED            = 2;
    public const PROCESSING          = 3;
    public const ITEM_ON_THE_WAY     = 4;
    public const DELIVERED           = 5;
    public const CANCELED            = 6;
    public const PAYMENT_FAILED      = 7;
    public const REFUNDED            = 8;
    public const SCHEDULED           = 9;

    /**
     * @param string $value
     * @return array
     */
    public static function getList(string $value = ''): array
    {
        $enumerationTranslation = 'site.order_setting_.';
        return [
            self::PENDING             => "badge badge-default",
            self::ACCEPTED            => "badge badge-primary",
            self::PROCESSING          => "badge badge-success",
            self::ITEM_ON_THE_WAY     => "badge badge-info",
            self::DELIVERED           => "badge badge-warning",
            self::CANCELED            => "badge badge-danger",
            self::PAYMENT_FAILED      => "badge badge-danger",
            self::REFUNDED            => "badge badge-dark",
            self::SCHEDULED           => "badge badge-secondary",
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
    public static function getPending(): string
    {
        return self::PENDING;
    }
    public static function getAccepted(): string
    {
        return self::ACCEPTED;
    }
    public static function getProcessing(): string
    {
        return self::PROCESSING;
    }
    public static function getItem_on_the_way(): string
    {
        return self::ITEM_ON_THE_WAY;
    }
    public static function getDelivered(): string
    {
        return self::DELIVERED;
    }
    public static function getCanceled(): string
    {
        return self::CANCELED;
    }
    public static function getPayment_failed(): string
    {
        return self::PAYMENT_FAILED;
    }
    public static function getRefunded(): string
    {
        return self::REFUNDED;
    }
    public static function getScheduled(): string
    {
        return self::SCHEDULED;
    }


}
