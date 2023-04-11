<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\TreatmentRequest;
use App\Http\Resources\TreatmentResource;
use App\Http\Traits\ImageTrait;
use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    use ImageTrait;
    public $treatment;
    protected $path = 'treatments';

    public function __construct(Treatment $treatment)
    {
        $this->treatment = $treatment;

    }
    public function index(Request $request)
    {
        $treatment = $this->treatment->latest()->paginate(10);
        return $this->apiResponse(TreatmentResource::collection($treatment));
    }

    public function store(TreatmentRequest $request)
    {

        $request_data = $request->except(['image','type']);
        if($request->image != null){
            
        $request_data['image'] = $this->uploadImagesDynamic($request);
        }
        $treatment = $this->treatment->create(
            [
                'name'=>auth('employee')->user()->first_name,
                'phone'=>auth('employee')->user()->phone,
                'factory'=>auth('employee')->user()->factory,
                'image'=>$request_data['image'],
                'employee_id'=>auth('employee')->user()->id

            ]
        );
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getTreatment());

        if(isset($request->type)){
            session()->flash('success', __('site.add_successfuly'));
            return redirect()->back();
        }
        return $this->apiResponse(new TreatmentResource($treatment));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $treatment = $this->treatment->find($id);
        if (!is_null($treatment)) {

            return $this->apiResponse(new TreatmentResource($treatment));
        } else {
            return $this->errorResponse(__('site.error_subscription'));
        }
    }

    public function update(TreatmentRequest $request, $id)
    {
        $treatment = $this->treatment->find($id);
        if(checkUpdate($treatment) <=24)
        { 
        $this->deleteImage($treatment->image,'treatments');
        $request_data['image'] = $this->uploadImagesDynamic($request);


            $treatment->update( [
                'name'=>auth('employee')->user()->first_name,
                'phone'=>auth('employee')->user()->phone,
                'factory'=>auth('employee')->user()->factory,
                'image'=>$request_data['image'],
                'employee_id'=>auth('employee')->user()->id

            ]);
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getTreatment());

            return $this->apiResponse(new TreatmentResource($treatment));
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
