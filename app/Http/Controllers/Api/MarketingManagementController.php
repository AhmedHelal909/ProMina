<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\MarketingManagementRequest;
use App\Http\Resources\MarketingManagmentResource;
use App\Models\MarketingManagement;

class MarketingManagementController extends BaseController
{
  public function __construct(MarketingManagement $model)
  {
    parent::__construct($model,new MarketingManagmentResource($model));
  }
  public function store(MarketingManagementRequest $request)
  {
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getMarketingManagement());

    $request_data = $request->except(['image','type']);

    // $request_data['image'] = $this->uploadImagesDynamic($request);
    $model = $this->model->create($request_data);
    $request_data['employee_id'] = auth('employee')->user()->id;

    if(isset($request->type)){
      session()->flash('success', __('site.add_successfuly'));
      return redirect()->back();
  }
      return $this->apiResponse(new $this->resource($model));
  }
}

