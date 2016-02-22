<?php

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $admin = new Role();
//        $admin->name         = 'admin';
//        $admin->display_name = 'User Administrator'; // optional
//        $admin->description  = 'User is allowed to manage and edit other users'; // optional
//        $admin->save();
//        $editUser = new Permission();
//        $editUser->name         = 'edit-user';
//        $editUser->display_name = 'Edit Users'; // optional
//        // Allow a user to...
//        $editUser->description  = 'edit existing users'; // optional
//        $editUser->save();
//        $admin = Role::find(2);
//        $admin->attachPermission(1);

        $user1 = User::find(2);
        $status = $user1->hasRole('admin');
        var_dump($status);
    }
}
