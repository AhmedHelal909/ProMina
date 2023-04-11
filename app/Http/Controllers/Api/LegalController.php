<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\LegalRequest;
use App\Http\Resources\LegalResource;
use App\Models\Legal;

class LegalController extends BaseController
{
  public function __construct(Legal $model)
  {
    parent::__construct($model,new LegalResource($model));
  }
  public function store(LegalRequest $request)
  {
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getLegal());

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

