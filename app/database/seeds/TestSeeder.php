<?php

class TestSeeder extends Seeder {

	function run()
	{
		DB::table('holidays')->truncate();

		Holiday::create([
				'name' => 'Bagong Taon',
				'from' => '2014-01-01',
				'to' => '2014-01-01',
				'type' => 'regular'
			]);

		Holiday::create([
				'name' => 'Maulid un-Nabi',
				'from' => '2014-01-14',
				'to' => '2014-01-14',
				'type' => 'common local'
			]);

		Holiday::create([
				'name' => 'Chinese Lunar New Year\'s Day',
				'from' => '2014-01-31',
				'to' => '2014-01-31',
				'type' => 'special non-working'
			]);

		Holiday::create([
				'name' => 'People Power Anniversary',
				'from' => '2014-02-25',
				'to' => '2014-02-25',
				'type' => 'observance'
			]);

		Holiday::create([
				'name' => 'March equinox',
				'from' => '2014-03-20',
				'to' => '2014-01-01',
				'type' => 'season'
			]);

		Holiday::create([
				'name' => 'The Day of Valor',
				'from' => '2014-04-09',
				'to' => '2014-04-09',
				'type' => 'regular'
			]);

		Holiday::create([
				'name' => 'Maundy Thursday',
				'from' => '2014-04-17',
				'to' => '2014-04-17',
				'type' => 'regular'
			]);

		Holiday::create([
				'name' => 'Good Friday',
				'from' => '2014-04-19',
				'to' => '2014-04-19',
				'type' => 'special non-working'
			]);

		Holiday::create([
				'name' => 'Easter Sunday',
				'from' => '2014-04-20',
				'to' => '2014-01-01',
				'type' => 'observance'
			]);

		Holiday::create([
				'name' => 'Labor Day',
				'from' => '2014-05-01',
				'to' => '2014-05-01',
				'type' => 'regular'
			]);

		Holiday::create([
				'name' => 'Lailatul Isra Wal Raj',
				'from' => '2014-05-27',
				'to' => '2014-05-27',
				'type' => 'regular'
			]);

		Holiday::create([
				'name' => 'Independence Day',
				'from' => '2014-06-12',
				'to' => '2014-06-12',
				'type' => 'common local'
			]);

		Holiday::create([
				'name' => 'June Solstice',
				'from' => '2014-06-21',
				'to' => '2014-06-21',
				'type' => 'season'
			]);

		Holiday::create([
				'name' => 'Eidul-Fitar',
				'from' => '2014-07-29',
				'to' => '2014-07-29',
				'type' => 'common local'
			]);

		Holiday::create([
				'name' => 'Ninoy Aquino Day',
				'from' => '2014-08-21',
				'to' => '2014-08-21',
				'type' => 'special non-working'
			]);

		Holiday::create([
				'name' => 'National Heroes Day',
				'from' => '2014-08-24',
				'to' => '2014-08-24',
				'type' => 'regular'
			]);

		Holiday::create([
				'name' => 'National Heroes Day Holiday',
				'from' => '2014-08-25',
				'to' => '2014-08-25',
				'type' => 'regular'
			]);

		Holiday::create([
				'name' => 'September equinox',
				'from' => '2014-09-23',
				'to' => '2014-09-23',
				'type' => 'season'
			]);

		Holiday::create([
				'name' => 'Id-ul-Adha (Feast of the Sacrifice)',
				'from' => '2014-10-04',
				'to' => '2014-10-04',
				'type' => 'common local'
			]);

		Holiday::create([
				'name' => 'Amun Jadid',
				'from' => '2014-10-25',
				'to' => '2014-10-25',
				'type' => 'common local'
			]);

		Holiday::create([
				'name' => 'All Saints\' Day',
				'from' => '2014-11-01',
				'to' => '2014-11-01',
				'type' => 'special non-woring'
			]);		

		Holiday::create([
				'name' => 'All Souls\' Day',
				'from' => '2014-11-02',
				'to' => '2014-11-02',
				'type' => 'observance'
			]);

		Holiday::create([
				'name' => 'Bonifacio Day',
				'from' => '2014-11-33',
				'to' => '2014-11-30',
				'type' => 'regular'
			]);

		Holiday::create([
				'name' => 'December Solstice',
				'from' => '2014-12-21',
				'to' => '2014-12-21',
				'type' => 'regular'
			]);

		Holiday::create([
				'name' => 'Christmas Eve',
				'from' => '2014-12-24',
				'to' => '2014-12-24',
				'type' => 'special non-working'
			]);

		Holiday::create([
				'name' => 'Christmas Day',
				'from' => '2014-12-25',
				'to' => '2014-12-25',
				'type' => 'regular'
			]);

		Holiday::create([
				'name' => 'Special Day after Christmas',
				'from' => '2014-01-01',
				'to' => '2014-01-01',
				'type' => 'special non-working'
			]);

		Holiday::create([
				'name' => 'Rizal Day',
				'from' => '2014-12-30',
				'to' => '2014-12-30',
				'type' => 'regular'
			]);

		Holiday::create([
				'name' => 'New Year\'s Eve',
				'from' => '2014-12-31',
				'to' => '2014-12-31',
				'type' => 'special non-working'
			]);
	}
}