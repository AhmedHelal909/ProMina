<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Advance;
use App\Models\Civil;
use App\Models\Complaint;
use App\Models\Employment;
use App\Models\Equipment;
use App\Models\Feasibility;
use App\Models\Funding;
use App\Models\FundingSell;
use App\Models\Governate;
use App\Models\HROperating;
use App\Models\HRSupply;
use App\Models\Industry;
use App\Models\IndustrySupply;
use App\Models\Raw;
use App\Models\ResearchMarketing;
use App\Models\Resignation;
use App\Models\Revision;
use App\Models\Service;
use App\Models\Suggestion;
use App\Models\Transfer;
use App\Models\Treatment;
use App\Models\Vacation;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public $service;
    public function __construct(Service $service)
    {
        $this->service = $service;

    }
    public function index(Request $request)
    {
        $service = $this->service->get();
        return $this->apiResponse(ServiceResource::collection($service));
    }

    public function store(ServiceRequest $request)
    {
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getService());

        $service= $this->service->create($request->except(['_token','type','_method']));
        if(isset($request->type)){
            session()->flash('success', __('site.add_successfuly'));
            return redirect()->back();
        }
        return $this->apiResponse(new ServiceResource($service));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service= $this->service->find($id);
        if(!is_null($service)){
            
            return $this->apiResponse(new ServiceResource($service));
        }else {
            return $this->errorResponse(__('site.error_subscription'));
        }
    }
    public function getUserService(Request $request)
    {
        if(auth('customer')->user())
        {
            $user = auth('customer')->user();
            $row['governate'] = Governate::where('customer_id',$user->id)->get();
            $row['researchMarketing'] = ResearchMarketing::where('customer_id',$user->id)->get();
            $row['equipment'] = Equipment::where('customer_id',$user->id)->get();
            $row['Civil'] = Civil::where('customer_id',$user->id)->get();
            $row['Feasibility'] = Feasibility::where('customer_id',$user->id)->get();
            $row['Industry'] = Industry::where('customer_id',$user->id)->get();
            $row['industry_supplies'] = IndustrySupply::where('customer_id',$user->id)->get();
            $row['Raw'] = Raw::where('customer_id',$user->id)->get();
            $row['Funding'] = Funding::where('customer_id',$user->id)->get();
            $row['FundingSell'] = FundingSell::where('customer_id',$user->id)->get();
            $row['HRSupply'] = HRSupply::where('customer_id',$user->id)->get();
            $row['HROperating'] = HROperating::where('customer_id',$user->id)->get();
            if(!$request->expectsJson()){
               return $row;
            }else {

                return $this->apiResponse($row);
            }

             



        }else{
            $user = auth('employee')->user();
            $row['advance'] = Advance::where('employee_id',$user->id)->get();
            $row['employment'] = Employment::where('employee_id',$user->id)->get();
            $row['revision'] = Revision::where('employee_id',$user->id)->get();
            $row['treatment'] = Treatment::where('employee_id',$user->id)->get();
            $row['vacation'] = Vacation::where('employee_id',$user->id)->get();
            $row['transfer'] = Transfer::where('employee_id',$user->id)->get();
            $row['resignation'] = Resignation::where('employee_id',$user->id)->get();
            $row['complaint'] = Complaint::where('employee_id',$user->id)->get();
            $row['suggestion'] = Suggestion::where('employee_id',$user->id)->get();
            if(!$request->expectsJson()){
                return $row;
            }else {
                return $this->apiResponse($row);
            }



        }
    }

    // public function update(advanceRequest $request, $id)
    // {
    //     $advance = $this->advance->find($id);
    //     $advance->update($request->all());
    //     return $this->apiResponse(new advanceResource($advance));
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $advance = $this->advance->find($id)->delete();
    //     if($advance){
    //         return $this->apiResponse(__('site.deleted_successfuly'));
    //     }else{
    //         return $this->errorResponse(__('site.modeles.error'));
    //     }
    // }
}

