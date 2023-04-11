<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class CreateAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{

        $user = User::create([
        'name' => 'super',
        'email' => 'super@eg.com',
        'phone' => '01208645789',
        'password' => bcrypt('12345'),
        ]);

        $role = Role::create(['name' => 'owner']);

        $permissions = Permission::where('guard_name','web')->pluck('id','id');

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);


}
}
