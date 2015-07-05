<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use App\Sale as Sale;

class SalesTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $faker = Faker\Factory::create();

        Eloquent::unguard();

        for($i=0; $i<20; $i++) {
            Sale::create([
                'product_id' => $faker->numberBetween($min = 1, $max = 50),
                'start' => $faker->dateTimeBetween('-14 days', 'now'),
                'finish' => $faker->dateTimeBetween('now', '+14 days'),
                'discount' => $faker->randomElement($array = array(.1, .15, .2, .25, .3, .35, .40))
            ]);
        }
    }
}
