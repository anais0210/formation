<?php

namespace App\Controller;

use App\Controller\BaseController;

class ListStudentController extends BaseController
{
	public function __invoke()
	{
		if (json_last_error() !== 0) {
			echo 'Erreur dans ton JSON';
			http_response_code(400);
			return;
		}
		
		$result = $this->repository->findAll();
		echo json_encode($result);
	}	
}