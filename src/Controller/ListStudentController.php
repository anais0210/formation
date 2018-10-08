<?php

namespace App\Controller;

use App\Controller\BaseController;

class ListStudentController extends BaseController
{
	public function __invoke()
	{
		$result = $this->repository->findAll();
		echo json_encode($result);
	}
		
}