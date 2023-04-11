<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\PictureDateTable;
use App\Http\Controllers\Dashboard\BaseDatatableController;
use App\Http\Requests\PictureRequest;
use App\Models\Album;
use App\Models\Picture;

class PictureController extends BaseDatatableController
{

    protected $uploadImages = ['image'];
    
    public function __construct(Picture $model, PictureDateTable $pictureDateTable)
    {
        parent::__construct($model, $pictureDateTable);
    }

    public function store(PictureRequest $request)
    {
        $request_data = $request->except(array_merge($this->uploadImages, ['_token']));
        $request_data += $this->uploadImagesDynamic($request);
        
        $newuser = $this->model->create($request_data);
        return redirect()->route('dashboard.pictures.index');

    }
    public function update(PictureRequest $request, $id)
    {
        $user = $this->model->find($id);

        $request_data = $request->except(array_merge($this->uploadImages, ['_token']));
       
        $this->deleteImagesDynamic($user, $request);
        $request_data += $this->uploadImagesDynamic($request);

        $user->update($request_data);

        return redirect()->route('dashboard.pictures.index');
    }
    public function destroy($id)
    {
        $row = $this->model->findOrFail($id);
        $this->deleteImagesDynamic($row, $row);
        $row->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.' . $this->getClassNameFromModel() . '.index');
    } //end of destroy function
    protected function append()
    {
      return [
        "album"=>Album::pluck('name','id')->toArray()

      ];
    } //end of append
}
