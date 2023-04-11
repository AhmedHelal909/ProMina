<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\HrRequest;
use App\Http\Resources\HrResource;
use App\Models\Hr;

class HrController extends BaseController
{
  public $path = 'hrs';  
  public function __construct(Hr $model)
  {
    parent::__construct($model,new HrResource($model));
  }
  public function store(HrRequest $request)
  {
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getHR());

    $request_data = $request->except(['image','type']);
    // $request_data['image'] = $this->uploadImagesDynamic($request);
    $request_data['employee_id'] = auth('employee')->user()->id;
    
    $model = $this->model->create($request_data);
    if(isset($request->type)){
      session()->flash('success', __('site.add_successfuly'));
      return redirect()->back();
  }
      $model = $this->model->create($request_data);
      return $this->apiResponse(new $this->resource($model));
  }
}

