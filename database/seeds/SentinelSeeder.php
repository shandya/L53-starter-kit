<?php

use Illuminate\Database\Seeder;

class SentinelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createRoles();
        $this->createAdmin();
    }

    public function createRoles()
    {
        Sentinel::getRoleRepository()->createModel()->create([
            'name'        => 'Super Admin',
            'slug'        => 'super-admin',
            'permissions' => [
                'user.super-admin' => true,
                'user.admin'       => true,
                'user.manager'     => true
            ]
        ]);

        Sentinel::getRoleRepository()->createModel()->create([
            'name'        => 'Admin',
            'slug'        => 'admin',
            'permissions' => [
                'user.admin'  => true,
                'user.update' => true,
                'user.view'   => true
            ]
        ]);

        Sentinel::getRoleRepository()->createModel()->create([
            'name'        => 'Member',
            'slug'        => 'member',
            'permissions' => [
                'user.update' => true,
                'user.view'   => true
            ]
        ]);
    }

    public function createAdmin()
    {
        $role = Sentinel::findRoleBySlug('super-admin');

        $credentials = [
            'email'      => 'admin@app.com',
            'password'   => '123456',
            'first_name' => 'Admin',
            'last_name'  => 'App',
        ];

        $user = Sentinel::registerAndActivate($credentials);
        $user->roles()->attach($role);
    }
}
