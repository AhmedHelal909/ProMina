<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\OperatingManagementRequest;
use App\Http\Resources\OperatingManagementResource;
use App\Models\OperatingManagement;

class OperatingManagementController extends BaseController
{
  public function __construct(OperatingManagement $model)
  {
    parent::__construct($model,new OperatingManagementResource($model));
  }
  public function store(OperatingManagementRequest $request)
  {
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getOperatingManagement());

    $request_data = $request->except(['image','type','functional_needs']);

    // $request_data['image'] = $this->uploadImagesDynamic($request);
    $request_data['job_needs'] = $request->functional_needs;
    $model = $this->model->create($request_data);
    if(isset($request->type)){
      session()->flash('success', __('site.add_successfuly'));
      return redirect()->back();
  }
      return $this->apiResponse(new $this->resource($model));
  }
}

