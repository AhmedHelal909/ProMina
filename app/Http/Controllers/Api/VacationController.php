<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\VacationRequest;
use App\Http\Resources\VacationResource;
use App\Models\Vacation;
use Illuminate\Http\Request;

class VacationController extends Controller
{
    public $vacation;
    public function __construct(Vacation $vacation)
    {
        $this->vacation = $vacation;

    }
    public function index(Request $request)
    {
        $vacation = $this->vacation->latest()->paginate(10);
        return $this->apiResponse(VacationResource::collection($vacation));
    }

    public function store(VacationRequest $request)
    {
        
        $vacation= $this->vacation->create([
            'name'=>auth('employee')->user()->first_name,
            'factory'=>auth('employee')->user()->factory,
            'phone'=>auth('employee')->user()->phone,
            'from'=>$request->from,
            'to'=>$request->to,
            'employee_id'=>auth('employee')->user()->id

        ]);
        callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getVaction());
        if(isset($request->type)){
            session()->flash('success', __('site.add_successfuly'));
            return redirect()->back();
        }
        return $this->apiResponse(new VacationResource($vacation));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacation= $this->vacation->find($id);
        if(!is_null($vacation)){
            
            return $this->apiResponse(new VacationResource($vacation));
        }else {
            return $this->errorResponse(__('site.error_subscription'));
        }
    }

    public function update(VacationRequest $request, $id)
    {
        $vacation = $this->vacation->find($id);
        if(checkUpdate($vacation) <=48)
        {

            $vacation->update([
                'name'=>auth('employee')->user()->first_name,
                'factory'=>auth('employee')->user()->factory,
                'phone'=>auth('employee')->user()->phone,
                'from'=>$request->from,
                'to'=>$request->to,
                'employee_id'=>auth('employee')->user()->id

            ]);
        callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getVaction());

            return $this->apiResponse(new VacationResource($vacation));
        }else{
            return $this->errorResponse(__('site.error_subscription'));

        }
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
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

