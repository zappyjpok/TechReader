<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use App\Product as Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $faker = Faker\Factory::create();

        Eloquent::unguard();

        for($i=0; $i<50; $i++) {
            Product::create([
                'title' => $faker->word,
                'author' => $faker->name,
                'category_id' => $faker->numberBetween($min = 1, $max = 4),
                'publish_date' => $faker->dateTimeThisDecade,
                'publisher' => $faker->word,
                'price' => $faker->randomNumber(2),
                'description'=>$faker->text,
                'image' => $faker->imageUrl($width = 640, $height = 480)
            ]);
        }
    }
}
