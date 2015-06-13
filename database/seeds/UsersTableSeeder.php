<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use App\User as User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $faker = Faker\Factory::create();

        Eloquent::unguard();

        for($i=0; $i<20; $i++)
        {
            User::create([
                'useEmail' => $faker->email,
                'useFirstName' => $faker->firstName,
                'useLastName' => $faker->lastName,
                'usePassword' => Hash::make($faker->word),
                'useVipNumber'=> $faker->numberBetween($min=1000, $max=9999),
                'useDateJoined' => $faker->dateTimeThisYear($max = 'now'),
            ]);
        }





    }
}
