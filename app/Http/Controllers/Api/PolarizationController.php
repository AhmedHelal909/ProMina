<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\PolarizationRequest;
use App\Http\Resources\PolarizationResource;
use App\Models\Polarization;

class PolarizationController extends BaseController
{
  public function __construct(Polarization $model)
  {
    parent::__construct($model,new PolarizationResource($model));
  }
  public function store(PolarizationRequest $request)
  {
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getPolarization());

      $request_data = $request->except(['image','type']);
      // $request_data['image'] = $this->uploadImagesDynamic($request);
      $request_data['employee_id'] = auth('employee')->user()->id;

      $model = $this->model->create($request_data);
      if(isset($request->type)){
        session()->flash('success', __('site.add_successfuly'));
        return redirect()->back();
    }
      return $this->apiResponse(new $this->resource($model));
  }
}

