<?php

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
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
        $adminUser = User::create([
            'name'     => 'admin',
            'email'    => 'admin@mail.ru',
            'password' => '123456',
        ]);

        $managerUser = User::create([
            'name'     => 'manager',
            'email'    => 'manager@mail.ru',
            'password' => '123456',
        ]);

        $adminRole = Role::create([
            'name'  => 'admin',
            'label' => 'Administrator'
        ]);

        $managerRole = Role::create([
            'name'  => 'manager',
            'label' => 'Manager'
        ]);

        $adminUser->roles()->attach($adminRole);
        $adminUser->roles()->attach($managerRole);
        $managerUser->roles()->attach($managerRole);
    }
}
