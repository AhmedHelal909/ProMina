<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\ItRequest;
use App\Http\Resources\ITResource;
use App\Models\IT;

class ITController extends BaseController
{
  public function __construct(IT $model)
  {
    parent::__construct($model,new ITResource($model));
  }
  public function store(ItRequest $request)
  {
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getIT());

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

