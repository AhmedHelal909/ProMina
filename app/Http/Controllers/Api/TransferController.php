<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\TransferRequest;
use App\Http\Resources\TransferResource;
use App\Models\Transfer;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public $transfer;
    public function __construct(Transfer $transfer)
    {
        $this->transfer = $transfer;

    }
    public function index(Request $request)
    {
        $transfer = $this->transfer->latest()->paginate(10);
        return $this->apiResponse(TransferResource::collection($transfer));
    }

    public function store(TransferRequest $request)
    {

        $transfer= $this->transfer->create([
            'name'=>auth('employee')->user()->first_name,
            'factory'=>auth('employee')->user()->factory,
            'phone'=>auth('employee')->user()->phone,
            'project_from'=>$request->project_from,
            'project_to'=>$request->project_to,
            'employee_id'=>auth('employee')->user()->id

        ]);
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getTransfer());

        if(isset($request->type)){
            session()->flash('success', __('site.add_successfuly'));
            return redirect()->back();
        }
        return $this->apiResponse(new TransferResource($transfer));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transfer= $this->transfer->find($id);
        if(!is_null($transfer)){
            
            return $this->apiResponse(new TransferResource($transfer));
        }else {
            return $this->errorResponse(__('site.error_subscription'));
        }
    }

    public function update(TransferRequest $request, $id)
    {
        $transfer = $this->transfer->find($id);
        if(checkUpdate($transfer) <=48)
        {

            $transfer->update([
                'name'=>auth('employee')->user()->first_name,
                'factory'=>auth('employee')->user()->factory,
                'phone'=>auth('employee')->user()->phone,
                'project_from'=>$request->project_from,
                'project_to'=>$request->project_to,
                'employee_id'=>auth('employee')->user()->id

            ]);
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getTransfer());

            return $this->apiResponse(new TransferResource($transfer));
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

