<?php 

namespace App\Controller;

use App\Controller\BaseController;

class GetStudentController extends BaseController
{
	public function __invoke()
	{
		$result = $this->repository->find($this->parameters['id']);
		echo json_encode($result);
	}
}

