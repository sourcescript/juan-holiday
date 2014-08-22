<?php

use Juan\Repositories\Holiday\HolidayRepository;

class HolidayController extends \BaseController {

	/**
	 * @var Holiday
	 */
	private $holiday;

	function __construct(HolidayRepository $holidayRepository)
	{
		$this->holiday = $holidayRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->respond(['data' => $this->holiday->get(Input::get('year') ?: date('Y'), Input::get('month') ?: date('m'))]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->holiday->create(Input::get('name'), Input::get('from'), Input::get('to'), Input::get('type'));

		return $this->setStatusCode(201)->respond(['status' => 'created']);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return $this->respond(['data' => $this->holiday->getById($id)]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$this->holiday->update($id, Input::get('name'), Input::get('from'), Input::get('to'), Input::get('type'));

		return $this->respond(['status' => 'updated']);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

	}


}
