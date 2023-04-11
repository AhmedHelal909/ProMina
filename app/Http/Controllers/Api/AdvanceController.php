<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\AdvanceRequest;
use App\Http\Resources\AdvanceResource;
use App\Models\Advance;
use Illuminate\Http\Request;

class AdvanceController extends Controller
{
    public $advance;
    public function __construct(Advance $advance)
    {
        $this->advance = $advance;

    }
    public function index(Request $request)
    {
        $advance = $this->advance->latest()->paginate(10);
        return $this->apiResponse(AdvanceResource::collection($advance));
    }

    public function store(AdvanceRequest $request)
    {

        $advance= $this->advance->create([
            'name'=>auth('employee')->user()->first_name,
            'factory'=>auth('employee')->user()->factory,
            'phone'=>auth('employee')->user()->phone,
            'amount'=>$request->amount,
            'employee_id'=>auth('employee')->user()->id


        ]);
        callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getAdvance());
        
        if(isset($request->type)){
            session()->flash('success', __('site.add_successfuly'));
            return redirect()->back();
        }
        return $this->apiResponse(new AdvanceResource($advance));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advance= $this->advance->find($id);
        if(!is_null($advance)){
            
            return $this->apiResponse(new AdvanceResource($advance));
        }else {
            return $this->errorResponse(__('site.error_subscription'));
        }
    }

    public function update(AdvanceRequest $request, $id)
    {
        $advance = $this->advance->find($id);
        if(checkUpdate($advance) <=48)
        {

            $advance->update([
                'name'=>auth('employee')->user()->first_name,
                'factory'=>auth('employee')->user()->factory,
                'phone'=>auth('employee')->user()->phone,
                'amount'=>$request->amount,
                'employee_id'=>auth('employee')->user()->id
    
            ]);
         callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getAdvance());

            return $this->apiResponse(new AdvanceResource($advance));
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

