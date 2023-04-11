<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\GovernateRequest;
use App\Http\Requests\HRSupplyRequest;
use App\Http\Resources\AdvanceResource;
use App\Http\Resources\GovernateResource;
use App\Models\Governate;
use App\Models\HRSupply;
use Illuminate\Http\Request;

class GovernateController extends Controller
{
    public $governate;
    public function __construct(Governate $governate)
    {
        $this->governate = $governate;

    }
    public function index(Request $request)
    {
        $governate = $this->governate->latest()->paginate(10);
        return $this->apiResponse(GovernateResource::collection($governate));
    }

    public function store(GovernateRequest $request)
    {
        $request_data = $request->except(['_token','type','_method']);
          if(auth('customer')->user()){

      $request_data['customer_id'] = auth('customer')->user()->id;
    }
        $advance= $this->governate->create($request_data);
        callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getGovernate());
        if(isset($request->type)){
            session()->flash('success', __('site.add_successfuly'));
            return redirect()->back();
        }
        return $this->apiResponse(new GovernateResource($advance));
    }
    public function update(GovernateRequest $request, $id)
    {
        $governate = $this->governate->find($id);
        $request_data = $request->except(['_token','type','_method','lang']);
        if(checkUpdate($governate) <=48)
        {

            $governate->update($request_data);
         callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getGovernate());

            return $this->apiResponse(new GovernateResource($governate));
        }else{
            return $this->errorResponse(__('site.error_subscription'));

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $governate= $this->governate->find($id);
        if(!is_null($governate)){
            
            return $this->apiResponse(new GovernateResource($governate));
        }else {
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

