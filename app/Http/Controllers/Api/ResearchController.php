<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\ResearchRequest;
use App\Http\Resources\ResearchResource;
use App\Models\Research;

class ResearchController extends BaseController
{
  public $path = 'research';  
  public function __construct(Research $model)
  {
    parent::__construct($model,new ResearchResource($model));
  }
  public function store(ResearchRequest $request)
  {
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getResearch());

      $request_data = $request->except(['image']);
      $request_data['image'] = $this->uploadImagesDynamic($request);
      $model = $this->model->create($request_data);
      return $this->apiResponse(new $this->resource($model));
  }
}

