<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\UserDataTable;
use App\Enum\GenderEnum;
use App\Http\Controllers\Dashboard\BaseDatatableController;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseDatatableController
{

    protected $uploadImages = ['image'];

    public function __construct(User $model, UserDataTable $userDataTable)
    {
        parent::__construct($model, $userDataTable);
    }

    public function store(UserRequest $request)
    {
        $request_data = $request->except(array_merge($this->uploadImages, ['_token', 'password', 'password_confirmation', 'roles']));
        $request_data['password'] = bcrypt($request->password);
        $request_data += $this->uploadImagesDynamic($request);
        $newuser = $this->model->create($request_data);
        if ($request->roles) {
            $newuser->assignRole($request->roles);
        }
        return $this->redirectTo('store');

    }
    public function editProfile($id)
    {
        $module_name_plural = $this->getClassNameFromModel();
        $module_name_singular = $this->getSingularModelName();
        $append = $this->append();
        $row = $this->model->findOrFail($id);
        // return $row;
        return view(static::VIEW . '.' . $this->getClassNameFromModel() . '.edit', compact('row', 'module_name_singular', 'module_name_plural'))->with($this->append());
    } //end of edit

    public function update(UserRequest $request, $id)
    {
        $user = $this->model->find($id);

        $request_data = $request->except(array_merge($this->uploadImages, ['_token', 'password', 'password_confirmation', 'roles']));
        if ($request->password != null) {
            $request_data['password'] = bcrypt($request->password);
        }

        $this->deleteImagesDynamic($user, $request);
        $request_data += $this->uploadImagesDynamic($request);

        if ($request->roles) {
            $user->syncRoles($request->roles);
        }

        $user->update($request_data);

        return $this->redirectTo('update');
    }
    public function updateProfile(UserRequest $request, $id)
    {
        $user = $this->model->find($id);

        $request_data = $request->except(array_merge($this->uploadImages, ['_token', 'password', 'password_confirmation', 'roles']));
        if ($request->password != null) {
            $request_data['password'] = bcrypt($request->password);
        }

        $this->deleteImagesDynamic($user, $request);
        $request_data += $this->uploadImagesDynamic($request);

        if ($request->roles) {
            $user->syncRoles($request->roles);
        }

        $user->update($request_data);

        return redirect()->route('dashboard.home');
    }

    protected function append()
    {

        return [
            'roles' => Role::where('guard_name', 'web')->pluck('name', 'id'),
            'gender' => GenderEnum::getList(),
        ];
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
