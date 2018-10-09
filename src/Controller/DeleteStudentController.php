<?php

namespace App\Controller;

use App\Controller\BaseController;

class DeleteStudentController extends BaseController
{
	public function __invoke()
	{
		$this->repository->delete($this->parameters['id']);

		if (json_last_error() !== 0) {
			echo 'Erreur dans ton JSON';
			http_response_code(400);
			return;
		}
	}
}