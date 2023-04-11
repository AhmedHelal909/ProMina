<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\FeasibilityRequest;
use App\Http\Resources\FeasibilityResource;
use App\Models\Feasibility;

class FeasibilityController extends BaseController
{
  public $path = 'feasibilities';  
  public function __construct(Feasibility $model)
  {
    parent::__construct($model,new FeasibilityResource($model));
  }
  public function store(FeasibilityRequest $request)
  {
    
    $request_data = $request->except(['_token','type','_method','image','lang']);
      if(auth('customer')->user()){

      $request_data['customer_id'] = auth('customer')->user()->id;
    }
    
    if($request->has('image')){
      
      $request_data['image'] = $this->uploadImagesDynamic($request);
    }
    $model = $this->model->create($request_data);
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getFeasibility());
    if(isset($request->type)){
      session()->flash('success', __('site.add_successfuly'));
      return redirect()->back();
  }
      return $this->apiResponse(new $this->resource($model));
  }
  public function update(FeasibilityRequest $request, $id)
  {
      $model = $this->model->find($id);
      $request_data = $request->except(['_token','type','_method','lang']);
      if(checkUpdate($model) <=48)
      {

          $model->update($request_data);
       callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getFeasibility());

          return $this->apiResponse(new FeasibilityResource($model));
      }else{
          return $this->errorResponse(__('site.error_subscription'));

      }
  }
}

