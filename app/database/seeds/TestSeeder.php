<?php

class TestSeeder extends Seeder {

	function run()
	{
		DB::table('holidays')->truncate();

		Holiday::create([
				'title' => 'Bagong Taon',
				'start' => '2014-01-01',
				'end' => '2014-01-01',
				'type' => 'regular'
			]);

		Holiday::create([
				'title' => 'Maulid un-Nabi',
				'start' => '2014-01-14',
				'end' => '2014-01-14',
				'type' => 'common local'
			]);

		Holiday::create([
				'title' => 'Chinese Lunar New Year\'s Day',
				'start' => '2014-01-31',
				'end' => '2014-01-31',
				'type' => 'special non-working'
			]);

		Holiday::create([
				'title' => 'People Power Anniversary',
				'start' => '2014-02-25',
				'end' => '2014-02-25',
				'type' => 'observance'
			]);

		Holiday::create([
				'title' => 'March equinox',
				'start' => '2014-03-20',
				'end' => '2014-01-01',
				'type' => 'season'
			]);

		Holiday::create([
				'title' => 'The Day of Valor',
				'start' => '2014-04-09',
				'end' => '2014-04-09',
				'type' => 'regular'
			]);

		Holiday::create([
				'title' => 'Maundy Thursday',
				'start' => '2014-04-17',
				'end' => '2014-04-17',
				'type' => 'regular'
			]);

		Holiday::create([
				'title' => 'Good Friday',
				'start' => '2014-04-19',
				'end' => '2014-04-19',
				'type' => 'special non-working'
			]);

		Holiday::create([
				'title' => 'Easter Sunday',
				'start' => '2014-04-20',
				'end' => '2014-01-01',
				'type' => 'observance'
			]);

		Holiday::create([
				'title' => 'Labor Day',
				'start' => '2014-05-01',
				'end' => '2014-05-01',
				'type' => 'regular'
			]);

		Holiday::create([
				'title' => 'Lailatul Isra Wal Raj',
				'start' => '2014-05-27',
				'end' => '2014-05-27',
				'type' => 'regular'
			]);

		Holiday::create([
				'title' => 'Independence Day',
				'start' => '2014-06-12',
				'end' => '2014-06-12',
				'type' => 'common local'
			]);

		Holiday::create([
				'title' => 'June Solstice',
				'start' => '2014-06-21',
				'end' => '2014-06-21',
				'type' => 'season'
			]);

		Holiday::create([
				'title' => 'Eidul-Fitar',
				'start' => '2014-07-29',
				'end' => '2014-07-29',
				'type' => 'common local'
			]);

		Holiday::create([
				'title' => 'Ninoy Aquino Day',
				'start' => '2014-08-21',
				'end' => '2014-08-21',
				'type' => 'special non-working'
			]);

		Holiday::create([
				'title' => 'National Heroes Day',
				'start' => '2014-08-24',
				'end' => '2014-08-24',
				'type' => 'regular'
			]);

		Holiday::create([
				'title' => 'National Heroes Day Holiday',
				'start' => '2014-08-25',
				'end' => '2014-08-25',
				'type' => 'regular'
			]);

		Holiday::create([
				'title' => 'September equinox',
				'start' => '2014-09-23',
				'end' => '2014-09-23',
				'type' => 'season'
			]);

		Holiday::create([
				'title' => 'Id-ul-Adha (Feast of the Sacrifice)',
				'start' => '2014-10-04',
				'end' => '2014-10-04',
				'type' => 'common local'
			]);

		Holiday::create([
				'title' => 'Amun Jadid',
				'start' => '2014-10-25',
				'end' => '2014-10-25',
				'type' => 'common local'
			]);

		Holiday::create([
				'title' => 'All Saints\' Day',
				'start' => '2014-11-01',
				'end' => '2014-11-01',
				'type' => 'special non-woring'
			]);		

		Holiday::create([
				'title' => 'All Souls\' Day',
				'start' => '2014-11-02',
				'end' => '2014-11-02',
				'type' => 'observance'
			]);

		Holiday::create([
				'title' => 'Bonifacio Day',
				'start' => '2014-11-33',
				'end' => '2014-11-30',
				'type' => 'regular'
			]);

		Holiday::create([
				'title' => 'December Solstice',
				'start' => '2014-12-21',
				'end' => '2014-12-21',
				'type' => 'regular'
			]);

		Holiday::create([
				'title' => 'Christmas Eve',
				'start' => '2014-12-24',
				'end' => '2014-12-24',
				'type' => 'special non-working'
			]);

		Holiday::create([
				'title' => 'Christmas Day',
				'start' => '2014-12-25',
				'end' => '2014-12-25',
				'type' => 'regular'
			]);

		Holiday::create([
				'title' => 'Special Day after Christmas',
				'start' => '2014-01-01',
				'end' => '2014-01-01',
				'type' => 'special non-working'
			]);

		Holiday::create([
				'title' => 'Rizal Day',
				'start' => '2014-12-30',
				'end' => '2014-12-30',
				'type' => 'regular'
			]);

		Holiday::create([
				'title' => 'New Year\'s Eve',
				'start' => '2014-12-31',
				'end' => '2014-12-31',
				'type' => 'special non-working'
			]);
	}
}