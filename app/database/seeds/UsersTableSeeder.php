<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		DB::table('users')->insert([
			[
				"username"=>"Alexandre",
				"password"=>Hash::make('alexandre'),
				"role"=>"admin"
			],
			[
				"username"=>"Abel",
				"password"=>Hash::make('abel'),
				"role"=>"visitor"
			],
			[
				"username"=>"Al",
				"password"=>Hash::make('al'),
				"role"=>"visitor"
			],
			[
				"username"=>"Alan",
				"password"=>Hash::make('alan'),
				"role"=>"visitor"
			],
			[
				"username"=>"Arthur",
				"password"=>Hash::make('arthur'),
				"role"=>"visitor"
			],
			[
				"username"=>"Carl",
				"password"=>Hash::make('carl'),
				"role"=>"visitor"
			],
			[
				"username"=>"Blaise",
				"password"=>Hash::make('blaise'),
				"role"=>"visitor"
			],
			[
				"username"=>"Isaac",
				"password"=>Hash::make('isaac'),
				"role"=>"visitor"
			],
			[
				"username"=>"Steve",
				"password"=>Hash::make('steve'),
				"role"=>"visitor"
			]

		]);
	}

}