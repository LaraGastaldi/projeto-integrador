<?php
	/**
	* USUARIO (sem uso)
	*/
	require 'connection.php'
	class Usuario{
		public $id;
		public $nome;
		public $email;
		public $senha;
		public $tipo;

		private $conecxao;

		public function __construct() {
			$this->tipo = 1;

			$this->conexao = new Connection();
		}

		public function cadastrar($arrayCadastro) {
			$this->conexao->getConnection()->query("INSERT INTO usuario(NULL, ".$arrayCadastro['nome'].", email, senha, tipo) VALUES (?, ?, ?, ?)");

		}
		public function getUsuario() {

		}
		public function getUsuarios() {

		}
		public function editar() {

		}
		public function excluir() {

		}
	}

	/**
	* COMENTARIO
	*/
	class comments{
	
	public $path;
	public $userID;
	public $resenhaID;
	public $comment;
	public $date;
	
	function __construct($path, $userId, $resenhaId, $comment, $date=null){
		/*
			Define the vars in object for manipulation in others functions
		*/
		$formdate = DateTime::createFromFormat('d/m/Y');
		$this->path = $path;
		$this->userId = $userId;
		$this->resenhaId = $resenhaId;
		$this->comment = $comment;
		if($formdate && $formdate->format('d/m/Y') === $date){
		   $this->date = $date
		}else{
			$this->date = $formdate;
		}
	}
	function save(){
		$forsave[$this->resenhaId]['userId'] = $this->userId;
		$forsave[$this->resenhaId]['comment'] = $this->comment;
		$json = file_get_contents($path);
		$json = json_decode($json, true);
		$json = array_merge($json, $forsave);
		$json = json_encode($json, JSON_PRETTY_PRINT);
		file_put_contents($json, $path);
	}
}