<?php

namespace App\Controller;

use App\Repository\StudentRepository;


class BaseController
{
	protected $repository;
	protected $parameters;

	public function __construct(StudentRepository $repository, array $parameters)
	{
		$this->repository = $repository;
		$this->parameters = $parameters;
	}
