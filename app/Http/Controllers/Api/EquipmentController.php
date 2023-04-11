<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\EquipmentRequest;
use App\Http\Resources\EquipmentResource;
use App\Models\Equipment;

class EquipmentController extends BaseController
{
  public $path = 'equipment';  
  public function __construct(Equipment $model)
  {
    parent::__construct($model,new EquipmentResource($model));
  }
  public function store(EquipmentRequest $request)
  {
    
    $request_data = $request->except(['_token','type','_method','image','lang']);
      if(auth('customer')->user()){

      $request_data['customer_id'] = auth('customer')->user()->id;
    }
    if($request->has('image')){
      
      $request_data['image'] = $this->uploadImagesDynamic($request);
    }
    $model = $this->model->create($request_data);
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getEquipment());
    if(isset($request->type)){
      session()->flash('success', __('site.add_successfuly'));
      return redirect()->back();
  } 
      return $this->apiResponse(new $this->resource($model));
  }
  public function update(EquipmentRequest $request, $id)
  {
      $model = $this->model->find($id);
      $request_data = $request->except(['_token','type','_method','lang']);
      if(checkUpdate($model) <=48)
      {

          $model->update($request_data);
       callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getEquipment());

          return $this->apiResponse(new EquipmentResource($model));
      }else{
          return $this->errorResponse(__('site.error_subscription'));

      }
  }
}

