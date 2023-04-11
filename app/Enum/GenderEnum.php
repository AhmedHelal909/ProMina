<?php

namespace App\Enum;

class GenderEnum
{

    public const GENDER_MALE     = 1;
    public const GENDER_FEMALE   = 2;

    /**
     * @param string $value
     * @return array
     */
    public static function getList(string $value = ''): array
    {
        $enumerationTranslation = 'site.gender_setting_.';
        return [
            self::GENDER_FEMALE => __($enumerationTranslation . self::GENDER_FEMALE),
            self::GENDER_MALE => __($enumerationTranslation . self::GENDER_MALE),
        ];
    }


    public static function getKeyList(): array
    {
        return array_keys(self::getList());
    }
    public static function getValue($key): string
    {
        // $enumerationTranslation = 'site.gender_setting_.';
        return self::getList()[$key];
        // if($key == self::GENDER_MALE){
        //     return __($enumerationTranslation . self::GENDER_MALE);
        // } else {
        //     return __($enumerationTranslation . self::GENDER_FEMALE);
        // }
    }

    /**
     * @return string
     */
    public static function getMale(): string
    {
        return self::GENDER_MALE;
    }

    /**
     * @return string
     */
    public static function getFemale(): string
    {
        return self::GENDER_FEMALE;
    }
}
