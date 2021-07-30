<?php

use Illuminate\Database\Seeder;

class PinTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i <6; $i++) {
	        App\Model\PainType::create([
	            'pain_type' => $faker->name,
	        ]);
	}
    }
}
