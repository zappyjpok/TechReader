<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Address as Address;
use App\Sale as Sale;
use App\Category;
use App\Profile;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        //$this->call('UsersTableSeeder');
        //$this->call('CategoriesTableSeeder');
        //$this->call('ProfilesTableSeeder');
        $this->call('AddressesTableSeeder');
        $this->call('ProductsTableSeeder');
        $this->call('SalesTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('AddressesTableSeeder');
	}

}

class AddressesTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $faker = Faker\Factory::create();

        Eloquent::unguard();

        for($i=1; $i<30; $i++)
        {
            Address::create([
                'user_id' => $i,
                'address' => $faker->streetAddress,
                'city' => $faker->city,
                'postal_code' =>$faker->postcode,
                'state' => $faker->state
            ]);
        }
    }
}

class SalesTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $faker = Faker\Factory::create();

        Eloquent::unguard();

        for($i=0; $i<10; $i++) {
            Sale::create([
                'product_id' => $faker->numberBetween($min = 1, $max = 50),
                'start' => $faker->dateTimeBetween('-14 days', 'now'),
                'finish' => $faker->dateTimeBetween('now', '+14 days'),
                'discount' => $faker->randomElement($array = array(.1, .15, .2, .25, .3, .35, .40))
            ]);
        }
    }
}

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

class ProfilesTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $faker = Faker\Factory::create();

        Eloquent::unguard();

        for($i=1; $i<20; $i++) {
            Profile::create([
                'user_id' => $i,
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'VIPNumber' => $faker->randomDigit
            ]);
        }

    }
}

