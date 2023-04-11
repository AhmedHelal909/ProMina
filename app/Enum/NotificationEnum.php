<?php

namespace App\Enum;

class NotificationEnum
{

    public const ADVANCE                    = 1;
    public const CIVIL                      = 2;
    public const EMPLOYEMENT                = 3;
    public const EQUIPMENT                  = 4;
    public const FEASIBILITY                = 5;
    public const FINANCE                    = 6;
    public const Financial                  = 7;
    public const FUNDING                    = 8;
    public const GOVERNATE                  = 9;
    public const HR                         = 10;
    public const HR_OPERATING               = 11;
    public const INDUSTRY                   = 12;
    public const INDUSTRY_SUPPLY            = 13;
    public const IT                         = 14;
    public const LEGAL                      = 15;
    public const MARKETING                  = 16;
    public const MARKETING_MANAGEMENT       = 17;
    public const OPERATING                  = 18;
    public const OPERATING_MANAGEMENT       = 19;
    public const POLARIZATION               = 20;
    public const RAW                        = 21;
    public const RESEARCH                   = 22;
    public const RESEARCH_MARKETING         = 23;
    public const RESIGN                     = 24;
    public const REVISION                   = 25;
    public const SERVICE                    = 26;
    public const SITE                       = 27;
    public const SUGGESTION                 = 28;
    public const TRANSFER                   = 29;
    public const TREATMENT                  = 30;
    public const VACACTION                  = 31;

    /**
     * @param string $value
     * @return array
     */
    public static function getList(string $value = ''): array
    {
        $enumerationTranslation = 'site.notification_.';

        return [
            self::ADVANCE                          => __($enumerationTranslation . self::ADVANCE),
            self::CIVIL                            => __($enumerationTranslation . self::CIVIL),
            self::EMPLOYEMENT                      => __($enumerationTranslation . self::EMPLOYEMENT),
            self::EQUIPMENT                        => __($enumerationTranslation . self::EQUIPMENT),
            self::FEASIBILITY                      => __($enumerationTranslation . self::EQUIPMENT),
            self::FINANCE                          => __($enumerationTranslation . self::FINANCE),
            self::Financial                        => __($enumerationTranslation . self::Financial),
            self::FUNDING                          => __($enumerationTranslation . self::FUNDING),
            self::GOVERNATE                        => __($enumerationTranslation . self::GOVERNATE),
            self::HR                               => __($enumerationTranslation . self::HR),
            self::INDUSTRY                         => __($enumerationTranslation . self::INDUSTRY),
            self::INDUSTRY_SUPPLY                  => __($enumerationTranslation . self::INDUSTRY),
            self::INDUSTRY_SUPPLY                  => __($enumerationTranslation . self::INDUSTRY_SUPPLY),
            self::IT                               => __($enumerationTranslation . self::IT),
            self::LEGAL                            => __($enumerationTranslation . self::LEGAL),
            self::MARKETING                        => __($enumerationTranslation . self::MARKETING),
            self::MARKETING_MANAGEMENT             => __($enumerationTranslation . self::MARKETING_MANAGEMENT),
            self::OPERATING                        => __($enumerationTranslation . self::OPERATING),
            self::OPERATING_MANAGEMENT             => __($enumerationTranslation . self::OPERATING_MANAGEMENT),
            self::POLARIZATION                     => __($enumerationTranslation . self::POLARIZATION),
            self::RAW                              => __($enumerationTranslation . self::RAW),
            self::RESEARCH                         => __($enumerationTranslation . self::RESEARCH),
            self::RESEARCH_MARKETING               => __($enumerationTranslation . self::RESEARCH_MARKETING),
            self::RESIGN                           => __($enumerationTranslation . self::RESIGN),
            self::REVISION                         => __($enumerationTranslation . self::REVISION),
            self::SERVICE                          => __($enumerationTranslation . self::SERVICE),
            self::SITE                             => __($enumerationTranslation . self::SITE),
            self::SUGGESTION                       => __($enumerationTranslation . self::SUGGESTION),
            self::TRANSFER                         => __($enumerationTranslation . self::TRANSFER),
            self::TREATMENT                        => __($enumerationTranslation . self::TREATMENT),
            self::VACACTION                        => __($enumerationTranslation . self::VACACTION),
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

    public static function getAdvance() : string
    {
        return self::ADVANCE;
    }
    public static function getCivil() : string
    {
        return self::CIVIL;
    }
    public static function getEmployment() : string
    {
        return self::EMPLOYEMENT;
    }
    public static function getEquipment() : string
    {
        return self::EQUIPMENT;
    }
    public static function getFeasibility() : string
    {
        return self::FEASIBILITY;
    }
    public static function getFinance() : string
    {
        return self::FINANCE;
    }
    public static function getFinancial() : string
    {
        return self::Financial;
    }
    public static function getFunding() : string
    {
        return self::FUNDING;
    }
    public static function getGovernate() : string
    {
        return self::GOVERNATE;
    }
    public static function getHR() : string
    {
        return self::HR;
    }
    public static function getHROperating() : string
    {
        return self::HR_OPERATING;
    }
    public static function getIndustry() : string
    {
        return self::INDUSTRY;
    }
    public static function getIndustry_Supply() : string
    {
        return self::INDUSTRY_SUPPLY;
    }
    public static function getLegal() : string
    {
        return self::LEGAL;
    }
    public static function getMarketing() : string
    {
        return self::MARKETING;
    }
    public static function getMarketingManagement() : string
    {
        return self::MARKETING_MANAGEMENT;
    }
    public static function getOperating() : string
    {
        return self::OPERATING;
    }
    public static function getOperatingManagement() : string
    {
        return self::OPERATING_MANAGEMENT;
    }
    public static function getPolarization() : string
    {
        return self::POLARIZATION;
    }
    public static function getRaw() : string
    {
        return self::RAW;
    }
    public static function getResearch() : string
    {
        return self::RESEARCH;
    }
    public static function getREsearchMarketing() : string
    {
        return self::RESEARCH_MARKETING;
    }
    public static function getResign() : string
    {
        return self::RESIGN;
    }
    public static function getRevision() : string
    {
        return self::REVISION;
    }
    public static function getService() : string
    {
        return self::SERVICE;
    }
    public static function getSite() : string
    {
        return self::SITE;
    }
    public static function getSuggestion() : string
    {
        return self::SUGGESTION;
    }
    public static function getTransfer() : string
    {
        return self::TRANSFER;
    }
    public static function getTreatment() : string
    {
        return self::TREATMENT;
    }
    public static function getVaction() : string
    {
        return self::VACACTION;
    }
    public static function getIT() : string
    {
        return self::IT;
    }

}
