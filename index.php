<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'vendor/autoload.php';
$routes = require 'config/route.php';
$container = require 'container.php';

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);

try
{
	$parameters = $matcher->match($request->getPathInfo());

	$studentRepository = $containerBuilder->get('student_repository');
		
	$controller = new $parameters['_controller']($studentRepository, $parameters);

	/** @var Response $response */
	$response = call_user_func($controller);

    $response->send();
}
catch (\Exception $e)
{
	http_response_code(500);
	throw $e;
	echo 'Une exception a été lancée. Message d\'erreur :' . $e->getMessage();
}