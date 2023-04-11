<?php

namespace App\Enum;

class EmployeeService
{

    public const ADVANCE              = 1;
    public const VACATION             = 2;
    public const EMPLOYMENT           = 3;
    public const REVISION             = 4;
    public const TRANSFER             = 5;
    public const COMPLAINT            = 6;
    public const TREATMENT            = 7;
    public const RESIGNATION          = 8;
    public const SUGGESTION           = 9;

    /**
     * @param string $value
     * @return array
     */
    public static function getList(string $value = ''): array
    {
        $enumerationTranslation = 'site.employee_service_.';

        return [
            self::ADVANCE                   => __($enumerationTranslation . self::ADVANCE),
            self::VACATION                   => __($enumerationTranslation . self::VACATION),
            self::EMPLOYMENT                   => __($enumerationTranslation . self::EMPLOYMENT),
            self::REVISION                   => __($enumerationTranslation . self::REVISION),
            self::TRANSFER                   => __($enumerationTranslation . self::TRANSFER),
            self::COMPLAINT                   => __($enumerationTranslation . self::COMPLAINT),
            self::TREATMENT                   => __($enumerationTranslation . self::TREATMENT),
            self::RESIGNATION                   => __($enumerationTranslation . self::RESIGNATION),
            self::SUGGESTION                   => __($enumerationTranslation . self::SUGGESTION),
         
        ];
    }


    public static function getKeyList(): array
    {
        return array_keys(self::getList());
    }

    /**
     * @return string
     */
    public static function getAdvance(): string
    {
        return self::ADVANCE;
    }


    /**
     * @return string
     */
    public static function getVacation(): string
    {
        return self::VACATION;
    }
    public static function getEmployment(): string
    {
        return self::EMPLOYMENT;
    }
    public static function gettRevision(): string
    {
        return self::REVISION;
    }
    public static function getTransfer(): string
    {
        return self::TRANSFER;
    }
    public static function getComplaint(): string
    {
        return self::COMPLAINT;
    }
    public static function getTreatment(): string
    {
        return self::TREATMENT;
    }
    public static function getResignation(): string
    {
        return self::RESIGNATION;
    }
    public static function getSuggestion(): string
    {
        return self::SUGGESTION;
    }
}
