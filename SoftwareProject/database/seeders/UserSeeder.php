<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_admin = Role::where('name', 'admin')->first();


        $role_user = Role::where('name', 'user')->first();

        $admin = new User();
        $admin->name = 'Ben Sharkey';
        $admin->email = 'n00212320@iadt.ie';
        $admin->password = Hash::make('password');
        $admin->save();


        $admin->roles()->attach($role_admin);


        $user = new User();
        $user->name = 'Paisley Jones';
        $user->email = 'pai@gmail.com';
        $user->password = Hash::make('password');
        $user->save();

        $user->roles()->attach($role_user);
    }
}
