<?php

namespace App\Enum;

class ReportEnum
{

    public const HR                      = 1;
    public const POLARIZATION            = 2;
    public const IT                      = 3;
    public const LEGAL                   = 4;
    public const MARKETING_MANAGEMENT    = 5;
    public const SITES                   = 6;
    public const FINANCE                 = 7;
    public const MARKETING               = 8;
    public const OPERATING_MANAGEMENT    = 9;
    public const INVESTMENT              = 10;

    /**
     * @param string $value
     * @return array
     */
    public static function getList(string $value = ''): array
    {
        return [
            self::HR                   =>__('site.hrs'),
            self::POLARIZATION         => __('site.ploarization'),
            self::IT                   => __('site.IT'),
            self::LEGAL                => __('site.legals'),
            self::MARKETING_MANAGEMENT => __('site.marketing_mang'),
            self::SITES                => __('site.sites'),
            self::FINANCE              => __('site.finance'),
            self::MARKETING            => __('site.marketing_emp'),
            self::OPERATING_MANAGEMENT => __('site.operating_managment'),
            self::INVESTMENT           => __('site.investments'),
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
    
    public static function getHR(): string
    {
        return self::HR;
    }
    public static function getSite(): string
    {
        return self::SITES;
    }
    public static function getPolarization(): string
    {
        return self::POLARIZATION;
    }
    public static function getIT(): string
    {
        return self::IT;
    }
    public static function getLegal(): string
    {
        return self::LEGAL;
    }
    public static function getMarketingManagement(): string
    {
        return self::MARKETING_MANAGEMENT;
    }
    public static function getFinance(): string
    {
        return self::FINANCE;
    }
    public static function getMarketing(): string
    {
        return self::MARKETING;
    }
    public static function getOperatingMarketing(): string
    {
        return self::OPERATING_MANAGEMENT;
    }
    public static function getInvestment(): string
    {
        return self::INVESTMENT;
    }


}
