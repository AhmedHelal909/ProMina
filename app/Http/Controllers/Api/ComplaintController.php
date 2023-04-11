<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\ComplaintRequest;
use App\Http\Resources\ComplaintResource;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public $complaint;
    public function __construct(Complaint $complaint)
    {
        $this->complaint = $complaint;

    }
    public function index(Request $request)
    {
        $complaint = $this->complaint->latest()->paginate(10);
        return $this->apiResponse(ComplaintResource::collection($complaint));
    }

    public function store(ComplaintRequest $request)
    {

        $complaint= $this->complaint->create([
            'name'=>auth('employee')->user()->first_name,
            'phone'=>auth('employee')->user()->phone,
            'factory'=>auth('employee')->user()->factory,
            'reason'=>$request->reason,
            'employee_id'=>auth('employee')->user()->id

        ]);
      callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getCivil());

        if(isset($request->type)){
            session()->flash('success', __('site.add_successfuly'));
            return redirect()->back();
        }
        return $this->apiResponse(new complaintResource($complaint));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complaint= $this->complaint->find($id);
        if(!is_null($complaint)){
            
            return $this->apiResponse(new complaintResource($complaint));
        }else {
            return $this->errorResponse(__('site.error_subscription'));
        }
    }

    public function update(ComplaintRequest $request, $id)
    {
        $complaint = $this->complaint->find($id);
        if(checkUpdate($complaint) <=48)
        {

            $complaint->update([
                'name'=>auth('employee')->user()->first_name,
                'phone'=>auth('employee')->user()->phone,
                'factory'=>auth('employee')->user()->factory,
                'reason'=>$request->reason,
                'employee_id'=>auth('employee')->user()->id

            ]);
         callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getCivil());

            return $this->apiResponse(new ComplaintResource($complaint));
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

