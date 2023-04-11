<?php

namespace App\Enum;

class SettingEnum
{

    public const EMAIL_URL                        = 1;
    public const FACEBOOK_URL                     = 2;
    public const TWITTER_URL                      = 3;
    public const SLIDER_TIME                      = 4;
    public const HOME_SECTION_3_video             = 5;
    public const HOME_SECTION_3_h1                = 6;
    public const HOME_SECTION_3_description       = 7;
    public const COMPLETED_projects               = 8;
    public const SATASIFED_ClIENTS                = 9;
    public const WEB_SITE_ANALYSIS                = 10;
    public const CLIENTS_SUPPORT                  = 11;
    public const PHONE                            = 12;
    public const ADDRESS                          = 13;
    public const LINKEDIN                         = 14;
    public const instagram_link                   = 15;
    public const vision                           = 16;
    public const mission                          = 17;
    public const goal                             = 18;


    /**
     * @param string $value
     * @return array
     */
    public static function getList(string $value = ''): array
    {
        $enumerationTranslation = 'site.setting_.';
        return [
            self::EMAIL_URL                       => 'sawaadgroup@sawaadelkhaleg.com',
            self::FACEBOOK_URL                    => 'https://www.facebook.com/SawaadElkhaleg',
            self::TWITTER_URL                     => 'https://twitter.com/ElkhalegSawaad',
            self::SLIDER_TIME                     => 15,
            // self::HOME_SECTION_1                  => 'hero-1.jpg',
            self::HOME_SECTION_3_video            => 'https://www.youtube.com/watch?v=S709PX3u5AA&t=7s',
           //ممكن متكنش ديناميك؟؟؟؟
            self::HOME_SECTION_3_h1               => 
            [
                'en'=> __('site.HOME_SECTION_3_h1',[],'en'),
                'ar'=> __('site.HOME_SECTION_3_h1',[],'ar'),
            ],
            
            
            
            self::HOME_SECTION_3_description      =>  [
                'en'=> __('site.HOME_SECTION_3_h1',[],'en'),
                'ar'=> __('site.HOME_SECTION_3_h1',[],'ar'),
            ],
          
            self::COMPLETED_projects              => '24',
            self::SATASIFED_ClIENTS               => '500',
            self::WEB_SITE_ANALYSIS               => '99',
            self::CLIENTS_SUPPORT                 => '80',
            self::PHONE                           => '00966550931076',
            self::ADDRESS                         => [
                'en'=> __('site.site_address',[],'en'),
                'ar'=> __('site.site_address',[],'ar'),
            ],
            self::LINKEDIN                        => 'https://www.linkedin.com/company/sawaad-elkhaleeg/',
            self::instagram_link                  =>'https://instagram.com/sawaad.elkhaleg?igshid=MWI4MTIyMDE=',
            self::vision                          => [
                'en'=> __('site.vision_description',[],'en'),
                'ar'=> __('site.vision_description',[],'ar'),
            ],
            self::mission                         => [
                'en'=> __('site.mission_description',[],'en'),
                'ar'=> __('site.mission_description',[],'ar'),
            ],
            self::goal                         => [
                'en'=> __('site.objectives_description',[],'en'),
                'ar'=> __('site.objectives_description',[],'ar'),
            ],
       
         
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
    public static function getEmail(): string
    {
        return self::EMAIL_URL;
    }


    /**
     * @return string
     */
    public static function getFacebook(): string
    {
        return self::FACEBOOK_URL;
    }
    public static function getTwitter(): string
    {
        return self::TWITTER_URL;
    }
    public static function getSliderTime(): string
    {
        return self::SLIDER_TIME;
    }
    // public static function getHomeSection1(): string
    // {
    //     return self::HOME_SECTION_1;
    // }
    public static function getHomeSection3Video(): string
    {
        return self::HOME_SECTION_3_video;
    }
    public static function getHomeSection3H1(): string
    {
        return self::HOME_SECTION_3_h1;
    }
    public static function getHomeSection3Description(): string
    {
        return self::HOME_SECTION_3_description;
    }
    public static function getCompletedProjects(): string
    {
        return self::COMPLETED_projects;
    }
    public static function getSatisfiedClients(): string
    {
        return self::SATASIFED_ClIENTS;
    }
    public static function getWebAnalysis(): string
    {
        return self::WEB_SITE_ANALYSIS;
    }
    public static function getClientsSupport(): string
    {
        return self::CLIENTS_SUPPORT;
    }
    public static function getPhone(): string
    {
        return self::PHONE;
    }
    public static function getAddress(): string
    {
        return self::ADDRESS;
    }
    public static function getLinkedin(): string
    {
        return self::LINKEDIN;
    }
    public static function getinstagramLink(): string
    {
        return self::instagram_link;
    }
    public static function getvision(): string
    {
        return self::vision;
    }
    public static function getmisssion(): string
    {
        return self::mission;
    }
    public static function getgoal(): string
    {
        return self::goal;
    }

   
  
}
