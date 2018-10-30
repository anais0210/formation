<?php

namespace App\Controller;

use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CreateStudentController extends BaseController
{
    public function __invoke()
    {
        $response = new JsonResponse();
        $errors = [];

        $json = file_get_contents( 'php://input' );
        $data = json_decode( $json, true );

        if (json_last_error() !== 0) {
            $response->setContent('Erreur dans ton JSON');
            $response->setStatusCode(400);

            return $response;
        }

        if (!array_key_exists( 'lastname', $data )) {
            $errors[] = 'missing lastname';
        }

        if (!array_key_exists( 'firstname', $data )) {
            $errors[] = 'missing firstname';
        }
        if (!array_key_exists( 'birthdate', $data )) {
            $errors[] = 'missing birthdate';
        }

        if (!empty($errors)) {
            return new JsonResponse($errors, 400);
        }

        $birthdate = new \DateTime( $data['birthdate'] );
        $this->repository->create( $data['lastname'], $data['firstname'], $birthdate );

        $response->setStatusCode( 201 );

        return $response;
    }
}
