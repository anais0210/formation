<?php

namespace Tests\Controller;

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class ControllerTestCase extends TestCase
{

	protected function setUp()
    {

        $container = require 'container.php';
        $databaseTest = $containerBuilder->get('database_test');

        $databaseTest->deleteDatabase();
        $databaseTest->insertData();


        $this->client = new Client([
            'base_uri' => 'http://formation.local'
        ]);
    }
}




 // supprimer la base
        // DROP DATABASE IF EXIST

        // Créer la base
        // $query = file_get_contents(../../config/formation.sql)

        //for ($i=0; $i<5; $i++) {
            // INSERT INTO Student ..