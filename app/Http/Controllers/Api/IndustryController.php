<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\IndustryRequest;
use App\Http\Resources\IndustryResource;
use App\Models\Industry;

class IndustryController extends BaseController
{
  public $path = 'industries';  
  public function __construct(Industry $model)
  {
    parent::__construct($model,new IndustryResource($model));
  }
  public function store(IndustryRequest $request)
  {
    
    $request_data = $request->except(['_token','type','_method','image','lang']);
      if(auth('customer')->user()){

      $request_data['customer_id'] = auth('customer')->user()->id;
    }

    if($request->has('image')){
      
      $request_data['image'] = $this->uploadImagesDynamic($request);
    }
    $model = $this->model->create($request_data);
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getIndustry());
    if(isset($request->type)){
        session()->flash('success', __('site.add_successfuly'));
        return redirect()->back();
    }
      return $this->apiResponse(new $this->resource($model));
  }
  public function update(IndustryRequest $request, $id)
  {
      $model = $this->model->find($id);
      $request_data = $request->except(['_token','type','_method','lang']);
      if(checkUpdate($model) <=48)
      {

          $model->update($request_data);
       callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getIndustry());

          return $this->apiResponse(new IndustryResource($model));
      }else{
          return $this->errorResponse(__('site.error_subscription'));

      }
  }
}

