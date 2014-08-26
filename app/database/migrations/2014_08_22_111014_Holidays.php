<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Holidays extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('holidays', function($table)
		{
			$table->increments('id');
			$table->string('title');
			$table->date('start');
			$table->date('end')->nullable();
			$table->enum('type',['regular', 'special non-working', 'holiday for all schools', 'observance', 'common local', 'season']);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('holidays');
	}

}
