<?php

use App\Role;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_user  = Role::where('name', 'user')->first();

        $admin = new User();
        $admin->name = "Jhon Doe";
        $admin->email = "admin@test.app";
        $admin->password = bcrypt('secret');
        $admin->email_verified_at = Carbon::now();
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = "Gal Gadot";
        $user->email = "user@test.app";
        $user->password = bcrypt('secret');
        $user->email_verified_at = Carbon::now();
        $user->save();
        $user->roles()->attach($role_user);

    }
}
