<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\ResearchMarketingRequest;
use App\Http\Resources\ResearchMarketingResource;
use App\Models\HROperating;
use Illuminate\Http\Request;

class ResearchMarketingController extends Controller
{
    public $researchmarketing;
    public function __construct(HROperating $researchmarketing)
    {
        $this->researchmarketing = $researchmarketing;

    }
    public function index(Request $request)
    {
        $researchmarketing = $this->researchmarketing->latest()->paginate(10);
        return $this->apiResponse(ResearchMarketingResource::collection($researchmarketing));
    }

    public function store(ResearchMarketingRequest $request)
    {
        $request_data = $request->except(['_token','type','_method']);
          if(auth('customer')->user()){

      $request_data['customer_id'] = auth('customer')->user()->id;
    }
        $researchmarketing= $this->researchmarketing->create($request_data);
        callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getREsearchMarketing());
        if(isset($request->type)){
            session()->flash('success', __('site.add_successfuly'));
            return redirect()->back();
        }
        return $this->apiResponse(new ResearchMarketingResource($researchmarketing));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $researchmarketing= $this->researchmarketing->find($id);
        if(!is_null($researchmarketing)){
            
            return $this->apiResponse(new ResearchMarketingResource($researchmarketing));
        }else {
            return $this->errorResponse(__('site.error_subscription'));
        }
    }

    public function update(ResearchMarketingRequest $request, $id)
    {
        $researchmarketing = $this->researchmarketing->find($id);
        $request_data = $request->except(['_token','type','_method','lang']);
        if(checkUpdate($researchmarketing) <=48)
        {

            $researchmarketing->update($request_data);
         callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getREsearchMarketing());

            return $this->apiResponse(new ResearchMarketingResource($researchmarketing));
        }else{
            return $this->errorResponse(__('site.error_subscription'));

        }
    }
}

