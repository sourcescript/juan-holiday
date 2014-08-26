<?php namespace Juan\Repositories\Holiday;

use Holiday;

class EloquentHoliday implements HolidayRepository {


	/**
	 * Gets holidays listings
	 * 
	 * @param  $year  
	 * @param  string $month 
	 * @param  string $day   
	 * @return Holiday
	 */
	public function get($year, $month = null, $day = null)
	{
		$rMonth = is_null($month) ? '12' : $month;
		$month 	= !is_null($month) ? $month : '01';

		$rDay = is_null($day) ? '31' : $day;
		$day = !is_null($day) ? $day : '01';

		return Holiday::where('from', '>=', $year . '-' . $month . '-' . $day)->where('to', '<=', $year . '-' . $rMonth . '-' . $rDay)->get();
	}

	/**
	 * Returns holidays by range
	 * 
	 * @param   $from
	 * @param   $to
	 * @return Holiday
	 */
	public function getByRange($from, $to)
	{
		return Holiday::where('from', '>=', $from)->where('to', '<', $to)->get();
	}


	/**
	 * Return all holidays
	 * 
	 * @return Holiday
	 */
	public function all()
	{
		return Holiday::all();
	}


	/**
	 * Get holiday by ID
	 * 
	 * @param  $id
	 * @return Holiday
	 */
	public function getById($id)
	{
		return Holiday::find($id);
	}


	/**
	 * Creates a holiday
	 * 
	 * @param   $name 
	 * @param   $from 
	 * @param   $to   
	 * @param   $type 
	 * @return  bool    
	 */
	public function create($name, $from, $to, $type)
	{
		$holiday 		= new Holiday;
		$holiday->name 	= $name;
		$holiday->from 	= $from;
		$holiday->to 	= $to;
		$holiday->type 	= $type;

		if($holiday->save())
			return true;

		return false;
	}


	/**
	 * Updates a holiday
	 * 
	 * @param   $id   
	 * @param   $name 
	 * @param   $from 
	 * @param   $to   
	 * @param   $type 
	 * @return  bool
	 */
	public function update($id, $name, $from, $to, $type)
	{
		$holiday = Holiday::find($id);
		$holiday->name = $name;
		$holiday->from = $from;
		$holiday->to = $to;
		$holiday->type = $type;

		if($holiday->save())
			return true;

		return false;
	}
}