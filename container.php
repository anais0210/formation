<?php

require_once 'vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

$containerBuilder = new ContainerBuilder();

$containerBuilder->setParameter('driver', 'pgsql');
$containerBuilder->setParameter('dbname', 'formation');
$containerBuilder->setParameter('host', 'db');
$containerBuilder->setParameter('login', 'postgres');
$containerBuilder->setParameter('password', 'postgres');

$containerBuilder
		->register('connection', 'App\Model\Connection')
		->addArgument('%driver%')
		->addArgument('%host%')
		->addArgument('%dbname%')
		->addArgument('%login%')
		->addArgument('%password%');

$containerBuilder
	->register('student_repository', 'App\Repository\StudentRepository')
	->addArgument(new Reference('connection'));
$containerBuilder
	->register('database_test', 'Test\DatabaseTest')
	->addArgument(new Reference('connection'));

return $containerBuilder;
