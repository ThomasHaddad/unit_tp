<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tags')->delete();

		DB::table('tags')->insert([
			[
				"name"=>"php"
			],
			[
				"name"=>"AngularJS"
			],
			[
				"name"=>"AngularJS/Laravel"
			],
			[
				"name"=>"Fabric"
			],
			[
				"name"=>"PHPUnit"
			],
			[
				"name"=>"Behat"
			],
			[
				"name"=>"Travis"
			],
			[
				"name"=>"Gulp"
			],

		]);
	}

}