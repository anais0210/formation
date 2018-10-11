<?php

namespace Tests\Controller;

class deleteStudentControllerTest extends ControllerTestCase
{
	public function testDeleteStudentController()
	{
		$response = $this->client->delete('/student/be3a4c19-8604-4498-82f1-d559fa5b75c4', ['exceptions' => FALSE]);

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testDeleteStudentIsInValidId()
	{
		$response = $this->client->delete('/student/be3a4c19-8604-4498-82f1-d559fa5b7545', ['exceptions' => FALSE]);
		
		$this->assertEquals(400, $response->getStatusCode());
	}
}

