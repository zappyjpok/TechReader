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
                'proTitle' => $faker->title,
                'proAuthor' => $faker->name,
                'proPublishDate' => $faker->dateTimeThisDecade,
                'proPublisher' => $faker->word,
                'proPrice' => $faker->randomNumber(2),
                'proDescription'=>$faker->text,
                'proImagePath' => $faker->imageUrl($width = 640, $height = 480)
            ]);
        }
    }
}
