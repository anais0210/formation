<?php

namespace Tests\Controller;

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class ControllerTestCase extends TestCase
{

	protected function setUp()
    {
        $this->client = new Client([
            'base_uri' => 'http://formation.local'
        ]);
    }
}