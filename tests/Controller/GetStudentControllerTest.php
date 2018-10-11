<?php

namespace Tests\Controller;

use Tests\Controller\ControllerTestCase;

class GetStudentControllerTest extends ControllerTestCase
{
	public function  testGetStudentSuccessFull()
	{
		$response = $this->client->get('/student/af9798df-5682-4d4a-86fe-6f6912abf4b0', ['exceptions' => FALSE]);

		$content = $response->getBody()->getContents();
		$data = json_decode($content, true);	

		$contentType = $response->getHeaderLine('Content-Type');

		$this->assertEquals('application/json', $contentType);
		$this->assertEquals(200, $response->getStatusCode());
		$this->assertEquals('Anais', $data['lastname']);
		$this->assertEquals('Sparesotto', $data['firstname']);
		$this->assertEquals('2015-04-01', $data['birthdate']);
		$this->assertEquals('af9798df-5682-4d4a-86fe-6f6912abf4b0', $data['id']);

	}

	public function testGetStudentIsNotFound()
	{
		$response = $this->client->get('/student/f748e40b-5990-4e05-ac93-a3c240af0224', ['exceptions' => FALSE]);
		
		$this->assertEquals(404, $response->getStatusCode());
	}
}
