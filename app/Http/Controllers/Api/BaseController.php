<?php

namespace App\Http\Controllers\Api;

use App\Http\Traits\ImageTrait;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    use ImageTrait;
    public $model;
    public $resource;
    protected $path = '';

    public function __construct($model,$resource)
    {
        $this->model = $model;
        $this->resource = $resource;

    }
    public function index(Request $request)
    {
        $model = $this->model->latest()->paginate(10);
        return $this->apiResponse($this->resource::collection($model));
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = $this->model->find($id);
        if (!is_null($model)) {

            return $this->apiResponse(new $this->resource($model));
        } else {
            return $this->errorResponse(__('site.error_subscription'));
        }
    }

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
