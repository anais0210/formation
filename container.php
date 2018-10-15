<?php

require_once 'vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

$containerBuilder = new ContainerBuilder();

$containerBuilder
    ->register('connection', 'App\Model\Connection')
    ;

$containerBuilder
	->register('student_repository', 'App\Repository\StudentRepository')
	->addArgument(new Reference('connection')
	);
$containerBuilder
	->register('database_test', 'Test\DatabaseTest')
	->addArgument(new Reference('connection')
	);

return $containerBuilder;
