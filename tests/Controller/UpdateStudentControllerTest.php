<?php

namespace Tests\Controller;

class UpdateStudentControllerTest extends ControllerTestCase
{
		public function testUpdateStudentSuccessfully() 
	{ 
		$lastname = 'Antoine';
		$firstname = 'Dupont';
		$birthdate = '2034-12-06';
		$id = '2f935cb2-1f08-40ce-9914-f344dd52948d';

		$response = $this->client->put('/student', [ 'json' => [ 'id' => $id, 'lastname' => $lastname, 'firstname' => $firstname, 'birthdate' => $birthdate] ]);

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testUpdateStudentWhenJsonIsInvalid() 
	{ 
		$lastname = 'Antoine';
		$firstname = 'Dupont';
		$birthdate = '2034-12-06';
		$id = '2f935cb2-1f08-40ce-9914-f344dd52948d';

		
		$response = $this->client->put('/student', ['exceptions' => FALSE, 'body' => '{"lastname: "paul","firstname": "string", "birthdate": "2015-04-01", "id": "2f935cb2-1f08-40ce-9914-f344dd52948d"}']);
		
		$this->assertEquals(400, $response->getStatusCode());
	}

	public function testUpdateStudentNotFound()
	{	
		$response = $this->client->put('/student', ['exceptions' => FALSE, 'body' => '{"id": "c1eedba6-ad8f-4d1b-bc78-abec9c1e07f6", "lastname": "paul","firstname": "string", "birthdate": "2015-04-01"}']);
		
		$this->assertEquals(404, $response->getStatusCode());
	}
}