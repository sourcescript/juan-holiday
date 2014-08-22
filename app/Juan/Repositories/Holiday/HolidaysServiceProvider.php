<?php namespace Juan\Repositories\Holiday;

use Illuminate\Support\ServiceProvider;

class HolidaysServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind('Juan\Repositories\Holiday\HolidayRepository', 'Juan\Repositories\Holiday\EloquentHoliday');
	}
}