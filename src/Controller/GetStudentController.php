<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class GetStudentController extends BaseController
{
    public function __invoke()
    {
        $result = $this->repository->find( $this->parameters['id'] );
        if ($result == null) {

            return new JsonResponse('User not found.', 404);
        }

        return new JsonResponse($result);
    }
}