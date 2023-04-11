<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\FinanceRequest;
use App\Http\Resources\FinanceResource;
use App\Models\Finance;

class FinanceController extends BaseController
{
  public function __construct(Finance $model)
  {
    parent::__construct($model,new FinanceResource($model));
  }
  public function store(FinanceRequest $request)
  {
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getFinance());

    $request_data = $request->except(['image','type']);
    $request_data['employee_id'] = auth('employee')->user()->id;

    // $request_data['image'] = $this->uploadImagesDynamic($request);

    $model = $this->model->create($request_data);
    if(isset($request->type)){
      session()->flash('success', __('site.add_successfuly'));
      return redirect()->back();
  }
      $model = $this->model->create($request_data);
      return $this->apiResponse(new $this->resource($model));
  }
}

