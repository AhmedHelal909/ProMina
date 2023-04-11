<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\EmploymentRequest;
use App\Http\Resources\EmploymentResource;
use App\Models\Employment;
use Illuminate\Http\Request;

class EmploymentController extends Controller
{
    public $employment;
    public function __construct(Employment $employment)
    {
        $this->employment = $employment;

    }
    public function index(Request $request)
    {
        $employment = $this->employment->latest()->paginate(10);
        return $this->apiResponse(EmploymentResource::collection($employment));
    }

    public function store(EmploymentRequest $request)
    {

        $employment= $this->employment->create([
            'name'=>auth('employee')->user()->first_name,
            'factory'=>auth('employee')->user()->factory,
            'phone'=>auth('employee')->user()->phone,
            'friend_name'=>$request->friend_name,
            'friend_phone'=>$request->friend_phone,
            'employee_id'=>auth('employee')->user()->id

        ]);
       callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getEmployment());

        if(isset($request->type)){
            session()->flash('success', __('site.add_successfuly'));
            return redirect()->back();
        }
        return $this->apiResponse(new EmploymentResource($employment));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employment= $this->employment->find($id);
        if(!is_null($employment)){
            
            return $this->apiResponse(new EmploymentResource($employment));
        }else {
            return $this->errorResponse(__('site.error_subscription'));
        }
    }

    public function update(EmploymentRequest $request, $id)
    {
        $employment = $this->employment->find($id);
        if(checkUpdate($employment) <=48)
        {

            $employment->update([
                'name'=>auth('employee')->user()->first_name,
                'factory'=>auth('employee')->user()->factory,
                'phone'=>auth('employee')->user()->phone,
                'friend_name'=>$request->friend_name,
                'friend_phone'=>$request->friend_phone,
                'employee_id'=>auth('employee')->user()->id

            ]);
         callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getEmployment());

            return $this->apiResponse(new EmploymentResource($employment));
        }else{
            return $this->errorResponse(__('site.error_subscription'));

        }
    }
    // public function destroy($id)
    // {
    //     $advance = $this->advance->find($id)->delete();
    //     if($advance){
    //         return $this->apiResponse(__('site.deleted_successfuly'));
    //     }else{
    //         return $this->errorResponse(__('site.modeles.error'));
    //     }
    // }
}

