<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\FundingRequest;
use App\Http\Resources\FundingResource;
use App\Models\Funding;

class FundingController extends BaseController
{
  public $path = 'fundings';  
  public function __construct(Funding $model)
  {
    parent::__construct($model,new FundingResource($model));
  }
  public function store(FundingRequest $request)
  {
    $request_data = $request->except(['_token','type','_method','image','lang']);
      if(auth('customer')->user()){

      $request_data['customer_id'] = auth('customer')->user()->id;
    }

    if($request->has('image')){

      $request_data['image'] = $this->uploadImagesDynamic($request);
    }
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getFunding());

    $model = $this->model->create($request_data);
    if(isset($request->type)){
      session()->flash('success', __('site.add_successfuly'));
      return redirect()->route('Frontend.Frontend.service.create',['type'=>3]);
  }
    return $this->apiResponse(new $this->resource($model));
  }
  public function update(FundingRequest $request, $id)
  {
      $model = $this->model->find($id);
      $request_data = $request->except(['_token','type','_method','lang']);
      if(checkUpdate($model) <=48)
      {

          $model->update($request_data);
       callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getFunding());

          return $this->apiResponse(new FundingResource($model));
      }else{
          return $this->errorResponse(__('site.error_subscription'));

      }
  }
}

