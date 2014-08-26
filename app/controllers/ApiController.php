<?php

use Juan\Repositories\Holiday\HolidayRepository;

class ApiController extends BaseController {

	/**
	 * @var Holiday
	 */
	private $holiday;

	function __construct(HolidayRepository $holidayRepository)
	{
		$this->holiday = $holidayRepository;
	}


	function range()
	{
		$holidays = $this->holiday->getByRange(Input::get('from'), Input::get('to'));

		return $this->respond($holidays);
	}

	/**
	 * Returns holiday listing
	 *
	 * @param  $year
	 * @param  $month
	 * @param  $day
	 * @return Response
	 */
	function holidays($year, $month = null, $day = null)
	{
		$holidays = $this->holiday->get($year, $month, $day);

		// if no holiday is set try to check for regular holidays on other year
		if(empty($holidays->toArray())) {
			$regularHolidays = $this->holiday->getRegularHolidays($year, $month, $day);
			$holidays = $regularHolidays->merge($holidays);
		}

		return $this->respond($holidays);
	}
}
