<?php

namespace Tests\Controller;

use Tests\Controller\ControllerTestCase;

class GetStudentControllerTest extends ControllerTestCase
{
	public function  testGetStudentSuccessFull()
	{
		$response = $this->client->get('/student/a4645b62-d088-11e8-a8d5-f2801f1b9fd1', ['exceptions' => FALSE]);

		$content = $response->getBody()->getContents();
		$data = json_decode($content, true);	

		$contentType = $response->getHeaderLine('Content-Type');

		$this->assertEquals('application/json', $contentType);
		$this->assertEquals(200, $response->getStatusCode());
		$this->assertEquals('Benoit', $data['lastname']);
		$this->assertEquals('Shauni', $data['firstname']);
		$this->assertEquals('1997-04-10', $data['birthdate']);
		$this->assertEquals('a4645b62-d088-11e8-a8d5-f2801f1b9fd1', $data['id']);

	}

	public function testGetStudentIsNotFound()
	{
		$response = $this->client->get('/student/a4645b62-d088-11e8-a8d5-f2801f1b9fd1', ['exceptions' => FALSE]);
		
		$this->assertEquals(404, $response->getStatusCode());
	}
}
