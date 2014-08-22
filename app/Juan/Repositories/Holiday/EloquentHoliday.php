<?php namespace Juan\Repositories\Holiday;

use Holiday;

class EloquentHoliday implements HolidayRepository {


	/**
	 * Gets holidays listings
	 * 
	 * @param  $year  [description]
	 * @param  string $month [description]
	 * @param  string $day   [description]
	 * @return Holiday
	 */
	public function get($year = null, $month = '01', $day = '01')
	{
		$date 	= date_parse($year . '-' . $month . '-' . $day);

		$month 	= $date['month'];
		$day 	= $date['day'];

		return Holiday::where('from', '>=', $year . '-' . $month . '-' . $day)->where('to', '<', ++$year . '-' . $month . '-' . $day)->get();
	}


	public function getByRange($from, $to)
	{
		return Holiday::where('from', '>=', $from)->where('to', '<', $to)->get();
	}
}