<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$route = new Route('/student', array('_controller' => 'App\Controller\CreateStudentController'), [], [], '', [], 'POST');
$routes->add('student_create', $route);

$route = new Route('/student', array('_controller' => 'App\Controller\UpdateStudentController'), [], [], '', [], 'PUT');
$routes->add('student_update', $route);

$route = new Route('/student', array('_controller' => 'App\Controller\ListStudentController'), [], [], '', [], 'GET');
$routes->add('student_list', $route);

$route = new Route('/student/{id}', array('_controller' => 'App\Controller\GetStudentController'), [], [], '', [], 'GET');
$routes->add('student_id', $route);

$route = new Route('/student/{id}', array('_controller' => 'App\Controller\DeleteStudentController'), [], [], '', [], 'DELETE');
$routes->add('student_delete', $route);

return $routes;

