<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Address as Address;
use App\Sale as Sale;
use App\Category;

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
        //$this->call('ProductsTableSeeder');
        //$this->call('SalesTableSeeder');
        //$this->call('RolesTableSeeder');
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

        for($i=0; $i<30; $i++)
        {
            Address::create([
                'addUserId' => $faker->numberBetween($min = 0, $max = 20),
                'addAddress' => $faker->streetAddress,
                'addCity' => $faker->city,
                'addPostalCode' =>$faker->postcode,
                'addState' => $faker->state
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
                'salProductID' => $faker->numberBetween($min = 1, $max = 50),
                'salStart' => $faker->dateTimeBetween('-14 days', 'now'),
                'salFinish' => $faker->dateTimeBetween('now', '+14 days'),
                'salDiscount' => $faker->randomElement($array = array(.1, .15, .2, .25, .3, .35, .40))
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

