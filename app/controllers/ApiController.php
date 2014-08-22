<?php

use Illuminate\Pagination\Paginator;

class ApiController extends BaseController {


	/**
	 * 
	 * @var integer
	 */
	private $statusCode = 200;


	/**
	 * @return int
	 */
	public function getStatusCode()
	{
		return $this->statusCode;
	}

	/**
	 * @param int $statusCode
	 */
	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}

	/**
	 * 404 not found
	 * @param  string $message
	 * @return mixed
	 */
	public function respondNotFound($message = 'Not Found!')
	{
		return $this->setStatusCode(404)->respondWithError($message);
	}


	/**
	 * @param  array $data
	 * @param  array $headers
	 * @return Response
	 */
	public function respond($data, $headers = [])
	{
		//return Response::json(array_merge($data, ['status_code' => $this->getStatusCode()]), $this->getStatusCode(), $headers);
		return Response::json($data, $this->getStatusCode(), $headers);
	}


	/**
	 * @param  string $message
	 * @return mixed
	 */
	public function respondWithError($message)
	{
		return $this->respond([
			'error' => [
				'message' => $message,
			],
			'status_code' => $this->getStatusCode()
			]);
	}

	public function respondWithPagination(Paginator $page, $data)
	{
		$currentPage 	= $page->getCurrentPage();
		$totalPages 	= ceil($page->getTotal() / $page->getPerPage());
		$prev 			= --$currentPage;
		$next 			= ++$currentPage;

		$data = array_merge(['data' => $data], [
			'paginator' => [
				'total_count' 	=> $page->getTotal(),
				'total_pages' 	=> $totalPages,
				'current_page' 	=> $currentPage,
				'prev' 			=> ($prev == 0) ? null : $page->getUrl($prev),
				'next' 			=> ($next >= $totalPages) ? null : $page->getUrl($next)
				]
			]
		);

		return $this->respond($data);
	}

}