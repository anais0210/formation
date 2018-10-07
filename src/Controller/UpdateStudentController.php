<?php

namespace App\Controller;

use App\Repository\StudentRepository;

class UpdateStudentController
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

		$birthdate = new \DateTime($data['birthdate']);

		$this->repository->update($data['id'], $data['lastname'], $data['firstname'], $birthdate);
	}
}