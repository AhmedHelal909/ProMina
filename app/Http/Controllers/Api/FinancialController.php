<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\FinancialRequest;
use App\Http\Resources\FinancialResource;
use App\Models\Financial;

class FinancialController extends BaseController
{
  public $path = 'financials';  
  public function __construct(Financial $model)
  {
    parent::__construct($model,new FinancialResource($model));
  }
  public function store(FinancialRequest $request)
  {
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getFinancial());

      $request_data = $request->except(['image']);
      $request_data['image'] = $this->uploadImagesDynamic($request);
      $model = $this->model->create($request_data);
      return $this->apiResponse(new $this->resource($model));
  }
}

