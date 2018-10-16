<?php

namespace App\Model;

class Connection
{
	private $connected = false;
	private $pdo;
	private $driver;
	private $host;
	private $dbname;
	private $login;
	private $password;

	public function __construct( string $driver, string $host, String $dbname, string $login, string $password)
	{
		$this->driver = $driver;
		$this->host = $host;
		$this->dbname = $dbname;
		$this->login = $login;
		$this->password = $password;
	}

	public function connect()
	{
		if ($this->connected) {
			return $this->pdo;
		}

		try {
			$this->pdo = new \PDO( $this->driver. ':host=' . $this->host.';dbname=' . $this->dbname, $this->login, $this->password);
			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

			$this->connected = true;
		}
		catch (Exception $e) {
			die('Erreur connexion : ' . $e->getMessage());
		}

		return $this->pdo;
	}
}