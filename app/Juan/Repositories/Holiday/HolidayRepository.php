<?php namespace Juan\Repositories\Holiday;

interface HolidayRepository {

	public function get($year, $month, $day);

	public function getByRange($from, $to);
	
}