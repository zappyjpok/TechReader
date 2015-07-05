<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use App\Role as Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        Role::create([
            'name' => 'Customer'
        ]);

        Role::create([
            'name' => 'Admin'
        ]);
    }
}
