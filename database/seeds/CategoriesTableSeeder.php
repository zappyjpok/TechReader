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
           'catName' => 'Programming'
       ]);

        Category::create([
            'catName' => 'Web Development'
        ]);

        Category::create([
            'catName' => 'Networking'
        ]);

        Category::create([
            'catName' => 'Windows'
        ]);

        Category::create([
            'catName' => 'Mac'
        ]);
    }
}
