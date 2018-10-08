<?php

namespace App\Controller;

use App\Controller\BaseController;

class CreateStudentController extends BaseController
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

		$birthdate = new \DateTime($data['birthdate']);

		$this->repository->create($data['lastname'], $data['firstname'], $birthdate);
	}
}