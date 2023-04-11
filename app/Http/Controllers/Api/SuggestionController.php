<?php

namespace App\Http\Controllers\Api;

use App\Enum\NotificationEnum;
use App\Http\Requests\SuggestionRequest;
use App\Http\Resources\SuggestionResource;
use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public $suggestion;
    public function __construct(Suggestion $suggestion)
    {
        $this->suggestion = $suggestion;

    }
    public function index(Request $request)
    {
        $suggestion = $this->suggestion->latest()->paginate(10);
        return $this->apiResponse(SuggestionResource::collection($suggestion));
    }

    public function store(SuggestionRequest $request)
    {

        $suggestion= $this->suggestion->create([
            'name'=>auth('employee')->user()->first_name,
            'phone'=>auth('employee')->user()->phone,
            'factory'=>auth('employee')->user()->factory,
            'suggestion'=>$request->suggestion,
            'employee_id'=>auth('employee')->user()->id

        ]);
    callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getSuggestion());

        if(isset($request->type)){
            session()->flash('success', __('site.add_successfuly'));
            return redirect()->back();
        }
        return $this->apiResponse(new SuggestionResource($suggestion));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suggestion= $this->suggestion->find($id);
        if(!is_null($suggestion)){
            
            return $this->apiResponse(new SuggestionResource($suggestion));
        }else {
            return $this->errorResponse(__('site.error_subscription'));
        }
    }

    public function update(SuggestionRequest $request, $id)
    {
        $suggestion = $this->suggestion->find($id);
        if(checkUpdate($suggestion) <=48)
        {

            $suggestion->update([
                'name'=>auth('employee')->user()->first_name,
                'phone'=>auth('employee')->user()->phone,
                'factory'=>auth('employee')->user()->factory,
                'suggestion'=>$request->suggestion,
                'employee_id'=>auth('employee')->user()->id

            ]);
        callFireBase(__('site.notification'),__('site.send_success'),NotificationEnum::getSuggestion());

            return $this->apiResponse(new SuggestionResource($suggestion));
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

