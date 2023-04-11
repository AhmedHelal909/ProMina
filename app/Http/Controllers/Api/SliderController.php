<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\SliderResource;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public $advance;
    public function __construct(Slider $advance)
    {
        $this->advance = $advance;

    }
    public function index(Request $request)
    {
        $advance = $this->advance->latest()->paginate(10);
        return $this->apiResponse(SliderResource::collection($advance));
    }

    // public function show($id)
    // {
    //     $advance= $this->advance->find($id);
    //     if(!is_null($advance)){
            
    //         return $this->apiResponse(new AdvanceResource($advance));
    //     }else {
    //         return $this->errorResponse(__('site.error_subscription'));
    //     }
    // }

    // public function update(advanceRequest $request, $id)
    // {
    //     $advance = $this->advance->find($id);
    //     $advance->update($request->all());
    //     return $this->apiResponse(new advanceResource($advance));
    // }

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

