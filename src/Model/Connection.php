<?php

namespace App\Model;

class Connection
{
	private $connected = false;
	private $pdo;

	public function connect()
	{
		if ($this->connected) {
			return $this->pdo;
		}

		try {
			$this->pdo = new \PDO('pgsql:host=formation.local;dbname=formation', 'postgres', 'postgres');
			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

			$this->connected = true;
		}
		catch (Exception $e) {
			die('Erreur connexion : ' . $e->getMessage());
		}

		return $this->pdo;
	}
}
