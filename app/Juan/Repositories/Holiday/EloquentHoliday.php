<?php namespace Juan\Repositories\Holiday;

use DB;
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
	public function get($year, $month = null, $day = null) {
		$rMonth = is_null($month) ? '12' : $month;
		$month  = !is_null($month) ? $month : '01';

		$rDay = is_null($day) ? '31' : $day;
		$day  = !is_null($day) ? $day : '01';

		return Holiday::where('start', '>=', $year . '-' . $month . '-' . $day)
			->where('end', '<=', $year . '-' . $rMonth . '-' . $rDay)
			->get();
	}

	public function getRegularHolidays($year, $month = null, $day = null) {
		$rMonth = is_null($month) ? '12' : $month;
		$month  = !is_null($month) ? $month : '01';

		$rDay = is_null($day) ? '31' : $day;
		$day  = !is_null($day) ? $day : '01';

		$holidays = Holiday::whereRaw(DB::raw("DATE_FORMAT(`start`, '%m-%d') >= '$month-$day'"))
			->whereRaw(DB::raw("DATE_FORMAT(`end`, '%m-%d') <= '$rMonth-$rDay'"))
			->whereRaw(DB::raw("DATE_FORMAT(`start`, '%Y') <= '$year'"))
			->where('type', 'regular')
			->groupBy('title')
			->get();

		foreach ($holidays as $i => $holiday) {
			$holidays[$i]->end   = preg_replace('/^\d{4}/i', $year, $holidays[$i]->end);
			$holidays[$i]->start = preg_replace('/^\d{4}/i', $year, $holidays[$i]->start);
		}

		return $holidays;
	}

	/**
	 * Returns holidays by range
	 *
	 * @param   $start
	 * @param   $end
	 * @return Holiday
	 */
	public function getByRange($start, $end) {
		return Holiday::where('start', '>=', $start)->where('end', '<', $end)
		                                            ->get();
	}

	public function getRegularHolidaysByRange($start, $end) {
		$start = preg_replace('/^d{4}/i', '', $start);
		$end   = preg_replace('/^d{4}/i', '', $start);

		$holidays = Holiday::whereRaw(DB::raw("DATE_FORMAT(`start`, '%m-%d') >= '$start'"))
			->whereRaw(DB::raw("DATE_FORMAT(`end`, '%m-%d') <= '$end'"))
			->where('type', 'regular')
			->groupBy('title')
			->get();
	}

	/**
	 * Return all holidays
	 *
	 * @return Holiday
	 */
	public function all() {
		return Holiday::all();
	}

	/**
	 * Get holiday by ID
	 *
	 * @param  $id
	 * @return Holiday
	 */
	public function getById($id) {
		return Holiday::find($id);
	}

	/**
	 * Creates a holiday
	 *
	 * @param   $name
	 * @param   $start
	 * @param   $end
	 * @param   $type
	 * @return  bool
	 */
	public function create($name, $start, $end, $type) {
		$holiday        = new Holiday;
		$holiday->name  = $name;
		$holiday->start = $start;
		$holiday->end   = $end;
		$holiday->type  = $type;

		if ($holiday->save()) {
			return true;
		}

		return false;
	}

	/**
	 * Updates a holiday
	 *
	 * @param   $id
	 * @param   $name
	 * @param   $start
	 * @param   $end
	 * @param   $type
	 * @return  bool
	 */
	public function update($id, $name, $start, $end, $type) {
		$holiday        = Holiday::find($id);
		$holiday->name  = $name;
		$holiday->start = $start;
		$holiday->end   = $end;
		$holiday->type  = $type;

		if ($holiday->save()) {
			return true;
		}

		return false;
	}
}