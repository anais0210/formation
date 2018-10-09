<?php

namespace Tests\Controller;

use Tests\Controller\ControllerTestCase;

class ListStudentControllerTest extends ControllerTestCase
{
	public function testGetStudentSuccessFull()
	{
		$response = $this->client->get('/student');

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testGetStudentJsonIsInvalid()
	{
		$response = $this->client->get('/student', ['exceptions' => FALSE, 'body' => '{ "lastname: "paul","firstname": "string", "birthdate": "2015-04-01"}']);
		
		$this->assertEquals(400, $response->getStatusCode());
	}
}