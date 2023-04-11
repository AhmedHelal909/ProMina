<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\AlbumDateTable;
use App\Http\Controllers\Dashboard\BaseDatatableController;
use App\Http\Requests\AlbumRequest;
use App\Models\Album;

class AlbumController extends BaseDatatableController
{


    public function __construct(Album $model, AlbumDateTable $albumDateTable)
    {
        parent::__construct($model, $albumDateTable);
    }

    public function store(AlbumRequest $request)
    {
        $request_data = $request->except(array_merge($this->uploadImages, ['_token']));
        $newuser = $this->model->create($request_data);
        return redirect()->route('dashboard.albums.index');

    }
    public function update(AlbumRequest $request, $id)
    {
        $user = $this->model->find($id);

        $request_data = $request->except(array_merge($this->uploadImages, ['_token']));
        $user->update($request_data);

        return redirect()->route('dashboard.albums.index');
    }
    public function destroy($id)
    {
        $row = $this->model->findOrFail($id);
        $this->deleteImagesDynamic($row, $row);
        $row->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.' . $this->getClassNameFromModel() . '.index');
    } //end of destroy function
}
