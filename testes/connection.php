<?php

	class Connection {
		private $connection;

		public function __construct(){
			$this->connection = new PDO("mysql:host=localhost;dbname=resenha_upgrade;", "root", "root");
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		public function getConnection(){
			return $this->connection;
		}
	}

	// $conexao = new Connection();
	// $conexao->getConnection();

	