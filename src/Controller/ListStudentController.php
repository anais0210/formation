<?php

namespace App\Controller;

use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\Response;

class ListStudentController extends BaseController
{
	public function __invoke()
	{		
		$result = $this->repository->findAll();
		header('Content-Type: application/json');
		echo json_encode($result);
	}	
}