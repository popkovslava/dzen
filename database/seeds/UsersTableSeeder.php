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
        // User::truncate();
        // Role::truncate();
        // DB::table('role_user')->truncate();
        // Permission::truncate();

        $adminUser = User::create([
            'name'     => 'admin',
            'email'    => 'admin@dzensoft.com',
            'password' => 'WNtwbQ72aZPY',
        ]);

        $managerUser = User::create([
            'name'     => 'manager',
            'email'    => 'manager@dzensoft.com',
            'password' => 'UjpJmvv3Ca',
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
