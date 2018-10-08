<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php';
$routes = require 'config/route.php';

use App\Model\Connection;
use App\Repository\StudentRepository;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

$baseUrl = $_SERVER['SCRIPT_NAME'];
$requestUri = $_SERVER['REQUEST_URI'];
$pathInfo = str_replace($baseUrl, '', $requestUri);

$context = new RequestContext(
	$_SERVER['SCRIPT_NAME'],
	$_SERVER['REQUEST_METHOD'], 
	$_SERVER['HTTP_HOST'], 
	$_SERVER['REQUEST_SCHEME'], 
	80, 
	443, 
	$pathInfo, 
	$_SERVER['QUERY_STRING']
);

$matcher = new UrlMatcher($routes, $context);

try
{
	$parameters = $matcher->match($pathInfo);

	//
	$pdo = new Connection();
	$repository = new StudentRepository($pdo);
	//
	
	$controller = new $parameters['_controller']($repository, $parameters);

	call_user_func($controller);

}
catch (\Exception $e)
{
	http_response_code(500);
	throw $e;
	echo 'Une exception a été lancée. Message d\'erreur :' . $e->getMessage();
}


