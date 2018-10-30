<?php 

namespace App\Controller;

use App\Controller\BaseController;

class GetStudentController extends BaseController
{
	public function __invoke()
	{
		$result = $this->repository->find($this->parameters['id']);
		if ($result == null) {
			return $this->redirectionErreur404();
		}
		header('Content-Type: application/json');
		echo json_encode($result);
	}


	public function redirectionErreur404()
	{
		header("HTTP/1.0 404 Not Found");
		http_response_code(404);
	}
}