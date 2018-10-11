<?php

namespace App\Controller;

use App\Controller\BaseController;

class UpdateStudentController extends BaseController
{
	public function __invoke()
	{
		$json = file_get_contents('php://input');
		$data = json_decode($json, true);

		if (json_last_error() !== 0) {
			echo 'Erreur dans ton JSON';
			http_response_code(400);
			return;
		}

		if (!array_key_exists('id', $data)) {
		    echo "missing id";
		    http_response_code(400);
			return;
		}

		if (!array_key_exists('lastname', $data)) {
		    echo "missing lastname";
		    http_response_code(400);
			return;
		}

		if (!array_key_exists('firstname', $data)) {
		    echo "missing firstname";
		    http_response_code(400);
			return;
		}

		if (!array_key_exists('birthdate', $data)) {
		    echo "missing birthdate";
		    http_response_code(400);
			return;
		}

		$birthdate = new \DateTime($data['birthdate']);
		
		$student = $this->repository->find($data['id']);
		if ($student == null) {
			return $this->redirectionErreur404();
		}
		
		$this->repository->update($data['id'], $data['lastname'], $data['firstname'], $birthdate);
	}

	public function redirectionErreur404()
	{
	    header("HTTP/1.0 404 Not Found");
	    http_response_code(404);
	}
}