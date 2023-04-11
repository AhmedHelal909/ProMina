<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Models\Branch;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class BaseDatatableController extends Controller
{
    protected $model;
    protected $dataTable;
    protected $uploadImages = [];
    protected const GETCLASSNAMEFROMMODEL = '';
    protected const GETSINGULARMODELNAME  = '';
    protected const VIEW  = 'dashboard';

    public function __construct(Model $model, DataTable $datatable)
    {
        $this->model = $model;
        $this->dataTable = $datatable;
        $this->permissionMiddleware();
    }

    public function index(Request $request)
    {
        $module_name_plural   = $this->getClassNameFromModel();
        $module_name_singular = $this->getSingularModelName();
        return $this->dataTable->render(static::VIEW . '.' . $module_name_plural . '.index', compact('module_name_singular', 'module_name_plural'));
    }


    public function create(Request $request)
    {
        $module_name_plural = $this->getClassNameFromModel();
        $module_name_singular = $this->getSingularModelName();

        return view(static::VIEW . '.' . $this->getClassNameFromModel() . '.create', compact('module_name_singular', 'module_name_plural'))->with($this->append());
    } //end of create


    public function show($id)
    {
        $module_name_plural = $this->getClassNameFromModel();
        $module_name_singular = $this->getSingularModelName();
        $append = $this->append();

        $row = $this->model->findOrFail($id);
        // return $row;
        return view(static::VIEW . '.' . $this->getClassNameFromModel() . '.show', compact('row', 'module_name_singular', 'module_name_plural'))->with($append);
    } //end of edit

    public function edit($id)
    {
        $module_name_plural = $this->getClassNameFromModel();
        $module_name_singular = $this->getSingularModelName();
        $append = $this->append();
        $row = $this->model->findOrFail($id);
        // return $row;
        return view(static::VIEW . '.' . $this->getClassNameFromModel() . '.edit', compact('row', 'module_name_singular', 'module_name_plural'))->with($this->append());
    } //end of edit

    public function destroy($id)
    {
        $row = $this->model->findOrFail($id);
        $this->deleteImagesDynamic($row, $row);
        $row->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.' . $this->getClassNameFromModel() . '.index');
    } //end of destroy function

    protected function filter($rows, $request)
    {

        $rows = $rows->latest()->paginate(10);
        return $rows;
    }
    public function getClassNameFromModel()
    {
        return empty(static::GETCLASSNAMEFROMMODEL) ? Str::plural($this->getSingularModelName()) : static::GETCLASSNAMEFROMMODEL;
    } //end of get class name

    public function getSingularModelName()
    {

        return empty(static::GETSINGULARMODELNAME) ? strtolower(class_basename($this->model)) : static::GETSINGULARMODELNAME;
    } //end of get singular model name

    protected function append()
    {
      return [

      ];
    } //end of append

    protected function uploadImagesDynamic($request)
    {
        $request_data = array();
        foreach ($this->uploadImages as $img) {
            if ($request->$img && is_array($request->$img)) {

                foreach ($request->$img as $key => $value) {
                    $jsonArray[$key] = $this->uploadImage($value, $this->getClassNameFromModel());
                }
                $request_data[$img] =  json_encode($jsonArray, JSON_THROW_ON_ERROR);
            } elseif ($request->$img) {
                $request_data[$img] = $this->uploadImage($request->$img, $this->getClassNameFromModel());
            }
        }
        return $request_data;
    }

    protected function uploadImage($image, $path)
    {
        $imageName = $image->hashName();
        Image::make($image)->save(public_path('uploads/' . $path . '/' . $imageName));
        return $imageName;
    }
    protected function uploadImageSlider($image, $path)
    {
        $imageName = $image->hashName();
        Image::make($image)->save(public_path('uploads/' . $path . '/' . $imageName));
        return $imageName;
    }

    public function deleteImage($image, $path, $append = null)
    {
        Storage::disk('public_uploads')->delete($path . '/' . $image);
    }

    protected function deleteImagesDynamic($row, $request)
    {

        foreach ($this->uploadImages as $key => $img) {
            if ($row->$img && ($key === $img) && $request->$img) {
                foreach (json_decode($row->$img) as $key => $value) {
                    $this->deleteImage($value, $this->getClassNameFromModel());
                }
            } elseif ($row->$img && $request->$img) {
                $this->deleteImage($row->$img, $this->getClassNameFromModel());
            }
        }
    }

    protected function permissionMiddleware()

    
    {
        $this->middleware(['permission:read-'   . $this->getClassNameFromModel()])->only('index');
        $this->middleware(['permission:create-' . $this->getClassNameFromModel()])->only('create');
        $this->middleware(['permission:update-' . $this->getClassNameFromModel()])->only('update');
        $this->middleware(['permission:delete-' . $this->getClassNameFromModel()])->only('destroy');
    }
    protected function UploadFile($file, $path)
    {

        $hashName = rand(1, 10000) . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/' . $path), $hashName);
        return $hashName;
    }
    public function DeleteFile($path, $name)
    {
        if (file_exists(public_path('uploads/' . $path . '/') . $name)) {
            unlink(public_path('uploads/' . $path . '/') . $name);
        }
    }
    public function redirectTo($type, $id = null)
    {
        $msg = '';
        switch ($type) {
            case 'store':
                $msg = 'add_successfuly';
                break;
            case 'update':
                $msg = 'updated_successfuly';
                break;
            default:
                $msg = '';
        }
        session()->flash('success', __('site.' . $msg));
        return redirect()->route('dashboard.' . $this->getClassNameFromModel() . '.index', $id);
    }
}
