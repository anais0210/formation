<?php

namespace App\Controller;

use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UpdateStudentController extends BaseController
{
	public function __invoke()
	{
        $response = new JsonResponse();

		$json = file_get_contents('php://input');
		$data = json_decode($json, true);

		if (json_last_error() !== 0) {

            $response->setContent('Erreur dans ton JSON');
            $response->setStatusCode(400);
			return $response;
		}

		if (!array_key_exists('id', $data)) {
            $response->setContent('Missing Id');
            $response->setStatusCode(400);
		    return $response;
		}

		if (!array_key_exists('lastname', $data)) {

            $response->setContent('Missing lastname');
            $response->setStatusCode(400);
			return $response;
		}

		if (!array_key_exists('firstname', $data)) {
            $response->setContent('Missing firstname');
            $response->setStatusCode(400);
		    return $response;
		}

		if (!array_key_exists('birthdate', $data)) {
            $response->setContent('Missing birthdate');
            $response->setStatusCode(400);
		    return $response;
		}

		$birthdate = new \DateTime($data['birthdate']);
		
		$student = $this->repository->find($data['id']);
		if ($student == null) {
			return $this->redirectionErreur404();
		}
		
		$this->repository->update($data['id'], $data['lastname'], $data['firstname'], $birthdate);
	}

	public function redirectionErreur404()
	{
	    header("HTTP/1.0 404 Not Found");
        $response->setStatusCode(404);
	}
}