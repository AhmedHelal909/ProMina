<?php

use App\Models\Ad;
use App\Models\Advance;
use App\Models\Civil;
use App\Models\Complaint;
use App\Models\Employment;
use App\Models\Equipment;
use App\Models\Feasibility;
use App\Models\Finance;
use App\Models\Funding;
use App\Models\FundingSell;
use App\Models\Governate;
use App\Models\Hr;
use App\Models\HROperating;
use App\Models\HRSupply;
use App\Models\Industry;
use App\Models\IndustrySupply;
use App\Models\Investment;
use App\Models\IT;
use App\Models\Legal;
use App\Models\Logo;
use App\Models\Marketing;
use App\Models\MarketingManagement;
use App\Models\Notification;
use App\Models\OperatingManagement;
use App\Models\OurTeam;
use App\Models\Polarization;
use App\Models\Raw;
use App\Models\Report;
use App\Models\ResearchMarketing;
use App\Models\Resignation;
use App\Models\Revision;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Site;
use App\Models\Slider;
use App\Models\Suggestion;
use App\Models\Transfer;
use App\Models\Treatment;
use App\Models\Vacation;
use Carbon\Carbon;
use Kutia\Larafirebase\Facades\Larafirebase;


if (!function_exists('getSettingValue')) {
    function getSettingValue($key)
    {
        return strip_tags(Setting::where('id', $key)->pluck('value', 'id')->first());
    }
}
if (!function_exists('getReportValue')) {
    function getReportValue($key)
    {
        return strip_tags(Report::where('id', $key)->pluck('value', 'id')->first());
    }
}
if (!function_exists('getSettingKey')) {
    function getSettingKey($key)
    {
        return strip_tags(Setting::where('id', $key)->pluck('key', 'id')->first());
    }
}

if (!function_exists('getSliders')) {
    function getSliders()
    {
        return Slider::get();
    }
}
if (!function_exists('getAds')) {
    function getAds()
    {
        return Ad::get();
    }
}
if (!function_exists('getLogo')) {
    function getLogo()
    {
        return Logo::first();
    }
}
if (!function_exists('getService')) {
    function getService()
    {
        return Service::where('type', 0)->orderBy('arrange','asc')->get();

    }
}
if (!function_exists('getEmployeeService')) {
    function getEmployeeService()
    {
        return Service::where('type', 1)->orderBy('arrange','asc')->get();
    }
}
if (!function_exists('getEmployeeServiceValue')) {
    function getEmployeeServiceValue($key)
    {
        return (Service::where(['type'=> 1,'head_key'=>$key])->pluck('name', 'id')->first());
    }
}
if (!function_exists('getCustomerServiceValue')) {
    function getCustomerServiceValue($key)
    {
        return (Service::where(['type'=> 0,'head_key'=>$key])->pluck('name', 'id')->first());
    }
}
if (!function_exists('getCustomerServiceDesc')) {
    function getCustomerServiceDesc($key)
    {
        return strip_tags(Service::where(['type'=> 0,'description_key'=>$key])->pluck('description', 'id')->first());
    }
}
if (!function_exists('getOurTeam')) {
    function getOurTeam()
    {
        return OurTeam::get();
    }
}
if (!function_exists('checkUpdate')) {
    function checkUpdate($model)
    {
       $from = $model->created_at;
       $to = Carbon::now();
       return $diff = $to->diffInHours($from);
    }
}
if (!function_exists('callFireBase')) {
    function callFireBase(string $title,string $body ,$type )
    {
        if(auth('employee')->user()){
            $user = auth('employee')->user();
            $token = $user->token_firebase;
            $guard = 'employee';
        }else if(auth('customer')->user()){
            $user = auth('customer')->user();
        $token = $user->token_firebase;
        $guard = 'customer';

        }else {
            $token = null;
        }
        if($token == null){
            return;
        }

        Notification::create([
            'title'=>[
                'en'=> __('site.notification',[],'en'),
                'ar'=> __('site.notification',[],'ar'),
            ],
            'body'=>[
                'en'=> __('site.send_success',[],'en'),
                'ar'=> __('site.send_success',[],'ar'),
            ],
            'type'=>$type,
            'user_id'=>$user->id,
            'guard'=>$guard,
        ]);
        
        return Larafirebase::withTitle(__('site.notification'))
        ->withBody(__('site.send_success'))
        ->withPriority('high')
        ->sendNotification($token);
    }
}
if (!function_exists('countCustomerService')) {
    function countCustomerService()
    {
        $row['sum']       = Governate::count();
        $row['sum']  += ResearchMarketing::count();
        $row['sum']    += Equipment::count();
        $row['sum']    += Civil::count();
        $row['sum']    += Feasibility::count();
        $row['sum']   += Industry::count();
        $row['sum']   += Funding::count();
        $row['sum']  += Raw::count();
        $row['sum']   += FundingSell::count();
        $row['sum']       += HROperating::count();
        $row['sum']       += HRSupply::count();
        $row['sum']       += IndustrySupply::count();

        $row['unread']       = Governate::where('is_read',2)->count();
        $row['unread']  += ResearchMarketing::where('is_read',2)->count();
        $row['unread']    += Equipment::where('is_read',2)->count();
        $row['unread']    += Civil::where('is_read',2)->count();
        $row['unread']    += Feasibility::where('is_read',2)->count();
        $row['unread']   += Industry::where('is_read',2)->count();
        $row['unread']   += Funding::where('is_read',2)->count();
        $row['unread']  += Raw::where('is_read',2)->count();
        $row['unread']   += FundingSell::where('is_read',2)->count();
        $row['unread']       += HROperating::where('is_read',2)->count();
        $row['unread']       += HRSupply::where('is_read',2)->count();
        $row['unread']       += IndustrySupply::where('is_read',2)->count();
        return $row;
    }
}

