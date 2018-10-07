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

	public function update(string $id, string $firstname, string $lastname, \DateTime $birthdate)
	{
		$req = $this->connection->prepare('UPDATE student SET lastname=:lastname, firstname=:firstname, birthdate=:birthdate WHERE id=:id');
		$req->execute(array(
			'lastname' => $lastname,
			'firstname' => $firstname,
			'birthdate' => $birthdate->format('Y-m-d'),
			'id' => $id)
		);
	}

	public function delete(string $id)
	{
		$req = $this->connection->prepare('DELETE FROM student WHERE id=:id ');
		$req->execute(array(
			'id' => $id)
		);
	}

	public function find(string $id)
	{
		$req = $this->connection->prepare('SELECT FROM student WHERE id=:id');
		$req->execute(array(
			'id' => $id)
		);
	}
	
	public function findAll(string $id, string $lastname, string $firstname, \DateTime $birthdate)
	{
		$req = $this->connection->prepare('SELECT * FROM student');
		$req->execute(array(
			'lastname' => $lastname,
			'firstname' => $firstname,
			'birthdate' => $birthdate,
			'id' => $id)
		);
	}

}
