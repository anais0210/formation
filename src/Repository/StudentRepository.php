<?php

namespace App\Repository;

use App\Model\Connection;

class StudentRepository
{
	private $connection;

	public function __construct(Connection $connection)
	{
		$this->connection = $connection->connect();
	}

	public function create(string $firstname, string $lastname, \DateTime $birthdate)
	{
		$req = $this->connection->prepare('INSERT INTO student(lastname, firstname, birthdate) VALUES(:lastname, :firstname, :birthdate)');
		$req->execute(array(
				'lastname' => $lastname,
				'firstname' => $firstname,
				'birthdate' => $birthdate->format('Y-m-d'))
		);
	}

	public function update(string $id, string $fistname, string $lastname, \DateTime $birthdate)
	{

	}

	public function delete($id)
	{

	}

	public function find($id)
	{

	}
	
	public function findAll()
	{
		$request = $bdd->query('SELECT id, lastname, firstname, birthdate FROM student');
		while ($student = $request->fetch(PDO::FETCH_ASSOC))
		{
		  echo $student['lastname'], $student['firstname'], $student['birthdate'];
		}
	}

}
