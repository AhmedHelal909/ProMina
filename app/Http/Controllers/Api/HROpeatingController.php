<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\HROperatingRequest;
use App\Http\Requests\HRSupplyRequest;
use App\Http\Resources\AdvanceResource;
use App\Http\Resources\HROperatingResource;
use App\Models\HROperating;
use App\Models\HRSupply;
use Illuminate\Http\Request;

class HROpeatingController extends Controller
{
    public $hropearting;
    public function __construct(HROperating $hropearting)
    {
        $this->hropearting = $hropearting;

    }
    public function index(Request $request)
    {
        $hropearting = $this->hropearting->latest()->paginate(10);
        return $this->apiResponse(AdvanceResource::collection($hropearting));
    }

    public function store(HROperatingRequest $request)
    {
        $request_data = $request->except(['_token','type','_method']);
          if(auth('customer')->user()){

      $request_data['customer_id'] = auth('customer')->user()->id;
    }
        
        $hropearting= $this->hropearting->create($request_data);
        callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getHROperating());
        if(isset($request->type)){
            session()->flash('success', __('site.add_successfuly'));
            return redirect()->back();
        }
        return $this->apiResponse(new HROperatingResource($hropearting));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hropearting= $this->hropearting->find($id);
        if(!is_null($hropearting)){
            
            return $this->apiResponse(new HROperatingResource($hropearting));
        }else {
            return $this->errorResponse(__('site.error_subscription'));
        }
    }

    public function update(HROperatingRequest $request, $id)
    {
        $hropearting = $this->hropearting->find($id);
        $request_data = $request->except(['_token','type','_method','lang']);
        if(checkUpdate($hropearting) <=48)
        {
  
            $hropearting->update($request_data);
         callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getIndustry());
  
            return $this->apiResponse(new HROperatingResource($hropearting));
        }else{
            return $this->errorResponse(__('site.error_subscription'));
  
        }
    }
}

