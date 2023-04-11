<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionDatabaseSeeder extends Seeder
{
/**
 * Run the database seeds.
 *
 * @return void
 */
    public function run()
    {

        $roles = [
            'create',
            'read',
            'update',
            'delete',
        ];
      $models = config('permissions.web');

        foreach ($roles as $role) {
            foreach ($models as $model) {
                Permission::create(['guard_name' =>'web','name' => $role . '-' . $model]);

            }
           
        }

    }
}
