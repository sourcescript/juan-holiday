<?php namespace Juan\Repositories\Holiday;

use Holiday, DB;

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

		return Holiday::where('start', '>=', $year . '-' . $month . '-' . $day)
			->where('end', '<=', $year . '-' . $rMonth . '-' . $rDay)
			->get();
	}

	public function getRegularHolidays($year, $month = null, $day = null)
	{
		$rMonth = is_null($month) ? '12' : $month;
		$month = !is_null($month) ? $month : '01';

		$rDay = is_null($day) ? '31' : $day;
		$day = !is_null($day) ? $day : '01';

		$holidays = Holiday::whereRaw(DB::raw("DATE_FORMAT(`from`, '%m-%d') >= '$month-$day'"))
			->whereRaw(DB::raw("DATE_FORMAT(`to`, '%m-%d') <= '$rMonth-$rDay'"))
			->whereRaw(DB::raw("DATE_FORMAT(`from`, '%Y') <= '$year'"))
			->where('type', 'regular')
			->groupBy('title')
			->get();

		foreach($holidays as $i => $holiday)
		{
			$holidays[$i]->to = preg_replace('/^\d{4}/i', $year, $holidays[$i]->to);
			$holidays[$i]->from = preg_replace('/^\d{4}/i', $year, $holidays[$i]->from);
		}

		return $holidays;
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
		return Holiday::where('start', '>=', $from)->where('end', '<', $to)
			->get();
	}

	public function getRegularHolidaysByRange($from, $to)
	{
		$from = preg_replace('/^d{4}/i', '', $from);
		$to = preg_replace('/^d{4}/i', '', $from);

		$holidays = Holiday::whereRaw(DB::raw("DATE_FORMAT(`from`, '%m-%d') >= '$from'"))
			->whereRaw(DB::raw("DATE_FORMAT(`to`, '%m-%d') <= '$to'"))
			->where('type', 'regular')
			->groupBy('title')
			->get();
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