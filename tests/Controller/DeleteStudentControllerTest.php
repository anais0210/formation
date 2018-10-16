<?php

namespace Tests\Controller;

class deleteStudentControllerTest extends ControllerTestCase
{
	public function testDeleteStudentController()
	{
		$response = $this->client->delete('/student/a4644de8-d088-11e8-a8d5-f2801f1b9fd1', ['exceptions' => FALSE]);

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testDeleteStudentIsInValidId()
	{
		$response = $this->client->delete('/student/a4644de8-d088-11e8-a8d5-f2801f1b9fd1', ['exceptions' => FALSE]);
		
		$this->assertEquals(400, $response->getStatusCode());
	}
}

