<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\RawRequest;
use App\Http\Resources\RawResource;
use App\Models\Raw;

class RawController extends BaseController
{
  public $path = 'raws';  
  public function __construct(Raw $model)
  {
    parent::__construct($model,new RawResource($model));
  }
  public function store(RawRequest $request)
  {
    
    $request_data = $request->except(['_token','type','_method','image','lang']);
      if(auth('customer')->user()){

      $request_data['customer_id'] = auth('customer')->user()->id;
    }

    if($request->has('image')){
      
      $request_data['image'] = $this->uploadImagesDynamic($request);
    }
    $model = $this->model->create($request_data);
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getRaw());
    if(isset($request->type)){
      session()->flash('success', __('site.add_successfuly'));
      return redirect()->back();
  }
    return $this->apiResponse(new $this->resource($model));
  }
  public function update(RawRequest $request, $id)
  {
      $model = $this->model->find($id);
      $request_data = $request->except(['_token','type','_method','lang']);
      if(checkUpdate($model) <=48)
      {

          $model->update($request_data);
       callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getRaw());

          return $this->apiResponse(new RawResource($model));
      }else{
          return $this->errorResponse(__('site.error_subscription'));

      }
  }
}

