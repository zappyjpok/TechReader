<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use App\Category;


class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

       Category::create([
           'name' => 'Programming'
       ]);

        Category::create([
            'name' => 'Web Development'
        ]);

        Category::create([
            'name' => 'Networking'
        ]);

        Category::create([
            'name' => 'Windows'
        ]);

        Category::create([
            'name' => 'Mac'
        ]);
    }
}
