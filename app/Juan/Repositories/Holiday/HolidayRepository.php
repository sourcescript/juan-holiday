<?php namespace Juan\Repositories\Holiday;

interface HolidayRepository {

	public function get($year, $month, $day);

	public function getByRange($from, $to);

	public function all();
	
	public function getById($id);

	public function update($id, $name, $from, $to, $type);

	public function create($name, $from, $to, $type);
}