<?php

namespace App\Controller;

use App\Controller\BaseController;

class DeleteStudentController extends BaseController
{
	public function __invoke()
	{
		$this->repository->delete($this->parameters['id']);
	}
}