<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\FundingSellRequest;
use App\Http\Resources\FundingSellResource;
use App\Models\FundingSell;
use Illuminate\Http\Request;

class FundingSellController extends Controller
{
    public $fundingsell;
    public function __construct(FundingSell $fundingsell)
    {
        $this->fundingsell = $fundingsell;

    }
    public function index(Request $request)
    {
        $fundingsell = $this->fundingsell->latest()->paginate(10);
        return $this->apiResponse(FundingSellResource::collection($fundingsell));
    }

    public function store(FundingSellRequest $request)
    {
        $request_data = $request->except(['_token','type','_method']);
          if(auth('customer')->user()){

      $request_data['customer_id'] = auth('customer')->user()->id;
    }
        
        $fundingsell= $this->fundingsell->create($request_data);
        if(isset($request->type)){
            session()->flash('success', __('site.add_successfuly'));
            return redirect()->back();
        }
        callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getFunding());
        return $this->apiResponse(new FundingSellResource($fundingsell));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fundingsell= $this->fundingsell->find($id);
        if(!is_null($fundingsell)){
            
            return $this->apiResponse(new FundingSellResource($fundingsell));
        }else {
            return $this->errorResponse(__('site.error_subscription'));
        }
    }
    public function update(FundingSellRequest $request, $id)
    {
        $fundingsell = $this->fundingsell->find($id);
        $request_data = $request->except(['_token','type','_method','lang']);
        if(checkUpdate($fundingsell) <=48)
        {
  
            $fundingsell->update($request_data);
         callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getFunding());
  
            return $this->apiResponse(new FundingSellResource($fundingsell));
        }else{
            return $this->errorResponse(__('site.error_subscription'));
  
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

