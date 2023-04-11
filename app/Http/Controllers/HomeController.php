<?php

namespace App\Http\Controllers;

use App\Models\Advance;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Civil;
use App\Models\Complaint;
use App\Models\Contact;
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
use App\Models\Marketing;
use App\Models\MarketingManagement;
use App\Models\OperatingManagement;
use App\Models\Polarization;
use App\Models\Price;
use App\Models\Raw;
use App\Models\ResearchMarketing;
use App\Models\Resignation;
use App\Models\Revision;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Site;
use App\Models\Skill;
use App\Models\Slider;
use App\Models\Suggestion;
use App\Models\Testimonial;
use App\Models\Transfer;
use App\Models\Treatment;
use App\Models\Vacation;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $type = request()->type;
        if($type !=null){
        if($type ==1){
            $row['governate']       = Governate::count();
            $row['governate_unread']       = Governate::where('is_read',2)->count();
            $row['researchmarketing']     = ResearchMarketing::count();
            $row['researchmarketing_unread']     = ResearchMarketing::where('is_read',2)->count();
            $row['equipment']    = Equipment::count();
            $row['equipment_unread']    = Equipment::where('is_read',2)->count();
            $row['civil']     = Civil::count();
            $row['civil_unread']     = Civil::where('is_read',2)->count();
            $row['feasibilities']     = Feasibility::count();
            $row['feasibilities_unread']     = Feasibility::where('is_read',2)->count();
            $row['industries']    = Industry::count();
            $row['industries_unread']    = Industry::where('is_read',2)->count();
            $row['fundings']    = Funding::count();
            $row['fundings_unread']    = Funding::where('is_read',2)->count();
            $row['raws']  = Raw::count();
            $row['raws_unread']  = Raw::where('is_read',2)->count();
            $row['fundingsell']   = FundingSell::count();
            $row['fundingsell_unread']   = FundingSell::where('is_read',2)->count();
            $row['hroperatings']       = HROperating::count();
            $row['hroperatings_unread']       = HROperating::where('is_read',2)->count();
            $row['hrsupplies']       = HRSupply::count();
            $row['hrsupplies_unread']       = HRSupply::where('is_read',2)->count();
            $row['industrySupplies']       = IndustrySupply::count();
            $row['industrySupplies_unread']       = IndustrySupply::where('is_read',2)->count();
        }else if($type==2)
        {
            $row['employment']   = Employment::count();
            $row['employment_pending']   = Employment::where('is_read',2)->count();
            $row['advance']      = Advance::count();
            $row['advance_pending']      = Advance::where('is_read',2)->count();
            $row['revisions']    = Revision::count();
            $row['revisions_pending']    = Revision::where('is_read',2)->count();
            $row['treatments']   = Treatment::count();
            $row['treatments_pending']   = Treatment::where('is_read',2)->count();
            $row['vacations']    = Vacation::count();
            $row['vacations_pending']    = Vacation::count();
            $row['transfers']    = Transfer::count();
            $row['transfers_pending']    = Transfer::where('is_read',2)->count();
            $row['resignations'] = Resignation::count();
            $row['resignations_pending'] = Resignation::where('is_read',2)->count();
            $row['complaints']   = Complaint::count();
            $row['complaints_pending']   = Complaint::where('is_read',2)->count();
            $row['suggestions']  = Suggestion::count();
            $row['suggestions_pending']  = Suggestion::count();
          


        } else if($type == 3)
        {
            $row['hr'] = Hr::count();
            $row['hr_today'] = Hr::where('is_read',2)->count();
            $row['polarizaion'] = Polarization::count();
            $row['polarizaion_today'] = Polarization::where('is_read',2)->count();
            $row['IT'] = IT::count();
            $row['IT_today'] = IT::where('is_read',2)->count();
            $row['legal'] = Legal::count();
            $row['legal_today'] = Legal::where('is_read',2)->count();
            $row['marketing_management'] = MarketingManagement::count();
            $row['marketing_management_today'] = MarketingManagement::where('is_read',2)->count();
            $row['sites'] = Site::count();
            $row['sites_today'] = Site::where('is_read',2)->count();
            $row['finances'] = Finance::count();
            $row['finances_today'] = Finance::where('is_read',2)->count();
            $row['marketings'] = Marketing::count();
            $row['marketings_today'] = Marketing::where('is_read',2)->count();
            $row['operating_management'] = OperatingManagement::count();
            $row['operating_management_today'] = OperatingManagement::where('is_read',2)->count();
            $row['investment'] = Investment::count();
            $row['investment_today'] = Investment::where('is_read',2)->count();

        }
        return view('dashboard.home',compact('type','row'));
    }else {
        return view('dashboard.home');

    }
    }
}
