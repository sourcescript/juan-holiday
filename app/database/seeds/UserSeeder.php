<?php

class TestSeeder extends Seeder {

	function run()
	{
		$db = DB::table('users');
		$db->truncate();

		$data = [
			[
				'id'			=> 1,
				'username'		=> 'admin',
				'password'		=> 'admin',
				'created_at'	=> date('Y-m-d'),
				'updated_at'	=> date('Y-m-d')
			],
		];

		$db->insert($data);
	}

}