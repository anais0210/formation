<?php

namespace App\Controller;

use App\Repository\StudentRepository;

class DeleteStudentController
{
	private $repository;

	public function __construct(StudentRepository $repository)
	{
		$this->repository = $repository;
	}

	public function __invoke()
	{
		$json = file_get_contents('php://input');
		$data = json_decode($json, true);
		print_r($data);

		$this->repository->delete($data['id']);
	}
}