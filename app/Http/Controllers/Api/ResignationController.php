<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\ResignationRequest;
use App\Http\Resources\ResignationResource;
use App\Models\Resignation;
use Illuminate\Http\Request;

class ResignationController extends Controller
{
    public $revision;
    public function __construct(Resignation $revision)
    {
        $this->revision = $revision;

    }
    public function index(Request $request)
    {
        $revision = $this->revision->latest()->paginate(10);
        return $this->apiResponse(ResignationResource::collection($revision));
    }

    public function store(ResignationRequest $request)
    {

        $revision= $this->revision->create([
            'name'=>auth('employee')->user()->first_name,
            'factory'=>auth('employee')->user()->factory,
            'reason'=>$request->reason,
            'date'=>$request->date,
            'employee_id'=>auth('employee')->user()->id

        ]);
      callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getResign());

        if(isset($request->type)){
            session()->flash('success', __('site.add_successfuly'));
            return redirect()->back();
        }
        return $this->apiResponse(new ResignationResource($revision));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $revision= $this->revision->find($id);
        if(!is_null($revision)){
            
            return $this->apiResponse(new ResignationResource($revision));
        }else {
            return $this->errorResponse(__('site.error_subscription'));
        }
    }

    public function update(ResignationRequest $request, $id)
    {
        $revision = $this->revision->find($id);
        if(checkUpdate($revision) <=48)
        {

            $revision->update([
                'name'=>auth('employee')->user()->first_name,
                'factory'=>auth('employee')->user()->factory,
                'reason'=>$request->reason,
                'date'=>$request->date,
                'employee_id'=>auth('employee')->user()->id

            ]);
      callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getResign());

            return $this->apiResponse(new ResignationResource($revision));
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

