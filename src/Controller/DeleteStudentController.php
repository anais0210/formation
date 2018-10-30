<?php

namespace App\Controller;

use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DeleteStudentController extends BaseController
{
    public function __invoke()
    {
        $response = new JsonResponse();

        try {
            $this->repository->delete( $this->parameters['id'] );
        } catch (\Exception $e) {
            $response->setContent( $e->getMessage() );
            $response->setStatusCode( 404);
        }

        return $response;
    }
}