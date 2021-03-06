<?php

use Faker\Factory;
use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends DatabaseSeeder {

    public function run()
    {
        DB::table('users')->truncate(); // Using truncate function so all info will be cleared when re-seeding.
        DB::table('roles')->truncate();
        DB::table('role_users')->truncate();
        DB::table('activations')->truncate();

        $admin = Sentinel::registerAndActivate(array(
            'email'       => 'admin@admin.com',
            'password'    => "admin",
            'first_name'  => 'John',
            'last_name'   => 'Doe',
        ));
        $user = Sentinel::registerAndActivate(array(
            'email'       => 'user@user.com',
            'password'    => "User",
            'first_name'  => 'John',
            'last_name'   => 'Doe',
        ));


        $adminRole = Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Admin',
            'slug' => 'admin',
            'permissions' => array('admin' => 1)
        ]);

        $userRole = Sentinel::getRoleRepository()->createModel()->create([
            'name'  => 'User',
            'slug'  => 'user',
            'permissions' => array('user' => true)
        ]);

        $user->roles()->attach($userRole);
        $admin->roles()->attach($adminRole);

        $this->command->info('Admin User created with username admin@admin.com and password admin');
    }

}