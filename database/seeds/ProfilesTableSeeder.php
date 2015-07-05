<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use App\Profile;

class ProfilesTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $faker = Faker\Factory::create();

        Eloquent::unguard();

        for($i=0; $i<50; $i++) {
            Profiles::create([
                'user_id' => $i,
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'VIPNumber' => $faker->randomDigit
            ]);
        }

    }
}
