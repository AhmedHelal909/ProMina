<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\MarketingRequest;
use App\Http\Resources\MarketingResource;
use App\Models\Marketing;

class MarketingController extends BaseController
{
  public function __construct(Marketing $model)
  {
    parent::__construct($model,new MarketingResource($model));
  }
  public function store(MarketingRequest $request)
  {

    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getMarketing());


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

