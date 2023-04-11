<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\RoleDateTable;
use App\Http\Controllers\Dashboard\BaseDatatableController;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;

class RoleController extends BaseDatatableController
{
    public function __construct(Role $model, RoleDateTable $roleDataTable)
    {
      
        parent::__construct($model, $roleDataTable);
    }

    public function store(RoleRequest $request)
    {
        $request_data = $request->except(array_merge($this->uploadImages, ['_token','permissions']));
        $newRole = $this->model->create($request_data);
        $newRole->syncPermissions($request->permissions);
        return $this->redirectTo('store');
    }
    public function update(RoleRequest $request, $id)
    {
        $role = $this->model->find($id);
        
        $request_data = $request->except(array_merge($this->uploadImages, ['_token','permissions']));
        $role->update($request_data);
        $role->syncPermissions($request->permissions);
        return $this->redirectTo('update');
    }
}
