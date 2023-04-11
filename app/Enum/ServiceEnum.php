<?php

namespace App\Enum;

class ServiceEnum
{
    public const industry_head                    = 1;
    public const industry_description             = 2;
    public const industry_image                   = 3;
    public const feasibility_head                 = 4;
    public const feasibility_description          = 5;
    public const feasibility_image                = 6;
    public const funding_head                     = 7;
    public const funding_description              = 8;
    public const funding_image                    = 9;
    public const civil_head                       = 10;
    public const civil_description                = 11;
    public const civil_image                      = 12;
    public const equipment_head                   = 13;
    public const equipment_description            = 14;
    public const equipment_image                  = 15;
    public const raw_head                         = 16;
    public const raw_description                  = 17;
    public const raw_image                        = 18;   
    public const hr_supply_head                   = 19;
    public const hr_supply_description            = 20;
    public const hr_supply_image                  = 21;   
    public const industry_supply_head             = 22;
    public const industry_supply_description      = 23;
    public const industry_supply_image            = 24;   
    public const governate_head                   = 25;
    public const governate_description            = 26;
    public const governate_image                  = 27;   
    public const hroperating_head                 = 28;
    public const hroperating_description          = 29;
    public const hroperating_image                = 30;   
    public const researchmarketing_head           = 31;
    public const researchmarketing_description    = 32;
    public const researchmarketing_image          = 33;   
    public const fundingsell_head                 = 34;
    public const fundingsell_description          = 35;
    public const fundingsell_image                = 36;   

    /**
     * @param string $value
     * @return array
     */
    public static function getList(string $value = ''): array
    {
        $enumerationTranslation = 'site.service_.';
        return [
            self::industry_head                   => __($enumerationTranslation . self::industry_head),
            self::industry_description            => __($enumerationTranslation . self::industry_description),
            self::industry_image                  => 'service-1.png',
            self::feasibility_head                => __($enumerationTranslation . self::feasibility_head),
            self::feasibility_description         => __($enumerationTranslation . self::feasibility_description),
            self::feasibility_image               => 'service-2.png',
            self::funding_head                    => __($enumerationTranslation . self::funding_head),
            self::funding_description             => __($enumerationTranslation . self::funding_description),
            self::funding_image                   => 'service-3.png',
            self::civil_head                      => __($enumerationTranslation . self::civil_head),
            self::civil_description               => __($enumerationTranslation . self::civil_description),
            self::civil_image                     => 'service-4.png',
            self::equipment_head                  => __($enumerationTranslation . self::equipment_head),
            self::equipment_description           => __($enumerationTranslation . self::equipment_description),
            self::equipment_image                 => 'service-5.png',
            self::raw_head                        => __($enumerationTranslation . self::raw_head),
            self::raw_description                 => __($enumerationTranslation . self::raw_description),
            self::raw_image                       => 'service-6.png',
            self::raw_head                        => __($enumerationTranslation . self::raw_head),
            self::raw_description                 => __($enumerationTranslation . self::raw_description),
            self::raw_image                       => 'service-7.png',
            self::hr_supply_head                  => __($enumerationTranslation . self::hr_supply_head),
            self::hr_supply_description           => __($enumerationTranslation . self::hr_supply_description),
            self::hr_supply_image                 => 'service-8.png',
            self::industry_supply_head            => __($enumerationTranslation . self::industry_supply_head),
            self::industry_supply_description     => __($enumerationTranslation . self::industry_supply_description),
            self::industry_supply_image           => 'service-9.png',
            self::governate_head                  => __($enumerationTranslation . self::governate_head),
            self::governate_description           => __($enumerationTranslation . self::governate_description),
            self::governate_image                 => 'service-1.png',
            self::hroperating_head                => __($enumerationTranslation . self::hroperating_head),
            self::hroperating_description         => __($enumerationTranslation . self::hroperating_description),
            self::hroperating_image               => 'service-2.png',
            self::researchmarketing_head          => __($enumerationTranslation . self::researchmarketing_head),
            self::researchmarketing_description   => __($enumerationTranslation . self::researchmarketing_description),
            self::researchmarketing_image         => 'service-5.png',
            self::fundingsell_head                => __($enumerationTranslation . self::fundingsell_head),
            self::fundingsell_description         => __($enumerationTranslation . self::fundingsell_description),
            self::fundingsell_image               => 'service-5.png',
         
        ];
    }


    public static function getKeyList(): array
    {
        return array_keys(self::getList());
    }

    public static function getindustryHead(): string
    {
        return self::industry_head;
    }
    public static function getindustryDescription(): string
    {
        return self::industry_description;
    }
    public static function getindustryImage(): string
    {
        return self::industry_image;
    }
    public static function getfeasibilityHead(): string
    {
        return self::feasibility_head;
    }
    public static function getfeasibilityDescription(): string
    {
        return self::feasibility_description;
    }
    public static function getfeasibilityImage(): string
    {
        return self::feasibility_image;
    }
    public static function getfundingHead(): string
    {
        return self::funding_head;
    }
    public static function getfundingDescription(): string
    {
        return self::funding_description;
    }
    public static function getfundingImage(): string
    {
        return self::funding_image;
    }
    public static function getcivilHead(): string
    {
        return self::civil_head;
    }
    public static function getcivilDescription(): string
    {
        return self::civil_description;
    }
    public static function getcivilImage(): string
    {
        return self::civil_image;
    }
    public static function getequipmentHead(): string
    {
        return self::equipment_head;
    }
    public static function getequipmentDescription(): string
    {
        return self::equipment_description;
    }
    public static function getequipmentImage(): string
    {
        return self::equipment_image;
    }
    public static function getrawHead(): string
    {
        return self::raw_head;
    }
    public static function getrawDescription(): string
    {
        return self::raw_description;
    }
    public static function getrawImage(): string
    {
        return self::hr_supply_image;
    }
    public static function gethr_supplyHead(): string
    {
        return self::hr_supply_head;
    }
    public static function gethr_supplyDescription(): string
    {
        return self::hr_supply_description;
    }
    public static function gethr_supplyImage(): string
    {
        return self::hr_supply_image;
    }
    public static function getindustry_supplyHead(): string
    {
        return self::industry_supply_head;
    }
    public static function getindustry_supplyDescription(): string
    {
        return self::industry_supply_description;
    }
    public static function getindustry_supplyImage(): string
    {
        return self::industry_supply_image;
    }
    public static function getgovernateHead(): string
    {
        return self::governate_head;
    }
    public static function getgovernateDescription(): string
    {
        return self::governate_description;
    }
    public static function getgovernateImage(): string
    {
        return self::governate_image;
    }
    public static function gethroperatingHead(): string
    {
        return self::hroperating_head;
    }
    public static function gethroperatingDescription(): string
    {
        return self::hroperating_description;
    }
    public static function gethroperatingImage(): string
    {
        return self::hroperating_image;
    }
    public static function getresearchmarketingHead(): string
    {
        return self::researchmarketing_head;
    }
    public static function getresearchmarketingDescription(): string
    {
        return self::researchmarketing_description;
    }
    public static function getresearchmarketingImage(): string
    {
        return self::researchmarketing_image;
    }
    public static function getfundingsellHead(): string
    {
        return self::fundingsell_head;
    }
    public static function getfundingsellDescription(): string
    {
        return self::fundingsell_description;
    }
    public static function getfundingsellImage(): string
    {
        return self::fundingsell_image;
    }
}
