<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\OperatingRequest;
use App\Http\Resources\OperatingResource;
use App\Models\Operating;

class OperatingController extends BaseController
{
  public $path = 'operatings';  
  public function __construct(Operating $model)
  {
    parent::__construct($model,new OperatingResource($model));
  }
  public function store(OperatingRequest $request)
  {
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getOperating());

      $request_data = $request->except(['image']);
      $request_data['image'] = $this->uploadImagesDynamic($request);
      $model = $this->model->create($request_data);
      return $this->apiResponse(new $this->resource($model));
  }
}

