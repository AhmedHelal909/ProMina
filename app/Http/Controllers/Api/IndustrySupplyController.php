<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\IndustrySupplyRequest;
use App\Http\Resources\IndustrySupplyResource;
use App\Models\IndustrySupply;
use Illuminate\Http\Request;

class IndustrySupplyController extends Controller
{
    public $hrSupply;
    public function __construct(IndustrySupply $hrSupply)
    {
        $this->hrSupply = $hrSupply;

    }
    public function index(Request $request)
    {
        $hrSupply = $this->hrSupply->latest()->paginate(10);
        return $this->apiResponse(IndustrySupplyResource::collection($hrSupply));
    }

    public function store(IndustrySupplyRequest $request)
    {
        $request_data = $request->except(['_token','type','_method']);
          if(auth('customer')->user()){

      $request_data['customer_id'] = auth('customer')->user()->id;
    }
        
        $advance= $this->hrSupply->create($request_data);
        callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getIndustry_Supply());
        if(isset($request->type)){
            session()->flash('success', __('site.add_successfuly'));
            return redirect()->back();
        }
        return $this->apiResponse(new IndustrySupplyResource($advance));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hrSupply= $this->hrSupply->find($id);
        if(!is_null($hrSupply)){
            
            return $this->apiResponse(new IndustrySupplyResource($hrSupply));
        }else {
            return $this->errorResponse(__('site.error_subscription'));
        }
    }

    public function update(IndustrySupplyRequest $request, $id)
    {
        $hrSupply = $this->hrSupply->find($id);
        $request_data = $request->except(['_token','type','_method','lang']);
        if(checkUpdate($hrSupply) <=48)
        {
  
            $hrSupply->update($request_data);
         callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getIndustry_Supply());
  
            return $this->apiResponse(new IndustrySupplyResource($hrSupply));
        }else{
            return $this->errorResponse(__('site.error_subscription'));
  
        }
    }
}