if (!function_exists('countEmployeeService')) {
    function countEmployeeService()
    {
       
        $row['sum']  = Employment::count();
        $row['sum']  += Advance::count();
        $row['sum']  += Revision::count();
        $row['sum']  += Treatment::count();
        $row['sum']  += Vacation::count();
        $row['sum']  += Transfer::count();
        $row['sum']  += Resignation::count();
        $row['sum']  += Complaint::count();
        $row['sum']  += Suggestion::count();

        $row['unread']  = Employment::where('is_read',2)->count();
        $row['unread']  += Advance::where('is_read',2)->count();
        $row['unread']  += Revision::where('is_read',2)->count();
        $row['unread']  += Treatment::where('is_read',2)->count();
        $row['unread']  += Vacation::where('is_read',2)->count();
        $row['unread']  += Transfer::where('is_read',2)->count();
        $row['unread']  += Resignation::where('is_read',2)->count();
        $row['unread']  += Complaint::where('is_read',2)->count();
        $row['unread']  += Suggestion::where('is_read',2)->count();
        return $row;

    }
}
if (!function_exists('countReport')) {
    function countReport()
    {
       

        $row['sum']  = Hr::count();
        $row['sum'] += Polarization::count();
        $row['sum'] += IT::count();
        $row['sum'] += Legal::count();
        $row['sum'] += MarketingManagement::count();
        $row['sum'] += Site::count();
        $row['sum'] += Finance::count();
        $row['sum'] += Marketing::count();
        $row['sum'] += OperatingManagement::count();
        $row['sum'] += Investment::count();

        $row['unread']  = Hr::where('is_read',2)->count();
        $row['unread'] += Polarization::where('is_read',2)->count();
        $row['unread'] += IT::where('is_read',2)->count();
        $row['unread'] += Legal::where('is_read',2)->count();
        $row['unread'] += MarketingManagement::where('is_read',2)->count();
        $row['unread'] += Site::where('is_read',2)->count();
        $row['unread'] += Finance::where('is_read',2)->count();
        $row['unread'] += Marketing::where('is_read',2)->count();
        $row['unread'] += OperatingManagement::where('is_read',2)->count();
        $row['unread'] += Investment::where('is_read',2)->count();
        return $row;


    }
}
