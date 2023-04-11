<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\SiteRequest;
use App\Http\Resources\SiteResource;
use App\Models\Site;

class SiteController extends BaseController
{
  public function __construct(Site $model)
  {
    parent::__construct($model,new SiteResource($model));
  }
  public function store(SiteRequest $request)
  {
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getSite());

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

