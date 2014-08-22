<?php

class TestSeeder extends Seeder {

	function run()
	{
		DB::table('holidays')->truncate();

		Holiday::create([
				'name' => 'Bagong Tain',
				'from' => '2014-01-01',
				'to' => '2014-01-01',
				'type' => 'regular'
			]);

		Holiday::create([
				'name' => 'Aray ng mga puso',
				'from' => '2014-02-14',
				'to' => '2014-02-14',
				'type' => 'regular'
			]);

		Holiday::create([
				'name' => 'Aray ng mga puso',
				'from' => '2014-08-01',
				'to' => '2014-08-31',
				'type' => 'regular'
			]);
	}
}