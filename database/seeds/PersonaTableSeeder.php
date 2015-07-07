<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class PersonaTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();
       
		for($i=0;$i<20;$i++)
		{	 
			\DB::table('tpersona')->insert(array(
				'per_cedula'=>$faker->randomNumber,
				'per_nombres'=>$faker->firstName,
				'per_apellidos'=>$faker->lastName,
				'pr_direccion'=>$faker->address,
				'pr_celular'=>$faker->phoneNumber,
				'per_profesion'=>$faker->text(10),
				'per_expectativa'=>$faker->text(20)
			));
		}
	}

}