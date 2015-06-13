<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use App\Address as Address;

class AddressesTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $faker = Faker\Factory::create();

        Eloquent::unguard();

        for($i=0; $i<30; $i++)
        {
            Address::create([
                'useAddress' => $faker->streetAddress,
                'useCity' => $faker->city,
                'usePostalCode' =>$faker->postcode,
                'useState' => $faker->state
            ]);
        }
    }
}
