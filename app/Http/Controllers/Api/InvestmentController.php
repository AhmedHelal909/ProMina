<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\InvestmentRequest;
use App\Http\Resources\InvestmentResource;
use App\Models\Investment;

class InvestmentController extends BaseController
{
  public $path = 'investments';  
  public function __construct(Investment $model)
  {
    parent::__construct($model,new InvestmentResource($model));
  }
  public function store(InvestmentRequest $request)
  {
      
      $request_data = $request->except(['image','type']);
      $request_data['employee_id'] = auth('employee')->user()->id;
      $model = $this->model->create($request_data);
      if(isset($request->type)){
        session()->flash('success', __('site.add_successfuly'));
        return redirect()->back();
    }
      return $this->apiResponse(new $this->resource($model));
  }
}

