<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\CivilRequest;
use App\Http\Resources\CivilResource;
use App\Models\Civil;

class CivilController extends BaseController
{
  public $path = 'civils';  
  public function __construct(Civil $model)
  {
    parent::__construct($model,new CivilResource($model));
  }
  public function store(CivilRequest $request)
  {
    $request_data = $request->except(['_token','type','_method','image','lang']);
      if(auth('customer')->user()){

      $request_data['customer_id'] = auth('customer')->user()->id;
    }

      if($request->has('image')){

        $request_data['image'] = $this->uploadImagesDynamic($request);
      }
      callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getCivil());

      $model = $this->model->create($request_data);
      if(isset($request->type)){
        session()->flash('success', __('site.add_successfuly'));
        return redirect()->back();
    }
      return $this->apiResponse(new $this->resource($model));
  }
  public function update(CivilRequest $request, $id)
  {
      $model = $this->model->find($id);
      $request_data = $request->except(['_token','type','_method','lang']);
      if(checkUpdate($model) <=48)
      {

          $model->update($request_data);
       callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getCivil());

          return $this->apiResponse(new CivilResource($model));
      }else{
          return $this->errorResponse(__('site.error_subscription'));

      }
  }

}

