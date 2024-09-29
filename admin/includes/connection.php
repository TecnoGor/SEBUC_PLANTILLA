<?php

	class Conexion{
		private $host = 'localhost';
		private	$dbname = 'comunidad';
		private	$usrname = 'consejo';
		private	$psswd = 'c0n53j0';

		private $conn;

		public function connect(){
			$dsn = "mysql:host=".$this->host.";dbname=".$this->dbname;

			try {
				$this->conn = new PDO($dsn, $this->usrname, $this->psswd);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $this->conn;
			} catch (PDOException $e) {
				echo "Error al establecer conexion" . $e->getMessage();
			}
		}

		public function dsconnect(){
			$this->conn=null;
		}
	}

?>

