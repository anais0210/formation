<?php

namespace Tests\Controller;

use Tests\Controller\ControllerTestCase;

class CreateStudentControllerTest extends ControllerTestCase
{

	public function testCreateStudentSuccessfully() 
	{ 
		$lastname = 'Anais';
		$firstname = 'Cambon';
		$birthdate = '1887-12-12';

		$response = $this->client->post('/student', [ 'json' => [ 'lastname' => $lastname, 'firstname' => $firstname, 'birthdate' => $birthdate] ]);

		$this->assertEquals(201, $response->getStatusCode());
	}
 
 	public function testCreateStudentWhenJsonIsInvalid() 
	{ 
		$lastname = 'Anais';
		$firstname = 'Cambon';
		$birthdate = '1887-12-12';

		
		$response = $this->client->post('/student', ['exceptions' => FALSE, 'body' => '{ "lastname: "paul","firstname": "string", "birthdate": "2015-04-01"}']);
		
		
		
		$this->assertEquals(400, $response->getStatusCode());
	}
}